<include file="header" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Index/zhichengfuwuxiangmu')}">支撑服务项目</a> <span>&gt;</span> <a href="{:U('Index/jiaoxuejiaoju')}">教学教具</a> <span>&gt;</span> <a href="#">中科教box</a>
        </div>


        <div class="content">


            <div class="artdetail">

                <div class="expert">
                    <img src="__HTML__/images/zkj_box.jpg">
                    <div class="expdesc">
                        <p>名称 : 中科教box</p>
                        <p>售价 : ￥1280</p>
                        <p>简介 :<br /> &emsp;&emsp; 天地大冲撞给地球造成灾难，但是，冲撞也改变着地球的发展进程：正是冲撞，促使地核改变着地球的发展进程：正是冲撞，促使地核与地幔的形成，使地球浴火新生；也是冲撞，推动了地球发电机，</p>
                    </div>
                    <a href="#">购买</a>
                </div>


                <div class="dtitle"><h2>课程介绍</h2></div>

                <div class="lecture_jxjj">
                    <ul>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                        <li>
                            <div class="jxjj_xq">
                                <img src="__HTML__/images/btbhs.jpg" >
                                <p>白糖变黑蛇</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="actrbox">

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