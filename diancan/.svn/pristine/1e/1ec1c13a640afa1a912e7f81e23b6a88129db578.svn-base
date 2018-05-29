<?php
//声明命名空间
namespace Admin\Model;
//引入父类模型
use Think\Model;
class GoodsModel extends Model{
    //字段映射
    protected $_map = array(
        'name' => 'goods_name',
        'logo' => 'goods_logo',
        'grade' => 'goods_grade'
    );

    //自动验证
    protected $_validate = array(
        array('goods_name','require','商品名称不能为空',0,'',3),
        array('goods_grade','require','积分数不能为空',0,'',3),
        array('goods_grade','number','积分数格式不正确',0,'',3),
    );


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
            $data['goods_logo'] = UPLOAD_PATH . $upload_res['savepath'] . $upload_res['savename'];
            //数据处理成功  返回新的data
            return $data;
        }else{
            return $data;
        }
    }
}