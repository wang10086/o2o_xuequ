<?php
//权限管理
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class RbacController extends BaseController {

    public function role() {

        $db = M('role');
        $page = new Page($db->count(), PAGE_NUM);
        $this->pages = $page->show();

        $this->roles = $db->order($this->orders())->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->display('role');
    }

    public function addrole() {

        $db = M('role');
        if(isset($_POST['dosubmit'])){

            $info = I('info','');
            $id = I('id',0);
            if(!$id){
                $isadd = $db->add($info);
                if($isadd) {
                    $this->success('添加成功！',I('referer',''));
                } else {
                    $this->error('添加失败：' . $db->getError(),I('referer',''));
                }
            }else{
                $isedit = $db->data($info)->where(array('id'=>$id))->save();
                if($isedit) {
                    $this->success('修改成功！',I('referer',''));
                } else {
                    $this->error('修改失败：' . $db->getError(),I('referer',''));
                }
            }

        }else{
            $id = I('id', 0);

            if (!$id) {
                $this->pagetitle = '新增角色';
                $this->row = false;
            } else {
                $this->pagetitle = '修改角色';
                $this->row = $db->find($id);
                if (!$this->row) {
                    $this->error('无此数据！',I('referer',''));
                }
            }
            $this->rolelist = $db->select();
            $this->display('addrole');
        }
    }



    public function node() {
        $this->node_show = 'class="active"';
        $db = M('node');
        $rs = $db->order('level asc, sort desc')->select();
        $this->pagetitle = '节点';
        $this->nodes = merge_node($rs);

        $this->display('node');
    }



    public function addnode() {
        $db = M('node');
        if(isset($_POST['dosubmit'])){

            $info = I('info','');
            $id = I('id',0);

            if(!$id){
                $info['pid'] = I('pid',0);
                $info['level'] = I('level',1);

                $isadd = $db->add($info);
                if($isadd) {
                    $this->success('添加成功！');
                } else {
                    $this->error('添加失败：' . $db->getError(),I('referer',''));
                }
            }else{
                $info['id'] = $id;

                $isedit = $db->save($info);
                if($isedit) {
                    $this->success('修改成功！',I('referer',''));
                } else {
                    $this->error('修改失败：' . $db->getError(),I('referer',''));
                }
            }

        }else{
            $id = I('id', 0);
            $this->level = I('level', 1);
            $this->pid = I('pid', 0);

            if ($this->level > 1) {
                $this->prnt = $db->find($this->pid);
            } else {
                $this->prnt = false;
            }
            $this->type = '';
            switch($this->level) {
                case 1:
                    $this->type = '应用';
                    break;
                case 2:
                    $this->type = '控制器';
                    break;
                case 3:
                    $this->type = '方法';
                    break;
            }
            if (!$id) {
                $this->pagetitle = '新增' . $this->type;
                $this->row = false;
            } else {
                $this->pagetitle = '修改' . $this->type;
                $this->row = $db->find($id);
                if (!$this->row) {
                    $this->error('无此数据！',I('referer',''));
                }
            }
            $this->display('addnode');
        }
    }

    public function priv() {
        $this->role_show = 'class="active"';
        if (isset($_POST['dosubmit'])) {

            $access = I('access');
            $roleid = I('roleid');
            $db = M('access');

            $db->where("`role_id`='".$roleid."'")->delete();
            $data = array();
            foreach($access as $row) {
                $tmp = explode('_', $row);
                $data[] = array(
                    'role_id' => $roleid,
                    'node_id' => $tmp[0],
                    'level'   => $tmp[1]
                );
            }
            if ($db->addAll($data)) {
                $this->success('权限配置成功！',I('referer',''));
            } else {
                $this->error('保存失败！',I('referer',''));
            }

        } else {
            $roleid = I('roleid');
            if (!$roleid) $this->error('非法操作！',I('referer',''));
            $this->roleid = $roleid;

            $role = M('role')->find($roleid);
            $this->rolename = $role['remark'].'('.$role['name'].')';

            $access  = M('access')->where("`role_id`='".$roleid."'")->getField('node_id', true);

            $rs = M('node')->order('level asc, sort desc')->select();
            $this->nodes = merge_node($rs, $access);
            $this->pagetitle = '配置权限';
            $this->display('priv');
        }
    }


    //审核配置
    public function apply_config(){
        $db = M('apply_config');
        $this->user_show = 'class="active"';
        $datalist = $db->select();
        foreach($datalist as $k=>$v){
            $username = array();
            $user = explode(',',$v['user']);

            foreach($user as $kk=>$vv){
                //查询用户名称
                $id = rtrim(ltrim($vv,'['),']');
                $us = M('admin')->find($id);
                $username[] = $us['name'];
            }
            $datalist[$k]['user'] = implode(',',$username);

            $rolename = array();
            $role = explode(',',$v['role']);
            foreach($role as $kk=>$vv){
                //查询用户名称
                $id = rtrim(ltrim($vv,'['),']');
                $us = M('role')->find($id);
                $rolename[] = $us['name'];
            }
            $datalist[$k]['role'] = implode(',',$rolename);

        }

        $this->datalist = $datalist;

        $this->display('apply_config');

    }



    public function apply_edit(){

        $db = M('apply_config');


        $this->id = I('id', -1);
        $app = $db->find($this->id);

        $this->rolelist = M('role')->GetField('id,name',true);   //where(array('id'=>array('not in','2,3,4,5')))->

        $this->userlist = M('admin')->where(array('roleid'=>array('not in','2,3,4,5')))->GetField('id,name',true);


        $user = explode(',',$app['user']);
        $newuser = array();
        foreach($user as $kk=>$vv){
            $newuser[] = rtrim(ltrim($vv,'['),']');
        }

        $role = explode(',',$app['role']);
        $newrole = array();
        foreach($role as $kk=>$vv){
            $newrole[] = rtrim(ltrim($vv,'['),']');
        }


        $this->arr_role = $newrole;
        $this->arr_user = $newuser;

        $this->display('apply_edit');

    }



    public function save_app(){
        $db   = M('apply_config');
        $id   = I('id');
        $user = I('user');
        $role = I('role');



        $users = $username = array();
        $userdata = explode('-',$user);
        foreach($userdata as $k=>$v){
            if($v){
                $users[] = '['.$v.']';

                //查询用户名称
                $us = M('admin')->find($v);
                $username[] = $us['name'];

            }
        }
        $userstr = implode(',',$users);

        $roles = $rolename = array();
        $roledata = explode('-',$role);
        foreach($roledata as $k=>$v){
            if($v){
                $roles[] = '['.$v.']';

                //查询角色名称
                $us = M('role')->find($v);
                $rolename[] = $us['name'];
            }
        }
        $rolestr = implode(',',$roles);

        $data = array();
        $data['role']   = $rolestr;
        $data['user']   = $userstr;

        $db->data($data)->where(array('id'=>$id))->save();

        $return = array();
        $return['role'] = implode(',',$rolename);
        $return['user'] = implode(',',$username);

        echo json_encode($return,true);

    }

}