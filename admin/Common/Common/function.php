<?php
// 加载参数类
import ('P', COMMON_PATH . 'Common/'); 
use App\P;
ulib('Jodes');
use Sys\Jodes;
ulib('Pinyin');
use Sys\Pinyin;

/**
 * @brief  载入第三方类库
 * @param  string  $class   要加载的类名（含路径）
 * @return
 */
function ulib ($class) {
    import($class, THINK_PATH . '../ulib/');
}

/*获取API*/
function get_api($path,$code=''){
	
	$ca = explode("/", $path); 
	
	$des = C('API_DES_KEY');
	$ver = C('API_PAR_KEY');
	
	$endes = new Jodes();
	$encode = $endes->encode($code,$des);
	$verify = md5($encode.$ver);
	
	$apiurl =  C('API_PATH').'api.php?c='.$ca[0].'&a='.$ca[1].'&auth='.$encode.'&verify='.$verify;
	
	
	$jieguo = file_get_contents($apiurl);	
	return json_decode($jieguo, true);
}

/*redis*/
function redis($key,$val=null){
	//global $redis_server;
	//if (!$redis_server) {
	   $redis_server = new \Redis();	
	   $redis_server->connect( C('REDIS_HOST'), C('REDIS_PORT'));
		//$redis_server->auth(ccc);
	//}
	if($val){
		$redis_server->set($key, $val);	
		
	}else{
		 $val = $redis_server->get($key);
	}
	$redis_server->close();
	return $val;
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

/**
 * 判断菜单是否有权限显示
 * @text String 如"Index/index"
 * @return 1为有权限显示、0为无权限显示
 */
function rolemenu($obj){
	
	
	$menu = array();
	//默认样式
	$style =  0;	
	//判断是否为开发者权限
	if(cookie('userid')==C('RBAC_SUPER_ADMIN')){
		$style = 1;
	}else{
		
		if(!is_array($obj)){
			$obj = array($obj);	
		}
		
		foreach($obj as $bb=>$unit){
			$text = strtoupper($unit);
			if($_SESSION['_ACCESS_LIST']){
				if(is_array($_SESSION['_ACCESS_LIST']['MAIN'])){
					foreach($_SESSION['_ACCESS_LIST']['MAIN'] as $k=>$v){
						foreach($v as $a=>$b){
							$menu[] = $k.'/'.$a;
						}
					}
					if(in_array($text,$menu)){
						$style = 1;	
					}
				}
			}
		}
		
	}

	return $style;	
}

//用户关系递归
function Userrelation($id = 0) { 
    global $str; 
	$db = M('admin');
	$guanxibiao = $db->field('id,parentid')->where(array('parentid'=>$id))->select();
    if($guanxibiao){
		foreach ($guanxibiao as $row){
            $str .= $row['id']. ",";
            Userrelation($row['id']);
		}
    } 
    return $str; 
} 

//角色关系递归
function Rolerelation($id = 0) { 
    global $str; 
	$db = M('role');
	$guanxibiao = $db->field('id,parentid')->where(array('parentid'=>$id))->select();
    if($guanxibiao){
		foreach ($guanxibiao as $row){
            $str .= $row['id']. ",";
            Rolerelation($row['id']);
		}
    } 
    return $str; 
} 

//渠道关系递归
function Dealerrelation($id = 0) { 
    global $str; 
	$db = M('dealer');
	$guanxibiao = $db->field('id,parentid')->where(array('parentid'=>$id))->select();
    if($guanxibiao){
		foreach ($guanxibiao as $row){
            $str .= $row['id']. ",";
            Dealerrelation($row['id']);
		}
    } 
    return $str; 
} 

/**
* 状态输出
* @param    int        $status  状态
* @return   String     $status对应的显示状态
*/
function statustr($status){
	if($status==1){
		return '<font color="#009900">正常</font>';
	}else{
		return '<font color="#cc0000">异常</font>';
	}
}


/*差集*/
function diff_array($array1,$array2){
	$array = array();
	foreach($array1 as $v){
		if(!in_array($v,$array2)){
			$array[] = $v;	
		}	
	}
	return $array;
}



function merge_node($node, $access, $pid = 0) {
	$arr = array();
	foreach ($node as $v) {
		if (is_array($access)) {
	        $v['access'] = in_array($v['id'], $access) ? 1 : 0;	
	    }
	    if ($v['pid'] == $pid) {
		    $v['child'] = merge_node($node, $access, $v['id']);
			$arr[] = $v;	
		}
	}
	return $arr;
}

//
function ck ($str, $val, $yes = ' checked="checked" ', $no = ''){
    if (is_int($str)) return $str == $val ? $yes : $no;
    if (empty($str) && $val == "0" ) return $yes;
    return strpos($str, $val) === 0 ? $yes : $no;
}

function hide ($str, $val, $yes = ' style="display:none;" ', $no = ''){
    if (empty($str) && $val == "0" ) return $yes;
    return strpos($str, $val) === 0 ? $yes : $no;
}

function sel ($str, $val, $yes = ' selected ', $no = ''){
    if (is_int($str)) return $str == $val ? $yes : $no;
    if (empty($str) && $val =="0" ) return $yes;
    return $str == $val ? $yes : $no;
}

function ison ($str, $val, $yes = 'active', $no =''){
    return ck($str, $val, $yes, $no);
}


function P($var, $stop = true){
	header("Content-Type: text/html;charset=utf-8"); 
    echo '<pre>';
	print_r($var);
	echo '</pre>';
	if ($stop) die();	
}


/**
 * 编辑器
**/
function editor($editor_name, $default = '', $editor_id = '') {
	$str = '';
	if(!defined('EDITOR_INIT')) {
		$str .= '<script type="text/javascript" src="' .__ROOT__. '/admin/assets/comm/ckeditor/ckeditor.js"></script>';
				
		define('EDITOR_INIT', 1);
	}     
	if (empty($editor_id)) $editor_id = preg_replace("/\[\]/", "_", $editor_name);
	return $str.'<textarea class="ckeditor" name="'.$editor_name.'" id="'.$editor_id.'" >'.$default.'</textarea>';
}


/**
 * 上传图片
**/
function upload_image($name,$uptext = '上传图片', $default = '', $multi = true) {
    $str = '';    
	if (!defined('INIT_UPLOAD_IMAGE')) {
		  $str .= '<script type="text/javascript" src="' .__ROOT__. '/admin/assets/comm/upfile.js"></script>';
		  //$str .= '<link rel="stylesheet" href="'. __ASSETS__. 'css/upload_img.css" />';
		  define('INIT_UPLOAD_IMAGE', 1);
	}
	
	$show = '';
	$values = array();
	if (!empty($default)) {
		if (preg_match('/^(\d+,?)+$/', $default)) {
		    $db = M('attachment');
		    $rs = $db->where("id in (".$default.")")->select();
			$i = 0;
			foreach($rs as $line) {
			    $values[$i]['id'] = $line['id'];
				$values[$i]['thumb'] =  dirname($line['filepath']). "/thumb_80_60_" . basename($line['filepath']);
				$values[$i]['imgurl'] = $line['filepath'];
				$values[$i]['fileext'] = $line['fileext'];
				$i++;
			}
		} else {
			$i = 0;
			foreach(explode(",", $default) as $img) {
				if (empty($img)) continue;
		        $values[$i]['id'] = '';
				if (strpos($img, 'http://') === false) {
				    $values[$i]['thumb'] = dirname($img). "/thumb_80_60_" . basename($img);
				} else {
					$values[$i]['thumb'] = $img;
				}
				$values[$i]['imgurl'] = $img;
				$i++;
			}
		}
	}
	
	$close = $multi ? '<div class="closeimg"><a href="javascript:;" onclick="javascript:g_remove_img(this);" class="iclose"></a></div>' : '';
	$arr = $multi ? '[]' : '';
	
	foreach($values as $row) {
		
		if($row['fileext']=='png' ||  $row['fileext']=='gif' ||  $row['fileext']=='jpg' ||  $row['fileext']=='jpeg'){
			$imgs = $row['thumb'];
		}else{
			$imgs = 'admin/assets/comm/upload/file/'.$row['fileext'].'.jpg';
		}
		
		$show .= '<div class="oneimg">'.$close.'<div class="imgdiv"><div class="outline"><img src="'.$imgs.'"  height="60" alt="点击查看大图" onclick="g_open_big(\''.$row['imgurl'] .'\');" /></div></div><div style="display:none"><input type="checkbox" name="'.$name.'[id]'.$arr.'" value="'.$row['id'].'" checked="checked"/><input type="checkbox" name="'.$name.'[imgurl]'.$arr.'" value="'.$row['imgurl'].'" checked="checked"  /><input type="checkbox" name="'.$name.'[thumb]'.$arr.'" value="'.$row['thumb'].'" checked="checked"/></div></div>';	
		
	}
	
	$str .= '
			<table rules="none" border="0" cellpadding="0" cellspacing="0" class="upload_table">
			<tr>
				<td align="left">
				<div>
				<a href="javascript:;" class="btn btn-info btn-sm" onclick="javascript:g_upload_image(\''.U('Attachment/img_upload'). '\',\''. $name .'\','. $multi.');"><i class="fa fa-upload"></i> '.$uptext.'</a>
				<label style="margin:0px;display:inline-block;"><small>&nbsp;&nbsp;单个文件最大上传限制20M'. ($multi?' (可多选)':'') .'</small></label>
				</div>
				</td>
			</tr>
			<tr>
				<td>
				<div id="'.$name.'_show" class="imgs_show">'.$show.'
				</div>
				</td>
			</tr>
		</table>';
	
	return $str;
}


function upload_file($name='pretium', $default = '', $text='上传文件', $multi = 1, $exts = 1,$chicun = '',$tag = 0,$msg = '') {
    $str = '';    
	if (!defined('INIT_UPLOAD_IMAGE')) {
		  $str .= '<script type="text/javascript" src="' .__ROOT__. '/admin/assets/comm/upfile.js"></script>';
		  //$str .= '<link rel="stylesheet" href="'. __ASSETS__. 'css/upload_img.css" />';
		  define('INIT_UPLOAD_IMAGE', 1);
	}
	
	if($tag){
		$tags = array('1'=>'标签','2'=>'描述');	
	}else{
		$tags = array('1'=>'背景色(RGB色)','2'=>'链接');	
	}
	
	$show = '';
	$values = array();
	if (!empty($default)) {
		if (preg_match('/^(\d+,?)+$/', $default)) {
		    $db = M('attachment');
		    $rs = $db->where("id in (".$default.")")->select();
			$i = 0;
			foreach($rs as $line) {
			    $values[$i]['id']              = $line['id'];
				$values[$i]['filepath']        = $line['filepath'];
				$values[$i]['fileext']         = $line['fileext'];
				$values[$i]['title']           = $line['title'];
				$values[$i]['tag']             = $line['tag'];
				$values[$i]['description']     = $line['description'];
				$i++;
			}
		} else {
			$i = 0;
			foreach(explode(",", $default) as $img) {
				if (empty($img)) continue;
		        $values[$i]['id'] = '';
				if (strpos($img, 'http://') === false) {
				    $values[$i]['thumb'] = dirname($img). "/thumb_80_60_" . basename($img);
				} else {
					$values[$i]['thumb'] = $img;
				}
				$values[$i]['imgurl'] = $img;
				$i++;
			}
		}
	}
	
	//$close = $multi ? '<div class="closeimg"><a href="javascript:;" onclick="javascript:g_remove_img(this);" class="iclose"></a></div>' : '';
	$arr = '[]';
	foreach($values as $row) {
		
		if($row['fileext'] == 'jpg' || $row['fileext'] == 'gif' || $row['fileext'] == 'png' || $row['fileext'] == 'jpeg' ){
			$file = '<img src="'.$row['filepath'].'" data="'.$row['filepath'].'"  class="uploadimg">';
		}else{
			$file = '<div class="file_ext">'.$row['fileext'].'</div>';	
		}
				
		
		if($multi==1){
			$show .= '<div class="userlist">';
			$show .= $file;
			$show .= '<input type="hidden" name="'.$name.'[id]'.$arr.'" value="'.$row['id'].'"/>';
			$show .= '<input type="hidden" name="'.$name.'[filepath]'.$arr.'" value="'.$row['filepath'].'"  />';
			$show .= '<input type="hidden" name="'.$name.'[fileext]'.$arr.'" value="'.$row['fileext'].'"/>';
			$show .= '<div class="form-group col-md-9"><input type="text" class="form-control" name="'.$name.'[title]'.$arr.'" value="'.$row['title'].'" placeholder="标题"></div>';
			$show .= '<div class="form-group col-md-3"><input type="text" class="form-control" name="'.$name.'[tag]'.$arr.'" value="'.$row['tag'].'" placeholder="'.$tags[1].'"></div>';
			$show .= '<div class="form-group col-md-12"><input type="text" class="form-control" name="'.$name.'[desc]'.$arr.'" value="'.$row['description'].'" placeholder="'.$tags[2].'"></div>';
			$show .= '<a href="javascript:;" class="btn btn-danger btn-flat" onclick="javascript:g_remove_img(this);">删除</a>';
			$show .= '</div>';
		}else{
			
			$show .= '<div class="userlist">';
			$show .= $file;
			$show .= '<input type="hidden" name="'.$name.'[id]'.$arr.'" value="'.$row['id'].'"/>';
			$show .= '<input type="hidden" name="'.$name.'[filepath]'.$arr.'" value="'.$row['filepath'].'"  />';
			$show .= '<input type="hidden" name="'.$name.'[fileext]'.$arr.'" value="'.$row['fileext'].'"/>';
			$show .= '<a href="javascript:;" class="btn btn-danger btn-flat" onclick="javascript:g_remove_img(this);">删除</a>';
			$show .= '</div>';	
		}
		
	}
	if($chicun){
		$chicun = ' &nbsp;建议上传尺寸（'.$chicun.'）<span class="red">'.$msg.'</span>';	
	}
	$str .= '<div id="pretium"><a href="javascript:;" class="btn btn-info btn-sm" onclick="javascript:g_upload_image(\''.U('Attachment/img_upload',array('exts'=>$exts)). '\',\''. $name .'\','. $multi.','.$tag.');">'.$text.'</a> '.$chicun.'<label style="margin:0px;display:inline-block;"></label><div class="picslist" id="'.$name.'">'.$show.'</div></div>';
	
	return $str;
}



function format_bytes($size) { 
	$units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
	for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024; 
	return round($size).$units[$i]; 
} 

function upload_m($obj,$cont,$attr='',$btn='上传',$showbox="flist",$formname="attr",$filename="文件名称"){
	
	$html = '';
	$html .= '<a href="javascript:;" id="'.$obj.'" class="btn btn-success btn-sm" style="margin:15px 0 0 15px;"><i class="fa fa-upload"></i> '.$btn.'</a>';
    
	$html .= '<div  id="flist" >';
	
	if($attr){
		
		//查找
		$where = array();
		$where['id']  = array('in',$attr);
		$attrlist = M('attachment')->where($where)->select();
			
		foreach($attrlist as $k=>$v){
			$size = format_bytes($v['filesize']);
			$ext  = strtoupper($v['fileext']);
			$html .= '<div class="form-group col-md-3" id="aid_'.$v['id'].'" >';
			$html .= '<input type="hidden" name="'.$formname.'[id][]" value="'.$v['id'].'" />';
			$html .= '<input type="hidden" name="'.$formname.'[filepath][]" value="'.$v['filepath'].'" />';
			$html .= '<div class="uploadlist">';
			if($ext=='JPG' || $ext=='PNG' || $ext=='GIF'){
				$bg = 'style="background-image:url('.thumb($v['filepath']).')"';  
				$html .= '<a href="'.$v['filepath'].'" target="_blank"><div class="ext"></div></a>';
			}else{
				$bg = 'style="background-color:#00a65a"';  
				$html .= '<a href="'.$v['filepath'].'" target="_blank"><div class="ext">'.$ext.'</div></a>';
			}	
			$html .= '<a href="'.$v['filepath'].'" target="_blank"><div class="upimg" '.$bg.'></div></a>';
			$html .= '<input type="text" name="'.$formname.'[filename][]" value="'.$v['filename'].'" placeholder="'.$filename.'" class="form-control" />';
			$html .= '<div class="size">'.$size.'</div>';
			$html .= '<div class="jindu"><div class="progress sm"><div class="progress-bar progress-bar-aqua" rel="o_1bjn0q9lj1qjg1mmj1d43mf5qrp8" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div></div>';
			$html .= '<span class="dels" onclick="removeThisFile(\'aid_'.$v['id'].'\');">X</span>';
			$html .= '</div>';
			$html .= '</div>';
		}
	}						
	
	$html .= '</div>';
	$html .= '<div id="'.$cont.'" style="display:none;"></div>';
	$html .= '<script>';
	$html .= '$(document).ready(function() {';
	$html .= 'upload_multi_file(\''.$obj.'\',\''.$cont.'\',\''.$showbox.'\',\''.$formname.'\',\''.$filename.'\');';
	$html .= '});';
	$html .= '</script>';
	
	return $html;
}


function get_upload_m($attr=''){
	
	$html = '';
	$html .= '<div  id="flist" >';
	
	if($attr){
		
		//查找
		$where = array();
		$where['id']  = array('in',$attr);
		$attrlist = M('attachment')->where($where)->select();
			
		foreach($attrlist as $k=>$v){
			$size = format_bytes($v['filesize']);
			$ext  = strtoupper($v['fileext']);
			$html .= '<div class="form-group col-md-3" id="aid_'.$v['id'].'" >';
			$html .= '<div class="downloadlist">';
			if($ext=='JPG' || $ext=='PNG' || $ext=='GIF'){
				$bg = 'style="background-image:url('.thumb($v['filepath']).')"';  
				$html .= '<a href="'.$v['filepath'].'" target="_blank"><div class="ext"></div></a>';
			}else{
				$bg = 'style="background-color:#00a65a"';  
				$html .= '<a href="'.$v['filepath'].'" target="_blank"><div class="ext">'.$ext.'</div></a>';
			}	
			$html .= '<a href="'.$v['filepath'].'" target="_blank"><div class="upimg" '.$bg.'></div></a>';
			$html .= '<div class="filename">'.$v['filename'].'</div>';
			//$html .= '<div class="size">'.$size.'</div>';
			$html .= '<div class="uptime">'.date('m-d H:i',$v['uploadtime']).'&nbsp;&nbsp;/&nbsp;&nbsp;'.$size.'</div>';
			$html .= '<a href="'.$v['filepath'].'" target="_blank" class="download">下载</a>';
			//$html .= '<div class="jindu"><div class="progress sm"><div class="progress-bar progress-bar-aqua" rel="o_1bjn0q9lj1qjg1mmj1d43mf5qrp8" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div></div>';
			//$html .= '<span class="dels" onclick="removeThisFile(\'aid_'.$v['id'].'\');">X</span>';
			$html .= '</div>';
			$html .= '</div>';
		}
	}						
	
	$html .= '</div>';
	
	
	return $html;
}

/**
 * 生成缩略图函数
 * @param  $img 图片路径
 * @param  $width  缩略图宽度
 * @param  $height 缩略图高度
 * @param  $autocut 是否自动裁剪 默认不裁剪，当高度或宽度有一个数值为0是，自动关闭
 * @param  $smallpic 无图片是默认图片路径
*/ 
function thumb($img, $width = 80, $height = 60 ,$autocut = 1, $nopic = 'images/nopic.jpg') {

	if(empty($img)) return __ASSETS__ . DS . $nopic;   //判断原图路径是否输入

	if(!extension_loaded('gd') || strpos($img, '://')) return $img;
    
	$root_path =  __ROOT__ . DS ;
	if (strpos($img, $root_path) === 0) {
	    $img_replace = substr_replace($img, '', 0, strlen($root_path));
	} else {
	    $img_replace = $img;
	}
	
	if(!file_exists($img_replace)) return  __ASSETS__ . DS . $nopic; //判断原图是否存在

	$newimg = dirname($img_replace).'/thumb_'.$width.'_'.$height.'_'.basename($img_replace);   //缩略图路径

	if(file_exists($newimg)) return $newimg;  //如果缩略图存在则直接输入
	
	$image = new \Think\Image(); 
	$image->open($img_replace);
    
	if ($autocut) {
        $image->thumb($width, $height,\Think\Image::IMAGE_THUMB_CENTER)->save($newimg);
	} else {
        $image->thumb($width, $height)->save($newimg);
	}
    
	return $newimg;
}


/**
 * @brief 导出Excel
 * @param array $data
 * @param array $title
 * @param string $filename
 */
function exportexcel($data=array(),$title=array(),$filename='export'){
    ini_set('max_execution_time', 500);

    $cols = array();
	 for($i='A'; $i!='YZ'; $i++) {
		 $cols[] = $i;
	 }
     
     ulib('PHPExcel');

    $cacheMethod = \PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;
    $cacheSettings = array();
    \PHPExcel_Settings::setCacheStorageMethod($cacheMethod,$cacheSettings);

    $objPHPExcel = new \PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet = $objPHPExcel->getActiveSheet();
    $sheet->getDefaultColumnDimension()->setWidth(20);
    

    $n = 1;
    if (!empty($title)) {
        $j = 0;
        foreach($title as $v) {
            $sheet->setCellValue($cols[$j] . '1', $v);
            $j++;
        }
        $n = 2;
    }

    foreach($data as $k => $v) {
        if (is_array($v)) {
            for($i = 0; $i < count($v); $i++) {
                $sheet->setCellValueExplicit($cols[$i].$n, current($v), \PHPExcel_Cell_DataType::TYPE_STRING);
                //$sheet->setCellValue($cols[$i].$n, current($v));
                each($v);
            }
        } else {
            $sheet->setCellValueExplicit($cols[0].$n, $v, \PHPExcel_Cell_DataType::TYPE_STRING);
            //$sheet->setCellValue($cols[0].$n, $v);
        }
        $n++;
    }

    ob_end_clean();
    header("Content-type:application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=".$filename.".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
     
}



/**
 * @brief 导入Excel
 * @param array $file
 */
function importexcel($filePath){
	
	ulib('PHPExcel');
	
	$PHPExcel = new \PHPExcel(); 
	
	/**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/ 
	$PHPReader = new \PHPExcel_Reader_Excel2007(); 
	if(!$PHPReader->canRead($filePath)){ 
		$PHPReader = new \PHPExcel_Reader_Excel5(); 
		if(!$PHPReader->canRead($filePath)){ 
			echo 'no Excel'; 
			return ; 
		} 
	} 
	
	$PHPExcel = $PHPReader->load($filePath); 
	/**读取excel文件中的第一个工作表*/ 
	$currentSheet = $PHPExcel->getSheet(0); 
	/**取得最大的列号*/ 
	$allColumn = $currentSheet->getHighestColumn(); 
	/**取得一共有多少行*/ 
	$allRow = $currentSheet->getHighestRow(); 
	/**从第二行开始输出，因为excel表中第一行为列名*/ 
	
	$data = array();
	for($currentRow = 1;$currentRow <= $allRow;$currentRow++){ 
		/**从第A列开始输出*/ 
		$cont = array();
		for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){ 
			$val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/ 
			$cont[] = $val;
			/**如果输出汉字有乱码，则需将输出内容用iconv函数进行编码转换，如下将gb2312编码转为utf-8编码输出*/ 
			//$cont[] = iconv('utf-8','gb2312', $val);
		} 
		$data[] = $cont;
	} 
	
	return $data;
     
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
    return $mail->Send() ? true : $mail->ErrorInfo;
}


/*邮件模板*/
function mailmode($mail,$url){
	return '<p>您收到这封邮件，是因为'.$mail.'（Email：'.$mail.'）在我们网站为您的Email开通了子账户权限。</p><p>您可以通过我们的网站实时查看到被授权应用的统计数据。</p><p>如果您并不需要访问我们的网站，请忽略这封邮件。您不需要退订或进行其他进一步的操作。</p><p>----------------------------------------------------------------------</p><p>帐号激活说明</p><p>----------------------------------------------------------------------</p><p>您是我们网站的新用户，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。</p><p>您只需点击下面的链接，并补全相关的注册信息，即可激活您的帐号：</p><p><a target="_blank" href="'.$url.'" _act="check_domail">'.$url.'</a></p><p>(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)</p><p>感谢您的访问，祝您使用愉快！</p><p>此致</p><p>友盟管理团队</p><p>-----------------------------</p><p>友盟（<a target="_blank" href="http://www.umeng.com" _act="check_domail">www.umeng.com</a>）<br>最专业的移动平台分析工具</p>';
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
	$level = 'M';                     // 纠错级别：L、M、Q、H
	$size = $size;                    // 点的大小：1到10,用于手机端4就可以了
	$name = $name ? $name : time();
	$path = "upload/code/";           //生成的二维码保存于服务器路径
	$fileName = $path.$name.'.png';   // 生成的文件名
	$QRcode->png($data,$fileName,$level,$size);
	
	return $fileName;
}



//验证checked表单
function checked($info,$val){
	if(strstr($info,$val)){
    	return ' checked="checked" ';
	}else{
    	return '';
	}

}


//显示状态值
function echostatus($status){
	if($status==1){
		return '<span class="red">停用</span>';	
	}else{
		return '<span class="green">正常</span>';	
	}
}



/*API返回值*/
function return_error($error){
	$arr = explode("=",$error);
	$status = array();
	$status['status'] = $arr[0];
	$status['msg']    = $arr[1];
	return json_encode($status);
}
function return_success($success = '成功'){
	$status = array();
	$status['status'] = 0;
	$status['msg']    = $success;
	return json_encode($status);
}


function crop($imgpath, $w, $h, $x = 0, $y = 0, $rotate = 0){

        $width  = $w;
        $height = $h;
      
        $ext = strtolower(pathinfo($imgpath, PATHINFO_EXTENSION));
		if ($ext == 'jpg') $ext = 'jpeg';
        $fun = "imagecreatefrom{$ext}";
        $pathname = dirname($imgpath) . '/' . 'crop_' . basename($imgpath);
        if (file_exists($pathname)) {
            unlink($pathname);
        }
       
        $srcimg = $fun($imgpath);
        if ($rotate != 0) {
            $img = imagerotate($srcimg, -$rotate, imagecolorallocatealpha($srcimg, 0, 0, 0, 127));
        } else {
            $img = $srcimg;
        }
		
		
        //创建新图像
        $newimg = imagecreatetruecolor($width, $height);
        // 调整默认颜色
        //$color = imagecolorallocate($newimg, 255, 255, 255);
        //imagefill($newimg, 0, 0, $color);
        //裁剪
        imagecopyresampled($newimg, $img, 0, 0, $x, $y, $width, $height, $w, $h);
        imagedestroy($srcimg); //销毁原图

        if ('jpeg' == $ext || 'jpg' == $ext) {
            //JPEG图像设置隔行扫描
            imageinterlace($newimg, true);
            imagejpeg($newimg, $pathname, 80);
        }  elseif ('png' == $ext) {
            //设定保存完整的 alpha 通道信息
            imagesavealpha($newimg, true);
            //ImagePNG生成图像的质量范围从0到9的
            imagepng($newimg, $pathname, 8);
        } else {
            $savefun = 'image' . $ext;
            $savefun($newimg, $pathname);
        }
        
        return $pathname;

}


//申请审核
function apply($mod,$res){
	
	$data = array();
	$data['mod']         = $mod;
	$data['res_id']      = $res;
	$data['app_result']  = 0;
	$data['app_user']    = cookie('userid') ? cookie('userid') : 0;
	$data['app_time']    = time();
	
	//判断是否存在未审核记录
	$where = array();
	$where['mod']        = $mod;
	$where['res_id']     = $res;
	$where['app_result'] = 0;
	$app = M('apply')->where($where)->find();
	if($app){
		$add = M('apply')->where(array('id'=>$app['id']))->data($data)->save();
	}else{
		//新建申请记录并发送消息
		$add = M('apply')->add($data);
		if($mod==2){
			cour_send_msg($res);
		}
	}
	
	if($add){
		return true;	
	}else{
		return false;		
	}
}


//课程审核申请
function cour_apply($res){
	
	//判断用户是否免审
	$user   = M('admin')->find(cookie('userid'));
	$status = 0;
	
	if($user['cour_apply']==0){
		//增加申请记录
		apply(2,$res);
		
	}else{
		$status = 1;	
	}
	
	M('cour')->data(array('status'=>$status))->where(array('cour_id'=>$res))->save();
	
}




//发送课程审核消息
function cour_send_msg($res){
	
	$info    = M('cour')->find($res);
	$uname   = GetUserName($info['user_id']);
	
	$title   =  $uname.'提交了课件，请您审核！';//'[课件审核] '.$info['subject'];                      //标题
	$content = '课件编号：'.$info['cour_id'].'<br>课件标题：'.$info['subject'];                      //消息内容
	$url     = U('Cour/info',array('id'=>$info['cour_id']));      //详情URL
	$auth 	 = M('apply_config')->where(array('id'=>2))->find();  //查看课件审核权限 
	
	//发送申请消息
	$send = send_msg(0,$title,$content,$url,$auth['user'],$auth['role']);
	if($send){
		return $send;	
	}else{
		return 0;		
	}
	
}


//发送用户审核消息
function reg_send_msg($res){
	
	$info = M('admin')->find($res);
	
	$title   = '有新的用户注册，请您审核！';//'[用户审核] '.$info['name'];                      //标题
	$content = '用户编号：'.$info['id'];                      //消息内容
	$url     = U('User/edit',array('id'=>$res));      //详情URL
	
	$auth 	 = M('apply_config')->where(array('id'=>1))->find();  //查看课件审核权限 
	
	//发送申请消息
	$send = send_msg(0,$title,$content,$url,$auth['user'],$auth['role']);
	if($send){
		return $send;	
	}else{
		return 0;		
	}
	
}



//发送消息
function send_msg($send,$title,$content,$url='',$user,$role=''){
	$data = array();
	$data['send_user']		 = $send;
	$data['send_time']	 	 = time();
	$data['title']		 	 = $title;
	$data['content']		     = $content;
	$data['msg_url']	 	     = $url;
	$data['receive_user']	 = $user;
	$data['receive_role']	 = $role;
	$add = M('message')->add($data);
	if($add){
		return $add;	
	}else{
		return 0;		
	}
}


//阅读消息
function read_msg($msg_id){
	$data = array();
	$data['user_id']		 = cookie('userid');
	$data['msg_id']		 	 = $msg_id;
	
	$isread = M('message_read')->where($data)->find();
	if(!$isread){
		$data['read_time']	 	 = time();
		$add = M('message_read')->add($data);
		if($add){
			return $add;	
		}else{
			return 0;		
		}
	}else{
		return 0;		
	}
}


//阅读消息
function del_msg($msg_id){
	$data = array();
	$data['user_id']		 = cookie('userid');
	$data['msg_id']		 	 = $msg_id;
	
	$isread = M('message_read')->where($data)->find();
	if(!$isread){
		$data['read_time']	 = time();
		$data['del']	 	 = 1;
		M('message_read')->add($data);
		
	}else{
		M('message_read')->where(array('id'=>$isread['id']))->data(array('del'=>1))->save();
	}
}


//未读消息数量
function no_read(){
	$read     = M('message_read')->where(array('user_id'=>cookie('userid')))->Getfield('msg_id',true);
	$readstr  = implode(',',$read);
			
	$where = '(receive_user like "%['.cookie('userid').']%"  OR  receive_role like "%['.cookie('roleid').']%") ';
	if($readstr) $where .= ' AND id NOT IN ('.$readstr.')';
			
	$count = M('message')->where($where)->count();	
	return $count;
}


//未审核记录
function no_apply(){
	
	$where = '(c.user like "%['.cookie('userid').']%"  OR  c.role like "%['.cookie('roleid').']%") AND a.app_result = 0';
	$count = M()->table('__APPLY__ as a')->field('a.*,c.role,c.user')->where($where)->join('__APPLY_CONFIG__ as c on c.id = a.mod','LEFT')->count();

	return $count;
}

function apply_info($mod,$id){
	$return = array();
	if($mod==1){
		$return['url'] = U('User/edit',array('id'=>$id));
		$info = M('admin')->find($id);	
		$return['title'] = $info['name'];
		$return['type']  = '注册审核';
	}else if($mod==2){
		$return['url'] = U('Cour/info',array('id'=>$id));	
		$info = M('cour')->find($id);	
		$return['title'] = $info['subject'];
		$return['type']  = '课件审核';
	}	
	return $return;	
}


//查看用户头像
function GetHead($user=''){
	if($user){
		$uid = $user;	
	}else{
		$uid = cookie('userid');
	}
	$userinfo = M('admin')->find($uid);
	
	//判断文件是否存在
	if($userinfo['avatar']){  
		return C('CDN_URL').$userinfo['avatar']; 
	}else{ 
		return C('CDN_URL').'admin/assets/img/avatar.png';
	}
	
	
}

function GetUserName($user=''){
	if($user){
		$uid = $user;	
	}else{
		$uid = cookie('userid');
	}
	$userinfo = M('admin')->find($uid);
	
	return $userinfo['name'];
}

function GetUserNameToId($user){
	
	$where = array();
	$where['name'] = trim($user);
	$userinfo = M('admin')->where($where)->find($uid);
	
	$data = array();
	$data['name']    = $userinfo['name'];
	$data['userid']  = $userinfo['id'];
	return $data;
}

function GetSiteNameToId($site){
	
	$where = array();
	$where['site_name'] = trim($site);
	$site = M('site')->where($where)->find($uid);
	
	$data = array();
	$data['site_name']    = $site['site_name'];
	$data['site_id']  = $site['site_id'];
	return $data;
}


function amtime($date,$ampm,$min=0){
	$alldate = $date.' '.$ampm;
	$time = strtotime($alldate);
	if($min){
		$etime = $time+($min*60);
		return date('Y-m-d H:i:s',$etime);
	}else{
		return date('Y-m-d H:i:s',$time);
	}
}

function strtopinyin($str){
	$PinYin = new Pinyin();
	$str = iconv("utf-8","gb2312",trim($str));
	$pinyin = strtolower($PinYin->getFirstPY($str));
	return $pinyin;
}

function roleuser($user,$role=''){
	
	$info = M('admin')->find($user);
	$roleid = $role ? $role : $info['roleid'];
	$data = array();
	$data['user_id'] = $user;
	$data['role_id'] = $roleid;
	$isrole = M('role_user')->where(array('user_id'=>$user))->find();
	if(!$isrole){
		M('role_user')->add($data);	
	}else{
		M('role_user')->data($data)->where(array('user_id'=>$user))->save();
	}
}


function save_res($module,$releid,$data){
	//处理图片
	$where = array();
	$where['module']  = $module;
	$where['releid']  = $releid;

	$tp_db = M('attachment');

	if(is_array($data)){
		foreach($data['id'] as $k=>$v){
			//保存数据
			$info = array();
			$info['module']        = $module;
			$info['releid']        = $releid;
			$info['title']         = $data['title'][$k];
			$info['tag']           = $data['tag'][$k];
			$info['description']   = $data['desc'][$k];
			$info['status']        = $data['status'][$k];
			$info['filename']      = $data['filename'][$k];
			$issave = $tp_db->where(array('id'=>$v))->save($info);
		}
		$where['id']     = array('not in',implode(',',$data['id']));
	}

	//查询要删除的图片
	$isdel = $tp_db->where($where)->select();
	if($isdel){
		foreach($isdel as $k=>$v){
			$tp_db->where(array('id'=>$v['id']))->delete();
		}
	}
}



function get_res($module,$releid){
	//获取默认素材
	$attid = array();
	$attachment = M('attachment')->field('id')->where(array('module'=>$module,'releid'=>$releid))->select();  //
	foreach($attachment as $v){
		$attid[] = 	$v['id'];
	}	
	return implode(',',$attid);
}

function getTree($type=1,$pid=0,$level = 0,$status = 1){
	
	global $str; 
	 
	$db = M('kind');
	$where = array();
	$where['type']   = $type;
	$where['pid']    = $pid;
	//if($status) $where['status'] = 1;
	if($level){
		$where['level'] = array('elt',$level);	
	}
	
	$list = $db->where($where)->order('`sort` DESC')->select();
	if($list){
		foreach($list as $k =>$v){
			$str[] = $list[$k];
			getTree($type,$v['id'],$level);
		}
	}
	return $str;
	
}


function fortext($no,$html='&nbsp;&nbsp;&nbsp;&nbsp;',$bu='├'){
	
	$return = '';
	for($i=1;$i<=$no;$i++){
		$return .= $html;
	}
	$return .=$bu;
	return $return;
}


function getpid($id=0){
	
	global $pic_str; 	
	
	$db = M('kind');
	$data = $db->find($id);
	
	if($data['title'] && $id) $pic_str[$data['level']] = $data['title']; 
	
	if($data['pid']){
		getpid($data['pid']);	
	}
	asort($pic_str);
	
	return implode(' > ',$pic_str);
	
}


function get_kind_id($id){
	global $all; 	
	$db  = M('kind');
	$data = $db->find($id); 
	
	$where = array();
	$where['pid']    = $id;
	
	$list = $db->where($where)->select();
	if($list){
		foreach($list as $k =>$v){
			$all[$v['id']] = $v['title'];
			get_kind_id($v['id']);
		}
	}
	$all[$id] = $data['title'];
	asort($all);
	
	$return = array();
	foreach($all as $k=>$v){
		$return[] = $k;	
	}
	return implode(',',$return);
		
}

function get_kind($kindlist,$on){
	
	$kind = M('kind')->GetField('id,title',true);
	
	$kindlist  = str_replace('[', '', $kindlist);
	$kindlist  = str_replace(']', '', $kindlist);
	
	$klist = explode(',',$kindlist);
	$str = array();
	foreach($klist as $k=>$v){
		if($v==$on){
			$str[] = '<span class="red">'.$kind[$v].'</span>';
		}else{
			$str[] = $kind[$v];
		}
	}
	
	return implode(' , ',$str);
	
}



/**
 * 模拟post进行url请求
 * @param string $url
 * @param string $param
 */
function request_post($url = '', $param = '') {
	if (empty($url) || empty($param)) {
		return false;
	}
	
	//整理参数
	$prm = array();
	foreach($param as $k =>$v){ 
		$prm[] = $k."=".urlencode($v);
	}
	
	$postUrl	= $url;
	$curlPost	= implode('&',$prm);
	$ch			= curl_init();//初始化curl
	curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
	curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
	curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
	$data = curl_exec($ch);//运行curl
	curl_close($ch);
	
	return $data;
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
	 $data['send_user']			= cookie('userid');
	 $data['send_user_name']	= cookie('name');
	 $data['send_type']			= 0;
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



?>


