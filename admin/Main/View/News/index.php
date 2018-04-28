<include file="Index:header" />

<div class="wrapper row-offcanvas row-offcanvas-left">

    <include file="Index:menu" />

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{$pagename}</h1>
            <ol class="breadcrumb">
                <li><a href="{:U('Index/index')}"><i class="fa fa-home"></i> 首页</a></li>
                <li><a href="{:U('News/index',array('type'=>$type))}">{$pagename}管理</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">



            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{$pagename}列表</h3>
                            <div class="pull-right box-tools">

                                <button class="btn btn-info btn-sm" onclick="javascript:opensearch('searchtext',700,100);"><i class="fa fa-search"></i> 搜索</button>
                                <if condition="rolemenu('News/add')">
                                    <a href="{:U('News/add',array('kind'=>$kind))}" style="color:#ffffff;" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> 发布文章</a>
                                </if>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body" id="piclist">
                            <table class="table table-bordered dataTable fontmini" id="tablelist">
                                <tr role="row" class="orders" >
                                    <th width="60" class="taskOptions">置顶</th>
                                    <th width="60">序号</th>
                                    <th width="60">ID</th>
                                    <th>标题</th>
                                    <th>栏目</th>
                                    <th width="100">发布者</th>
                                    <th width="140">发布时间</th>
                                    <th width="140">更新时间</th>
                                    <if condition="rolemenu('News/edit')">
                                        <th width="60" class="taskOptions">编辑</th>
                                    </if>
                                    <?php if($type==1){ ?>
                                        <if condition="rolemenu('Delete/del_news')">
                                            <th width="60" class="taskOptions">删除</th>
                                        </if>
                                    <?php }else{ ?>
                                        <if condition="rolemenu('Delete/del_subject')">
                                            <th width="60" class="taskOptions">删除</th>
                                        </if>
                                    <?php } ?>
                                </tr>
                                <foreach name="infolist" item="row">
                                    <tr>
                                        <td class="taskOptions" style="line-height:24px;">
                                            <a href="{:U('Attachment/order',array('id'=>$row['id'],'type'=>$type))}" title="置顶" class="btn btn-success btn-smsm"><i class="fa fa-upload"></i></a>
                                        </td>

                                        <td style="line-height:24px;">{$row.sort}</td>
                                        <td style="line-height:24px;">{$row.id}</td>
                                        <td style="line-height:24px;">
                                            {$row.pic}
                                            <?php
                                            $con = C('TMPL_PARSE_STRING');
                                            if($kind==1){
                                                $url = $con['__HTTP_URL__'].'index.php?m=Main&c=News&a=detail&id='.$row['id'];
                                            }else if($kind==2){
                                                $url = $con['__HTTP_URL__'].'index.php?m=Main&c=Collection&a=detail&id='.$row['id'];
                                            }else{
                                                $url = 'javascript:;';
                                            }
                                            ?>
                                            <a href="{$url}" target="_blank">{$row.title}</a>

                                        </td>
                                        <td style="line-height:24px;">{:get_kind($row['col'])}</td>
                                        <td style="line-height:24px;">{$row.editor}</td>
                                        <td style="line-height:24px;"><if condition="$row['create_time']">{$row.create_time|date='Y-m-d H:i',###}</if></td>
                                        <td style="line-height:24px;"><if condition="$row['update_time']">{$row.update_time|date='Y-m-d H:i',###}</if></td>
                                        <if condition="rolemenu('News/edit')">
                                            <td class="taskOptions"  style="line-height:24px;">
                                                <a href="{:U('News/edit',array('id'=>$row['id'],'kind'=>$kind))}" title="修改" class="btn btn-info btn-smsm"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </if>

                                        <if condition="rolemenu('News/del_news')">
                                            <td class="taskOptions" style="line-height:24px;">
                                                <a onClick="javascript:ConfirmDel('{:U('News/del_news',array('id'=>$row['id']))}');" title="删除" class="btn btn-warning btn-smsm"><i class="fa fa-times"></i></a>
                                            </td>
                                        </if>

                                    </tr>
                                </foreach>

                            </table>

                        </div><!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pagestyle">{$pages}</div>
                        </div>
                    </div><!-- /.box -->


                </div><!-- right col -->
            </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->

<div id="searchtext">
    <form method="get" action="{:U('News/index')}" id="searchfrom" name="myform">
        <input type="hidden" name="m" value="Main">
        <input type="hidden" name="c" value="News">
        <input type="hidden" name="a" value="index">
        <div class="form-group col-md-6">
            <input type="text" name="keywords" placeholder="标题" class="form-control"/>
        </div>
        <div class="form-group col-md-6">
            <select class="form-control" name="col">
                <option value="">所属栏目</option>
                <foreach name="infotype" key="k" item="v">
                    <option value="{$v.id}">{$v.title}</option>
                </foreach>
            </select>
        </div>

    </form>
</div>

<include file="Index:footer" />
        