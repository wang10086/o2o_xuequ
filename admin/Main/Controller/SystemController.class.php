<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;


class SystemController extends BaseController {

    /*网站配置*/
    public function config(){

        $db = M('config');

        $show = I('show',0);

        $where = array();
        if($show==0){
            $where['conf_key'] = array('in','we_media,by,logo,site_name,site_path,icp,keyword');
        }


        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';


        //查表
        $this->datalist = $db->where($where)->order('id ASC')->limit($page->firstRow . ',' . $page->listRows)->select();


        $this->show  = $show;
        $this->display('config');

    }



    /*更新配置*/
    public function edit_config(){

        $db = M('config');
        $id = I('id');
        $show = I('show',0);

        if(isset($_POST['dosubmit'])){

            $info = I('info','');

            if($id){
                $op = $db->data($info)->where(array('id'=>$id))->save();
            }else{
                $op = $db->add($info);
            }

            if($op){
                $this->success('保存成功！',U('System/config',array('show'=>1)));
            }else{
                $this->error('保存失败！');
            }

        }else{
            $this->show  = $show;
            $this->row   = $db->find($id);
            $this->display('edit_config');
        }


    }





    /*所有分类*/
    public function kind(){

        $db = M('kind');

        $this->id = I('id','');
        $this->bt = I('bt','');
        $this->pid = I('pid','-1');
        $this->type = I('type',1);


        $where = array();
        $where['status'] = 1;
        $where['type']   = $this->type;
        if($this->id) $where['id'] = $this->id;
        if($this->bt) $where['title'] = array('like','%'.$this->bt.'%');
        if($this->pid != '-1') $where['pid']    = $this->pid;


        $post = $db->where(array('status'=>1))->GetField('id,title',true);

        if($this->bt || $this->id){
            //分页
            $pagecount = $db->where($where)->count();
            $page = new Page($pagecount, P::PAGE_SIZE);
            $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';

            $datalist = $db->where($where)->order('`sort` DESC,id ASC')->limit($page->firstRow . ',' . $page->listRows)->select();
            foreach($datalist as $k=>$v){
                $level = array('1'=>'一级分类','2'=>'二级分类','3'=>'三级分类');
                $datalist[$k]['level_name'] = $level[$v['level']];
                $datalist[$k]['pid_name']   = $post[$v['pid']];
            }
        }else{
            $type = $this->type;
            $datalist = getTree($type,'','',0);

            foreach($datalist as $k=>$v){
                $level = array('1'=>'一级分类','2'=>'二级分类','3'=>'三级分类');
                $datalist[$k]['level_name'] = $level[$v['level']];
                $datalist[$k]['pid_name']   = $post[$v['pid']];
                $datalist[$k]['tab']        = fortext($v['level']-1,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            }
        }

        $this->kindtype = C('LANMU');
        $this->datalist = $datalist;
        $this->display('kind');

    }





    /*删除分类*/
    public function kind_del(){
        $db = M('kind');

        $id = I('id',0);
        if($id){
            $iddel = $db->where(array('id'=>$id))->delete();
            if($iddel){
                $this->success('删除成功！',U('System/kind'));
            }else{
                $this->error('删除失败！');
            }
        }else{
            $this->error('数据不存在！');
        }
    }


    /*编辑分类*/
    public function kind_edit(){
        $db = M('kind');

        if(isset($_POST['dosubmit'])){

            $infos = I('info','');
            //$infos['desc'] = stripslashes($_POST['content']);

            $pid   = I('pid',0);

            if($pid){
                $up = $db->find($pid);
                $infos['pid']   = $pid;
                $infos['level'] = $up['level']+1;
            }else{
                $infos['pid']   = 0;
                $infos['level'] = 1;
            }

            $editdate = intval(I('editdate',0));

            if(!$infos['title'])  $this->error('分类名称不能为空！',I('referer',''));

            if(!$editdate){
                $newid = $db->add($infos);
            }else{
                if($infos['pid']==$editdate)   $this->error('上级分类错误！',I('referer',''));

                $newid = $db->data($infos)->where(array('id'=>$editdate))->save();

            }

            if($newid){
                $this->success('保存成功！',I('referer',''));
            }else{
                $this->error('保存失败！',I('referer',''));
            }

        }else{
            $id = I('id', -1);
            $this->type = I('type',1);
            $this->row  = $db->find($id);

            $datalist = getTree($this->type,0,1);	  //只开放一级分类
            foreach($datalist as $k=>$v){
                $datalist[$k]['level_name'] = $level[$v['level']];
                $datalist[$k]['pid_name']   = $post[$v['pid']];
                $datalist[$k]['tab']        = fortext($v['level']-1);
            }

            $this->datalist = $datalist;

            $this->display('kind_edit');
        }
    }

    //网站流量管理
    public function counter(){
        $db             = M('zkj_counter');
        //联盟数据
        $data           = M("kjlm_counter")->select();
        //分页
        $pagecount = $db->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';

        $datalist       = $db->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach ($datalist as &$value){
            foreach ($data as $v ){
                if ($value['date'] == $v['date']){
                    $value['kjlm_counter'] =& $v['kjlm_counter'];
                }
            }
        }
        $this->datalist = $datalist;
        $this->display();
    }


}