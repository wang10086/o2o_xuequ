
<include file="Index:header_boot" />


<div class="unbox">
    <div class="content">

        <div class="crumbs">
您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="javascript:;">个人中心</a>
        </div>


        <div class="content">


            <div class="artdetail">


                <div class="ptitle mt20"><span><h3>课程动态</h3></span></div>
                <div class="border_line">
                    <div class="row content_t">
                        <div class="col-xs-12 col-sm-6 col-md-8 title_p">我的信息</div>
                        <div class="col-xs-6 col-md-4 title_p">状态</div>
                    </div>
                    <foreach name="data" item="v">
                        <div class="row content_t">
                            <div class="col-xs-12 col-sm-6 col-md-8 content_l">
                                <img src="{:thumb($v['pic'],80,100)}" alt="">
                                <p>{$v.article_title}</p><br />
                                <span>预约时间 : {$v.in_day|date='Y-m-d',###}</span>
                            </div>
                            <div class="col-xs-6 col-md-4 content_r">预约中</div>
                        </div>
                    </foreach>

                </div>

                <div class="ptitle mt20"><span><h3>服务校申请动态</h3></span></div>
                <div class="row content_t">
                    <div class="col-xs-12 col-sm-6 col-md-8 title_p">我的申请信息</div>
                    <div class="col-xs-6 col-md-4 title_p">状态</div>
                </div>
                <foreach name="info" item="vo">
                    <div class="row content_tfwx">
                        <div class="col-xs-12 col-sm-6 col-md-8 content_lfwx">
                            <p>{$vo.school_name}</p><br />
                            <span>预约时间 : {$vo.apply_time|date='Y-m-d H:i:s',###}</span>
                        </div>
                        <div class="col-xs-6 col-md-4 content_rfwx">{$vo.status}</div>
                    </div>
                </foreach>
            </div>


            <div class="actrbox">

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关资源</h2>
                    </div>
                    <div class="cont"></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关活动</h2>
                    </div>
                    <div class="cont"></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>相关专家</h2>
                    </div>
                    <div class="cont"></div>
                </div>

            </div>


        </div>

    </div>
</div>



<script type="text/javascript">
</script>



<include file="Index:footer" />
