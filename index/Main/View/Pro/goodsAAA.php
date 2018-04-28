<include file="Index:header" />


<div class="unbox">
    	<div class="content">
        	
            <div class="crumbs">
            	您所在的位置：<a href="{:U('Index/home')}">首页</a>  <if condition="$kindname"><span>&gt;</span> <a href="{:U('Resource/index',array('type'=>$row['type']))}">{$kindname}</a></if> <span>&gt;</span> <a href="">{$row.title}</a>
            </div>
            
            
            <div class="content">
            	<div class="artdetail">
                
                    <div class="dtitle"><h2>描述</h2></div>
                    
                    <div class="expert">
                    	<!--<img src="{:thumb($row['pic'],240,150)}">-->
                        <img src="/{$row[pic]}" class="sci_img" >
                        <div class="expdesc">
                        	<h2>{$row.title}</h2>
                            <if condition="$row[fit]"><p>适合人群：{$row.fit}</p></if>
                            <if condition="$row[city]"><p>实施城市：{$row.city}</p></if>
                            <if condition="$row[system]"><p>所属系统：{$row.system}</p></if>
                        </div>
                    </div>
                    
                    
                    <div class="dtitle"><h2>课程介绍</h2></div>
                    <div class="kechengpic mt20">
                        {$row['content']}
                    </div>

                    <div class="dtitle"><h2>相关图片</h2></div>
                    <div class="kechengpic mt20">
                        <ul>
                            <foreach name ='atts' item="v">
                                <li><img src="{:thumb($v['filepath'],208,150)}"><span>{$v.filename}</span></li>
                            </foreach>
                        </ul>
                    </div>
                    
                </div>

                <div class="actrbox">

                    <!--<div class="unrel mt20">
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
                    </div>-->

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
                                    <li><a href="{:U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']))}">{$v.title}</a></li>
                                </foreach>
                            </ul></div>
                    </div>

                </div>
                
                
            </div>
            
        </div>
    </div>
    
    


    <include file="Index:footer" />