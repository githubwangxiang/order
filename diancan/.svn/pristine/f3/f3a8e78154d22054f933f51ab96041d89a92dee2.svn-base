<?php
namespace Admin\Model;
use Think\Model;
class SellerModel extends Model
{
    //验证数据-》字段映射->自动验证->表单令牌验证->对非数据库字段进行过滤->在最后完成自动完成
    protected $_map=array('name'=>'seller_name','ic'=>'seller_ic','sex'=>'seller_sex','phone'=>'seller_phone','email'=>'seller_email');
    protected $_validate=array(
        array('seller_name','require','姓名不能为空',0,'regex',3),
        array('seller_ic','','该商家已注册',0,'unique',3),
        array('seller_email','require','邮箱不能为空',0,'regex',3)
    );
    protected $_auto=array(
        array('seller_createtime','time',3,'function',)
    );
}