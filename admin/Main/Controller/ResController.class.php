<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class ResController extends BaseController {

    //资源管理
    public function index(){

        $db = M('res');
        $where = array();

        $keywords = I('keywords');
        $type     = I('type',0);

        if($type)      $where['type']  = $type;
        if($keywords)  $where['title'] = array('like','%'.$keywords.'%');

        $kind = M('kind')->where(array('type'=>1,'level'=>1))->order('`sort` DESC')->GetField('id,title',true);

        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';

        //查询
        $datalist = $db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order($this->orders('sort'))->select();
        foreach($datalist as $k=>$v){
            $datalist[$k]['typename'] = $kind[$v['type']];
        }

        $this->type     = $type;
        $this->kind     = $kind;
        $this->datalist = $datalist;
        $this->display('index');

    }

    public function update(){
        $id             = I('id', 0);
        $type           = I('type',0);
        if($type == "2"){
            $this->res_upd($id,$type);
        }else{
            $this->res_edit($id,$type);
        }
    }

    //编辑专家信息
    public function res_edit(){

        if(isset($_POST['dosubmit'])){

            $info      = I('info');
            $attr      = I('attr');
            $edit      = I('editid');
			$lm        = I('lm');
			$fit       = I('fit');
			$pro       = I('pro');

			$info['col']				= implode(',',$lm);
            $info['pic']				= $attr['filepath'][0];
            $info['pic_id']			    = $attr['id'][0];
            $info['update_time']		= time();
			$info['fit']				= implode(',',$fit);
			$info['pro']				= implode(',',$pro);
            $info['content']			= stripslashes($_POST['content']);

            if($edit){
                $add = M('res')->where(array('id'=>$edit))->data($info)->save();
                $id  = $edit;
            }else{
                $info['create_time'] = time();
                $add = M('res')->add($info);
                $id  = $add;
            }


            if($id){

                //保存上传图片
                save_res(P::TYPE_RES,$id,$attr);

                $this->success('保存成功！',I('referer',''));
            }else{
                $this->error('保存失败！',I('referer',''));
            }

        }else{
            $id             = I('id', 0);
            $this->type     = I('type',0);
            $this->kind     = M('kind')->where(array('type'=>1,'level'=>1))->GetField('id,title',true);
            $this->row      = M('res')->find($id);
            $this->atts     = get_res(P::TYPE_RES,$id);
			$this->resf     = C('RES_FIELDS');
			$this->ress     = C('RES_SYSTEMS');
			$this->resp     = C('RES_PRO');
			$this->goodsfit = C('GOODS_FIT');
			//栏目
			$infotype  = getTree(1);
			foreach($infotype as $k=>$v){	
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype = $infotype;
			$this->lm       = explode(',',$this->row['col']);
			
			$this->fit      = explode(',',$this->row['fit']);
			$this->pro      = explode(',',$this->row['pro']);

            $this->display('res_edit');
        }

    }


    //编辑非专家信息(类似旅行)
    public function res_upd(){
        if(isset($_POST['dosubmit'])){
            $module    = P::TYPE_MOREPIC_RES;
            $info      = I('info');
            $attr      = I('attr');
            $edit      = I('editid');
            $lm        = I('lm');
            $fit       = I('fit');
            $pro       = I('pro');
            $daypic    = I('daypic');

            $info['col']				= implode(',',$lm);
            $info['pic']				= $attr['filepath'][0];
            $info['pic_id']			    = $attr['id'][0];
            $info['update_time']		= time();
            $info['fit']				= implode(',',$fit);
            $info['pro']				= implode(',',$pro);
            //$info['content']			= stripslashes($_POST['content']);
            $days                       = I('days');

            if($edit){
                $add = M('res')->where(array('id'=>$edit))->data($info)->save();
                $id  = $edit;
            }else{
                $info['create_time'] = time();
                $add = M('res')->add($info);
                $id  = $add;
            }

            //保存日程
            if($id){
                M('goods_days')->where(array('goods_id'=>$id,'module'=>$module))->delete();
                foreach($days as $k=>$v){
                    $data = array();
                    $data['goods_id'] = $id;
                    $data['module']   = $module;
                    $data['content']  = $v['content'];
                    $data['remarks']  = $v['remarks'];
                    $data['citys']    = $v['citys'];
                    M('goods_days')->add($data);
                }
            }

            if($id){

                //保存上传标题图片
                save_res(P::TYPE_RES,$id,$attr);

                //日程图片图片
                save_res(P::TYPE_MOREPIC_RES,$id,$daypic);


                $this->success('添加成功！',I('referer',''));
            }else{
                $this->error('添加失败！');
            }

        }else{
            $module         = P::TYPE_MOREPIC_RES;
            $id             = I('id', 0);
            $this->type     = I('type',0);
            $this->kind     = M('kind')->where(array('type'=>1,'level'=>1))->GetField('id,title',true);
            $this->row      = M('res')->find($id);
            $this->atts     = get_res(P::TYPE_RES,$id);
            $this->daypic   = get_res(P::TYPE_MOREPIC_RES,$id);//获取每日上传素材
            $this->resf     = C('RES_FIELDS');
            $this->ress     = C('RES_SYSTEMS');
            $this->resp     = C('RES_PRO');
            $this->goodsfit = C('GOODS_FIT');
            $this->days     = M('goods_days')->where(array('goods_id' => $id , 'module' => $module))->select();
            //栏目
            $infotype  = getTree(1);
            foreach($infotype as $k=>$v){
                $infotype[$k]['tab']        = fortext($v['level']-1);
            }
            $this->infotype = $infotype;
            $this->lm       = explode(',',$this->row['col']);

            $this->fit      = explode(',',$this->row['fit']);
            $this->pro      = explode(',',$this->row['pro']);

            $this->display('res_upd');
        }
    }

    //删除
    public function res_del(){
        $id = I('id');
        if($id){
            M('res')->where(array('id'=>$id))->delete();
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }

    }




}
