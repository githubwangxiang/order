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

<!--Start content-->
<section class="Cfn">
 <aside class="C-left">
  <div class="S-time">服务时间：周一~周六<time>09:00</time>-<time>23:00</time></div>
  <div class="C-time">
   <img src="/Public/Home/upload/dc.jpg"/>
  </div>
  <a href="list.html" target="_blank"><img src="/Public/Home/images/by_button.png"></a>
  <a href="list.html" target="_blank"><img src="/Public/Home/images/dc_button.png"></a>
 </aside>
 <div class="F-middle">
 <ul class="rslides f426x240">
  <?php if(is_array($food)): $i = 0; $__LIST__ = $food;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/Food/detail/id/<?php echo ($vol["id"]); ?>"><img src="<?php echo ($vol["is_logo_small"]); ?>" style="width:600px;hight:400px;"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
 </div>
 <aside class="N-right">
  <div class="N-title">十分钟简介 <i>COMPANY NEWS</i></div>
  <ul class="Newslist">
   <li><i></i><a href="article_read.html" target="_blank" title="这里调用新闻标题...">欢迎来到十分钟点餐站...</a></li>
   <li><i></i><a href="article_read.html" target="_blank" title="这里调用新闻标题...">中式、西式,应有尽有...</a></li>
  </ul>
  <ul class="Orderlist" style="font-size:13px">
   <li>
     <p><i class="State03" style="margin-left:100px;">十分钟点餐</i></p>
     <p>公司创立于2017年11月,由<font style="color:red;font-size:16px"><u>段二狗、秦程程、王想、李小萃、陶小彤</u></font>在北京黑马大厦创立</p>
     <p></p>
   </li>
   <li>
    <p style="font-size:12px;margin-top:15px;">
      <span><i class="State03">中餐</i></span>
      &ensp;=>
      <span><i class="State01">北京烤鸭</i></span>
      <span><i class="State01">上海烤鸭</i></span>
    </p>
    
    <p style="margin-top:5px;font-size:12px">
      <span><i class="State03">西餐</i></span>
      &ensp;=>
      <span><i class="State02">牛排</i></span>
      <span><i class="State02">虾米</i></span>
      <span><i class="State02">回转寿司</i></span>
    </p>

   </li>
   <li>
     <p style="color:orange;">网上定外卖,吃货新时代</p>
     <p>对于那些爱吃又很宅的人来说,再适合不过了</p>
     <p>在家一个电话,直接预订周边美食,十分钟送到</p>
   </li>
  </ul>
  
 </aside>
</section>
<section class="Sfainfor">
 <article class="Sflist">
  <div id="Indexouter">
   <ul id="Indextab">
    <li class="current">点菜</li>
    <li class="current">餐馆</li>
    <p class="class_B">
   
   
    </p>
   </ul>
  <div id="Indexcontent">
   <ul style="display:block;">
    <li>
      <p class="seekarea">
        <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="javascript:;" name="ops"  class="cur mnunss" ><?php echo ($vol); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </p>

     <div class="SCcontent">

     <?php if(is_array($food)): $i = 0; $__LIST__ = $food;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/Food/detail/id/<?php echo ($vol["id"]); ?>" name="menu" target="_blank" title="<?php echo ($vol["res_name"]); ?>">
      <figure>
       <img src="<?php echo ($vol["is_logo_small"]); ?>">
       <figcaption>
       <span class="title"><?php echo ($vol["food_name"]); ?></span>
       <span class="price"><i>￥</i><?php echo ($vol["food_nowprice"]); ?></span>
       </figcaption>
      </figure>
      </a><?php endforeach; endif; else: echo "" ;endif; ?>

     </div>
     <div class="bestshop">
     <?php if(is_array($rest)): $i = 0; $__LIST__ = $rest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/Res/detail/id/<?php echo ($vol["id"]); ?>" target="_blank" title="<?php echo ($vol["res_name"]); ?>">
      <figure>
       <img src="<?php echo ($vol["res_logo"]); ?>">
      </figure>
      </a><?php endforeach; endif; else: echo "" ;endif; ?>
     </div>
    </li>
   </ul>
   <ul>
  <li>
  <!--点击餐馆之后的城市-->
   <p class="seekarea">
        <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="javascript:;" name="restaurant"><?php echo ($vol); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </p>

     <div class="DCcontent">
      <?php if(is_array($rest)): $i = 0; $__LIST__ = $rest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/Res/detail/id/<?php echo ($vol["id"]); ?>" target="_blank" title="TITLE:<?php echo ($vol["res_name"]); ?>">
       <figure>
       <img src="<?php echo ($vol["res_logo"]); ?>">
       <figcaption>
       <span class="title"><?php echo ($vol["res_name"]); ?></span>
       <span class="price">预定折扣：<i>8.9折</i></span>
       </figcaption>
       <p class="p1"><q>人均价格:<?php echo ($vol["res_price"]); ?>，提供免费WiFi。</q></p>
       <p class="p2">
       店铺评分：
       <img src="/Public/Home/images/star-on.png">
       <img src="/Public/Home/images/star-on.png">
       <img src="/Public/Home/images/star-on.png">
       <img src="/Public/Home/images/star-on.png">
       <img src="/Public/Home/images/star-off.png">
       </p>
       <p class="p3">店铺地址：<?php echo ($vol["res_pro"]); echo ($vol["res_city"]); echo ($vol["res_area"]); echo ($vol["res_address"]); ?>***<?php echo ($vol["res_name"]); ?>...</p>
       </figure>
       </a><?php endforeach; endif; else: echo "" ;endif; ?>

     </div>
  </li>
  </ul>
 </div>
 </div>
 </article>
 <aside class="A-infor">
  <img src="/Public/Home/upload/2014911.jpg">
  <div class="usercomment">
   <span>用户菜品点评</span>
   <ul>
    <li>
     <img src="/Public/Home/upload/01.jpg">
     用户“DeathGhost”对[ 老李川菜馆 ]“酸辣土豆丝”评说：味道挺不错，送餐速度挺快...
    </li>
    <li>
     <img src="/Public/Home/upload/02.jpg">
     用户“DeathGhost”对[ 魏家凉皮 ]“酸辣土豆丝”评说：味道挺不错，送餐速度挺快...
    </li>
   </ul>
  </div>
 </aside>
</section>
<script>
$(function(){
   $('a[name=ops]').click(function(){
     var city=$(this).html();
       $.ajax({
          'url':'/index.php/Home/Index/foodCity',
          'type':'post',
          'dataType':'json',
          'data':'city='+city,
          'success':function(res){
                if(res.code==10000)
                {
                   $('.SCcontent').html(res.data);

                }
                else
                {
                   $('.SCcontent').html('暂无数据');
                }
           }

       });
     })
})

$(function(){
   $('a[name=restaurant]').click(function(){
     var city=$(this).html();
       $.ajax({
          'url':'/index.php/Home/Index/foodRes',
          'type':'post',
          'dataType':'json',
          'data':'city='+city,
          'success':function(res){
                if(res.code==10000)
                {
                   $('.DCcontent').html(res.data);

                }
                else
                {
                   $('.DCcontent').html('暂无数据');
                }
           }

       });
     })
})

   
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