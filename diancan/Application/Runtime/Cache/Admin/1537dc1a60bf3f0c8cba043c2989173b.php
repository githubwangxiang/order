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
<title>餐馆分类</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 餐馆分类管理 <span class="c-gray en">&gt;</span> 餐馆分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a href="javascript:;" onclick="admin_permission_add('添加餐馆分类节点','/index.php/Admin/Cate/add','','310')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加餐厅分类</a></span>
		<span class="r">共有数据：<strong>54</strong> 条</span>
	</div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="7">餐馆分类</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="200">分类名称</th>
				<th width="200">所属分类</th>
			<!-- 	<th width="200">状态</th> -->
				<th width="200">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($cate)): $k = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($k % 2 );++$k;?><tr class="text-c">
				<td><input type="checkbox" value="<?php echo ($vol["id"]); ?>" name="id"></td>
				<td><?php echo ($k); ?></td>
				<?php if( $vol["pid"] == 0 ): ?><td class="text-l" style="color:red"><?php echo ($vol["cate_name"]); ?></td>
				<?php else: ?>
					<td class="text-l" >&ensp;&ensp;<?php echo ($vol["cate_name"]); ?></td><?php endif; ?>
				<td><?php if( $vol["name"] == null ): ?>顶级分类<?php else: echo ($vol["name"]); endif; ?></td>
				<!-- <td class="td-status"><span class="label label-success radius">已发布</span></td> -->
				<td class="f-14 td-manage">
					<a style="text-decoration:none" class="ml-5" onClick="cate_edit('分类编辑','/index.php/Admin/Cate/editCate/id/<?php echo ($vol["id"]); ?>')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a style="text-decoration:none" class="ml-5" onClick="cate_del(this,'<?php echo ($vol["id"]); ?>')"  href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
</div>

<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript">

/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-餐馆-添加*/
function admin_permission_add(title,url,w,h){
	layer_show(title,url,"900","500");
}
/*管理员-餐馆-编辑*/
function cate_edit(title,url,id,w,h){
    layer_show(title,url,id,w,h);
}

//删除分类
function cate_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/index.php/Admin/Cate/delCate',
			dataType: 'json',
			data:'id='+id,
			success: function(data){
			    console.log(data);
				/*$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});*/
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
</body>
</html>