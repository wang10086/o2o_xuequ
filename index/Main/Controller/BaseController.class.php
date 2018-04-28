<?php
namespace Main\Controller;
use Think\Controller;
use Org\Util\Rbac;

class BaseController extends Controller {
    
    private $_cssaddon;
    private $_scriptaddon;
    private $_jscode;

    /*public function _empty(){
        $src = '__HTML__/images/404.png';
        echo "<img src=".$src.">";
    }*/
    public function _empty(){
        $this->display('Index/un_find');
    }

    public function __construct()
    {
        parent::__construct();
        $this->count();

    }
    
    // 初始化函数
	public function _initialize()
	{	
		
		$refer =  $_SERVER['HTTP_REFERER'];
        setcookie('refer', $refer);

		$this->_cssaddon = array();
		$this->_scriptaddon = array();
		$this->_jscode = array();
		
		$this->__additional_css__    = '';
		$this->__additional_js__     = '';
		$this->__additional_jscode__ = '';

    }

    //统计网站流量
    public function count(){
        $db         = M('zkj_counter');
        //获取用户IP
        $ip         = $this->Getip();
        //获得时间量
        $DateNow    = date('Y-m-d');
        //读取数据
        $data       = $db->where("date = '$DateNow'")->find();
        $o2o        = $data['o2o_counter'];
        $u_ip       = $data['u_ip'];
        $arr_ip     = explode(',',$data['u_ip']);
        if (!$data){
            $info['date']           = $DateNow;
            $info['o2o_counter']    = $o2o+1;
            $info['u_ip']           = $ip;
            $res    = $db->add($info);
        } else{
            if (!in_array($ip,$arr_ip)){
                $info['o2o_counter']    = $o2o+1;
                $ips                    = $u_ip.','.$ip;
                $info['u_ip']           = $ips;
                $res    = $db->where("date = '$DateNow'")->save($info);
            }
        }

    }

    //获得访客真实ip
    function getIp()
    {
        $IPaddress='';
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $IPaddress = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $IPaddress = getenv("HTTP_CLIENT_IP");
            } else {
                $IPaddress = getenv("REMOTE_ADDR");
            }
        }
        return $IPaddress;
    }

    //右侧栏目数据
    function data_right(){
        //相关专家
        $data_x = M('res')->where("type = '1'")->order(rand(1,15))->limit(6)->select();
        //相关活动
        $data_y = M('goods')->order('sort DESC')->limit(6)->select();
        //相关资源
        $data_z = M('res')->where("type != '1'")->order(rand(1,15))->limit(6)->select();
        $this->data_x = $data_x;
        $this->data_y = $data_y;
        $this->data_z = $data_z;

    }

   /*
    *
    * 为页面额外添加CSS样式文件
    * @access protected
    * @param string $fname  CSS文件名，不需要写.css后缀。自动从assets/css 目录寻找同名文件
    * @return void     
    * 
    */
    protected final function css($fname) 
    {
        $fname = preg_replace('/\.css$/', '', $fname);
        $this->_cssaddon[] = '<link href="'.__ROOT__. '/index/assets/css/'.$fname.'.css" rel="stylesheet" type="text/css" />';
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
        $this->_scriptaddon[] = '<script type="text/javascript" src="' .__ROOT__. '/index/assets/js/'.$fname.'.js"></script>';
        $this->__additional_js__ = join(PHP_EOL, $this->_scriptaddon);
        //$this->assign('__additional_js__', join(PHP_EOL, $this->_scriptaddon));
    }
    
    protected final function jscode($value)
    {
        $this->_jscode[] = '<script type="text/javascript">' . PHP_EOL . $value . PHP_EOL . '</script>';
        $this->__additional_jscode__ = join(PHP_EOL, $this->_jscode);
    }

	
	
}


