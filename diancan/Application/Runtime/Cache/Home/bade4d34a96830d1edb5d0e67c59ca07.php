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
<form action="#">
 <div class="gwc" style=" margin:auto;">
  <table cellpadding="0" cellspacing="0" class="gwc_tb1">
    <tr>


      <td class="tb1_td3">商品</td>
      <td>&ensp;</td>
      <td class="tb1_td4">单价</td>
      <td class="tb1_td5">数量</td>
      <td class="tb1_td6">总价</td>
      <td class="tb1_td7">操作</td>
    </tr>
  </table>


<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res_val): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="gwc_tb2" id="table1" name="food">
    <tr name="res">
      <td colspan="7" class="shopname Font14 FontW" ><?php echo ($res_val); ?></td>
    </tr>
    <?php if(is_array($foods)): $i = 0; $__LIST__ = $foods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$food): $mod = ($i % 2 );++$i; if( $food['info']['res_name'] == $res_val ): ?><tr name="food">
          <td name="cart_id" style="display: none"><?php echo ($food['id']); ?></td>
          <td class="tb2_td1"><input type="checkbox" value="1" name="foodslist" id="newslist-1" /></td>
          <td class="tb2_td2"><img src="<?php echo ($food['info']['is_logo_small']); ?>"/></td>
          <td class="tb2_td3"><a href="detailsp.html" target="_blank"><?php echo ($food['info']['food_name']); ?></a></td>
          <td name="id" style="display: none"><?php echo ($food["id"]); ?></td>
          <td class="tb1_td4" >￥<span name="price"><?php echo ($food['info']['food_nowprice']); ?></span></td>
          <td class="tb1_td5">
            <input  name="reduce"  style="width:30px; height:30px;border:1px solid #ccc;" type="button" value="-" />
            <input  name="now"   type="text" value="<?php echo ($food['num']); ?>" style=" width:40px;height:28px; text-align:center; border:1px solid #ccc;" />
            <input  name="add" style="width:30px; height:30px;border:1px solid #ccc;" type="button" value="+" />
          </td>
          <td class="tb1_td6">
            <label id="total1" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;">¥<span name="tr_price"><?php echo ($food['total']); ?></span></label>
          </td>
          <td class="tb1_td7"><span   name="del">删除</span></td>
        </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </table><?php endforeach; endif; else: echo "" ;endif; ?>

   <table cellpadding="0" cellspacing="0" class="gwc_tb2" id="table2">
     <tr>
       <td colspan="7" class="shopname Font14 FontW">积分商场</td>
     </tr>
     <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><tr>
         <td name="cart_id" style="display: none"><?php echo ($good['id']); ?></td>
         <td class="tb2_td1"><input type="checkbox" value="1" name="goodslist" id="newslist-2" /></td>
         <td class="tb2_td2"><a href="detailsp.html" target="_blank"><img src="<?php echo ($good['info']['goods_logo']); ?>"/></a></td>
         <td class="tb2_td3"><a href="detailsp.html" target="_blank"><?php echo ($good['info']['goods_name']); ?></a></td>
         <td name="id" style="display: none"><?php echo ($good["id"]); ?></td>
         <td class="tb1_td4"><span name="grade"><?php echo ($good['info']['goods_grade']); ?></span>积分</td>
         <td class="tb1_td5">
           <input  name="grade_reduce"  style=" width:30px; height:30px;border:1px solid #ccc;" type="button" value="-" />
           <input  name="grade_now" type="text" value="<?php echo ($good['num']); ?>" style=" width:40px;height:28px; text-align:center; border:1px solid #ccc;" />
           <input  name="grade_add" style=" width:30px; height:30px;border:1px solid #ccc;" type="button" value="+" />
         </td>
         <td class="tb1_td6">
           <label id="total2" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"><span name="tr_grade"><?php echo ($good['grade']); ?></span>积分</label>
         </td>
         <td class="tb1_td7"><span  name="del">删除</span></td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
   </table>


  <table cellpadding="0" cellspacing="0" class="gwc_tb3">
    <tr>
      <td class="tb1_td1"><input id="checkAll"  type="checkbox" /></td>
      <td class="tb1_td1">全选</td>
      <td class="tb3_td1"><input id="invert" type="checkbox" />
        &nbsp;&nbsp;&nbsp;反选
<!--        <input id="cancel" type="checkbox" />
        取消 </td>-->
      <!--<td class="tb3_td2 GoBack_Buy Font14"><a href="#" target="_blank">继续购物</a></td>-->
      <td class="tb3_td2">已选商品
        <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;"><span id="all_num">0</span></label>
        件</td>
      <td class="tb3_td3">合计:

        <span style=" color:#ff5500;">
        <label id="zong1" style="color:#ff5500;font-size:14px; font-weight:bold;">
          <span id="all_price">0</span>
          元,
          <span id="all_grade">0</span>
          积分
        </label>
        </span></td>
      <td class="tb3_td4">
        <span id="jz1">结算</span>
        <a href=" " style=" display:none;"  class="jz2" id="jz2">结算</a>
      </td>
    </tr>
  </table>
</div>
</form>
<!--End content-->
<script>
  $(function () {

//计算总金额的函数
      var all_price=function(){
          //获取所有的选中的name=foodslist标签
          var all_foodscheck=$('input[name=foodslist]:checked');
          var  num=0;
          $.each(all_foodscheck,function (k,v) {
              //将数据进行相加
              num+=$(v).parent().parent().find('span[name=tr_price]').html()*1;

          })
          //将数据展示到总价
          $('#all_price').html(num);
          account();
      }
//计算总积分的函数
      var all_grade=function(){
          //获取所有的选中的name=foodslist标签
          var all_goodscheck=$('input[name=goodslist]:checked');
          var  num=0;
          $.each(all_goodscheck,function (k,v) {
              //将数据进行相加
              num+=$(v).parent().parent().find('span[name=tr_grade]').html()*1;
          })
          //将数据展示到总价
          $('#all_grade').html(num);
          account();
      }
//计算总数量的函数
      var all_num=function(){
          //获取所有选中的按钮
          var all=$('input:checked');
          //遍历按钮
          var num=0;
          $.each(all,function(k,v){
              //如果是食物栏的选框
//              alert(all.length);
                if($(v).closest('tr').find("input[name=foodslist]").attr('checked'))
                {
                    num+=$(v).closest('tr').find("input[name=now]").val()*1;
                }
//              如果是商品栏的选框
              if($(v).closest('tr').find("input[name=goodslist]").attr('checked'))
              {
                  num+=$(v).closest('tr').find("input[name=grade_now]").val()*1;
              }
          })
          //将总数显示到页面
          $('#all_num').html(num);
      }

//食物价格的管理
  //当这一行数据发生改变的时候，发送ajax请求
      var change_food =function(this_,value,id)
      {
          //当前对象，当前的数量，当前的商品id，从get地址栏获取
          //发送ajax请求
          //改变购物车里面的数量
           $.ajax({
               'url':'/index.php/Home/Cart/change_food',
               'type':'post',
               'data':'id='+id+'&num='+value,
               'dataType':'json',
               'success':function(res){
                  if(res.code!=1000)
                  {
                      //数据修改失败
                      alert('系统错误。。');
                  }else
                  {
                      //数据修改成功，对页面进行操作
                      //获取数量
                      var price=$(this_).parent().parent().find('span[name=price]').text();
                      var total=(value*1)*(price*1);
                      //将数据展示到结算页面
                      //找到离它最近的tr
                      $(this_).parent().parent().find('span[name=tr_price]').html(total);
                      //判断选框是否选中，选中的话，将总价进行修改(食物)
                      if($(this_).closest('tr').find('input[name=foodslist]').attr('checked'))
                      {
                          //选中，对总价进行修改
                          all_price();
                          //对总数量进行修改
                          all_num();
                      }
                  }
               }
           })

      }
  //防止用户恶意点击的函数
      var flag=null;
      var more_hit=function(fn,this_,value,id){
          if(flag)
          {
              clearTimeout(flag);
          }
          flag=setTimeout(function () {
              fn(this_,value,id);
          },1000);
      }

//添加事件 添加(食物)
      $('input[name=add]').click(function ()
      {
          //获取选框中的值，它的前一个选框,将数据添加1
          var value=$(this).parent().find('input[name=now]').val();
          //将数据添加1
          value++;
          $(this).parent().find('input[name=now]').val(value);
          var id=$(this).closest('tr').find('td[name=id]').html();
          //用户点击完毕1.5秒后再进行ajax提交
//          change_food(this,value,id)
          more_hit(change_food,this,value,id);

      })
//添加事件 减少（食物）
      $('input[name=reduce]').click(function ()
      {
          //获取选框中的值，它的前一个选框,将数据添加1
          var value=$(this).parent().find('input[name=now]').val();
          if(value<=1)
          {
//              alert('请输入正确数据');
//              $('#jz1').show();
//              $('#jz2').hide();
//              return false;
              value=2;
          }
          //将数据减1
          value--;
          $(this).parent().find('input[name=now]').val(value);
          var id=$(this).closest('tr').find('td[name=id]').html();
//          change_food(this,value,id);
          more_hit(change_food,this,value,id);
      })
//当选框改变发送ajax(食物)
      $('input[name=now]').change(function(){
        //首先进行正则判断
          var r=/[0-9]+/;
          var value=$(this).val();
          var res=r.test(value);
        if(!res)
        {
            alert('请输入正确数据');
            $('#jz1').show();
            $('#jz2').hide();
            return false;
        }
          if(value<=0)
          {
              alert('请输入正确数据');
              $('#jz1').show();
              $('#jz2').hide();
              return false;
          }
        if(value>50)
        {
            alert('库存最多数量50');
            $('#jz1').show();
            $('#jz2').hide();
            return false;

        }
          var id=$(this).closest('tr').find('td[name=id]').html();
//          change_food(this,value,id);
          more_hit(change_food,this,value,id);
      })
//**********************************************商品价格的管理
 //当这一行数据发生改变的时候，发送ajax请求
      var change_goods =function(this_,value,id)
      {
          //当前对象，当前的数量，当前的商品id，从get地址栏获取
          //发送ajax请求
          //改变购物车里面的数量
          $.ajax({
              'url':'/index.php/Home/Cart/change_food',
              'type':'post',
              'data':'id='+id+'&num='+value,
              'dataType':'json',
              'success':function(res){
                  if(res.code!=1000)
                  {
                      //数据修改失败
                      alert('系统错误。。');
                  }else
                  {
                      //数据修改成功，对页面进行操作
                      //获取数量
                      var price=$(this_).parent().parent().find('span[name=grade]').text();
                      var total=(value*1)*(price*1);
                      //将数据展示到结算页面
                      //找到离它最近的tr
                      $(this_).parent().parent().find('span[name=tr_grade]').html(total);
                      //判断选框是否选中，选中的话，将总价进行修改(食物)
                      if($(this_).closest('tr').find('input[name=goodslist]').attr('checked'))
                      {
                          //选中，对总价进行修改
                          all_grade();
                          //对总数量进行修改
                          all_num();
                      }

                  }
              }
          })

      }
//添加事件 添加（商品）
      $('input[name=grade_add]').click(function ()
      {
          //获取选框中的值，它的前一个选框,将数据添加1
          var value=$(this).parent().find('input[name=grade_now]').val();
          //将数据添加1
          value++;
          $(this).parent().find('input[name=grade_now]').val(value);
          var id=$(this).closest('tr').find('td[name=id]').html();
//          change_goods(this,value,id);
          more_hit(change_goods,this,value,id);
      })
//添加事件 减少（商品）
      $('input[name=grade_reduce]').click(function ()
      {
          //获取选框中的值，它的前一个选框,将数据添加1
          var value=$(this).parent().find('input[name=grade_now]').val();
          if(value<=1)
          {
//              alert('请输入正确数据');
//              $('#jz1').show();
//              $('#jz2').hide();
//              return false;
              value=2;
          }
          //将数据-1
          value--;
          $(this).parent().find('input[name=grade_now]').val(value);
          var id=$(this).closest('tr').find('td[name=id]').html();
//          change_goods(this,value,id);
          more_hit(change_goods,this,value,id);
      })
//当选框改变发送ajax（商品）
      $('input[name=grade_now]').change(function(){
          //首先进行正则判断
          var r=/[0-9]+/;
          var value=$(this).val();
          var res=r.test(value);
          if(!res)
          {
              alert('请输入正确数据');
              $('#jz1').show();
              $('#jz2').hide();
              return false;
          }
          if(value<=0)
          {
              alert('请输入正确数据');
              $('#jz1').show();
              $('#jz2').hide();
              return false;
          }
          if(value>299)
          {
              alert('库存最多数量300');
              $('#jz1').show();
              $('#jz2').hide();
              return false;
          }
          var id=$(this).closest('tr').find('td[name=id]').html();
//          change_goods(this,value,id);
          more_hit(change_goods,this,value,id);
      })
//*****************************************************选框事件的添加
//判断选中时候是否出发全选
var all_check=function ()
{
    //获取选中的按钮
    var all=$('input[name=foodslist]').length+$('input[name=goodslist]').length;
    var check=$('input[name=foodslist]:checked').length+$('input[name=goodslist]:checked').length;
    if(all==check)
    {
        //全选选中
        $('#checkAll').attr('checked',true);
    }else
    {
        $('#checkAll').attr('checked',false);
    }
}
//***************食品
$('input[name=foodslist]').change(function(){
     all_check();
    //当复选框按钮状态发生改变的时候
    all_price();
    all_num();
})
//***************商品
$('input[name=goodslist]').change(function(){
  //当复选框按钮状态发生改变的时候
  all_check();
  all_grade();
  all_num();
})
//*********************************************全选按钮的事件
$('#checkAll').change(function(){
   //判断是否选中
   if($(this).attr('checked'))
   {
       //如果选中的话，将全部选中
       $('input[name=foodslist]').attr('checked',true);
       $('input[name=goodslist]').attr('checked',true);
       //进行数据的计算
       all_price();
       all_grade();
       all_num();
   }else
   {
       //如果选中的话，将全部选中
       $('input[name=foodslist]').attr('checked',false);
       $('input[name=goodslist]').attr('checked',false);
       //进行数据的计算
       all_price();
       all_grade();
       all_num();
   }
})
//*********************************************反选按钮的事件
  $('#invert').change(function(){
          //如果选中的话，将全部选中
      $.each($('input[name=foodslist]'),function(k,v){
          $(v).attr('checked',!$(v).attr('checked'));
      })
      $.each($('input[name=goodslist]'),function(k,v){
          $(v).attr('checked',!$(v).attr('checked'));
      })
              all_check();
              //进行数据的计算
              all_price();
              all_grade();
              all_num();
      })
//****************************************删除按钮的事件
 //判断店铺下是否还有菜，没有的话，进行清除
var del_table=function(){
    var tables=$('table[name=food]');
    //进行遍历
      $.each(tables,function(k,v){
            if($(v).find('span[name=del]').length==0)
            {
                $(v).remove();
            }
      })
}
$('span[name=del]').click(function () {
    var r=confirm('确认删除吗？');
    if(r)
    {
        //获取当前的id
        var id=$(this).closest('tr').find('td[name=id]').html();
        var this_=this;
        //发送ajax请求
        $.ajax({
            'url':'/index.php/Home/Cart/del',
            'data':'id='+id,
            'type':'post',
            'dataType':'json',
            'success':function(res)
            {
                if(res.code==1000)
                {
                    //删除成功，移除标签，重新计算
                    alert('删除成功');
                    $(this_).closest('tr').remove();
                    del_table();
                    all_price();
                    all_grade();
                    all_num();
                }else
                {
                    //删除失败
                    alert('系统异常，删除失败');
                }
            }
        })
    }
})
//***************************************结算按钮
var account=function(){
    //判断数据是否存在
    var all_price=$('#all_price').html();
    var all_grade=$('#all_grade').html();
    if(all_price<=0||all_grade<=0)
    {
        //显示为不可结算
        $('#jz1').show();
        $('#jz2').hide();
    }

    if(all_price==0&&all_grade==0)
    {
        //显示为不可结算
        $('#jz1').show();
        $('#jz2').hide();
    }else
      {
          $('#jz1').hide();
          $('#jz2').show();
      }
}
  //*************************************真正的结算按钮进行页面跳转
  $('#jz2').click(function(){
      var all_price=$('#all_price').html();
      var all_grade=$('#all_grade').html();
      var all_num=$('#all_num').html();
      if(all_price<0||all_grade<0||all_num<=0)
      {
          alert('请检查数据');
          //显示为不可结算
          $('#jz1').show();
          $('#jz2').hide();
          return false;
      }
      //获取需要传递的参数
      var cart_ids='';
//将所有的购物车id 进行拼接
      var td_cart_ids=$('input:checked').parent().parent().find('td[name=cart_id]');
//      var td_cart_ids=$('td[name=cart_id]');
      //进行遍历以及字符串的拼接
      $.each(td_cart_ids,function(){
          cart_ids+=$(this).html()+',';
      })
      //去除最后的逗号
      cart_ids=cart_ids.slice(0,-1);
//     将页面进行跳转
//      修改跳转属性
      $('#jz2').attr('href','/index.php/Home/Fdorder/index/cart_ids/'+cart_ids);
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