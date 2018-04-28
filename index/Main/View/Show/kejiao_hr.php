<include file="Index:header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Show/kejiao_show')}">科教活动展示</a> <span>&gt;</span> <a href="#">“博观而约取 厚积而薄发”怀柔一中科教融合规划会召开</a>
        </div>


        <div class="content">
            <div class="actlbox">
                <h1>“博观而约取 厚积而薄发”怀柔一中科教融合规划会召开</h1>
                <div class="newscon">
                    <p>为响应国家科技创新战略，实现科学城在北京建设全国科技创新中心的战略性目标，依托中科院资源，打造世界级原始创新承载区。在怀柔区教委和各级政府的大力支持下，积极贯彻落实创新人才培养和综合素质教育的相关要求，打造怀柔一中科技创新人才培养特色校。2017年8月20日上午九时，中国科学院行政管理局下属中科科学文化传播发展中心（以下简称中心）与北京市怀柔第一中学召开了科教融合规划会，进一步打造怀柔一中科技创新人才培养特色校。</p>
                    <p>本次会议得到校领导的高度重视，彭玉良校长以及德育校长彭兴华、科技主任宋旭和相关课题负责老师分别出席了会议。会上中心项目主管石曼老师就中国科学院科教资源、中国科学院行政管理局科学文化传播板块工作以及中科科学文化传播发展中心发展历程做了简述。与此同时就此次合作项目的项目背景和指导思想做了深度的剖析，分析了怀柔一中的资源优势，对学校创新人才培养模式提供了新的解决方案。</p>
                    <p>中国科学院动物所陈睿博士作为生物领域课程顾问，对于高考课程改革背景下如何指导学生完成相关领域课题研究做了阐述。</p>
                    <p>同时中心副主任王凯在会上表示，此次合作将成为我中心与怀柔一中合作的伊始，也是双方共同促进共同学习的重要契机，中心将紧紧依托中科院资源将科教融合深入校园，力求提升怀柔一中整体科教实力。</p>
                    <p>会后，在怀柔一中宋主任的带领下，我中心人员与专家一起参观了怀柔一中水科学实验室、水工程实验室、水环境实验室、组培室，以及种植园，从而进一步了解了怀柔一中的创新人才培养资源优势。</p>
                    <p>此次会议通过了北京市怀柔区第一中学科技教育规划方案，同时在创新人才培养模式上达成了一致。会后双方将就进一步纵深合作进行深入的探讨，积极响应国家创新人才培养和素质教育的要求，贯彻落实国家及北京市中长期教育改革和发展规划纲要、《北京市“十三五”时期教育发展规划》。</p>
                    <p>中科科学文化传播发展中心将本着以人为本的理念，利用整合科普及科技教育资源，策划出多种多样的贴近学生需求的科普活动及科学教育课程，为全国各学校、教委、以及社会教育机构提供长足动力。</p>
                </div>
                <div class="morepic">
                    <img src="__HTML__/images/hr1.png">
                    <img src="__HTML__/images/hr3.png">
                    <img src="__HTML__/images/hr4.png">
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
