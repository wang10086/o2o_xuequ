
<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置： <a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="javascript:;">申请支撑服务校(单位)名录</a>
        </div>
        <div class="content">


            <div class="artdetail">

                <div class="dtitle"><h2>支撑服务校(单位)名录&nbsp;({$count}所)</h2></div>

                <div class="booklist">
                    <div class="pro_names">
                        <foreach name="city_school" item="value">
                            <if condition="$value.count neq 0">
                                <div class="pro_cname">
                                    <h2>{$value.province}({$value.count}所)</h2>
                                    <ul class="school">
                                        <foreach name="schools" item="vo">
                                            <!--<if condition="$vo['province'] eq $value['province']">
                                                <if condition="$vo['school_web'] neq null">
                                                    <a href="http://{$vo.school_web}"><li>{$vo.school_name}</li></a>
                                                    <else />
                                                    <a href="javascript:;"><li>{$vo.school_name}</li></a>
                                                </if>
                                            </if>-->
                                            <if condition="$vo['province'] eq $value['province']">
                                                <a href="javascript:;"><li>{$vo.school_name}</li></a>
                                            </if>
                                        </foreach>
                                    </ul>
                                </div>
                            </if>
                        </foreach>
                    </div>
                </div>
            </div>


            <div class="actrbox">


                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关领域活动</h2>
                    </div>
                    <div class="cont"><ul>
                            <foreach name="data_y" item="v">
                                <li><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></li>
                            </foreach>
                        </ul>
                    </div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关领域资源</h2>
                    </div>
                    <div class="cont"><ul>
                            <foreach name="data_z" item="v">
                                <li><a href="{:U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']))}">{$v.title}</a></li>
                            </foreach>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<include file="Index:footer" />