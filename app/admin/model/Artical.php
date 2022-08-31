<?php

namespace app\admin\model;
use think\Model;

class Artical extends Model{

    //auth_name 搜索器
    public function searchAuthnameAttr($query,$value){
        return $value ? $query->where('authname','like','%'.$value.'%') : '';
    }

    //标题 搜索器
    public function searchTittleAttr($query,$value){
        return $value ? $query->where('tittle','like','%'.$value.'%') : '';
    }
        
}