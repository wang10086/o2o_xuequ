<?php
/**
 * Date: 2017/11/14
 * Time: 21:10
 */
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class ResourceController extends BaseController{

    public function _initialize(){
        $this->data_right();
    }

    //高端科教资源
    public function index(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';

        $db           = M('res');
        $this->type   = I('type',0);
        $this->fid    = I('fid','');
        $this->city   = I('city','');
        $this->sys    = I('sys','');
        $this->pro    = I('pro','');
        $this->kw     = I('kw','');
        if ($this->type) cookie('type',$this->type);
        $type = $_COOKIE['kl_course_type'];

        $where  = array();
        if($type)         $where['col']    = array('like','%['.$type.']%');
        if($this->kw)     $where['title']  = array('like','%'.$this->kw.'%');
        if($this->fid)    $where['fields'] = array('like','%'.$this->fid.'%');
        if($this->city)   $where['city']   = array('like','%'.$this->city.'%');
        if($this->sys)    $where['system'] = array('like','%'.$this->sys.'%');
        if($this->pro)    $where['pro']    = array('like','%'.$this->pro.'%');

        //分页
        $pagecount      = $db->where($where)->count();
        $page           = new Page($pagecount, 12);
        $this->pages    = $pagecount>12 ? $page->show():'';


        //查询数据
        if(!$this->type && !$this->fid && !$this->city && !$this->sys && !$this->pro && !$this->kw){
            //$types        = array(1,2,3,6,7,8,9,10);
            $types          = array(1,2,6,7,8,10);
            $datalist_old   = array();
            $datalist       = array();
            //资源首页求数据
            foreach ($types as $k => $v){
                $datalist_old[] = $db ->where("type = '$v'")->order('sort DESC')->limit(2)->select();
            }
            //把三维数组转化为二维数组
            foreach ($datalist_old as $key => $vo){
                foreach ($vo as $k => $v){
                    $datalist[] = $v;
                }
            }
        }else{
            $datalist   = $db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('sort DESC ,create_time DESC')->select();
        }

        //分页
        if(!$this->type && !$this->fid && !$this->city && !$this->sys && !$this->pro && !$this->kw){
            $pagecount  = count($datalist);
        }else {
            $pagecount  = $db->where($where)->count();
        }
        $page = new Page($pagecount, 12);
        $this->pages    = $pagecount>12 ? $page->show():'';

        //左侧导航栏
        $dataA = M('kind')->where('pid = 0 && type = 1 && status = 1')->order("sort desc")->select();
        $dataB = M('kind')->where('pid !=0 && type = 1 && status = 1')->order("sort desc")->select();
        foreach($dataA as &$v){
            $v['desc']  =& str_replace('&lt;p&gt;',"<br />&#12288;&#12288;",$v['desc']);
        }
        $this->assign('dataA',$dataA);
        $this->assign('dataB',$dataB);

        $this->resf     = C('RES_FIELDS');
        $this->ress     = C('RES_SYSTEMS');
        $this->resp     = C('RES_PRO');

        $where			= array();
        $where['city']	= array('exp','is not null');
        $where['city']	= array('neq','');
        $this->resc     = $db->where($where)->group('city')->GetField('city',true);
        $this->datalist = $datalist;
        $this->display('ziyuan');
    }



    //资源详情
    public function ziyuan_detail(){

        $id                     = I('id');
        $col                    = I('col','[1]');
        $col                    = explode(',',$col);
        $row                    = M('res')->find($id);
        session('col',$col);
        //相关资源
        $data = D('res')->where("id = '$id'")->find();
        //$tag = D("goods")->field('tag')->where("id = '$id'")->find();
        $title = $data['title'];
        $type = $data['type'];

        $data_B = array();
        if($type == 1){
            $where['id'] = 31;
            $data_A = M('kind')->field('title')->where($where)->find();
            $data_B = D('article')->where("expert_id = '$id'")->select();
        }elseif ($type ==2 ||$type == 5 ||$type == 6 ||$type ==7 ||$type == 8 ||$type == 9){
            $where['id'] = 32;
            $data_A = M('kind')->field('title')->where($where)->find();
            $data_B = M('goods')->where("tag like '%$title%'")->select();
        }elseif ($type ==3 ||$type == 4){
            $where['id'] = 35;
            $data_A = M('kind')->field('title')->where($where)->find();
            $data_B = D('sci')->where("tag like '%$title%'")->select();
        }elseif ($type == 10){
            $where['id'] = 37;
            $data_A = M('kind')->field('title')->where($where)->find();
            $data_B = D('product')->where("tag like '%$title%'")->select();
        }
        $this->assign('type',$type);
        $this->assign('id',$id);
        $this->assign('data_A',$data_A);
        $this->assign('data_B',$data_B);


        if($id && $row){
            $kind = M('kind')->where(array('level'=>1))->GetField('id,title',true);
            $this->kindname        = $kind[$row['type']] ? $kind[$row['type']] : '';
            $this->page_title      = $row['title']. ' 中科教科学教育平台 - 中国科学院科学教育联盟';
            $this->row 			   = $row;
            $this->display('ziyuan_detail');
        }else{
            $this->display('Index/404');
        }
    }

    public function ziyuan_morepic_detail(){
        $id                     = I('id');
        $col                    = I('col','[1]');
        $col                    = explode(',',$col);
        $row                    = M('res')->find($id);
        session('col',$col);
        //相关资源
        $data                   = D('res')->where("id = '$id'")->find();
        $title                  = $data['title'];
        $type                   = $data['type'];
        $module                 = P::TYPE_MOREPIC_RES;
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
                }elseif ($vo['filename'] == '第8天' && $key ==7) {
                    $value['filepath'][]  =& $vo['filepath'];
                }elseif ($vo['filename'] == '第9天' && $key ==8) {
                    $value['filepath'][]  =& $vo['filepath'];
                }elseif ($vo['filename'] == '第10天' && $key ==9) {
                    $value['filepath'][]  =& $vo['filepath'];
                }elseif ($vo['filename'] == '第11天' && $key ==10) {
                    $value['filepath'][]  =& $vo['filepath'];
                }elseif ($vo['filename'] == '第12天' && $key ==11) {
                    $value['filepath'][]  =& $vo['filepath'];
                }
            }
            $value['content']           =& str_replace('&lt;p&gt;',"<br />&#12288;&#12288;",$value['content']);
            $day_arr[]                  = $value;
        }

        $this->data             = $data;
        $this->info             = $day_arr;

        $data_B = array();
        if($type == 1){
            $where['id'] = 31;
            $data_A = M('kind')->field('title')->where($where)->find();
            $data_B = D('article')->where("expert_id = '$id'")->select();
        }elseif ($type ==2 ||$type == 5 ||$type == 6 ||$type ==7 ||$type == 8 ||$type == 9){
            $where['id'] = 32;
            $data_A = M('kind')->field('title')->where($where)->find();
            $data_B = M('goods')->where("tag like '%$title%'")->select();
        }elseif ($type ==3 ||$type == 4){
            $where['id'] = 35;
            $data_A = M('kind')->field('title')->where($where)->find();
            $data_B = D('sci')->where("tag like '%$title%'")->select();
        }elseif ($type == 10){
            $where['id'] = 37;
            $data_A = M('kind')->field('title')->where($where)->find();
            $data_B = D('product')->where("tag like '%$title%'")->select();
        }
        $this->assign('type',$type);
        $this->assign('id',$id);
        $this->assign('data_A',$data_A);
        $this->assign('data_B',$data_B);

        $kind = M('kind')->where(array('level'=>1))->GetField('id,title',true);
        $this->kindname        = $kind[$row['type']] ? $kind[$row['type']] : '';
        $this->page_title      = $row['title']. ' 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->row 			   = $row;
        $this->display('ziyuan_morepic_detail');
    }

}