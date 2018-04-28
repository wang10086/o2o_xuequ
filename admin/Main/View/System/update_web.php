		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>生成网站页面</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('System/update_web')}" >生成网站页面</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                   

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                         <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">生成网站页面</h3>
                                    <!--
                                    <div class="pull-right box-tools">
                                        <button onClick="uphtml(this,[<?php echo $urls; ?>])"  title="整站更新" class="btn btn-danger btn-sm">生成整站页面</button>
                                    </div>
                                    -->
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                	<div>
                                    <button onClick="uphtml(this,[<?php echo $urls; ?>])"  title="整站更新" class="btn btn-danger btn-sm btnlist">生成整站页面</button>
                                    </div>
                                    <div>
                                    <button onClick="uphtml(this,['index.php?m=Main&c=Static&a=index&html=1'])"  title="生成首页" class="btn btn-info btn-sm btnlist">生成首页</button>
                                    <button onClick="uphtml(this,['index.php?m=Main&c=Static&a=advantage&html=1'])"  title="技术优势" class="btn btn-info btn-sm btnlist">技术优势</button>
                                    <button onClick="uphtml(this,['index.php?m=Main&c=Static&a=news&html=1'])"  title="新闻动态" class="btn btn-info btn-sm btnlist">新闻动态</button>
                                    <button onClick="uphtml(this,['index.php?m=Main&c=Static&a=about_us&html=1'])"  title="关于我们" class="btn btn-info btn-sm btnlist">关于我们</button>
                                    <button onClick="uphtml(this,['index.php?m=Main&c=Static&a=recruit&html=1'])"  title="人才招聘" class="btn btn-info btn-sm btnlist">人才招聘</button>
                                    <button onClick="uphtml(this,['index.php?m=Main&c=Static&a=contact_us&html=1'])"  title="联系我们" class="btn btn-info btn-sm btnlist">联系我们</button>
                                    </div>
                                    <div>
                                    <button onClick="uphtml(this,['index.php?m=Main&c=Static&a=datalist&html=1&type=1','index.php?m=Main&c=Static&a=datalist&html=1&type=2','index.php?m=Main&c=Static&a=datalist&html=1&type=3','index.php?m=Main&c=Static&a=datalist&html=1&type=4'])"  title="列表页" class="btn btn-info btn-sm btnlist">列表页</button>
                                    </div>
                                    <div>
                                    <button onClick="uphtml(this,[<?php echo $meitiurl; ?>])"  title="媒体报道" class="btn btn-info btn-sm btnlist">媒体报道</button>
                                    <button onClick="uphtml(this,[<?php echo $zhuantiurl; ?>])"  title="专题" class="btn btn-info btn-sm btnlist">生成专题</button>
                                    <button onClick="uphtml(this,[<?php echo $tupianurl; ?>])"  title="图片" class="btn btn-info btn-sm btnlist">生成图片</button>
                                    <button onClick="uphtml(this,[<?php echo $shipinurl; ?>])"  title="视频" class="btn btn-info btn-sm btnlist">生成视频</button>
                                    <button onClick="uphtml(this,[<?php echo $zhaopinurl; ?>])"  title="招聘" class="btn btn-info btn-sm btnlist">生成招聘</button>
                                    </div>
                                    <table class="table table-bordered dataTable fontmini" id="tablelist" style="margin-top:1em;">
                                    	<tbody id="updata" style="display:none;">
                                        	<!--
                                        	<tr role="row">
                                            	<th width="40%">页面</th>
                                                <th width="20%">生成数量</th>
                                                <th width="20%">结果</th>
                                                <th width="20%">查看</th>
                                            </tr>
                                            -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

		<script>
		//批量生成页面
		function uphtml(obj,arr){
			$('#updata').html('<tr role="row"><th width="40%">页面</th><th width="20%">生成数量</th><th width="20%">结果</th><th width="20%">查看</th></tr>');
			
			$(obj).attr("disabled","disabled");
			//$(obj).attr("onClick","");
			$(obj).removeClass('btn-danger');
			$(obj).removeClass('btn-info');
			
			$('#updata').show();
			$.each(arr, function(key, val) {
				createpage(val); 
			}); 			
		}
		
		function createpage(url){
			$.ajax({type: "GET",url: url,dataType:'json', data:{html:1},success:function(data){
				if(data.status==0){
					if(data.msg.url){
						var linkurl = '<a href="'+data.msg.url+'" target="_blank">查看</a>';	
					}else{
						var linkurl = '';		
					}
					var html = '<tr><td>'+data.msg.page+'</td><td>'+data.msg.num+'</td><td>'+data.msg.status+'</td><td>'+linkurl+'</td></tr>';
					$('#updata').append(html);
				}
        	}}); 
		}
        </script>
        <include file="Index:footer" />