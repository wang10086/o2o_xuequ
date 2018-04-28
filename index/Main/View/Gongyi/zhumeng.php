<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Gongyi/gongyi')}">科教公益项目</a>  <span>&gt;</span> <a href="javascript:;">中科筑梦行动</a>
        </div>


        <div class="content">


            <div class="artdetail">

				<h1>中科筑梦行动----科学家大讲堂项目</h1>

                <div class="dtitle mt0"><h2>简介</h2></div>

                <div class="newscon mt20">

                    <p>中科筑梦行动——科学家大讲堂项目：是由中国科学院、国家部委、高等院校院士、专家、科研人员走进中小学校园、走进贫困地区的中小学课堂 ，向广大青少年宣讲普及科学知识的一项主题活动。每个专题讲座都涉及到数学、物理、化学、天文、地理、生物、电子信息等多学科领域。大讲堂力求以通俗、充实、有趣的方式寓教于乐。筑梦行动旨在把中国科学院丰富的科普资源惠及更多的中小学、以及贫困地区的青少年，启迪激发青少年心中的科学梦想，建立并培养青少年的科学信仰，科学兴趣、科学素养，助力中国梦、科技梦的实现。</p>
                </div>


                <div class="dtitle mt20"><h2>筹款途径</h2></div>

                <div class="newscon mt20">
                    <p>一、通过社会关爱公益事业、关爱国家科学事业、关爱青少年成长、关爱国家未来人才培养的企业、社会机构、知名人士等群体的定向募集获得筑梦行动的原始基金；</p>
                    <p>二、通过贫困地区周边发达区域内的关注教育的热心机构及个人获得部分善款；</p>
                    <p>三、通过筑梦行动的宣传，循环滚动，获得更多公益人士对该项目的认同，从而使该项目的资金得到充盈。</p>
                </div>

                <div class="dtitle mt20"><h2>系列活动</h2></div>

                <div class="threepic mt20">
                	<ul>
                    	<li><img src="__HTML__/images/u63.png"><span>袁亚湘院士</span></li>
                        <li><img src="__HTML__/images/u65.png"><span>严加安院士</span></li>
                        <li><img src="__HTML__/images/u67.png"><span>武向平院士</span></li>
                    </ul>
                </div>

                <div class="dtitle mt20"><h2>申请科学家公益讲堂</h2></div>

                    <div class="newscon mt20">
                        <h3>申请提示：</h3>
                        <p>一、关于本表：本表是双方安排讲课的依据。</p>
                        <p>二、行程变动：邀请方或受邀请方若有行程变动，需及时与对方进行沟通，协商解决。</p>
                        <p>三、演讲场地： 讲课场地需有多媒体设备。最好安排在中小型阶梯教室，不宜用操场、体育馆等大型场所。</p>
                        <p>四、听众组织：相同年龄段或相近知识水平听众集中听讲效果较好，避免中、小学生同堂听讲。</p>
                        <p>五、交通食宿：北京地区学校(单位)需派车接送演讲专家。如果派车有困难，建议使用网络约车接送服务。如果需要使用出租车，请报销出租车费，并请准确告知演讲专家讲课地址，方便告知出租车司机使用导航设备寻找目的地。</p>
                    </div>

                <div class="centbox mt20">
                    <a href="{:U('Gongyi/pubLession')}" class="centmore" >点击申请</a>
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

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关领域专家</h2>
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



<script type="text/javascript">
</script>

<include file="Index:footer" />
