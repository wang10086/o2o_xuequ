<?php
/**
 * Date: 2017/11/13
 * Time: 22:57
 */
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class ProController extends  BaseController{

    public function _initialize(){
        $this->data_right();
    }

    //支撑项目服务
    public function index(){
		
		$this->page_title      = '支撑服务项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';

		$kind		= I('kind',32);
		$type		= I('type','');
		$this->fid	= I('fid','');
		$this->city	= I('city','');
		$this->sys	= I('sys','');
		$this->pro	= I('pro','');
		$this->kw	= I('kw','');
		
		$where  = array();
		if($type && $type > 43){
			$where['col']    = array('like','%['.$type.']%');
		}elseif($type==43) {
            $where['system'] = array('like', '%老科学家演讲团%');
        } else{
			if($kind != 31)	$where['col']    = array('like','%['.$kind.']%');
		}
		if($this->kw)     $where['title']  = array('like','%'.$this->kw.'%');
		if($this->fid)    $where['fields'] = array('like','%'.$this->fid.'%');
		if($this->city)   $where['city']   = array('like','%'.$this->city.'%');
		if($this->sys)    $where['system'] = array('like','%'.$this->sys.'%');
		if($this->pro)    $where['pro']    = array('like','%'.$this->pro.'%');
		
		//根据不同栏目调用不同数据
		if($kind==31){
			$db = M('res');
			$where['type'] = 1;
		}else if($kind==32 || $kind==33 || $kind==34 || $kind==36  || $kind==39){
			$db = M('goods');
		}else if($kind==37 || $kind==38 || $kind==40){
			$db = M('product');
		}else if($kind==35){
			$db = M('sci');
		}
		
		 //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, 12);
        $this->pages = $pagecount>12 ? $page->show():'';


        //查询数据
        /*if(!$this->kw && !$this->fid && !$this->city && !$this->sys && !$this->pro){
            $kinds = array(32,33,34,35,36,39);
            $datalist_old = array();
            $datalist = array();
            //求数据
            foreach($kinds as $kind){
                $datalist_old[] = $db ->where("col like '%$kind%'")->limit(2)->select();
            }
            //三维数组转二维数组
            foreach($datalist_old as $vo){
                foreach($vo as $v){
                    $datalist[] = $v;
                }
            }

        } else{*/
            $datalist = $db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('sort DESC')->select();
        //}

        //左侧导航栏
        $dataA = M('kind')->where('level = 1 && type = 2 && status = 1')->order("sort desc")->select();
        $dataB = M('kind')->where('level = 2 && type = 2 && status = 1')->order("sort desc")->select();
        foreach($dataA as &$v){
            $v['desc']  =& str_replace('&lt;p&gt;',"<br />&#12288;&#12288;",$v['desc']);
        }
        $this->assign('dataA',$dataA);
        $this->assign('dataB',$dataB);
		
		
		$this->resf     = C('RES_FIELDS');
		$this->ress     = C('RES_SYSTEMS');
		$this->resp     = C('RES_PRO');
		$this->rest     = C('GOODS_FIT');
		$this->resd     = C('GOODS_DAYS');
		
	
		$where			= array();
		$where['city']	= array('exp','is not null');
		$where['city']	= array('neq','');
		$this->resc     = $db->where($where)->group('city')->GetField('city',true);
		
		//处理样式及链接
		if($kind==31){
			$this->url		= 'Pro/lecture';
			$this->style	= 'lec_list';
		}else if($kind==32 || $kind==33 || $kind==34 || $kind==36  || $kind==39){
			$this->url		= 'Pro/travel';
			$this->style	= 'tra_list';
		}else if($kind==37 || $kind==38 || $kind==40){
			$this->url		= 'Pro/goods';
			$this->style	= 'goo_list';
		}else if($kind==35){
			$this->url		= 'Pro/sci';
			$this->style	= 'sci_list';
		}

		//学校定制弹窗
        $kind_ids       = array(40,69,70,71,72);
        $this->kind_ids = $kind_ids;
		
		$this->kind		= $kind;
		$this->datalist = $datalist;
        $this->display('index');
		

    }
	
	
	//讲座详情
	public function lecture(){
		
		$art_db             = M('article');
		$res_db             = M('res');
		
		$id			        = I('id',0);
		$this->row	        = $res_db->find($id);

		if($this->row && $id){
			//获取讲座信息
			$articles		    = $art_db->where(array('expert_id'=>$id,'type'=>3))->select();

            $keywords           = array();
            foreach ($articles as &$vo){
                $keyword        = explode(' ',$vo['keywords']);
                $vo['keywords'] = $keyword;
            }
            $this->keywords     = $keywords;
            $this->lec			= $articles;

			//相关专家
			$where = array();
			$where['id']        = array('neq',$id);
			$where['type']      = 1;
			$where['fields']    = $this->row['fields'];
			$this->rele         = $res_db->where($where)->limit(6)->select();

			$this->page_title	= '支撑服务项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
			$this->display('lecture');
		}else{
			$this->display('Index/un_find');
		}
	}
	
	
	//研学旅行详情
	public function travel(){
        $kind                   = I('k');
		$module                 = I('module',0);
        $m                      = P::TYPE_SCIENCE;//9 区别科学课程(表格)
		$db 			        = M('goods');
		$id			            = I('id',0);
		$data	                = $db->find($id);
        //判断有没有课程特色，没有则隐藏
        $light                  = $data['lights'];
        $this->light            = $light;

        $data['lights']         = explode(' ',$data['lights']);
		$this->row	            = $data;
        $pics                   = M('attachment')->field('filepath') ->where("releid = '$id' && module = '10'")->select();
        $this->pics             = i_array_column($pics,'filepath');
        $this->kind             = $kind;

        //相关资源
        $tag                    = explode(',',$data['tag']);
        $resource               = array();
        foreach ($tag as $v){
            $res                = M('res')->field("id,title,col")->where("title like '%$v%'")->find();
            $resource[]         = $res;
        }
        $this->resource         = $resource;

        //旅行每天的图片
        $d_pics                 = M('attachment')->field("filename,filepath")->where("releid = '$id' && module = '13'")->select();
        $this->d_pics           = $d_pics;

        if($this->row && $id){
			//获取行程
			$days			    = M('goods_days')->where(array('goods_id'=>$id,'type'=>1))->select();

            $day_arr            = array();
            foreach($days as $key => &$value){
                foreach($d_pics as $vo){
                    if($vo['filename']      == '第1天' && $key == 0){
                        $value['filepath']  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第2天' && $key ==1){
                        $value['filepath']  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第3天' && $key ==2) {
                        $value['filepath']  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第4天' && $key ==3) {
                        $value['filepath']  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第5天' && $key ==4) {
                        $value['filepath']  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第6天' && $key ==5) {
                        $value['filepath']  =& $vo['filepath'];
                    }elseif ($vo['filename'] == '第7天' && $key ==6) {
                        $value['filepath']  =& $vo['filepath'];
                    }
                }
                $day_arr[]                  = $value;
            }
            $this->days                     = $day_arr;

            //判断有误课程概要，没有则隐藏
            $cities             = array();
            foreach($day_arr as $v){
                $cities[]       = $v['citys'];
            }
            $cities             = implode('',$cities);
            $this->cities       = $cities;

            //第二学期课程安排
            $this->days_next                = M('goods_days')->where(array('goods_id'=>$id,'type'=>2))->select();


            $this->tags         = $this->row['tag'] ? explode(',',$this->row['tag']) : '';
			$this->price        = M('goods_price')->where(array('goods_id'=>$id))->order('price ASC')->find();
			$this->page_title	= '支撑服务项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
            if ($module == $m){
                //科学课程(表格类)
                $daypic	        = get_res(P::TYPE_SCIENCE,$id);    //获取理论课程所需材料列表图片
                foreach ($daypic as $v){
                    $lession[]   = $v['filepath'];
                }
                $this->module    = $module;
                $this->lession   = $lession;
                $this->display('science');
            }else{

                $this->display('travel');
            }
		}else{
			$this->display('Index/un_find');
		}
	}


	//实体商品详情
	public function goods(){
		
		$db 	    = M('product');
		$id			= I('id',0);
		$this->row	= $db->find($id);

		if($this->row && $id){
			//获取课程
			$this->atts     = get_res(11,$id); 
			$this->page_title	= $this->row['title'].' - 支撑服务项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
			$this->display('goods');
		}else{
			$this->display('Index/un_find');
		}
		
		
	}
	
	
	//科技节详情
	public function sci(){
		$db 	    = M('sci');
		$id			= I('id',0);
		$this->row	= $db->find($id);
		
		if($this->row && $id){
			//获取行程
			$this->page_title	= $this->row['title'].' - 支撑服务项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
			$this->display('sci');
		}else{
			$this->display('Index/un_find');
		}
	}
	
	
    

    //研学旅行列表页
    public function yanxue_list(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';

        $fields = I('fields');
        $city = I('city');
        $system = I('system');
        $res_pro = I('res_pro');
        if($fields){
            $where['fields'] = $fields;
        }
        if($city){
            $arr_city = array($city,'全国');
            $where['city'] = ['in',$arr_city];
        }
        if($system){
            $where['system'] = ['like',"%$system%"];
        }
        if($res_pro){
            $where['res_pro'] = $res_pro;
        }

        //分页
        $count = M('goods')->where($where)->count();
        $page = new \Think\Page($count);
        $page->lastSuffix = 10;
        $show = $page->show();
        $list = M("goods")->limit($page->firstRow.','.$page->listRows)->where($where)->select();

        //左侧导航栏
        $dataA = M('kind')->where('pid = 0 && type = 2 && status = 1')->select();
        $dataB = M('kind')->where('pid !=0 && type = 2 && status = 1')->select();
        $this->assign('dataA',$dataA);
        $this->assign('dataB',$dataB);

        $this->assign('list',$list);
        $this->assign('page',$show);
        //把搜索框的值传回去,否则下一页数据会出错
        $info['fields']     = $fields;
        $info['city']       = $city;
        $info['system']     = $system;
        $info['$res_pro']   = $res_pro;
        $this->assign('info',$info);
        $this->display();
    }
	
	
    //研学旅行详情页
    public function yanxue(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $goods_id = I('id');
        $data = M("goods")->alias("g")->join("left join o2o_goods_days as days on g.id = days.goods_id")->join("left join o2o_goods_price as price on g.id = price.goods_id")->where("g.id = '$goods_id'")->find();
        $data['tag']        = explode(',',$data['tag']);
        $data['target']     = explode('&lt;p&gt;',$data['target']); //课程目标
        $data['content']    = explode('&lt;p&gt;',$data['content']);   //内容
        $data['security']   = explode('&lt;p&gt;',$data['security']);
        $data['cost']       = explode('&lt;p&gt;',$data['cost']);         //费用说明
        $data['plan']       = explode('&lt;p&gt;',$data['plan']);
        $this->assign('data',$data);
        $this->assign('security',$data['security']);
        $this->assign('target',$data['target']);
        $this->assign('content',$data['content']);
        $this->assign('plan',$data['plan']);
        $this->assign("tag",$data['tag']);
        $this->display();
    }

    //预约讲座
    public function yuyue_jiangzuo(){
        $this->page_title      = '中科教科学教育平台 - 中国科学院科学教育联盟';
        $mobile = $_SESSION['mobile'];
        if(empty($mobile)){

            $url = 'http://'.$_SERVER['HTTP_HOST'].'/Login/check_login';
            header("Location: $url");
        }

        if(isset($_POST['dosubmint'])){
            $article_id             = I('article_id');
            $data['article_id']     = I('article_id');
            $data['article_id']     = I('article_id');
            $data['article_title']  = I('article_title');
            $data['mobile']         = $_SESSION['mobile'];
            $data['yq_name']        = I('yq_name');
            $data['manager_name']   = I('manager_name');
            $data['call_man']       = I('call_man');
            $data['tel_num']        = I('tel_num');
            $data['e_mail']         = I('e_mail');
            $data['show_addr']      = I('show_addr');
            $data['listener']       = I('listener');
            $data['in_day']         = strtotime(I('in_day'));
            $data['in_time']        = I('in_time');
            $id = M('article')->field("expert_")->where("id = '$article_id'")->find();
            $data['pic'] = M("res")->field("pic")->where("id = '$id'")->find();
            $res = D('appo_lecture')->add($data);
            if($res){
                die(return_msg('y','申请成功,我们会及时与您联系！'));
            }else{
                die(return_msg('n','保存申请信息失败，请重试！'));
            }

        }else{
            $id = I('id');
            $data = M('article')->where("id = '$id'")->find();
            $this->assign('data',$data);
            $this->display();
        }

    }

    public function joinshopcart(){
        $userid         =$_SESSION['userid'];
        $db             = D('member_apply_service');
        $apply_users    = $db->field('apply_user')->where("status = '1'")->select();
        $apply_users    = i_array_column($apply_users,"apply_user");
        if ($userid){
            if(in_array($userid,$apply_users)){
                $type	= I('type',0);
                $id		= I('id','');

                $nid	= $id ? '['.$id.']' : '';

                //获取原来
                $cart = cookie('sci_shopcart');

                if($type==1){
                    //删除
                    $newcart = str_replace($nid,'',$cart);
                }else{
                    //加入
                    if(strpos($cart,$nid) === false){
                        $newcart = $cart ? $cart.','.$nid : $nid;
                    }else{
                        $newcart = $cart;
                    }
                }


                //保存新加入购物车
                cookie('sci_shopcart',$newcart);

                $newcart = str_replace('[','',$newcart);
                $newcart = str_replace(']','',$newcart);

                //获取购物车列表
                $where = array();
                $where['id'] = array('in',$newcart);
                $shoplist = M('sci')->field('id,title,price,pic')->where($where)->select();
                foreach($shoplist as $k=>$v){
                    $shoplist[$k]['pic'] = thumb($v['pic'],64,64);
                }


                die(json_encode($shoplist,JSON_UNESCAPED_UNICODE));
            }else{
                echo 1;/*请先申请支撑服务校(单位)*/
            }
        }else{
            echo 0;/*请先注册登录*/
        }

    }


	//检查用户是否是支撑服务校用户,支撑服务校用户才能预约课程
    public function check_apply(){
        //检测用户是不是支撑服务校用户
        $db                 = D('member_apply_service');
        $userid             = $_SESSION['userid'];
        $apply_users        = $db->field('apply_user')->where("status = '1'")->select();
        $apply_users        = i_array_column($apply_users,"apply_user");
        if ($userid){
            if(in_array($userid,$apply_users)){
                echo 2;
            }else{
                echo 1;
            }
        }else{
            echo 0;
        }
    }

    //老专家行程安排
    public function agenda(){
        $this->page_title   = '中科教科学教育平台 - 专家日程安排';

        $this->web_path     = "http://".$_SERVER['SERVER_NAME'];
        $this->js('sitedate');
        $this->display('agenda');
    }

    public function public_db(){
        $zj_name        = I('zj_name');
        $where          = array();
        if($zj_name){
            $zj_id = M('res')->where("title = '$zj_name'")->getField('id');
            $where['res_id'] = array('eq',$zj_id);
        }

        $db             = M('appo_lecture');
        $where['status']= array('eq','1');

        $rows           = $db->field("a.*,r.title")->alias('a')->join("left join o2o_res as r on a.res_id = r.id")->where($where)->select();
        foreach($rows as $k=>$v){
            $data[$k]['id']     = $v['id'];
            $data[$k]['task']   = $v['title'].'--'.$v['yq_name'];
            $data[$k]['builddate'] = date("Y-m-d",strtotime($v['in_day']));
        }
        echo json_encode($data);
    }

    /****** AJAX返回全部日程表 ******/
    public function public_schedule(){

        $where = array();

        $datalist	= M('train_plan')->where($where)->order('start_time')->select();

        $day		= date('Y-m-d',time());
        $rows		= array();
        foreach($datalist as $k =>$v){

            //显示样式
            if($v['builddate']==$day){
                $style = 'task_red';
                $status = 1;
            }else if($v['builddate']>$day){
                $style = 'task_blue';
                $status = 2;
            }else if($v['builddate']<$day){
                $style = 'task_hui';
                $status = 2;
            }

            $rows[$k]['builddate']		=$v['builddate'];
            $rows[$k]['task']			=$v['teacher'].' - '.$v['site'];
            $rows[$k]['plan_id']			=$v['plan_id'];
            $rows[$k]['style'] 			= $style;
            $rows[$k]['id'] 				= $v['train_id'];
            $rows[$k]['status'] 			= $status;

        }
        echo json_encode($rows);

    }

    public function appo_info(){
        $this->page_title   = '中科教科学教育平台 - 专家日程安排';
        $id     = I();
        //var_dump($id);
        $this->display('appo_info');
    }


}