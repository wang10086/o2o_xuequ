<?php
// 加载参数类
import ('P', COMMON_PATH . 'Common/'); 
use App\P;

/**
 * @brief  载入第三方类库
 * @param  string  $class   要加载的类名（含路径）
 * @return
 */
function ulib ($class) {
    import($class, THINK_PATH . '../ulib/');
}



/**
 * 对用户的密码进行加密
 * @param $password
 * @param $encrypt //传入加密串，在修改密码时做认证
 * @return array/password
 */
function password($password, $encrypt='') {
    $pwd = array();
    $pwd['encrypt'] =  $encrypt ? $encrypt : create_randomstr();
    $pwd['password'] = md5(md5(trim($password)).$pwd['encrypt']);
    return $encrypt ? $pwd['password'] : $pwd;
}

/**
 * 生成随机字符串
 * @param string $lenth 长度
 * @return string 字符串
 */
function create_randomstr($lenth = 6) {
    return random($lenth, '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ');
}

/**
* 产生随机字符串
* @param    int        $length  输出长度
* @param    string     $chars   可选的 ，默认为 0123456789
* @return   string     字符串
*/
function random($length, $chars = '0123456789') {
    $hash = '';
    $max = strlen($chars) - 1;
    for($i = 0; $i < $length; $i++) {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}



function P($var, $stop = true){
	header("Content-Type: text/html;charset=utf-8"); 
    echo '<pre>';
	print_r($var);
	echo '</pre>';
	if ($stop) die();	
}



/**
 * @brief 系统邮件发送函数
 * @param string $to    接收邮件者邮箱
 * @param string $name  接收邮件者名称
 * @param string $subject 邮件主题
 * @param string $body    邮件内容
 * @param string $attachment 附件列表
 * @return boolean
 */
function send_mail ($to,  $name,  $subject = '', $body = '', $attachment = null)
{

    $config = C('EMAIL_CONFIG');

	 ulib('PHPMailer.PHPMailerAutoload');
    
    $mail             = new \PHPMailer(); //PHPMailer对象
    $mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP();  // 设定使用SMTP服务
    $mail->SMTPDebug  = 0;                     // 关闭SMTP调试功能
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
    $mail->SMTPSecure = 'ssl';                 // 使用安全协议
    $mail->Host       = $config['SMTP_HOST'];  // SMTP 服务器
    $mail->Port       = $config['SMTP_PORT'];  // SMTP服务器的端口号
    $mail->Username   = $config['SMTP_USER'];  // SMTP服务器用户名
    $mail->Password   = $config['SMTP_PASS'];  // SMTP服务器密码
    $mail->SetFrom($config['FROM_EMAIL'], $config['FROM_NAME']);
    $replyEmail       = $config['REPLY_EMAIL']?$config['REPLY_EMAIL']:$config['FROM_EMAIL'];
    $replyName        = $config['REPLY_NAME']?$config['REPLY_NAME']:$config['FROM_NAME'];
    $mail->AddReplyTo($replyEmail, $replyName);
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress($to, $name);
    if(is_array($attachment)){ // 添加附件
        foreach ($attachment as $file){
            is_file($file) && $mail->AddAttachment($file);
        }
    }
	
	$send = $mail->Send();   //邮件走你！
    return $send ? true : $mail->ErrorInfo;
}


/*邮件模板*/
function mailmode($mail,$code){
	return '<p>您收到这封邮件，是因为'.$mail.'正在'.C('SYSTEM_NAME').'账户激活操作。</p><p>本次激活的验证码为<strong style="color:#ff3300;">'.$code.'</strong>,该验证码有效期'.(C('SMS_EXPIRE')/60).'分钟，请尽快操作绑定。</p><p>如果您并不需激活账号，请忽略这封邮件。您不需要退订或进行其他进一步的操作。</p><p>此邮件由'.C('SYSTEM_NAME').'自动发送，请勿回复。</p><p>----------------------------------------------------------------------</p><p>'.C('SYSTEM_NAME').' - 研发组</p>';
}


/**
 * @brief 生成二维码
 * @param string $data    要生成二维码的内容
 * @param string $name    生成的二维码文件名
 * @param string $size    生成的二维码文件大小
 */
function QR_code($data,$name = 0,$size = 30){
	
	ulib('phpqrcode.phpqrcode');
	
	$QRcode = new \QRcode();   
	$level = 'L';                     // 纠错级别：L、M、Q、H
	$size = $size;                    // 点的大小：1到10,用于手机端4就可以了
	$name = $name ? $name : time();
	$path = "upload/code/";           //生成的二维码保存于服务器路径
	$fileName = $path.$name.'.png';   // 生成的文件名
	$QRcode->png($data,$fileName,$level,$size);
	
	return $fileName;
}




/*数字转星期*/
function week($i){
	if($i==0){
		$week = '日';	
	}elseif($i==1){
		$week = '一';	
	}elseif($i==2){
		$week = '二';	
	}elseif($i==3){
		$week = '三';	
	}elseif($i==4){
		$week = '四';	
	}elseif($i==5){
		$week = '五';	
	}elseif($i==6){
		$week = '六';	
	}
	
	return $week;
}

/**
 * @desc  返回错误信息
 * @param Int  错误代号
 * @return JSON 
 */ 
function return_msg($code,$msg){	   
	
	$data = array();
	$data['status'] = $code;
	$data['info']  = $msg; 	
    return json_encode($data,JSON_UNESCAPED_UNICODE);   
}


function weixin_login(){
	$get = I();
	$prm = '&action='.ACTION_NAME.'&controller='.CONTROLLER_NAME;
	foreach($get as $k=>$v){
		if($k!='m' && $k!='c' && $k!='a'){
			$prm .= '&'.$k.'='.$v;	
		}	
	}
	
	//获取微信配置信息
	$config     = C('WEIXIN_CONFIG');
	$appid      = $config['appid'];
	$path       = C('WEB_PATH');
	$redirect   = urlencode($path.'index.php?m=Main&c=Weixin&a=wxlogin'.$prm);
	$state      = md5(rand(1000,9999));
	$url        = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$redirect.'&response_type=code&scope=snsapi_userinfo&state='.$state.'#wechat_redirect';
	
	Header("Location: $url"); 
	die();	
}

//加密sign
function genSha1Sign($Parameters){
    $signPars = '';
    ksort($Parameters);
    foreach($Parameters as $k => $v) {
        if("" != $v && "sign" != $k) {
            if($signPars == '')
                $signPars .= $k . "=" . $v;
            else
                $signPars .=  "&". $k . "=" . $v;
        }
    }
    //$signPars = http_build_query($Parameters);
    $sign = SHA1($signPars);
    return $sign;
}


function navShow($con){
	if(CONTROLLER_NAME == $con){
		return ' class="on" ';	
	}	
}



/**
 * 生成缩略图函数
 * @param  $img 图片路径
 * @param  $width  缩略图宽度
 * @param  $height 缩略图高度
 * @param  $autocut 是否自动裁剪 默认不裁剪，当高度或宽度有一个数值为0是，自动关闭
 * @param  $smallpic 无图片是默认图片路径
*/ 
function thumb($img, $width = 80, $height = 60 ,$autocut = 1, $nopic = 'index/assets/images/default.jpg') {

	if(empty($img)) $img = $nopic;   //判断原图路径是否输入

	if(!extension_loaded('gd') || strpos($img, '://')) return $img;
    
	$root_path =  __ROOT__ . DS ;
	if (strpos($img, $root_path) === 0) {
	    $img_replace = substr_replace($img, '', 0, strlen($root_path));
	} else {
	    $img_replace = $img;
	}
	
	if(!file_exists($img_replace)) return C('CDN_URL'). $nopic; //判断原图是否存在

	$newimg = dirname($img_replace).'/thumb_'.$width.'_'.$height.'_'.basename($img_replace);   //缩略图路径

	if(file_exists($newimg)) return C('CDN_URL'). $newimg;  //如果缩略图存在则直接输入
	
	$image = new \Think\Image(); 
	$image->open($img_replace);
    
	if ($autocut) {
        $image->thumb($width, $height,\Think\Image::IMAGE_THUMB_CENTER)->save($newimg);
	} else {
        $image->thumb($width, $height)->save($newimg);
	}
    
	return C('CDN_URL') . $newimg;
}

//获取默认素材
function get_res($module,$releid){
	$attid = array();
	$attachment = M('attachment')->where(array('module'=>$module,'releid'=>$releid))->select();
	return $attachment;
}



/**
	* 发送模板短信
	* @param to 手机号码集合,用英文逗号分开
	* @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
	* @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
*/       
function sendTemplateSMS($to,$datas,$tempId)
{ 
	 ulib('Sms');
	 
     //获取配置信息
	 $config = C('SMS_CONFIG');
     $accountSid     = $config['SID'];
	 $accountToken   = $config['TOKEN'];
	 $appId          = $config['APPID'];
	 $serverIP       = $config['SERVER_IP'];
	 $serverPort     = $config['SERVER_PORT'];
	 $softVersion    = $config['VERSION'];
	 
	 
     $rest = new Sms($serverIP,$serverPort,$softVersion);
     $rest->setAccount($accountSid,$accountToken);
     $rest->setAppId($appId);
    
     // 发送模板短信
    // echo "Sending TemplateSMS to $to <br/>";
     $result = $rest->sendTemplateSMS($to,$datas,$tempId);
	 
	 //保存发送记录
	 $data = array();
	 $data['mobile']			= $to;
	 $data['templet']			= $tempId;
	 $data['content']			= implode(',',$datas);
	 $data['send_time']			= time();
	 $data['status']			= $result->statusCode;
	 $data['send_user']			= 0;
	 $data['send_user_name']	= 'system';
	 $data['send_type']			= 1;
	 M('sms_send_record')->add($data);
	 
	 //处理返回
     if($result == NULL ) {
		 
		 return 'error';
		 /*
         echo "result error!";
         break;
		 */
		 
     }
     if($result->statusCode!=0) {
		 
		 return $result->statusCode;
		 /*
         echo "error code :" . $result->statusCode . "<br>";
         echo "error msg :" . $result->statusMsg . "<br>";
         //TODO 添加错误处理逻辑
		 */
     }else{
		 
		 return 0;
		 /*
         echo "Sendind TemplateSMS success!<br/>";
         // 获取返回信息
         $smsmessage = $result->TemplateSMS;
         echo "dateCreated:".$smsmessage->dateCreated."<br/>";
         echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
         //TODO 添加成功处理逻辑
		 */
     }
	 
	 
	 
	 
}





/**
	* 语音验证码
	* @param verifyCode 验证码内容，为数字和英文字母，不区分大小写，长度4-8位
	* @param playTimes 播放次数，1－3次
	* @param to 接收号码
	* @param displayNum 显示的主叫号码
	* @param respUrl 语音验证码状态通知回调地址，云通讯平台将向该Url地址发送呼叫结果通知
	* @param lang 语言类型。取值en（英文）、zh（中文），默认值zh。
	* @param userData 第三方私有数据
*/
function voiceVerify($verifyCode,$playTimes,$to,$displayNum,$respUrl,$lang,$userData)
{
	ulib('REST');
	
	$config = C('SMS_CONFIG');
	$accountSid     = $config['SID'];   //主帐号
	$accountToken   = $config['TOKEN'];    //主帐号Token
	$appId          = $config['APPID'];    //应用Id
	$serverIP       = 'sandboxapp.cloopen.com';    //请求地址，格式如下，不需要写https://
	$serverPort     = '8883';    //请求端口
	$softVersion    = '2013-12-26';    //REST版本号

	// 初始化REST SDK
	$rest = new REST($serverIP,$serverPort,$softVersion);
	$rest->setAccount($accountSid,$accountToken);
	$rest->setAppId($appId);

	//调用语音验证码接口
	//echo "Try to make a voiceverify,called is $to <br/>";
	$result = $rest->voiceVerify($verifyCode,$playTimes,$to,$displayNum,$respUrl,$lang,$userData);
	 if($result == NULL ) {
		return 'error';
	}

	if($result->statusCode!=0) {
		
		return $result->statusCode;
		/*
		echo "error code :" . $result->statusCode . "<br>";
		echo "error msg :" . $result->statusMsg . "<br>";
		echo "error serverIP :" . $serverIP . "<br>";
		echo "error serverPort :" . $serverPort . "<br>";
		echo "error softVersion :" . $softVersion . "<br>";
		//TODO 添加错误处理逻辑
		*/
	} else{
		return 0;
		/*
		echo "voiceverify success!<br>";
		// 获取返回信息
		$voiceVerify = $result->VoiceVerify;
		echo "callSid:".$voiceVerify->callSid."<br/>";
		echo "dateCreated:".$voiceVerify->dateCreated."<br/>";
	   //TODO 添加成功处理逻辑
	   */
	   
	}
}


//导出PDF(带有个人信息数据的pdf文件)
function exp_pdf($id){

	//获取申请数据
	$row = M('member_apply_service')->find($id);

	if($id && $row){

		$strContent = '<style type="text/css">.pdfbox{  width:700px; height:auto !important; margin:0 auto;} .pdfbox h1{ font-size:24px; font-weight:bold; width:100%; text-align:center; padding:50px 0;}.pdfbox table{ border-collapse: collapse; border: none;}.pdfbox td{ border:1px solid #000000; font-size:16px; line-height:28px; padding:10px; position:relative;}.pdfbox td p.topleft{ position:absolute; left:10px; top:10px; margin:0; padding:0; text-indent:32px;}.pdfbox td p.botright{ width:100%; text-align:right; float:right; margin-top:100px;}.pdfbox td p.pcontent{ padding:20px 0 40px 0; width:100%; float:left; clear:both; text-indent:32px;}</style><div class="pdfbox"><h1>中国科学院科学教育联盟支撑服务校(单位)<br>申报表 </h1><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td width="15%" align="center">学校(单位)名称</td><td colspan="2">'.$row['school_name'].'</td><td width="15%" align="center">校长/负责人 </td><td colspan="3">'.$row['school_master'].'</td></tr><tr><td align="center">学校(单位)地址</td><td colspan="6">'.$row['school_addr'].'</td></tr><tr><td align="center">学校(单位)网站 </td><td colspan="6">'.$row['school_web'].'</td></tr><tr><td align="center">微信公众号 </td><td colspan="6">'.$row['wechat_num'].'</td></tr><tr><td rowspan="3" align="center">科技教育<br>负责人<br>（主管校长或主任） </td><td width="15%"  align="center">姓名</td><td>'.$row['manager_name'].'</td><td width="15%"  align="center">性别</td><td>'.$row['manager_sex'].'</td><td width="15%" align="center">职务</td><td>'.$row['manager_job'].'</td></tr><tr><td align="center">办公电话</td><td>'.$row['tel_num'].'</td><td align="center">手机</td><td colspan="3">'.$row['mobile_num'].'</td></tr><tr><td align="center">邮箱/微信</td><td colspan="5">'.$row['wechat_email'].'</td></tr><tr><td rowspan="3" align="center">联系人</td><td align="center">姓名</td><td>'.$row['contacts_name'].'</td><td align="center">性别</td><td>'.$row['contacts_sex'].'</td><td align="center">职务</td><td>'.$row['contacts_job'].'</td></tr><tr><td align="center">办公电话</td><td>'.$row['contacts_tel'].'</td><td align="center">手机</td><td colspan="3">'.$row['contacts_mobile'].'</td></tr><tr><td align="center">邮箱/微信</td><td colspan="5">'.$row['contacts_email'].'</td></tr><tr><td colspan="7" align="center" align="center">申报单位科学教育建设情况 </td></tr><tr><td colspan="7" height="260" valign="top"><p class="topleft">（从人员、资金、科技活动、基础设施等方面说明） </p><p class="pcontent">'.$row['description'].'</p></td></tr><tr><td colspan="7" align="center" align="center">申请单位承诺 </td></tr><tr><td colspan="7" style=" border-bottom:0;"><p>本单位自愿申请成为中国科学院科学教育联盟支撑服务校(单位)，承诺遵守中国科学院科学教育联盟各项规章制度。 </p></td></tr><tr><td colspan="7" align="right" style="border-top:0; border-bottom:0;"><p>（单位公章）&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td></tr><tr><td colspan="7" align="right" style="border-top:0;"><p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td></tr><tr><td colspan="7" style=" border-bottom:0;"><p class="topleft">评审意见： </p><p class="pcontent">'.$row['verify_view'].'</p></td></tr><tr><td colspan="7" align="right" style="border-top:0;"><p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td></tr></tbody></table></div>';

		//引入类库
		Vendor('mpdf.mpdf');
		//设置中文编码
		$mpdf=new \mPDF('zh-cn','A4', 0, '宋体', 0, 0);
		$mpdf->SetWatermarkText('中科教',0.1);

		$mpdf->showWatermarkText = true;
		//$mpdf->SetHTMLHeader( '头部' );
		//$mpdf->SetHTMLFooter( '底部' );
		//$stylesheet =file_get_contents('themes/wei/css/bootstrap.min.css');
		//$mpdf->WriteHTML($stylesheet, 1);
		$mpdf->WriteHTML($strContent);
		//保存ss.pdf文件
		//$mpdf->Output('ss.pdf');
		//直接浏览器输出pdf
		$mpdf->Output('zkj.pdf',true);
		$mpdf->Output('zkj.pdf','d');
		$mpdf->Output();
		exit;
	}
}


//导出空白表PDF
function exp_pdf_test(){


	$strContent = '<style type="text/css">.pdfbox{  width:80%; height:auto !important; margin:0 10%;} .pdfbox h1{ font-size:24px; font-weight:bold; width:100%; text-align:center; padding:50px 0;}.pdfbox table{ border-collapse: collapse; border: none;}.pdfbox td{ border:1px solid #000000; font-size:16px; line-height:28px; padding:10px; position:relative;}.pdfbox td p.topleft{ position:absolute; left:10px; top:10px; margin:0; padding:0; text-indent:32px;}.pdfbox td p.botright{ width:100%; text-align:right; float:right; margin-top:100px;}.pdfbox td p.pcontent{ padding:20px 0 40px 0; width:100%; float:left; clear:both; text-indent:32px;}</style><div class="pdfbox"><h1>中国科学院科学教育联盟支撑服务校(单位)<br>申报表 </h1><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td width="15%" align="center">学校(单位)名称</td><td colspan="2">'.'</td><td width="15%" align="center">校长/负责人 </td><td colspan="3">'.'</td></tr><tr><td align="center">学校(单位)地址</td><td colspan="6">'.'</td></tr><tr><td align="center">学校(单位)网站 </td><td colspan="6">'.'</td></tr><tr><td align="center">微信公众号 </td><td colspan="6">'.'</td></tr><tr><td rowspan="3" align="center">科技教育<br>负责人<br>（主管校长或主任） </td><td width="15%"  align="center">姓名</td><td>'.'</td><td width="15%"  align="center">性别</td><td>'.'</td><td width="15%" align="center">职务</td><td>'.'</td></tr><tr><td align="center">办公电话</td><td>'.'</td><td align="center">手机</td><td colspan="3">'.'</td></tr><tr><td align="center">邮箱/微信</td><td colspan="5">'.'</td></tr><tr><td rowspan="3" align="center">联系人</td><td align="center">姓名</td><td>'.'</td><td align="center">性别</td><td>'.'</td><td align="center">职务</td><td>'.'</td></tr><tr><td align="center">办公电话</td><td>'.'</td><td align="center">手机</td><td colspan="3">'.'</td></tr><tr><td align="center">邮箱/微信</td><td colspan="5">'.'</td></tr><tr><td colspan="7" align="center" align="center">申报单位科学教育建设情况 </td></tr><tr><td colspan="7" height="260" valign="top"><p class="topleft">（从人员、资金、科技活动、基础设施等方面说明） </p><p class="pcontent">'.'</p></td></tr><tr><td colspan="7" align="center" align="center">申请单位承诺 </td></tr><tr><td colspan="7" style=" border-bottom:0;"><p>本单位自愿申请成为中国科学院科学教育联盟支撑服务校(单位)，承诺遵守中国科学院科学教育联盟各项规章制度。 </p></td></tr><tr><td colspan="7" align="right" style="border-top:0; border-bottom:0;"><p>（单位公章）&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td></tr><tr><td colspan="7" align="right" style="border-top:0;"><p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td></tr><tr><td colspan="7" style=" border-bottom:0;"><p class="topleft">评审意见： </p><p class="pcontent">'.'</p></td></tr><tr><td colspan="7" align="right" style="border-top:0;"><p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td></tr></tbody></table></div>';

	//引入类库
	Vendor('mpdf.mpdf');
	//设置中文编码
	$mpdf=new \mPDF('zh-cn','A4', 0, '宋体', 0, 0);
	$mpdf->SetWatermarkText('中科教',0.1);

	$mpdf->showWatermarkText = true;
	//$mpdf->SetHTMLHeader( '头部' );
	//$mpdf->SetHTMLFooter( '底部' );
	//$stylesheet =file_get_contents('themes/wei/css/bootstrap.min.css');
	//$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML($strContent);
	//保存ss.pdf文件
	//$mpdf->Output('ss.pdf');
	//直接浏览器输出pdf
	$mpdf->Output('zkj.pdf',true);
	$mpdf->Output('zkj.pdf','d');
	$mpdf->Output();
	exit;
}

//兼容array_column
function i_array_column($input, $columnKey, $indexKey=null){
	if(!function_exists('array_column')){
		$columnKeyIsNumber  = (is_numeric($columnKey))?true:false;
		$indexKeyIsNull            = (is_null($indexKey))?true :false;
		$indexKeyIsNumber     = (is_numeric($indexKey))?true:false;
		$result                         = array();
		foreach((array)$input as $key=>$row){
			if($columnKeyIsNumber){
				$tmp= array_slice($row, $columnKey, 1);
				$tmp= (is_array($tmp) && !empty($tmp))?current($tmp):null;
			}else{
				$tmp= isset($row[$columnKey])?$row[$columnKey]:null;
			}
			if(!$indexKeyIsNull){
				if($indexKeyIsNumber){
					$key = array_slice($row, $indexKey, 1);
					$key = (is_array($key) && !empty($key))?current($key):null;
					$key = is_null($key)?0:$key;
				}else{
					$key = isset($row[$indexKey])?$row[$indexKey]:0;
				}
			}
			$result[$key] = $tmp;
		}
		return $result;
	}else{
		return array_column($input, $columnKey, $indexKey);
	}
}

?>


