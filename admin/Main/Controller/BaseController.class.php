<?php
namespace Main\Controller;
use Think\Controller;
use Org\Util\Rbac;

class BaseController extends Controller {

    private $_cssaddon;
    private $_scriptaddon;
    private $_jscode;


    // 初始化函数
    public function _initialize()
    {


        if(!in_array(ACTION_NAME,explode(",",C('NOT_AUTH_ACTION')))){

            if(cookie('userid')){
                //if(!cookie('comid'))  $this->error('读取数据失败！',U('Main/Index/login'));
                if(ACTION_NAME!='public_lock' && ACTION_NAME!='online' && ACTION_NAME!='public_serverdata'){
                    //更新账户时间
                    M('admin')->data(array('update_time'=>time()))->where(array('id'=>cookie('userid')))->save();
                }
            }else{
                if(cookie('username')){
                    header("location: ".U('Index/public_lockscreen','','',true)."");
                }else{
                    //$this->error('您尚未登陆，请先登录！',U('Main/Index/login'));
                    //die();
                    header("location: ".U('Main/Index/login')."");
                    die();
                }
            }

        }

        //P($_SESSION['_ACCESS_LIST']['MAIN']);


        $pub = substr(ACTION_NAME , 0 , 7);
        if($pub != 'public_'){
            //$notAuth =  strpos(ACTION_NAME, 'public_') === 0;

            //if (!$notAuth) {
            if (C('RBAC_SUPER_ADMIN') != cookie('userid')){

                if(!Rbac::AccessDecision()) {
                    Rbac::checkLogin();
                    $this->error('无权访问',U('Main/Index/login'));
                    //P($_SESSION);
                }
            }
        }


        $this->_cssaddon = array();
        $this->_scriptaddon = array();
        $this->_jscode = array();

        $this->__additional_css__    = '';
        $this->__additional_js__     = '';
        $this->__additional_jscode__ = '';

    }

    /*
     * 为页面额外添加CSS样式文件
     * @access protected
     * @param string $fname  CSS文件名，不需要写.css后缀。自动从assets/css 目录寻找同名文件
     * @return void
     *
     */
    protected final function css($fname)
    {
        $fname = preg_replace('/\.css$/', '', $fname);
        $this->_cssaddon[] = '<link href="'.__ROOT__. '/admin/assets/css/'.$fname.'.css" rel="stylesheet" type="text/css" />';
        $this->__additional_css__ = join(PHP_EOL, $this->_cssaddon);
        //$this->assign('__additional_css__', join(PHP_EOL, $this->_cssaddon));
    }

    /*
     * 为页面额外添加javascript文件
     * @access protected
     * @param string $fname  Javascript文件名，不需要写.js后缀。自动从assets/js 目录寻找同名文件
     * @return void
     *
     */
    protected  final function js($fname)
    {
        $fname = preg_replace('/\.js$/', '', $fname);
        $this->_scriptaddon[] = '<script type="text/javascript" src="' .__ROOT__. '/admin/assets/js/'.$fname.'.js"></script>';
        $this->__additional_js__ = join(PHP_EOL, $this->_scriptaddon);
        //$this->assign('__additional_js__', join(PHP_EOL, $this->_scriptaddon));
    }

    protected final function jscode($value)
    {
        $this->_jscode[] = '<script type="text/javascript">' . PHP_EOL . $value . PHP_EOL . '</script>';
        $this->__additional_jscode__ = join(PHP_EOL, $this->_jscode);
    }


    protected final function orders($field=''){

        $cname = strtolower(CONTROLLER_NAME);
        $aname = strtolower(ACTION_NAME);

        $order_field = I('cookie.'.$cname.'_'.$aname.'_ofield', $field);
        $order_type  = I('cookie.'.$cname.'_'.$aname.'_otype', 'desc');

        $order ='';
        if($order_field) $order = $order_field . ' ' .$order_type;

        $this->js('plugins/cookie/jquery.cookie');
        $this->jscode(" var order_page = '".$cname."_".$aname."'; ");
        $this->jscode("$(document).ready(function(){ init_order(); });");


        return $order;
    }



}


