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
 <form method="post" action="/index.php/Home/User/register">
  <table class="Register">
  <tr>
  <td width="40%" align="right" class="FontW" id="">用户名：</td>
  <td><input type="text" id="username" name="user_name" required autofocus>
  <span id="tip"></span>
  </td>
  
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">密码：</td>
  <td><input type="password" name="password" required></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">再次确认：</td>
  <td><input type="password" name="repassword" required></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">电子邮件：</td>
  <td><input type="email" name="email" required></td>
  </tr>
  <tr>
  <!--<td width="40%" align="right" class="FontW">手机号码：</td>
  <td><input type="text" name="user_phone" required pattern="[0-9]{11}" id="phone" placeholder="请输入手机号"></td>
  </tr>
  <tr>
  <td align="right" class="FontW">验证码：</td>
  <td><input type="text" name="code" id="code" placeholder="请输入验证码">
  <input type="button" name="" value="发送验证码" id="dyMobileButton"
     onclick="sendmsg(this);"/></td>
  </tr>-->
 <!--  <tr>
 <td width="40%" align="right" class="FontW">手机校验码：</td>
 <td><input type="text" name="code" required pattern="[0-9]{6}"></td>
 </tr>
 <tr> -->
  <td width="40%" align="right"></td>
  <td><input type="submit" name="submit" class="Submit_b" value="注 册">( 已经是会员，<a href="login.html" class="BlueA">请登录</a> )</td>
  </tr>
  </table>
 </form>
</section>
<!--End content-->
<div class="F-link">
  <span>友情链接：</span>
  <a href="http://www.deathghost.cn" target="_blank" title="DeathGhost">DeathGhost</a>
  <a href="http://www.17sucai.com/pins/15966.html" target="_blank" title="免费后台管理模板">绿色清爽版通用型后台管理模板免费下载</a>
  <a href="http://www.17sucai.com/pins/17567.html" target="_blank" title="果蔬菜类模板源码">HTML5果蔬菜类模板源码</a>
  <a href="http://www.17sucai.com/pins/14931.html" target="_blank" title="黑色的cms商城网站后台管理模板">黑色的cms商城网站后台管理模板</a>
 </div>
<script type="text/javascript">
  $(function(){
    //失去焦点
    $('#username').blur(function(){
      //获取输入框的值
      var username = $(this).val();

      //发送ajax请求
       $.ajax({
          'url':'/index.php/Home/User/checkname',
          'type':'post',
          'data':'username='+username,
          'dataType':'json',
          'success':function(response){
              console.log(response);
              if(response.code !== 10000) {
                $('#tip').html("<font color='red'><b>用户名已经被注册</b></font>");
              }else{
                  $('#tip').html("<font color='green'><b>用户名可以使用</b></font>");
               }
          }
       })
    })
  })
</script>

<!--<script>
    //发送短信验证码
    var time = 60;
    function sendmsg(_this){
       if(time == 60){
              //获取手机号
              var phone = $('#phone').val();
              if(phone == ''){
                  alert("请输入手机号");
              }
              //发送ajax请求
              $.ajax({
                  'url': '/index.php/Home/User/sendmsg',
                  'type': 'post',
                  'data': 'user_phone=' + phone,
                  'dataType': 'json',
                  'success':function(response){
                      if(response.code != 10000){
                          alert(response.msg);
                          return;
                      }else{
                          alert("发送成功");
                      }
                  }
              })
       }
      //以下是倒计时效果
      if(time > 0){
           time--;
           _this.value = "重新发送:" + time + 's';
           _this.disabled = true;
      }
      if(time == 0){
          time = 60;
          _this.value = "重新发送验证码";
                _this.disabled  = false;
                return ;
            }
            //定时器
      setTimeout(function(){
          sendmsg(_this);
      },1000);
    }
  </script>-->



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