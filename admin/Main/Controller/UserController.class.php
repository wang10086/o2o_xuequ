<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class UserController extends BaseController {

    /*
    //企业列表
    public function company(){

        $db = M('company');
        $this->company_name = I('company_name','');
        //分页
        if($this->company_name)  $where['company_name'] = array('like','%'.$this->company_name.'%');

        if (C('RBAC_SUPER_ADMIN') == cookie('userid')){

        }


        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';

        $this->companylist = $db->where($where)->order($this->orders())->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->display('company');
    }

    //编辑企业
    public function company_edit(){
        $db = M('company');

        if(isset($_POST['dosubmit'])){
            $infos = I('info','');
            $editid = I('editid',0);
            if(!$editid){
                $newid = $db->add($infos);
                if($newid){
                    $this->success('保存成功！',I('referer',''));
                }else{
                    $this->error('保存失败！',I('referer',''));
                }
            }else{
                $isedit = $db->data($infos)->where(array('id'=>$editid))->save();
                $newid = $editid;
                if($newid){
                    $this->success('保存成功！',I('referer',''));
                }else{
                    $this->error('保存失败！',I('referer',''));
                }
            }
        }else{
            $id = I('id',0);
            $this->row = $db->find($id);
            $this->display('company_edit');
        }
    }
    */

    //管理员列表
    public function index(){
        $db = M('admin');

        //角色
        $this->rolelist = M('role')->where()->select();

        //条件
        $this->status  = I('status','');
        $this->pid     = I('pid','');
        $this->role    = I('role','');
        $this->user    = I('user','');
        $this->name    = I('name','');
        if(!empty($this->status))       $where['a.status'] = $this->status;
        if(!empty($this->pid))          $where['a.company_id'] = $this->pid;
        if(!empty($this->role))         $where['a.roleid'] = $this->role;
        if(!empty($this->user))         $where['a.username'] = array('like','%'.$this->user.'%');
        if(!empty($this->name))         $where['a.name'] = array('like','%'.$this->name.'%');

        //如果为非开发者权限附加以下条件
        if(rolemenu(array('User/add'))){
            //$where['roleid'] = array('gt',cookie('roleid'));
        }else{
            $where['id'] = cookie('userid');
        }


        //查询字段
        $field = 'a.id as userid,a.username,a.name,a.mobile,a.email ,a.update_time,a.roleid,a.parentid,a.status,a.avatar,r.id,r.name as remark';

        //分页
        $pagecount = $db->table('__ADMIN__ as a')->field($field)->join('__ROLE__ as r on a.roleid = r.id','LEFT')->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';

        //查询
        $users = $db->table('__ADMIN__ as a')->field($field)->join('__ROLE__ as r on a.roleid = r.id','LEFT')->where($where)->order($this->orders())->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($users as $k=>$v){
            $users[$k]['avatar'] = $v['avatar'] ? C('CDN_URL').$v['avatar'] : C('CDN_URL').'admin/assets/img/avatar.png';
        }

        $this->users = $users;
        $this->display('index');

    }

    //新增管理员
    public function add(){
        $db = M('admin');
        if(isset($_POST['dosubmit'])){

            //获取POST值
            $info     = I('info');
            //密码
            $passwordinfo = password(I('password_1'));
            $info['password']      = $passwordinfo['password'];
            $info['encrypt']       = $passwordinfo['encrypt'];

            $info['username']      = trim($info['username']);
            $info['input_time']    = time();
            $info['last_login_ip'] = get_client_ip();

            //判断用户是否可用
            $isreg = M('admin')->where(array('username'=>$info['username']))->find();
            if($isreg){
                $this->error('用户名已存在！');
            }else{
                $add = M('admin')->add($info);
                if($add){
                    $this->success('注册成功！',I('referer',''));
                }else{
                    $this->error('注册失败！');
                }
            }


        }else{
            $id = I('id', 0);



            $rolewhere = array();
            $rolewhere['id'] = array('gt',cookie('roleid'));
            $this->roles = M('role')->where($rolewhere)->select();
            $this->companylist = M('company')->select();

            //$this->comid = cookie('comid');

            $this->pagetitle = '新增用户';
            $this->row = false;
            $this->userrole = array();

            $this->display('add');
        }
    }


    //编辑管理员
    public function edit(){
        $this->user_show = 'class="active"';
        $db = M('admin');
        $id = I('id',0);
        $id = $id ? $id : cookie('userid');

        if(isset($_POST['dosubmit']) && $id){

            $info = I('info','');
            $info['update_time']    = time();

            $isedit = $db->data($info)->where(array('id'=>$id))->save();

            //保存角色关系
            roleuser($id);


            //判断是否存在审核记录
            if($id!=cookie('userid')){

                //判断是否具备审核权限
                $where = '(user like "%['.cookie('userid').']%"  OR  role like "%['.cookie('roleid').']%") AND id = 1';
                $auth = M('apply_config')->where($where)->find();
                if($auth){
                    //判断是否存在申请记录
                    $where = array();
                    $where['mod']    = 1;
                    $where['res_id'] = $id;
                    $where['app_result'] = 0;
                    $apply = M('apply')->where($where)->find();
                    if($apply){
                        $status = $info['status'] ? 2 : 1;
                        $data = array();
                        $data['app_result']  = $status;
                        $data['ex_user']     = cookie('userid');
                        $data['ex_time']     = time();
                        M('apply')->where(array('id'=>$apply['id']))->data($data)->save();
                    }
                }

            }


            $this->success('保存成功！');

        }else{

            $rolewhere = array();
            //$rolewhere['id'] = array('gt',cookie('roleid'));
            $this->roles = M('role')->where($rolewhere)->select();

            $this->row = $db->find($id);
            if (!$this->row) {
                $this->error('用户不存在！',I('referer',''));
            }
            $this->pagetitle = '修改资料';
            $this->display('edit');
        }
    }


    //修改密码
    public function password(){
        $db = M('admin');
        $this->user_show = 'class="active"';
        if(isset($_POST['dosubmit'])){

            $editdate = I('editdate',0);

            //加入随机字符串重组多重加密密码
            $passwordinfo = password(I('password_1'));
            $info['password'] = $passwordinfo['password'];
            $info['encrypt'] = $passwordinfo['encrypt'];

            $isedit = $db->data($info)->where(array('id'=>$editdate))->save();
            if($isedit){
                $this->success('修改成功！',I('referer',''));
            }else{
                $this->error('修改失败！',I('referer',''));
            }

        }else{
            $id = I('id', -1);
            $this->row = $db->find($id);
            $this->display('password');
        }
    }

    //管理员注册验证
    public function public_checkname_ajax(){
        $username = I('username',0);;

        //判断会员是否存在
        $db = M('admin');
        if($db->where(array('username'=>$username))->select()) {
            exit('0');
        }else {
            exit('1');
        }
    }

    //管理员注册邮箱验证
    public function public_checkmail_ajax(){
        $email = I('email',0);;

        //判断会员是否存在
        $db = M('admin');
        if($db->where(array('email'=>$email))->select()) {
            exit('0');
        }else {
            exit('1');
        }
    }







    public function public_getuserkeywords(){
        $user =  M('admin')->where(array('status'=>0,'roleid'=>array('in','2,3,4,5')))->order('company DESC')->select();
        $key = array();
        foreach($user as $k=>$v){

            $company = $v['company'] ? $v['company'] : '未知单位';
            $post    = $v['post'] ? ' ('.$v['post'].')' : '';

            $key[$k]['id']         = $v['id'];
            $key[$k]['pinyin']     = strtopinyin($company.$v['name'].$post);
            $key[$k]['material']   = $company.' - '.$v['name'].$post;
            $key[$k]['title']      = $v['name'];
        }
        echo json_encode($key);
    }

}
