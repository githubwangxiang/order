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
<title>商家列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商家管理 <span class="c-gray en">&gt;</span> 商家列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
		<a href="javascript:void(0);" onclick="dataDel(this)" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a class="btn btn-primary radius" data-title="添加入驻商家" data-href="" onclick="seller_add('添加入驻商','/index.php/Admin/Seller/addSeller')" href="javascript:void(0);"><i class="Hui-iconfont">&#xe600;</i> 添加入驻商家</a></span> <span class="r">共有数据：<strong id='stro'><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">姓名</th>
					<th width="80">身份证号</th>
					<th width="80">性别</th>
					<th width="120">电话</th>
					<th width="75">邮箱</th>
					<th width="60">入驻时间</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($seller)): $k = 0; $__LIST__ = $seller;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($k % 2 );++$k;?><tr class="text-c">
							<td><input type="checkbox" value="<?php echo ($vol["id"]); ?>" name="id"></td>
							<td><?php echo ($k); ?></td>
							<td class="text-l"><u style="cursor:pointer" class="text-primary"  title="查看"><?php echo ($vol["seller_name"]); ?></u></td>
							<td><?php echo ($vol["seller_ic"]); ?></td>
						    <td><?php if( $vol["seller_sex"] == 0 ): ?>男<?php elseif( $vol["seller_sex"] == 1 ): ?>女<?php else: ?>保密<?php endif; ?></td>
							<td><?php echo ($vol["seller_phone"]); ?></td>
							<td><?php echo ($vol["seller_email"]); ?></td>
						    <td><?php echo (date("y-m-d",$vol["seller_createtime"])); ?></td>
							<td class="f-14 td-manage">
								<a style="text-decoration:none" class="ml-5" onClick="article_edit('商家编辑','/index.php/Admin/Seller/editSeller/id/<?php echo ($vol["id"]); ?>')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
								<a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<?php echo ($vol["id"]); ?>')"  href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
$(function(){

      $('table').DataTable({
          "aLengthMenu":[[2,10,15,30,-1],["2","10","15","30","ALL"]]//二组数组，第一组数量，第二组说明文字;

      });

});
//给批量删除添加点击事件,使用ajax异步删除

function dataDel()
{
    //获取所有选中的复选框
	 var obj=$('input[type=checkbox][name=id]:checked');
	 var dat=[];
	 for(var i=0;i<obj.length;i++)
	 {
		 dat[i]=$(obj[i]).val();
	 }
	//判断是否有可删除的数据
	if(dat.length==0)
	    layer.alert('请选择数据');
	 else
	{
	    //发送ajax请求
		$.ajax({
			'url':'/index.php/Admin/Seller/delData',
			'data':'dat='+dat,
			'type':'post',
			'dataType':'json',
			'success':function(re){
               if(re.code==10000)
			   {
                   //删除成功，从页面上移除
			     for(var j=0;j<obj.length;j++)
				 {
                    $(obj[j]).parent().parent().remove();
				 }


			   }
               else
                   layer.alert('删除失败');
			}
		})
	}


}


/*资讯-添加*/
function seller_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-删除*/
function article_del(obj,id){
/*	window.confirm('确认要删除吗？');
    $.ajax({
        url: '/index.php/Admin/Seller/delSeller',
        type: 'POST',
        data:'id='+id,
        dataType: 'json',
        success: function(data){
            /!*$(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});*!/
        },
        error:function(data) {
            console.log(data.msg);
        }
    });*/
    layer.confirm('确认要删除吗？',function(index){
            layer.close(index);
            $.ajax({
                url: '/index.php/Admin/Seller/delSeller',
                type: 'POST',
                data:'id='+id,
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                     //修改总条数
					 var count=$('#stro').html();
					 alert(count);
					 count--;
					 $('#stro').html(count);
                    layer.msg('已删除!',{icon:1,time:1000});

                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
	}
	);
}

/*资讯-审核*/
function article_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过','取消'], 
		shade: false,
		closeBtn: 0
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});	
}
/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*资讯-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*资讯-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

</script> 
</body>
</html>