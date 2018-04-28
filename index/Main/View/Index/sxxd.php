<include file="header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Index/education')}">科学教育专题</a> <span>&gt;</span> <a href="#">中国科学院“率先行动”成果展</a>
        </div>


        <div class="content">


            <div class="artdetail_gy">

                <h1>中国科学院“率先行动”成果展</h1>

                <img  style=""  src="__HTML__/images/sxxd.png">
                <div class="newscon mt20">
                    <p>“率先行动”成果展是中科院按照中央关于“砥砺奋进的五年”主题宣传活动的重大部署，展示中科院“十八大”以来取得的创新成就，迎接党的“十九大”胜利召开的重要举措。此次成果展按照中科院新时期办院方针“三个面向”“四个率先”布局，遴选中科院在面向世界科技前沿、面向国家重大需求、面向国民经济主战场，率先实现科学技术跨越发展、率先建成国家创新人才高地、率先建成国家高水平科技智库、率先建设国际一流科研机构方面所取得的代表性成果，按照“用中国科学院技术展示中国科学院成果”的创新思路，综合利用各种先进展示科普手段和展示方式，向公众有效传播前沿科学知识和科学思想，增强全院乃至全国科技界创新跨越的信心和勇气，激发全社会的创新创业活力。</p>
                </div>
                <!--<div class="nr" >
                    <img src="__HTML__/images/sxxd.png">
                    <p>“率先行动”成果展是中科院按照中央关于“砥砺奋进的五年”主题宣传活动的重大部署，展示中科院“十八大”以来取得的创新成就，迎接党的“十九大”胜利召开的重要举措。此次成果展按照中科院新时期办院方针“三个面向”“四个率先”布局，遴选中科院在面向世界科技前沿、面向国家重大需求、面向国民经济主战场，率先实现科学技术跨越发展、率先建成国家创新人才高地、率先建成国家高水平科技智库、率先建设国际一流科研机构方面所取得的代表性成果，按照“用中国科学院技术展示中国科学院成果”的创新思路，综合利用各种先进展示科普手段和展示方式，向公众有效传播前沿科学知识和科学思想，增强全院乃至全国科技界创新跨越的信心和勇气，激发全社会的创新创业活力。</p>
                </div>-->
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

<include file="footer" />
