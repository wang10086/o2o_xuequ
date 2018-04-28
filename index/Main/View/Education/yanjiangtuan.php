<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Education/education')}">科学教育专题</a> <span>&gt;</span> <a href="#">中国科学院老科学家科普演讲团</a>
        </div>


        <div class="content">


            <div class="artdetail">

                <h1>中国科学院老科学家科普演讲团</h1>

                <div class="dtitle"><h2>简介</h2></div>

                <div class="newscon mt20">
                    <p>中国科学院老科学家科普演讲团成立于1997年，主要由中国科学院退休研究员组成，也有高等院校、解放军以及国家各部委的专家、教授参加，还吸收了一些热心科普事业的优秀中青年学者。演讲团以弘扬科学精神、倡导科学思想、传播科技知识为己任，演讲内容涵盖现代科学技术的主要领域。</p>
                    <p>演讲团成立20年来，受到了中国科学院、中国科协、北京市和各地政府部门、科协组织以及民间团体的亲切关怀和热心支持，足迹遍及全国各省、直辖市、自治区的1500多个市、县，演讲18000多场，听众超过680万人，其中有大、中、小学学生和教师，有各级领导干部，有部队官兵，有政府公务员和社区居民。演讲团团员本着认真负责、严谨务实的精神，力求使每一场演讲富有知识性、科学性和趣味性，引发和培养听众热爱科学、亲近科学的兴趣，使听众在轻松、和谐、愉快的氛围中，真切地体会到“科学就是力量”、“科技就在身边”。</p>
                    <p>演讲团的劳动受到社会各界广泛关注和高度评价。2002年，时任副总理的李岚清同志亲切接见了演讲团领导和代表，2003年演讲团被评为全国科普先进集体，2007年荣获全国科普教学银杏奖，2011年被评为首都市民热爱的品牌科普团。</p>
                    <p>科技创新和科学普及是实现创新发展的两翼，演讲团任重道远。我们期待与社会各界建立更多、更密切的联系，我们将以热情、认真、严谨、高质量的工作回报社会的厚爱。</p>
                </div>
                <div class="morepic">
                    <div>
                        <img src="__HTML__/images/yjt_1.jpg">
                        <p>演讲团成员合影</p>
                    </div>
                    <div>
                        <img src="__HTML__/images/yjt_2.jpg">
                        <p>李岚清同志接见老科学家科普演讲团</p>
                    </div>
                    <div>
                        <img src="__HTML__/images/yjt_4.jpg">
                        <p>陈贺能教授在课堂上与学生互动</p>
                    </div>
                </div>

                <div class="dtitle mt20"><h2>科普讲座</h2></div>

                <div class="jiangzuo mt20">
                    <img src="__HTML__/images/1151.jpg">
                </div>

                <div class="centbox mt20">
                    <!--<a href="{:U('Pro/index',array('kind' => 31))}" class="centmore">选择讲座</a>-->
                    <a href="{:U('Pro/index',array('kind' => 31))}" class="centmore_l">选择讲座</a>
                    <a href="{:U('Pro/agenda')}" class="centmore_r" target="_blank">专家日程安排</a>
                </div>

                <div class="dtitle mt20"><h2>相关动态</h2></div>

                <div class="morelist">
                    <ul>
                        <li class="hot">
                            <a href="#">
                                <img src="__HTML__/images/timg4.jpg">
                                <div>
                                    <p>热烈庆祝中国科学院老科学家</p><p>科普演讲团成立20周年</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mlist_title">
                    <ul>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年 </a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
                        <li>• <a href="#">热烈庆祝中国科学院老科学家科普演讲团成立20周年</a></li>
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
                        <h2>热门讲座</h2>
                    </div>
                    <div class="cont">
                        <ul>
                            <foreach name="data_y" item="v">
                                <li><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></li>
                            </foreach>
                        </ul>
                    </div>
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


                <!--<div class="unrel mt20">
                                    <div class="reltit">
                                        <h2>教师培训</h2>
                                    </div>
                                    <div class="cont">
                                        <ul>
                                                <li><a href="javascript:;">培训课程一</a></li>
                                                <li><a href="javascript:;">培训课程二</a></li>
                                                <li><a href="javascript:;">培训课程三</a></li>
                                                <li><a href="javascript:;">培训课程四</a></li>
                                                <li><a href="javascript:;">培训课程五</a></li>
                                        </ul>
                                    </div>
                                </div>-->

            </div>


        </div>

    </div>
</div>


<script type="text/javascript">
</script>

<include file="Index:footer" />
