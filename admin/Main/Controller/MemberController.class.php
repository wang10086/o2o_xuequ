<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class MemberController extends BaseController {
	
	
	//管理员列表
    public function index(){
		$db = M('member');
		
		$conf = M('config')->GetField('conf_key,conf_val',true);
		
		$un = I('un','');
		$rn = I('rn','');
		$mb = I('mb','');
		$id = I('uid','');
		$em = I('em','');
			
		$where = array();
		if($un)         $where['username'] = array('like','%'.$un.'%');
		if($rn)         $where['realname'] = array('like','%'.$rn.'%');
		if($mb)         $where['mobile']   = array('like','%'.$mb.'%');
		if($em)         $where['email']    = array('like','%'.$em.'%');
		if($id)         $where['id']       = $id;
		
		
		//分页
		$pagecount = $db->where($where)->count();
		$page = new Page($pagecount, P::PAGE_SIZE);
		$this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';
		
		$strlevel = C('MEMBER_LEVEL');
		
		//查表
		$users = $db->where($where)->order($this->orders())->limit($page->firstRow . ',' . $page->listRows)->select();
		foreach($users as $k=>$v){
			$users[$k]['strlevel'] = $strlevel[$v['level']];
		}
		
		$this->users     = $users;
		$this->display('index');
    }
	
	
	
	//导出会员
    public function expdata(){
		
		//栏目
		$db = M('sign');
		
		
		$stime      = I('stime','');
		$etime      = I('etime','');
		
		$where = array();
		if($stime && !$etime){
			$where['last_login_time']      = array('gt',strtotime($stime));	
		}else if(!$stime && $etime){
			$where['last_login_time']      = array('lt',strtotime($etime));	
		}else if($stime && $etime){
			$where['last_login_time']      = array('between',array(strtotime($stime),strtotime($etime)));
		}
		
		
		$title  = array('用户ID','用户名称','手机','邮箱','最近登录时间');
		
		$field  = 'uid,realname,mobile,email,last_login_time';

		//查表
		
		$users = M('member')->field($field)->where($where)->select();
		foreach($users as $k=>$v){
			$users[$k]['last_login_time'] = date('Y-m-d H:i:s',$v['last_login_time']);
		}
		
		$exptit = '会员信息-'.date('Ymd');
		
		
		//执行导出
		exportexcel($users,$title,$exptit);
		
    }


    //删除测试会员
    public function Member_del(){
        $id         = I('id');
        $db         = D('member');
        $res        = $db->where("id = '$id'")->delete();
        if($res){
            $this->success("删除成功!");
        }else{
            $this->error("删除失败!");
        }
    }


    /*添加会员功能(临时)*****start************/
    public function add_mem(){
        if(isset($_POST['dosubmint'])){
            $info               = I('info');
            $m_db               = D('member');
            $mps_db             = D('member_apply_service');
            $data[username]     = $info["username"];
            $data[reg_time]     = NOW_TIME;
            $data[mobile]       = $info['mobile'];
            $data[password]     = "e10adc3949ba59abbe56e057f20f883e";

            $m_id               = $m_db->add($data);

            /*用id 把 会员表和支撑服务校表关联 根据学校名字判断*/
            $con[apply_user]    = $m_id;
            $where[school_name] = array('like',$data[username]);
            $res                = $mps_db->where($where)->save($con);
            if($res){
                $this->success("保存数据成功");
            }else{
                $this->error("保存数据失败");
            }
        }else{
            $this->display('add_mem');
        }
    }
    /*添加会员功能(临时)*****end************/

}
	
