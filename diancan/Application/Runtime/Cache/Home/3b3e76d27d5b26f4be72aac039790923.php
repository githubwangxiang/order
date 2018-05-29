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

<link type="text/css" rel="stylesheet" href="/Public/Home/css/css.css" />
<!--Start content-->
<section class="Psection MT20">
<nav class="U-nav Font14 FontW">
  <ul>
   <li><i></i><a href="/index.php/Home/Info/index">用户中心首页</a></li>
   <li><i></i><a href="/index.php/Home/Info/userOrder" id="order">我的订单</a></li>
   <li><i></i><a href="/index.php/Home/Info/userAddre">收货地址</a></li>
   <li><i></i><a href="/index.php/Home/Info/grade">我的积分</a></li>
   <li><i></i><a href="/index.php/Home/Info/manege">账户管理</a></li>
   <li><i></i><a href="/index.php/Home/Info/logOut">安全退出</a></li>
  </ul>
 </nav>
 <article class="U-article Overflow">
  <!--user Address-->
  <section class="Myaddress Overflow">
   <span class="MDtitle Font14 FontW Block Lineheight35">收货人信息</span>
   <table class="Myorder">
    <th class="Font14 FontW">收件人姓名</th>
    <th class="Font14 FontW">收件人地址</th>
    <th class="Font14 FontW">具体街道地址</th>
    <th class="Font14 FontW">邮政编码</th>
    <th class="Font14 FontW">手机号码</th>
    <th class="Font14 FontW">操作</th>
    <?php if(is_array($address)): $k = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($k % 2 );++$k;?><tr>
     <!-- <td class="FontW"><a href="javascript:void(0);"><?php echo ($vol["order_id"]); ?></a></td>-->
      <td><?php echo ($vol["save_name"]); ?></td>
      <td><?php echo ($vol["address"]); ?></td>
      <td><?php echo ($vol["save_area"]); ?></td>
      <td><?php echo ($vol["mail_code"]); ?></td>
      <td><?php echo ($vol["address_phone"]); ?></td>
      <td><a class="upda" aid="<?php echo ($vol["id"]); ?>">修改</a>|<a href="/index.php/Home/Info/delAddre/id/<?php echo ($vol["id"]); ?>">删除</a></td>
     </tr><?php endforeach; endif; else: echo "" ;endif; ?>
   </table>
   <!--add new address-->
   <span class="MDtitle Font14 FontW Block Lineheight35">添加收货人信息</span>
   <form action="/index.php/Home/Info/addDress" method="post" id="adform">
    <input type="hidden" name='address'>
    <input type="hidden" name="is_add" value="0">
    <table style="margin-top:10px;">
     <tr>
      <td width="30%" class="Font14 FontW Lineheight35" align="right">收件人姓名：</td>
      <td><input type="text" name="save_name" required  class="input_name"></td>
     </tr>
    <tr>
     <td width="30%" class="Font14 FontW Lineheight35" align="right">选择所在地：</td>
     <td>
      <ul class="listArea">
       <li class="summary-stock">
        <div class="dt">配&nbsp;送&nbsp;至：</div>
        <div class="dd">
         <div class="addrID"><div></div><b></b></div>
         <div class="store-selector">
          <div class="text">
            <div></div>
            <b></b>
          </div>
          <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
         </div>
        </div>
       </li>
      </ul>
     </td>
    </tr>

    <tr>
     <td width="30%" class="Font14 FontW Lineheight35" align="right">街道地址：</td>
     <td><input type="text"  name="save_area" required  class="input_addr"></td>
    </tr>
    <tr>
     <td width="30%" class="Font14 FontW Lineheight35" align="right">邮政编码：</td>
     <td><input type="text"  name="mail_code" required pattern="[0-9]{6}"  class="input_zipcode"></td>
    </tr>
    <tr>
     <td width="30%" class="Font14 FontW Lineheight35" align="right">手机号码：</td>
     <td><input type="text" name="address_phone" required pattern="[0-9]{11}" class="input_tel"></td>
    </tr>
    <tr>
     <td width="30%" class="Font14 FontW Lineheight35" align="right"></td>
     <td class="Font14 Font Lineheight35">
      <input name="" type="button" value="新增收货地址"  class="Submit">
     </td>
    </tr>
   </table>
   </form>
  </section>
 </article>
</section>
<script src="/Public/Home/lib/address/location.js"></script>
<script>
 $(function(){
     //如果初始化为其他地区的，需要注意选择器的修改，传递不同的proid（省id），cityid：(市id) areaid：（县id），省市对应ID在location.js里面有定义，县id从京东动态加载
     $('ul.listArea').Address({ proid: 1152, cityid: 1153, areaid: 1154 });//初始化Tab中的地址
     $(".store-selector").find(".text div").html("山东济南");//初始化文本框显示的地址

     $('.Submit').click(function(){
         //获取地址的值
         var address=$('.text').find('div').html();
         $('input[name=address]').val(address);
         $('#adform').submit();
     })
     //给修改添加事件
     $('.upda').click(function(){
         var id=$(this).attr('aid');
         $.ajax({
             'url':'/index.php/Home/Info/selectOne',
              'type':'post',
              'dataType':'json',
              'data':'id='+id,
              'success':function(re){
                   if(re.code!=10000)
                   {
                       alert('无该条记录');
                       return;
                   }
                   else
                   {
                       //获取数据
                       var data=re.data;
                       $('input[name=save_name]').val(data.save_name);
                       $('.text').find('div').html(data.address);
                       $('input[name=save_area]').val(data.save_area);
                       $('input[name=mail_code]').val(data.mail_code);
                       $('input[name=address_phone]').val(data.address_phone);
                       $('input[name=is_add]').val(data.id);
                   }
             }

         });
     })
 })
</script>
<!--End content-->


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