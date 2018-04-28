    <include file="Index:header" />
    
    <div class="unbox">
        <div class="content">
            
            <div class="crumbs">
                您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="javascript:;">个人中心</a>
            </div>
            
            
            <div class="content">
            
            
                <div class="artdetail">

                    <if condition="$lecture">
                        <div class="dtitle"><h2>预约讲座记录</h2></div>
                        <div class="booklist">
                            <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th width="400">讲座/关键字</th>
                                    <th width="90">专家</th>
                                    <th width="110">审核状态</th>
                                    <th width="150">预约时间</th>
                                </tr>
                                <foreach name="lecture" item="row">
                                    <tr>
                                        <if condition="$row['type'] eq 1">
                                            <td>
                                                <a href="{:U('Pro/lecture',array('id'=>$row['res_id']))}"><img class="img" src="{:thumb($row['pic'],180,180)}"></a>
                                                <a href="{:U('Pro/lecture',array('id'=>$row['res_id']))}"><h4>{$row.article_title}</h4></a>
                                            </td>
                                            <else />
                                            <td>
                                                <a href="javascript:;"><h4>{$row.vague_keywords}</h4></a>
                                            </td>
                                        </if>

                                        <td>{$row.exp}</td>
                                        <td>{$status[$row['status']]}</td>
                                        <td>{$row.in_day}</td>
                                    </tr>
                                </foreach>
                            </table>
                        </div>
                    </if>

                    <div class="dtitle mt20"><h2>服务校申请记录</h2></div>
                    <div class="booklist">
                    <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                    	<tr>
                        	<th width="400">学校名称</th>
                            <th width="150">联系人</th>
                            <th width="180">审核状态</th>
                            <th width="260">申请时间</th>
                            <if condition="$service and (($sta eq 0) or ($sta eq 2))">
                                <th width="50">操作</th>
                            </if>
                        </tr>
                        <tr>
                        	<td><h4>{$service.school_name}</h4></td>
                            <td>{$service.contacts_name}</td>
                            <td>{$v_status[$service['status']]}</td>
                            <td><if condition="$service['apply_time']">{$service.apply_time|date='Y-m-d H:i:s',###}</if> </td>
                            <if condition="$service and (($service['status'] eq 0) or ($service['status'] eq 2))">
                                <td><a class="apply_edit" href="{:U('Member/apply_service_edit',array('id'=>$service['id']))}">修改</a></td>
                            </if>
                        </tr>
                    </table>
                    </div>

                    <if condition="$scis">
                        <div class="dtitle mt20"><h2>科技节预约记录</h2></div>
                        <div class="booklist">
                            <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th width="400">科技节名称</th>
                                    <th width="150">联系人</th>
                                    <th width="150">审核状态</th>
                                    <th width="260">科技节时间</th>
                                </tr>
                                <foreach name="scis" item="sci">
                                    <tr>
                                        <td><h4>{$sci.sci_tit}</h4></td>
                                        <td>{$sci.call_man}</td>
                                        <td>{$status[$sci['status']]}</td>
                                        <td>{$sci.in_day|date='Y-m-d',###}</td>
                                    </tr>
                                </foreach>
                            </table>
                        </div>
                    </if>

                    <if condition="$tra_lessions">
                        <div class="dtitle mt20"><h2>研学旅行/科学课程预约记录</h2></div>
                        <div class="booklist">
                            <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th width="400">研学旅行/科学课程名称</th>
                                    <th width="150">联系人</th>
                                    <th width="150">审核状态</th>
                                    <th width="260">研学/科学课程时间</th>
                                </tr>
                                <foreach name="tra_lessions" item="tra">
                                    <tr>
                                        <td><h4>{$tra.goods_title}</h4></td>
                                        <td>{$tra.call_man}</td>
                                        <td>{$status[$tra['status']]}</td>
                                        <td>{$tra.in_day|date='Y-m-d',###}</td>
                                    </tr>
                                </foreach>
                            </table>
                        </div>
                    </if>

                    <div class="dtitle mt20"><h2>相关文件下载</h2></div>

                    <div class="downloadlist">
                        <ul>
                            <!--<if condition="$id neq null">
                                <li><i class="pdf"></i><a href="{:U('Member/download_pdf',array('id' => $id))}" target="_blank">下载我的支撑服务校申请表</a><span>263KB</span></li>
                                <else />
                                <li><i class="pdf"></i>
                                    <a href="javascript:;" class="centmore" onClick="showmsg('下载我的支撑服务校申请表','<br />您没有待审核的支撑服务校信息')">下载我的支撑服务校申请表</a>
                                </li>
                            </if>-->
                            <li><i class="pdf"></i><a href="{:U('Member/download_pdf',array('id' => $id))}" target="_blank">下载我的支撑服务校(单位)申请表</a><span>263KB</span></li>
                        </ul>
                    </div>
                    

                </div>


                <div class="actrbox">

                    <!--<div class="unrel mt20">
                        <div class="reltit">
                            <h2>相关领域专家</h2>
                        </div>
                        <div class=" exphot">
                            <ul>
                                <foreach name="data_x" item="v">
                                    <li><a href="{:U('Pro/lecture',array('id'=>$v['id']))}"><img src="{:thumb($v['pic'],105,105)}"><p>{$v.title}</p></a></li>
                                </foreach>
                            </ul>
                        </div>
                    </div>-->

                    <div class="unrel mt20">
                        <div class="reltit">
                            <h2>相关领域活动</h2>
                        </div>
                        <div class="cont"><ul>
                                <foreach name="data_y" item="v">
                                    <li><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></li>
                                </foreach>
                            </ul></div>
                    </div>

                    <div class="unrel mt20">
                        <div class="reltit">
                            <h2>相关领域资源</h2>
                        </div>
                        <div class="cont"><ul>
                                <foreach name="data_z" item="v">
                                    <li><a href="{:U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']))}">{$v.title}</a></li>
                                </foreach>
                            </ul></div>
                    </div>

                </div>
                
                
            </div>
            
        </div>
    </div>
        
    <script>
    //删除
	function removecart(id,obj){
		//提交表单
		$.ajax({
		   type: "POST",
		   url: "{:U('Pro/joinshopcart')}",
		   dataType:'json', 
		   data:{id:id,type:1,rand:parseInt(10000*Math.random())},
		   success:function(data){
			   $(obj).parent().parent().remove();
		   }
		});
				
	}
	laydate.render({
		elem: '.inputdate',showBottom: false,theme: '#0099CC',trigger: 'click'
	});
	
    </script>
    
    <include file="Index:footer" />
