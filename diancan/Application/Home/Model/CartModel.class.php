<?php
namespace Home\Model;
use Think\Model;
/**
 * Created by PhpStorm.
 * User: 二狗
 * Date: 2017/11/6
 * Time: 17:03
 */
header('content-type:text/html;charset=utf-8');

class CartModel extends Model
{
 //*********************显示购物车的方法,将购物车里的数据进行完整化
    public function show_cart($cart)
    {
        //获取购物车里的所有的商品
        //需要的数据：店铺名（店铺链接），res表
        //商品名（商品链接），goods，foods表
        //原价，数量，单价，goods，foods表
        //  是否是商品
//        $cart=D('cart')->where("is_order=0")->select();
//***********************************将是否为商品的数据分开
        $foods=[];
        $goods=[];
     foreach ($cart as $k=>$v)
     {
         //如果是食品的话，放到foods中，否则放到goods中
         if($v['is_food']==1)
         {
            $foods[]=$cart[$k];
         }else
         {
             $goods[]=$cart[$k];
         }
     }
 //********************************将食品的数据与食品表和餐厅表连接进行完成

 $res_names=[];
  $all_price=0;
foreach ($foods as $k=>$v)
{
 //根据食品查找出
  //进行连表查询
    $res=D('food')->alias('t1')->join('restaurant as t2')
        ->field('t2.res_name,t1.res_id,t1.food_name,t1.id,t1.food_nowprice,t1.is_logo_small')
        ->where("{$v['food_id']}=t1.id and t1.res_id=t2.id")
        ->find();
    $foods[$k]['info']=$res;
    //将总价格计算好，方便前台显示
    $total=$res['food_nowprice']*$foods[$k]['num'];
    $foods[$k]['total']=$total;
    $all_price+=$total;
    if(!in_array($res['res_name'],$res_names))
    {
        $res_names[]=$res['res_name'];
    }
}

//*************************************将商品的数据与商品表进行连接查询
$all_grade=0;
foreach ($goods as $k=>$v)
{
 $res=D('goods')->where("id={$v['food_id']}")->find();
 $goods[$k]['info']=$res;
 $grade=$res['goods_grade']*$goods[$k]['num'];
 $goods[$k]['grade']=$grade;
 $all_grade+=$grade;
}
//将数据进行整合，返回控制器
        $data['foods']=$foods;
        $data['goods']=$goods;
        $data['res_name']=$res_names;
        $data['all_price']=$all_price;
        $data['all_grade']=$all_grade;
        return $data;
    }

//**************进行购物车数据的添加
//封装加入购物车的方法 这个方法是在控制器中去调用的
//控制器调用模型的方法时，需要传递三个参数
    public function addCart($food_id, $is_food, $num)
    {
        //将购物数据添加到购物车，根据登录状态判断
        //判断session中有没有登录标识
        if (session('?user_info')) {
            //已登录，数据添加到数据表
            //取这个数组的id赋值给user_id
            $user_id = session('user_info.id');
            $where = array(
                'user_id' => $user_id,
                'food_id' => $food_id,
                'is_order'=>0

            );
            $data = D('Cart')->where($where)->find();
            //查询当前数据表的数据，判断数据表中是否已经存在相同的购物商品的记录，那么只用添加这个商品的数量
            if ($data) {
                //已经存在相同的购物记录，累加购买数量
                $data['num'] += $num;
                //重新保存，修改覆盖 //修改成功返回受影响的记录条数
                $res = $this->save($data);
                //对$res的返回值作判断，返回的是true或者false
                return $res !== false;
            } else {
                //不存在相同的购物记录，直接添加
                $data = array(
                    'user_id' => $user_id,
                    'food_id' => $food_id,
                    'is_food' => $is_food,
                    'num' => $num
                );
                //添加成功返回添加的主键id值
                $res = $this->add($data);
                return $res ? true : false;
            }
        } else {
            $url = U('Home/User/login');
            echo "<script>alert('请登录！');location.href='$url';</script>";
        }
    }

//**************************将积分物品填入n 购物车
//积分添加到购物车
    public function addjfCart($goods_id, $is_food, $num)
    {
        if (session('?user_info')) {
            $user_id = session('user_info.id');
            $where = array(
                'user_id' => $user_id,
                'goods_id' => $goods_id,
                'is_food' => $is_food
            );
            $data = D('Cart')->where($where)->find();
            if ($data) {
                $data['num'] += $num;
                $res = $this->save($data);
                return $res !== false;
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'goods_id' => $goods_id,
                    'is_food' => $is_food,
                    'num' => $num
                );
                $res = $this->add($data);

                return $res ? true : false;
            }
        } else {
            $url = U('Home/User/login');
            echo "<script>alert('请登录！');location.href='$url';</script>";
        }
    }




}