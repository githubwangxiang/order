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
  <!--user Account-->
  <section class="AccManage Overflow">
   <span class="AMTitle Block Font14 FontW Lineheight35"  >账户管理 |  &ensp; <a id="info" style="color:blue;cursor: pointer;" >修改个人信息</a></span>

   <p>登陆邮箱： <?php echo ($_SESSION['user_info']['email']); ?></p>
   <p>手机号码：<?php echo (encrypt_phone($_SESSION['user_info']['user_phone'])); ?> </p>
   <p>上次登陆：<?php echo (date('Y-m-d',$_SESSION['user_info']['last_time'])); ?>( *如非本人登陆，请立即<a href="javascript:void(0);" id="up">修改您的密码</a>！ )</p>
   <form style="display: none" id="for">
      <table>
       <tr>
          <td width="30%" align="right">原始密码：</td>
          <td><input type="password"  id='ypass' value=""></td>
       </tr>
      <tr>
       <td width="30%" align="right">修改密码：</td>
       <td><input type="password"  id="xpass" value=""></td>
      </tr>
      <tr>
       <td width="30%" align="right">确认密码：</td>
       <td><input type="password" name="password" id="qpass" value=""></td>
      </tr>
      <tr>
       <td></td>
       <td><input type="button" id="bt" value="提交"></td>
      </tr>
      </table>
    </form>
     <form style="display: none"  action="/index.php/Home/Info/userInfo" id="infoform"  method="post" enctype="multipart/form-data">
      <table>
         <tr>
            <td width="30%" align="right">*昵称：</td>
            <td><input type="text" name="user_name" value="<?php echo ($_SESSION['user_info']['user_name']); ?>"></td>
         </tr>
         <tr>
            <td width="30%" align="right">*头像：</td>
            <td><input type="file" name="header"> </td>
         </tr>
         <tr>
           <td width="30%" align="right"></td>
           <td><input type="button" id='infobt' value="提交"></td>
         </tr>
    </table>
   </form>
  </section>
 </article>
</section>
<!--引入webuploader相关外部文件-->
<link rel="stylesheet" type="text/css" href="/Public/Home/lib/webuploader-0.1.5/webuploader.css">
<script type="text/javascript" src="/Public/Home/lib/webuploader-0.1.5/webuploader.js"></script>
<script>

    $(function(){
      //给修改密码添加点击时间
      $('#up').click(function(){
          $('#infoform').css('display','none');
          $('#for').css('display','block');
      });
      $('#bt').click(function(){
          //获取值
          var ypass=$('#ypass').val();
          var xpass=$('#xpass').val();
          var qpass=$('#qpass').val();
          if(xpass!==qpass)
          {
              alert('两次密码不一致');
              return;
          }
          var mm={'ypass':ypass,'xpass':xpass,'qpass':qpass};
          $.ajax({
              'url':'/index.php/Home/Info/editPass',
              'type':'post',
              'dataType':'json',
              'data':mm,
              'success':function(re){
                  if(re.code!=10000)
                  {
                      alert(re.msg);
                  }
                  else
                  {
                      //修改成功
                      alert('修改成功');
                      location.href='/index.php/Home/Info/index';
                  }
              }

          })

      });
      $('#info').click(function(){
          $('#for').css('display','none');
          $('#infoform').css('display','block');
      });
     $('#infobt').click(function(){
         $user_name=$('input[name=user_name]').val();
         if($user_name=='')
         {
             alert('请输入昵称');return;
         }
         else
         {
             $('#infoform').submit();
         }

      });










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