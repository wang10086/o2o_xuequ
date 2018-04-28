<include file="Index:header" />

<!--<include file="header" />-->



<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Resource/index')}">高端科教资源</a> <if condition="$kindname"><span>&gt;</span> <a href="{:U('Resource/index',array('type'=>$row['type']))}">{$kindname}</a></if> <span>&gt;</span> <a href="">{$row.title}</a>
        </div>

        <div class="content">


            <div class="artdetail">
                <div class="dtitle"><h2>资源描述</h2></div>
                <div class="expert">
                    <!--<img src="{:thumb($row['pic'],240,150)}">-->
                    <img src="/{$row['pic']}">
                    <div class="expdesc">
                        <h2>{$row.title}</h2>
                        <ul class="resdesc">
                            <li><strong>科教领域 :</strong> {$row.fields}</li>
                            <li><strong>所属系统 :</strong> {$row.system}</li>
                            <!--<li><strong>所在省市 :</strong> {$row.city}</li>
                            <li><strong>适合人群 :</strong> {$row.fit}</li>-->
                        </ul>
                    </div>
                </div>


                <div class="dtitle"><h2>资源介绍</h2></div>
                <div class="newscon mt20 desc_cont">
                    <div class="actlbox">
                        <foreach name="info" item="value">
                            <div class ='tra_con'>
                                <if condition="$value['remarks']"><p class="tra_title">{$value.remarks}</p></if>
                                <if condition="$value['citys']"><p class="tra_addr">{$value.citys}</p></if>
                                <div class="tra_newscon">
                                    <!--{:nl2br($value['content'])}-->
                                   <p>{$value['content']}</p>
                                </div>
                                <div class="tra_morepic">
                                    <foreach name="value['filepath']" item="vo">
                                        <img src="/{$vo}">
                                    </foreach>
                                </div>
                            </div>
                        </foreach>
                    </div>
                </div>


                <div class="dtitle mt20"><h2>相关项目</h2></div>
                <div class="newscon mt20 desc_cont">
                    <div class="about_t">
                        <foreach name="data_A" item="v">
                            {$v}：
                        </foreach>
                    </div>

                    <div class="about_C">
                        <foreach name="data_B" item="v">
                            <if condition="$type eq '1'">
                                <span><a href="{:U('Pro/lecture',array('id'=>$v['expert_id']))}">{$v.title}</a></span>
                                <elseif condition="$type eq '10'" />
                                <span><a href="javascript:;">{$v.title}</a></span>
                                <elseif condition="($type eq '3') or ($type eq '4')" />
                                <span><a href="javascript:;">{$v.title}</a></span>
                                <else />
                                <span><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></span>
                            </if>
                        </foreach>
                    </div>
                </div>
            </div>

            <div class="actrbox">

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门活动</h2>
                    </div>
                    <div class="cont">
                        <ul>
                            <foreach name="data_y" item="v">
                                <li><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></li>
                            </foreach>
                        </ul>
                    </div>
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