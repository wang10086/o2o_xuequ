    <include file="Index:header" />
    
    <div class="unbox">
        <div class="content">
            
            <div class="crumbs">
                您所在的位置：<a href="index.html">首页</a>  <span>&gt;</span> <a href="{:U('Pro/index')}">专家讲座</a> <span>&gt;</span> <a href="javascript:;">{$row.title}</a>
            </div>
            
            
            <div class="content">
            
            
                <div class="artdetail">
                
                    <div class="dtitle mt20"><h2>专家简介</h2></div>
                    
                    <div class="expert_lec">
                    	<img src="{:thumb($row['pic'],180,240)}">
                        <div class="expdesc">
                        	<h2>{$row.title}</h2>
                            {$row.content}
                        </div>
                    </div>
                    
                    
                    <div class="dtitle"><h2>相关讲座</h2></div>
                    
                    <div class="lecture">
                        <ul>
                        	<foreach name="lec" item="v" key="k">
                            <li>
                                <input type="hidden" name="">
                                <input type="hidden" name="id" value="$v['id']">
                                <h3><a href="#">{$v.title}</a></h3>
                                <div class="nr">
                                	<!--
                                    <img src="{:thumb($v['pic'],280,180)}">
                                    -->
                                    <p style="width:100%;">{:strip_tags($v['content'])}</p>
                                </div>
                                <div class="tagboosk">

                                    <div class="tags">
                                        <if condition="$v['city'] neq null">
                                            <span>{$v.city}</span>
                                        </if>
                                        <if condition="$v['fields'] neq null">
                                            <span>{$v.fields}</span>
                                        </if>
                                        <if condition="$v['fit'] neq null">
                                            <span>{$v.fit}</span>
                                        </if>
                                        <if condition="$v['keywords'] neq null">
                                            <foreach name="v['keywords']" item="vo">
                                                <if condition="$vo neq ''">
                                                    <span>{$vo}</span>
                                                </if>
                                            </foreach>
                                        </if>
                                    </div>

                                    <!--<a href="{:U('Member/book_lecture',array('id'=>$v['id']))}" class="more">马上预约</a>-->
                                    <a href="javascript:;" onclick="check_app({$v['id']})" class="more">马上预约</a>
                                </div>
                            </li>
                            </foreach>
                        </ul>
                    
                    </div>
                    
                </div>
                
                
                <div class="actrbox">
                    <div class="unrel mt20">
                        <div class="reltit">
                            <h2>热门活动</h2>
                        </div>
                        <div class="cont"><ul>
                                <foreach name="data_y" item="v">
                                    <li><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></li>
                                </foreach>
                            </ul></div>
                    </div>

                    <div class="unrel mt20">
                        <div class="reltit">
                            <h2>热门资源</h2>
                        </div>
                        <div class="cont"><ul>
                                <foreach name="data_z" item="v">
                                    <li><a href="{:U('Member/book_lecture',array('id'=>$v['id']))}">{$v.title}</a></li>
                                </foreach>
                            </ul></div>
                    </div>

                    <div class="unrel mt20">
                        <div class="reltit">
                            <h2>热门专家</h2>
                        </div>
                        <div class=" exphot">
                            <ul>
                                <foreach name="data_x" item="v">
                                    <li><a href="{:U('Pro/lecture',array('id'=>$v['id']))}"><img src="{:thumb($v['pic'],105,105)}"><p>{$v.title}</p></a></li>
                                </foreach>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                
                
            </div>
            
        </div>
    </div>

    <script type="text/javascript">
        //验证用户是否是支撑服务校用户
        function check_app(id){
            var host = window.location.host;
            var con;
            $.ajax({
                type:'post',
                url:"{:U('pro/check_apply')}",
                data:{id:id},
                success:function(msg){
                    if(msg == 0){
                        con=confirm("只有支撑服务校用户才能预约课程,请先注册登录!");
                        if(con==true){
                            window.location.href="{:U('Login/check_login')}";
                        }
                        return;
                    }else if(msg == 1){
                        con=confirm("只有支撑服务校用户才能预约课程,请先申请支撑服务校!");
                        if(con==true){
                            window.location.href="{:U('Member/apply_service')}";
                        }
                        return;
                    }else if(msg == 2){
                        var url= "http://"+host+"/Member/book_lecture/id/"+id+".html";
                        window.location.href=url;
                        return;
                    }
                }
            })
        }
    </script>
    
    <include file="Index:footer" />
