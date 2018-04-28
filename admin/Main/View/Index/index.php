<include file="header" />

<div class="wrapper row-offcanvas row-offcanvas-left">

    <include file="menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?php echo P::SYSTEM_NAME."<small>".P::VERSION."</small>"; ?></h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/icons')}"><i class="fa fa-home"></i> 首页</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!--
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>00</h3>
                            <p>我的课件数量</p>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>00</h3>
                            <p>课件排课次数</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>00</h3>
                            <p>我教课次数</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>00</h3>
                            <p>总计学习人数</p>
                        </div>
                    </div>
                </div>
            </div>
            -->



            <!-- Main row -->
            <div class="row">



                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">我的事务</h3>
                        </div>
                        <div class="box-body">
                            <!-- 日历表格 -->
                            <table id="calTable">
                                <tr>
                                    <td colspan="7">
                                        <span id="dateInfo" style="float:left"></span>
                                        <div style="float:right">
                                            <button class="btn btn-default btn-sm"  onClick="prevMonth()"><i class=" fa fa-caret-left"></i> 上月</button>
                                            <button class="btn btn-default btn-sm"  onClick="thisMonth()"><i class=" fa"></i>本月</button>
                                            <button class="btn btn-default btn-sm"  onClick="nextMonth()">下月 <i class=" fa fa-caret-right"></i></button>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="day">周日</td>
                                    <td class="day">周一</td>
                                    <td class="day">周二</td>
                                    <td class="day">周三</td>
                                    <td class="day">周四</td>
                                    <td class="day">周五</td>
                                    <td class="day">周六</td>
                                </tr>
                                <tr>
                                    <td class="calBox sun" id="calBox0"></td>
                                    <td class="calBox" id="calBox1"></td>
                                    <td class="calBox" id="calBox2"></td>
                                    <td class="calBox" id="calBox3"></td>
                                    <td class="calBox" id="calBox4"></td>
                                    <td class="calBox" id="calBox5"></td>
                                    <td class="calBox sat" id="calBox6"></td>
                                </tr>
                                <tr>
                                    <td class="calBox sun" id="calBox7"></td>
                                    <td class="calBox" id="calBox8"></td>
                                    <td class="calBox" id="calBox9"></td>
                                    <td class="calBox" id="calBox10"></td>
                                    <td class="calBox" id="calBox11"></td>
                                    <td class="calBox" id="calBox12"></td>
                                    <td class="calBox sat" id="calBox13"></td>
                                </tr>
                                <tr>
                                    <td class="calBox sun" id="calBox14"></td>
                                    <td class="calBox" id="calBox15"></td>
                                    <td class="calBox" id="calBox16"></td>
                                    <td class="calBox" id="calBox17"></td>
                                    <td class="calBox" id="calBox18"></td>
                                    <td class="calBox" id="calBox19"></td>
                                    <td class="calBox sat" id="calBox20"></td>
                                </tr>
                                <tr>
                                    <td class="calBox sun" id="calBox21"></td>
                                    <td class="calBox" id="calBox22"></td>
                                    <td class="calBox" id="calBox23"></td>
                                    <td class="calBox" id="calBox24"></td>
                                    <td class="calBox" id="calBox25"></td>
                                    <td class="calBox" id="calBox26"></td>
                                    <td class="calBox sat" id="calBox27"></td>
                                </tr>
                                <tr>
                                    <td class="calBox sun" id="calBox28"></td>
                                    <td class="calBox" id="calBox29"></td>
                                    <td class="calBox" id="calBox30"></td>
                                    <td class="calBox" id="calBox31"></td>
                                    <td class="calBox" id="calBox32"></td>
                                    <td class="calBox" id="calBox33"></td>
                                    <td class="calBox sat" id="calBox34"></td>
                                </tr>
                                <tr>
                                    <td class="calBox sun" id="calBox35"></td>
                                    <td class="calBox" id="calBox36"></td>
                                    <td class="calBox" id="calBox37"></td>
                                    <td class="calBox" id="calBox38"></td>
                                    <td class="calBox" id="calBox39"></td>
                                    <td class="calBox" id="calBox40"></td>
                                    <td class="calBox sat" id="calBox41"></td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->



<div id="textinfo" style="display:none">

</div>

<script>

    //从服务器获取任务信息
    function getTasks() {
        $.post(web_path+'op.php?m=Main&c=Index&a=public_schedule',{},function(e){
            if(e != null){
                $(e).each(function(i){
                    buildTask(e[i].builddate, e[i].id, e[i].task, e[i].style, e[i].status, e[i].plan_id);
                } );
            }
        },'json')
    }

</script>

<include file="footer" />
		

       
