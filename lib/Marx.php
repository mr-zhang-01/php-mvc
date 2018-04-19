<?php

/**
 * Created by PhpStorm.
 * User: marx
 * Date: 18-4-19
 * Time: 上午9:20
 */
namespace lib;
/*
 *
 * core class
 * */
class Marx{
    private $params = array();
    private $controllerPath = "";

    //构造函数
    public function __construct(){
        $this->controllerPath = "modules/";
        $this->_start();
    }

    //启动项目
    private function _start(){
        $this->_dealParam();

        $moduleName = $this->params["m"];
        $className = $this->params["c"];
        $classNameInfo = "\modules\\$moduleName\\$className";

        $classSource = New $classNameInfo();
        $funcName = $this->params["a"];
        if(method_exists($classSource, $funcName)){
            $classSource->$funcName();
        }else{
            $msg = "";
            if(DEBUG){
                $msg = "error:request a invalid";
            }
            exit($msg);
        }
    }

    //处理参数
    private function _dealParam(){
        //模块默认
        if(empty($_REQUEST["m"])){
            $params["m"] = "Home";
        }else{
            $params["m"] = filter_var($_REQUEST["m"], FILTER_SANITIZE_STRING|FILTER_SANITIZE_ENCODED);
            unset($_REQUEST["m"]);
        }

        //控制器默认
        if(empty($_REQUEST["c"])){
            $params["c"] = "Index";
        }else{
            $params["c"] = filter_var($_REQUEST["c"], FILTER_SANITIZE_STRING|FILTER_SANITIZE_ENCODED);
            unset($_REQUEST["c"]);
        }

        //函数默认
        if(empty($_REQUEST["a"])){
            $params["a"] = "index";
        }else{
            $params["a"] = filter_var($_REQUEST["a"], FILTER_SANITIZE_STRING|FILTER_SANITIZE_ENCODED);
            unset($_REQUEST["a"]);
        }

        foreach($_REQUEST as $k=>$v){
            $k = filter_var($k, FILTER_SANITIZE_ENCODED);
            $v = filter_var($v, FILTER_SANITIZE_ENCODED);
            $params[$k] = $v;
        }

        $this->params = $params;
    }

    //获得模块名
    public function GetM(){
        return $this->params["m"];
    }

    //获得控制器名
    public function GetC(){
        return $this->params["c"];
    }

    //获得方法名
    public function GetA(){
        return $this->params["a"];
    }
}

//自动加载类
spl_autoload_register(function ($name) {
    $name =str_replace("\\", "/", $name);
    $file = $name . ".php";

    if(file_exists($file)){
        require_once($file);
    }else{
        $msg = "";
        if(EBUG){
            $msg = "error:request c invalid " . $file;
        }
        exit($msg);
    }
});

//加载核心配置文件
$confPath = CONF_PATH . "/conf.php";
if(file_exists($confPath)){
    global $CONF;
    $CONF = require_once($confPath);
}