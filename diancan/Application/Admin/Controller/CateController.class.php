<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends CommonController
{

   //判断是否存在
    public function iSet()
    {
      $data=I('post.');
      //得到分类名称
      $catename=$data['catename'];
      //得到所属分类
      $pid=$data['pid'];
      //判断分类是否存在
        $model=D('cate');
       $res=$model->where(['cate_name'=>$catename,'pid'=>$pid])->find();
       if($res)
       {
           //分类存在
           $return=array('code'=>10001,'msg'=>'该类别已存在');
           $this->ajaxReturn($return);
       }
       else
       {
           //分类不存在，向数据库里添加数据
           $r=$model->create($data);
           if($r)
           {
               $i = $model->add();
               if ($i) {//添加成功
                   $return = array('code' => 10000, 'msg' => '添加成功');
                   $this->ajaxReturn($return);
               }
               else
               {
                   $return = array('code' => 10002, 'msg' => '添加失败');
                   $this->ajaxReturn($return);
               }
           }
           else
           {
               $return=array('code'=>10003,'msg'=>'添加失败');
               $this->ajaxReturn($return);
           }
       }



    }

    public function dg($cate,$pid=0)
    {
        static $arr=[];
        foreach($cate as $k)
        {
            if($k['pid']==$pid)
            {
                $arr[]=$k;
                dg($cate,$k['id']);
            }
        }
        return $arr;
    }


    //餐馆分类列表
	public function index(){
		//实例化模型
		$cate = D('cate')->field('t1.*,t2.cate_name name')->alias('t1')->join('left join cate t2 on t1.pid=t2.id ')->select();
        $cate=recursion(0,$cate);
		$this->assign("cate",$cate);
		$this->display();
	}

	//添加餐馆分类
	public function add(){
		if(IS_POST)
		{
			//接收参数
			$data = I('post.');
			$res = D('Cate')->add($data);
			if($res){
				$this->success("添加成功",U("Admin/Cate/index"));
			}else{
				$this->error("添加失败");
			}
		}
		else
        {
			//查找所有的顶级分类
            $topcate=D('cate')->where(['pid'=>0])->select();
            $this->assign('topcate',$topcate);
            $this->display();
		}
	}

	//修改分类列表
	public function edit()
    {
		if(IS_POST)
        {

        }
        else
        {
           //一级的分类只能为一级，二级的分类可以修改为其他顶级的分类下的二级分类，
            //获得分类的id
            $id=I('get.id');
            //

        }
	}
	//删除分类
    public function delCate()
    {

    }


}
?>