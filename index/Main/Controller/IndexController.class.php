<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class IndexController extends BaseController {

    public function un_find(){
        $this->display();
    }

    /****** 首页 ******/
    public function home(){

        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';

        //科教活动展示
        $kind_id                = 94;
        $col                    = '['.$kind_id.']';
        $where['col']           = array('like',"%$col%");
        $db                     = M('article');
        $data                   = $db->field("id,sort,title,pic,pic_id,col,module,create_time")->where($where)->order('sort desc')->limit(10)->select();
        /*最新上传的文章显示new*/
        $time                   = NOW_TIME;
        $t                      = 7*24*3600;
        foreach ($data as &$v){
            if ($time-$v['create_time'] < $t){
                $v['type'] = 'new';
            }else{
                $v['type'] = 'old';
            }
        }
        $this->data             = $data;

        //通知公告
        $kinds                  = M('kind')->field('id,title')->where("title like '通知公告'")->find();
        $kind_id                = $kinds['id'];     //91
        $col                    = '['.$kind_id.']';
        $where['col']           = array('like',"%$col%");
        $db                     = M('article');
        $list                   = $db->field("id,sort,title,pic,pic_id,col,module,create_time")->where($where)->limit(4)->order("sort desc")->select();
        $this->list             = $list;

        //公益活动
        $kinds                  = M('kind')->field('id,title')->where("title like '公益活动'")->find();
        $kind_id                = $kinds['id'];     //92
        $col                    = '['.$kind_id.']';
        $where['col']           = array('like',"%$col%");
        $db                     = M('article');
        $info                   = $db->field("id,sort,title,pic,pic_id,col,module,create_time")->where($where)->limit(4)->order("sort desc")->select();
        $this->info             = $info;

        $this->display('index');
    }

    //右侧栏数据
    public function _initialize(){
        $this->data_right();
    }
	
	//申请支撑服务校
    public function apply(){
        $this->page_title		= '中国科学院科学教育联盟支撑服务校申请表 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $mobile = $_SESSION['mobile'];
        if(empty($mobile)){

            $url = 'http://'.$_SERVER['HTTP_HOST'].'/Login/check_login';
            header("Location: $url");
        }

		if(isset($_POST['dosubmint'])){
			$db = M('member_apply_service');
			$info = I('info');
			$info['manager_sex']		= I('manager_sex');
			$info['contacts_sex']	= I('contacts_sex');
			$info['apply_time']		= time();
			$info['apply_user']		= cookie('userid');
			
			//判断学校是否已申请
			$find = $db->where(array('school_name'=>$info['school_name']))->find();
			if($find){
				die(return_msg('n','该学校已存在申请记录！'));
			}else{
				$save = $db->add($info);
				if($save){
					die(return_msg('y','已提交申请，等待审核！<br><a href="javascript:;" onClick="goback()" class="btnclose">返回</a>'));	
				}else{
					die(return_msg('n','保存申请信息失败，请重试！'));	
				}
			}
			
		}else{
			$this->display('zhichengfuwuxiao');
		}
    }
    
	
	
	//首页图片链接index
    public function zhicheng(){
        $this->page_title       = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $db                     = D("member_apply_service");
		
		$pro = C('PROVINCE');
		
		$pro_sch = $db->where('status=1')->field('province as name,count(*) as value')->group('province')->select();
		
		$coordinate = '{';
		$proschdata = '[';
		foreach($pro_sch as $k=>$v){
			$coordinate .= '"'.$v['name'].'":['.$pro[$v['name']].'],';
			$proschdata .= '{name: "'.$v['name'].'", value: '.$v['value'].'},';
		}
		$coordinate .= '}';
		$proschdata .= ']';
		$this->coordinate = $coordinate;
		$this->proschdata = $proschdata;

        //支撑服务校动态名单
        $kind_id        = 95;
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

        $data                   = $db ->field('school_name')->where('status=1')->select();
        $schools                = i_array_column($data,"school_name");
        $this->schools          = $schools;
        $this->display('zhicheng');
    }
	
	
    //专家
    public function zhuanjia(){
        $this->page_title   = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $id                 = $_GET['id'];
        $info               = M('res')->where("id = '$id'")->find();
        //相关领域专家
        $fields             = $info['fields'];
        $zhuanjia           = M("res")->field('title,fields,tag,pic')->where("fields like '%$fields%'")->limit(6)->select();
        //$data             = M('article')->alias("a")->field("a.*",res.pic)->join("left join res on a.res_title = res.title")->where("a.res_title = $title")->select();
        $data               = M('article')->where("expert_id = $id")->select();
        $this->assign('zhuanjia',$zhuanjia);
        $this->assign('info',$info);
        $this->assign('data',$data);
        $this->display('zhuanjia');
    }

    //用户注册说明
    public function register(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display('register');
    }

    //中国科学院“率先行动”成果展
    public function sxxd(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display('sxxd');
    }
    //教学教具
    public function jiaoxuejiaoju(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }
    //教学教具详情页
    public function jiaoxuejiaoju_detail(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }
    //展览展示
    public function zhanlanzhanshi(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }
    //展览展示详情页
    public function zkj_box(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }
    //科技节
    public function kejijie(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }

    //支撑服务校详情页
    public function pro_detail(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';

        $count                      = M("member_apply_service")->where("status = '1'")->count();
        $data                       = M("member_apply_service")->where("status = '1'")->select();
        $provinces                  = array();
        $school                     = array();
        $city_school                = array();
        $db = M('member_apply_service');

        //按照行政划分排序
        $city                       = C('PROVINCE');
        foreach ($city as $key => $value){
            $provinces[] = $key;
        }

        //求个每个城市学校
        foreach ($provinces as $vo){
            $school_name            = $db->field("province,school_name,school_web")->where("province = '$vo' && status = '1'")->select();
            $num                    = count($school_name);
            $schools[]              = $school_name;
            $school['count']        = $num;
            $school['province']     = $vo;
            $city_school[]          = $school;
        }
        foreach ($schools as $vo){
            foreach ($vo as $v){
                $school_arr[]       = $v;
            }
        }
        $this->schools              = $school_arr;
        $this->count                = $count;
        $this->city_school          = $city_school;
        $this->school_name          = $school_name;
        $this->display();
    }

    //2018年寒假线路
    public function win_holiday(){
        $this->page_title      = '2018年寒假 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }

    //中科教box
    public function zk_box(){
        $this->page_title      = '中科BOX - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }

    //2017-2018 寒假课程
    public function lession(){
        $this->page_title      = '中科BOX - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }

    //少科院
    public function sky(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }

    //2018年第五届高端科教资源交流会
    public function jlh(){
        $this->page_title      = '2018年第五届高端科教资源交流会';
        $this->display();
    }

    //通知公告(更多)
    public function notify_list(){
        $kinds                  = M('kind')->field('id,title')->where("title like '通知公告'")->find();
        $kind_id                = $kinds['id'];     //91
        $col                    = '['.$kind_id.']';
        $where['col']           = array('like',"%$col%");
        $db                     = M('article');

        //分页
        $pagecount              = $db->where($where)->count();
        $page                   = new Page($pagecount, 20);
        $this->pages            = $pagecount>20 ? $page->show():'';
        $data                   = $db->field("id,sort,title,pic,pic_id,col,module,create_time")->where($where)->limit($page->firstRow . ',' . $page->listRows)->order("sort desc")->select();
        $this->data             = $data;
        $this->page_title       = '通知公告 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }

    //通知公告(详情页)
    public function notify_detail(){
        $this->page_title       = "通知公告 - 中科教科学教育平台 - 中国科学院科学教育联盟";
        $id                     = I('id');
        $module                 = I('module');
        if($module == 4){
            //大图片类型
            $data                   = M('article')->field("id,title,keywords,description,content,pic,col,pic_id,ext_links,create_time,source")->where("id = '$id'")->find();
            //获取图片
            $pictures               = M("attachment")->field("filename,filepath")->where("releid = '$id' && module = '$module'")->select();
            $this->data             = $data;
            $this->picture          = $pictures;
            $this->display('kejiao_pic');die;
        }
        $this->display();
    }

    //公益活动(更多)
    public function gongyi_list(){
        $kinds                  = M('kind')->field('id,title')->where("title like '公益活动'")->find();
        $kind_id                = $kinds['id'];     //92
        $col                    = '['.$kind_id.']';
        $where['col']           = array('like',"%$col%");
        $db                     = M('article');

        //分页
        $pagecount              = $db->where($where)->count();
        $page                   = new Page($pagecount, 20);
        $this->pages            = $pagecount>20 ? $page->show():'';
        $data                   = $db->field("id,sort,title,pic,pic_id,col,module,create_time")->where($where)->limit($page->firstRow . ',' . $page->listRows)->order("sort desc")->select();
        $this->data             = $data;
        $this->page_title       = '公益活动 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display();
    }

    //支撑服务校(单位)动态
    public function dynamic(){
        $this->page_title       = '支撑服务校(单位)动态 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        //支撑服务校动态名单
        $kind_id        = 95;
        $col            = '['.$kind_id.']';
        $where['col']   = array('like',"%$col%");
        $db             = M('article');

         //分页
        $pagecount              = $db->where($where)->count();
        $page                   = new Page($pagecount, 15);
        $this->pages            = $pagecount>15 ? $page->show():'';

        $info                   = $db->field('id,title,col,pic,module,create_time')->limit($page->firstRow . ',' . $page->listRows)->where($where)->order("sort desc")->select();
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
        $this->data     = $info;
        $this->display();
    }

}
