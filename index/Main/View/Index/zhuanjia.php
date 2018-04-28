<include file="header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="#">科学教育专题</a> <span>&gt;</span> <a href="#">中国科学院老科学家科普演讲团专题</a> <span>&gt;</span> <a href="#">{$info.title}</a>
        </div>


        <div class="content">


            <div class="artdetail">

                <div class="dtitle mt20"><h2>专家简介</h2></div>

                <div class="expert">
                    <img src="/{$info.pic}">
                    <div class="expdesc">
                        <h2>{$info.title}</h2>
                        <p>{$info.keywords}</p>
                        <p>{$info.content}</p>
                    </div>
                </div>


                <div class="dtitle"><h2>相关讲座</h2></div>

                <div class="lecture">
                    <ul>
                        <foreach name="data" item="vo">
                            <li>
                                <input type="hidden" name="id" value="{$vo.id}">
                                <h3><a href="#">{$vo.title}</a></h3>
                                <div class="nr">
                                    <!--<img src="/{$vo.pic}">-->
                                    <p>{$vo.content}</p>
                                </div>
                                <div class="tagboosk">
                                    <div class="tags">
                                        <a href="javascript:void(0);"><span>{$vo.editor}</span></a>
                                        <a href="javascript:void(0);"><span>{$vo.source}</span></a>
                                    </div>
                                    <a href="{:U('Index/yuyue_jiangzuo',array('id'=>$vo['id']))}" class="more">马上预约</a>
                                </div>
                            </li>
                        </foreach>
                    </ul>

                </div>
                <!--<div class="tagboosk">
                                    <foreach name="zhuanjia" item="v">
                                    <div class="tags">
                                        <a href="javascript:void(0);"><span>{$v.tag}</span></a>
                                        <a href="javascript:void(0);"><span>{$v.fields}</span></a>
                                    </div>
                                    </foreach>
                                    <a href="#" class="more">马上预约</a>
                                </div>-->

            </div>


            <div class="actrbox">

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关领域专家</h2>
                    </div>
                    <div class=" exphot">
                        <ul>
                            <foreach name="zhuanjia" item="vo">
                                <li><img src="/{$vo.pic}"><p>{$vo.title}</p></li>
                            </foreach>
                        </ul>
                    </div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关领域活动</h2>
                    </div>
                    <div class="cont"></div>
                </div>


            </div>


        </div>

    </div>
</div>


<script type="text/javascript">
</script>


<include file="footer" />