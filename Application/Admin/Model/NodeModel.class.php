<?php
namespace Admin\Model;

use Think\Model;

class NodeModel extends Model
{
    protected $_validate = array(
        array('nname', 'require', '节点名称不能为空'),
        array('naddr', 'require', '节点地址不能为空'),
        array('nmethod', 'require', '节点加密方式不能为空'),
        array('ntype', array(0, 1, 2), '节点类型不正确！', self::EXISTS_VALIDATE, 'in'),
    );
}