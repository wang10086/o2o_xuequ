<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class UnionController extends BaseController {
	
	
	//联盟网站列表
    public function index(){
        $db       = M('article');
        $keywords = I('keywords','');
        $col      = I('col');
        $ctype    = C('NEWS_TYPE');

        $where                          = array();
        $where['module']                = 15;
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
            $tp = M('attachment')->where(array('module'=>P::TYPE_UNION,'releid'=>$v['id']))->find();
            $infolist[$k]['pic']  = $tp ? '<i class="fa fa-picture-o" style="color:#f56954"></i>' : '';
            $infolist[$k]['type'] = $ctype[$v['type']];
        }


        $this->infotype = getTree(4);
        $this->kind     = $kind;
        $this->pagename = $ctype[$kind];
        $this->infolist = $infolist;

        $this->display('index');
    }

    //添加文章
    public function add(){
        if(isset($_POST['dosubmit'])){

            $info   = I('info','');
            $infos  = I('attr');
            $lm		= I('lm');

            $info['module']         = P::TYPE_UNION;
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
            $this->infotype = C('UNION_TYPE');
            $this->kind     = $kind;
            $this->kindname = $this->infotype[$kind];

            //栏目
            $infotype  = getTree(4);
            foreach($infotype as $k=>$v){
                $infotype[$k]['tab']        = fortext($v['level']-1);
            }
            $this->infotype   = $infotype;

            $this->display('add');
        }
    }

    public function edit(){

        if(isset($_POST['dosubmit'])){

            $news_id	= I('news_id',0);
            $info		= I('info','');
            $infos		= I('attr');
            $lm			= I('lm','');

            $info['module']         = P::TYPE_UNION;
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
            //$this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
            $this->lm         = explode(',',$this->row['col']);

            //栏目
            $infotype  = getTree(4);
            /*foreach($infotype as $k=>$v){
                $infotype[$k]['tab']        = fortext($v['level']-1);
            }*/
            $this->infotype   = $infotype;

            $this->display('edit');
        }
    }

    //删除
    public function del_news(){
        $id = I('id');
        if($id){
            M('article')->where(array('id'=>$id))->delete();
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }

    }

    public function morepic_list(){
        $db       = M('article');
        $keywords = I('keywords','');
        $col      = I('col');
        $ctype    = C('NEWS_TYPE');

        $where                          = array();
        $where['module']                = 17;
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
            $tp = M('attachment')->where(array('module'=>P::TYPE_UNION_MOREPIC,'releid'=>$v['id']))->find();
            $infolist[$k]['pic']  = $tp ? '<i class="fa fa-picture-o" style="color:#f56954"></i>' : '';
            $infolist[$k]['type'] = $ctype[$v['type']];
        }


        $this->infotype = getTree(4);
        $this->kind     = $kind;
        $this->pagename = $ctype[$kind];
        $this->infolist = $infolist;
        $this->display();
    }


    public function morepic_add(){
        if (isset($_POST['dosubmit'])){
            $module = P::TYPE_UNION_MOREPIC;//联盟多图文章
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
                        /* $data['citys']    = $v['citys'];*/
                        M('goods_days')->add($data);
                    }
                }

                if($isadd){

                    //保存上传标题图片
                    save_res(P::TYPE_NEWS,$isadd,$infos);

                    //日程图片图片
                    save_res(P::TYPE_UNION_MOREPIC,$isadd,$daypic);


                    $this->success('添加成功！',I('referer',''));
                }else{
                    $this->error('添加失败！',I('referer',''));
                }
            }
        }else{
            $kind           = I('kind',1);
            $this->infotype = C('UNION_TYPE');
            $this->kind     = $kind;
            $this->kindname = $this->infotype[$kind];

            //栏目
            $infotype  = getTree(4);
            foreach($infotype as $k=>$v){
                $infotype[$k]['tab']        = fortext($v['level']-1);
            }
            $this->infotype   = $infotype;

            $this->display();
        }
    }


    /*修改*/
    public function morepic_edit(){
        if(isset($_POST['dosubmit'])){

            $id     = I('editid',0);
            $module = 17;//联盟多图文章
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
                    save_res(P::TYPE_UNION_MOREPIC,$id,$daypic);


                    $this->success('修改成功！',I('referer',''));
                }else{
                    $this->error('修改失败！',I('referer',''));
                }
            }

        }else{
            $module         = 17;//联盟文章文章
            $kind           = I('kind',1);
            $this->infotype = C('NEWS_TYPE');
            $this->kind     = $kind;
            $this->kindname = $this->infotype[$kind];
            $id             = I('id',0);
            $this->row      = M('article')->where("id = '$id'")->find();
            $this->pic      = get_res(P::TYPE_NEWS,$id);
            $this->atts     = get_res(P::TYPE_UNION_MOREPIC,$id);//获取每日上传素材
            $this->days     = M('goods_days')->where(array('goods_id' => $id , 'module' => $module))->select();
            $this->lm         = explode(',',$this->row['col']);

            //栏目
            $infotype  = getTree(4);
            foreach($infotype as $k=>$v){
                $infotype[$k]['tab']        = fortext($v['level']-1);
            }
            $this->infotype   = $infotype;

            $this->display('morepic_edit');
        }

    }


    //资料上传
    public function upload_list(){
        $db             = D('attachment');
        $module         = array(
            P::TYPE_UNION_UPLOAD,       //资料下载16
            P::TYPE_UNION_POLICY,       //政策文件18
            P::TYPE_UNION_NOTIFY,       //通知公告19
        );
        $file_types     = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'pdfx', 'zip', 'rar', '7z');    //排除图片格式和视屏格式
        $where['att.module']  = array('in',$module);
        $where['att.fileext'] = array('in',$file_types);

        $list           = $db->alias('att')->field("art.id,att.releid,att.module,att.filesize,att.filepath,att.fileext,art.title,art.keywords,att.uploadtime,art.description,art.ext_links")->join("left join o2o_article as art on att.releid = art.id")->where($where)->order('att.uploadtime desc')->select();
        $this ->infolist    = $list;

        $this->display();
    }

    public function upload_add(){
        if(isset($_POST['dosubmit'])) {
            
            $db                 = D('article');
            $infos              = I('attr');
            $info               = I('info');

            $data['sort']       = $info['sort'];
            $data['editor']     = $info['editor'];
            $data['source']     = $info['source'];
            $data['title']      = $info['title'];
            $data['ext_links']  = $info['ext_links'];
            $data['keywords']   = $info['keywords'];
            $data['description']= $info['description'];
            $modules            = I('lm');
            $module             = intval($modules[0]);
            $data['module']     = $module;

            $isadd              = $db->add($data);

            if($isadd){
                //保存上传文件
                save_res($module,$isadd,$infos);

            }
            if ($isadd){
                $this->success('上传成功！');
            }else{
                $this->error('上传失败!');
            }

        }else{
            $infotype = array(
                array('id'=>P::TYPE_UNION_UPLOAD, 'title'=>'资料下载'),     //16
                array('id'=>P::TYPE_UNION_POLICY, 'title'=>'政策文件'),     //18
                array('id'=>P::TYPE_UNION_NOTIFY, 'title'=>'通知公告'),     //19
            );
            $this->infotype     = $infotype;
            $this->display();
        }
    }


    //删除
    public function del_upd(){
        $db                  = D('article');
        $id                  = I('id');
        $module              = I('module');

        $res                 = $db->where("id = '$id' && module = '$module'")->delete();
        $res2                = D("attachment")->where("releid = '$id' && module = '$module'")->delete();
        if ($res && $res2){
            $this->success('删除成功！');
        }else{
            $this->error('删除失败!');
        }

    }

    //资料上传
    public function video_list(){
        $db             = D('attachment');
        $module         = P::TYPE_UNION_UPLOAD;    //联盟网站文件
        $file_types     = array( 'mp4', 'flv', 'avi', 'mov', 'wmv', 'swf');    //排除图片格式和视屏格式
        $where['att.module']  = array('eq',$module);
        $where['att.fileext'] = array('in',$file_types);

        $list           = $db->alias('att')->field("art.id,att.releid,att.module,att.filesize,att.filepath,att.fileext,art.title,art.keywords,att.uploadtime,art.description,art.ext_links")->join("left join o2o_article as art on att.releid = art.id")->where($where)->order('att.uploadtime desc')->select();
        $this ->infolist    = $list;

        $this->display();
    }

    //上传视频
    public function video_add(){
        if(isset($_POST['dosubmit'])) {
            $db                 = D('article');
            $infos              = I('attr');
            $info               = I('info');

            $data['sort']       = $info['sort'];
            $data['editor']     = $info['editor'];
            $data['source']     = $info['source'];
            $data['title']      = $info['title'];
            $data['ext_links']  = $info['ext_links'];
            $data['keywords']   = $info['keywords'];
            $data['description']= $info['description'];
            $data['module']     = P::TYPE_UNION_UPLOAD;//联盟网站上传文件

            $isadd              = $db->add($data);

            if($isadd){
                //保存上传文件
                save_res(P::TYPE_UNION_UPLOAD,$isadd,$infos);
                $this->success('上传成功!');
            }

        }else{
            $this->display();
        }
    }
}
	
