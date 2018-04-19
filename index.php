<?php
/**
 * Created by PhpStorm.
 * User: marx
 * Date: 18-4-19
 * Time: 上午9:12
 */

define("ROOT_PATH", "");
define("DIR_PATH", dirname(__FILE__));

define("CONF_PATH", DIR_PATH . "/conf");
define("DEBUG", true);

require_once("common/functions.php");
require_once("lib/Marx.php");
global $Marx;
$Marx = New \lib\Marx();
exit;