<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: 二狗
 * Date: 2017/11/6
 * Time: 13:42
 */
header('content-type:text/html;charset=utf-8');

class CartController extends Controller
{
//展示购物车
public function index()
{
    //查询购物车里面不属于订单的商品，进行显示
    $data=D('cart')->where("is_order=0")->select();
    $cart=D('cart')->show_cart($data);
    //分配数据
    $this->assign('foods',$cart['foods']);
    $this->assign('goods',$cart['goods']);
    $this->assign('res',$cart['res_name']);
    $this->assign('all_price',$cart['all_price']);
    $this->assign('all_grade',$cart['all_grade']);
   //将页面进行展示
    $this->assign('cart',$cart);
   $this->display('list');
}
//**********************购物车进行改变时候数据表进行修改(商品)
public function change_food()
{
$id=I('post.id');
$num=I('post.num');
//对数据表进行修改
    $res=D('cart')->where("id=$id")->save(I('post.'));
//判断修改结果
    if($res!==false)
    {
        $return=[
            'code'=>1000,
            'msg'=>'success'
        ];
        $this->ajaxReturn($return);
    }else
    {
        $return=[
            'code'=>1001,
            'msg'=>'系统错误'
        ];
        $this->ajaxReturn($return);
    }


}
//对购物车里的数据进行删除的时候
public function del()
{
    $id=I('post.id');
   //进行删除
    $res=D('cart')->where("id=$id")->delete();
//   $res=true;
    //对数据进行判断
    if($res!==false)
    {
     //删除成功
      $return=[
          'code'=>1000,
          'msg'=>'success'
      ];
      $this->ajaxReturn($return);
    }else
    {
        //删除成功
        $return=[
            'code'=>1001,
            'msg'=>'error'
        ];
        $this->ajaxReturn($return);
    }


}










}