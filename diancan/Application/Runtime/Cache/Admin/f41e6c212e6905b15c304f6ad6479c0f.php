<?php if (!defined('THINK_PATH')) exit();?>﻿
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
<title>资讯列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加资讯" data-href="article-add.html" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a></span>  </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>订单编号</th>
					<th width="80">订单商品名称</th>
					<th width="80">用户名称</th>
					<th width="80">收件人名称</th>
					<th width="100">配送地址</th>
					<th width="150">下单时间</th>
					<th width="60">下单总金额</th>
					<th width="60">订单状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td name="id"><?php echo ($value["id"]); ?></td>
					<!--<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看">资讯标题</u></td>-->
					<td name="order_id"><?php echo ($value["order_id"]); ?></td>
					<td><?php echo ($value["foods_name"]); ?></td>
					<td><?php echo ($value["user_name"]); ?></td>
					<td><?php echo ($value["save_name"]); ?></td>
					<td><?php echo ($value["address_name"]); ?></td>
					<td><?php echo ($value["order_time"]); ?></td>
					<td><?php echo ($value["order_price"]); ?>
					<?php if( $value["is_food"] == 1): ?>元
					<?php else: ?>
						积分<?php endif; ?>
					</td>

					<!--将订单状态进行显示-->
					<td class="td-status" name="show_status" style="display: block">
						<?php if( $value["order_status"] == 0): ?><span class="label label-erroe radius">未付款</span>
							<?php else: ?>
						<span class="label label-success radius">已付款</span><?php endif; ?>
						<!--<span class="label label-success radius">已付款</span>-->
					</td>
                    <!--将订单状态进行编辑-->
					<td class="td-status" name="detail_status" style="display: none">
                             <select name="status">
								 <option value="0"><span class="label label-erroe radius">未付款</span></option>
								 <option value="1"><span class="label label-success radius">已付款</span></option>
							 </select>
					</td>



					<td class="f-14 td-manage">
						<!--<a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>-->
						<a style="text-decoration:none" class="ml-5" title="编辑" name="detail"><i class="Hui-iconfont" >&#xe6df;</i></a>
						<a style="text-decoration:none;display: none" class="ml-5" title="编辑" name="true" ><i class="Hui-iconfont" >&#xe615;</i></a>
						<a style="text-decoration:none;" name="del" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除" ><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/PublicAdmin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/PublicAdmin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/PublicAdmin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
//$('.table-sort').dataTable({
//	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
//	"bStateSave": true,//状态保存
//	"pading":false,
//	"aoColumnDefs": [
//	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
//	  {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
//	]
//});
//alert(1);
//给编辑图标添加修改时间
//显示编辑页面的函数
var detail=function (this_) {
    //将订单状态改变为可以编辑的状态
    $(this_).closest('tr').find('td[name=show_status]').css('display','none');
    $(this_).closest('tr').find('td[name=detail_status]').css('display','block');
    //将编辑按钮进行显示
    $(this_).closest('tr').find('a[name=true]').css('display','block');
    $(this_).closest('tr').find('a[name=detail]').css('display','none');
    $(this_).closest('tr').find('a[name=del]').css('display','none');

}


var list=function(){
       //刷新页面
	location.replace(local.href());
}

//点击编辑按钮将页面进行转换
	$('a[name=detail]').click(function () {
           //显示编辑页面
		detail(this);
    })
//点击确认按钮将页面进行转换
	$('a[name=true]').click(function(){
	    //发送ajax请求
		//获取订单编号
		var id=$(this).closest('tr').find('td[name=id]').html();
		//获取订单状态
		var order_status=$(this).closest('tr').find('select[name=status]').val();
		//发送ajax请求
		$.ajax({
             'url':'/index.php/Admin/Order/detail',
			 'data':'id='+id+'&status='+order_status,
			'dataType':'json',
			'type':'post',
			'success':function(res){
                 if(res.code==1000)
				 {
					 //页面刷新
                     parent.parent.layer.msg(res.msg,{icon:1,time:1500});
                     location.reload(true);
                 }else
				 {
                     parent.parent.layer.msg(res.msg,{icon:1,time:1500});
				 }


			}
		})
	})
//对删除按钮进行添加事件
	$('a[name=del]').click(function () {

	    var r=confirm('确认删除吗？');
        if(r==true)
		{
            //获取订单编号
            var id=$(this).closest('tr').find('td[name=id]').html();
            $.ajax({
                'url':'/index.php/Admin/Order/del',
                'data':'id='+id,
                'dataType':'json',
                'type':'post',
                'success':function(res){
                    if(res.code==1000)
                    {
                        //修改成功;
                        parent.parent.layer.msg(res.msg,{icon:1,time:1500});
                        location.reload(true);
                        //页面刷新
                    }else
                    {
                        layer.alert(res.msg);
                    }
                }
            })
		}




    })



</script> 
</body>
</html>