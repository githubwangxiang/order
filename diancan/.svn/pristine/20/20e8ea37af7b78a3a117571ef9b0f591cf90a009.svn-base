<?php
namespace Home\Controller;
use Think\Controller;
class  ResController extends Controller{
		// 订单页
	public function index(){
			// 查询所有分类
			$cate = D('cate') -> select();
			// dump($cate);die;
			$this ->assign('cate',$cate);
			// 取指定分类下的商品
			$cate_3 = D('cate') -> where(['id' => 3]) ->find();
			$this -> assign('cate_3',$cate_3);
			// 取分类下的商品信息
	        $rest =D('restaurant') -> limit(0,4)-> select();
	        // dump($rest);die;
	        $this -> assign('rest',$rest);
	        // dump($rest);die;
			// 定义title页面
			$this -> assign('title','首页');
			// 推荐商家
			$art = D('Restaurant');
			// dump($art);
			// die;
			$this -> assign ('mend',$art -> get5());
			// 以下是翻页
			$model = D('Restaurant');
            //查询总记录数
		    $total = $model -> count();
		    //每页显示条数
		    $pagesize = 2;
		    //实例化Page类
		    $page = new \Think\Page($total, $pagesize);
		    //修改分页栏显示定制数组
		    $page -> setConfig('prev', '上一页');
		    $page -> setConfig('next', '下一页');
		    $page -> setConfig('first', '首页');
		    $page -> setConfig('last', '尾页');
		    $page -> setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		    //设置分页类的属性
		    $page -> rollPage = 4;
		    $page -> lastSuffix = false;
		    //获取分页栏的html代码 使用show方法
		    $page_html = $page -> show();
		    $this -> assign('page_html', $page_html);
		    //查询当前页数据
		    $data = $model -> limit($page -> firstRow, $page -> listRows) -> select();
		    //变量赋值
		    $this -> assign('data', $data);
			$this -> display();
		}
	// 商品详情页
	public function detail(){
		// 接收id参数
		$id = I('get.id',0,'intval');
		// dump($id);die;
    	// 查询商品表
    	$rest = D('Restaurant') -> where(['id' => $id]) -> find();
    	$this -> assign('rest',$rest);


    			// 以下是翻页
		$model = D('Restaurant');
            //查询总记录数
		    $total = $model -> count();
		    //每页显示条数
		    $pagesize = 2;
		    //实例化Page类
		    $page = new \Think\Page($total, $pagesize);
		    //修改分页栏显示定制数组
		    $page -> setConfig('prev', '上一页');
		    $page -> setConfig('next', '下一页');
		    $page -> setConfig('first', '首页');
		    $page -> setConfig('last', '尾页');
		    $page -> setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		    //设置分页类的属性
		    $page -> rollPage = 4;
		    $page -> lastSuffix = false;
		    //获取分页栏的html代码 使用show方法
		    $page_html = $page -> show();
		    $this -> assign('page_html', $page_html);
		    //查询当前页数据
		    $data = $model -> limit($page -> firstRow, $page -> listRows) -> select();
		    //变量赋值
		    $this -> assign('data', $data);
		    // 调用food表
		    $food = D('Food') ->limit(0,4)-> select();
		    $this -> assign('food',$food);
		$this -> display();
	}
    // 将数据添加到数据库
    public function restocart(){
    	// 接收数据
         //先判断是否登陆
    	if(!session('user_info.id'))
    	{
    		$return=[
               'code'=>1001,
               'msg'=>'weidenglu',
    		];
    		$this->ajaxreturn($return);
    	}



    	$data = I('post.data');
       //获取到的是二维数组，遍历将数据存到购物车
          //0 代表食物的id
    	 //1 代表数量
    	//2 代表是否是食物

    	foreach ($data as $key => $value) {
         D('cart')->addCart($value[0],$value[2],$value[1]);
    	            }

          $return=[
             'code'=>1000,
             'msg'=>'success'
          ];
$this->ajaxreturn($return);
          



    }
    // public function restdeet(){
    //   $shu = I('post.');
    //     if($shu['jf1']=='全部'){
    //     //获取全部商品数据
    //         $goods = D('Restaurant') -> select();
    //     }else{
    //     //获取商品数据
    //         $goods = D('Restaurant')-> where(['res_price' => ['EGT',$shu['jf1']],['res_price' => ['ELT',$shu['jf2']]]]) -> select();
    //     }
    //     //根据得到的数据 拼接html
    //     $msg = '';
    //     foreach ($goods as $vol) {
    //     	$msg="<li>
    //   <a href='__CONTROLLER__/detail/id/$vol[id]' target='_blank' title='调用产品名/店铺名'><img src='$vol[res_logo]'></a>
    //      <hgroup>
    //      <h3>$vol[res_name]</h3>
    //      <h4></h4>
    //      </hgroup>
    //      <p>菜系：tgy6g</p> 
    //      <p>地址：$vol[res_pro]$vol[res_city]$vol[res_area]$vol[res_address]</p>
    //      <p>人均：$vol[res_price]</p>
    //      <p>
    //      <span class='DSBUTTON'><a href='__CONTROLLER__/detail/id/$vol[id]' target='_blank' class='Fontfff'>点外卖</a></span>
    //     </p>
    //     </li>";
    //     }
    //     // ajax返回
    //     $return = array(
    //      'code' => 10000,
    //      'resdeets' => $msg
    //     );
    //     $this -> ajaxreturn($return);

    // }



//**************************************搜索餐厅的方法
public function select()
{
	$fenlei=I('post.fenlei');
    $dizhi=I('post.dizhi');
    $jiawei=I('post.jiawei');
   // dump($jiawei);//40-60元
   //去除元，获取到的是一个字符串
 $jiequ1=rtrim($jiawei,'元');
   //获取价格，去除 -,//获取到的是一个数组
 $jiequ2=explode('-',$jiequ1);
//  array(2) {
//   [0] =60;
//   [1] =80;
// }
 $min=$jiequ2[0];
 $max=$jiequ2[1];

 // dump(I('post.'));
     //连接数据库进行查询(将两个表进行连接查询)
    $res=D('Restaurant')->alias('t1')->join('join cate as t2 ')
         ->where('t1.cate_id=t2.id')
         ->where("t2.cate_name='$fenlei' and t1.res_pro='$dizhi' and res_price between $min and $max")
         ->select();
     // dump($res);
  // <li>
  //  <a href='detail/id/{$vol.id}' target='_blank' title='调用产品名/店铺名'><img src='{$vol.res_logo}'></a>
  //  <hgroup>
  //  <h3>{$vol.res_name}</h3>
  //  <h4></h4>
  //  </hgroup>
  //  <p>菜系：tgy6g</p> 
  //  <p>地址：{$vol.res_pro}{$vol.res_city}{$vol.res_area}{$vol.res_address}</p>
  //  <p>人均：{$vol.res_price}</p>
  //  <p>
  //   <span class='DSBUTTON'><a href='__CONTROLLER__/detail/id/{$vol.id}' target='_blank' class='Fontfff'>点外卖</a></span>
  //  </p>
  //  </li>
    // dump($res);
     foreach ($res as $vol) {
       // $html="";
       $html="
  <li>
   <a href='detail/id/$vol[id]' target='_blank' title='调用产品名/店铺名'><img src='
      $vol[res_logo]'></a>
   <hgroup>
   <h3>$vol[res_name]</h3>
   <h4></h4>
   </hgroup>
   <p>菜系：tgy6g</p> 
   <p>地址：$vol[res_pro]$vol[res_city]$vol[res_area]$vol[res_address]</p>
   <p>人均：$vol[res_price]</p>
   <p>
    <span class='DSBUTTON'><a href='__CONTROLLER__/detail/id/$vol[id]' target='_blank' class='Fontfff'>点外卖</a></span>
   </p>
   </li>
       ";
     }
 //ajax返回
   $return =array(
   	'code' => 10000,
   	'session' =>$html
   );
   $this -> ajaxreturn($return);
}


}


?>