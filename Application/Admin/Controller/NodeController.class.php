<?php
namespace Admin\Controller;
class NodeController extends AdminController
{
    public function index()
    {
        $this->assign('subtitle', '节点列表');

        $Node = M('Node');
        $nodeList = $Node->order('norder desc')->select();
        $this->assign('nodeList', $nodeList);
        $this->assign('empty', '<td colspan="7">当前没有节点，请新增。</td>');

        $this->display();
    }

    public function add()
    {
        $this->edit(0);
    }

    public function edit($nid)
    {
        if ($nid == 0) {
            $this->assign('subtitle', '新增节点');
            $this->assign('colorstyle', 'success');
            $node = array(
                'nid' => '',
                'nname' => '',
                'naddr' => '',
                'nmethod' => 'rc4-md5',
                'ntype' => 0,
                'norder' => 0,
                'nusr_max' => 0,
                'nusr_vip' => 0,
                'ntraffic_max' => 0,
                'ntraffic_vip' => 0,
                'ninfo' => '');
        } else {
            $this->assign('subtitle', '编辑节点');
            $this->assign('colorstyle', 'primary');
            $Node = D('Node');
            $node = $Node->where("nid=$nid")->find();
        }
        $this->assign('node', $node);
        $this->display('edit');
    }

    public function doEdit()
    {
        $Node = D('Node');
        if ($Node->create()) {
            $Node->ntraffic_max *= 1024;
            $Node->ntraffic_vip *= 1024;
            if ($Node->nid == "") {
                $result = $Node->add();
            } else {
                $result = $Node->save();
            }
            if ($result || $result === 0) {
                $this->success("操作成功", U('index'));
            } else {
                $this->error("操作失败");
            }
        } else {
            $this->error($Node->getError());
        }
    }

    public function delete($nid)
    {
        $Node = D('Node');
        $result = $Node->delete($nid);
        if ($result) {
            $this->success('删除成功！', U('index'));
        } else {
            $this->error("删除失败！");
        }

    }

    protected function _initialize()
    {
        parent::_initialize();
        $this->assign('webtitle', '节点管理');
    }
}