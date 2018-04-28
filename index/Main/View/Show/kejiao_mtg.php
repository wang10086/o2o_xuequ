<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Show/kejiao_show')}">科教活动展示</a> <span>&gt;</span> <a href="#">门头沟教师活动——走进中科院植物所</a>
        </div>


        <div class="content">
            <div class="actlbox">
                <h1>门头沟教师活动——走进中科院植物所，走进北京植物园</h1>
                <div class="newscon">
                    <p>为促进门头沟区教师专业水平提升，门头沟区生物名师工作室教师在中科科学文化传播发展中心的组织下，来到了中国科学院植物研究所北京植物园进行教师活动。</p>
                    <p>教师们率先聆听了植物所研究员王雷题为《植物生物钟系统与昼夜节律的调控》的讲座。王老师生动的讲解使老师们了解了专题研究成果和未来的发展前沿动态，为教师们的课堂教学提供了宝贵资料。</p>
                    <p>随后老师们走进园区在刘永刚老师的讲解下，了解植物分类学，学习和比较植物特征，为实地课外教学提供创新思路。</p>
                    <p>本次活动的重点是参观中国科学院北方资源植物重点实验室。该实验室以我国北方植物资源作为主要研究对象，是院级重点实验室。老师们在研究员的带领下，仔细了解了资源植物品质检测平台，并观看了如何利用气相色谱分析和液相色谱分析对植物的功能目标化合物进行提取和分析的实验。</p>
                    <p>此次活动在老师们的配合下顺利完成，不仅提升了教师的专业素养，拓展了教师的视野，同时为课堂教学改革的深入开展提供了新的思路。</p>
                    <p>中科科学文化传播发展中心作为中国科学院科学教育联盟执行单位，基于多年从事中小学校科学实践教育经验，进一步整合中科院科研资源，围绕课后一小时、社会科学实践、小课题等成果，以科学探索和动手实践为主要方式，激发以青少年为主体受众的科学兴趣，支撑学校科技教育，助力学生科技特长培养。</p>
                </div>
                <div class="morepic">
                    <img src="__HTML__/images/u162.png">
                    <img src="__HTML__/images/u166.png">
                    <img src="__HTML__/images/u168.png">
                </div>
            </div>

            <div class="actrbox">

                <!--<div class="unrel mt20">
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
                </div>-->

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
