<?php
$cfg = array(
    
    'SHOW_PAGE_TRACE'       => false,   //显而页面调试信息。 开发测试用

	
	//'WEB_PATH'              =>   'http://172.17.18.40/peixun/',
    
    /* Cookie设置 */
    'COOKIE_EXPIRE'         =>  0,           // Cookie有效期
    'COOKIE_DOMAIN'         =>  '',          // Cookie有效域名
    'COOKIE_PATH'           =>  '/',         // Cookie路径
    'COOKIE_PREFIX'         =>  'pyu_',      // Cookie前缀 避免冲突
    'COOKIE_HTTPONLY'       =>  '',          // Cookie httponly设置

    /* 默认设定 */
    'DEFAULT_MODULE'        => 'Main',       //默认入口模块，不使用Home
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
        '__HTML__'    => __ROOT__ . '/admin/assets',
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
    'URL_MODEL'             =>  0,          // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
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
	'NOT_AUTH_ACTION'  => 'login,logout,reg,backpassword,public_lockscreen,public_lock,schedule,signlist,public_checkname_ajax',
	'RBAC_ROLE_TABLE'  => 'px_role', // 角色表名称
	'RBAC_USER_TABLE'  => 'px_role_user',  // 用户表名称
	'RBAC_ACCESS_TABLE'=> 'px_access', // 权限表名称
	'RBAC_NODE_TABLE'  => 'px_node',   // 节点表名称
	
	
	/*接口参数*/
	'API_PATH'         => 'http://oa.kexueyou.com/',      
	'API_DES_KEY'      => '1208bf2b5e0347db',     //DES密钥  
	'API_PAR_KEY'      => '52f5ad805b1b409c',     //校验密钥  
	'API_EXP_TIME'     => 7200,                   //接口有效时间7200秒
	
	
	'PAGE_NUM'         => 15,    //每页分页记录条数
	
	//上传文件配置
	'UPLOAD_DIR' => "upload/",
    'UPLOAD_URL' => "upload/",
    
    'UPLOAD_IMG_CFG' => array(
        'maxSize'    =>    1048576 * 150,
        'rootPath'   =>    'upload/',
        'savePath'   =>    date('Ym') . "/",
        'saveName'   =>    array('uniqid',''),
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg','JPG'),
        'autoSub'    =>    true,
        'subName'    =>    array('date','d'),
        'replace'    =>    true,
    ),
    
    'UPLOAD_FILE_CFG' => array(
        'maxSize'    =>    1048576 * 2000,
        'rootPath'   =>    'upload/',
        'savePath'   =>    date('Ym') ."/",
        'saveName'   =>    array('uniqid',''),
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg','JPG', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'pdfx', 'zip', 'rar', '7z', 'mp3', 'mp4', 'flv', 'avi', 'mov', 'wmv', 'swf'),
        'autoSub'    =>    true,
        'subName'    =>    array('date','d'),
        'replace'    =>    true,
    ),
	
	'NEWS_TYPE'       => array(
		'1'          => '资讯',
		'2'          => '公告',
		'3'          => '专家讲座',
		'4'          => '活动',
	),
    
	'RES_TYPE'       => array(
		'1'          => '科教专家',
		'2'          => '科研院所',
		'3'          => '科普组织',
		'4'          => '专业学会',
		'5'          => '科教机构',
		'6'          => '野外台站',
		'7'          => '动植物园',
		'8'          => '博物馆',
		'8'          => '实验室',
	),

    //联盟网站文章类型
    'UNION_TYPE'    => array(
        '新闻动态','通知公告','会员动态','研讨交流','政策文件','课教视角'
    ),
	
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
		'幼儿园','小学低年级','小学高年级','初中','高中','大学','学校教师','公务员','公众',
	),
	
	'GOODS_DAYS'      => array(
		'半天','一天','1-3天','3-5天','5-10天','一学期','一学年','长期'
	),
	
	'MEMBER_LEVEL'    => array(
		'0'   		  => '普通用户',
		'1'   		  => '支撑服务校',
		'2'   		  => '3H工程学校',
	),
	
	
	'APPLY_STATUA'    => array(
		'0'			  => '未审核',
		'1'			  => '审核通过',
		'2'			  => '审核未通过',
	),
	
	//锁屏时间
	'LOCKSCREEN'     => 60*60*24,
	
	'PROVINCE'       => array(
		"北京市"=>"北京市",
		"天津市"=>"天津市",
		"上海市"=>"上海市",
		"重庆市"=>"重庆市",
		"河北省"=>"河北省",
		"河南省"=>"河南省",
		"山东省"=>"山东省",
		"山西省"=>"山西省",
		"辽宁省"=>"辽宁省",
		"吉林省"=>"吉林省",
		"黑龙江省"=>"黑龙江省",
		"内蒙古"=>"内蒙古",
		"安徽省"=>"安徽省",
		"江苏省"=>"江苏省",
		"浙江省"=>"浙江省",
		"福建省"=>"福建省",
		"江西省"=>"江西省",
		"湖北省"=>"湖北省",
		"湖南省"=>"湖南省",
		"广东省"=>"广东省",
		"广西省"=>"广西省",
		"云南省"=>"云南省",
		"贵州省"=>"贵州省",
		"四川省"=>"四川省",
		"陕西省"=>"陕西省",
		"宁夏省"=>"宁夏省",
		"甘肃省"=>"甘肃省",
		"青海省"=>"青海省",
		"新疆"=>"新疆",
		"西藏"=>"西藏",
		"海南省"=>"海南省",
		"香港"=>"香港",
		"澳门"=>"澳门",
		"台湾"=>"台湾",
	),
	
	//邮件配置
	'EMAIL_CONFIG'   =>  array(
		'SMTP_HOST'   => 'smtp.exmail.qq.com', // SMTP服务器
		'SMTP_PORT'   => '465', // SMTP服务器端口,使用465端口必须要求PHP开启openssl扩展
		'SMTP_USER'   => 'service@5000li.com', // SMTP服务器用户名
		'SMTP_PASS'   => '111111', // SMTP服务器密码
		'FROM_EMAIL'  => 'service@5000li.com', // 发件人EMAIL
		'FROM_NAME'   => '系统测试', // 发件人名称
		'REPLY_EMAIL' => '', // 回复EMAIL（留空则为发件人EMAIL）
		'REPLY_NAME'  => '' //回复名称（留空则为发件人名称）
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
	
	
	'LANMU'           => array('1'=>'高端科教资源','2'=>'支撑服务项目','3'=>'资讯栏目','4'=>'联盟网站'),
	
);

$db = include('database.php');
return array_merge($cfg, $db);