<?php
/**
 * sdk-php
 * User: Turing Group
 * Date: 2016/11/18
 * Time: 15:01
 */

define("API_KEY", "你的apikey");

/**
 * 获取Userid
 * 这里使用sessionid作为userid 为每一个网络会话保存聊天环境，如果有其他需求，请把userid的规则改为自己需要的规则
 * @return string
 */
function get_userid(){

    session_start();
    return session_id();
}


/**
 * 请求图灵接口
 * @param $info string 问题
 * @param $loc string 地点
 * @return array 参考图灵官网Openapi文档进行处理
 */
function request_turing($info, $loc){

    $req = ["key" => API_KEY, "info" => $info, "loc" => $loc, "userid"=> get_userid()];

    $ch = curl_init("http://www.tuling123.com/openapi/api");
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json'"]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret_str = curl_exec($ch);
    curl_close($ch);
    return json_decode($ret_str);
}
