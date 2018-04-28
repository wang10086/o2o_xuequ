<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Education/education')}">科学教育专题</a> <span>&gt;</span> <a href="#">中国科学院科学教育联盟“紫金山论坛”在宁召开</a>
        </div>


        <div class="content">


            <div class="artdetail_gy">

                <h1>中国科学院科学教育联盟“紫金山论坛”在宁召开</h1>

                <img src="__HTML__/images/zjs_luntan1.png">
                <div class="newscon mt20" style="font-size: 16px;">
                    <p>&emsp;&emsp;“科教融合:贯通科技创新人才成长通道——紫金山论坛”于2017年11月25日在江苏省中国科学院植物研究所南京中山植物园召开。来自全国各省级市级科技示范校校长约200余人参加了此次论坛。</p>
                    <p>&emsp;&emsp;中国科学院南京分院科技服务与成果转化处副处长阮孜伟在致辞中表示，南京分院非常重视与中小学校的紧密合作，源源不断地把科学院高端资源科普化成果输送到学校当中，取得了很多好成绩，今后在科教联盟的平台上，南京分院将进一步梳理整合资源，期待全国各地的中小学校来到南京分院及研究院所交流。</p>
                    <p>&emsp;&emsp;国际亚欧科学院院士、国家教育咨询委员会委员郭传杰在题为《新技术革命与基础教育创新》的主旨报告中提出，促进基础教育创新旨在变革教育理念，学校要将“培养有知识的人”的教育理念升级为“培育有创新能力的人”，努力培养学生批判性、创造性的思维能力。</p>
                    <p>&emsp;&emsp;中国科学院大学副校长杨国强从三个方面对中国科学院大学科教融合工作进行了介绍，指出中国科学院大学将进一步深化科教融合，强化优势补齐短板，致力于培养未来中国科学界的领军人才。</p>
                    <p>&emsp;&emsp;“紫金山论坛”是中国科学院科学教育联盟在京外组织的第一次大型论坛活动，通过推动高端科研资源科普化成果与教育的有效结合，依托中国科学院内外资源，积极探索社会化、市场化服务机制，促进中国科学院科普事业可持续发展，服务国家创新后备人才培养，助力公众科学素养提升。未来科教联盟将进一步贴近中小学校需求，协助中小学校制定科教融合发展规划，与中小学校科学教育活动课程相结合，助力学生科技特长培养。</p>
                    <p>&emsp;&emsp;本次论坛是由北京市海淀区中科科学文化传播发展中心承办。</p>
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


<script type="text/javascript">
</script>

<include file="Index:footer" />
