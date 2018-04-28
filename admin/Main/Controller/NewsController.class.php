<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class NewsController extends BaseController {


    //新闻动态
    public function index(){
        $db       = M('article');
        $keywords = I('keywords','');
		$col      = I('col');
        $ctype    = C('NEWS_TYPE');

        $where                          = array();
        $where['module']                = 0;
        $where['type']                  = 0;
        if($keywords) $where['title']   = array('like','%'.$keywords.'%');
		if($col) $where['col']          = array('like','%['.$col.']%');


        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';


        //查表
        $infolist = $db->where($where)->order('sort DESC ,create_time DESC')->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($infolist as $k=>$v){
            $tp = M('attachment')->where(array('module'=>P::TYPE_NEWS,'releid'=>$v['id']))->find();
            $infolist[$k]['pic']  = $tp ? '<i class="fa fa-picture-o" style="color:#f56954"></i>' : '';
            $infolist[$k]['type'] = $ctype[$v['type']];
        }


        $this->infotype = getTree(3);
        $this->kind     = $kind;
        $this->pagename = $ctype[$kind];
        $this->infolist = $infolist;

        $this->display('index');
    }

    //新增资讯
    public function add(){

        if(isset($_POST['dosubmit'])){



            $info   = I('info','');
            $infos  = I('attr');
			$lm		= I('lm');
			
			$info['col']			= implode(',',$lm);
            $info['pic']			= $infos['filepath'][0];
            $info['pic_id']			= $infos['id'][0];
            $info['create_time']	= time();
            $info['update_time']	= time();
			$info['type']			= 0;
            $info['content']		= stripslashes($_POST['content']);
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

            $kind           = I('kind',1);
            $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
            $this->kindname = $this->infotype[$kind];

			
			//栏目
			$infotype  = getTree(3);
			foreach($infotype as $k=>$v){	
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype   = $infotype;

            $this->display('add');
        }
    }


    //修改资讯
    public function edit(){

        if(isset($_POST['dosubmit'])){

            $news_id	= I('news_id',0);
            $info		= I('info','');
            $infos		= I('attr');
			$lm			= I('lm','');

			$info['col']			= implode(',',$lm);
            $info['pic']			= $infos['filepath'][0];
            $info['pic_id']			= $infos['id'][0];
            $info['update_time']	= time();
            $info['content']		= stripslashes($_POST['content']);
			$info['type']			= 0;

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
            $kind    = I('kind',1);

            $this->row      = M('article')->find($id);
            $this->atts     = get_res(P::TYPE_NEWS,$id);    //获取上传素材
            $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
			$this->lm         = explode(',',$this->row['col']);

			//栏目
			$infotype  = getTree(3);
			foreach($infotype as $k=>$v){
				$infotype[$k]['tab']        = fortext($v['level']-1);
			}
			$this->infotype   = $infotype;

            $this->display('edit');
        }
    }



    //删除文章
    public function del_news(){
        $id = I('id');
        if($id){
            M('article')->where(array('id'=>$id))->delete();
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }

    }

    /*旅游文章管理*/
    public function travel(){
        $db       = M('article');
        $keywords = I('keywords','');
        $col      = I('col');
        $ctype    = C('NEWS_TYPE');

        $where                          = array();
        $where['module']                = 14;
        $where['type']                  = 0;
        if($keywords) $where['title']   = array('like','%'.$keywords.'%');
        if($col) $where['col']          = array('like','%['.$col.']%');


        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';


        //查表
        $infolist = $db->where($where)->order('sort DESC ,create_time DESC')->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($infolist as $k=>$v){
            $tp = M('attachment')->where(array('module'=>P::TYPE_NEWS,'releid'=>$v['id']))->find();
            $infolist[$k]['pic']  = $tp ? '<i class="fa fa-picture-o" style="color:#f56954"></i>' : '';
            $infolist[$k]['type'] = $ctype[$v['type']];
        }


        $this->infotype = getTree(3);
        $this->kind     = $kind;
        $this->pagename = $ctype[$kind];
        $this->infolist = $infolist;
        $this->display('tra_index');
    }

    /*增加旅游文章*/
    public function tra_add(){
    if(isset($_POST['dosubmit'])){

        $module = 14;//旅游文章
        $info   = I('info','');
        $infos  = I('attr');
        $lm		= I('lm');
        $daypic = I('daypic');

        $info['module']         = $module;
        $info['col']			= implode(',',$lm);
        $info['pic']			= $infos['filepath'][0];
        $info['pic_id']			= $infos['id'][0];
        $info['create_time']	= time();
        $info['update_time']	= time();
        $info['type']			= 0;
        $days                   = I('days');
        $this->days             = $days;
        $this->lm         = explode(',',$this->row['col']);

        if(!$info['title'] || !$days){
            $this->error('标题和内容不能为空！');
        }else{

            $isadd = M('article')->add($info);

            //保存日程
            if($days){
                M('goods_days')->where(array('goods_id'=>$isadd,'module'=>$module))->delete();
                foreach($days as $k=>$v){
                    $data = array();
                    $data['goods_id'] = $isadd;
                    $data['module']   = $module;
                    $data['content']  = $v['content'];
                    $data['remarks']  = $v['remarks'];
                    $data['citys']    = $v['citys'];
                    M('goods_days')->add($data);
                }
            }

            if($isadd){

                //保存上传标题图片
                save_res(P::TYPE_NEWS,$isadd,$infos);

                //日程图片图片
                save_res(P::TYPE_TRAVEL_NEWS,$isadd,$daypic);


                $this->success('添加成功！',I('referer',''));
            }else{
                $this->error('添加失败！',I('referer',''));
            }
        }

    }else{
        $kind           = I('kind',1);
        $this->infotype = C('NEWS_TYPE');
        $this->kind     = $kind;
        $this->kindname = $this->infotype[$kind];

        //栏目
        $infotype  = getTree(3);
        foreach($infotype as $k=>$v){
            $infotype[$k]['tab']        = fortext($v['level']-1);
        }
        $this->infotype   = $infotype;

        $this->display('tra_add');
    }

}

/*修改*/
    public function tra_edit(){
        if(isset($_POST['dosubmit'])){

            $id     = I('editid',0);
            $module = 14;//旅游文章
            $info   = I('info','');
            $infos  = I('attr');
            $lm		= I('lm');
            $daypic = I('daypic');

            $info['module']         = $module;
            $info['col']			= implode(',',$lm);
            $info['pic']			= $infos['filepath'][0];
            $info['pic_id']			= $infos['id'][0];
            $info['create_time']	= time();
            $info['update_time']	= time();
            $info['type']			= 0;
            $days                   = I('days');
            $this->days             = $days;

            if(!$info['title'] || !$days){
                $this->error('标题和内容不能为空！');
            }else{

                $res = M('article')->where("id = '$id'")->save($info);
                //保存日程
                if($days){
                    M('goods_days')->where(array('goods_id'=>$id,'module'=>$module))->delete();
                    foreach($days as $k=>$v){
                        $data = array();
                        $data['goods_id'] = $id;
                        $data['module']   = $module;
                        $data['content']  = $v['content'];
                        $data['remarks']  = $v['remarks'];
                        $data['citys']    = $v['citys'];
                        M('goods_days')->add($data);
                    }
                }

                if($id){

                    //保存上传标题图片
                    save_res(P::TYPE_NEWS,$id,$infos);

                    //日程图片图片
                    save_res(P::TYPE_TRAVEL_NEWS,$id,$daypic);


                    $this->success('修改成功！',I('referer',''));
                }else{
                    $this->error('修改失败！',I('referer',''));
                }
            }

        }else{
            $module         = 14;//旅游文章
            $kind           = I('kind',1);
            $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
            $this->kindname = $this->infotype[$kind];
            $id             = I('id',0);
            $this->row      = M('article')->where("id = '$id'")->find();
            $this->pic     = get_res(P::TYPE_NEWS,$id);
            $this->atts     = get_res(P::TYPE_TRAVEL_NEWS,$id);//获取每日上传素材
            $this->days     = M('goods_days')->where(array('goods_id' => $id , 'module' => $module))->select();
            $this->lm         = explode(',',$this->row['col']);

            //栏目
            $infotype  = getTree(3);
            foreach($infotype as $k=>$v){
                $infotype[$k]['tab']        = fortext($v['level']-1);
            }
            $this->infotype   = $infotype;

            $this->display('tra_edit');
        }

    }

    //长图文章(一张大图片)
    public function pic(){
        $db       = M('article');
        $keywords = I('keywords','');
        $col      = I('col');
        $ctype    = C('NEWS_TYPE');

        $where                          = array();
        $where['module']                = P::TYPE_PIC_NEWS; //素材类型为大图新闻(内容为一张大图,纯图片)
        $where['type']                  = 0;
        if($keywords) $where['title']   = array('like','%'.$keywords.'%');
        if($col) $where['col']          = array('like','%['.$col.']%');


        //分页
        $pagecount = $db->where($where)->count();
        $page = new Page($pagecount, P::PAGE_SIZE);
        $this->pages = $pagecount>P::PAGE_SIZE ? $page->show():'';


        //查表
        $infolist = $db->where($where)->order('sort DESC ,create_time DESC')->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($infolist as $k=>$v){
            $tp = M('attachment')->where(array('module'=>P::TYPE_NEWS,'releid'=>$v['id']))->find();
            $infolist[$k]['pic']  = $tp ? '<i class="fa fa-picture-o" style="color:#f56954"></i>' : '';
            $infolist[$k]['type'] = $ctype[$v['type']];
        }


        $this->infotype = getTree(3);
        $this->kind     = $kind;
        $this->pagename = $ctype[$kind];
        $this->infolist = $infolist;
        $this->display("pic_index");
    }

    //新增资讯
    public function pic_add(){

        if(isset($_POST['dosubmit'])){

            $info   = I('info','');
            $infos  = I('attr');
            $lm		= I('lm');
            $conpic = I("daypic");
            /*$daypic = I('daypic');*/

            $info['col']			= implode(',',$lm);
            $info['pic']			= $infos['filepath'][0];
            $info['pic_id']			= $infos['id'][0];
            $info['create_time']	= time();
            $info['update_time']	= time();
            $info['type']			= 0;
            $info['module']         = P::TYPE_PIC_NEWS;
            /*$info['content']		= stripslashes($_POST['content']);*/
            if(!$info['title']){
                $this->error('标题不能为空！');
            }else{

                $isadd = M('article')->add($info);
                if($isadd){

                    //保存上传标题图片
                    save_res(P::TYPE_NEWS,$isadd,$infos);
                    //保存上传内容大图片
                    save_res(P::TYPE_PIC_NEWS,$isadd,$conpic);

                    $this->success('添加成功！',I('referer',''));
                }else{
                    $this->error('添加失败！',I('referer',''));
                }
            }

        }else{

            $kind           = I('kind',1);
            $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
            $this->kindname = $this->infotype[$kind];

            //栏目
            $infotype  = getTree(3);
            foreach($infotype as $k=>$v){
                $infotype[$k]['tab']        = fortext($v['level']-1);
            }
            $this->infotype   = $infotype;
            $this->display('pic_add');
        }
    }

    public function pic_edit(){

        if(isset($_POST['dosubmit'])){

            $news_id	= I('news_id',0);
            $info		= I('info','');
            $infos		= I('attr');
            $lm			= I('lm','');
            $conpic     = I('daypic');

            $info['col']			= implode(',',$lm);
            $info['pic']			= $infos['filepath'][0];
            $info['pic_id']			= $infos['id'][0];
            $info['update_time']	= time();
            /*$info['content']		= stripslashes($_POST['content']);*/
            $info['type']			= 0;
            $info['module']         = P::TYPE_PIC_NEWS;

            if(!$info['title']){
                $this->error('标题不能为空！');
            }else{

                if($news_id){
                    $isedit = M('article')->where(array('id'=>$news_id))->data($info)->save();

                    //保存上传标题图片
                    save_res(P::TYPE_NEWS,$news_id,$infos);
                    //保存上传内容大图片
                    save_res(P::TYPE_PIC_NEWS,$news_id,$conpic);

                    if($isedit){
                        $this->success('修改成功！',I('referer',''));
                    }else{
                        $this->error('修改失败！',I('referer',''));
                    }

                }
            }

        }else{
            $id      = I('id', 0);
            $kind    = I('kind',1);

            $this->row      = M('article')->find($id);
            $this->pic      = get_res(P::TYPE_NEWS,$id);    //获取上传素材
            $this->atts     = get_res(P::TYPE_PIC_NEWS,$id);//获取正文大图
            $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
            $this->lm         = explode(',',$this->row['col']);

            //栏目
            $infotype  = getTree(3);
            foreach($infotype as $k=>$v){
                $infotype[$k]['tab']        = fortext($v['level']-1);
            }
            $this->infotype   = $infotype;

            $this->display('pic_edit');
        }
    }

}
	