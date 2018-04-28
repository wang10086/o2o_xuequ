<?php
/**
 * Date: 2017/11/14
 * Time: 23:40
 */

namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;


class EducationController extends BaseController{

    //右侧栏数据
    public function _initialize(){
        $this->data_right();
    }

    //科学教育专题
    public function education(){
        //科学教育专题
        $kind_id                = 93;
        $col                    = '['.$kind_id.']';
        $where['col']           = array('like',"%$col%");
        $db                     = M('article');
        $data                   = $db->field("id,sort,title,pic,pic_id,col,module")->where($where)->order('sort desc')->select();
        $this->data             = $data;

        $this->page_title      = '科学教育专题';
        $this->display('education');
    }

    //老专家演讲团index
    public function yanjiangtuan(){
        $this->page_title      = '中国科学院老科学家科普演讲团';
        $this->display('yanjiangtuan');
    }

    //海淀少科院
    public function shaokeyuan(){
        $kind                   = D('kind')->where("title like '%海淀区少科院%'")->find();
        $kind_id                = $kind['id'];
        $col                    = '['.$kind_id.']';
        $where['col']           = array('like',"%$col%");
        $db                     = M('article');
        $data                   = $db->field("id,sort,title,pic,pic_id,col,module,create_time")->where($where)->order('sort desc,create_time desc')->limit(7)->select();
        $this->data             = $data;
        $this->page_title       = '海淀少科院 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display('shaokeyuan');
    }

    //紫金山论坛
    public function zjs_luntan(){
        $this->page_title      = '紫金山论坛 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display('zjs_luntan');
    }

    //科学教育专题首页"更多"
    public function more_edu(){
        $kind_id                = 93;
        $col                    = '['.$kind_id.']';
        $where['col']           = array('like',"%$col%");
        $db                     = M('article');
        $data                   = $db->field("id,sort,title,pic,pic_id,col,module,create_time")->where($where)->order('sort desc')->select();
        $this->data             = $data;
        $this->page_title      = '科学教育专题';
        $this->display('more_edu');
    }

    //科学教育专题首页"详情"
    public function sky_detail(){
        $id                     = I('id');
        $module                 = I('module');
        $m                      = P::TYPE_TRAVEL_NEWS;//旅行类型的

        if($module == $m){
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
            $this->page_title = '科学教育专题';
            $this->display('edu_tra');
        }else {
            $data                   = M('article')->field("id,title,keywords,description,content,pic,col,pic_id,ext_links,create_time,source")->where("id = '$id'")->find();
            //获取图片信息
            $pictures   = M("attachment")->field("filepath")->where("releid = '$id'")->select();
            $pic        = i_array_column($pictures, 'filepath');
            $this->data = $data;
            $this->pic  = $pic;

            $this->page_title = '科学教育专题';
            $this->display('edu_detail');
        }
    }

    public function edu_detail(){
        $this->page_title       = "科学教育专题";
        $id                     = I('id');
        $module                 = I('module');
        $p                      = P::TYPE_PIC_NEWS;//大图片类型
        $data                   = M('article')->field("id,title,keywords,description,content,pic,col,pic_id,ext_links,create_time,source")->where("id = '$id'")->find();
        if($module == $p){
            //大图片类型
            //获取图片
            $pictures               = M("attachment")->field("filename,filepath")->where("releid = '$id' && module = '$module'")->select();
            $this->data             = $data;
            $this->picture          = $pictures;
            $this->display('edu_pic');die;
        }
    }
}