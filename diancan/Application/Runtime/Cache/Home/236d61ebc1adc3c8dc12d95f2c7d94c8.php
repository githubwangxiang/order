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
<section class="Psection MT20" id="Cflow">
<!--如果用户未添加收货地址，则显示如下-->
 <div class="confirm_addr_f">
  <span class="flow_title">收货地址：</span>

  <form action="#">
   <ul class="address">
    <?php if(is_array($address_data)): $k = 0; $__LIST__ = $address_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($k % 2 );++$k;?><li id="style"><input type="radio" value="<?php echo ($address["id"]); ?>" name="address"
       <?php if( $k == 1 ): ?>checked='checked'<?php endif; ?>
 id="1" name="rdColor" onclick="changeColor(1)"/>
              <?php echo ($address["address"]); echo ($address["save_area"]); ?>(<?php echo ($address["save_name"]); ?>收）
              <span class="fontcolor"><?php echo ($address["address_phone"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
    <li><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><img src="/Public/Home/images/newaddress.png"/></a></li>
   </ul>
   </form>
   <!--add new address-->

 </div>
<!--配送方式及支付，则显示如下-->

 <div class="pay_delivery">
  <!--</table>-->
  <span class="flow_title">在线支付方式：</span>
   <form action="#">
    <ul>
    <li><input type="radio" name="pay" checked="checked" id="alipay" value="alipay" /><label for="alipay"><i class="alipay"></i></label></li>
    </ul>
   </form>
  </div>
  <form action="#">
  <div class="inforlist">
   <span class="flow_title">商品清单</span>
   <table>
    <th>名称</th>
    <th>商家</th>
    <th>数量</th>
    <th>价格</th>
    <th>小计</th>
<!--遍历食品数据-->
<?php if(is_array($foods)): $i = 0; $__LIST__ = $foods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$food): $mod = ($i % 2 );++$i;?><tr>
   <td name="food_name"><?php echo ($food['info']['food_name']); ?></td>
   <td><?php echo ($food['info']['res_name']); ?></td>
   <td><?php echo ($food['num']); ?></td>
   <td>￥<?php echo ($food['info']['food_nowprice']); ?></td>
   <td>￥<?php echo ($food['total']); ?></td>
 </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<!--遍历商品数据-->
    <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><tr>
     <td name="good_name"><?php echo ($good['info']['goods_name']); ?></td>
     <td>积分商场</td>
     <td ><?php echo ($good['num']); ?></td>
     <td><?php echo ($good['info']['goods_grade']); ?>积分</td>
     <td><?php echo ($good['grade']); ?>积分</td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

   </table>


   <div class="Order_M">

     </p>
    </div>
    <div class="Sum_infor">
    <p class="p2">合计：<span name="all_price"><?php echo ($all_price); ?></span>元
                       <span name="all_grade"><?php echo ((isset($all_grade) && ($all_grade !== ""))?($all_grade):0); ?></span>积分</p>
    <input type="button" value="提交订单"  name="but" class="p3button">
    </div>
   </div>
   </form>

<!--组合需要上传的数据    -->
    <form action="/index.php/Home/Fdorder/flowfood" method="post" id="sub" style="display: none">
        <input type="text" name="user_id" value="<?php echo ($_SESSION['user_info']['id']); ?>">
        <input type="text" name="address_id" value="">
        <!--<input type="text" name="order_id">-->
        <input type="text" name="foods_name" value="">
        <input type="text" name="goods_name" value="">
        <!--<input type="text" name="order_time">-->
        <input type="text" name="address_name" value="<?php echo ($address["address"]); echo ($address["save_area"]); ?>">
        <input type="text" name="order_price" value="<?php echo ($all_price); ?>">
        <input type="text" name="order_grade" value="<?php echo ($all_grade); ?>">
    </form>
 </div>
</section>


<script>
    //添加点击订单的事件
  $('input[name=but]').click(function(){
      //将数据进行拼接
//***************************获取地址的id
      var address_id=$('input[name=address]:checked').val();
      $('input[name=address_id]').val(address_id);
////******************将食品名字进行拼接，将名字进行遍历
      var foods_names=$('td[name=food_name]');
      var foods_name='';
      $.each(foods_names,function (k,v) {
          //将数据进行拼接
          foods_name+=$(v).html()+',';
      })
      foods_name=foods_name.slice(0,-1);
      $('input[name=foods_name]').val(foods_name);
////**********************将积分的名字进行拼接，再进行遍历
      var goods_names=$('td[name=good_name]');
      var goods_name='';
      $.each(goods_names,function (k,v) {
          //将数据进行拼接
          goods_name+=$(v).html()+',';
      })
      goods_name=goods_name.slice(0,-1);
      $('input[name=goods_name]').val(goods_name);
////**********************************************
      var user_id=$('input[name=usr_id]').val();
      var user_id=1;
      var  grade=$('span[name=all_grade]').html();
      var  price=$('span[name=all_price]').html();

var data={
    'user_id':user_id,
    'address_id':address_id,
    'foods_name':goods_name,
    'address_name':$('input[name=address_name]').val(),
    'order_price':$('input[name=order_grade]').val(),
    'grade':grade};
    //先将积分扣除，因为积分不属于支付宝
      //判断是否有积分商品
      if(grade==0)
      {
          //进行页面的跳转，提交按钮
          $('#sub').submit();
      }else
      {
          //获取积分
          $.ajax({
              'url':'/index.php/Home/Fdorder/flowgoods',
              'type':'post',
              'dataType':'json',
              'data':data,
              'success':function(res){
                  if(res.code!=1000)
                  {
                      alert(res.msg);
                      return false;
                  }else
                  {
                      //扣除成功，将积分商品的数据加入表单
                        //查看是否有商品
                      if(price==0)
                      {
                          alert('积分下单成功，即将返回首页');
                          location.href='/index.php/Home/Index/index';
                      }else
                      {
                          alert(res.msg);
                          //进行页面的跳转，提交按钮
                          $('#sub').submit();
                      }
                  }
              }
          })
      }












  })





</script>












<!--<section class="Psection MT20 Textcenter" style="display:none;" id="Aflow">-->
  <!--&lt;!&ndash; 订单提交成功后则显示如下 &ndash;&gt;-->
  <!--<p class="Font14 Lineheight35 FontW">恭喜你！订单提交成功！</p>-->
  <!--<p class="Font14 Lineheight35 FontW">您的订单编号为：<span class="CorRed">201409205134</span></p>-->
  <!--<p class="Font14 Lineheight35 FontW">共计金额：<span class="CorRed">￥359</span></p>-->
  <!--<p><button type="button" class="Lineheight35"><a href="#" target="_blank">支付宝立即支付</a></button><button type="button" class="Lineheight35"><a href="user_center.html">进入用户中心</button></p>-->
<!--</section>-->
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