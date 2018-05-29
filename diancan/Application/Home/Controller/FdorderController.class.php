<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: 二狗
 * Date: 2017/11/7
 * Time: 12:30
 */
header('content-type:text/html;charset=utf-8');
class FdorderController extends Controller
{
//列表页的展示
 public function index()
    {
        $order_ids=I('get.cart_ids');
      //获取到的是成为订单的所有物品的id，将他们在购物车的is_order的字段名称改为1
        $save_data=['is_order'=>1];
        $order=D('cart')->where("id in ($order_ids)")->save($save_data);
        if($order==false)
        {
            echo "<script>parent.layer.alert('添加订单失败');
                   var index=parent.layer.getFrameIndex(window.name);
                    window.parent.location.reload();
                    parent.layer.close(index);
                 </script>";
        }
        //查询出订单商品，将订单商品进行展示
        $data=D('cart')->where("id in ($order_ids)")->select();
        $order_data=D('cart')->show_cart($data);
        //分配商品的数据
        $this->assign('foods',$order_data['foods']);
        $this->assign('goods',$order_data['goods']);
        $this->assign('res',$order_data['res_name']);
        $this->assign('all_price',$order_data['all_price']);
        $this->assign('all_grade',$order_data['all_grade']);
        //获用户地址的数据
//从session中获取用户的id
//        $user_id=session('user_info.id');
        $user_id=1;
        //查询用户的地址
        $address_data=D('address')->where("user_id=$user_id")->select();
        //将数据进行分配
        $this->assign('address_data',$address_data);
        //展示页面
        $this->display('list');

    }
//扣除积分商品
public function flowgoods()
{
    $grade=I('post.grade');
    $user_id=I('post.user_id');
    //获取用户的积分
    $user=D('user')->where("id=$user_id")->find();
    if($grade>$user['grade_num'])
    {
      $return=[
          'code'=>1002,
          'msg'=>'积分不足，请进入购物车进行商品修改'
      ];
      $this->ajaxReturn($return);
    }else
    {
        $user['grade_num']-=$grade;
        $data=['grade_num'=>$user['grade_num']];
        $res=D('user')->where("id=$user_id")->save($data);
        if($res!==false)
        {
            //扣除成功
            //建立积分订单
            $order_data=I('post.');
               //查询联系人地址
            $id=$order_data['address_id'];
            $address=D('address')->where("id=$id")->find();
            $address_name=$address['address'].$address['save_area'];
             //将数据加入到订单数据中
            $order_data['address_name']=$address_name;
            $order_data['order_status']=1;
            //添加积分订单，修改订单的默认值
            $order_data['is_food']=0;
            //进行添加，字段create
            if(!D('fdorder')->create($order_data))
            {
                $error=D('fdorder')->getError();
                $this->error($error);
            }
            $goods_order=D('fdorder')->add();
              if($goods_order!==false)
              {
                  //下商品订单成功
                  $return=[
                      'code'=>1000,
                      'msg'=>'积分商品已下单成功，请进行食品付款'
                  ];
                  $this->ajaxReturn($return);
              }
        }else
        {
            $return=[
                'code'=>1004,
                'msg'=>'系统繁忙'
            ];
            $this->ajaxReturn($return);
        }
    }
}
//扣除订单食品
public function flowfood()
{

    $order_data=I('post.');
    //查询联系人地址
    $id=$order_data['address_id'];
    $address=D('address')->where("id=$id")->find();
    $address_name=$address['address'].$address['save_area'];
    //将数据加入到订单数据中
    $order_data['address_name']=$address_name;
    //进行添加，字段create
    if(!D('fdorder')->create($order_data))
    {
        $error=D('fdorder')->getError();
        $this->error($error);
    }

    $food_order=D('fdorder')->add();
    //对结果进行判断，如果下单成功，将展示支付页面
    if($food_order==false)
    {
        echo "<script>parent.layer.alert('订单生成失败，稍后重试');
                   var index=parent.layer.getFrameIndex(window.name);
                    window.parent.location.reload();
                    parent.layer.close(index);
                 </script>";
            return false;
    }
    //进行支付宝页面展示
    //进行支付宝页面的跳转

    //需要查询生成订单的数据
    $food=D('fdorder')->where("id=$food_order")->find();
    $order_id=$food['order_id'];
    $order_price=$food['order_price'];

    $html="<form action='/Application/Tools/alipay/alipayapi.php'class='alipayform' method='post'  id='alipay'>
	<input type='text' name='WIDout_trade_no' id='out_trade_no' value='{$order_id}'>
	<input type='text' name='WIDsubject' value='已购商品'></div>
	<input type='text' name='WIDtotal_fee' value='{$order_price}'></div>
	<input type='text' name='WIDbody' value='即时到账'></div>
	</form> 
	<script >document.getElementById('alipay').submit();</script> ";
    echo $html;
}
//支付成功后，显示支付完成页面
public function orderend()
{
//将订单的状态改为已经付款
$data=I('get.');
//获取订单号
    $order_id=$data['out_trade_no'];
    $save_data=['order_status'=>1];
   $order=D('fdorder')->where("order_id=$order_id")->save($save_data);

//付款之后，获取session中的用户id
$id=session('user_info.id');
//$id=1;
    $total=$data['total_fee'];
$user=D('user')->where("id=$id")->find();
$grade=$user['num'];
$add=ceil($total/20);
$res=['grade_num'=>$grade+$add];
D('user')->where("id=$id")->save($res);

if($order==false)
{
    $this->error('付款成功，系统正在为你修改，请勿再次付款。。。');
}else
{
   //获取订单的金额
    $total=$data['total_fee'];
    //将数据分配
    $this->assign('total',$total);
    $this->display('orderend');
}








}
//异步请求页面
public function notify()
{
    $data=I('post.');
}

}