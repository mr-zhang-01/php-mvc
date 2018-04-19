<?php
namespace model;
/**
 * Created by PhpStorm.
 * User: marx
 * Date: 18-4-19
 * Time: 上午9:15
 */
class Transfer{
    private $table = "";

    public function __construct($table){
        $this->table = $table;
    }

    public function getTableName(){
        return $this->table;
    }
}