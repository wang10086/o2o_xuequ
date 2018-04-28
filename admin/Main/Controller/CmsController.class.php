<?php
namespace Main\Controller;
use Think\Controller;
ulib('Page');
use Sys\Page;
use Sys\P;

class CmsController extends BaseController {



    /*推荐管理列表*/
    public function recommends(){



        $this->display('mail');

    }

    /*编辑推荐*/
    public function recommendsedit(){
        $db = M('recommend');

        $this->rectype     = C('RECTYPE');
        $this->recposition = C('RECPOSITION');
        $this->versionlist = M('client_ver')->field('ver')->group('ver')->where('`id` > 1')->select();
        $this->gamelist    = M('game')->field('game_id,game_name')->select();

        $info = I('info','');
        $pics = I('pics');
        $gameid = I('gameid','');
        $banner = I('banner');
        $video = I('video','');
        $id    = I('id',0);

        if(isset($_POST['dosubmit'])){

            if($pics)  $info['pic_file'] = $pics['imgurl'][0];
            $info['create_time'] = time();
            if($info['type']==1){
                $info['content'] = $gameid;
            }elseif($info['type']==2 && $banner){
                $info['content'] = $banner['imgurl'][0];
            }elseif($info['type']==3){
                $info['content'] = $video;
            }
            $info['start_time'] = strtotime($info['start_time']);
            $info['end_time']   = strtotime($info['end_time']);

            if($id){
                $isok = $db->data($info)->where(array('id'=>$id))->save();
            }else{
                $isok = $db->add($info);
            }


            if($isok){
                $this->success('保存成功！',I('referer',''));
            }else{
                $this->error('保存失败！',I('referer',''));
            }


        }else{

            $this->row = M('recommend')->find($id);
            $this->display('recommendsedit');
        }
    }



}
