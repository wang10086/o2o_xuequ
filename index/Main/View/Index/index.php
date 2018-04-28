<include file="header" />


<div class="unbox mt20">
    <div class="content">
        <div class="slide"><a href="{:U('Index/zhicheng')}"><img src="__HTML__/images/BANNER_1.jpg"></a></div>
        <div class="hotnews">
            <div class="stit">
                <h2>通知公告</h2>
                <a href="{:U('Index/notify_list')}" class="more">更多&gt;&gt;</a>
            </div>
            <div class="hotlist">
                <ul>
                    <foreach name="list" item="vo">
                        <li><a href="{:U('Index/notify_detail',array('id'=>$vo['id'],'module'=>$vo['module']))}">{$vo.title}</a></li>
                    </foreach>
                    <li><a href="http://kjlm.kexueyou.com/">中国科学院科学教育联盟介绍</a></li>
                    <li><a href="{:U('Index/register')}">用户注册说明</a></li>
                    <li><a href="{:U('Index/zhicheng')}">中国科学院科学教育联盟支撑服务校(单位)建设</a></li>
                    <!--<li><a href="{:U('Gongyi/gongyi')}">关于针对学校设立科学教育专项基金方案</a></li>-->
                </ul>
            </div>
            <div class="stit">
                <h2>公益活动</h2>
                <a href="{:U('Index/gongyi_list')}" class="more">更多&gt;&gt;</a>
            </div>
            <div class="hotlist">
                <ul>
                    <foreach name="info" item="vo">
                        <li><a href="javascript:;">{$vo.title}</a></li>
                    </foreach>
                    <li><a href="{:U('Index/sxxd')}">中国科学院“率先行动”成果展</a></li>
                    <li><a href="{:U('Gongyi/zhumeng')}">中科筑梦行动</a></li>
                    <li><a href="{:U('Gongyi/chuangke')}">中科创客营</a></li>
                    <li><a href="{:U('Gongyi/help_stu')}">中科助学营</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--中科box start-->
<!--2017-2018课程 start-->
<!--2018寒假夏令营start-->
<!--<div class="hj_img unbox">
    <a href="{:U('Index/win_holiday')}"><img src="__HTML__/images/2018hj.jpg" alt=""></a>
</div>-->
<div class="hj_img unbox mt20">
    <a href="{:U('Index/zk_box')}"><img src="__HTML__/images/zk_box2.jpg" alt=""></a>
</div>
<div class="hj_img unbox">
    <a href="{:U('Index/lession')}"><img src="__HTML__/images/2018lession.jpg" alt=""></a>
</div>

<!--<div class="hj_img unbox mt20">
    <a href="{:U('Index/jlh')}"><img src="__HTML__/images/jlh_1.jpg" alt=""></a>
</div>-->

<div class="unbox mt20 gbg">
    <div class="content">
        <div class="title mt20">
            <h2>科学教育专题</h2>
            <a href="{:U('Education/education')}" class="more">更多&gt;&gt;</a>
        </div>
        <div class="fslide" id="subject">
            <div class="picslide">
                <div class="bd">
                    <ul class="picList">
                        <li>
                            <a href="{:U('Education/yanjiangtuan')}">
                                <div class="pic"><img src="__HTML__/images/1.jpg"></div>
                                <div class="bt">
                                    <p class="strstr">中国科学院老科学家科普演讲团专题</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{:U('Gongyi/gongyi')}">
                                <div class="pic"><img src="__HTML__/images/u262.png"></div>
                                <div class="bt">
                                    <p class="strstr">学校科学教育基金</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{:U('Education/shaokeyuan')}">
                                <div class="pic"><img src="__HTML__/images/shaokeyuan.png"></div>
                                <div class="bt">
                                    <p class="strstr">海淀区少年科学院专题</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{:U('HHH/HHH')}">
                                <div class="pic"><img src="__HTML__/images/4.jpg"></div>
                                <div class="bt">
                                    <p class="strstr">中国科学院“3H工程”学校专题</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{:U('Education/zjs_luntan')}">
                                <div class="pic"><img src="__HTML__/images/zjs_luntan1.png"></div>
                                <div class="bt">
                                    <p class="strstr">“紫金山论坛”专题</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hd">
                <a class="next"></a>
                <a class="prev"></a>
            </div>

        </div>

    </div>
</div>


<div class="unbox mt20">
    <div class="content" style="clear: both;">
        <div class="title">
            <h2>高端科教资源</h2>
            <a href="{:U('Resource/index')}" class="more">更多&gt;&gt;</a>
        </div>

        <div class="reso">
            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>1))}">
                        <img src="__HTML__/images/1_kjzj.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>1))}"><p>科教专家</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>2))}">
                        <img src="__HTML__/images/1_kyys.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>2))}"><p>科研院所</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>3))}">
                        <img src="__HTML__/images/1_kpzz.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>3))}"><p>科普组织</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>4))}">
                        <img src="__HTML__/images/1_zyxh.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>4))}"><p>专业学会</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>5))}">
                        <img src="__HTML__/images/1_kjjg.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>5))}"><p>科教机构</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>6))}">
                        <img src="__HTML__/images/1_ywtz.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>6))}"><p>野外台站</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>7))}">
                        <img src="__HTML__/images/1_dzwy.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>7))}"><p>动.植物园</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>8))}">
                        <img src="__HTML__/images/1_twt.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>8))}"><p>天文台</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>9))}">
                        <img src="__HTML__/images/1_bwg.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>9))}"><p>博物馆</p></a>
                </div>
            </div>

            <div class="l_reso">

                <div class="img_reso">
                    <a href="{:U('Resource/index',array('type'=>10))}">
                        <img src="__HTML__/images/1_sys.png">
                    </a>
                </div>
                <div class="p_reso">
                    <a href="{:U('Resource/index',array('type'=>10))}"><p>实验室</p></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="unbox mt20 gbg">
    <div class="content">
        <div class="title mt20">
            <h2>支撑服务项目</h2>
            <a href="{:U('Pro/index')}" class="more">更多&gt;&gt;</a>
        </div>
        <div class="pro">
            <div class="unpro">
                <a class="p1" href="{:U('Pro/index',array('kind'=>31))}">走进科学院<br>走近科学家</a>
                <a class="p2" href="{:U('Pro/index',array('kind'=>36))}">走进中国科学院<br>野外台站</a>
                <a class="p3" href="{:U('Pro/index',array('kind'=>32))}">研学旅行</a>
                <a class="p4" href="{:U('Pro/index',array('kind'=>33))}">科学课程</a>
                <a class="p5" href="{:U('Pro/index',array('kind'=>34))}">研究性课题</a>
                <a class="p6" href="{:U('Pro/index',array('kind'=>35))}">科技节</a>
                <a class="p7" href="{:U('Pro/index',array('kind'=>31))}">科学家讲座</a>
                <a class="p8" href="{:U('Pro/index',array('kind'=>40))}">订制科学<br>教育产品</a>
            </div>
        </div>
    </div>
</div>


<div class="unbox mt20">
    <div class="content">
        <div class="title">
            <h2>科教活动展示</h2>
            <a href="{:U('Show/kejiao_show')}" class="more">更多&gt;&gt;</a>
        </div>
        <div class="fslide" id="activity">
            <div class="picslide">
                <div class="bd cpbd">
                    <ul class="picList">
                        <foreach name="data" item="v">
                            <li>
                                <a href="{:U('Show/kejiao',array('id'=>$v['id'],'module'=>$v['module']))}">
                                    <div class="pic"><img src="/{$v.pic}"></div>
                                    <div class="bt">
                                        <p class="strstr">{$v.title}”</p>
                                    </div>
                                    <if condition="$v['type'] eq 'new'">
                                        <img class="ind_new" src="__HTML__/images/new1.png">
                                    </if>
                                </a>
                            </li>
                        </foreach>
                    </ul>
                </div>
            </div>
            <div class="hd">
                <a class="next cpnext"></a>
                <a class="prev cpprev"></a>
            </div>

        </div>

    </div>
</div>

<script type="text/javascript">
    $("#subject").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:false,vis:4,delayTime:400,interTime:5000,prevCell:'.prev',nextCell:'.next'});
    $("#activity").slide({titCell:".cphd ul",mainCell:".cpbd ul",autoPage:true,effect:"leftLoop",autoPlay:false,vis:4,delayTime:400,interTime:5000,prevCell:'.cpprev',nextCell:'.cpnext'});
</script>

<include file="footer" />
		 

       
