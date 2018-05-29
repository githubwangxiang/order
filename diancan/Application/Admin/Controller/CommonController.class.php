<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: 二狗
 * Date: 2017/11/12
 * Time: 17:02
 */
class CommonController extends Controller
{

  public function __construct(){
      //先执行父类的构造方法
      parent::__construct();
      //根据session进行判断
      if(!session('?manager_info'))
      {
          //返回登录页
          $this->redirect('Admin/Login/login');
      }
      //进行菜单栏的管理
      $this->nav();
      //判断管理员是否有权限
//      $this->check();
  }
//获取菜单栏的数据
  public function nav()
  {
      //如果菜单存在话，直接进行返回
      if(session('?top')&&session('?second'))
      {
          return;
      }
      //用户的角色id
      $role_id=session('manager_info.role_id');
      //进行数据查询，如果是超级管理员的话，显示所有
      if($role_id==1)
      {
            //查询所有的顶级菜单
          $top=D('auth')->where('pid=0')->select();
          $second=D('auth')->where('pid!=0')->select();
      }else
      {

         //根据角色id进行权限的查询
             //id所具有的所有权限的id
          $auths=D('role')->where("$role_id=id")->find();
          $auth_ids=$auths['auth_ids'];
            //链表查询顶级链接
           $top=D('auth')->where("pid=0 and id in ({$auth_ids})")->select();
            //链表查询二级链接
          $second=D('auth')->where("pid>0 and id in ({$auth_ids})")->select();
      }
         //将用户具有的权限保存到session中
      session('top',$top);
      session('second',$second);

/*      dump($top);
      dump($second);
      die;*/

  }

//检查登陆者是否拥有权限
public function check()
{
    //获取登陆者的id
    $role_id=session('manager_info.role_id');
    if($role_id==1)
    {
        //如果是超级管理员，则不需要检查
        return true;
    }
    //根据id获取所具有的权限
        //如果是登陆页面则不需要进行检测
    $c=CONTROLLER_NAME;
    $a=ACTION_NAME;
    if($c=='Index'&&$a=='index')
    {
            return true;
    }

    //查询角色所具有的权限
    $role=D('Role')->where("$role_id=id")->find();
    $ac=$role['auth_ac'];
   $array=explode(',',$ac);
   $a_c=$c.'-'.$a;
   //如果没有这个权限，就返回到首页
    if(!in_array($a_c,$array))
    {
        $this->redirect('Admin/Index/index');
    }

}









}