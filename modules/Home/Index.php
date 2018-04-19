<?php
/**
 * Created by PhpStorm.
 * User: marx
 * Date: 18-4-19
 * Time: 上午9:18
 */
namespace modules\Home;

/*
 *
 * */
use modules\base;//基类

use model\model;//数据库基类
class Index extends base {
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("index");
    }

    public function demo(){
        $model = New model();

        $data["demo"] = 123;
        $this->view("demo", $data);
    }
}