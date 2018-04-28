<?php
/**
 * Date: 2018/4/10
 * Time: 14:32
 */

namespace Main\Controller;


class AjaxController extends BaseController{

    public function add_lecture(){
        $name   = I('name');
        $db     = M('article');
        $res    = M('res');
        $id     = $res->where(array('title'=>$name))->getField('id');
        $article= $db->where(array('expert_id'=>$id))->field('id','title')->select();
        $this->ajaxreturn($article,'JSON');
    }

    public function check_zj(){
        $name   = I('name');
        $db     = M('res');
        $id     = $db->where(array('title'=>$name))->getField('id');
        echo $id;
    }
}