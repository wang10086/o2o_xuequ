<?php

/**
 * Date: 2017/11/19
 * Time: 22:11
 */
namespace index\Model;
use Think\Model;
class MemberModel extends Model{
    //检测用户名和密码是否匹配
    public function checkLogin($mobile,$password){
        $info = $this->where("mobile='$mobile'")->find();
        if(empty($info)){
            die(return_msg('n','该手机号未注册,请先注册！'));
        }
        if($info['password'] == $password){
            //更新最后登陆时间
            $arr = array(
                "last_login_time" => NOW_TIME,
                "last_login_ip" => ip2long($_SERVER['REMOTE_ADDR']),//最后登录客户端ip
            );
            $this->save($arr);
        }
    }

    //自动验证
    protected $_validate = array(
        //验证用户名,手机号,和密码
        array('username','require','用户名不能为空',1,'regex',3),
        array('mobile','require','手机号不能为空',1,'regex',3),
        array('password2', 'password', '两次密码不一致', 1, 'confirm', 3),
    );
    /*//自动完成
    protected $_auto = array(
        //自动补全注册时间 , 最近登陆时间,最近登陆IP
      array('reg_time','time',1,'function'),
      array('last_login_time','time',1,'function'),
      array('last_login_ip',"get_ip",1,'callback')
    );

    public function get_ip(){
        $ip = $_SERVER['REMOTE_ADDR'];
        echo $ip;
    }*/

    //add
    public function add($data){
        $this->add($data);
    }
    //通过手机号获取用户信息
    public function get_info_by_mobile($mobile){
        return $this->where(['mobile'=>$mobile])->find();
    }
    //修改用户登录信息
    public function edit($mobile){
        $data['last_login_time'] = NOW_TIME;
        $data['last_login_ip'] = ip2long($_SERVER['REMOTE_ADDR']);
        $this->where("mobile = '$mobile'")->data($data)->save();
    }
}