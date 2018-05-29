<?php
namespace Home\Model;
use Think\Model;
class RestaurantModel extends Model{
	//获取点击量
	public function get5(){
		$sql = "select a.id,a.res_name,a.res_logo,a.res_hit,c.cate_name from restaurant a JOIN cate c on a.cate_id=c.id order by a.res_hit desc limit 2";
		return $this -> select($sql);
	} 
}



?>
