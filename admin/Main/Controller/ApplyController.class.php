<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class ApplyController extends BaseController {

	
	//支撑服务校列表
    public function apply_service(){
		$db = M('member_apply_service');
		
		
		
		$kw = I('kw','');
			
		$where = array();
		if($kw)         $where['school_name'] = array('like','%'.$kw.'%');
		
		
		//分页
		$pagecount      = $db->where($where)->count();
		$page           = new Page($pagecount, P::PAGE_SIZE);
		$this->pages    = $pagecount>P::PAGE_SIZE ? $page->show():'';
		
		$status         = C('APPLY_STATUA');
		
		//查表
		$users          = $db->where($where)->order($this->orders())->limit($page->firstRow . ',' . $page->listRows)->order("apply_time desc")->select();
		foreach($users as $k=>$v){
			$users[$k]['strstatus'] = $status[$v['status']];
		}
		$this->users     = $users;
		$this->display('apply_service');
    }
	
    //审核申请支撑服务校信息
    public function apply_pro(){
        if(isset($_POST['dosubmint'])){
            $id                     = I("id");
			$info					= I("info");
            $info['verify_name']		= cookie('name');
			$info['status']			= I('status');
			$info['verify_time']		= time();
			if($id){
            	$res = M("member_apply_service")->data($info)->where(array('id'=>$id))->save();
			}else{
				$info['apply_time']	= time();
				$info['apply_user']	= 0;
				$res = M("member_apply_service")->add($info);
			}
			
			//同步至OA系统
			if($info['status']==1){
				$info['description'] = '';
				$prm = array();
				foreach($info as $k =>$v){ 
					$prm[] = $k."=".$v;
				}
				$curlPost	= implode('&',$prm);
				$op   = get_api('Client/save_gec',$curlPost);
			}
			
            if($res){
                $this->success('保存成功',I('referer'));
            }else{
                $this->error('保存数据失败',I('referer'));
            }
        }else{
            $id                 = I('id',0);
            $data               = M("member_apply_service")->where("id = '$id'")->find();
            $this->provincelist = C('PROVINCE');
			$this->row			=  $data;
            $this->display('apply_pro');
        }

    }

    //申请支撑服务校详情页
    public function apply_pro_detail(){
		$id                 = I('id',0);
		$data               = M("member_apply_service")->where("id = '$id'")->find();
		$this->provincelist = C('PROVINCE');
		$this->row			=  $data;
		$this->display('apply_pro_detail');
    }

    //删除申请支撑服务校记录
    public function apply_pro_del(){
        $id         = I('id');
        $db         = D("member_apply_service");
        $res        = $db->where("id = '$id'")->delete();
        if($res){
            $this->success("删除成功!");
        }else{
            $this->error("删除失败!");
        }
    }

    //手动录入约课信息
    public function apply_lec_add(){
        if(isset($_POST['dosubmint'])){
            $db             = M('appo_lecture');
            $info           = I('info');
            $zj_name        = I('zj_name');
            $info['res_id'] = M('res')->where(array('title'=>$zj_name))->getField('id');
            $info['article_id'] = M('article')->where(array('title'=>$info['article_title']))->getField('id');
            $info['call_man']= $info['yq_name'];
            $info['status'] = '1';    //预约成功
            $info['type']   = 1;    //精确预约
            $info['booking_time']= NOW_TIME;
            $res = $db->add($info);
            if ($res){
                $this->success("保存数据成功");
            }else{
                $this->error("保存数据失败");
            }
        }else{

            $this->display('apply_lecture_add');
        }
    }

    //删除用户预约课程记录
    public function apply_lec_del(){
        $id         = I('id');
        $db         = D("appo_lecture");
        $res        = $db->where("id = '$id'")->delete();
        if($res){
            $this->success("删除成功!");
        }else{
            $this->error("删除失败!");
        }
    }


    //老专家演讲预约信息列表
    public function apply_lecture(){
        $db             = M('appo_lecture');
        //分页
        $pagecount      = $db->count();
        $page           = new Page($pagecount, P::PAGE_SIZE);
        $this->pages    = $pagecount>P::PAGE_SIZE ? $page->show():'';

        $status         = C('APPLY_STATUA');

        $data           = $db->field("a.*,r.title")->alias('a')->join("left join o2o_res as r on a.res_id = r.id")->limit($page->firstRow . ',' . $page->listRows)->order("booking_time desc")->select();
        foreach($data as $k=>$v){
            $data[$k]['strstatus'] = $status[$v['status']];
        }
        $this->assign('data',$data);
        $this->display();
    }

    //审核老专家演讲预约信息
    public function apply_lecture_detail(){
        if(isset($_POST['dosubmint'])){
            $id						= I("id");
			$info					= I('info');

			$sms_xx                 = I('sms_xx',0);
			$sms_zj                 = I('sms_zj',0);

			$info['create_time']	= time();
            $data['res_id']         = I('zj_id');
            $data['status']			= I('status');
			$data['verify_view']	= I('verify_view');
            $data['verify_name']	= cookie('name');
			$data['verify_time']	= time();
			if($data['status']==1){
				$data['in_day'] = date('Y-m-d H:i:s',strtotime($info['builddate'].' '.$info['stime']));
			}
            $res = M("appo_lecture")->data($data)->where(array('id'=>$id))->save();
			
            if($res){
				if($data['status']==1){
					$iswots = M('appo_wots')->where(array('order_id'=>$id))->find(); 
					if($iswots){
						M('appo_wots')->data($info)->where(array('order_id'=>$id))->save();	
					}else{
						M('appo_wots')->add($info);
					}
					
					if($info['teacher_id']){
						//整理同步数据
						$info['cour_type'] = 1;
						//同步至排课系统
						request_post('http://cms.kexueyou.com/api.php?c=Client&a=wots',$info);
					}
					
					$order = M("appo_lecture")->find($id);
					$zj    = M("res")->find($order['res_id']);
					
					//给学校发送短信
					if($sms_xx){
						$mobile = $order['tel_num'];
						$data	= array($order['call_man'],$info['teacher'],$info['builddate'],'赵冬（13811482444）');
						$send	= sendTemplateSMS($mobile,$data,'224429');	
					}
					
					//给专家发送短信
					if($sms_zj && $zj['cms_exp_id']){
						
						//从排课系统获取专家电话号码
						$url = 'http://cms.kexueyou.com/api.php?c=Client&a=getmobile&id='.$zj['cms_exp_id'];
						$mobile = file_get_contents($url); 
						if($mobile){
							$data= array($info['teacher'],$info['builddate'],$order['show_addr']);
							$send = sendTemplateSMS($mobile,$data,'224428');	
						}
					}

				}
				
                $this->success('保存成功');
            }else{
                $this->error('保存数据失败');
            }
        }else{
            $id     = I('id');
            $type   = I('type');
            $db     = M('appo_lecture');
            $data   = $db->field("a.*,r.title as expname,r.cms_exp_id")->alias('a')->join("left join o2o_res as r on a.res_id = r.id")->where("a.id = '$id'")->find();
			$this->inday = strtotime($data['in_day']);
            $this->type  = $type;
			$this->wots  = M('appo_wots')->where(array('order_id'=>$id))->find();
			$this->assign("data",$data);
            $this->display();
        }
    }

    //科技节产品列表
    public function apply_sci(){
        $db             = M('sci_lecture');
        //分页
        $pagecount      = $db->count();
        $page           = new Page($pagecount, P::PAGE_SIZE);
        $this->pages    = $pagecount>P::PAGE_SIZE ? $page->show():'';

        $status         = C('APPLY_STATUA');
        $data           = $db->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach ($data as $k=>&$v){
            $ids        = explode(',',$v['sci_id']);
            $titles    = array();
            foreach ($ids as $i){
                $res= D("sci")->field("title")->where("id = '$i'")->find();
                $titles[]=$res['title'];
            }
            $v['sci_tit']=implode(',',$titles);
        }

        foreach($data as $k=>&$v){
            $data[$k]['strstatus'] = $status[$v['status']];
        }
        $this->data = $data;
        $this->display();
    }

    //审核科技节信息
    public function apply_sci_detail(){
        $db                      = M('sci_lecture');
        if(isset($_POST['dosubmint'])) {
            $id                  = I("id");
            $info                = I("info");
            $info['verify_name'] = cookie('name');
            $info['verify_view'] = I('verify_view');
            $info['status']      = I('status');
            $info['verify_time'] = time();
            $res = $db->data($info)->where(array('id' => $id))->save();
            if ($res){
                $this->success('保存数据成功',I('referer'));
            }else{
                $this->error('保存数据失败',I('referer'));
            }
        }else{
            $id             = I('id');
            $where          = array();
            $where['id']    =array('eq',$id);
            $data           = $db->where($where)->find();
            $sci_id         = explode(',',$data['sci_id']);
            $where['id']    = array('in',$sci_id);
            $sci_tit        = M('sci')->field('title')->where($where)->select();
            $arr_tit        = array();
            foreach ($sci_tit as $v){
                $arr_tit[]  = $v['title'];
            }
            $data['title']  = implode(',',$arr_tit);
            $this->data     = $data;
            $this->display();
        }
    }

    //预约研学 + 科学课程类
    public function apply_tra(){
        $db             = M('tra_lecture');
        //分页
        $pagecount      = $db->count();
        $page           = new Page($pagecount, P::PAGE_SIZE);
        $this->pages    = $pagecount>P::PAGE_SIZE ? $page->show():'';

        $status         = C('APPLY_STATUA');
        $data           = $db->limit($page->firstRow . ',' . $page->listRows)->select();

        foreach($data as $k=>$v){
            $data[$k]['strstatus'] = $status[$v['status']];
        }
        $this->data = $data;
        $this->display();
    }

    //审核研学、科学课程信息
    public function apply_tra_detail(){
        $db                      = M('tra_lecture');
        if(isset($_POST['dosubmint'])) {
            $id                  = I("id");
            $info                = I("info");
            $info['verify_name'] = cookie('name');
            $info['verify_view'] = I('verify_view');
            $info['status']      = I('status');
            $info['verify_time'] = time();
            $res = $db->data($info)->where(array('id' => $id))->save();
            if ($res){
                $this->success('保存数据成功',I('referer'));
            }else{
                $this->error('保存数据失败',I('referer'));
            }
        }else{
            $id             = I('id');
            $type           = I('type');
            $where          = array();
            $where['id']    =array('eq',$id);
            $where['type']  = array('eq',$type);
            $data           = $db->where($where)->find();
            $this->data     = $data;
            $this->display();
        }
    }

}
	
