<?php
namespace Main\Controller;
use Think\Controller;
use Org\Util\Rbac;
ulib('phpqrcode.phpqrcode');
use Sys\P;

class IndexController extends BaseController {
	


    public function index(){



        $this->css('date');
        $this->js('sitedate');

        $this->display();
    }





    public function login(){


        $db = M('admin');
        if (isset($_POST['dosubmit'])) {
            //获取POST值
            $username = trim(I('username',''));
            $password = I('password','');

            //执行查询
            $condition = array();
            $condition['email']    = $username;
            $condition['mobile']   = $username;
            $condition['username'] = $username;
            $condition['_logic']   = 'OR';

            $isdate = $db->where($condition)->find();

            if($isdate){

                //核对密码
                $realpwd = $isdate['encrypt'] ? password(trim($password),$isdate['encrypt']) : md5($password);
                if($realpwd==$isdate['password']){

                    if($isdate['status']==1){
                        $this->error('该账号暂不可用！');
                    }

                    //获取角色名称
                    $role = M('role')->find($isdate['roleid']);

                    //获取公司名称
                    //$com = M('company')->find($role['comid']);

                    session(C('USER_AUTH_KEY'),$isdate['id']);

                    if ($isdate['id'] == C('RBAC_SUPER_ADMIN')) session(C('ADMIN_AUTH_KEY'), true);

                    session('username',$username);
                    session('name',$isdate['name']);
                    session('userid',$isdate['id']);
                    session('roleid',$isdate['roleid']);
                    session('rolename',$role['name']);
                    //session('comid',$role['comid']);
                    //session('comname',$com['company']);
                    session('lock',$isdate['lock']);

                    cookie('userid',$isdate['id'],36000);
                    cookie('username',$username,36000);
                    cookie('name',$isdate['name'],36000);
                    cookie('roleid',$isdate['roleid'],36000);
                    //cookie('comid',$isdate['comid'],36000);
                    //cookie('comname',$com['company'],36000);
                    cookie('rolename',$role['name'],36000);
                    cookie('lock',$isdate['lock'],36000);

                    $info['last_login_time'] = time();
                    $info['last_login_ip'] = get_client_ip();
                    //加入随机字符串重组多重加密密码
                    $passwordinfo = password($password);
                    $info['password'] = $passwordinfo['password'];
                    $info['encrypt'] = $passwordinfo['encrypt'];

                    $db->data($info)->where(array('id'=>$isdate['id']))->save();

                    RBAC::saveAccessList();

                    //P($_SESSION);
                    if(I('onlogin')){
                        if(cookie('lock_referer')){
                            header("location: ".cookie('lock_referer')."");
                        }else{
                            header("location: ".U('Index/public_lockscreen','','',true)."");
                        }
                    }else{
                        $this->success('您已成功登陆系统！',U('Index/index'));
                    }

                }else{
                    $this->error('用户名或者密码错误！');
                }

            }else{
                $this->error('用户名或者密码错误！');
            }

            //检查登录
        } else {
            $this->display('login');
        }
    }



    public function reg(){


        $db = M('admin');
        if (isset($_POST['dosubmit'])) {
            //获取POST值
            $info     = I('info');
            //密码
            $passwordinfo = password(I('password_1'));
            $info['password']      = $passwordinfo['password'];
            $info['encrypt']       = $passwordinfo['encrypt'];

            $info['username']      = trim($info['username']);
            $info['input_time']    = time();
            $info['last_login_ip'] = get_client_ip();
            $info['status']        = 1;
            $info['roleid']        = 3;

            //判断用户是否可用
            $isreg = M('admin')->where(array('username'=>$info['username']))->find();
            if($isreg){
                $this->error('用户名已存在！');
            }else{
                $add = M('admin')->add($info);
                if($add){
                    //申请审核
                    apply(1,$add);
                    reg_send_msg($add);
                    $this->success('您的注册资料已提交，等待审核！',U('Index/login'));
                }else{
                    $this->error('注册失败！');
                }
            }


            //检查登录
        } else {
            $this->display('reg');
        }
    }



    public function logout(){
        session(null);
        cookie(null);
        $this->success('您已成功退出系统！',U('Index/login'));
    }



    public function public_lockscreen(){
        session(null);
        cookie('userid',null);
        $this->username = cookie('username');
        cookie('lock_referer',$_SERVER['HTTP_REFERER']);
        $this->display('lockscreen');
    }



    public function public_lock(){
        $lasttime = M('account')->field('update_time')->find(cookie('userid'));
        if(($lasttime['update_time']+C('LOCKSCREEN'))<time()){
            echo 1;
        }else{
            echo 0;
        }
    }


    /****** AJAX返回全部日程表 ******/
    public function public_schedule(){


        if (C('RBAC_SUPER_ADMIN') != cookie('userid')){
            $where = '(p.teacher_id = '.cookie('userid').'  OR  c.user_id = '.cookie('userid').' ) ';
            $rows = M()->table('__TRAIN_PLAN__ as p')->field('p.builddate,p.train_id,p.task,p.plan_id')->join('__COUR__ as c on c.cour_id = p.cour_id')->where($where)->order('p.start_time')->select();
        }else{
            $where = array();
            $rows = M('train_plan')->field('builddate,train_id,task,plan_id')->where($where)->order('start_time')->select();
        }

        $day = date('Y-m-d',time());
        foreach($rows as $k =>$v){

            //显示样式
            if($v['builddate']==$day){
                $style = 'task_red';
                $status = 1;
            }else if($v['builddate']>$day){
                $style = 'task_blue';
                $status = 2;
            }else if($v['builddate']<$day){
                $style = 'task_hui';
                $status = 3;
            }

            $rows[$k]['style'] = $style;
            $rows[$k]['id'] = $v['train_id'];
            $rows[$k]['status'] = $status;

        }
        echo json_encode($rows);

    }

}