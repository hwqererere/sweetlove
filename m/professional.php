<?php
define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');
require (dirname(__FILE__) . '/include/site_info.php');
$query = $dou->select($dou->table('article_category'), '*', '`cat_id` = 6');

$article_category = $dou->fetch_array($query);

$smarty->assign('article_category_title', $article_category['cat_name']);
$smarty->assign('article_category_description', $article_category['description']);


$i=0;
$query=$dou->select($dou->table('article'), '`id`,`title`,`content`', '`cat_id` = 6 ORDER BY `id` ASC LIMIT 4');
while($row=mysql_fetch_array($query)){
    $smarty->assign('article_'.$i.'_id', $row['id']);
    $smarty->assign('article_'.$i.'_title', $row['title']);
    $smarty->assign('article_'.$i.'_content', $row['content']);
    $i++;
}



$smarty->display('professional.dwt');
?>