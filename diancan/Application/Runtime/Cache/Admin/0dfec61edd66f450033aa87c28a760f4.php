<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
	<title>登录界面</title>
    <link href="/Public/Admin/css/default.css" rel="stylesheet" type="text/css" />
	<!--必要样式-->
    <link href="/Public/Admin/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/demo.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/loaders.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class='login'>
	  <div class='login_title'>
	    <span>管理员登录</span>
	  </div>
	  <div class='login_fields'>
	  	<form action="/index.php/Admin/Login/login" calss="from" method="post">

	    <div class='login_fields__user'>	
	      <div class='icon'>
	        <img alt="" src='/Public/Admin/img/user_icon_copy.png'>
	      </div>

              <input name="login" placeholder='用户名' maxlength="16" type='text' autocomplete="off" placeholder='请输入用户名'/>

	        <div class='validation'>
	          <img alt="" src='/Public/Admin/img/tick.png'>
	        </div>
	    </div>

	    <div class='login_fields__password'>
	      <div class='icon'>
	        <img alt="" src='/Public/Admin/img/lock_icon_copy.png'>
	      </div>

	    <input name="pwd" placeholder='密码' maxlength="16" type='text' autocomplete="off">

	  <div class='validation'>
	        <img alt="" src='/Public/Admin/img/tick.png'>
	      </div>
	    </div>

	    <div class='login_fields__password'>
	      <div class='icon'>
	        <img alt="" src='/Public/Admin/img/key.png'>
	      </div>
	      <input name="code" placeholder='验证码' maxlength="4" type='text' name="ValidateNum" autocomplete="off">
	      <div class='validation' style="opacity: 1; right: -5px;top: -3px;">
          <canvas class="J_codeimg" id="myCanvas" onclick="Code();">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
	      </div>
	    </div>

	<div class='login_fields__submit'>
	      <input type='button' value='登录'>
	    </div>
	  </div>
	  <div class='success'>
	  </div>
	  <div class='disclaimer'>
	    <p>欢迎登录后台管理系统  更多源码：<a href="http://www.mycodes.net/" target="_blank"></a></p>
	  </div>
	</form>
	</div>
	<div class='authent'>
	  <div class="loader" style="height: 44px;width: 44px;margin-left: 28px;">
        <div class="loader-inner ball-clip-rotate-multiple">
            <div></div>
            <div></div>
            <div></div>
        </div>
        </div>
	  <p>认证中...</p>
	</div>

	<div class="OverWindows"></div>
	
    <link href="/Public/Admin/login/layui/css/layui.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/Admin/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src='/Public/Admin/js/stopExecutionOnTimeout.js?t=1'></script>
    <script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/Particleground.js"></script>
    <script type="text/javascript" src="/Public/Admin/Js/Treatment.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mockjax.js"></script>
	<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>

	<script type="text/javascript">
		var canGetCookie = 0;//是否支持存储Cookie 0 不支持 1 支持
		var ajaxmockjax = 1;//是否启用虚拟Ajax的请求响 0 不启用  1 启用
		//默认账号密码
		var ds=0;
		var truelogin = "123456";
		var truepwd = "123456";
		
		var CodeVal = 0;
	    Code();
	    function Code() {
			if(canGetCookie == 1){
				createCode("AdminCode");
				var AdminCode = getCookieValue("AdminCode");
				showCheck(AdminCode);
			}else{
				showCheck(createCode(""));
			}
	    }
	    function showCheck(a) {
			CodeVal = a;
	        var c = document.getElementById("myCanvas");
	        var ctx = c.getContext("2d");
	        ctx.clearRect(0, 0, 1000, 1000);
	        ctx.font = "80px 'Hiragino Sans GB'";
	        ctx.fillStyle = "#E8DFE8";
	        ctx.fillText(a, 0, 100);
	    }
	    $(document).keypress(function (e) {
	        // 回车键事件  
	        if (e.which == 13) {
	            $('input[type="button"]').click();
	        }
	    });
	    //粒子背景特效
	    $('body').particleground({
	        dotColor: '#E8DFE8',
	        lineColor: '#133b88'
	    });
	    $('input[name="pwd"]').focus(function () {
	        $(this).attr('type', 'password');
	    });
	    $('input[type="text"]').focus(function () {
	        $(this).prev().animate({ 'opacity': '1' }, 200);
	    });
	    $('input[type="text"],input[type="password"]').blur(function () {
	        $(this).prev().animate({ 'opacity': '.5' }, 200);
	    });
	    $('input[name="login"],input[name="pwd"]').keyup(function () {
	        var Len = $(this).val().length;
	        if (!$(this).val() == '' && Len >= 5) {
	            $(this).next().animate({
	                'opacity': '1',
	                'right': '30'
	            }, 200);
	        } else {
	            $(this).next().animate({
	                'opacity': '0',
	                'right': '20'
	            }, 200);
	        }
	    });
	    var open = 0;
	    layui.use('layer', function () {
	        //非空验证
	        $('input[type="button"]').click(function () {
	            var login = $('input[name="login"]').val();
	            var pwd = $('input[name="pwd"]').val();
	            var code = $('input[name="code"]').val();
	            if (login == '') {
	                ErroAlert('请输入您的账号');
	            } else if (pwd == '') {
	                ErroAlert('请输入密码');
	            } else if (code == '' || code.length != 4) {
	                ErroAlert('输入验证码');
	            } else {
	                //认证中.

	             /*   fullscreen();
	                $('.login').addClass('test'); //倾斜特效
	                setTimeout(function () {
	                    $('.login').addClass('testtwo'); //平移特效
	                }, 300);

	                	//设置认证
	                ds=setTimeout(function () {
	                    $('.authent').show().animate({ right: -320 }, {
	                        easing: 'easeOutQuint',
	                        duration: 600,
	                        queue: false
	                    });
	                    $('.authent').animate({ opacity: 1 }, {
	                        duration: 200,
	                        queue: false
	                    }).addClass('visible');
	                }, 500);
*/
	                //登录
	                var JsonData = { login: login, pwd: pwd, code: code };
					//此处做为ajax内部判断
					var url = "";
					if(JsonData.code.toUpperCase() == CodeVal.toUpperCase()){
						url = "/index.php/Admin/Login/login";

					}else{
					/*	   //撤销特效
	                    $('.login').removeClass('test');
	                    $('.login').removeClass('testtwo');
	                         //撤销热证
	                         //清除定时器
	                         window.clearTimeout(ds);*/
	                         
					/*	 ErroAlert('验证码错误');exit();*/

				   layer.msg('验证码错误',{time:1500});exit();
                   
		 




					}
				
	                AjaxPost(url, JsonData,
	                                function () {
	                                    //ajax加载中
	                                },
	                                function (data) {
	                                    //ajax返回 
	                                    //认证完成
	                                    setTimeout(function () {
	                                        $('.authent').show().animate({ right: 90 }, {
	                                            easing: 'easeOutQuint',
	                                            duration: 600,
	                                            queue: false
	                                        });
	                                        $('.authent').animate({ opacity: 0 }, {
	                                            duration: 200,
	                                            queue: false
	                                        }).addClass('visible');
	                                        $('.login').removeClass('testtwo'); //平移特效
	                                    }, 2000);
	                                    setTimeout(function () {
	                                        $('.authent').hide();
	                                        $('.login').removeClass('test');
	                                        if (data.Status == 'ok') {
	                                            //登录成功
	                                            $('.login div').fadeOut(100);
	                                            $('.success').fadeIn(1000);
	                                            $('.success').html(data.Text);
												//跳转操作
												   parent.layer.msg('登录成功',{time:1500});
					                    setTimeout('location.href = "/index.php/Admin/Index/index"',1500);
	                                        } else {
	                               
	                                             layer.msg('用户名或密码错误',{time:1500});exit();
	                                        }
	                                    }, 2400);
	                                })
	            }
	        })
	    })
	    var fullscreen = function () {
	        elem = document.body;
	        if (elem.webkitRequestFullScreen) {
	            elem.webkitRequestFullScreen();
	        } else if (elem.mozRequestFullScreen) {
	            elem.mozRequestFullScreen();
	        } else if (elem.requestFullScreen) {
	            elem.requestFullscreen();
	        } else {
	            //浏览器不支持全屏API或已被禁用  
	        }
	    }  
		if(ajaxmockjax == 1){
			$.mockjax({  
				url: 'Ajax/Login',  
				status: 200,  
				responseTime: 50,          
				responseText: {"Status":"ok","Text":"登录成功</*br*/ /><br />欢迎回来"}  
			}); 
			$.mockjax({  
				url: 'Ajax/LoginFalse',  
				status: 200,  
				responseTime: 50,          
				responseText: {"Status":"Erro","Erro":"账号名或密码或验证码有误"}
			});   
		}

    </script>

</body>
</html>