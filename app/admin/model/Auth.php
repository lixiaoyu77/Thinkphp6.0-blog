<?php

namespace app\admin\model;
use think\Model;

class Auth extends Model{
        
    //一对一 文章
    public function artical(){

        return $this->hasOne(Artical::class,'auth_id','id');
            
    }
    //多对多权限关联
    public function role(){

        return  $this->belongsToMany(Role::class,Access::class,'role_id','auth_id');
    }

    //name 搜索器 
    public function searchNameAttr($query, $value) { 
        
        return $value ? $query->where('name', 'like', '%'.$value.'%') : ''; 
    }
}