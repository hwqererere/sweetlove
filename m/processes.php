<?php
define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');
require (dirname(__FILE__) . '/include/site_info.php');
$query = $dou->select($dou->table('article_category'), '*', '`cat_id` = 5');

$article_category = $dou->fetch_array($query);

$smarty->assign('article_category_title', $article_category['cat_name']);







$smarty->display('processes.dwt');
?>