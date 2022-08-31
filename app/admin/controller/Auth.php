<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\Request;
use think\facade\View;
use app\admin\model\Auth as AuthModel;
use app\admin\model\Access as AccessModel;
use app\admin\model\Role as RoleModel;
use think\exception\ValidateException;
use app\admin\validate\Auth as AuthValidate;
use app\admin\middleware\Auth as AuthMiddleware;

class Auth
{

    //protected $middleware = [AuthMiddleware::class];
    /**
     * 
     * 提示模板路径
     * 
     * @var string
     */
    private $toast = 'public/toast';
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $list =AuthModel::with('role')->withSearch(['name'],[
            'name'            =>    request()->param('name'),

        ])->paginate([   
            'list_rows'         =>5,
            'query'             => request()->param(),
        ]);

        foreach($list as $key=>$obj){
            foreach($obj->role as $r){
                $obj->roles .=$r->type.' | ';
            }
            //去尾 
            $obj->roles = trim(substr(trim($obj->roles),0,-1));
        }

        //return json($list);
        return View::fetch('index',[

            'list'  => $list,

        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return View::fetch('create',[
            'list'      =>     RoleModel::select(),
        ]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request->param();

        try{
            validate(AuthValidate::class)->scene('insert')->batch(true)->check($data);
        } catch (ValidateException $exception){
            return View::fetch($this->toast,[
                'infos' => $exception->getError(),
                'url_text'  => '返回上一页',
                'url_path'  => url('admin/Auth/create'),

            ]);  //'public/toast'
        }
        $data['password']   = sha1($data['password']);
        //写入数据库
        $id = AuthModel::create($data)->getData('id');
        //关联新增
        AuthModel::find($id)->role()->saveAll($data['role']);
        return $id ? View::fetch($this->toast,[
            'infos' => ['恭喜,添加成功！'],
            'url_text'  => '返回管理员页',
            'url_path'  => url('admin/auth'),

        ]) : '添加失败!';
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
                
        return View::fetch('edit',[
            'obj'   => AuthModel::find($id),
            'list'  => RoleModel::select(),
            'alist' =>  AccessModel::where('auth_id',$id)->select(),
        ]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->param();
        try{
            validate(AuthValidate::class)->scene('edit')->batch(true)->check($data);
        } catch (ValidateException $exception){
            return View::fetch($this->toast,[
                'infos' => $exception->getError(),
                'url_text'  => '返回上一页',
                'url_path'  => url('/admin/auth/'.$id.'/edit'),

            ]);  
        }
        //如果有新密码，则写入
        if(!empty($data['newpassword'])){
            $data['password']=  sha1($data['newpassword']);
        }

        
        $id =AuthModel::update($data)->getData('id');

        AuthModel::find($id)->role()->saveAll($data['role']);

        return $id  ? View::fetch($this->toast,[
            'infos'     => ['修改成功!'],
            'url_text'  => '返回首页',
            'url_path'  => url('admin/auth'),

        ]) : '修改失败!';
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
       
        AuthModel::find($id)->role()->detach();
        AuthModel::destroy($id);


        return  $id ? view($this->toast, [     
            'infos'     => ['恭喜，删除成功!'], 
            'url_text'  => '去管理页', 
            'url_path'  => url('admin/auth'), 
            ]) : '删除失败!';
    }
}
