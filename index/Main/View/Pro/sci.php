<include file="Index:header" />

<include file="header" />


<div class="unbox">
    	<div class="content">
        	
            <div class="crumbs">
            	您所在的位置：<a href="{:U('Index/home')}">首页</a>  <if condition="$kindname"><span>&gt;</span> <a href="{:U('Resource/index',array('type'=>$row['type']))}">{$kindname}</a></if> <span>&gt;</span> <a href="">{$row.title}</a>
            </div>
            
            
            <div class="content">
            
            
            	<div class="artdetail">
                
                    <div class="dtitle"><h2>描述</h2></div>
                    
                    <div class="expert">
                    	<img src="{:thumb($row['pic'],240,150)}">
                        <div class="expdesc">
                        	<h2>{$row.title}</h2>
                            <ul class="resdesc">
                                <if condition="$row.system neq null"><li><strong>所属系统 :</strong> {$row.system}</li></if>
                                <if condition="$row.city neq null"><li><strong>所在省市 :</strong> {$row.city}</li></if>
                                <if condition="$row.fit neq null"><li><strong>适合人群 :</strong> {$row.fit}</li></if>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="dtitle"><h2>简介</h2></div>
                    
                    <div class="newscon mt20 desc_cont">
                        {:nl2br($row['content'])}
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


    <include file="Index:footer" />