<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/Admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/Public/Admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<title>新建网站角色 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="roleName" name="roleName" width="200px">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">权限分类：</label>
			<div class="formControls col-xs-8 col-sm-9">
                  <select name="lev" id="lev">
					  <option value="0" selected="selected">顶级权限</option>
					  <?php if(is_array($first_auth)): $i = 0; $__LIST__ = $first_auth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><option value="<?php echo ($value["id"]); ?>"><?php echo ($value["auth_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
			</div>
		</div>


		<div class="row cl" id="auth_c" style="display: none">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>控制器名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="authC" name="auth_c" width="200px">
			</div>
		</div>

		<div class="row cl" id="auth_a" style="display: none">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>方法名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="authA" name="auth_a" width="200px">
			</div>
		</div>







		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="button" class="btn btn-success radius" id="auth-role" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>

<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">

</script>
<!--/请在上方写此页面业务相关的脚本-->


<script >

$(function(){

//*************************************************点击事件
  $("#auth-role").click(function(){
//************************************************输入值的判断
        //判断输入框的值是否为空
        var roleName=$('#roleName').val();
        //判断控制器和方法名的值
        var auth_c=$('#authC').val();
        var atth_a=$('#authA').val();
        //判断是否有空格
        var r=/\s/g;
        //进行正则验证
        var res1=r.test(roleName);
        var res2=r.test(auth_c);
        var res3=r.test(atth_a);

        //如果是顶级权限，不用判断控制器和方法
        if($('select[name=lev]').val()==0)
        {
            if(roleName==''||res1)
            {
                layer.alert('输入值不可以为空以及包含空格');
                return false
            }

        }else
        {
            if(roleName==''||auth_c==''||atth_a==''||res1||res2||res3)
            {
                layer.alert('输入值不可以为空以及包含空格');
                return false;
            }

        }
//************************************************ajax
        //获取权限的等级
        var lev=$('#lev').val();
        var data={
            'role':roleName,
            'lev':lev,
            'authc':auth_c,
            'autha':atth_a
        };
        //发送ajax请求
        $.ajax({
            'url':'/index.php/Admin/Auth/add',
            'type':'post',
            'data':data,
            'dataType':'json',
            'success':function(result){
                if(result.code==1000)
                {
					alert(result.info);
                    window.parent.location.reload();
                    parent.layer.closeAll('iframe');
                }else
                {
					alert(result.info);
                }
            }
        })

    })

//***************************************************输入框的显示
 $('#lev').change(function(){
        //获取选择的数据
        var lev=$('select[name=lev]').val();
        if(lev==0)
        {
            $('#auth_c,#auth_a').hide();
        }else
        {
            $('#auth_c,#auth_a').show();
        }
    })




})



</script>

</body>
</html>