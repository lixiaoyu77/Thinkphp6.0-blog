<?php
declare (strict_types = 1);

namespace app\admin\middleware;

use app\admin\model\Auth as AuthModel;

class Auth
{
        /**
     * 
     * 提示模板路径
     * 
     * @var string
     */
    private $toast = 'public/toast';

    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        //
        $auth = AuthModel::where('name',session('admin'))->find();
        //权限 模块/方法 列表 
        $roles = []; 
        //遍历角色列表
        foreach($auth->role as $key=>$obj)
        {
            //将权限 uri 取出，装进
            foreach (explode(',',$obj->uri) as  $value) {
                $roles[] = $value;
            }
        }
        
        //得到当前访问的 uri 
        $uri = $request->controller().'/'.$request->action();
        //如果检测到是超级管理员就给全部权限， 
        //前端可以添加如果选择了超管，则不能选别的角色
        
        if($roles[0] !='All'){
            //如果不在权限范围内，则提示 
            if (!in_array($uri, $roles)) { 
                return view($this->toast, [ 
                    'infos' => ['你没有操作权限~'], 
                    'url_text' => '返回首页', 
                    'url_path' => url('/admin/index') 
                ]); 
            }
        }
        //dd($uri);
        return $next($request);
    }
}
