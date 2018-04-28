<?php
namespace Main\Controller;
use Think\Controller;
use Sys\P;

class DeleteController extends BaseController {



    //删除后台用户
    public function user(){

        $user = M('admin')->find(I('id'));

        if($user['username']==C('RBAC_SUPER_ADMIN')){
            $this->error('噢~超人不能被终结！');
        }else{
            $iddel = D('Db')->db_delete('admin',array('id'=>I('id')));
            if($iddel==P::SUCCESS){
                $this->success('删除成功！');
            }else{
                $this->error('删除失败！');
            }
        }
    }

    //删除人员
    public function account(){
        $iddel = D('Db')->db_delete('account',array('id'=>I('id')));
        if($iddel==P::SUCCESS){
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }

    //删除渠道
    public function company(){

        $company = M('admin')->where(array('company_id'=>I('id')))->select();

        if($company){
            $this->error('请先把企业人员解决了再试！');
        }else{
            $iddel = D('Db')->db_delete('company',array('id'=>I('id')));
            if($iddel==P::SUCCESS){
                $this->success('删除成功！');
            }else{
                $this->error('删除失败！');
            }
        }
    }


    //删除节点
    public function node(){
        $iddel = D('Db')->db_delete('node',array('id'=>I('id')));
        if($iddel==P::SUCCESS){
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }

    //删除角色
    public function role(){
        $iddel = D('Db')->db_delete('role',array('id'=>I('id')));
        if($iddel==P::SUCCESS){
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }


    //删除计划
    public function pro(){
        $iddel = M('plan')->where(array('plan_id'=>I('id')))->data(array('isdel'=>1))->save();
        if($iddel){
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }



}
