<include file="header" />

<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="#">支撑服务项目</a>
        </div>

        <div class="content mt20">
            <div class="menu">
                <h2>支撑服务项目</h2>
                <foreach name="dataA" item="vo">
                    <div class="unit">
                        <a href="{:U($vo['controller'].'/'.$vo['action'])}"><h3>{$vo.title}</h3></a>
                        <div class="morebox">
                            <ul>
                                <foreach name ='dataB' item="v">
                                    <if condition="$v['pid'] eq $vo['id']">
                                        <li><a href="{:U($v['controller'].'/'.$v['action'])}">{$v.title}</a></li>
                                    </if>
                                </foreach>
                            </ul>
                        </div>
                    </div>
                </foreach>
            </div>

            <div class="prolist">
                <form action="{:U('Index/zhichengfuwuxiangmu')}">
                    <div class="jiansuo">
                        <span>科教领域：</span>
                        <select name="fields">
                            <option value="{$info.fields}">{$info.fields}</option>
                            <option value="数学与信息">数学与信息</option>
                            <option value="物理与工程">物理与工程</option>
                            <option value="生命科学">生命科学</option>
                            <option value="地球与空间物理">地球与空间物理</option>
                            <option value="化学与材料">化学与材料</option>
                            <option value="能源与环境">能源与环境</option>
                            <option value="历史">历史</option>
                            <option value="人文">人文</option>
                            <option value="其他">其他</option>
                        </select>
                        &nbsp;
                        <span>实施省市：</span>
                        <select name="ss_city">
                            <option value="{$info.city}">{$info.city}</option>
                            <option value="北京">北京</option>
                            <option value="天津">天津</option>
                            <option value="上海">上海</option>
                            <option value="重庆">重庆</option>
                            <option value="辽宁">辽宁</option>
                            <option value="吉林">吉林</option>
                            <option value="黑龙江">黑龙江</option>
                            <option value="河北">河北</option>
                            <option value="山西">山西</option>
                            <option value="陕西">陕西</option>
                            <option value="山东">山东</option>
                            <option value="安徽">安徽</option>
                            <option value="江苏">江苏</option>
                            <option value="浙江">浙江</option>
                            <option value="河南">河南</option>
                            <option value="湖北">湖北</option>
                            <option value="湖南">湖南</option>
                            <option value="江西">江西</option>
                            <option value="台湾">台湾</option>
                            <option value="福建">福建</option>
                            <option value="云南">云南</option>
                            <option value="海南">海南</option>
                            <option value="四川">四川</option>
                            <option value="贵州">贵州</option>
                            <option value="广东">广东</option>
                            <option value="甘肃">甘肃</option>
                            <option value="青海 ">青海 </option>
                            <option value="西藏">西藏</option>
                            <option value="新疆">新疆</option>
                            <option value="广西">广西</option>
                            <option value="内蒙古">内蒙古</option>
                            <option value="宁夏 ">宁夏 </option>
                        </select>
                        &nbsp;
                        <span>适合人群：</span>
                        <select name="fit">
                            <option value="{$info.fit}">{$info.fit}</option>
                            <option value="幼儿园">幼儿园</option>
                            <option value="小学低年级">小学低年级</option>
                            <option value="小学高年级">小学高年级</option>
                            <option value="初中">初中</option>
                            <option value="高中">高中</option>
                            <option value="学校教师">学校教师</option>
                            <option value="其他">其他</option>
                        </select>
                        &nbsp;
                        <span>是否公益：</span>
                        <select name="tag">
                            <option value="{$info.tag}">{$info.tag}</option>
                            <option value="公益">公益</option>
                            <option value="非公益">非公益</option>
                        </select>
                        &nbsp;
                        <span>活动时长：</span>
                        <select name="days">
                            <option value="{$info.days}">{$info.days}</option>
                            <option value="半天">半天</option>
                            <option value="一天">一天</option>
                            <option value="1-3天">1-3天</option>
                            <option value="3-5天">3-5天</option>
                            <option value="5-10天">5-10天</option>
                            <option value="一学期">一学期</option>
                            <option value="一学年">一学年</option>
                            <option value="长期">长期</option>
                        </select>
                        &nbsp;
                        <input name="title" type="text" class="inputtext" value="{$info.title}" placeholder="请输入专家名字">
                        <button id="button">GO</button>
                    </div>
                </form>
                <div class="plist_zcfwxm">
                    <ul>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                        <li>
                            <div><img src="/{$vo.pic}"></div>
                            <div class="title">{$vo.title}</div>
                            <div>
                                <p>科教领域 : {$vo.fields}</p>
                                <p>实施省市 : {$vo.ss_city}</p>
                                <p>适合人群 : {$vo.fit}</p>
                                <p class="keywords">职务/职级 : {$vo.keywords}</p>
                                <!--<div><a href="{:U('Index/zhuanjia',array('title'=>$vo['title']))}" class="more">了解详情</a></div>-->
                                <div><a href="{:U('Index/yanxue',array('title'=>$vo['title']))}" class="more">了解详情</a></div>
                            </div>
                        </li>
                    </ul>

                    <div class="page M-box">
                        <!--<a href="#" class="ll">上一页</a>
                        <a href="#" class="on">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#" class="rr">下一页</a>-->
                        {$page}
                    </div>

                </div>



                <div class="prorbox">
                    <div class="unrel">
                        <div class="reltit">
                            <h2>热门资源</h2>
                        </div>
                        <div class="cont"></div>
                    </div>

                    <div class="unrel mt20">
                        <div class="reltit">
                            <h2>热门活动</h2>
                        </div>
                        <div class="cont"></div>
                    </div>

                    <div class="unrel mt20">
                        <div class="reltit">
                            <h2>热门专家</h2>
                        </div>
                        <div class="cont"></div>
                    </div>
                </div>

            </div>



        </div>


    </div>
</div>

<script>
    /*$("#button").on("click",function(){
     alert("AAA");
     var fields = $("select[name='fields']").val();
     var city = $("select[name='city']").val();
     var fit = $("select[name='fit']").val();
     var tag = $("select[name='tag']").val();
     var days = $("select[name='days']").val();
     var title = $("input[name='title']").val();
     alert("ASAS");
     /!*$.post(
     "{:U('Index/zhichengfuwuxiangmu')}",
     {'fields':fields,'city':city,'fit':fit,'tag':tag,'days':days,'title':title},
     'dataType':'json',
     'success':function(msg){
     alert(msg);
     });*!/
     })*/
</script>
<!--<script>
    $('.M-box').pagination({
        coping:false,
        homePage:'首页',
        endPage:'末页',
        prevContent:'上页',
        nextContent:'下页'
    });

</script>-->
<include file="footer" />
