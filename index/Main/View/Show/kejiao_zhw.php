<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Show/kejiao_show')}">科教活动展示</a> <span>&gt;</span> <a href="#">新学期“植物的演化系列课程”雨花外小花神庙分校成功开课</a>
        </div>


        <div class="content">
            <div class="actlbox">
                <h1>新学期“植物的演化系列课程”雨花外小花神庙分校成功开课</h1>
                <div class="newscon">
                    <p>《植物的演化》系列科学课程是中心针对小学生设计的植物学科学课程。该课程主要内容从自然植物认知知识着手，分章节系统学习自然世界中植物从低等到高等、从简单到复杂，不断地变化的演化过程，继而学习植物与环境、植物本身对于地球和人类的重要性。在该系列课程的学习中，学生们在学习知识的同时可以参加探究性的课题活动，从而可以让他们更好的认识世界和理解世界。</p>
                    <p>本系列课程理论与实践相结合，培养学生独立思考的创新精神，并且通过系统学习和互动体验，将知识点和趣味性巧妙结合起来，完成课程内的相关科学任务。新型课程形式，把传统以教师为主的课堂转变为以学生为中心，调动学生的学习热情，寓教于乐，培养学生观察能力、解决问题的能力以及团队协作能力。</p>
                    <p>新学期的趣味植物课程共分18节，每周一节，由知识课程与实践体验环节相结合。</p>
                    <p>通过专业老师亲自授课，将植物演化的科学知识融入到新奇有趣的课堂中，让孩子们在有趣的科学课中激发兴趣、收获知识，学会正确地认知科学、了解科学、并且热爱科学，从而培养他们独特的创新能力与优秀的科学精神。</p>
                </div>
                <div class="morepic">
                    <img src="__HTML__/images/zhw1.png">
                    <img src="__HTML__/images/zhw2.png">
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
