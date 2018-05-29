<?php if (!defined('THINK_PATH')) exit();?>﻿<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
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
<!--/meta 作为公共模版分离出去-->
<title>餐馆列表</title>
</head>
<body>
<div class="page-container">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 餐馆管理 <span class="c-gray en">&gt;</span> 餐馆列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
			<span class="l">
				<a class="btn btn-primary radius" onclick="article_add('添加餐馆','/index.php/Admin/Restaurant/add')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加餐馆</a></span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span>
	</div>
	<div class="page-container">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
			<tr class="text-c" width="1300">
				<th>ID</th>
				<th>餐馆名称</th>
				<th>餐馆省区</th>
				<th>餐馆市区</th>
				<th>餐馆区</th>
				<th>具体街道</th>
				<th>餐馆logo</th>
				<th>餐馆分类</th>
				<th>人均价格</th>
				<th>餐馆点击量</th>
				<th>餐馆销量</th>
				<th>上线时间</th>
				<th>所属卖家</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td><?php echo ($vol["id"]); ?></td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看"><?php echo ($vol["res_name"]); ?></u></td>
					<td><?php echo ($vol["res_pro"]); ?></td>
					<td><?php echo ($vol["res_city"]); ?></td>
					<td><?php echo ($vol["res_area"]); ?></td>
					<td><?php echo ($vol["res_address"]); ?></td>
					<td><a href="javascript:;"><img width="90" class="picture-thumb" src="<?php echo ($vol["res_logo"]); ?>"></a></td>
					<td><?php echo ($vol["cate_id"]); ?></td>
					<td><?php echo ($vol["res_price"]); ?></td>
					<td><?php echo ($vol["res_hit"]); ?></td>
					<td><?php echo ($vol["res_num"]); ?></td>
					<td><?php echo ($vol["res_ctime"]); ?></td>
					<td><?php echo ($vol["seller_name"]); ?></td>
					<td class="f-14 td-manage">
						<a style="text-decoration:none" class="ml-5" onClick="article_edit('餐馆编辑','/index.php/Admin/Restaurant/edit/id/<?php echo ($vol["id"]); ?>')"
						   href="javascript:void(0);" title="编辑">
							<i class="Hui-iconfont">&#xe6df;</i></a>
									</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
	</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $(function(){
        $('table').dataTable({
            "aLengthMenu":[[5,10,15,30,-1],["5","10","15","30","ALL"]]//二组数组，第一组数量，第二组说明文字;
        });
    });
/*餐馆-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*餐馆-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*餐馆-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
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