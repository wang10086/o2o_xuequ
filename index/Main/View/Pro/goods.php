    <include file="Index:header" />

    <!--<link rel="stylesheet" type="text/css" href="__HTML__/pic/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="__HTML__/pic/css/default.css">-->
    <link rel="stylesheet" type="text/css" href="__HTML__/pic/css/pgwslideshow.css">
    <script type="text/javascript" src="__HTML__/pic/js/pgwslideshow.min.js"></script>
    <style>



    </style>

    <div class="unbox">
    	<div class="content">
        	
            <div class="crumbs">
            	您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="{:U('Pro/index')}">支撑服务项目</a> <span>&gt;</span>  <a href="javascript:;">{$row.title}</a>
            </div>

            <style type="text/css">
                /* css 重置 */

                /* 本例子css */
                .picScroll-left{ width:208px;  overflow:hidden; position:relative;  border:1px solid #ccc; float: left; height: 185px; margin-right: 20px; }
                .picScroll-left .hd{ overflow:hidden;  height:0px; background:#f4f4f4; padding:0 10px;  }
                .picScroll-left .hd .prev,.picScroll-left .hd .next{ display:block;  width:5px; height:9px; float:right; margin-right:5px; margin-top:10px;  overflow:hidden;  cursor:pointer; background:url("images/arrow.png") no-repeat;}
                .picScroll-left .hd .next{ background-position:0 -50px;  }
                .picScroll-left .hd .prev{ background-position:-60px 0; }
                .picScroll-left .hd .next{ background-position:-60px -50px; }
                .picScroll-left .hd ul{ float:right; overflow:hidden; zoom:1; margin-top:10px; zoom:1; }
                .picScroll-left .hd ul li{ float:left;  width:9px; height:9px; overflow:hidden; margin-right:5px; text-indent:-999px; cursor:pointer; background:url("images/icoCircle.gif") 0 -9px no-repeat; }
                .picScroll-left .hd ul li.on{ background-position:0 0; }
                .picScroll-left .bd{ padding:10px;   }
                .picScroll-left .bd ul{ overflow:hidden; zoom:1; }
                .picScroll-left .bd ul li{ float:left; _display:inline; overflow:hidden; text-align:center; text-align: center; }
                .picScroll-left .bd ul li .pic{ text-align:center; margin-left: 10px;}
                .picScroll-left .bd ul li .pic img{ width:150px; height:150px; display:block;  padding:2px; border:1px solid #ccc; }
                .picScroll-left .bd ul li .pic a:hover img{ border-color:#999;  }
                .picScroll-left .bd ul li .title{ line-height:24px;   }

                .expdesc{margin-left: 20px;}

            </style>

            <div class="content mt20 pb20 lx_cont">
                <div class="artdetail">
                    <div class="expert">
                        <!--<img src="{:thumb($row['pic'],240,150)}">-->
                        <img src="/{$row[pic]}" class="sci_img" >

                        <div class="expdesc">
                            <h2>{$row.title}</h2>
                            <if condition="$row[fit]"><p>适合人群：{$row.fit}</p></if>
                            <if condition="$row[city]"><p>实施城市：{$row.city}</p></if>
                            <if condition="$row[system]"><p>所属系统：{$row.system}</p></if>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actrbox">

                <div class="unrel">
                    <div class="reltit">
                        <h2>热门活动</h2>
                    </div>
                    <div class="cont"><ul>
                            <foreach name="data_y" item="v">
                                <li><a href="{:U('Pro/travel',array('id'=>$v['id']))}">{$v.title}</a></li>
                            </foreach>
                        </ul></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门资源</h2>
                    </div>
                    <div class="cont"><ul>
                            <foreach name="data_z" item="v">
                                <li><a href="{:U('Resource/ziyuan_detail',array('id'=>$v['id'],'col'=>$v['col']))}">{$v.title}</a></li>
                            </foreach>
                        </ul></div>
                </div>

                <div class="unrel mt20">
                    <div class="reltit">
                        <h2>热门专家</h2>
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

            <div class="lxnrz">
                <div class="lxnav" id="lxnav">
                    <ul>
                        <if condition="$row['lights']"><li class="on" onClick="goto('kechengtese',this)">课程特色</li></if>
                        <if condition="$row['target']"><li onClick="goto('kechengmubiao',this)">课程目标</li></if>
                        <if condition="$row['content']"><li onClick="goto('kechengneirong',this)">课程内容</li></if>
                        <if condition="$row['cost']"><li onClick="goto('feiyongshuoming',this)">配套资料</li></if>
                        <if condition="$atts"><li onClick="goto('xiangguantupian',this)">相关图片</li></if>
                    </ul>
                </div>

                <if condition="$row['lights']">
                    <div class="lxunit" id="kechengtese">
                        <h3 class="lx_dtitle">课程特色</h3>
                        <div class="conts">
                            <p class="tra_p">{:nl2br($row['lights'])}</p>
                        </div>
                    </div>
                </if>

                <if condition="$row['target']">
                    <div class="lxunit" id="kechengmubiao">
                        <h3 class="lx_dtitle">课程目标</h3>
                        <div class="conts">
                            {:nl2br($row['target'])}
                        </div>
                    </div>
                </if>

                <if condition="$row['content']">
                    <div class="lxunit" id="kechengneirong">
                        <h3 class="lx_dtitle">课程内容</h3>
                        <div class="conts">
                            {:nl2br($row['content'])}
                        </div>
                    </div>
                </if>

                <if condition="$row['cost']">
                    <div class="lxunit" id="feiyongshuoming">
                        <h3 class="lx_dtitle">理论课程所需材料</h3>
                        <div class="conts">
                            <p class="tra_p">{:nl2br($row['cost'])}</p>
                        </div>
                    </div>
                </if>

                <if condition="$atts">
                    <div class="lxunit" id="xiangguantupian">
                        <h3 class="lx_dtitle">相关图片</h3>
                        <div class="kechengpic">
                            <ul>
                                <foreach name ='atts' item="v">
                                    <!--<li><img src="{:thumb($v['filepath'],208,150)}"><span>{$v.filename}</span></li>-->
                                    <li><img src="/{$v[filepath]}"><span>{$v.filename}</span></li>
                                </foreach>
                            </ul>
                        </div>
                    </div>
                </if>
            </div>
        </div>
    </div>

    
    <include file="Index:footer" />
