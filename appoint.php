<?php

define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');
require (dirname(__FILE__) . '/include/site_info.php');

$word="0";

$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';

if ($rec == 'appoint') {
	$name=$_REQUEST['name']?$_REQUEST['name']:"";
	$contact=$_REQUEST['contact']?$_REQUEST['contact']:"";
	$val=$_REQUEST['val']?$_REQUEST['val']:"";

	$sql = "INSERT INTO " . $dou->table('ppoint') . " (id, name, content, val, 	state )" . " VALUES (NULL, '$name',  '$contact', '$val', '0')";
    $dou->query($sql);
    $word="1";
  
}

$smarty->assign('rec', $word);

$smarty->display('appoint.dwt');





?>