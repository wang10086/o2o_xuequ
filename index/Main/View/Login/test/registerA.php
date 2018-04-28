
<!DOCTYPE html>

<html>
<head>
    <meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" />
    <meta name="keywords" />
    <title>中科教科学教育平台 - 中国科学院科学教育联盟</title>
    <script type="text/javascript">
        var localrooturl = "";
    </script>
    <link href="__HTML__/css/bootstrap.css" rel="stylesheet" />
    <!-- 日历 fullcalendar  -->
    <link href='__HTML__/plus/calendar/fullcalendar.css' rel='stylesheet' />
    <link href='__HTML__/plus/calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <!-- 页面自定义样式  -->
    <link href="__HTML__/css/iconfont.css" rel="stylesheet" />
    <link href="__HTML__/css/main.css" rel="stylesheet" />
    <link href="__HTML__/Site.css" rel="stylesheet" />
</head>
<body>
<div class="NavBox">
    <div class="Nav-login">
        <a href="{:U('Login/index')}" target="_blank">登录</a><a class="register-link" href="{:U('Login/register')}" id="registerLink" target="_blank">免费注册</a>

        <div class="Nav-menu">
            <ul class="Nav-menu-box">
                <li class="">
                    <strong><a  href="/Member/Default">会员中心</a></strong>
                </li>
                <li class="">
                    <strong><a href="/">首页</a></strong>
                </li>

            </ul>
        </div>
    </div>
</div>





<div id="header">
    <div class="wrapper">
        <div class="search-form">
            <div class="search">
                <input name='ecmsfrom' type='hidden' value='0' />
                <input type="hidden" name="show" value="title,newstext" />
                <select name="searchselect" id="searchselect" class="easydropdown seachselect">
                    <option value="0">活动</option>
                    <option value="2">基地</option>
                    <option value="3">指导老师</option>
                </select>
                <input class="inp_srh" name="keyboard" id="keyboard" placeholder="请输入关键词" />
                <input class="btn_srh" type="submit" name="btnSubmit" id="btnSubmit" value="搜索" />

            </div>
        </div>
        <a href="{:U(Index/home)}" class="logo">
            <sup>中科教科学教育平台</sup>
        </a>


        <div class="city">
            <strong>北京</strong>
            <div class="city-trigger">
                <a href="/Home/ChangeCity">切换城市</a>
            </div>
        </div>
        <div class="helplink">
            <a href=""><img src="__HTML__/images/img-head-help1.jpg" /></a>
            <a href=""><img src="__HTML__/images/img-head-help2.jpg" /></a>
            <a href=""><img src="__HTML__/images/img-head-help3.jpg" /></a>
        </div>
    </div>
</div>










<!-- 内容 -->
<div class="main register-select">
    <div class="mainbg bg0">
        <div class="warpper">
            <!-- 主体内容 -->
            <div class="container">
                <!--  新闻-->
                <div class="full">
                    <div class="row">
                        <div class="col-xs-AA col-xs-offset-1 text-right selectbox">
                            <div class="regbox bgreg-1">
                                <a class="btn btn-lg btn-success" href="{:U('Login/stu_register')}" target="_blank">学员注册</a>
                            </div>
                        </div>
                        <div class="col-xs-AA selectbox">
                            <div class="regbox bgreg-2">
                                <a class="btn btn-lg btn-success" href="#" target="_blank">基地入驻</a>
                            </div>
                        </div>
                        <div class="col-xs-AA selectbox">
                            <div class="regbox bgreg-3">
                                <a tabindex="0" class="btn btn-lg btn-danger bs-docs-popover" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" title="" data-content="指导老师注册由基地添加，请联系您所参与的基地。" data-original-title="指导老师注册说明">指导老师注册</a>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row">
                        <div class="col-xs-5 col-xs-offset-1 text-right selectbox">
                            <div class="regbox bgreg-3">
                                <a tabindex="0" class="btn btn-lg btn-danger bs-docs-popover" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" title="" data-content="指导老师注册由基地添加，请联系您所参与的基地。" data-original-title="指导老师注册说明">指导老师注册</a>
                            </div>
                        </div>
                        <div class="col-xs-5 selectbox">
                            <div class="regbox bgreg-4">
                                <a tabindex="1" class="btn btn-lg btn-danger bs-docs-popover" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" title="" data-content=" 学校注册请联系运营商，电话：025-84293811" data-original-title="学校注册说明">学校注册</a>

                            </div>
                        </div>
                    </div>-->

                </div>
                <!--  /基地新闻列表 -->

            </div>
            <!-- /主体内容 -->
        </div>

    </div>
</div>



<!-- 底部 -->
<div id="footer" class="footer">
    <div class="wrapper">
        <!-- 流程 -->
        <div class="row footstep4">
            <div class="col-xs-3 footstep">
                <img src="__HTML__/images/ico-foot-step1.jpg">
                <h3>1.搜索活动</h3>
                <p>在种类丰富的活动中，你可以按照多种条件进行筛选（如课程、基地、指导老师等），找到心仪的活动。众多精彩纷呈的活动，总有一些适合你。</p>

            </div>
            <div class="col-xs-3 footstep">
                <img src="__HTML__/images/ico-foot-step2.jpg">
                <h3>2.预约参与</h3>
                <p>查看活动的详细信息，进行在线预约，可灵活选择上课时间、地点、指导老师，选择合适的活动并预付活动费用。如客观因素（天气等）不能正常开课，基地将帮你调课或退费。</p>
            </div>
            <div class="col-xs-3 footstep">
                <img src="__HTML__/images/ico-foot-step3.jpg">
                <h3>3.参与活动</h3>
                <p>请在约定的时间到基地进行上课，指导老师现场考勤，缺勤你将拿不到相应课程的课时，课后上传实践报告（如有要求）。</p>
            </div>
            <div class="col-xs-3 footstep">
                <img src="__HTML__/images/ico-foot-step4.jpg">
                <h3>4.活动评价</h3>
                <p>活动结束，学生对指导老师和课程进行评价，帮助指导老师发现其优势和不足，提高教学质量。为其他正在寻找活动、基地的学生或家长提供参考</p>
            </div>

        </div>

        <div class="row site-map">
            <ul>
                <li>
                    <a href="/Article/List" target="_blank">平台资讯</a>
                </li>
                <li>
                    <a href="/Help/introduction" target="_blank">平台简介</a>
                </li>
                <li>
                    <a href="/Help/about" target="_blank">关于我们</a>
                </li>
                <li>
                    <a href="/Help/clause" target="_blank">网站条款</a>
                </li>


            </ul>
        </div>
        <div class="copyright">
            Copyright © 2014 - 2016 .   &nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" href="#">a</a>
        </div>

        <!-- 底部链接结束 -->

    </div>
</div>

<!--[if lte IE 9]>
<script src="~__HTML__/js/respond.min.js"></script>
<script src="~__HTML__/js/html5shiv.js"></script>
<![endif]-->
<script src="__HTML__/js/jquery.min.js"></script>
<script src="__HTML__/js/bootstrap.min.js"></script>
<!-- 附加效果js -->
<script src="__HTML__/js/bootstrap-hover-dropdown.min.js"></script>
<script src="__HTML__/js/jquery.easydropdown.js"></script>
<!-- 首页导航插件 -->
<script src="__HTML__/plus/jquery.SuperSlide.2.1.1.js"></script>
<!-- 评星插件 -->
<script src="__HTML__/plus/stars/jquery.raty.min.js"></script>
<script type="text/javascript">
    var search_activity_url = "/Search/Activity";
    var search_base_url = "/Search/BaseList";
    var search_course_url = "/Search/Course";
    var search_coach_url = "/Search/Coach";
</script>
<script src="/Scripts/dqy/public.js"></script>



<!--JavaScript文件-->
<script src="/Scripts/jquery-1.10.2.min.js"></script>
<script src="/Scripts/bootstrap.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    })
</script>


</body>
</html>



