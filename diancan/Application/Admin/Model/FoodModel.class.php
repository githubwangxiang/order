<?php
namespace Admin\Model;
use Think\Model;
class FoodModel extends Model{
    //封装一个图片上传,在添加和修改功能都能使用
    public function upload_logo($file,$data){
        //方法有两个参数 $file是文件上传需要的数据
        //$data是保存到数据库需要的数据
        //在添加商品基本数据之前，先实现文件上传，得到图片地址信息
        if($file && $file['error'] == 0){
            //自定义配置数据
            $config = array(
                'maxSize' => 5 * 1024 * 1024,//上传文件的自定义大小限制
                'exts' => array('jpg','png','gif','jpeg'),//允许上传文件的后缀名
                'rootPath' => ROOT_PATH . UPLOAD_PATH,//保存的根路径
            );
            //实例化文件上传类
            $upload = new \Think\Upload($config);
            //得到上传文件的信息，一个一维数组
            $upload_res = $upload->uploadOne($file);
            if(!$upload_res){
                //上传失败，获取错误信息
                $error = $upload -> getError();
                //将上传类的错误信息，记录到模型类的error属性上
                $this->error = $error;
                return false;
            }
            //上传成功，需要拼接文件保存路径，用于添加到数据表
            $data['is_logo'] = UPLOAD_PATH . $upload_res['savepath'] . $upload_res['savename'];
            //数据处理成功  返回新的data
            //商品logo图片上传成功 生成缩略图
            $image = new \Think\Image;
            //使用open方法打开原始图片（需要真实的文件路径）
            $image -> open(ROOT_PATH . $data['is_logo']);
            //使用thumb方法生成缩略图（需要传递最大宽度和最大高度限制）
            $image -> thumb(150,100);
            //生成一个数据库里保存缩略图的字符串
            $thumb_img = UPLOAD_PATH . $upload_res['savepath'] . 'thumb_' . $upload_res['savename'];
            //使用save方法保存缩略图图片（需要真实的文件路径）
            $image -> save( ROOT_PATH . $thumb_img);
            //将缩略图的路径保存到$data中，最终保存到数据表
            $data['is_logo_small'] = $thumb_img;
            //数据处理成功  返回新的data
            return $data;
        }else{
            return $data;
        }
    }

}
