<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas" id="indexmenus">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

            <div class="pull-left image">
                <img src="{:GetHead()}" class="img-circle" alt="User Image" onClick="window.location.href='{:U('User/edit')}'" />
            </div>

            <div class="pull-left info">
                <p><?php  echo cookie('name'); ?></p>
                <a href="{:U('User/edit')}"><?php if(cookie('userid')==C('RBAC_SUPER_ADMIN')){  echo 'Superman'; }else{ echo cookie('rolename');} ?></a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <if condition="rolemenu(array('Index/index'))">
                <li class="{:ison(CONTROLLER_NAME, 'Index')}">
                    <a href="{:U('Index/index')}">
                        <i class="fa fa-home"></i> <span>系统首页</span>
                    </a>
                </li>
            </if>

            <if condition="rolemenu(array('Res/index','Res/res_edit'))">
                <li class="{:ison(CONTROLLER_NAME, 'Res')}">
                    <a href="{:U('Res/index')}">
                        <i class="fa fa-calendar"></i>
                        <span>资源管理</span>
                    </a>

                </li>
            </if>

            <if condition="rolemenu(array('Goods/goodslist','Goods/courtype'))">
                <li class="treeview {:ison(CONTROLLER_NAME, 'Goods')}">
                    <a href="javascript:;">
                        <i class="fa fa-file-text"></i>
                        <span>服务项目</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <if condition="rolemenu(array('Goods/goodslist'))">
                            <li><a href="{:U('Goods/goodslist')}"><i class="fa fa-angle-right"></i> 旅行产品</a></li>
                        </if>
                        <if condition="rolemenu(array('Goods/index'))">
                            <li><a href="{:U('Goods/index')}"><i class="fa fa-angle-right"></i> 专家讲座</a></li>
                        </if>
                        <if condition="rolemenu(array('Goods/product'))">
                            <li><a href="{:U('Goods/product')}"><i class="fa fa-angle-right"></i> 实体产品</a></li>
                        </if>
                        <if condition="rolemenu(array('Goods/sci'))">
                            <li><a href="{:U('Goods/sci')}"><i class="fa fa-angle-right"></i> 科技节产品</a></li>
                        </if>
                        <if condition="rolemenu(array('Goods/science'))">
                            <li><a href="{:U('Goods/science')}"><i class="fa fa-angle-right"></i> 科学课程(表格类)</a></li>
                        </if>
                    </ul>
                </li>
            </if>


            <if condition="rolemenu(array('News/index'))">
                <li class="treeview {:ison(CONTROLLER_NAME, 'News')}">
                    <a href="javascript:;">
                        <i class="fa fa-list-alt"></i>
                        <span>文章管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{:U('News/index')}"><i class="fa fa-angle-right"></i> 新闻文章管理</a></li>
                        <li><a href="{:U('News/travel')}"><i class="fa fa-angle-right"></i> 旅游文章管理</a></li>
                        <li><a href="{:U('News/pic')}"><i class="fa fa-angle-right"></i> 长图文章管理(一张大图)</a></li>
                    </ul>
                </li>
            </if>


            <if condition="rolemenu(array('Union/news'))">
                <li class="treeview {:ison(CONTROLLER_NAME, 'Union')}">
                    <a href="javascript:;">
                        <i class="fa fa-chain"></i>
                        <span>联盟网站管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{:U('Union/index')}"><i class="fa fa-angle-right"></i> 新闻文章管理</a></li>
                        <li><a href="{:U('Union/morepic_list')}"><i class="fa fa-angle-right"></i> 多图片文章管理</a></li>
                        <li><a href="{:U('Union/upload_list')}"><i class="fa fa-angle-right"></i> 文档资料上传</a></li>
                        <li><a href="{:U('Union/video_list')}"><i class="fa fa-angle-right"></i> 视频资料上传</a></li>
                    </ul>
                </li>
            </if>

            <if condition="rolemenu(array('Expert/news'))">
                <li class="treeview {:ison(CONTROLLER_NAME, 'Expert')}">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>老专家网站管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{:U('Expert/index')}"><i class="fa fa-angle-right"></i> 新闻文章管理</a></li>
                    </ul>
                </li>
            </if>

            <if condition="rolemenu(array('Apply/index','Apply/apply_service'))">
                <li class="treeview {:ison(CONTROLLER_NAME, 'Apply')}">
                    <a href="javascript:;">
                        <i class="fa fa-bell"></i>
                        <span>预约信息管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <if condition="rolemenu(array('Apply/apply_service'))">
                            <li><a href="{:U('Apply/apply_service')}"><i class="fa fa-angle-right"></i> 支撑服务校申请记录</a></li>
                        </if>
                        <if condition="rolemenu(array('Apply/apply_lecture'))">
                            <li><a href="{:U('Apply/apply_lecture')}"><i class="fa fa-angle-right"></i> 预约老专家演讲记录</a></li>
                        </if>
                        <if condition="rolemenu(array('Apply/apply_sci'))">
                            <li><a href="{:U('Apply/apply_sci')}"><i class="fa fa-angle-right"></i> 预约科技节产品记录</a></li>
                        </if>
                        <if condition="rolemenu(array('Apply/apply_tra'))">
                            <li><a href="{:U('Apply/apply_tra')}"><i class="fa fa-angle-right"></i> 预约研学/科学课程记录</a></li>
                        </if>
                    </ul>
                </li>
            </if>
            
            <if condition="rolemenu(array('Member/index','Member/apply_service'))">
                <li class="treeview {:ison(CONTROLLER_NAME, 'Member')}">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>会员管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <if condition="rolemenu(array('Member/index'))">
                            <li><a href="{:U('Member/index')}"><i class="fa fa-angle-right"></i> 会员列表</a></li>
                        </if>

                        <!--临时添加会员入口-->
                        <if condition="rolemenu(array('Member/add_mem'))">
                            <li><a href="{:U('Member/add_mem')}"><i class="fa fa-angle-right"></i> 添加会员(临时使用)</a></li>
                        </if>
                        
                    </ul>
                </li>
            </if>
            

            <!--
            <if condition="rolemenu(array('Message/index'))">
                <li class="{:ison(CONTROLLER_NAME, 'Message')}">
                    <a href="{:U('Message/index',array('type'=>0))}">
                        <i class="fa fa-envelope"></i> <span>系统消息</span> 
                        <?php $noread = no_read(); ?>
                        <if condition="$noread"><small class="badge pull-right bg-red" style="margin-right:10px;">{$noread}</small></if>
                    </a>
                </li>
            </if>
            -->


            <if condition="rolemenu(array('System/config','System/update_web'))">
                <li class="treeview {:ison(CONTROLLER_NAME, 'System')}">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>系统管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <if condition="rolemenu(array('System/config'))">
                            <li><a href="{:U('System/config')}"><i class="fa fa-angle-right"></i> 网站配置</a></li>
                        </if>
                        <if condition="rolemenu(array('System/kind'))">
                            <li><a href="{:U('System/kind')}"><i class="fa fa-angle-right"></i> 栏目管理</a></li>
                        </if>
                        <if condition="rolemenu(array('System/counter'))">
                            <li><a href="{:U('System/counter')}"><i class="fa fa-angle-right"></i>网站流量管理</a></li>
                        </if>
                    </ul>
                </li>
            </if>

            <if condition="rolemenu(array('User/index','Rbac/role','Rbac/node'))">
                <li class="treeview {:ison(CONTROLLER_NAME, 'User')} {:ison(CONTROLLER_NAME, 'Rbac')}">
                    <a href="javascript:;">
                        <i class="fa fa-cog"></i>
                        <span>后台管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{:U('User/index')}"><i class="fa fa-angle-right"></i> 用户管理</a></li>
                        <?php if(cookie('username')==C('RBAC_SUPER_ADMIN')){ ?>
                            <li><a href="{:U('Rbac/role')}"><i class="fa fa-angle-right"></i> 角色管理</a></li>
                            <li><a href="{:U('Rbac/node')}"><i class="fa fa-angle-right"></i> 节点管理</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </if>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>