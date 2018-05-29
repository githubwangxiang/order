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
	<form action="/index.php/Admin/Role/add" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="roleName" name="roleName">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">权限分配：</label>
			<div class="formControls col-xs-8 col-sm-9">
<?php if(is_array($first_auths)): $i = 0; $__LIST__ = $first_auths;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><dl class="permission-list">
		<dt>
			<label>
				<input type="checkbox" value="<?php echo ($value["id"]); ?>" name="user-Character-0[]" id="user-Character-1" class="ok1">
					<?php echo ($value["auth_name"]); ?>
			</label>
		</dt>
	<?php if(is_array($second_auths)): $i = 0; $__LIST__ = $second_auths;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if( $val["pid"] == $value["id"] ): ?><dd>
					<dl class="cl permission-list2">
						<dt>
							<label class="">
								<input type="checkbox" value="<?php echo ($val["id"]); ?>" name="user-Character-1-0[]" id="user-Character-1-0" >
								<?php echo ($val["auth_name"]); ?></label>
                             ----控制器名称：<?php echo ($val["auth_c"]); ?>
							 方法名称：<?php echo ($val["auth_a"]); ?>
						</dt>
					</dl>
				</dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</dl><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
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
$(function(){
	$(".permission-list dt input:checkbox").click(function(){

		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){

		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});

	//添加一个点击事件**************************************
	$(".permission-list2 dt input:checkbox").click(function(){
     //获取兄弟节点的选中个数
		var l=$(this).closest('dd').parent().find("dd input:checked").length;
		if(l<1)
		{
            $(this).closest('dd').parent().first().children().find("input[class=ok1]").prop('checked',false);
		}else
		{
            $(this).closest('dd').parent().first().children().find("input[class=ok1]").prop('checked',true);
        }
//    console.log($(this));
	})
//************************************************系统自带的表单提交

//	$("#form-admin-role-add").validate({
//		rules:{
//			roleName:{
//				required:true,
//			},
//		},
//		onkeyup:false,
//		focusCleanup:true,
//		success:"valid",
//		submitHandler:function(form){
//			$(form).ajaxSubmit();
//			var index = parent.layer.getFrameIndex(window.name);
//			parent.layer.close(index);
//		}
//	});


});

//********************************************给按钮添加判断以及请求
	$('#role-save').click(function(){
        //判断输入框的值是否为空
        var roleName=$('#roleName').val();
        //判断是否有空格
        var r=/\s/g;
        var res=r.test(roleName);
        if(roleName==''||res)
        {
            alert('输入值不可以为空以及包含空格');
            return false
        }

	})

</script>



<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>