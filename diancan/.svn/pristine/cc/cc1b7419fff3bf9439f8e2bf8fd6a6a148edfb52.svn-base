<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 登录控制器
*/
class LoginController extends Controller{
	public function login(){
	

		// 处理两个逻辑
	   if (IS_POST) {

	   	$data=I('post.');
	   	$login=$data['login'];
	   	$pwd=md5($data['pwd']);
	   	$res=D('manager')->where(['manager_name'=>$login,'manager_password'=>$pwd])->find();
	   	if($res)
	   	{
	   		//用户名和密码正确
	   		session('manager_info',$res);
	   		$return=array(
                 'Status'=>'ok'
	   	 	     );
	     	$this->ajaxReturn($return);
	   	}
	   	else
	   	{
	   		$return=array(
                 'Status'=>'false'
	   	 	     );
	     	$this->ajaxReturn($return);
	   	}
	   	 
	   	/*$data = I('post.');
	   	// 查询管理员信息
	   	$user = D('Manager') -> where(['manager_name' => $data['manager_name']]) -> find();
	   	if ($user && $user['manager_password'] == encrypt_password($data['password'])) {
	   		session('manager_info',$user);
	   		$this ->success('登陆成功',U('Admin/Index/index'));
	   	}else{
	   		$this -> error('登陆失败');
	   	}*/
	   }else{
     $this -> display();
       }
	}
	public function logout(){
		// 清空session
		session(null);
		// 跳转
		$this -> redirect('Admin/Login/login');
	}
}



?>