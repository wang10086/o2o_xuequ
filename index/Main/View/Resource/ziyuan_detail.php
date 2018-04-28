<include file="Index:header" />

<!--<include file="header" />-->



<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Resource/index')}">高端科教资源</a> <if condition="$kindname"><span>&gt;</span> <a href="{:U('Resource/index',array('type'=>$row['type']))}">{$kindname}</a></if> <span>&gt;</span> <a href="">{$row.title}</a>
        </div>

        <div class="content">


            <div class="artdetail">
                <?php if (in_array('[11]',$_SESSION['col'])){ ?>
                    <div class="dtitle"><h2>顾问描述</h2></div>
                    <div class="expert">
                        <img src="/{$row['pic']}">
                        <div class="expdesc">
                            <h2>{$row.title}</h2>
                            <ul class="resdesc">
                                <li><strong>职务 :</strong> {$row.keywords}</li>
                                <li><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </li>
                                <!--<li><strong>所在省市 :</strong> {$row.city}</li>-->
                                <!--<li><strong>适合人群 :</strong> {$row.fit}</li>-->
                            </ul>
                        </div>
                    </div>
                <?php }elseif (in_array('[2]',$_SESSION['col']) or in_array('[3]',$_SESSION['col']) or in_array('[4]',$_SESSION['col']) or in_array('[5]',$_SESSION['col']) or in_array('[6]',$_SESSION['col']) or in_array('[7]',$_SESSION['col']) or in_array('[8]',$_SESSION['col']) or in_array('[9]',$_SESSION['col']) or in_array('[10]',$_SESSION['col'])){ ?>
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
                <?php }else{ ?>
                    <div class="dtitle"><h2>专家描述</h2></div>
                    <div class="expert">
                        <img src="/{$row['pic']}">
                        <div class="expdesc">
                            <h2>{$row.title}</h2>
                            <ul class="resdesc">
                                <if condition="$row['fields']"><li><strong>科教领域 :</strong> {$row.fields}</li></if>
                                <if condition="$row['system']"><li><strong>所属系统 :</strong> {$row.system}</li></if>
                                <if condition="$row['city']"><li><strong>所在省市 :</strong> {$row.city}</li></if>
                                <if condition="$row['fit']"><li><strong>适合人群 :</strong> {$row.fit}</li></if>
                                <if condition="$row['pro']"><li><strong>支持项目 :</strong> {$row.pro}</li></if>
                                <if condition="$row['ss_city']"><li><strong>实施省市 :</strong> {$row.ss_city}</li></if>
                            </ul>
                        </div>
                    </div>
                <?php } ?>



                <?php if (in_array('[11]',$_SESSION['col'])){ ?>
                    <div class="dtitle"><h2>顾问介绍</h2></div>
                        <div class="newscon mt20 desc_cont">&emsp;&emsp; {:nl2br($row['content'])}</div>
                <?php }elseif (in_array('[3]',$_SESSION['col']) or in_array('[4]',$_SESSION['col']) or in_array('[5]',$_SESSION['col']) or in_array('[6]',$_SESSION['col']) or in_array('[7]',$_SESSION['col']) or in_array('[8]',$_SESSION['col']) or in_array('[9]',$_SESSION['col']) or in_array('[10]',$_SESSION['col'])){ ?>
                    <div class="dtitle"><h2>资源介绍</h2></div>
                        <div class="newscon mt20 desc_cont">&emsp;&emsp; {:nl2br($row['content'])}</div>
                <?php }elseif (in_array('[2]',$_SESSION['col'])){ ?>
                    <div class="dtitle"><h2>资源介绍</h2></div>
                        <div class="newscon mt20 desc_cont">
                            <div class="actlbox">
                                <foreach name="info" item="value">
                                    <div class ='tra_con'>
                                        <if condition="$value['remarks']"><p class="tra_title">{$value.remarks}</p></if>
                                        <if condition="$value['citys']"><p class="tra_addr">地点：{$value.citys}</p></if>
                                        <div class="tra_newscon">
                                            <!--{:nl2br($value['content'])}-->
                                            {$value['content']}
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
                <?php }else{ ?>
                    <div class="dtitle"><h2>专家介绍</h2></div>
                        <div class="newscon mt20 desc_cont">&emsp;&emsp; {:nl2br($row['content'])}</div>
                <?php } ?>



                <?php if (in_array('[11]',$_SESSION['col'])){ ?>
                    <div class="dtitle mt20"><h2>顾问职责</h2></div>
                    <div class="newscon mt20 desc_cont">
                        &emsp;&emsp;联盟建设、管理、运行中重大事项的决策咨询；联盟科学教育理论研究指导；出席联盟重要活动；专题报告。
                    </div>
                <?php }else{ ?>
                    <div class="dtitle mt20"><h2>相关项目</h2></div>
                    <div class="newscon mt20 desc_cont">
                        <div class="about_t">
                            <foreach name="data_A" item="v">
                                {$v}：
                            </foreach>
                        </div>
                        <!--<div class="about_C">
                            <foreach name="data_B" item="v">
                                <if condition="$type eq '1'">
                                    <span><a href="{:U('Pro/lecture',array('id'=>$v['id']))}">{$v.title}</a></span>
                                <elseif condition="$type eq '10'" />
                                    <span><a href="{:U('Pro/goods',array('id'=>$v['id']))}">{$v.title}</a></span>
                                <elseif condition="($type eq '3') or ($type eq '4')" />
                                    <span><a href="{:U('Pro/index',array('kind'=>35))}">{$v.title}</a></span>
                                    <else />
                                    <span><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></span>
                                </if>
                            </foreach>
                        </div>-->
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
                <?php } ?>

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