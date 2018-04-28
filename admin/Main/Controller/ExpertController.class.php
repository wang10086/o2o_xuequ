<?php
/**
 * Date: 2018/1/2
 * Time: 9:04
 */

namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;


class ExpertController extends BaseController{
    //老专家网站列表
    public function index(){
        $db       = M('article');
        $keywords = I('keywords','');
        $col      = I('col');
        $ctype    = C('NEWS_TYPE');

        $where                          = array();
        $where['module']                = P::TYPE_EXPERT;
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
            $tp = M('attachment')->where(array('module'=>P::TYPE_EXPERT,'releid'=>$v['id']))->find();
            $infolist[$k]['pic']  = $tp ? '<i class="fa fa-picture-o" style="color:#f56954"></i>' : '';
            $infolist[$k]['type'] = $ctype[$v['type']];
        }

        //$this->infotype = getTree(4);
        $this->kind     = $kind;
        $this->pagename = $ctype[$kind];
        $this->infolist = $infolist;

        $this->display('index');
    }

    //添加老专家文章
    public function add(){
        if(isset($_POST['dosubmit'])){

            $info   = I('info','');
            $infos  = I('attr');

            $info['module']         = P::TYPE_EXPERT;
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
            $this->kind     = $kind;
            $this->kindname = $this->infotype[$kind];

            $this->display('add');
        }
    }

    public function edit(){
        if(isset($_POST['dosubmit'])){

            $news_id	= I('news_id',0);
            $info		= I('info','');
            $infos		= I('attr');
            $lm			= I('lm','');

            $info['module']         = P::TYPE_EXPERT;
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
            $this->kind     = $kind;

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

}