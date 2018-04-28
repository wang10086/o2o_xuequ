<include file="Index:header" />

<div class="unbox">
    <div class="content">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="#">高端科教资源</a>
        </div>

        <div class="content mt20">
            <div class="menu">
                <h2>高端科教资源</h2>
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
                <form action="{:U('Zhicheng/yanxue_list')}">
                <div class="jiansuo">
                    <span>科教领域：</span>
                    <select name="fields" value="{$info.fields}">
                        <option value="">请选择</option>
                        <option value="数学与信息">数学与信息</option>
                        <option value="物理与工程">物理与工程</option>
                        <option value="生命科学">生命科学</option>
                        <option value="地球与空间科学">地球与空间科学</option>
                        <option value="化学与材料">化学与材料</option>
                        <option value="能源与环境">能源与环境</option>
                        <option value="历史">历史</option>
                        <option value="人文">人文</option>
                        <option value="其他">其他</option>
                    </select>
                    &nbsp;
                    <span>所在省市：</span>
                    <select name="city" value="{$info.city}">
                        <option value="">请选择</option>
                        <option value="全国">全国</option>
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
                    <span>所属系统：</span>
                    <select name="system" value="{$info.system}">
                        <option value="">请选择</option>
                        <option value="中国科学院院内">中国科学院院内</option>
                        <option value="中国科学院院外">中国科学院院外</option>
                    </select>
                    &nbsp;
                    <span>支持项目：</span>
                    <select name="res_pro" value="{$info.res_pro}">
                        <option value="">请选择</option>
                        <option value="专家讲座">专家讲座</option>
                        <option value="研学旅行">研学旅行</option>
                        <option value="科学课程">科学课程</option>
                        <option value="探究式课题">探究式课题</option>
                        <option value="科技节">科技节</option>
                        <option value="科学博物园">科学博物园</option>
                        <option value="教学教具">教学教具</option>
                        <option value="展览展示">展览展示</option>
                        <option value="教师培训">教师培训</option>
                        <option value="学校定制">学校定制</option>
                    </select>
                    &nbsp;
                    <input type="text" class="inputtext">
                    <button>GO</button>
                </div>
                </form>
                <div class="plist">
                    <ul>
                        <foreach name="list" item="vo">
                            <li>
                                <input type="hidden" name="id" value="{$vo.id}">
                                <h2>{$vo.title}</h2>
                                <img src="/{$vo.pic}">
                                <div>
                                    <p>科教领域 : {$vo.fields}</p>
                                    <p>所在省市 : {$vo.city}</p>
                                    <p>适合人群 : {$vo.fit}</p>
                                    <a href="{:U('Zhicheng/yanxue',array('id'=>$vo['id']))}" class="more">了解详情</a>
                                </div>
                            </li>
                        </foreach>
                    </ul>

                    <div class="page">
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


<script type="text/javascript">
    $(document).ready(function(e) {
        var h = parseInt($('.menu').height()) - 91;
        $('.morebox').css('height',h+'px');
    });
</script>

<include file="Index:footer" />
