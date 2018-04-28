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
                        <a href="{:U('Resource/index',array('type'=>$vo['id']))}"><h3>{$vo.title}</h3></a>
                        <div class="morebox">
                            <ul>
                                <foreach name ='dataB' item="v">
                                    <if condition="$v['pid'] eq $vo['id']">
                                        <li><a href="{:U('Resource/index',array('type'=>$v['id']))}">{$v.title}</a></li>
                                    </if>
                                </foreach>
                            </ul>
                            
                            <if condition="$vo['desc']">
                            <div class="tip">
                            {$vo.desc}
                            </div>
                            </if>
                            
                        </div>
                    </div>
                </foreach>
            </div>

            <div class="prolist">
				<form method="get" action="{:U('Resource/index')}" name="myform">
                
                <div class="jiansuo">
                    <span>科教领域：</span>
                    <select name="fid">
                        <option value="">请选择</option>
                        <foreach name="resf" item="v">
                        <option value="{$v}" <?php if($fid==$v){ echo 'selected';} ?>>{$v}</option>
                        </foreach>
                    </select>
                    &nbsp;
                    <span>所在城市：</span>
                    <select name="city">
                        <option value="">请选择</option>
                        <foreach name="resc" item="v">
                        <option value="{$v}" <?php if($city==$v){ echo 'selected';} ?>>{$v}</option>
                        </foreach>
                    </select>
                    &nbsp;
                    <span>所属系统：</span>
                    <select name="sys">
                        <option value="">请选择</option>
                        <foreach name="ress" item="v">
                        <option value="{$v}" <?php if($sys==$v){ echo 'selected';} ?>>{$v}</option>
                        </foreach>
                    </select>
                    &nbsp;
                    <span>支持项目：</span>
                    <select name="pro">
                        <option value="">请选择</option>
                        <foreach name="resp" item="v">
                        <option value="{$v}" <?php if($pro==$v){ echo 'selected';} ?>>{$v}</option>
                        </foreach>
                    </select>
                    &nbsp;
                    <input type="text" class="inputtext" name="kw" value="{$kw}">
                    <button>GO</button>
                </div>
                </form>
				
                <div class="plbox">
                    <div class="plist">
                        <ul>
                            <foreach name="datalist" item="vo">
                                <li>
                                    <input type="hidden" name="col" value="{$vo.col}">
                                    <if condition="$vo['type'] eq '2'">
                                        <h2><a href="{:U('Resource/ziyuan_morepic_detail',array('id'=>$vo['id'],'type'=>$vo['type'],'col'=>$vo['col']))}">{$vo.title}</a></h2>
                                        <a href="{:U('Resource/ziyuan_morepic_detail',array('id'=>$vo['id'],'type'=>$vo['type'],'col'=>$vo['col']))}"><img src="/{$vo.pic}"></a>
                                        <div>
                                            <p>科教领域 : {$vo.fields}</p>
                                            <p>所在省市 : {$vo.city}</p>
                                            <p>支持项目 : {$vo.pro}</p>
                                            <a href="{:U('Resource/ziyuan_morepic_detail',array('id'=>$vo['id'],'type'=>$vo['type'],'col'=>$vo['col']))}" class="more">了解详情</a>
                                        </div>
                                    <else />
                                        <h2><a href="{:U('Resource/ziyuan_detail',array('id'=>$vo['id'],'type'=>$vo['type']))}">{$vo.title}</a></h2>
                                        <a href="{:U('Resource/ziyuan_detail',array('id'=>$vo['id'],'type'=>$vo['type']))}"><img src="/{$vo.pic}"></a>
                                        <div>
                                            <p>科教领域 : {$vo.fields}</p>
                                            <p>所在省市 : {$vo.city}</p>
                                            <p>支持项目 : {$vo.pro}</p>
                                            <a href="{:U('Resource/ziyuan_detail',array('id'=>$vo['id'],'col'=>$vo['col']))}" class="more">了解详情</a>
                                        </div>
                                    </if>
                                </li>
                            </foreach>
                        </ul>
                    </div>
                	<div class="pagestyle">
                        {$pages}  
                    </div>
                </div>
				
                


                <div class="prorbox">

                    <div class="unrel">
                        <div class="reltit">
                            <h2>热门活动</h2>
                        </div>
                        <div class="cont">
                            <ul>
                                <foreach name="data_y" item="v">
                                    <li><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></li>
                                </foreach>
                            </ul>
                        </div>
                    </div>

                    <div class="unrel mt20">
                        <div class="reltit">
                            <h2>热门资源</h2>
                        </div>
                        <div class="cont">
                            <ul>
                                <foreach name="data_z" item="v">
                                    <li><a href="{:U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']))}">{$v.title}</a></li>
                                </foreach>
                            </ul>
                        </div>
                    </div>

                    <div class="unrel mt20">
                        <div class="reltit">
                            <h2>热门专家</h2>
                        </div>
                        <div class="pro_cont">
                            <div class=" pro_exphot">
                                <ul>
                                    <foreach name="data_x" item = 'v'>
                                        <li><a href="{:U('Pro/lecture',array('id'=>$v['id']))}"><img src="{:thumb($v['pic'],105,105)}"><p>{$v.title}</p></a></li>
                                    </foreach>
                                </ul>
                            </div>
                        </div>
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
