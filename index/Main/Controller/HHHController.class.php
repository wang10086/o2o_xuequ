<?php
/**
 * Date: 2017/11/15
 * Time: 0:00
 */

namespace Main\Controller;


class HHHController extends BaseController{

    public function _initialize(){
        $this->data_right();
    }

    //3H
    public function HHH(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';

        //3H工程学校动态名单
        $kind_id        = 96;
        $col            = '['.$kind_id.']';
        $where['col']   = array('like',"%$col%");
        $info           = M('article')->field('id,title,col,pic,module')->where($where)->order("sort desc")->select();
        foreach ($info as &$vo){
            $co             = explode(",",$vo['col']);
            if(in_array('[91]',$co)){
                $vo['url'] = "javascript:;";
            }elseif (in_array('[92]',$co)){
                $vo['url'] = 'javascript:;';
            }elseif (in_array('[93]',$co)){
                $vo['url'] = 'javascript:;';
            }elseif (in_array('[94]',$co)){
                $vo['url'] = 'Show/kejiao';
            }
        }
        $this->info     = $info;

        $this->display('3H');
    }

}