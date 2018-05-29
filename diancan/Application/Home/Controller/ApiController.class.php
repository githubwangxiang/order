<?php
namespace Home\Controller;
use Think\Controller;
class ApiController extends Controller{
    //发送短信验证码
    public function sendmsg(){
        $phone = I('post.user_phone');
        //参数检测
        if(empty($phone)){
            $return = array(
                'code'=>10001,
                'msg'=>"参数不正确"
            );
            $this->ajaxReturn($return);
        }
       //检测发送频率
        $last_time =  session('register_time_' . $phone) ?  session('register_time_' . $phone) : 0;
        $time = time();
        if($time - $last_time < 60){
            //发送太频繁
            $return = array(
                'code'=>10003,
                'msg'=>'发送太频繁'
            );
        }

        //生成验证码
        $code = mt_rand(1000,9999);
        $content = "【传智播客】您用于注册的验证码为{$code}，如非本人操作，请忽略本短信。";
        $appkey="56094ca4632daa86455f007d61e3b113";
        $url="http://115.28.177.129:70/msgapi.php?mobile={$phone}&content={$content}&appkey={$appkey}";
        //使用封装的curl_request发送请求
        $res = curl_request($url);

        //解析数据
        $arr = json_decode($res,true);
        if($arr['code'] == 10000){
            //发送成功
            //记录发送时间,保存到session
            session('register_time_' . $phone,time());
            //记录发送的验证码,用于后续验证
            session('register_code_' . $phone,$code);
            $return = array(
                'code'=>10000,
                'msg'=>'success'
            );
            $this->ajaxReturn($return);
        }else{
            //发送失败
            $return = array(
                'code'=>10002,
                'msg'=>$arr['msg']
            );
            $this->ajaxReturn($return);
        }
    }

}
?>