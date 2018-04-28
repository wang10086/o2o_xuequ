<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Show/kejiao_show')}">科教活动展示</a> <span>&gt;</span> <a href="#">科普教育“席卷”金陵城，多所学校同时开课</a>
        </div>


        <div class="content">
            <div class="actlbox">
                <h1>科普教育“席卷”金陵城，多所学校同时开课</h1>
                <div class="newscon">
                    <p>根据教育部修订的《义务教育小学科学课程标准》，从今年秋季开学起，小学科学课被列为与语文、数学同等重要的“基础性课程”，起始年级延伸到小学一年级。</p>
                    <p>而今日，金陵城内多所学校携手中国科学院行政管理局下属单位中科科学文化传播发展中心，开设科学活动系列课程，其中，雨花外国语小学花神庙分校校本进阶课程、晓庄学院附属小学，成贤街小学就走在科普教育前沿之列。</p>
                    <p>科学活动课程是以学生对科学活动的兴趣和动机为中心组织的课程。中科科学文化传播发展中心基于多年从事中小学校科学实践教育经验，针对不同学龄孩子的特点，结合学校或机构特色，分别为它们打造专属科学系列课程。</p>
                    <p>为雨花外小打造《植物的演化》系列科学进阶课程是中心针对小学生设计的植物学科学课程。该课程主要内容从自然植物认知知识着手，分章节系统学习自然世界中植物从低等到高等、从简单到复杂，不断地变化的演化过程，继而学习植物与环境、植物本身对于地球和人类的重要性。在该系列课程的学习中，学生们在学习知识的同时可以参加探究性的课题活动，从而可以让他们更好的认识世界和理解世界。</p>
                    <p>为晓庄附小一二年级孩子打造《生命科学之植物学系列课程》之蔬菜总动员，该课程将引导学生认识南京当季的农作物，能够观察、描述常见农作物的基本特征和种植方式，同时为学生提供一个近距离接触当季农作物的机会和平台，每一个与农作物相关的知识点都可以引出一个有趣的探究活动，并在探究活动中激发学生们的好奇心和求知欲，培养学生的动手能力和探究思维。</p>
                    <p>成贤街小学《植物的世界课程》试点，学生们响应积极，后续将普遍推广。该课程将系统的植物学知识传授给学生，为学生提供一个近距离接触植物世界的机会和平台，每一个与植物相关的知识点都可以引出一个有趣的探究实验，并在探究实验中激发学生们的好奇心和求知欲，培养一种科学的思维方式。</p>
                    <p>中科科学文化传播发展中心作为中国科学院科学教育联盟执行单位，基于多年从事中小学校科学实践教育经验，进一步整合中科院科研资源，围绕课后一小时、社会科学实践、小课题等成果，以科学探索和动手实践为主要方式，激发以青少年为主体受众的科学兴趣，支撑学校科技教育，助力学生科技特长培养。</p>
                    <p></p>
                </div>
                <div class="morepic">
                    <img src="__HTML__/images/jl_1.png">
                    <img src="__HTML__/images/jl_2.png">
                    <img src="__HTML__/images/jl_3.png">
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
