<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	//注册
	public function register(){
		//两个逻辑
		if(IS_POST){
			//表单提交
			$data = I('post.');
			/*if($data['user_phone']){
				//手机号注册,检测短信验证码
				$code = session('register_code_' . $data['user_phone']);
				if($data['code'] != $code){
					$this->error("验证码错误");
				}
				 //检测有效期 300s
                $send_time = session('register_time_' . $data['user_phone']);
                $time = time();
                if($time - $send_time > 300){
                    //验证码失效
                    $this->error("验证码失效");
                }
				//验证成功后,从session清空验证码
				session('register_code_' . $data['user_phone'],null);
				//如果是手机号登录,无需注册,将is_check字段设置为1,表示已激活状态
                $data['is_check'] = 1;
            }*/
            if($data['email']){
                //生成邮箱激活验证码
                $email_code = mt_rand(1000,9999);
                $data['email_code'] = $email_code;
            }
			
			$model = D('User');
			if(!$model->create($data)){
				//发生错误
				$error = $model->getError();
				$this->error($error);
			}
			//添加数据到数据表
			$res = $model->add();
			if($res){
				//注册成功
				//如果是邮箱注册,发送激活邮件
				if($data['email']){
                    $subject = "【十分钟点餐帐号激活】";
                    $url=U('Home/User/jihuo',array('id'=>$res,'code'=>$email_code),true,true);
                    $body="欢迎注册，请点击以下链接进行激活：
                    <br><a href='{$url}'>{$url}</a><br>如果点击链接无法跳转，请复制链接地址在浏览器地址栏打开";
                    //发送邮件
                    sendmail($data['email'],$subject,$body);
                }
				$this->success('注册成功',U('Home/User/login'));
			}else{
				//注册失败
				$this->error('注册失败');
			}
		}else{
			$this->display();
		}	
	}

	//ajax异步判断用户名是否可用
	public function checkname(){
		//接收参数
		$username = I('post.username');
		if(empty($username)){
			return ;
		}
		//查询数据库看用户名是否已经被注册
		$res = D('User')->where(['user_name'=>$username])->find();
		if($res){
			//用户名已经存在,不能使用
			$return = array(
				'code'=>10001,
				'msg'=>'用户名已经存在'
			);
			$this->ajaxReturn($return);
		}else{
			//用户名可以使用
			$return = array(
				'code'=>10000,
				'msg'=>'用户名可以使用'
			);
			$this->ajaxReturn($return);
		}
	}

	//登录
	public function login(){
		//两个逻辑
		if(IS_POST){
			//表单提交
			$data = I('post.');
			//验证码校验,使用验证码类的check方法
			$verify = new \Think\Verify();
			$check = $verify->check($data['code']);
			if(!$check){
				//验证码错误
				$this->error('验证码不正确');
			}
			//根据用户名查询用户表
			$user = D('User')->where("email ='{$data['username']}'")->find();
			  //or phone = '{$data['username']}
			if($user && $user['password'] == encrypt_password($data['password'])){
				if($user['is_check'] != 1){
                    //登录失败
                    $this->error("账号未激活");
                }
				//登录成功,设置登录标识
				session('user_info',$user);
				$id=$user['id'];
				$last_time = array('last_time'=>time());
				$res = D('User')->where(['id'=>$id])->save($last_time);
				if($res){
					echo "<script>alert('登录成功');location.href='/index.php/Home/Index/index';</script>";
					exit();

				}else{
					echo "<script>alert('登录失败');history.back();</script>";
					exit();
				}
			}else{
				//登录失败
				$this->error("用户名或密码错误");
			}
		}else{
			$this->display();
		}
	}

	//退出
	public function logout(){
		//清空session中的登录标识
		session(null);
		//跳转到首页
		$this->redirect('Home/Index/index');
	}

	 //邮箱账号激活
    public function jihuo(){
        //接收参数
        $data = I('get.');
        //判断邮箱是否已经被注册
        $user = D('User')->where(['id'=>$data['id']])->find();
        if($user && $user['email_code'] == $data['code']){
            //验证成功,进行激活
            $user['is_check'] = 1;
            D('User')->save($user);
            //激活成功,进行跳转
            $this->redirect('Home/User/login');
        }else{
            $this->error('用户不存在或者激活码错误');
        }
    }

    //生成验证码的方法
    public function captcha(){
    	ob_clean();   //清除缓存问题 
    	//自定义配置数组
    	$config = array(
    			'useCurve' => false,    //是否生成混淆曲线
    			'useNoise' => false,    //是否添加杂点
    			'length'   => 4,        //验证码位数
    		);
    	//实例化Verify类
    	$verify = new \Think\Verify($config);
    	//调用entry方法生成并输出验证码图片
    	$verify->entry();
    }
}
?>