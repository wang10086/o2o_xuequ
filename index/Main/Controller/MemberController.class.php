<?php
namespace Main\Controller;
use Think\Controller;
use Sys\P;

class MemberController extends BaseController {

    // 初始化函数
    public function _initialize(){
        $this->data_right();

        if(!in_array(ACTION_NAME,explode(",",C('NOT_AUTH_ACTION')))){

            //验证用户是否登陆
            if(!cookie('username')){
                header("location: ".U('Login/check_login'));
                die();
            }

        }

    }

    /****** 用户中心首页 ******/
    public function index(){

        $this->page_title       = '用户中心 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $db                     = M('member_apply_service');

        $this->v_status         = array('0'=>'审核中','1'=>'审核通过','2'=>'审核未通过');
        $this->status           = array('0'=>'协调中','1'=>'预约通过','2'=>'预约失败');

        //获取预约讲座记录
        $where                  = array();
        $where['l.booking_user']= cookie('userid');
        $this->lecture	        = M()->table('__APPO_LECTURE__ as l')->field('l.*,r.pic,r.title as exp')->join('__RES__ as r on r.id = l.res_id','LEFT')->where($where)->select();

        //申请服务校信息
        $where                  = array();
        $where['apply_user']    = cookie('userid');
        $data   	            = $db->where($where)->find();
        $this->service          = $data;
        $this->sta              = $data['status'];

        //预约科技节信息
        $wheres                 = array();
        $wheres['userid']       = $_SESSION['userid'];
        $sci                    = D('sci_lecture')->where($wheres)->select();
        foreach($sci as &$value){
            $sci_id     = explode(',', $value['sci_id']);
            foreach ($sci_id as &$v){
                $v      = intval($v);
            }
            $t['id']    = array('in',$sci_id);
            $title              = D('sci')->field('title')->where($t)->select();
            $sci_tit            = array();
            foreach ($title as $v){
                $sci_tit[]      = $v['title'];
            }
            $sci_tit            = implode(',',$sci_tit);
            $value['sci_tit']   = $sci_tit;
        }
        $this->scis             = $sci;

        //预约研学旅行 + 科学课程类订单(根据type区分)
        $userid                 = $_SESSION['userid'];
        $tra_lessions           = M('tra_lecture')->where("userid = '$userid'")->select();
        $this->tra_lessions     = $tra_lessions;

        //下载支撑服务校PDF文件
        /*$info                   = $db->field('id')->where("apply_user = '$userid' && status = '0'")->find();
        $id                     = $info['id'];
        $this->id               = $id;*/

        //支撑服务校信息
        $info                   = M("member_apply_service")->field('id')->where("apply_user = '$userid'")->order("apply_time desc")->find();
        $id                     = $info['id'];
        $this->id               = $id;

        $this->display('index');
    }


    /****** 预约讲座 ******/
    public function book_lecture(){

        if(isset($_POST['dosubmint'])){

            $info = I('info');
            $info['booking_user']	= cookie('userid');
            $info['mobile']   		= cookie('mobile');
            $info['booking_time']	= NOW_TIME;
            $res = M('appo_lecture')->add($info);
            if($res){

                $refer              = U('Member/index');
                $mobile             = "13811482444";
                $time               = date('Y-m-d H:i:s',NOW_TIME);
                $infos              = array($time);
                sendTemplateSMS($mobile, $infos, "220715"); //手机号码，替换内容数组，模板ID
                $this->send_code_lecture();
                die(return_msg('y',"申请成功,我们会及时与您联系!<script type='text/javascript'> setTimeout('location=\"$refer\"',1000);</script>"));
            }else{
                die(return_msg('n','保存申请信息失败，请重试！'));
            }

        }else{
            $id                 = I('id');
            //nid模糊预约
            $nid                = I('nid');
            $userid             = $_SESSION['userid'];
            $this->nid          = $nid;
            $this->type         = 1;
            $this->data			= M('article')->find($id);

            //支撑服务校信息
            $info               = D('member_apply_service')->where("apply_user = '$userid'")->find();
            $this->info         = $info;
            $this->page_title	= '预约讲座 - 支撑服务项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
            $this->display('book_lecture');
        }


    }



    /**预约科技节*/
    public function cart(){

        if(isset($_POST['dosubmint'])){

            $userid     = $_SESSION['userid'];
            $mobile     = $_SESSION['mobile'];
            $sci_time   = strtotime(I("sci_time"));
            $listener   = I('listener');
            //$sci_time   = I("sci_time");
            if (!$sci_time){
                die(return_msg('n','预约科技节时间不能为空！'));
            }
            //支撑服务校信息
            $info       = M('member_apply_service')->where("apply_user = '$userid' and status = '1'")->find();
            //购物车信息
            $cart       = cookie('sci_shopcart');
            $cart       = str_replace('[','',$cart);
            $cart       = str_replace(']','',$cart);

            $data               = array();
            $data['userid']     = $userid;
            $data['mobile']     = $mobile;
            $data['booking_user']= $_SESSION['username'];
            $data['booking_time']= NOW_TIME;
            $data['school_name'] = $info['school_name'];
            $data['manager_name']= $info['manager_name'];
            $data['call_man']   = $info['contacts_name'];
            $data['tel_num']    = $info['contacts_mobile'];
            $data['e_mail']     = $info['contacts_email'];
            $data['in_day']     = $sci_time;
            $data['listener']   = $listener;

            $where['id']        = array('in',$cart);
            $shoplist           = M('sci')->field('id')->where($where)->select();
            $shoplist           = i_array_column($shoplist,id);
            $sci_ids            = implode($shoplist,',');
            $data['sci_id']     = $sci_ids;
            $res                = D('sci_lecture')->add($data);
            if($res){
                $_COOKIE['kl_course_sci_shopcart'] = null;
                //短信通知
                $mobile             = "18518733213";
                $time               = date('Y-m-d H:i:s',NOW_TIME);
                $infos              = array($time);
                sendTemplateSMS($mobile, $infos,"229290" ); //手机号码，替换内容数组，模板ID
                die(return_msg('y','预约科技节成功,稍后工作人员会与您联系!'));
            }else{
                die(return_msg('n','保存数据失败！'));
            }
        }else{
            $cart = cookie('sci_shopcart');
            $cart = str_replace('[','',$cart);
            $cart = str_replace(']','',$cart);

            //获取购物车列表
            $where = array();
            $where['id'] = array('in',$cart);
            $shoplist = M('sci')->field('id,title,price,pic')->where($where)->select();
            foreach($shoplist as $k=>$v){
                $shoplist[$k]['pic'] = thumb($v['pic'],64,64);
            }

            $this->shoplist		= $shoplist;
            $this->count        = count($shoplist);
            $this->page_title	= '我的科技节 - 支撑服务项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
            $this->display('cart');
        }
    }

    //申请支撑服务校
    public function apply_service(){
        $this->page_title	= '中国科学院科学教育联盟支撑服务校申请表 - 中科教科学教育平台 - 中国科学院科学教育联盟';
		$db = M('member_apply_service');

        if(isset($_POST['dosubmint'])){
            
			$aid	= I('aid',0);
            $info	= I('info');
            $info['manager_sex']	= I('manager_sex');
            $info['contacts_sex']	= I('contacts_sex');
            $info['apply_time']		= time();
            $info['apply_user']		= cookie('userid');
			

            //判断学校是否已申请
            $find = $db->where(array('school_name'=>$info['school_name'],'id'=>array('neq',$aid)))->find();
            if($find){
                die(return_msg('n','该学校已存在申请记录！'));
            }else{
				if($aid){
					$info['status']		= 0;
					$save = $db->data($info)->where(array('id'=>$aid))->save();
					
				}else{
                	$save = $db->add($info);
				}
                if($save){
                    $mobile           = "18518733213";
                    $time               = date('Y-m-d H:i:s',NOW_TIME);
                    $infos              = array($time);
                    sendTemplateSMS($mobile, $infos, "220712");
                    die(return_msg('y','已提交申请，请等待审核！<br><a href="javascript:;" onClick="goback()" class="btnclose">返回</a>'));
                }else{
                    die(return_msg('n','保存申请信息失败，请重试！'));
                }
            }

        }else{

			//获取我的申请记录
			$where = array();
			$where['apply_user']	= cookie('userid');
			$where['status']		= array('neq',1);
			$this->row = $db->where($where)->find();

			$this->provincelist = C('PROVINCE');

            $this->display('apply_service');
        }
    }


    //预约讲座通知
    public function send_code_lecture(){
        $mobile = "13811482444";
        $time = date('Y-m-d H:i:s',NOW_TIME);
        $res = sendTemplateSMS($mobile, array($time), "220715"); //手机号码，替换内容数组，模板ID
    }


	//下载支撑服务校申请表

	public function download_pdf(){
		$id = I('id',0);
        exp_pdf($id);
	}

	//修改支撑服务校信息
    public function apply_service_edit(){
        $mobile                     = $_SESSION['mobile'];
        $db                         = M('member_apply_service');
        if(isset($_POST['dosubmint'])){
            $info                   = I('info');
            $aid	                = I('aid',0);
            $info['manager_sex']	= I('manager_sex');
            $info['contacts_sex']	= I('contacts_sex');
            $info['apply_time']		= time();
            $info['apply_user']		= cookie('userid');
            $info['status']		    = 0;
            $save = $db->data($info)->where(array('id'=>$aid))->save();
            $mobile           = "18518733213";
            $time               = date('Y-m-d H:i:s',NOW_TIME);
            $infos              = array($time);
            if($save){
                //支撑服务校短信通知
                sendTemplateSMS($mobile, $infos, "220712");
                die(return_msg('y','已提交申请，等待审核！<br><a href="javascript:;" onClick="goback()" class="btnclose">返回</a>'));
            }else{
                die(return_msg('n','保存申请信息失败，请重试！'));
            }
        }else{
            //获取我的申请记录
            $where                  = array();
            $where['apply_user']	= cookie('userid');
            $where['status']		= array('neq',1);
            $this->row              = $db->where($where)->find();
            $this->provincelist     = C('PROVINCE');

            $this->display();
        }
    }

    //模糊预约课程
    public function vague_lecture(){
        $type               = I('type');
        $db                 = D('member_apply_service');
        $userid             = $_SESSION['userid'];
        $apply_users        = $db->field('apply_user')->where("status = '1'")->select();
        $apply_users        = i_array_column($apply_users,"apply_user");
        if(in_array($userid,$apply_users)){
            //nid模糊预约
            $this->nid          = 100;
            $this->type         = $type;
            $info               = D('member_apply_service')->where("apply_user = '$userid'")->find();
            $this->info         = $info;
            $this->page_title	= '预约讲座- 中科教科学教育平台 - 中国科学院科学教育联盟';
            $this->display('book_lecture');
        }else{
            //支撑服务校信息
            $this->page_title	 = '申请支撑服务校- 中科教科学教育平台 - 中国科学院科学教育联盟';
            $this->provincelist  = C('PROVINCE');
            $this->display('apply_service');
        }
    }

    //预约科学课程/研学旅行
    public function apply_science(){
        $this->page_title       = "预约支撑服务项目";
        if (isset($_POST['dosubmint'])){
            $db                 = M("tra_lecture");
            $info               = I('info');
            $goods_id           = $info['goods_id'];
            $type               = $info['type'];
            $userid             = $_SESSION['userid'];

            $data               = array();
            $data['goods_id']   = $goods_id;
            $data['type']       = $type;
            $data['goods_title']= $info['title'];
            $data['userid']     = $userid;
            $data['yq_name']    = $info['yq_name'];
            $data['manager_name']= $info['manager_name'];
            $data['call_man']   = $info['call_man'];
            $data['tel_num']    = $info['tel_num'];
            $data['e_mail']     = $info['e_mail'];
            $data['listener']   = $info['listener'];
            $data['in_day']     = strtotime($info['in_day']);
            $data['pic']        = $info['pic'];
            $data['booking_time']= NOW_TIME;
            $res = $db->add($data);
            $mobile             = "18518733213";
            //$mobile           = "17778119344";
            $time               = date('Y-m-d H:i:s',NOW_TIME);
            $infos              = array($time);
            if ($res){
                if ($type == 1){
                    //预约科学课程短信通知
                    sendTemplateSMS($mobile, $infos,"232483" );
                }elseif ($type ==2){
                    //预约研学旅行短信通知
                    sendTemplateSMS($mobile, $infos,"232481" );
                }
                die(return_msg('y',"预约成功,稍后工作人员会与您联系!"));
            }else{
                die(return_msg('n','保存申请信息失败，请重试！'));
            }

        }else{
            $kind               = I('kind');
            $userid             = $_SESSION['userid'];
            $info               = M("member_apply_service")->where("apply_user = '$userid'")->find();
            $id                 = I('id');
            $module             = I("module");
            $date               = I('date');
            $data               = M('goods')->field("id,title,module,pic")->where("id = '$id'")->find();
            $sci_arr            = array(33,34,39);//课程类产品(科学课程,探究式课题,教师培训)
            $tra_arr            = array(32,36);//研学类产品(研学旅行,)
            if (in_array($kind,$sci_arr)){
                $type   = 1;
            }elseif (in_array($kind,$tra_arr)){
                $type   = 2;
            }
            $this->type         = $type;
            $this->date         = $date;
            $this->data         = $data;
            $this->info         = $info;
            $this->display('apply_science');
        }

    }
}
