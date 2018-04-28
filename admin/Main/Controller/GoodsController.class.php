<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class GoodsController extends BaseController {

    //服务项目
    public function goodslist(){

        $db = M('goods');


        $keywords = I('keywords');
        $kind     = I('kind');

        $where = array();
        if($keywords) $where['title'] = array('like','%'.$keywords.'%');
        if($kind)     $where['kinds'] = array('like','%['.$kind.']%');
        //排除科学课程kind = 33(手册)
        $where['col']                 = array('notlike','%[33]%');

        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';

        //查询
        $status = C('STATUS_STR');

        $datalist = $db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order($this->orders('update_time'))->select();

        $this->kindlist = M('kinds')->Getfield('id,kind_name',true);
        $this->datalist = $datalist;
        $this->display('goods');

    }





    public function goods_add(){
        if(isset($_POST['dosubmint'])){
            $editid = I('editid');
            $info   = I('info','');
            $infos  = I('attr');
            $tag    = I('tag');
            $price  = I('price');
            $days   = I('days');
            $kinds  = I('kinds');
			$lm     = I('lm');
			$fit    = I('fit');
			$fie    = I('fie');
			$daypic	= I('daypic');

			$info['col']			= implode(',',$lm);
			$info['fit']			= implode(',',$fit);
			$info['fields']			= implode(',',$fie);
            $info['pic']			= $infos['filepath'][0];
            $info['pic_id']			= $infos['id'][0];
            $info['update_time']	= time();
            $info['tag']			= implode(',',$tag);
            $info['kinds']			= implode(',',$kinds);
            if($info['days']        =='请选择'){
                $info['days']       = '';
            }
            if($info['fit']         =='请选择'){
                $info['fit']        = '';
            }
            if($info['fields']      =='请选择'){
                $info['fields']     = '';
            }
            if($editid){
                M('goods')->data($info)->where(array('id'=>$editid))->save();
                $id                 = $editid;
            }else{

                $info['create_time'] = time();
                $id                 = M('goods')->add($info);
            }

            //保存价格
            if($price){
                M('goods_price')->where(array('goods_id'=>$id))->delete();
                foreach($price as $k=>$v){
                    $data             = array();
                    $data['goods_id'] = $id;
                    $data['ondate']   = $v['date'];
                    $data['price']    = $v['price'];
                    M('goods_price')->add($data);
                }
            }

            //保存日程
            if($days){
                M('goods_days')->where(array('goods_id'=>$id))->delete();
                foreach($days as $k=>$v){
                    $data = array();
                    $data['goods_id'] = $id;
                    $data['citys']    = $v['citys'];
                    $data['content']  = $v['content'];
                    $data['remarks']  = $v['remarks'];
                    M('goods_days')->add($data);
                }
            }

            //保存上传图片
            save_res(P::TYPE_GOODS,$id,$infos);
			
			//日程图片图片
            save_res(P::TYPE_DOOGS_DAY,$id,$daypic);

            $this->success('保存成功！',I('referer',''));

        }else{

            $id     = I('id',0);
            $row    = M('goods')->find($id);
            $atts   = get_res(P::TYPE_GOODS,$id);    //获取上传素材
			$daypic	= get_res(P::TYPE_DOOGS_DAY,$id);    //获取日程图片
            $days   = M('goods_days')->where(array('goods_id'=>$id))->select();
            $price  = M('goods_price')->where(array('goods_id'=>$id))->select();

            $this->row      = $row;
            $this->tag      =  explode(',',$row['tag']);
            $this->kv       =  explode(',',$row['kinds']);
            $this->atts     = $atts;
			$this->daypic	= $daypic;
            $this->days     = $days;
            $this->price    = $price;
			$this->goodsday = C('GOODS_DAYS');
			$this->goodsfit = C('GOODS_FIT');
			$this->goodsfie = C('RES_FIELDS');
            $this->res_pro  = C('RES_PRO');
			
			
			//栏目
			$infotype       = getTree(2);
			foreach($infotype as $k=>$v){	
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype   = $infotype;
			
			$this->lm         = explode(',',$this->row['col']);
			$this->fit        = explode(',',$this->row['fit']);
			$this->fie        = explode(',',$this->row['fields']);
			
            $this->kinds      = M('kinds')->Getfield('id,kind_name',true);
            $this->display('goods_add');
        }
    }
	
	
	
	public function del_goods(){
		$id = I('id');
        if($id){
            M('goods')->where(array('id'=>$id))->delete();
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
	}




    //专家讲座
    public function index(){
        $db       = M('article');
        $kind     = I('kind');
        $keywords = I('keywords','');
        $ctype    = C('NEWS_TYPE');
        $where = array();
        if($kind =='') $kind = 3;
        $where['type']  = $kind;
        if($keywords) $where['title'] = array('like','%'.$keywords.'%');

        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';


        //查表
        $infolist = $db->where($where)->order('sort DESC ,create_time DESC')->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($infolist as $k=>$v){
			if($v['expert_id']){
				$zj = M('res')->find($v['expert_id']);
				$infolist[$k]['zhuanjia'] = $zj['title'];
			}else{
				$infolist[$k]['zhuanjia'] = '';
			}
            $tp = M('attachment')->where(array('module'=>P::TYPE_NEWS,'releid'=>$v['id']))->find();
            $infolist[$k]['pic']  = $tp ? '<i class="fa fa-picture-o" style="color:#f56954"></i>' : '';
            $infolist[$k]['type'] = $ctype[$v['type']];
        }


        $this->infotype = $ctype;
        $this->kind     = $kind;
        $this->pagename = $ctype[$kind];
        $this->infolist = $infolist;

        $this->display('index');
    }

    //新增专家讲座
    public function add(){
        if(isset($_POST['dosubmit'])){



            $info		= I('info','');
            $infos		= I('attr');
			$lm			= I('lm');
			$fit		= I('fit');
			$resname	= I('resname','');
			
			$res = M('res')->field('id')->where(array('type'=>1,'title'=>$resname))->find();	
			$info['expert_id']	 = $res ? $res['id'] : 0;
			$info['fit']         = implode(',',$fit);
			$info['col']         = implode(',',$lm);
            $info['pic']         = $infos['filepath'][0];
            $info['pic_id']      = $infos['id'][0];
			$info['type'] 		 = 3;
            $info['create_time'] = time();
            $info['update_time'] = time();
            $info['content'] = stripslashes($_POST['content']);

            if(!$info['content'] || !$info['title']){
                $this->error('标题和内容不能为空！');
            }else{

                $isadd = M('article')->add($info);
                if($isadd){

                    //保存上传图片
                    save_res(P::TYPE_NEWS,$isadd,$infos);


                    $this->success('添加成功！',I('referer',''));
                }else{
                    $this->error('添加失败！',I('referer',''));
                }
            }

        }else{

            $kind           = I('kind',3);
            $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
			//栏目
			$infotype  = getTree(2);
			foreach($infotype as $k=>$v){	
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype   = $infotype;
			
            $this->kindname = $this->infotype[$kind];
			$this->zhuanjia = M('res')->where(array('type'=>1))->order('title DESC')->GetField('id,title',true);
			
			$res =  M('res')->where(array('type'=>1))->order('fields')->select();
			$key = array();
			foreach($res as $k=>$v){
				$text = $v['title'];
				$key[$k]['id']         = $v['id'];
				$key[$k]['title']  = $v['title'];
				$key[$k]['pinyin']     = strtopinyin($text);
				$key[$k]['text']       = $text;
				
			}
			
			
			$this->reskey =  json_encode($key);	
			
			
			$this->goodsday = C('GOODS_DAYS');
			$this->goodsfit = C('GOODS_FIT');
			$this->goodsfie = C('RES_FIELDS');
            $this->res_pro = C('RES_PRO');
			
            $this->display('add');
        }
    }


    //修改专家讲座
    public function edit(){

        if(isset($_POST['dosubmit'])){

            $news_id	= I('news_id',0);
            $info		= I('info','');
            $infos		= I('attr');
			$lm			= I('lm','');
			$fit		= I('fit');
			$resname	= I('resname','');
			
			$res = M('res')->field('id')->where(array('type'=>1,'title'=>$resname))->find();	
			$info['expert_id']	 = $res ? $res['id'] : 0;
			$info['fit']         = implode(',',$fit);			
			$info['col']         = implode(',',$lm);
            $info['pic']         = $infos['filepath'][0];
            $info['pic_id']      = $infos['id'][0];
            $info['update_time'] = time();
            $info['content'] = stripslashes($_POST['content']);


            if(!$info['content'] || !$info['title']){
                $this->error('标题和内容不能为空！');
            }else{

                if($news_id){
                    $isedit = M('article')->where(array('id'=>$news_id))->data($info)->save();

                    //保存上传图片
                    save_res(P::TYPE_NEWS,$news_id,$infos);

                    if($isedit){
                        $this->success('修改成功！',I('referer',''));
                    }else{
                        $this->error('修改失败！',I('referer',''));
                    }

                }
            }

        }else{
            $id      = I('id', 0);
            $kind    = I('kind',3);

            $this->row      = M('article')->find($id);
            $this->atts     = get_res(P::TYPE_NEWS,$id);    //获取上传素材
            $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
			//栏目
			$infotype  = getTree(2);
			foreach($infotype as $k=>$v){	
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype   = $infotype;
			$this->lm         = explode(',',$this->row['col']);
			$this->fit        = explode(',',$this->row['fit']);
			
			$this->goodsday = C('GOODS_DAYS');
			$this->goodsfit = C('GOODS_FIT');
			$this->goodsfie = C('RES_FIELDS');
            $this->res_pro	= C('RES_PRO');
			
			$res = M('res')->field('title')->find($this->row['expert_id']);	
			$this->resname	= $res ? $res['title'] : '';
			
			$res =  M('res')->where(array('type'=>1))->order('fields')->select();
			$key = array();
			foreach($res as $k=>$v){
				$text = $v['title'];
				$key[$k]['id']         = $v['id'];
				$key[$k]['title']  = $v['title'];
				$key[$k]['pinyin']     = strtopinyin($text);
				$key[$k]['text']       = $text;
				
			}
			
			$this->reskey =  json_encode($key);	
			
			$this->zhuanjia = M('res')->where(array('type'=>1))->order('title DESC')->GetField('id,title',true);
            $this->display('edit');
        }
    }

	
	
	
	
	//实物产品
    public function product(){
        $db       = M('product');
        $keywords = I('keywords','');
        $where = array();
        if($keywords) $where['title'] = array('like','%'.$keywords.'%');

        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';


        //查表
        $infolist = $db->where($where)->order('sort DESC ,create_time DESC')->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($infolist as $k=>$v){
            $tp = M('attachment')->where(array('module'=>P::TYPE_PRODUCT,'releid'=>$v['id']))->find();
            $infolist[$k]['pic']  = $tp ? '<i class="fa fa-picture-o" style="color:#f56954"></i>' : '';
        }


        $this->infotype = $ctype;
        $this->kind     = $kind;
        $this->pagename = $ctype[$kind];
        $this->infolist = $infolist;

        $this->display('product');
    }

    //新增实物产品
    public function product_add(){

        if(isset($_POST['dosubmit'])){


            $info		= I('info','');
            $infos		= I('attr');
			/*$content	= I('content','');*/
			$lm			= I('lm');
			$fit		= I('fit');
			
			$info['fit']         = implode(',',$fit);	
			$info['col']         = implode(',',$lm);
            $info['pic']         = $infos['filepath'][0];
            $info['pic_id']      = $infos['id'][0];
            $info['create_time'] = time();
            $info['update_time'] = time();
            /*$info['content'] 	 = stripslashes($_POST['content']);*/
			$info['editor']      = cookie('name');

            if(!$info['content'] || !$info['title']){
                $this->error('标题和内容不能为空！');
            }else{

                $isadd = M('product')->add($info);
                if($isadd){

                    //保存上传图片
                    save_res(P::TYPE_PRODUCT,$isadd,$infos);


                    $this->success('添加成功！',I('referer',''));
                }else{
                    $this->error('添加失败！',I('referer',''));
                }
            }

        }else{
			
			
			//栏目
			$infotype  = getTree(2);
			foreach($infotype as $k=>$v){	
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype   = $infotype;

            //$kind           = I('kind',3);
            //$this->infotype = C('NEWS_TYPE');
            //$this->kind     = $kind;
            //$this->kindname = $this->infotype[$kind];
			//$this->zhuanjia = M('res')->where(array('type'=>1))->order('title DESC')->GetField('id,title',true);
			$this->goodsday = C('GOODS_DAYS');
			$this->goodsfit = C('GOODS_FIT');
			$this->goodsfie = C('RES_FIELDS');
            $this->res_pro = C('RES_PRO');
			
            $this->display('product_add');
        }
    }


    //修改专家讲座
    public function product_edit(){

        if(isset($_POST['dosubmit'])){

            $productid	= I('productid',0);
            $info		= I('info','');
            $infos		= I('attr');
			/*$content	= I('content','');*/
			$lm			= I('lm');
			$fit		= I('fit');
			
			$info['fit']         = implode(',',$fit);	
			$info['col']         = implode(',',$lm);
            $info['pic']         = $infos['filepath'][0];
            $info['pic_id']      = $infos['id'][0];
            $info['update_time'] = time();
            /*$info['content']     = stripslashes($_POST['content']);*/
			

            if(!$info['content'] || !$info['title']){
                $this->error('标题和内容不能为空！');
            }else{

                if($productid){
                    $isedit = M('product')->where(array('id'=>$productid))->data($info)->save();

                    //保存上传图片
                    save_res(P::TYPE_PRODUCT,$productid,$infos);

                    if($isedit){
                        $this->success('修改成功！',I('referer',''));
                    }else{
                        $this->error('修改失败！',I('referer',''));
                    }

                }
            }

        }else{
            $id      = I('id', 0);

            $this->row      = M('product')->find($id);
            $this->atts     = get_res(P::TYPE_PRODUCT,$id);    //获取上传素材
           // $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
			
			//栏目
			$infotype  = getTree(2);
			foreach($infotype as $k=>$v){	
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype   = $infotype;
			
			$this->lm         = explode(',',$this->row['col']);
			$this->fit        = explode(',',$this->row['fit']);
			
			$this->goodsday = C('GOODS_DAYS');
			$this->goodsfit = C('GOODS_FIT');
			$this->goodsfie = C('RES_FIELDS');
            $this->res_pro = C('RES_PRO');
			
			//$this->zhuanjia = M('res')->where(array('type'=>1))->order('title DESC')->GetField('id,title',true);

            $this->display('product_edit');
        }
    }
	
	
	//删除产品
    public function del_product(){
        $id = I('id');
        if($id){
            M('product')->where(array('id'=>$id))->delete();
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }

    }

	
	
	//科技节产品
    public function sci(){
        $db       = M('sci');
        $keywords = I('keywords','');
        $where = array();
        if($keywords) $where['title'] = array('like','%'.$keywords.'%');

        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';


        //查表
        $infolist = $db->where($where)->order('sort DESC ,create_time DESC')->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($infolist as $k=>$v){
            $tp = M('attachment')->where(array('module'=>P::TYPE_SCI,'releid'=>$v['id']))->find();
            $infolist[$k]['pic']  = $tp ? '<i class="fa fa-picture-o" style="color:#f56954"></i>' : '';
        }


        $this->infotype = $ctype;
        $this->kind     = $kind;
        $this->pagename = $ctype[$kind];
        $this->infolist = $infolist;

        $this->display('sci');
    }

    //新增科技节产品
    public function sci_add(){

        if(isset($_POST['dosubmit'])){


            $info    = I('info','');
            $infos   = I('attr');
			$content = I('content','');
			$lm      = I('lm');
            $fit     = I('fit');

			$info['fit']         = implode(',',$fit);
			$info['col']         = implode(',',$lm);
            $info['pic']         = $infos['filepath'][0];
            $info['pic_id']      = $infos['id'][0];
            $info['create_time'] = time();
            $info['update_time'] = time();
            $info['content'] 	 = stripslashes($_POST['content']);
			$info['editor']      = cookie('name');
			
            if(!$info['content'] || !$info['title']){
                $this->error('标题和内容不能为空！');
            }else{

                $isadd = M('sci')->add($info);
                if($isadd){

                    //保存上传图片
                    save_res(P::TYPE_SCI,$isadd,$infos);


                    $this->success('添加成功！',I('referer',''));
                }else{
                    $this->error('添加失败！',I('referer',''));
                }
            }

        }else{
			
			//栏目
			$infotype  = getTree(2);
			foreach($infotype as $k=>$v){	
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype   = $infotype;

			$this->goodsday = C('GOODS_DAYS');
			$this->goodsfit = C('GOODS_FIT');
			$this->goodsfie = C('RES_FIELDS');
            $this->res_pro = C('RES_PRO');

            $this->display('sci_add');
        }
    }


    //修改科技节产品
    public function sci_edit(){

        if(isset($_POST['dosubmit'])){

            $sciid     = I('sciid',0);
            $info      = I('info','');
            $infos     = I('attr');
			$content   = I('content','');
			$lm        = I('lm');
            $fit       = I('fit');
			
			$info['fit']         = implode(',',$fit);
			$info['col']         = implode(',',$lm);
            $info['pic']         = $infos['filepath'][0];
            $info['pic_id']      = $infos['id'][0];
            $info['update_time'] = time();
            $info['content']     = stripslashes($_POST['content']);
			
		

            if(!$info['content'] || !$info['title']){
                $this->error('标题和内容不能为空！');
            }else{

                if($sciid){
                    $isedit = M('sci')->where(array('id'=>$sciid))->data($info)->save();

                    //保存上传图片
                    save_res(P::TYPE_SCI,$sciid,$infos);

                    if($isedit){
                        $this->success('修改成功！',I('referer',''));
                    }else{
                        $this->error('修改失败！',I('referer',''));
                    }

                }
            }

        }else{
            $id      = I('id', 0);

            $this->row      = M('sci')->find($id);
            $this->atts     = get_res(P::TYPE_SCI,$id);    //获取上传素材
           // $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
			
			
			//栏目
			$infotype  = getTree(2);
			foreach($infotype as $k=>$v){	
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype   = $infotype;
			
			$this->lm         = explode(',',$this->row['col']);
			$this->fit         = explode(',',$this->row['fit']);

			$this->goodsday = C('GOODS_DAYS');
			$this->goodsfit = C('GOODS_FIT');
			$this->goodsfie = C('RES_FIELDS');
            $this->res_pro = C('RES_PRO');
			
            $this->display('sci_edit');
        }
    }
	
	//删除产品
    public function del_sci(){
        $id = I('id');
        if($id){
            M('sci')->where(array('id'=>$id))->delete();
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }

    }

    //科学课程(表格类)列表
    public function science(){
        $db = M('goods');
        $keywords = I('keywords');
        $kind     = I('kind');
        $module   = P::TYPE_SCIENCE;    //表格类

        $where = array();
        if($keywords) $where['title'] = array('like','%'.$keywords.'%');
        if($kind)     $where['kinds'] = array('like','%['.$kind.']%');
        $where['module']              = array('eq',$module);

        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';

        //查询
        $status = C('STATUS_STR');

        $datalist = $db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order($this->orders('update_time'))->select();

        $this->kindlist = M('kinds')->Getfield('id,kind_name',true);
        $this->datalist = $datalist;
        $this->display("science");
    }

    //增加科学课程
    public function science_add(){
        /*
         * $type   = 1; //第一学期课程
         * $type = 2; 第2学期课程
         */
        if(isset($_POST['dosubmint'])){
            $editid = I('editid');
            $info   = I('info','');
            $infos  = I('attr');
            $tag    = I('tag');
            $days   = I('days');
            $days_next= I('days_next');
            $kinds  = I('kinds');
            $lm     = I('lm');
            $fit    = I('fit');
            $fie    = I('fie');
           /* $daypic	= I('daypic');*/
            $title   = $info['title'];
            if (!$title or !$days){
                $this->error("标题或内容不能为空!");
            }

            $info['col']			= implode(',',$lm);
            $info['fit']			= implode(',',$fit);
            $info['fields']			= implode(',',$fie);
            $info['pic']			= $infos['filepath'][0];
            $info['pic_id']			= $infos['id'][0];
            $info['update_time']	= time();
            $info['tag']			= implode(',',$tag);
            $info['kinds']			= implode(',',$kinds);

            if($info['days']        =='请选择'){
                $info['days']       = '';
            }
            if($info['fit']         =='请选择'){
                $info['fit']        = '';
            }
            if($info['fields']      =='请选择'){
                $info['fields']     = '';
            }
            if($editid){
                M('goods')->data($info)->where(array('id'=>$editid))->save();
                $id                 = $editid;
            }else{

                $info['create_time'] = time();
                $id                 = M('goods')->add($info);
            }
            if($id){
                //保存日程(第一学期课程)
                if($days){
                    M('goods_days')->where(array('goods_id'=>$id,'type'=>1))->delete();
                    foreach($days as $k=>$v){
                        $data               = array();
                        $data['goods_id']   = $id;
                        $data['citys']      = $v['citys'];
                        $data['content']    = $v['content'];
                        $data['remarks']    = $v['remarks'];
                        $data['type']       = 1;
                        M('goods_days')->add($data);
                    }
                }

                //保存日程(第二学期课程)
                if($days_next){
                    M('goods_days')->where(array('goods_id'=>$id,'type'=>2))->delete();
                    foreach($days_next as $k=>$v){
                        $data_next             = array();
                        $data_next['goods_id'] = $id;
                        $data_next['citys']    = $v['citys'];
                        $data_next['content']  = $v['content'];
                        $data_next['remarks']  = $v['remarks'];
                        $data_next['type']     = 2;
                        M('goods_days')->add($data_next);
                    }
                }else{
                    M('goods_days')->where(array('goods_id'=>$id,'type'=>2))->delete();
                }

                //保存上传标题图片
                save_res(P::TYPE_GOODS,$id,$infos);

                //保存上传理论课程所需材料图片
               /* save_res(P::TYPE_SCIENCE,$id,$daypic);*/

                $this->success('保存成功！',I('referer',''));
            }else{
                $this->error("保存失败!");
            }

        }else{

            $id     = I('id',0);
            $row    = M('goods')->find($id);
            $atts   = get_res(P::TYPE_GOODS,$id);    //获取上传素材
            /*$daypic	= get_res(P::TYPE_SCIENCE,$id); */   //获取理论课程所需材料图片
            $days           = M('goods_days')->where(array('goods_id'=>$id,'type'=>1))->select();
            $days_next      = M('goods_days')->where(array('goods_id'=>$id,'type'=>2))->select();

            $this->row      = $row;
            $this->tag      =  explode(',',$row['tag']);
            $this->kv       =  explode(',',$row['kinds']);
            $this->atts     = $atts;
            /*$this->daypic	= $daypic;*/
            $this->days     = $days;
            $this->days_next= $days_next;
            $this->goodsday = C('GOODS_DAYS');
            $this->goodsfit = C('GOODS_FIT');
            $this->goodsfie = C('RES_FIELDS');
            $this->res_pro  = C('RES_PRO');
            $this->module   = P::TYPE_SCIENCE;

            //栏目
            $infotype       = getTree(2);
            foreach($infotype as $k=>$v){
                $infotype[$k]['tab']        = fortext($v['level']-1);
            }
            $this->infotype   = $infotype;

            $this->lm         = explode(',',$this->row['col']);
            $this->fit        = explode(',',$this->row['fit']);
            $this->fie        = explode(',',$this->row['fields']);

            $this->kinds      = M('kinds')->Getfield('id,kind_name',true);

            $this->display("science_add");
        }
    }

    /*删除多表格(科学课程)*/
    public function del_science(){
        $id = I('id');
        $res = M("goods")->where("id = '$id'")->delete();
        M('goods_days')->where("goods_id = '$id'")->delete();
        if($res){
            $this->success("删除成功!");
        }else{
            $this->error("删除失败!");
        }
    }
}
	