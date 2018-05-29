<?php
namespace Admin\Controller;
use Think\Controller;
class FoodController extends CommonController{
	public function index(){
        $count =D('Food') -> count();
		$data = D('Food')-> alias('t1') -> field('t1.*,t2.res_name') -> join('left join restaurant t2 on t1.res_id = t2.id') -> select();
        $this -> assign('data',$data);
        $this -> assign('count',$count);
		$this -> display();
	}
	public function add(){
        $model = D('Food');
        if (IS_POST) {
            $data = I('post.');
            $data['food_introduce'] = I('post.food_introduce','','remove_xss');
           
            //调用模型中的upload_logo方法完成文件上传功能
            $data = $model->upload_logo($_FILES['is_logo'], $data);
            if (!$data) {
                $error = $model->getError();
                $this->error($error);
            }
            $res = $model->add($data);
            //layer插件实现页面跳转
            if ($res) {
                echo "<script>
                     //获取当前frame索引
                     var index=parent.layer.getFrameIndex(window.name);
                     //刷新父级页面
                     window.parent.location.reload();
                     //弹出提示信息
                     parent.parent.layer.msg('添加成功',{icon:1,time:1500}); 
                     //关闭修改页面
                     parent.layer.close(index);
                     </script>";
            } else {
                echo "<script>
                     //获取当前frame索引
                     var index=parent.layer.getFrameIndex(window.name);
                     //刷新父级页面
                     window.parent.location.reload();
                     //弹出提示信息
                     parent.parent.layer.msg('添加失败',{icon:1,time:1500}); 
                     //关闭修改页面
                     parent.layer.close(index);
                     </script>";
            }
        } else {
            $restaurant = D('Restaurant') -> select();
            $this->assign('restaurant',$restaurant);
            $this->display();
        }
     }
    //修改积分商品
    public function edit(){
        $model = D('Food');
        if(IS_POST){
            $data = I('post.');
            $data['food_introduce'] = I('post.food_introduce','','remove_xss');
            $data = $model -> upload_logo($_FILES['is_logo'],$data);
            if(!$data){
                //上传过程中出错
                $error = $model -> getError();
                $this->error($error);
            }
            if($data['is_logo']){
                //在保存新图片路径之前，先将旧图片路径查询到，用于后续删除
                $food = $model -> where(['id' => $data['id']]) ->find();
            }
            $res = $model -> save($data);
            if($res !== false){
                //如果上传了新图片，删除旧logo图片
                if($data['is_logo']){
                    //删除旧图片，使用PHP自带的unlink函数
                    unlink( ROOT_PATH . $food['is_logo']);
                    unlink( ROOT_PATH . $food['is_logo_small']);
                }
                echo "<script>
                     var index=parent.layer.getFrameIndex(window.name);
                     window.parent.location.reload();
                     parent.parent.layer.msg('修改成功',{icon:1,time:1500});
                     parent.layer.close(index);
                     </script>";
            }else{
                echo "<script>
                     var index=parent.layer.getFrameIndex(window.name);
                     window.parent.location.reload();
                     parent.parent.layer.msg('修改失败',{icon:1,time:1500});
                     parent.layer.close(index);
                     </script>";
            }
        }else{
            $id = I('get.id');
            $food = $model-> where(['id' => $id]) -> find();
            $restaurant = D('Restaurant') -> select();
//            dump($food);dump($restaurant);die;
            $this->assign('restaurant',$restaurant);
            $this->assign('food',$food);
            $this->display();
        }
    }

         public function del(){
        //接收id参数
       $id = I('post.id');
        //实例化模型，删除数据
        $res = D('Food') -> where(['id' => $id]) -> delete();
        // dump($id);die;
        if($res !== false){
          //删除成功
          $this -> success('删除成功', U('Admin/Food/index'));
        }else{
          //删除失败
          $this -> error('删除失败');
        }
      }
      public function delDate(){
        $data = I('Food');
        $user = D('post.data');
        $res = $data ->delete($user);
        if ($res !== false) {
          $return = array(
            'code' =>10000,
            'msg'  =>'删除成功'
          );
          $this -> ajaxReturn($return);
        }else{
          $return =array(
          'code' => 10001,
          'msg' => '删除失败'
          );
          $this -> ajaxReturn($return);
        }

      }
    //批量删除
    public function delData(){
        $model = D('Food');
        $data = I('Post.data');
        $res = $model->delete($data);
        if($res !== false){
            $return = array(
                'code'=>10000,
                'msg'=>'删除成功'
            );
            $this->ajaxReturn($return);
        }else{
            $return = array(
                'code'=>10001,
                'msg'=>'删除失败'
            );
            $this->ajaxReturn($return);
        }
    }
}