<?php
declare (strict_types = 1);

namespace app\admin\validate;

use think\Validate;

class Auth extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'name'          => 'require|min:2|max:10|chsDash|unique:auth',
        //'__token__'   => 'require|token', 
        'password'      => 'require|min:6', 
        'agree'         => 'require|accepted',
        'role'          => 'require',

        //'newpassword'   => 'require|min:6',
        
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'name.require'          => '用户名不得为空~', 
        'name.min'              => '用户名不得小于 2 位~', 
        'name.max'              => '用户名不得大于 10 位~', 
        'name.chsDash'          => '用户名只能是汉字、字母、数字或下划线以及破折号~', 
        'name.unique'           => '用户名已存在~', 
        'password.require'      => '密码不得为空~', 
        'password.min'          => '密码不得小于 6 位~', 
        'agree.require'         => '必须确认协议~', 
        'agree.accepted'        => '必须认同协议~',
        'role.require'          => '必须勾选权限', 

        
        'newpassword.require'   => '新密码不得为空~', 
        'newpassword.min'       => '新密码不得小于 6 位~', 

        '__token__.require'     => 'token不得为空~', 
    ];

        //验证场景设置
    //场景验证， 我们避免验证其它字段，需要做场景验证； 
    protected $scene =[
        'insert'    => ['name', 'password', 'agree', '__token__'],
        'edit'      => ['__token__','newpassword'],

    ];
    
}
