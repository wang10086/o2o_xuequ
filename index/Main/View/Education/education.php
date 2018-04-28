<include file="Index:header" />


<div class="unbox">
    <div class="content ovhid">

        <div class="crumbs">
            您所在的位置：<a href="{:U('Index/home')}">首页</a>  <span>&gt;</span> <a href="#">科学教育专题</a>
            <a href="{:U('Education/more_edu')}"><span class="res_more">更多>></span></a>
        </div>

        <div class="listbox">
            <ul>
                <li>
                    <a href="{:U('Education/yanjiangtuan')}" class="listcon">
                        <img src="__HTML__/images/1.jpg">
                        <p>中国科学院老科学家科普演讲团专题</p>
                    </a>
                    <a href="{:U('Education/yanjiangtuan')}" class="more">了解详情</a>
                </li>

                <li>
                    <a href="{:U('Gongyi/gongyi')}" class="listcon">
                        <img src="__HTML__/images/u262.png">
                        <p>学校科学教育基金</p>
                    </a>
                    <a href="{:U('Gongyi/gongyi')}" class="more">了解详情</a>
                </li>

                <!--<li>
                    <a href="{:U('Education/zjs_luntan')}" class="listcon">
                        <img src="__HTML__/images/zjs_luntan1.png">
                        <p>“紫金山论坛”专题</p>
                    </a>
                    <a href="{:U('Education/zjs_luntan')}" class="more">了解详情</a>
                </li>-->

                <li>
                    <a href="{:U('Education/shaokeyuan')}" class="listcon">
                        <img src="__HTML__/images/shaokeyuan.png">
                        <p>海淀区少年科学院专题</p>
                    </a>
                    <a href="{:U('Education/shaokeyuan')}" class="more">了解详情</a>
                </li>

                <li>
                    <a href="{:U('HHH/HHH')}" class="listcon">
                        <img src="__HTML__/images/4.jpg">
                        <p>中国科学院“3H工程”支撑服务学校专题</p>
                    </a>
                    <a href="{:U('HHH/HHH')}" class="more">了解详情</a>
                </li>

                <foreach name="data" item="vo">
                    <li>
                        <a href="{:U('Education/edu_detail',array('id'=>$vo['id'],'module'=>$vo['module']))}" class="listcon">
                            <img src="/{$vo.pic}">
                            <p>{$vo.title}</p>
                        </a>
                        <a href="{:U('Education/edu_detail',array('id'=>$vo['id'],'module'=>$vo['module']))}" class="more">了解详情</a>
                    </li>
                </foreach>

            </ul>
        </div>

        <div class="page">
            <a href="#" class="ll">上一页</a>
            <a href="#" class="on">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#" class="rr">下一页</a>
        </div>

    </div>
</div>


<script type="text/javascript">
</script>

<include file="Index:footer" />
