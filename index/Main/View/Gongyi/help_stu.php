<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Gongyi/gongyi')}">科教公益项目</a>  <span>&gt;</span> <a href="javascript:;">中科助学营</a>
        </div>


        <div class="content">


            <div class="artdetail">

				<h1>中科助学营----科学家直援行动项目</h1>
                
                <div class="dtitle mt0"><h2>简介</h2></div>

                <div class="newscon mt20">
                    
                    <p>特色：中科助学营----科学家直援行动项目受“求真科学营”启发，希望通过中国科学院众多的从事科学研究人员（家长）的家庭，一对一的帮扶贫困地区的家庭（含孩子）。家长携带孩子参加中科助学营的过程中，一方面可以给贫困的孩子物质、精神上的帮助，另一方面也给自己的孩子树立了慈善助人的榜样。</p>
                    <p>形式：家庭一对一帮扶。一个中科院科研人员家庭对贫困地区贫困家庭。让城里的孩子体验山村孩子的点滴生活，让山里的孩子了解现代科学及学习方法。</p>
                    <p>影响：关注贫困家庭，资助贫困学生，普及科学知识，将社会的正能量传承至下一代。</p>
                </div>


                <div class="dtitle mt20"><h2>筹款途径</h2></div>

                <div class="newscon mt20">
                    <p>1.助学营的营费本身就是一项善款，他增进了捐赠者对捐助对象的了解，使捐助行为更加精准，而且更带有一份浓浓的情感意义。</p>
                    <p>2.由资助家庭认领贫困孩子每年定期缴纳的助学款；由基金会资助相关学校的教育设施等。</p>
                    <p>3.3.通过项目的实施宣传，影响更多的爱心人士，使该项目资金可以良性循环。</p>
                </div>
                
                <div class="dtitle mt20"><h2>系列活动</h2></div>
				
                <div class="threepic mt20">
                	<ul>
                    	<li><img src="__HTML__/images/help_stu.png"><span></span></li>
                    </ul>
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
