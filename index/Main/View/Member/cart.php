    <include file="Index:header" />
    
    <div class="unbox">
        <div class="content">
            
            <div class="crumbs">
                您所在的位置：<a href="index.html">首页</a>  <span>&gt;</span> <a href="{:U('Pro/index',array('kind'=>35))}">科技节</a> <span>&gt;</span> <a href="javascript:;">我的购物车</a>
            </div>
            
            
            <div class="content">
            
            
                <div class="artdetail">
                <div class="shoplist">
                <table width="100%" rules="none" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <th width="600">课题名称</th>
                        <th width="100">数量</th>
                        <!--<th width="100">价格</th>-->
                        <th width="50">删除</th>
                    </tr>
                    <foreach name="shoplist" item="row">
                    <tr>
                        <td>
                            <a href="{:U('Pro/sci',array('id'=>$row['id']))}"><img class="img" src="{$row.pic}"></a>
                            <a href="{:U('Pro/sci',array('id'=>$row['id']))}"><h4>{$row.title}</h4></a>
                        </td>
                        <td>1</td>
                        <!--<td>&yen;{$row.price}</td>-->
                        <td><a href="javascript:;" onClick="removecart({$row.id},this)">删除</a></td>
                    </tr>
                    </foreach>
                    <tr>
                        <th>合计</th>
                        <th>{$count}</th>
                        <!--<th>&yen;0.00</th>-->
                        <th></th>
                    </tr>
                </table>
                </div>
                    
                    <!--
                    <div class="dtitle"><h2>预定信息</h2></div>
                    -->
                <form id="save_sci" action="{:U('Member/cart')}" method="post" >
                    <input type="hidden" name="dosubmint" value="1">
                <div class="cartbooking">
                    <div class="booking">
                        <div>
                            <label>听课对象</label>
                            <input type="text" name="listener">
                        </div>
                    <label style="margin-left: 30px;">活动时间</label><input type="text" name="sci_time" id="sci_time" class="inputdate">
                    </div>
                    <!--<input type="submit" class="submint" value="立即预订">-->
                    <a href="javascript:;" onclick="save_sci()" class="submint">立即预订</a>
                </div>
                </form>
                    
                    
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

    //保存购物车到数据库
    function save_sci(){
        var sci_time = document.getElementById("sci_time").value;
        if(!sci_time){
            alert("预约科技节时间不能为空！");
        }else{
            document.getElementById("save_sci").submit();
        }

    }
    </script>

    <include file="Index:footer" />
