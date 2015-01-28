<?php
namespace Admin\Controller;
class NodeController extends AdminController
{
    public function index()
    {
        $this->assign('webtitle', '节点管理');
        $this->assign('subtitle', '节点列表');

        $Node = M('Node');
        $nodeList = $Node->order('norder desc')->select();
        $this->assign('nodeList', $nodeList);

        $this->display();
    }
}