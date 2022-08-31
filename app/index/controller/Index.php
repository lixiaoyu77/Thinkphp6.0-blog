<?php
declare (strict_types = 1);

namespace app\index\controller;

use think\facade\View;
use think\Request;
use app\model\index\User as UserModel;

class Index
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
        return View::fetch('index',[
            
        ]);
    }

}
