<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller{
    //积分商品列表
    public function index(){
        //获取积分商品数据
        $goods = D('Goods') -> select();
        $this -> assign('goods',$goods);
        //获取餐馆数据
        $restaurant = D('Restaurant') -> limit(0,4) -> select();
        $this -> assign('restaurant',$restaurant);
        $this -> display();
    }
    //积分商品详情页
    public function detail(){
        $id = I('get.id');
        $goods = D('Goods') -> find($id);
        $this -> assign('goods',$goods);
        $food = D('Food')  -> order('food_sale desc') -> limit(0,2) -> select();
        $this -> assign('food',$food);
        $this -> display();
    }
    //加入购物车
    public function addcart(){
        //处理表单提交
        if(IS_POST){
            //post方式提交表单
            $data = I('post.');
            if(!$data['food_id'] || $data['is_food'] || !$data['num']){
                echo  "<script>alert('参数异常');</script>";die;

            }
            $res = D('Cart') ->addCart($data['food_id'],$data['is_food'],$data['num']);
            if($res){
                $this->redirect('Home/Cart/index');
            }else{
                echo  "<script>alert('服务器异常');</script>";die;
            }
        }else{
            $this->redirect('Home/Index/index');
        }
    }
    //条件筛选积分商品
    public function getGrade(){
        $tiaojian = I('post.');
        if($tiaojian['jf1']=='全部'){
        //获取全部积分商品数据
            $goods = D('Goods') -> select();
        }else{
        //获取积分商品数据
            $goods = D('Goods')-> where(['goods_grade' => ['EGT',$tiaojian['jf1']],['goods_grade' => ['ELT',$tiaojian['jf2']]]]) -> select();
        }
        //根据得到的积分商品数据 拼接好html 为了替换原先的html
        $msg='';
        foreach ($goods as $vol){
            $msg.= "<li>
                    <a href='__MODULE__/Goods/detail/id/$vol[id]' target='_blank' title='$vol[goods_name]'>
                        <img src='$vol[goods_logo]'>
                        <p class='Overflow'>$vol[goods_name]</p>
                        <p class='Overflow'>消耗：<span class='CorRed Font16'>$vol[goods_grade]</span>积分<i></i></p>
                    </a>
                  </li>";
        }
        //ajax返回
        $return = array(
            'code' => 10000,
            'gradegoods' => $msg
        );
        $this -> ajaxReturn($return);
    }

}