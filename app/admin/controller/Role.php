<?php
namespace app\admin\controller;

use think\facade\Db;
use think\facade\View;

class Role{

    public function index(){

        $role =Db::name('role')->select();

        return View::fetch('index',[     //->fetch('./view/role/index.php')
            'admin' => session('admin'),
            'list' => $role,
        ]);
    }
}