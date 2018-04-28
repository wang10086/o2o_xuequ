<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Gongyi/gongyi')}">科教公益项目</a>  <span>&gt;</span> <a href="javascript:;">中科创客营</a>
        </div>


        <div class="content">


            <div class="artdetail">

                <h1>中科创客营----探索未来行动项目</h1>

                <div class="dtitle mt0"><h2>简介</h2></div>

                <div class="newscon mt20">

                    <p>创客运动会是国内中小学创客领域的奥林匹克盛会，旨在启迪参与者的创新精神，推动创客活动，提升青少年发现问题、分析问题、解决问题的综合能力。促进青少年学习知识、探索世界、创造未来、开拓视野。每年暑期，各地通过初赛复赛进入决赛的孩子就会集中于中国科学院大学参加万众瞩目的创客运动会决赛。</p>
                    <p>中科科教发展基金会通过创客运动会的形式，设立中科创客营----探索未来行动项目专项基金，资助无力来京参加比赛的孩子们在京比赛期间的所有费用。</p>
                </div>


                <div class="dtitle mt20"><h2>筹款途径</h2></div>

                <div class="newscon mt20">
                    <p>1.赛事举办方的捐款；</p>
                    <p>2.相关爱心人士的捐赠。</p>
                </div>

                <div class="dtitle mt20"><h2>系列活动</h2></div>

                <div class="threepic mt20">
                    <ul>
                        <li><img src="__HTML__/images/zk_cky.png"><span style="line-height: inherit;padding-top: 10px;">2017年创客运动会中国科学院大学怀柔校区现场</span></li>
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
