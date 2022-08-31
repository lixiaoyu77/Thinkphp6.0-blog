<?php
declare (strict_types = 1);
namespace app\admin\controller;

use think\facade\Db;
use app\admin\model\Artical as ArticalModel;
use app\admin\model\Auth as AuthModel;
use think\exception\ValidateException;
use app\admin\validate\Artical as ArticalValidate;
use think\facade\View;
use think\Request;

class Artical
{

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
        //  
        $list =ArticalModel::withSearch(['authname', 'tittle'],
        [ 
            'authname' => request()->param('authname'), 
            'tittle' => request()->param('tittle'), 
        ])->paginate([   
            'list_rows'         =>5,
            'query'             => request()->param(),
        ]);

        return View::fetch('index',[
            'list'  => $list,
            'admin' => session('admin'),
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
        //
        $data = $request->param();
        try{
            validate(ArticalValidate::class)->batch(true)->check($data);
        } catch (ValidateException $exception){
            return View::fetch($this->toast,[
                'infos' => $exception->getError(),
                'url_text'  => '返回上一页',
                'url_path'  => url('/admin/artical/create'),

            ]);  //'public/toast'
        }
        
        $data['authname'] = session('admin');
        $data['authid'] = AuthModel::Where('name',session('admin'))->value('id');
        //dd($data);
        
        $id = ArticalModel::create($data)->getData('id');
        return $id ? View::fetch($this->toast,[
            'infos' => ['恭喜,文章发表成功！'],
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
            'obj'   => ArticalModel::find($id),
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
            validate(ArticalValidate::class)->batch(true)->check($data);
        } catch (ValidateException $exception){
            return View::fetch($this->toast,[
                'infos' => $exception->getError(),
                'url_text'  => '返回上一页',
                'url_path'  => url('/admin/artical/'.$id.'/edit'),

            ]);  
        }


        $id =articalModel::update($data)->getData('id');

        return $id  ? View::fetch($this->toast,[
            'infos'     => ['文章修改成功!！'],
            'url_text'  => '返回首页',
            'url_path'  => url('admin/index'),

        ]) : '修改失败';
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
        ArticalModel::destroy($id);
        return  $id ? view($this->toast, [     
            'infos'     => ['恭喜，删除成功!'], 
            'url_text'  => '去文章页', 
            'url_path'  => url('admin/artical'), 
        ]) : '删除失败!';
    }
}
