<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<title>积分商品管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 积分商场管理 <span class="c-gray en">&gt;</span> 积分列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="80">ID</th>
					<th width="100">用户名</th>
					<th width="150">积分</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td><?php echo ($vol["id"]); ?></td>
					<td><?php echo ($vol["user_name"]); ?></td>
					<td class="td-status"><?php echo ($vol["grade_num"]); ?>
						<a style="text-decoration:none" class="edit" id="<?php echo ($vol["id"]); ?>" href="javascript:void(0);"><i class="Hui-iconfont">&#xe6df;</i></a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
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
/*无刷新分页*/
$(function(){
	$('table').dataTable({
        "aLengthMenu":[[5,10,15,30,-1],["5","10","15","30","ALL"]]//二组数组，第一组数量，第二组说明文字;
	});
});

$('.moduser').on('click', function(){
    var modurl = $(this).attr("modurl");    // 获取 要打开的链接地址
    $.layer({
        type: 2,
        title: '编辑管理员',
        maxmin: true,
        shadeClose: false, //开启点击遮罩关闭层
        area : ['800px', '460px'],
        offset : ['100px', ''],
        iframe: {src: modurl}    // 弹出层 iframe 要打开的链接地址
    });
});

/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
	layer.full(index);
	/*location.href=url;*/
}

/*图片-查看*/
function picture_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}


/*图片-编辑*/
function picture_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*图片-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
	    layer.close(index);
		$(obj)
	    $.ajax({
			type: 'POST',
			url: '/index.php/Admin/Goods/del/',
			dataType: 'json',
			data:'id='+id,
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
$(function(){
    $('.edit').click(function(){
        var id = $(this).attr('id');
        layer.prompt({title : '修改积分'},function(val, index){
            if(isNaN(val)){
                parent.layer.msg('参数不合法',{icon:2,time:1500});
			}else{
				$.ajax({
					type: 'POST',
					url: '/index.php/Admin/Goods/userEdit/',
					dataType: 'json',
					data:'grade_num='+ val +'&id=' +id,
					success: function(response){
						if(response.code==10000)
						{
							location.reload();
							parent.layer.msg(response.msg,{icon:1,time:1500});
						}else
						{
							location.reload();
							parent.layer.msg(response.msg,{icon:1,time:1500});
						}
					},
				});
            }
        layer.close(index);
    	});
	});
})
</script>
</body>
</html>