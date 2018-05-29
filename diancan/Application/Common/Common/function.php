
<?php
/**
 * Created by PhpStorm.
 * User: 二狗
 * Date: 2017/11/5
 * Time: 13:27
 */
header('content-type:text/html;charset=utf-8');
//********************************************递归函数（权限显示）
function recursion($pid=0,$data,$length=0)
{
    //设置静态变量存放改变之后的数据
    static $arr=[];
    //遍历数据
    foreach($data as $value)
    {
        //判断数据中是否有相关pid的数据
        if($value['pid']==$pid)
        {
            //找到顶级,设置length
            $value['length']=$length;
            //将数据放入$arr中
            $arr[]=$value;
            //继续递归
            recursion($value['id'],$data,$length+1);
        }
    }
    return $arr;
}
//密码加盐函数
function encrypt_password($password){
    //加盐
    $salt='dsjifoae;ssw';
    return md5(md5($password).$salt);
}

//手机隐藏4位
function encrypt_phone($data)
{
    return substr($data,0,4).'****'.substr($data,7);
}
//*****************************************时间戳转化为日期
function timetodate()
{
    return date('Y-m-d H:i:s',time());
}
//使用PHPMailer发送邮件函数
function sendmail($email, $subject, $body){
    require './Application/Tools/PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // 设置使用SMTP协议服务
    $mail->Host = 'smtp.qq.com';                          // 设置发件箱SMTP服务器
    $mail->SMTPAuth = true;                               // 开启SMTP权限认证
    $mail->Username = '1348743180@qq.com';                 // 发件箱帐号
    $mail->Password = 'pmcrtbnqcakwgaeb';                // 发件箱密码（授权码）
    $mail->SMTPSecure = 'tls';                            // 安全加密方式 tls 或者ssl
    $mail->Port = 25;                                    // 发送邮件使用的端口
    $mail->CharSet = "UTF-8";                               //设置邮件内容编码
    $mail->setFrom('1348743180@qq.com');                     //设置发件人（昵称可选）
    $mail->addAddress($email);                          // 添加收件人
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // 添加附件
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;                              //邮件主题
    $mail->Body    = $body;                                 //邮件正文内容
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        $error = $mail->ErrorInfo;
        return $error;
    } else {
        return true;
    }
}


