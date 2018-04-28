<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Show/kejiao_show')}">科教活动展示</a> <span>&gt;</span> <a href="#">{$data.title}</a>
        </div>


        <div class="content">
            <div class="actlbox">
                <h2 class="tra_tit">{$data.title}</h2>

                <div class="newsdd">
                    <span class="news_xj">文章来源：{$data.source}</span>| <span class="news_xj">发布时间：{$data.create_time|date='Y-m-d',###}</span>| <span class="news_xj"><a href="#" onclick="window.history.go(-1)">【关闭】</a></span>
                </div>

                <style>
                    .newscon{text-align: center; overflow: hidden;}
                    .conpic{position: relative;  left: -272px;  width: 1418px; cursor: default;}
                </style>

                <div class="newscon">
                    <foreach name="picture" item="v">
                        <img class="conpic" src="/{$v['filepath']}">
                    </foreach>
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


<script type="text/javascript">
</script>

<include file="Index:footer" />
