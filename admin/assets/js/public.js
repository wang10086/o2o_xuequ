$(document).ready(function(e) {
    $('.datamore').css('width',($('#tablelist').width()+2)+'px');
	
	$('#tablelist').find('tbody tr').each(function(index, element) {
       	$(this).hover(function(){
			$(this).css('background-color','#fafafa');	
			$(this).find('.datamore').show();
			$(this).css('cursor','pointer');
			$(this).find('.datamore').hover(function(){$(this).hide();})
		},function(){
			$(this).removeAttr('style');
			$(this).find('.datamore').hide();
			
		}) 
    });
	
	//全局日期时间插件
	$('.inputdate').datepicker();
	$('.inputdatetime').datetimepicker();
	
});

function ConfirmDel(url) {
	/*
	if (confirm("真的要删除吗？")){
		window.location.href=url;
	}else{
		return false;
	}
	*/
	
	art.dialog({
		title: '提示',
		width:400,
		height:100,
		lock:true,
		fixed: true,
		content: '<span style="width:100%; text-align:center; font-size:18px;float:left; clear:both;">真的要删除吗？</span>',
		ok: function () {
			window.location.href=url;
			//this.title('3秒后自动关闭').time(3);
			return false;
		},
		cancelVal: '取消',
		cancel: true //为true等价于function(){}
	});

}

function ConfirmUrl(url,msg) {
	
	art.dialog({
		title: '提示',
		width:400,
		height:100,
		fixed: true,
		lock:true,
		content: '<span style="width:100%; text-align:center; font-size:18px;float:left; clear:both;">'+msg+'</span>',
		ok: function () {
			window.location.href=url;
			//this.title('3秒后自动关闭').time(3);
			return false;
		},
		cancelVal: '取消',
		cancel: true //为true等价于function(){}
	});

	/*
	if (confirm(msg)){
		window.location.href=url;
	}else{
		return false;
	}
	*/
}



function opensearch(obj,w,h){
	//var elem = document.getElementById(obj);
	art.dialog({
		content:$('#'+obj).html(),
		lock:true,
		title: '搜索',
		width:w,
		height:h,
		okValue: '搜索',
		ok: function () {
			$('.aui_content').find('input').filter(function(index) {
                return $(this).val() == '';
            }).remove();
			$('.aui_content').find('form').submit();	
		},
		cancelValue:'取消',
		cancel: function () {
		}
	}).show();	
}


function init_order()
{
	var type = $.cookie(order_page + '_otype');
	var field = $.cookie(order_page + '_ofield');
	if (typeof field == undefined || field == '' || field == undefined) {  
	
	}else{
		$('.orders .sorting[data=' + field.replace('.','\\\.') + ']').addClass(type);
	}
	
	
	$('.orders .sorting').each(function(index,el) {
		$(this).click(function(e){
			var field = $(this).attr('data');
			var type  = $.cookie(order_page + '_otype');
			if (typeof type == undefined || type == '' || type == 'asc') {
				type = 'desc';
			} else {
				type = 'asc';
			}
			
			$.cookie(order_page + '_otype', type);
			$.cookie(order_page + '_ofield', field);
			location.reload();
		});
	});
	
	
}


function art_show_msg(msg) {
	art.dialog({
		title: '提示',
		width:400,
		height:100,
		fixed: true,
		time: 2,
		lock:true,
		content: '<span style="width:100%; text-align:center; font-size:18px;float:left; clear:both;">'+msg+'</span>',
		
	});
}


function openimg(url){
		art.dialog({
			padding: 0,
			title: '预览大图',
			content: '<img src="'+url+'"  height="400" />',
			lock: true
		});	
  }

function shangchuan(id,input,url,size,ext,title,cont){
	var uploader = new plupload.Uploader({
		runtimes : 'html5,flash,silverlight,html4',
		browse_button : id,
		container: document.getElementById(cont), // ... or DOM Element itself
		url : url,
		//flash_swf_url :       '__HTML__/comm/plupload-2.2.0/js/Moxie.swf',
		//silverlight_xap_url : '__HTML__/comm/plupload-2.2.0/js/Moxie.xap',
		file_data_name: 'file',
		multi_selection: false,
		filters : {
			max_file_size : size+'mb',
			/*
			mime_types: [
				{title : "upload files", extensions :"'"+ext+"'"}
			]
			*/
		},

		init: {
			PostInit: function() {
				$('#'+id).html(title);
				$('#'+id).removeClass('has-error');
			},

			FilesAdded: function(up, files) {
				plupload.each(files, function(file) {
					$('#'+id).html(file.name + '   ( ' + plupload.formatSize(file.size) + ' ) ');
				});
				
				uploader.start();
			},

			UploadProgress: function(up, file) {
				/*
				if(file.percent<100){
					$('#'+id).html('上传中，已完成：' + file.percent + '%');
				}else{
					*/
				$('#'+id).html('上传中，请稍侯...');
				//}
			},

			FileUploaded: function (up, file, rs) {
				dd = eval('(' + rs.response + ')');
				if (dd.result == 0) {
					$('#'+input).val(dd.url);
					//$('#'+id).html(file.name + '上传成功');
					$('#'+id).html('上传成功');
					
				} else {
					alert('上传失败，请重试：  # ' + dd.url + '');
					$('#'+id).addClass('has-error');
				}
				
			},
			
			Error: function(up, err) {
				alert('上传失败，请重试：  #'+ err.message +'');
				$('#'+id).addClass('has-error');
			}
		}
	});

	uploader.init();
}


function upload_multi_file(id,cont,showbox,formname,filename){
	
	
	var uploader = new plupload.Uploader({
		runtimes : 'html5,flash,silverlight,html4',
		browse_button : id, //'pickupfile', // you can pass in id...
		container: document.getElementById(cont), // ... or DOM Element itself
		url : "op.php?m=Main&c=Attachment&a=upload_file", //"{:U('Attachment/upload_file')}",
		//flash_swf_url : '__HTML__/comm/plupload/Moxie.swf',
		//silverlight_xap_url : '__HTML__/comm/plupload/Moxie.xap',
		multiple_queues:false,
		multipart_params: {
			 catid: 1
		},
		
		filters : {
			max_file_size : '100mb',
			/*
			mime_types: [
				{title : "Files", extensions : "jpg,jpeg,png,zip,rar,7z,doc,docx,ppt,pptx,xls,xlsx,txt,pdf,pdfx"}
			]
			*/
		},

		init: {
			PostInit: function() {
				//$('div.moxie-shim').width(104).height(67);
			},

			FilesAdded: function(up, files) {
				plupload.each(files, function(file) {
					var time = new Date();
					var month = time.getMonth() +1;
					if (month < 10) month = "0" + month;
					
					var t = time.getFullYear()+ "/"+ month + "/" + time.getDate()+ " "+time.getHours()+ ":"+ time.getMinutes() + ":" +time.getSeconds();
					$('#'+showbox).append(
							'<div class="form-group col-md-3" id="' + file.id + '" >'
                            + '<div class="uploadlist">'
                            + '<a class="openfile" target="_blank"><div class="upimg"></div></a>'
                            + '<input type="text" name="'+formname+'[filename][]" placeholder="'+filename+'" value="" class="form-control" />'
                            + '<a class="openfile" target="_blank"><div class="ext"></div></a>'
							+ '<div class="size">' + plupload.formatSize(file.size) +'</div>'
                            + '<div class="jindu"><div class="progress sm"><div class="progress-bar progress-bar-aqua" rel="'+ file.id +'"  role="progressbar"  aria-valuemin="0" aria-valuemax="100"></div></div></div>'
                            + '<span class="dels" onclick="removeThisFile(\''+ file.id +'\');">X</span>'
                            + '</div>'
                            + '</div>'
						);

				});

				uploader.start();
				
			},

			FileUploaded: function(up, file, res) {
				var rs = eval('(' + res.response +')');
				if (rs.rs ==  'ok') {
					if(rs.ext=='JPG' || rs.ext=='PNG' || rs.ext=='GIF'){
						$('#'+file.id).find('.upimg').attr('style','background-image:url('+rs.thumb+')');
					}else{
						$('#'+file.id).find('.upimg').attr('style','background-color:#00a65a;'); 
						$('#'+file.id).find('.ext').text(rs.ext);
					}
					$('#'+file.id).find('.openfile').attr('href',rs.fileurl);
					$('#'+file.id).append('<input type="hidden" name="'+formname+'[id][]" value="' + rs.aid + '" /><input type="hidden" name="'+formname+'[filepath][]" value="' + rs.fileurl + '" />');
				} else {
					alert('上传文件失败，请重试');
				}

			},

			UploadProgress: function(up, file) {
				$('div[rel=' + file.id + ']').css('width', file.percent + '%');
			},

			Error: function(up, err) {
				alert(err.code + ": " + err.message);
			}
		}
	});

	uploader.init();	
}

function removeThisFile(fid) {
	if (confirm('确定要删除此附件吗？')) {
		$('#' + fid).empty().remove();
		$('input[rel=' + fid +']').remove();
	}
}



function addfac(){
			
	var i = parseInt($('#fac_val').text())+1;
	
	var html = '<div class="col-md-3 pd" id="fac_'+i+'"><div class="input-group"><span class="input-group-addon" style="background:#ffffff;"><input type="text" name="fac['+i+'][facility_name]"  placeholder="名称" class="left_text"></span><input type="text" placeholder="数量/规格" name="fac['+i+'][facility_spec]" class="form-control"><span class="input-group-addon dels"><a href="javascript:;"  onClick="del_fac(\'fac_'+i+'\')">X</a></span></div></div>';
	
	$('#sitelist').append(html);	
	$('#fac_val').html(i);
}


function addprice(){
			
	var i = parseInt($('#price_val').text())+1;
	
	var html = '<div class="col-md-3 pd" id="fac_'+i+'"><div class="input-group"><span class="input-group-addon" style="background:#ffffff;"><input type="text" name="price['+i+'][date]"  placeholder="日期" class="left_text inputdate"></span><input type="text" placeholder="价格" name="price['+i+'][price]" class="form-control"><span class="input-group-addon dels"><a href="javascript:;"  onClick="del_fac(\'fac_'+i+'\')">X</a></span></div></div>';
	
	$('#pricelist').append(html);	
	$('#price_val').html(i);
	
	$('.inputdate').datepicker();
}


function del_fac(obj){
	$('#'+obj).remove();
}
