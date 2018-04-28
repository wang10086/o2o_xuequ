  function g_upload_image(url, input_id, multi) {
	  	art.dialog.open(url, {
		id:'uploadopendiv',
		width:500,
		height:500,
		title:'您可以上传或者选择' + (multi ? "多个" : "1个") + '文件',
        init: function() {
			art.dialog.data("multi", multi);
		},
		ok: function () {
			var origin = artDialog.open.origin;
			//返回图片ID
			var upfile = this.iframe.contentWindow.get_upfile_val();
			var thumb_html = "";
            var cls = multi ? '<div class="closeimg"><a href="javascript:;" onclick="javascript:g_remove_img(this);" class="iclose"></a></div>' : '';
			var arr = multi ? '[]' : '';
			for (var i = 0; i < upfile.length; i++) {
				if (upfile[i].thumb) { 
					thumb_html += '<div class="oneimg">' + cls + '<div class="imgdiv"><div class="outline"><img src="'+ upfile[i].thumb +'"  height="60"  alt="点击查看大图" onclick="g_open_big(\''+ upfile[i].imgurl +'\');" /></div></div><div style="display:none;"><input type="checkbox" name="'+input_id+'[id]'+arr+'" value="'+ upfile[i].id +'" checked="checked" /><input type="checkbox" name="'+input_id+'[imgurl]'+arr+'" value="'+ upfile[i].imgurl +'" checked="checked" /><input type="checkbox" name="'+input_id+'[thumb]'+arr+'" value="'+ upfile[i].thumb +'" checked="checked"  /></div></div>';
					if (!multi) break;
				};
			}
			if (multi) {
				$('#' + input_id + '_show').append(thumb_html);
			} else {
				$('#' + input_id + '_show').html(thumb_html);
			}
			
			art.dialog.removeData("multi");
		},
		cancel: function () {
			art.dialog.get('uploadopendiv').close();
			art.dialog.removeData("multi");
		},
		close: function () {
			art.dialog.removeData("multi");
		},
		//lock:true //false
	});
	  
  }
  
  
  function g_upload_image2(input_id, lmt, obj, catid) {
      var url = 'index.php?m=Home&c=Attachment&a=img_upload&catid='+catid;
	  	art.dialog.open(url, {
		width:500,
		height:500,
		title:'您可以上传或者选多个文件',
        init: function() {
			art.dialog.data("multi", 1);
		},
		ok: function () {
			var origin = artDialog.open.origin;
			//返回图片ID
            
			var upfile = this.iframe.contentWindow.get_upfile_val();
			var thumb_html = "";
            var cls = '<div class="closeimg2"><a href="javascript:;" onclick="javascript:g_remove_img2(this);" class="iclose"></a></div>';
			var arr = '[]' ;
            
            var cld = $(obj).parent().parent().find('.yulan li').length;
                
			for (var i = 0; i < upfile.length; i++) {
				if (upfile[i].thumb) { 
                    cld ++;
                    if (lmt > 0 && cld > lmt) {
                        alert('请注意：已超过最大张数限制，多选的文件不会被保存。'); 
                        break;  
                    }
					thumb_html += '<li><img  style="cursor:pointer;" src="'+ upfile[i].thumb +'"  height="60"  alt="点击查看大图" onclick="g_open_big(\''+ upfile[i].imgurl +'\');" /><div style="display:none;"><input type="checkbox" name="'+input_id+'[id]'+arr+'" value="'+ upfile[i].id +'" checked="checked" /><input type="checkbox" name="'+input_id+'[imgurl]'+arr+'" value="'+ upfile[i].imgurl +'" checked="checked" /><input type="checkbox" name="'+input_id+'[thumb]'+arr+'" value="'+ upfile[i].thumb +'" checked="checked"  /></div>'+ cls + '</li>';
                    
                    
				};
			}

	        $(obj).parent().parent().find('.yulan ul').append(thumb_html);

			art.dialog.removeData("multi");
		},
		cancel: function () {
			art.dialog.close();
			art.dialog.removeData("multi");
		},
		close: function () {
			art.dialog.removeData("multi");
		},
		lock:true //false
	});
	  
  }
  
  
    function g_open_big(url) {  
        var imgWidth, imgHeight , w , h;
        // 这里创建一个图像保存到内存，并没有添加到 HTML 中，只是个参考
        $("<img/>").attr("src", url).load(function() {
            w = this.width;
            h = this.height;
            if(w>=800){
                imgWidth = 800;
                imgHeight = (800/w)*h;	
                
                if (imgHeight > 600) {
                    imgWidth = imgWidth * (600/imgHeight);
                    imgHeight = 600;
                }
                openimg(imgWidth,imgHeight,url)
            }else if(h>=600){
                imgHeight = 600;
                imgWidth = (600/h)*w;	
                openimg(imgWidth,imgHeight,url)	
            }else{
                openimg(w,h,url)	
            }
        });  
    }
  
  
  
  
  
  
  function g_remove_img2(a){
	  $(a).parent().parent().empty().remove();
  }
    
  function g_remove_img(a){
	  $(a).parent().parent().empty().remove();
  }