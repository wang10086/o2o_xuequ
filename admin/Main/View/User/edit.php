		<include file="Index:header" />
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <include file="Index:menu" />

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>修改资料</h1>
                    <ol class="breadcrumb">
                        <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                        <li><a href="{:U('User/index')}">用户管理</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                         <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">修改资料</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                <form method="post" action="{:U('User/edit')}" name="basic_validate" id="basic_validate" enctype="multipart/form-data" novalidate />
                                	<div class="formbox">
                               			<input type="hidden" name="dosubmit" value="1" />
                                        <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                                		<input type="hidden" name="id" value="{$row.id}" />
                                        
                                        <div class="form-group col-md-12">
                                            
                                            <div class="ibox-content">
                                                <div id="crop-avatar">
                                                    <div class="avatar-view" title="上传头像">
                                                        <img src="{:GetHead($row['id'])}" alt="Logo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <if condition="rolemenu(array('User/add'))">
                                        <div class="form-group col-md-3">
                                            <label>用户角色</label>
                                            <select class="form-control" name="info[roleid]" id="juese" onChange="selectls()">
                                                <foreach name="roles" item="v">
                                                <option value="{$v.id}" <?php if($row['roleid']==$v['id']){ echo 'selected';} ?> >{$v.name}</option>
                                                </foreach>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label>账号状态</label>
                                            <select class="form-control" name="info[status]">
                                                <option <?php if($row !== false and $row['status'] == 0){ echo 'selected';}?> value="0">启用</option>
                                                <option <?php if($row === false or $row['status']==1){ echo 'selected';}?> value="1">禁用</option>
                                               
                                            </select>
                                        </div>
                                        
                                       
                                        <div class="form-group col-md-6" style="position:relative">
                                            <label>用户组</label>
                                            <input type="text" name="info[user_group]"  value="{$row.user_group}"  class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-12"><div style="border-top:2px solid #f39c12; margin-top:20px; padding-top:20px;"></div></div>
                                        </if>
                                                    
                                        
                                        <div class="form-group col-md-3" style="position:relative">
                                            <label>用户名</label>
                                            <input type="text" name="info[username]" disabled value="{$row.username}" id="username"  class="form-control" />
                                        </div>
                                        
                                         <div class="form-group col-md-3">
                                            <label>姓名</label>
                                            <input type="text" name="info[name]" value="{$row.name}" class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label>性别</label>
                                            <select class="form-control" name="info[sex]">
                                            	<option value="">请选择</option>
                                                <option <?php if($row['sex']=='男'){ echo 'selected';}?> value="男">男</option>
                                                <option <?php if($row['sex']=='女'){ echo 'selected';}?> value="女">女</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-3" style="position:relative">
                                            <label>邮箱</label>
                                            <input type="text" name="info[email]"  value="{$row.email}"  class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label>手机号码</label>
                                            <input type="text" name="info[mobile]" value="{$row.mobile}"  id="password_1" class="form-control" />
                                        </div>

                                        
                                        <div class="form-group col-md-3">
                                            <label>单位</label>
                                            <input type="text" name="info[company]" value="{$row.company}" class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label>部门</label>
                                            <input type="text" name="info[department]" value="{$row.department}" class="form-control" />
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label>职称</label>
                                            <input type="text" name="info[post]" value="{$row.post}" class="form-control" />
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-12">
                                            <label>擅长领域</label>
                                            <textarea class="form-control" name="info[speciality]" style="height:200px;">{$row.speciality}</textarea>
                                        </div>
                                        
                                        
                                        
    
                                   		
                                    </div>
                                    <div class="form-group">&nbsp;</div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <div class="form-group savebtn">
                                <button class="btn btn-success btn-lg saves"><i class="fa fa-pencil-square"></i> 保存</button>
                            </div>
                            </form>
                            
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		
        <include file="Index:footer" />
        
        <script type="text/javascript">
		$(document).ready(function(){
			selectls();
			$.formValidator.initConfig({autotip:true,formid:"basic_validate",onerror:function(msg){}});
			$("#email").formValidator({onshow:"请输入邮箱",onfocus:"请输入邮箱"}).inputValidator({min:4,max:20,onerror:"请输入邮箱"}).regexValidator({regexp:"email",datatype:"enum",onerror:"请输入邮箱"}).ajaxValidator({
				type : "get",
				url : "ucenter.php",
				data :"m=Main&c=User&a=public_checkmail_ajax",
				datatype : "html",
				async:'false',
				success : function(data){
					if( data == 0 ) {
						return true;
					} else {
						return false;
					}
				},
				buttons: $("#dosubmit"),
				onerror : "该邮箱已被注册。",
				onwait : "请稍候..."
			});
	
		});
		
		function selectls(){
			var v = $('#juese').val();
			if(v==5){
				$('.waibulaoshi').show();
			}else{
				$('.waibulaoshi').hide();	
			}
		}
		
		
	</script>
    
    
    
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="avatar-form" action="{:U('Attachment/upload_avatar')}" enctype="multipart/form-data" method="post">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title" id="avatar-modal-label">上传头像</h4>
                    </div>
                    <div class="modal-body">
                        <div class="avatar-body">
                            <div class="avatar-upload">
                            	<input type="hidden" name="userid" value="{$row.id}">
                                <input class="avatar-src"  name="avatar_src"  type="hidden">
                                <input class="avatar-data" name="avatar_data" type="hidden">
                                <input class="avatar-w"    name="avatar[w]"   type="hidden">
                                <input class="avatar-h"    name="avatar[h]"   type="hidden">
                                <input class="avatar-x"    name="avatar[x]"   type="hidden">
                                <input class="avatar-y"    name="avatar[y]"   type="hidden">
                                <input class="avatar-r"    name="avatar[r]"   type="hidden">
                                
                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file"></div>
                            <div class="row">
                                <div class="leftzoom">
                                    <div class="avatar-wrapper"></div>
                                </div>
                                <div class="rightzoom">
                                    <div class="avatar-preview preview-lg"></div>
                                    <div class="avatar-preview preview-md"></div>
                                    <div class="avatar-preview preview-sm"></div>
                                </div>
                            </div>
                            <div class="row avatar-btns">
                                <div class="leftbotton">
                                    <div class="btn-group">
                                        <button class="btn" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"><i class="fa fa-undo"></i> 向左旋转</button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"><i class="fa fa-repeat"></i> 向右旋转</button>
                                    </div>
                                </div>
                                <div class="rightbotton">
                                    <button class="btn btn-success btn-block avatar-save" type="submit"><i class="fa fa-save"></i> 保存修改</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
      </div>
    </div>
    
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
