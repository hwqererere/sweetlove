<?php

define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');
require (dirname(__FILE__) . '/include/site_info.php');
$query = $dou->select($dou->table('article_category'), '*', '`cat_id` = 3');

$article_category = $dou->fetch_array($query);

$smarty->assign('article_category_title', $article_category['cat_name']);
$smarty->assign('article_category_description', $article_category['description']);


$i=0;
$query=$dou->select($dou->table('article'), '`id`,`title`,`image`', '`cat_id` = 15 ORDER BY `id` ASC LIMIT 5');
while($row=mysql_fetch_array($query)){
    $smarty->assign('article_'.$i.'_id', $row['id']);
    $smarty->assign('article_'.$i.'_title', $row['title']);
    $smarty->assign('article_'.$i.'_image', $row['image']);
    $i++;
}

$query=$dou->select($dou->table('article'), '`image`', '`id` = 28 ');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('ad1', $row['image']);
}
$query=$dou->select($dou->table('article'), '`image`', '`id` = 29 ');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('ad2', $row['image']);
}
$query=$dou->select($dou->table('article'), '`image`', '`id` = 30 ');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('ad3', $row['image']);
}
$query=$dou->select($dou->table('article'), '`image`', '`id` =31 ');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('ad4', $row['image']);
}
$query=$dou->select($dou->table('article'), '`image`', '`id` = 32 ');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('ad5', $row['image']);
}
$query=$dou->select($dou->table('article'), '`image`', '`id` = 33 ');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('ad6', $row['image']);
}
$i=1;
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 8 ORDER BY `id` DESC LIMIT 4');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('art'.$i.'_id', $row['id']);
    $smarty->assign('art'.$i.'_title', $row['title']);
    $smarty->assign('art'.$i.'_image', $row['image']);
    $smarty->assign('art'.$i.'_description', $row['description']);
    $i++;
}
$i=1;
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 9 ORDER BY `id` DESC LIMIT 4');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('brt'.$i.'_id', $row['id']);
    $smarty->assign('brt'.$i.'_title', $row['title']);
    $smarty->assign('brt'.$i.'_image', $row['image']);
    $smarty->assign('brt'.$i.'_description', $row['description']);
    $i++;
}
$i=1;
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 10 ORDER BY `id` DESC LIMIT 4');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('crt'.$i.'_id', $row['id']);
    $smarty->assign('crt'.$i.'_title', $row['title']);
    $smarty->assign('crt'.$i.'_image', $row['image']);
    $smarty->assign('crt'.$i.'_description', $row['description']);
    $i++;
}
$i=1;
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 11 ORDER BY `id` DESC LIMIT 4');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('drt'.$i.'_id', $row['id']);
    $smarty->assign('drt'.$i.'_title', $row['title']);
    $smarty->assign('drt'.$i.'_image', $row['image']);
    $smarty->assign('drt'.$i.'_description', $row['description']);
    $i++;
}
$i=1;
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 13 ORDER BY `id` DESC LIMIT 4');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('ert'.$i.'_id', $row['id']);
    $smarty->assign('ert'.$i.'_title', $row['title']);
    $smarty->assign('ert'.$i.'_image', $row['image']);
    $smarty->assign('ert'.$i.'_description', $row['description']);
    $i++;
}
$i=1;
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 14 ORDER BY `id` DESC LIMIT 4');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('frt'.$i.'_id', $row['id']);
    $smarty->assign('frt'.$i.'_title', $row['title']);
    $smarty->assign('frt'.$i.'_image', $row['image']);
    $smarty->assign('frt'.$i.'_description', $row['description']);
    $i++;
}
$i=1;
$query=$dou->select($dou->table('article_category'), '*', '`cat_id` in (8,9,10,11,13,14) ORDER BY `cat_id` ASC');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('cat_name'.$i, $row['cat_name']);  
    $i++;  
}

$smarty->display('infant.dwt');
?>