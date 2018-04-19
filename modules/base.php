<?php
/**
 * Created by PhpStorm.
 * User: marx
 * Date: 18-4-19
 * Time: 上午9:13
 */

namespace modules;

/*
 * home基类
 * */
define("VIEW_PATH", DIR_PATH . "/view/");

use model\Transfer;
class base{
    public function __construct(){

    }

    /*
     *  打开模板文件
     *  @param name string
     *  @param data array
     * */
    public function view($name = "", $data = array()){
        $viewData = explode("\\", get_class($this));
        if($viewData[0] == "modules"){
            if(empty($name)){
                global $Marx;
                $name = $Marx->GetA();
            }
            $viewDataPath = VIEW_PATH . $viewData[1] . "/" . $viewData[2] . "/" . $name . ".php";

            if(file_exists($viewDataPath)){
                extract($data);
                include $viewDataPath;
            }else{
                exit("error view file");
            }
        }else{
            exit("error template");
        }
    }
}