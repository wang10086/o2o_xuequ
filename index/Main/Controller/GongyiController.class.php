<?php
/**
 * Date: 2017/11/15
 * Time: 0:49
 */

namespace Main\Controller;


class GongyiController extends BaseController{

    public function _initialize(){
        $this->data_right();
    }

    //科教公益
    public function gongyi(){
        $this->page_title      = '公益项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display('gongyi');
    }
	
	//科教公益
    public function zhumeng(){
        $this->page_title      = '中科筑梦行动 - 公益项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display('zhumeng');
    }

    //中科创客营
    public function chuangke(){
        $this->page_title      = '中科筑梦行动 - 公益项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display('chuangke');
    }

    //中科助学营
    public function help_stu(){
        $this->page_title      = '中科筑梦行动 - 公益项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        $this->display('help_stu');
    }

    //预约公益专家信息
    public function pubLession(){
        $this->page_title      = '中科筑梦行动 - 公益项目 - 中科教科学教育平台 - 中国科学院科学教育联盟';
        if (isset($_POST['dosubmint'])){
            $info              = I('info');
            $data              = I('data');
            $info['manager_sex']	= I('manager_sex');
            $info['contacts_sex']	= I('contacts_sex');
            $info['apply_time']		= time();
            $info['apply_user']		= cookie('userid')?cookie('userid'):0;
            $info['status']		    = 10; //从科学公益基金(或基金会网站)用户
            //保存支撑服务校信息
            $res = M('member_apply_service')->add($info);
            //支撑服务校短信模板
            /*if ($res){
                $mobile             = "18518733213";
                $time               = date('Y-m-d H:i:s',NOW_TIME);
                $infos              = array($time);
                sendTemplateSMS($mobile, $infos, "220712");
            }*/
            //保存约课信息
            $article_id             = $data['article_id'];
            $res_id                 = $data['res_id'];
            $data['article_title']  = M('article')->where(array('id'=>$article_id))->getField('title');
            $data['type']           = 10; //从科学公益基金(或基金会网站)用户
            $data['booking_user']	= cookie('userid')?cookie('userid'):0;
            $data['mobile']   		= $info['contacts_mobile'];
            $data['booking_time']	= NOW_TIME;
            $data['yq_name']        = $info['contacts_name'];
            $data['unit_name']      = $info['school_name'];
            $data['manager_name']   = $info['manager_name'];
            $data['call_man']       = $info['contacts_name'];
            $data['tel_num']        = $info['contacts_tel'];
            $data['e_mail']         = $info['contacts_email'];
            $data['pic']            = M('res')->where(array('id'=>$res_id))->getField('title');
            $apply                  = M('appo_lecture')->add($data);
            if ($res && $apply){
                $refer              = U('Gongyi/zhumeng');
                $mobile             = "13811482444";
                $time               = date('Y-m-d H:i:s',NOW_TIME);
                $infos              = array($time);
                sendTemplateSMS($mobile, $infos, "220715"); //手机号码，替换内容数组，模板ID
                die(return_msg('y',"申请成功,我们会及时与您联系!<script type='text/javascript'> setTimeout('location=\"$refer\"',1000);</script>"));
            }else{
                die(return_msg('n','保存申请信息失败，请重试！'));
            }

        }
        $this->res = M('res')->where(array('type'=>1))->getField('id,title',true);
        $this->provincelist = C('PROVINCE');
        $this->display('pubLession');
    }

    //ajax
    public function lession(){
        $id         = I('id');
        $db         = M('article');
        $data       = $db->field('id,title')->where(array('type'=>3,'expert_id'=>$id))->select();
        $this->ajaxReturn($data);
    }
}