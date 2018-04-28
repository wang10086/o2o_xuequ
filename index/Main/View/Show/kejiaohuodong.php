<include file="Index:header" />
	
    <div class="unbox">
    	<div class="content ovhid">
        	
            <div class="crumbs">
            	您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="#">科教活动展示</a>
            </div>

            <div class="actlist">
            	<ul>

                    <foreach name="data" item="v">
                        <li>
                            <input type="hidden" value="{$v.module}">
                            <a href="{:U('kejiao',array('id'=>$v['id'] , 'module'=>$v['module']))}" class="listcon">
                                <img class="kj_img" src="/{$v.pic}">
                                <if condition="$v['type'] eq 'new'">
                                    <img class="kj_new" src="__HTML__/images/new1.png">
                                </if>
                                <p>{$v.title}</p>
                            </a>
                        </li>
                    </foreach>
                    
                </ul>
            </div>

            <div class="pagestyle">
                {$pages}
            </div>
            
        </div>
    </div>
    
    
    
    <include file="Index:footer" />