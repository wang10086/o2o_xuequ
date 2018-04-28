
<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置： <a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="javascript:;">申请支撑服务校名录</a>
        </div>
        <div class="content">


            <div class="artdetail">

                <div class="dtitle"><h2>支撑服务校名录&nbsp;(27所)</h2></div>

                <div class="booklist">
                    <div class="pro_names">
                        <div class="pro_cname">
                            <h2>北京市(9所)</h2>
                            <ul class="school">
                            	<li>中关村第一小学</li>
                                <li>中关村第二小学</li>
                                <li>中关村第三小学</li>
                                <li>中关村第四小学</li>
                                <li>中国科学院附属实验学校</li>
                                <li>北京中科启元学校</li>
                                <li>中关村中学(中国科学院中关村学校)</li>
                                <li>中国科学院附属玉泉小学</li>
                                <li>海淀区枫丹实验小学</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>江苏省(4所)</h2>
                            <ul class="school">
                            	<li>南京市成贤街小学</li>
                                <li>南京市芳草园小学</li>
                                <li>江苏省苏州第十中学</li>
                                <li>南京市雨花外国语小学花神庙分校</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>浙江省(2所)</h2>
                            <ul class="school">
                            	<li>宁波科学中学</li>
                                <li>宁波市同济中学</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>辽宁省(4所)</h2>
                            <ul class="school">
                            	<li>东北育才学校超常教育实验部</li>
                                <li>沈师附属学校</li>
                                <li>辽宁省滨海实验中学</li>
                                <li>通辽第五中学</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>广西省壮族自治区(1所)</h2>
                            <ul class="school">
                            	<li>钦州市外国语学校</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>安徽省(3所)</h2>
                            <ul class="school">
                            	<li>合肥市朝霞小学</li>
                                <li>安徽省芜湖市第一中学</li>
                                <li>中国科学技术大学附属中学</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>四川省(1所)</h2>
                            <ul class="school">
                            	<li>绵阳中学英才学校</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>江西省(2所)</h2>
                            <ul class="school">
                            	<li>南昌市洪都小学</li>
                                <li>上饶市第一中学</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>河北省(1所)</h2>
                            <ul class="school">
                            	<li>石家庄市第九中学</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>山东省(6所)</h2>
                            <ul class="school">
                            	<li>莒县第三中学</li>
                                <li>山东省莱芜市第一中学</li>
                                <li>山大华特卧龙学校</li>
                                <li>山东师范大学附属小学</li>
                                <li>山东省泰安英雄山中学</li>
                                <li>山东师范大学附属中学</li>
                            </ul>
                        </div>
                        <div class="pro_cname">
                            <h2>湖北省(2所)</h2>
                            <ul class="school">
                            	<li>湖北省当阳市第二高级中学</li>
                                <li>湖北省文理学院附属中学</li>
                            </ul>
                        </div>
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


<include file="Index:footer" />