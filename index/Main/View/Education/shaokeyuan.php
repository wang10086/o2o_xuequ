<include file="Index:header" />
<script type="text/javascript" src="__HTML__/js/easySlider1.5.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#slider").easySlider({
            prevText: '上一页',
            nextText: '下一页',
            firstShow: true,
            lastShow: true,
            vertical: true,
            continuous: true
        });
    });
</script>


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Education/education')}">科学教育专题</a> <span>&gt;</span> <a href="#">海淀区少科院</a>
        </div>

        <style>

        </style>

        <div class="content">
            <div class="sky mt20">
                <!--<img src="__HTML__/images/sky.jpg">-->
                <img class="sky_img1" src="__HTML__/images/sky_b2.jpg">
                <div class="slideTxtBox">
                    <div class="hd">
                        <ul><li>相关动态</li><li>相关视频</li></ul>
                    </div>
                    <div class="bd">
                        <ul>
                            <foreach name="data" item="vo">
                                <li><span class="date">{$vo['create_time']|date='Y-m-d',###}</span><a href="{:U('Education/sky_detail',array('id'=>$vo['id'],'module'=>$vo['module']))}">{$vo.title}</a></li>
                            </foreach>
                        </ul>
                        <ul>
                            <li><span class="date">2018-01-03</span><a href="http://o2o.kexueyou.com/upload/201801/03/5a4c4c5dbf6b8.mp4" target="_blank">点燃科学梦想——海淀区少年科学院建院纪实</a></li>
                        </ul>
                    </div>
                </div>

                <!--海淀区少年科学院大事记-->
                <div class="artdetail">
                    <div class="dtitle mt20"><h2>海淀区少年科学院大事记</h2></div>
                </div>
                <div id="slider" class="mt20 sky_thing">
                    <ul>
                        <li><a href="javascript:;">
                                <div class="date"> ①&#8194;2015年12月17日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">《 海淀区中小学三年行动计划》&#8194;（2015年—2017年）&#8194;提出成立海淀区少年科学院</span></div>
                                <div class="date"> ②&#8194;2016年10月19日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区教委美育与校外教育科到中国科学院行政管理局、中国科学院物理研究所进行实地调研并提出设想方案。</span></div>
                                <div class="date"> ③&#8194;2016年11月 25日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">确定海淀区少年科学院成立总体方案及章程</span></div>
                                <div class="date"> ④&#8194;2017年 &nbsp;1月&nbsp;6日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区教委主任办公会通过成立海淀区少年科学院方案</span></div>
                            </a>
                        </li>
                        <li><a href="javascript:;">
                                <div class="date"> ⑤&#8194;2017年1月12日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区教工委办公会通过成立海淀区少年科学院方案</span></div>
                                <div class="date"> ⑥&#8194;2017年1月 16日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">在北京第二十中学召开海淀区少年科学院启动大会</span></div>
                                <div class="date"> ⑦&#8194;2017年2月22日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院相关评审工作筹备会</span></div>
                                <div class="date"> ⑧&#8194;2017年3月 11日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院首批研究所评审会</span></div>
                            </a>
                        </li>
                        <li><a href="javascript:;">
                                <div class="date"> ⑨&#8194;2017年3月 16日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">中国科学院评审专家下校现场评审研究所</span></div>
                                <div class="date"> ⑩&#8194;2017年3月 20日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院首批研究所名单公示</span></div>
                                <div class="date"> ⑪&#8194;2017年3月22日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院首批分院评审工作培训会</span></div>
                                <div class="date"> ⑫&#8194;2017年3月29日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院首批分院评审筹备会</span></div>
                            </a>
                        </li>
                        <li><a href="javascript:;">
                                <div class="date"> ⑬&#8194;2017年3月31日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院首批分院评审大会</span></div>
                                <div class="date"> ⑭&#8194;2017年4月&nbsp;7日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">中国科学院评审专家下校现场评审分院</span></div>
                                <div class="date"> ⑮&#8194;2017年4月24日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院首批分院名单公示</span></div>
                                <div class="date"> ⑯&#8194;2017年5月&nbsp;4日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院百名小院士评审会</span></div>
                            </a>
                        </li>
                        <li><a href="javascript">
                                <div class="date"> ⑰&#8194;2017年5月&nbsp;4日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院分院院长评审会</span></div>
                                <div class="date"> ⑱&#8194;2017年5月&nbsp;4日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院指导教师评审会</span></div>
                                <div class="date"> ⑲&#8194;2017年5月&nbsp;5日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院学科领域办公室培训会</span></div>
                                <div class="date"> ⑳&#8194;2017年5月&nbsp;8日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院总院院长评审培训会</span></div>
                            </a>
                        </li>
                        <li><a href="javascript">
                                <div class="date"> ㉑&#8194;2017年5月10日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院学科领域办公室评审会</span></div>
                                <div class="date"> ㉒&#8194;2017年5月12日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院总院院长评审筹备会</span></div>
                                <div class="date"> ㉓&#8194;2017年5月16日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院总院院长竞选大会</span></div>
                                <div class="date"> ㉔&#8194;2017年6月&nbsp; 7日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院成立大会筹备会</span></div>
                            </a>
                        </li>
                        <li><a href="javascript">
                                <div class="date"> ㉕&#8194;2017年6月14日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class="sky_xq">海淀区少年科学院成立大会</span></div>
                                <!--<div class="date"> ㉖&#8194;年月日</div><div class="imgs"><img class="img" src="__HTML__/images/aa.png" alt=""></div><div class="sky_tcon"><span class=sky_xq>AAAAAAAAAAAAAAAA</span></div>-->
                            </a>
                        </li>
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
                                <li><a href="{:U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']))}">{$v.title}</a></li>
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

<script type="text/javascript">jQuery(".slideTxtBox").slide();</script>
<include file="Index:footer" />
