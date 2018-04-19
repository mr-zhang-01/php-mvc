<?php
/**
 * Created by PhpStorm.
 * User: marx
 * Date: 18-4-19
 * Time: 下午2:21
 */

namespace model;

use lib\MyPDO as Db;
class model{
    public $DbHandle;
    public function __construct(){
        global $CONF;
        $this->DbHandle = Db::getInstance($CONF["dbHost"], $CONF["dbUser"], $CONF["dbPasswd"], $CONF["dbName"], $CONF["dbCharset"]);
    }
}