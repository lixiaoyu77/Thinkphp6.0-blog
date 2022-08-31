<?php
namespace app\admin\common;

class Tool{
    public static function url($querstring){ //拼装 URL
        //获取当前完整 URL(带参数)
        $urlFull = request()->url(true);
        //获取参数字符串
        if (!isset(parse_url($urlFull)['query'])) { 
            return $urlFull.'?'; 
        }
        $query = parse_url($urlFull)['query'];

        //将参数字符串转换为数组 
        parse_str($query, $urlArr);
        //删掉 create_time 
        unset($urlArr[$querstring]);
        //再将数组转换为参数字符串
        $queryAll = http_build_query($urlArr);
        //再合并为完整的 url
        echo request()->domain().request()->baseUrl().'?'.$queryAll.'&';
    }
}