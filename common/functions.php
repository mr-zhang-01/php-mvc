<?php
/**
 * Created by PhpStorm.
 * User: marx
 * Date: 18-4-19
 * Time: 上午9:34
 */

if(!function_exists("dump")){
    /*
     * 有格式输出内容
     * @param content anyoneType
     *
     * */
    function dump($content){
        echo "<pre>";
        var_dump($content);
        echo "</pre>";
    }
}