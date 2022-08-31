<?php


namespace app\index\controller;

use think\facade\View;
use think\Request;
use app\index\model\Artical as ArticalModel;

class Artical
{

    public function index()
    {
        $list = ArticalModel::paginate([   
            'list_rows'         =>5,
        ]);
        return View::fetch('index',[
            'list'  =>  $list
        ]);
    }

}