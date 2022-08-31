<?php
declare (strict_types = 1);

namespace app\admin\validate;

use think\Validate;

class Artical extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'tittle'          => 'require',
        //'__token__'   => 'require|token', 
        'contents'      => 'require', 
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'tittle.require'          => '标题不得为空~', 
        'contents.require'        => '内容不得为空~', 
    ];
}
