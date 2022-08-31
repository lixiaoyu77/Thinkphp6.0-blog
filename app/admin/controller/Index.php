<?php
declare (strict_types = 1);
namespace app\admin\controller;

use app\admin\common\Tool;
use think\facade\View;
use think\Request;
use app\admin\model\User as UserModel;
use think\exception\ValidateException;
use app\admin\validate\User as UserValidate;
use app\admin\middleware\Auth as AuthMiddleware;


class Index
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
        //注意排序可以为分页前还是分页后。分页前是全部排序。 分页后可排序当前页面的数据。   ->order('id','asc') desc
        return View::fetch('index',[

            'list'  => UserModel::withSearch(['gender','username','email','create_time'],[
                'gender'            =>    request()->param('gender'),
                'username'          =>    request()->param('username'),
                'email'             =>    request()->param('email'),
                'create_time'       =>    request()->param('create_time'),

            ])->paginate([   
                'list_rows'         =>5,
                'query'             => request()->param(),
            ]),

            'orderTime'         => request()->param('create_time') == 'desc' ? 'asc' : 'desc',
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return View::fetch('create');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //dd($request->param());
        $data = $request->param();
        try{
            validate(UserValidate::class)->scene('insert')->batch(true)->check($data);
        } catch (ValidateException $exception){
            return View::fetch($this->toast,[
                'infos' => $exception->getError(),
                'url_text'  => '返回上一页',
                'url_path'  => url('/admin/index/create'),

            ]);  //'public/toast'
        }

        $data['password']   = sha1($data['password']);
        //写入数据库
        $id = UserModel::create($data)->getData('id');
        //关联保存，喜好
        UserModel::find($id)->hobby()->save([
            'content'   =>     $data['content'],
        ]);
        return $id ? View::fetch($this->toast,[
            'infos' => ['恭喜,注册成功！'],
            'url_text'  => '返回首页',
            'url_path'  => url('admin/index'),

        ]) : '注册失败!';
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
        return View::fetch('read',[
            'obj'   => UserModel::find($id),
        ]);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        return View::fetch('edit',[
            'obj'   => UserModel::find($id),
        ]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return string
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->param();
        
        try{
            validate(UserValidate::class)->scene('edit')->batch(true)->check($data);
        } catch (ValidateException $exception){
            return View::fetch($this->toast,[
                'infos' => $exception->getError(),
                'url_text'  => '返回上一页',
                'url_path'  => url('/admin/'.$id.'/edit'),

            ]);  
        }
        //如果有新密码，则写入
        if(!empty($data['newpasswordnot'])){
            $data['password']=  sha1($data['newpasswordnot']);
        }

        
        $id =UserModel::update($data)->getData('id');

        UserModel::find($id)->hobby()->update([
            'content'   =>     $data['content'],
        ]);

        return $id  ? View::fetch($this->toast,[
            'infos'     => ['修改成功!！'],
            'url_text'  => '返回首页',
            'url_path'  => url('admin/index'),

        ]) : '修改失败';
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return string
     */
    public function delete($id)
    {
        //

        UserModel::find($id)->hobby()->delete();
        
        UserModel::destroy($id);


        return  $id ? view($this->toast, [     //./view/public/toast.html
            'infos'     => ['恭喜，删除成功~'], 
            'url_text'  => '去首页', 
            'url_path'  => url('admin/index'), 
            ]) : '删除失败';

    }
}

