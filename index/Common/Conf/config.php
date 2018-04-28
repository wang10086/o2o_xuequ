<?php
return array(

	'COMID'                 =>  1,

    'SHOW_PAGE_TRACE'       => false,   //显而页面调试信息。 开发测试用

	'SYSTEM_NAME'           => '中科教科学教育平台',

	/* 数据库设置 */
	'DB_TYPE'               =>  'mysqli',         // 数据库类型
	'DB_HOST'               =>  '127.0.0.1', // 服务器地址
	'DB_NAME'               =>  'xuequo2o',    // 数据库名
    //'DB_USER'               =>  'kl_o2o',        // 用户名
    //'DB_PWD'                =>  'kelvo2o',        // 密码
    'DB_USER'               =>  'root',        // 用户名
    'DB_PWD'                =>  123456,        // 密码
	'DB_PORT'               =>  '3306',           // 端口
	'DB_PREFIX'             =>  'o2o_',

	'URL_CASE_INSENSITIVE'  =>  true,


    /* Cookie设置 */
    'COOKIE_EXPIRE'         =>  0,           // Cookie有效期
    'COOKIE_DOMAIN'         =>  '',          // Cookie有效域名
    'COOKIE_PATH'           =>  '/',         // Cookie路径
    'COOKIE_PREFIX'         =>  'kl_course_',      // Cookie前缀 避免冲突
    'COOKIE_HTTPONLY'       =>  '',          // Cookie httponly设置

	/* 默认设定 */
	'DEFAULT_MODULE'        => 'Main',
	'DEFAULT_ACTION'        => 'home',

    /* 缓存设置 */
    'TMPL_CACHE_TIME'       => 1,
    'DATA_CACHE_TIME'       => 3600,
    'DATA_CACHE_TYPE'       => 'Redis',
    'REDIS_HOST'            => '127.0.0.1',
    'REDIS_PORT'            => 6379,


    /* 模板引擎设置 */
    'TMPL_CONTENT_TYPE'     =>  'text/html', // 默认模板输出类型
    'TMPL_ACTION_ERROR'     =>  'Index:error',  //THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  'Index:success', //THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
    'TMPL_EXCEPTION_FILE'   =>  THINK_PATH.'Tpl/think_exception.tpl',// 异常页面的模板文件
    'TMPL_TEMPLATE_SUFFIX'  =>  '.php',       // 默认模板文件后缀
    'TMPL_PARSE_STRING' => array(
        '__HTML__'    => __ROOT__ . '/index/assets',
    ),

    /* 日志设置 */
    'LOG_RECORD'            =>  true,        // 默认不记录日志
    'LOG_TYPE'              =>  'File',      // 日志记录类型 默认为文件方式
    //'LOG_LEVEL'             =>  'ALERT,CRIT,ERR',  // 允许记录的日志级别
    'LOG_FILE_SIZE'         =>  2097152,	// 日志文件大小限制

    /* SESSION设置 */
    'SESSION_AUTO_START'    =>  true,       // 是否自动开启Session
	/*
    'SESSION_OPTIONS'       =>  array('name'=>'PYUCENTER'),    // session 配置数组 支持type name id path expire domain 等参数
    'SESSION_PREFIX'        =>  '',         // session 前缀
    'SESSION_TYPE'          =>  'Redis',
	*/

    /* URL设置 */
    'URL_MODEL'             =>  2,          // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式


	'RBAC_SUPER_ADMIN' => 1,
	'ADMIN_AUTH_KEY'   => 'administrator',
	'USER_AUTH_ON'     => true,
	'USER_AUTH_TYPE'   => 1, // (1 登录验证  2 时时验证)
	'USER_AUTH_KEY'    => 'userid', // 认证识别号
	//'REQUIRE_AUTH_MODULE' //  需要认证模块
	'NOT_AUTH_MODULE'  => 'Api,Attachment', // 无需认证模块
	'USER_AUTH_GATEWAY'=> '/Index/login',// 认证网关
	//'RBAC_DB_DSN' //  数据库连接DSN
	'NOT_AUTH_ACTION'  => 'login,logout,reg,backpassword,public_lockscreen,public_lock,online,public_serverdata',
	'RBAC_ROLE_TABLE'  => 'cg_role', // 角色表名称
	'RBAC_USER_TABLE'  => 'cg_role_user',  // 用户表名称
	'RBAC_ACCESS_TABLE'=> 'cg_access', // 权限表名称
	'RBAC_NODE_TABLE'  => 'cg_node',   // 节点表名称

	'PAGE_NUM'         => 15,    //每页分页记录条数

	//上传文件配置
	'UPLOAD_DIR' => "upload/",
    'UPLOAD_URL' => "upload/",

    'UPLOAD_IMG_CFG' => array(
        'maxSize'    =>    1048576 * 1.5,
        'rootPath'   =>    'upload/',
        'savePath'   =>    date('Ym') . "/",
        'saveName'   =>    array('uniqid',''),
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
        'autoSub'    =>    true,
        'subName'    =>    array('date','d'),
        'replace'    =>    true,
    ),

    'UPLOAD_FILE_CFG' => array(
        'maxSize'    =>    1048576 * 20,
        'rootPath'   =>    'upload/',
        'savePath'   =>    date('Ym') ."/",
        'saveName'   =>    array('uniqid',''),
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'pdfx', 'zip', 'rar', '7z', 'mp3', 'mp4', 'flv', 'avi', 'mov', 'wmv', 'swf'),
        'autoSub'    =>    true,
        'subName'    =>    array('date','d'),
        'replace'    =>    true,
    ),

	//锁屏时间
	'LOCKSCREEN'     => 60*60*24,
	
	'CDN_URL'        => '/', 
	
	'RES_FIELDS'     => array(
		'数学与信息','物理与工程','生命科学','地球与空间科学','化学与材料','能源与环境','专项科学','研学旅行','STEAM课程','生态学','历史','人文','天文','其他'
	),
	
	'RES_SYSTEMS'    => array(
		'中国科学院院内','中国科学院院外','老科学家演讲团'
	),
	
	'RES_PRO'        => array(
		'专家讲座','研学旅行','科学课程','探究式课题','科技节','科学博物园','教学教具','展览展示','教师培训','学校定制'
	),
	
	'GOODS_FIT'      => array(
		'幼儿园','小学低年级','小学高年级','初中','高中','学校教师','其他',
	),
	
	'GOODS_DAYS'      => array(
		'半天','一天','1-3天','3-5天','5-10天','一学期','一学年','长期'
	),
	
	'MEMBER_LEVEL'    => array(
		'0'   		  => '普通用户',
		'1'   		  => '支撑服务校',
		'2'   		  => '3H工程学校',
	),
	
	
	/*短信配置*/
	'SMS_CONFIG'            => array(
		'SID'               => '8a216da85fb86db0015fc55b96d6004d',
		'TOKEN'             => '4a88a06bf2384900921b4f7082b3335e',
		'APPID'             => '8a216da85fe1c856015fe6752889020d',
		'SERVER_IP'         => 'app.cloopen.com',
		'SERVER_PORT'       => '8883',
		'VERSION'           => '2013-12-26',
		
	),
	
	
	'PROVINCE'       => array(
		"北京市"=>"116.402748,39.915131",
		"天津市"=>"117.169566,39.164645",
		"上海市"=>"121.461279,31.255935",
		"重庆市"=>"107.894486,30.124896",
		"河北省"=>"115.621351,38.593175",
		"河南省"=>"113.487265,33.978249",
		"山东省"=>"118.41774,36.335044",
		"山西省"=>"112.593473,37.866279",
		"辽宁省"=>"123.403499,41.800096",
		"吉林省"=>"125.330315,43.917827",
		"黑龙江省"=>"128.278691,47.376199",
		"内蒙古"=>"112.824962,42.001059",
		"安徽省"=>"117.322842,31.891106",
		"江苏省"=>"119.742346,33.084585",
		"浙江省"=>"119.963113,29.354206",
		"福建省"=>"118.049794,26.080252",
		"江西省"=>"115.400584,27.500208",
		"湖北省"=>"112.08907,31.237988",
		"湖南省"=>"111.721124,27.860542",
		"广东省"=>"113.266497,23.222169",
		"广西省"=>"108.368564,22.817544",
		"云南省"=>"102.796394,25.00846",
		"贵州省"=>"106.711029,26.563656",
		"四川省"=>"104.073198,30.666011",
		"陕西省"=>"108.928485,34.281297",
		"宁夏省"=>"106.201935,37.516687",
		"甘肃省"=>"103.92067,36.126362",
		"青海省"=>"95.605092,35.767317",
		"新疆"=>"86.038498,41.255669",
		"西藏"=>"91.079786,29.630042",
		"海南省"=>"109.761362,19.161327",
		"香港"=>"114.223157,22.335023",
		"澳门"=>"113.487265,22.060891",
		"台湾"=>"121.030156,23.934394",
	),


);
