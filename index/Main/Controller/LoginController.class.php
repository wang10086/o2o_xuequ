<?php
/**
 * Date: 2017/11/9
 * Time: 16:43
 */

namespace Main\Controller;
use Think\CCPRestSmsSDK;

use Think\Verify;

class LoginController extends BaseController{
    
	//验证密码
    public function check_login(){
        if(isset($_POST['dosubmint'])){
			
         
			$mobile     = I('mobile','');
			$password   = I('password','');
			$yzm_code   = I('yzm_code','');
			$referer    = I('referer');
			
			
			//校验验证码
            $verify     = new Verify();
            if(!$verify->check($yzm_code)){
                die(return_msg('n','您输入的验证码有误,请重新输入！'));
            }
			
			//查询用户是否存在
            $user = M('member')->where("`mobile` = '$mobile' OR `username` = '$mobile'")->find();
            if(!$user){
                die(return_msg('n','该手机号未注册,请先注册！'));
            }
			
			//验证密码是否正确
            if($user['password'] != md5($password)){
				 die(return_msg('n','用户名或者密码不正确！'));
			}
			
			//更新最后登陆时间
			$data = array(
				"last_login_time" 	=> NOW_TIME,
				"last_login_ip" 	=> get_client_ip()
			);
			$res = M('member')->where(array('id'=>$user['id']))->data($data)->save();
                
			//创建登录信息
			session('username',$user['username']);
			session('mobile',$user['mobile']);
			session('userid',$user['id']);
			session('level',$user['level']);
		   
			cookie('username',$user['username'],36000);
			cookie('mobile',$user['mobile'],36000);
			cookie('userid',$user['id'],36000);
			cookie('level',$user['level'],36000);
		
			die(return_msg('y',"登录成功!<script type='text/javascript'> setTimeout('location=\"$referer\"',1000);</script>"));
                
           
        }else{
			
			$this->page_title      = '用户登录 - 中科教科学教育平台 - 中国科学院科学教育联盟';
            $this->display('login');
        }
    }



    function verify(){
        //自定义配置项
        $config = array(
            'fontSize'  => 16,
            'length'    => 4,
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  true,            // 是否添加杂点
            'imageH'    =>  40,              // 验证码图片高度
            'imageW'    =>  120,             // 验证码图片宽度
        );
        ob_clean();
        $verify = new Verify($config);
        $verify->entry();
    }

    //注册
    public function register(){
        if(isset($_POST['dosubmint'])){
			
			
            //先判断验证码
            $info       = I('info');
			$username   = $info['username'];
            $mobile     = $info['mobile'];
            $code       = $info['mobile_code'];
            $password   = $info['password'];
            $password2  = $info['password2'];
            $yzm_code   = $info['yzm_code'];
            $verify = new Verify();
            if(!$verify->check($yzm_code)){
                die(return_msg('n','您输入的验证码有误,请重新输入！'));
            }

            //验证手机验证码
            $checkcode = $_SESSION['code'];
            if ($code != $checkcode) {
                die(return_msg('n','您输入的手机校验码有误,请重新输入！'));
            }

            $check = M('member')->where(array('mobile'=>$info['mobile']))->find();
            if($check){
                die(return_msg('n','该手机号已注册,请直接登录！'));
            }

            //验证用户名唯一
            $res = M('member')->where("username = '$username'")->find();
            if($res){
                die(return_msg('n','该用户名已被注册！'));
            }

            //验证密码
            if($password !== $password2){
                die(return_msg('n','两次密码不一样,请重新输入！'));
            }
            $data = array(
               'username'           => $info['username'],
               'mobile'             => $info['mobile'],
               'password'           => md5($info['password']),
               'reg_time'           => NOW_TIME,
               'last_login_time'    => NOW_TIME,
               'last_login_ip'      => get_client_ip()
            );
            $res = M('member')->add($data);
            if($res){
				
				//注册成功,执行登陆
				session('username',$info['username']);
				session('mobile',$info['mobile']);
				session('userid',$res);
				session('level',0);
			   
				cookie('username',$info['username'],36000);
				cookie('mobile',$info['mobile'],36000);
				cookie('userid',$res,36000);
				cookie('level',0,36000);
				
                //注册成功,跳转到原访问页面
                $refer = I('referer');
                die(return_msg('y',"注册成功!<script type='text/javascript'> setTimeout('location=\"$refer\"',1000);</script>"));
            }else{
                die(return_msg('n','保存申请信息失败，请重试！'));
            }
        }else{
			
			$this->page_title      = '用户注册 - 中科教科学教育平台 - 中国科学院科学教育联盟';
            $this->display('register');
        }
    }

    //发送验证码
    public function send_code(){
        //获取传递手机号码
        $mobile = I('mobile');
        session_start();
        $code = rand(1000, 9999);
        $_SESSION['code'] = $code;
        //设置session过期时间
        $time = 5*60;
        setcookie(session_name(),session_id(),time()+$time);
        $res = sendTemplateSMS($mobile, array($code,5), "219482"); //手机号码，替换内容数组，模板ID
		// var_dump($res);
        if ($res==0) {
			die(return_msg('y','发送成功！'));
        } else {
        	die(return_msg('n','发送失败，请重试！'));
        }
    }

    //退出登录
    public function loginOut(){
        session(null);
        cookie(null);
        header("location: ".U('Login/check_login'));
    }

    //找回密码
    public function find_pwd(){
        $this->page_title      = '找回密码 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }

    //找回密码验证手机号
    public function check_mobile(){
        $mobile         = $_POST['mobile'];
        $db             = M('member');
        $arr_mobile     = $db->field('mobile')->select();
        $arr_mobile     = i_array_column($arr_mobile,'mobile');

        if(in_array($mobile,$arr_mobile)){
            echo 1;
        }else{
            echo 0;
        }
    }

    //验证短信验证码
    public function check_mcode(){
        $info           = I('info');
        $mobile_code    = $info['mobile_code'];
        $url            = 'http://'.$_SERVER['HTTP_HOST'].'/Login/reset_pwd/m/'.$info['mobile'].'.html';
        //验证手机验证码
        $checkcode   = $_SESSION['code'];
        if ($mobile_code != $checkcode) {
            die(return_msg('n',"您输入的手机校验码有误,请重新输入！<script type='text/javascript'> setTimeout('location=\\'javascript:history.go(0)\\'',2000);</script>"));
        }else{
            die(return_msg('y',"正在跳转中,请稍后!<script type='text/javascript'> setTimeout('location=\\'{$url}\\'',1000);</script>"));
        }
    }

    public function reset_pwd(){

        if(isset($_POST['dosubmint'])){
            $db         = M('member');
            $info       = I('info');
            $mobile     = $info['mobile'];
            $password   = $info['password'];
            $password2  = $info['password2'];
            $yzm_code   = $info['yzm_code'];
            //验证验证码
            $verify     = new Verify();
            if(!$verify->check($yzm_code)){
                die(return_msg('n','您输入的验证码有误,请重新输入！'));
            }

            //验证密码
            if($password !== $password2){
                die(return_msg('n','两次密码不一样,请重新输入！'));
            }
            $password           = md5($info['password']);
            $data['password']   = $password;
            $res                = $db->where("mobile = '$mobile'")->save($data);
            if($res){
                die(return_msg('y',"修改密码成功!<script type='text/javascript'> setTimeout('location=\\'javascript:history.go(-2)\\'',2000);</script>"));
            }else{
                die(return_msg('n',"修改密码失败!"));
            }
        }else{
            $this->page_title   = '修改密码 - 中科教科学教育平台 - 中国科学院科学教育联盟';
            $db             = M('member');
            $mobile         = I('m');
            $user           = $db->field('username')->where("mobile = '$mobile'")->find();
            $username       = $user['username'];
            $this->username = $username;
            $this->mobile   = $mobile;

            $this->display();
        }
    }

    /**************************删除 start***************************************/
    //模糊预约课程
    /*public function apply_service(){
        $id   = I('id');
        $user = D('member')->where("id = '$id'")->find();
        //创建登录信息
        session('username', $user['username']);
        session('mobile', $user['mobile']);
        session('userid', $user['id']);
        session('level', $user['level']);
        cookie('username', $user['username'], 36000);
        cookie('mobile', $user['mobile'], 36000);
        cookie('userid', $user['id'], 36000);
        cookie('level', $user['level'], 36000);

        if(isset($_POST['dosubmint'])){
            $db     = M('member_apply_service');
            $aid	= I('aid');
            $info	= I('info');
            $info['manager_sex']	= I('manager_sex');
            $info['contacts_sex']	= I('contacts_sex');
            $info['apply_time']		= time();
            $info['apply_user']     = $user['id'];
            $id     = $user['id'];

            //判断学校是否已申请
            $find = $db->where(array('school_name'=>$info['school_name'],'id'=>array('neq',$aid)))->find();
            if($find){
                die(return_msg('n','该学校已存在申请记录！'));
            }else{
                if($aid){
                    $info['status']		= 0;
                    $save = $db->data($info)->where(array('id'=>$aid))->save();
                    die(return_msg('n',$save));
                }else{
                    $save = $db->add($info);
                    die(return_msg('n',$id));
                }
                if($save){
                    //$this->send_code_apply();
                    die(return_msg('y','已提交申请，等待审核！<br><a href="javascript:;" onClick="goback()" class="btnclose">返回</a>'));
                }else{
                    die(return_msg('n','保存申请信息失败，请重试！'));
                }
            }

        }else {
            $nid  = I('nid');

            if ($nid) {
                //模糊预约
                $this->nid = $nid;
                header("location: " . U('Member/book_lecture', array('nid' => $nid)));
            } else {
                //申请支撑服务校
                $this->page_title	= '中国科学院科学教育联盟支撑服务校申请表 - 中科教科学教育平台 - 中国科学院科学教育联盟';
                $db                 = M('member_apply_service');
                //获取我的申请记录
                $where               = array();
                $where['apply_user'] = $_SESSION["userid"];
                $where['status']     = array('neq', 1);
                $this->row           = $db->where($where)->find();
                $this->provincelist  = C('PROVINCE');
                $this->type          = 2;
                var_dump($_COOKIE);
                var_dump($this->row);

                $this->display("Member/apply_service");
            }
        }
    }*/
    /**************************删除 end  ***************************************/
}