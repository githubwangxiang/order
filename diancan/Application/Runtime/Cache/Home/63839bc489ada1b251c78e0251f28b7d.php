<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>DeathGhost-产品分类页面</title>
    <meta name="keywords" content="DeathGhost,DeathGhost.cn,web前端设,移动WebApp开发" />
    <meta name="description" content="DeathGhost.cn::H5 WEB前端设计开发!" />
    <meta name="author" content="DeathGhost"/>
    <link href="/Public/Home/style/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/public.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jqpublic.js"></script>
    <!--
    Author: DeathGhost
    Author URI: http://www.deathghost.cn
    -->
</head>
<body>
<!-- 头部导航 -->
<headers>
    <section class="Topmenubg">
        <div class="Topnav">
            <div class="LeftNav">
                <?php if( $_SESSION['user_info']== '' ): ?><a href="/index.php/Home/User/register">注册</a>/<a href="/index.php/Home/User/login">登录</a>
                <?php else: ?>
                 <a href="javascript:void(0);"><?php echo ((isset($_SESSION['user_info']['user_name']) && ($_SESSION['user_info']['user_name'] !== ""))?($_SESSION['user_info']['user_name']):$Think.session.user_info.email); ?></a>/<a href="/index.php/Home/Info/logOut">退出</a><?php endif; ?>
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=515133122&site=qq&menu=yes"><img border="0" alt="qq客服" title="点击这里给我发消息"/></a>
                <a href="#">微信客服</a>
            </div>
            <div class="RightNav">
                <a href="/index.php/Home/Info/index">用户中心</a> <a href="user_orderlist.html" target="_blank" title="我的订单">我的订单</a> <a href="/index.php/Home/Cart/index">购物车</a>
            </div>
        </div>
    </section>
    <div class="Logo_search">
        <div class="Logo">
            <img src="/Public/Home/images/logo.jpg" title="DeathGhost" alt="模板">
            <i></i>
            <span>西安市 [ <a href="#">莲湖区</a> ]</span>
        </div>
        <div class="Search">
            <form method="post" id="main_a_serach" action="/index.php/Home/Info/search">
                <input type="hidden" name="cat" id="dd">
                <div class="Search_nav" id="selectsearch">
                    <a href="javascript:void(0);" onClick="selectsearch(this,'restaurant_name')" class="choose" s="1">餐厅</a>
                    <a href="javascript:void(0);" onClick="selectsearch(this,'food_name')" s="0">食物名</a>
                </div>
                <div class="Search_area">
                    <input type="text" id="fkeyword" name="keyword" placeholder="请输入您所需查找的餐厅名称或食物名称..." class="searchbox" />
                    <input type="button" class="searchbutton" value="搜 索" />
                </div>
            </form>
             
        </div>
    </div>
    <nav class="menu_bg">
        <ul class="menu">


            <li><a href="/index.php/Home/Index/index">首页</a></li>
            <li><a href="/index.php/Home/Res/index">订餐</a></li>
            <li><a href="/index.php/Home/Goods/index">积分商城</a></li>
            <li><a href="article_read.html">关于我们</a></li>
        </ul>
    </nav>
</headers>
<!--  头部结束  -->
<!--<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=515133122&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:751893049:53" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>-->
<!--Start content-->
<section class="Psection">
    <section class="fslist_navtree">
        <ul class="select">
            <li class="select-list">
                <dl id="select4">
                    <dt>积分区间：</dt>
                    <dd class="select-all selected"><a href="javascript:" class="grade" onclick="getgoods(this)">全部</a></dd>
                    <dd><a href="javascript:" class="grade" onclick="getgoods(this)">1-100积分</a></dd>
                    <dd><a href="javascript:" class="grade" onclick="getgoods(this)">101-200积分</a></dd>
                    <dd><a href="javascript:" class="grade" onclick="getgoods(this)">201-300积分</a></dd>
                    <dd><a href="javascript:" class="grade" onclick="getgoods(this)">301-400积分</a></dd>
                    <dd><a href="javascript:" class="grade" onclick="getgoods(this)">401-500积分</a></dd>
                </dl>
            </li>
            <li class="select-result">
                <dl>
                    <dd class="select-no">已选择：</dd>
                </dl>
            </li>
        </ul>
    </section>
    <section class="CateL Overflow">
        <ul id="getgrade">
            <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li>
                    <a href="/index.php/Home/Goods/detail/id/<?php echo ($vol["id"]); ?>" target="_blank" title="<?php echo ($vol["goods_name"]); ?>">
                        <img src="<?php echo ($vol["goods_logo"]); ?>">
                        <p class="Overflow"><?php echo ($vol["goods_name"]); ?></p>
                        <p class="Overflow">消耗：<span class="CorRed Font16"><?php echo ($vol["goods_grade"]); ?></span>积分<i></i></p>
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </section>
    <aside class="CateR">
        <!--广告位或推荐位-->
        <div>
            <a href="#" target="_blank"><img src="/Public/Home/upload/ad.jpg"></a>
        </div>
        <div class="Hot_shop">
            <span class="Hshoptile Font14 FontW Block">热门商家</span>
            <ul>
                <?php if(is_array($restaurant)): $i = 0; $__LIST__ = $restaurant;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li>
                        <a href="/index.php/Home/Res/detail/id/<?php echo ($vol["id"]); ?>" target="_blank" title="<?php echo ($vol["res_name"]); ?>"><img src="<?php echo ($vol["res_logo"]); ?>"></a>
                        <p class="Font14 FontW Overflow Lineheight35"><a href="/index.php/Home/Res/detail/id/<?php echo ($vol["id"]); ?>" target="_blank" title="<?php echo ($vol["res_name"]); ?>"><?php echo ($vol["res_name"]); ?></a></p>
                        <p class="Lineheight35 Overflow"><span title="通过动态控制地址的字符数量..."><?php echo ($vol["res_pro"]); echo ($vol["res_city"]); echo ($vol["res_area"]); echo ($vol["res_address"]); ?></span></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </aside>
</section>
<!--没用的注释-->
<!--<script type="text/javascript">
    function getgoods(e) {
        //获取选中的积分文字
        var data = $(e).html();
        data = data.replace('积分', '');
        data = data.split('-');
        if (data[0] == "全部") {
            data = 'jf1=a';
        } else {
            data = 'jf1=' + data[0] + '&jf2=' + data[1];
        }
        $.ajax({
            type: 'POST',
            url: '/index.php/Home/Goods/getGrade',
            dataType: 'json',
            data: data,
            success: function (response) {
                $('#getgrade').html(response.gradegoods)
            },
        });
    }
</script>-->
<script type="text/javascript">
    //积分条件筛选
    function getgoods(e) {
        //获取选中的积分文字
        var data = $(e).html();
        //去掉尾部积分两个字
        data = data.replace('积分', '');
        //根据'-'分割  得到(1,100)(101,200)...等数据 数组形式
        data = data.split('-');
        ///如果数组的0下标的值是全部
        //需要进行转码，ajax不允许传中文参数
        if (data[0] == "全部") {
            data[0] = encodeURI(data[0]);
        }
        $.ajax({
            type: 'POST',
            url: '/index.php/Home/Goods/getGrade',
            dataType: 'json',
            //传参数如jf1=1&jf2=100
            data: 'jf1=' + data[0] + '&jf2=' + data[1],
            success: function (response) {
                //替换了上面ul  id为getgrade的下面html内容
                $('#getgrade').html(response.gradegoods)
            },
        });
    }
</script>


<!-- 底部导航 -->

<div class="F-link">
    <span>友情链接：</span>
    <a href="http://www.deathghost.cn" target="_blank" title="DeathGhost">DeathGhost</a>
    <a href="http://www.17sucai.com/pins/15966.html" target="_blank" title="免费后台管理模板">绿色清爽版通用型后台管理模板免费下载</a>
    <a href="http://www.17sucai.com/pins/17567.html" target="_blank" title="果蔬菜类模板源码">HTML5果蔬菜类模板源码</a>
    <a href="http://www.17sucai.com/pins/14931.html" target="_blank" title="黑色的cms商城网站后台管理模板">黑色的cms商城网站后台管理模板</a>
</div>
<footer>
    <section class="Otherlink">
        <aside>
            <div class="ewm-left">
                <p>手机扫描二维码：</p>
                <img src="/Public/Home/images/Android_ico_d.gif">
                <img src="/Public/Home/images/iphone_ico_d.gif">
            </div>
            <div class="tips">
                <p>客服热线</p>
                <p><i>1830927**73</i></p>
                <p>配送时间</p>
                <p><time>09：00</time>~<time>22:00</time></p>
                <p>网站公告</p>
            </div>
        </aside>
        <section>
            <div>
                <span><i class="i1"></i>配送支付</span>
                <ul>
                    <li><a href="article_read.html" target="_blank" title="标题">支付方式</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">配送方式</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">配送效率</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">服务费用</a></li>
                </ul>
            </div>
            <div>
                <span><i class="i2"></i>关于我们</span>
                <ul>
                    <li><a href="article_read.html" target="_blank" title="标题">招贤纳士</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">网站介绍</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">配送效率</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">商家加盟</a></li>
                </ul>
            </div>
            <div>
                <span><i class="i3"></i>帮助中心</span>
                <ul>
                    <li><a href="article_read.html" target="_blank" title="标题">服务内容</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">服务介绍</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">常见问题</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">网站地图</a></li>
                </ul>
            </div>
        </section>
    </section>
    <div class="copyright">© 版权所有 2017 代码敲敲提供 技术支持：<a href="http://www.deathghost.cn" title="DeathGhost">Just Do</a></div>
</footer>
</body>
</html>
<script>
    $(function(){
        $('.searchbutton').click(function(){

           //判断是否有值
            var ky=$('#fkeyword').val();
            if(ky=='')
               return;
            //s=1为餐馆
            var s=$('.choose').attr('s');
            $('#dd').val(s);
            $('#main_a_serach').submit();
        });
    });
</script>