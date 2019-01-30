<?php
/*
1、composer.json 中配置加载文件
"autoload": {
        "files": [
            "app/Libraries/functions.php"
        ]
    },
2、composer dump-autoload ；运行加载
*/
if (!function_exists('md5Pwd')) {
    /**
     * 定义password加密方式
     * @param $pwd 原始密码
     * @return string
     */
    function md5Pwd($pwd){
        return 'zxm_'.$pwd.'test';
    }
}


if(!function_exists('curlPost')){
    /**
     * post数据到指定url
     * @param $url 地址
     * @param $params 数据数组
     * @param int $max_time 最大执行时间(秒)
     * @return mixed
     */
    function curlPost($url, $params, $max_time = 10, $header = array()){
        $protocol = substr(ltrim($url), 0, 5) == "https" ? 'https' : 'http';
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        if($header){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch,CURLOPT_TIMEOUT,$max_time);
        //设置curl默认访问为IPv4
        if(defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')){
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        if ('https' == strtolower($protocol)) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

if(!function_exists('curlPostJson')){
    /**
     * post数据到指定url并json_decode成数组
     * @param string $url 地址
     * @param array $params 数据数组
     * @param int $max_time 最大执行时间(秒)
     * @return array|mixed
     */
    function curlPostJson($url, $params, $max_time = 10){
        $json_str = json_encode($params);
        $header = array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($json_str)
        );
        $result = curlPost($url, $json_str, $max_time, $header);
        return json_decode($result, true);
    }
}

if(!function_exists('curlGet')){
    /**
     * 发起get请求到指定url
     * @param $url
     * @param int $max_time
     * @param array $params 数据数组,自动组合到url中
     * @return mixed
     */
    function curlGet($url, $max_time = 10, $params = array()){
        $protocol = substr(ltrim($url), 0, 5) == "https" ? 'https' : 'http';
        if($params && is_array($params)){
            $params_str = http_build_query($params);
            $connect = strpos($url, '?') ? '&' : '?';
            $url .= $connect . $params_str;
        }
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_TIMEOUT,$max_time);
        //设置curl默认访问为IPv4
        if(defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')){
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        if ('https' == strtolower($protocol)) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

if(!function_exists('curlGetJson')){
    /**
     * 发起get请求到指定url并json_decode成数组
     * @param $url
     * @param int $max_time
     * @param array $params 数据数组,自动组合到url中
     * @return array|mixed
     */
    function curlGetJson($url, $max_time = 10, $params = array()){
        $result = curlGet($url, $max_time, $params);
        return json_decode($result, true);
    }
}

if(!function_exists('getIP')){
    /**
     * 获取ip地址
     * @return string
     */
    function getIP(){
        if(array_key_exists('HTTP_CLIENT_IP', $_SERVER)){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(array_key_exists('REMOTE_ADDR', $_SERVER)){
            $ip = $_SERVER['REMOTE_ADDR'];
        }else{
            $ip = '';
        }
        return $ip;
    }
}

/*处理Excel导出 

*@param $datas array 设置表格数据 

*@param $titlename string 设置head 

*@param $title string 设置表头 

*/ 
function excelData($datas,$titlename,$title,$filename){ 

    $str = "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\"\r\nxmlns:x=\"urn:schemas-microsoft-com:office:excel\"\r\nxmlns=\"http://www.w3.org/TR/REC-html40\">\r\n<head>\r\n<meta http-equiv=Content-Type content=\"text/html; charset=utf-8\">\r\n</head>\r\n<body>"; 

    $str .="<table border=1><head>".$titlename."</head>"; 

    $str .= $title; 

    foreach ($datas as $key=> $rt ) 

    { 

    $str .= "<tr>"; 

    foreach ( $rt as $k => $v ) 

    { 

    $str .= "<td>{$v}</td>"; 

    } 

    $str .= "</tr>\n"; 

    } 

    $str .= "</table></body></html>"; 

    header( "Content-Type: application/vnd.ms-excel; name='excel'" ); 

    header( "Content-type: application/octet-stream" ); 

    header( "Content-Disposition: attachment; filename=".$filename ); 

    header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" ); 

    header( "Pragma: no-cache" ); 

    header( "Expires: 0" ); 

    exit( $str ); 

}