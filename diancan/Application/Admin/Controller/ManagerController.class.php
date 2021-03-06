<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: 二狗
 * Date: 2017/11/4
 * Time: 21:42
 */

class ManagerController extends CommonController
{
//***********************显示后管理员首页
public function index(){
    	//获取数据
        $infos=D('manager')->alias('t1')
                ->join("join role as t2 on t1.role_id=t2.id")
                ->field('t1.*,t2.role_name')
                ->select();
        //展示数据
        $this->assign('infos',$infos);
        $this->display('list');
    }
//*****************************管理员的添加
public function add()
    {
        if(IS_POST)
        {
          $info=I('post.');
          //进行数据的添加,自动添加时间字段
          $data=[
             'manager_name'=>$info['adminName'],
             'manager_password'=>md5($info['password']),
             'sex'=>$info['sex'],
             'phone'=>$info['phone'],
             'email'=>$info['email'],
             'role_id'=>$info['adminRole'],
          ];
         //进行数据的添加
            $model=D('manager');
         if(!$model->create($data))
         {
             //添加失败
             echo "<script>parent.layer.alert('数据错误');
                   var index=parent.layer.getFrameIndex(window.name);
                    window.parent.location.reload();
                    parent.layer.close(index);
                 </script>";
         }
         $res=$model->add();
         //进行判断
            if($res!==false)
            {
                //添加成功
                echo "<script>parent.layer.alert('添加成功');
                   var index=parent.layer.getFrameIndex(window.name);
                    window.parent.location.reload();
                    parent.layer.close(index);
                 </script>";
            }else
            {
                //添加失败
                echo "<script>parent.layer.alert('添加失败');
                   var index=parent.layer.getFrameIndex(window.name);
                    window.parent.location.reload();
                    parent.layer.close(index);
                 </script>";
            }
        }else
        {
            //获取所有的角色名称，供管理员选择使用
            $roles=D('role')->select();
            $this->assign('roles',$roles);
            $this->display('add');
        }

    }
//******************************ajax判断（管理员添加的时候是否重名）
public function names()
{
   //获取数据
    $name=I('post.name');
    //判断是否存在
    $res=D('Manager')->where("manager_name='$name'")->find();
    if($res)
    {
      $return=[
          'code'=>1001,
          'msg'=>'用户名已经存在'
      ];
      $this->ajaxReturn($return);
    }



}
//*******************************对管理员进行编辑
public function detail()
{
    if(IS_POST)
    {

        $info=I('post.');
        $id=I('post.id');
        //进行数据的修改
        $data=[
            'manager_name'=>$info['adminName'],
            'sex'=>$info['sex'],
            'phone'=>$info['phone'],
            'email'=>$info['email'],
            'role_id'=>$info['adminRole'],
        ];
        $res=D('manager')->where("id=$id")->save($data);
        if($res!==false)
        {
            echo "<script>
     //获取当前frame索引
     var index=parent.layer.getFrameIndex(window.name);
     //刷新父级页面
     window.parent.location.reload();
     //弹出提示信息
     parent.parent.layer.msg('修改成功',{icon:1,time:1500}); 
     //关闭修改页面
     parent.layer.close(index);
     </script>";

        }else
        {
            echo "<script>
     //获取当前frame索引
     var index=parent.layer.getFrameIndex(window.name);
     //刷新父级页面
     window.parent.location.reload();
     //弹出提示信息
     parent.parent.layer.msg('修改失败',{icon:1,time:1500}); 
     //关闭修改页面
     parent.layer.close(index);
     </script>";

        }
    }else
    {
        //展示数据
        $id=I('get.id');
        $info=D('manager')->where(['id'=>$id])->find();
        $this->assign('info',$info);
        //将角色分类进行展示
        $roles=D('role')->select();
        $this->assign('roles',$roles);
        $this->display('detail');
    }



}

}