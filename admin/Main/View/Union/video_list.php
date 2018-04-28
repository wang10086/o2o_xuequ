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
                <li><a href="{:U('Union/index',array('type'=>$type))}">{$pagename}管理</a></li>
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
                                <if condition="rolemenu('Union/video_add')">
                                    <a href="{:U('Union/video_add',array('kind'=>$kind))}" style="color:#ffffff;" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> 上传视频</a>
                                </if>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body" id="piclist">
                            <table class="table table-bordered dataTable fontmini" id="tablelist">
                                <tr role="row" class="orders" >
                                    <th width="60" class="taskOptions">置顶</th>
                                    <th width="60">ID</th>
                                    <th>标题</th>
                                    <th width="100">文件类型</th>
                                    <th width="140">发布时间</th>
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

                                        <td style="line-height:24px;">{$row.id}</td>
                                        <td style="line-height:24px;">
                                            {$row.pic}
                                            <?php
                                            $con = C('TMPL_PARSE_STRING');
                                            if($kind==1){
                                                $url = $con['__HTTP_URL__'].'index.php?m=Main&c=Union&a=detail&id='.$row['id'];
                                            }else if($kind==2){
                                                $url = $con['__HTTP_URL__'].'index.php?m=Main&c=Collection&a=detail&id='.$row['id'];
                                            }else{
                                                $url = 'javascript:;';
                                            }
                                            ?>
                                            <a href="{$url}" target="_blank">{$row.title}</a>

                                        </td>
                                        <td style="line-height:24px;">{$row.fileext}</td>
                                        <td style="line-height:24px;"><if condition="$row['uploadtime']">{$row.uploadtime|date='Y-m-d H:i',###}</if></td>

                                        <if condition="rolemenu('Union/del_upd')">
                                            <td class="taskOptions" style="line-height:24px;">
                                                <a onClick="javascript:ConfirmDel('{:U('Union/del_upd',array('id'=>$row['id'],'module' =>$row['module']))}');" title="删除" class="btn btn-warning btn-smsm"><i class="fa fa-times"></i></a>
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



<include file="Index:footer" />

