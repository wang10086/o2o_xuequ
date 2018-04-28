<include file="Index:header" />

<div class="unbox mt10">
    <div class="content">
        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="#">科学教育专题</a>
        </div>

        <div class="content">


            <div class="artdetail">

                <div class="dtitle mt20"><h2>科学教育专题</h2></div>

                <div class="newscon mt20 news_con">
                    <foreach name="data" item="vo">
                        <div class="news_list"><div class="news_title"><a href="{:U('Education/edu_detail',array('id'=>$vo['id']))}">{$vo.title}</a></div><span class="news_data">{$vo.create_time|date='Y-m-d',###}</span></div>
                    </foreach>
                    <div class="news_list"><div class="news_title"><a href="{:U('Education/shaokeyuan')}">海淀少科院</a></div><span class="news_data">2018-01-11</span></div>
                    <div class="news_list"><div class="news_title"><a href="{:U('Education/yanjiangtuan')}">中国科学院老科学家科普演讲团专题</a></div><span class="news_data">2018-01-10</span></div>
                    <div class="news_list"><div class="news_title"><a href="{:U('Education/zjs_luntan')}">“紫金山论坛”专题</a></div><span class="news_data">2018-01-02</span></div>
                    <div class="news_list"><div class="news_title"><a href="{:U('HHH/HHH')}">中国科学院“3H工程”支撑服务学校专题</a></div><span class="news_data">2018-01-02</span></div>
                    <div class="news_list"><div class="news_title"><a href="{:U('Gongyi/gongyi')}">学校科学教育基金</a></div><span class="news_data">2018-01-02</span></div>
                </div>
                <div class="polpage">
                    <span>共&nbsp;1&nbsp;页&#12288;1</span>
                </div>

                <!--<div class="pagestyle">
                    {$pages}
                </div>-->
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
</div>


<script type="text/javascript">
    jQuery(".txtMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:9,interTime:50});
</script>

<include file="footer" />