<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//查询食物
    	$food = D('Food')->limit(3)->select();
    	$this->assign('food',$food);

    	//查询餐馆
    	$rest = D('Restaurant')->distinct(true)->field('res_city')->limit(3)->select();
    	$this->assign('rest',$rest);
    	$city=array();
    	foreach($rest as $v)
    	{
          $city[]=$v['res_city'];
    	}
    	$this->assign('city',$city);
     	$this->display();
    }

    //点击点菜->城市获取食物
    public function foodCity()
    {
    	//接收餐馆的城市
    	$city= I('post.city');
         $foods=D('food')->field('t1.*')->alias('t1')->join('left join restaurant t2  on t1.res_id=t2.id')
        ->where("t2.res_city like '%$city%'")->select();
    
    	if($foods)
    	 {
		    $str='';
		    foreach($foods as $k=>$v)
		    {
		   $str.= ' <a href="__MODULE__/Food/detail/id/'.$v['id'].'" name="menu" target="_blank" title="'.$v['food_name'].'">
            <figure>
       		<img src="'.$v['is_logo_small'].'">
       		<figcaption>
      		<span class="title">'.$v['food_name'].'</span>
       		<span class="price"><i>￥</i>'.$v['food_nowprice'].'</span>
       		</figcaption>
     	    </figure>
            </a>';
		   }
		    	
		    	 $return=array('code'=>10000,
		                        'msg'=>'success',
		                        'data'=>$str
		    	 	);
		    	 $this->ajaxReturn($return);
		    }
		    else
		    {
		    	$return=array(
		    		'code'=>10001,
		            'msg'=>'暂无数据',
		    	 	);
		    	 $this->ajaxReturn($return);
		    }
	   }

	//点击餐馆->城市获取食物
   public function foodRes()
	{
		//接收餐馆的城市
    	$city= I('post.city');
    	 $rest=D('food')->field('t1.food_name,t2.*')->alias('t1')->join('left join restaurant t2  on t1.res_id=t2.id')
        ->where("t2.res_city like '%$city%'")->select();
       if($rest)
        {
    	$str='';
	    foreach($rest as $k=>$v)
	    {
	    	$str .= '<a href="__MODULE__/Res/detail/id/'.$v['id'].'" target="_blank" title="TITLE:'.$v['res_name'].'">
       <figure>
       <img src="'.$v['res_logo'].'">
       <figcaption>
       <span class="title">'.$v['res_name'].'</span>
       <span class="price">预定折扣：<i>8.9折</i></span>
       </figcaption>
       <p class="p1"><q>人均价格:'.$v['res_price'].'，提供免费WiFi。</q></p>
       <p class="p2">
       店铺评分：
       <img src="__PUBLIC__/Home/images/star-on.png">
       <img src="__PUBLIC__/Home/images/star-on.png">
       <img src="__PUBLIC__/Home/images/star-on.png">
       <img src="__PUBLIC__/Home/images/star-on.png">
       <img src="__PUBLIC__/Home/images/star-off.png">
       </p>
       <p class="p3">店铺地址：'.$v['res_pro'].$v['res_city'].$v['res_area'].$v['res_address'].'***'.$v['res_name'].'...</p>
       </figure>
       </a>';
        }
         $return=array('code'=>10000,
		                        'msg'=>'success',
		                        'data'=>$str
		    	 	);
		    	 $this->ajaxReturn($return);
		    }
		    else
		    {
		    	$return=array(
		    		'code'=>10001,
		            'msg'=>'暂无数据',
		    	 	);
		    	 $this->ajaxReturn($return);
		    }
		}
}