<?php

namespace app\admin\model;

use think\Model;

class User extends Model
{
    //一对一 Hobby
    public function hobby(){

        return $this->hasOne(Hobby::class,'user_id','id');
        
    }



    //创建搜索器
    //搜索器，即查询的片段代码，可以用于封装单独条件搜索使用； 
    //gender 搜索器
    public function searchGenderAttr($query,$value){
        return $value ? $query->where('gender',$value) : '';
    }

    //username 搜索器
    public function searchUsernameAttr($query,$value){
        return $value ? $query->where('Username','like','%'.$value.'%') : '';
    }

    //email 搜索器
    public function searchEmailAttr($query,$value){
        return $value ? $query->where('email','like','%'.$value.'%') : '';
    }

    //create_time 搜索器
    public function searchCreateTimeAttr($query,$value){
        return $value ? $query->order('create_time',$value) : '';       //http://localhost:8000/user.html?create_time=asc
    }

    
    //status 获取器 
    public function getStatusAttr($value){
        $status = [
            1   => '正常',
            0   => '待审核',

        ];
        return $status[$value];
    }
    

    //badge 获取器
    public function getBadgeAttr($value,$data){
        
        return $data['status'] ? 'success' : 'warning';
    }
    
}