<?php

define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');


require (dirname(__FILE__) . '/include/site_info.php');




$smarty->display('index.dwt');
?>