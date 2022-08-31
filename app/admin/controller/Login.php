<?php

namespace app\admin\controller;

use think\facade\Validate;
use think\facade\View;
use think\Request;

class Login{

    /**
     * 
     * 提示模板路径
     * 
     * @var string
     */
    private $toast = 'public/toast';

    public function index(){
        return View::fetch('index');
    }

    public function check(Request $request){
        $data = $request->param();

        //错误集合 
        $errors = [];

        $validate = Validate::rule([
            'name'  =>  'unique:auth,name^password'  //检查数据库中是否存在
        ]); 

        $reslut = $validate->batch(true)->check([
            'name'  => $data['name'],
            'password'  => sha1($data['password']),

        ]);

        if($reslut){
            $errors[] = '用户名或密码不正确~';
        }

        
        if(!captcha_check($data['code'])){
            $errors[] = '验证码不正确~';
        }
        

        if(!empty($errors)){
            return View::fetch($this->toast,[
                'infos' => $errors,
                'url_text'  => '返回登录',
                'url_path'  => url('/admin/login'),

            ]);  
        }else{
            session('admin', $data['name']);
            return redirect('/admin/index');
        }


    }

    public function logout(){
        session('admin',null);
        return redirect('/admin/login');
    }
}