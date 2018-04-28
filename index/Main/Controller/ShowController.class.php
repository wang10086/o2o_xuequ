<?php
/**
 * Date: 2017/11/15
 * Time: 0:29
 */

namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;


class ShowController extends BaseController{

    //右侧栏数据
    public function _initialize(){
        $this->data_right();
    }

    //科教活动的展示
    public function kejiao_show(){
        $this->page_title       = '科教活动 - 中科教科学教育平台 - 中国科学院科学教育联盟';

        $kind_id                = 94;
        $col                    = '['.$kind_id.']';
        $where['col']           = array('like',"%$col%");
        $db                     = M('article');

        //分页
        $pagecount              = $db->where($where)->count();
        $page                   = new Page($pagecount, 8);
        $this->pages            = $pagecount>8 ? $page->show():'';
        $data                   = $db->field("id,sort,title,pic,pic_id,col,module,create_time")->where($where)->limit($page->firstRow . ',' . $page->listRows)->order("sort desc")->select();
        $time                   = NOW_TIME;

        /*最新上传的文章显示new*/
        $t                      = 10*24*3600;
        foreach ($data as &$v){
            if ($time-$v['create_time'] < $t){
                $v['type'] = 'new';
            }else{
                $v['type'] = 'old';
            }
        }

        $this->data             = $data;
        $this->display('kejiaohuodong');
    }

    //科教活动展示详情
    public function kejiao(){
        $this->page_title           = '科教活动 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        //接收参数
        $id                         = I('id');
        $module                     = I('module');
        if($module == 4){
            //大图片类型
            $data                   = M('article')->field("id,title,keywords,description,content,pic,col,pic_id,ext_links,create_time,source")->where("id = '$id'")->find();
            //获取图片
            $pictures               = M("attachment")->field("filename,filepath")->where("releid = '$id' && module = '$module'")->select();
            $this->data             = $data;
            $this->picture          = $pictures;
            $this->display('kejiao_pic');die;
        }
        if($module == 14){
            $data                   = M('article')->field("id,title,keywords,description,content,pic,col,pic_id,ext_links,create_time,source")->where("id = '$id'")->find();
            //获取图片
            $pictures               = M("attachment")->field("filename,filepath")->where("releid = '$id' && module = '$module'")->select();
            //获取行程详情
            $days                   = m('goods_days')->where("goods_id = '$id' && module = '$module'")->select();
            $day_arr                = array();
            foreach($days as $key => $value){
                foreach($pictures as $vo){
                    if($vo['filename']      == '第1天' && $key == 0){
                        $value['filepath'][]  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第2天' && $key ==1){
                        $value['filepath'][]  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第3天' && $key ==2) {
                        $value['filepath'][]  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第4天' && $key ==3) {
                        $value['filepath'][]  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第5天' && $key ==4) {
                        $value['filepath'][]  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第6天' && $key ==5) {
                        $value['filepath'][]  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第7天' && $key ==6) {
                        $value['filepath'][]  =& $vo['filepath'];
                    }
                }
                $value['content']           =& str_replace('&lt;p&gt;',"<br />&#12288;&#12288;",$value['content']);
                $day_arr[]                  = $value;
            }

            $this->data             = $data;
            $this->info             = $day_arr;
            $this->display('kejiao_tra');
        }else{
            $data                   = M('article')->field("id,title,keywords,description,content,pic,col,pic_id,ext_links,create_time,source")->where("id = '$id'")->find();
            //获取图片信息
            $pictures               = M("attachment")->field("filepath")->where("releid = '$id'")->select();
            $pic                    = i_array_column($pictures,'filepath');
            $this->data             = $data;
            $this->pic              = $pic;
            $this->display('kejiao');
        }
    }
}