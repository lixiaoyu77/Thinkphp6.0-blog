<?php
use think\facade\Route;



//后台组 

Route::group(function () { 

    //用户模块资源路由 
    Route::resource('/index', 'Index'); 
    //权限模块资源路由 
    Route::resource('/auth', 'Auth');
    //权限类型资源路由 
    Route::resource('/role', 'Role');
    //文章模块资源路由 
    Route::resource('/artical', 'Artical');  
    })->middleware(function ($request, \Closure $next) { 
        if (!session('?admin')) { 
            return redirect('/admin/login'); 
        }
        return $next($request); 
    });
     
//登录模块资源路由 
Route::group(function () {
        Route::get('login','Login/index')->middleware(function ($request, \Closure $next) { 
            if (session('?admin')) { 
                return redirect('/admin/index'); 
            }
            return $next($request); 
        });
        Route::post('login_check','Login/check');
        Route::get('logout','Login/logout');


});
