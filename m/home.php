<?php

define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');


require (dirname(__FILE__) . '/include/site_info.php');

// 获取关于我们信息
$sql = "SELECT * FROM " . $dou->table('page') . " WHERE id = '1'";
$query = $dou->query($sql);
$about = $dou->fetch_array($query);

// 写入到index数组
$index['about_name'] = $about['page_name'];
$index['about_content'] = $dou->dou_substr($about['content'], 300);
$index['about_link'] = $dou->rewrite_url('page', '1');
$index['cur'] = true;

// 赋值给模板-meta和title信息
$smarty->assign('page_title', $dou->page_title());
$smarty->assign('keywords', $_CFG['site_keywords']);
$smarty->assign('description', $_CFG['site_description']);


$query=$dou->select($dou->table('article'), '*', '`cat_id` = 19 ORDER BY `id` DESC LIMIT 6');

while($row=mysql_fetch_array($query)){ 

    if($row['id']=="36"){
        $smarty->assign('zz_description1', $row['content']);
    } 
    if($row['id']=="37"){
        $smarty->assign('zz_description2', $row['content']);
    } 
    if($row['id']=="38"){
        $smarty->assign('zz_description3', $row['content']);
    } 
    if($row['id']=="39"){
        $smarty->assign('zz_description4', $row['content']);
    } 
    if($row['id']=="40"){
        $smarty->assign('zz_description5', $row['content']);
    } 
    if($row['id']=="41"){
        $smarty->assign('zz_description6', $row['content']);
    } 

}



$sql = "SELECT * FROM " . $dou->table('num')." where id=1" ;
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {                       
        $smarty->assign('num1', $row["num1"]);
        $smarty->assign('num2', $row["num2"]);
        $smarty->assign('num3', $row["num3"]);
        $smarty->assign('num4', $row["num4"]);
    }




$query=$dou->select($dou->table('article'), '*', '`cat_id` = 8 ORDER BY `id` DESC LIMIT 1');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('art_id', $row['id']);
    $smarty->assign('art_title', $row['title']);
    $smarty->assign('art_image', $row['image']);
    $smarty->assign('art_description', $row['description']);

}

$query=$dou->select($dou->table('article'), '*', '`cat_id` = 9 ORDER BY `id` DESC LIMIT 1');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('brt_id', $row['id']);
    $smarty->assign('brt_title', $row['title']);
    $smarty->assign('brt_image', $row['image']);
    $smarty->assign('brt_description', $row['description']);
}

$query=$dou->select($dou->table('article'), '*', '`cat_id` = 10 ORDER BY `id` DESC LIMIT 1');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('crt_id', $row['id']);
    $smarty->assign('crt_title', $row['title']);
    $smarty->assign('crt_image', $row['image']);
    $smarty->assign('crt_description', $row['description']);

}

$query=$dou->select($dou->table('article'), '*', '`cat_id` = 11 ORDER BY `id` DESC LIMIT 1');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('drt_id', $row['id']);
    $smarty->assign('drt_title', $row['title']);
    $smarty->assign('drt_image', $row['image']);
    $smarty->assign('drt_description', $row['description']);
}

$query=$dou->select($dou->table('article'), '*', '`cat_id` = 13 ORDER BY `id` DESC LIMIT 1');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('ert_id', $row['id']);
    $smarty->assign('ert_title', $row['title']);
    $smarty->assign('ert_image', $row['image']);
    $smarty->assign('ert_description', $row['description']);
    $i++;
}
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 14 ORDER BY `id` DESC LIMIT 1');
while($row=mysql_fetch_array($query)){  
    $smarty->assign('frt_id', $row['id']);
    $smarty->assign('frt_title', $row['title']);
    $smarty->assign('frt_image', $row['image']);
    $smarty->assign('frt_description', $row['description']);
}


// 赋值给模板-导航栏
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle'));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));

// 赋值给模板-数据
$smarty->assign('show_list', $dou->get_show_list());
$smarty->assign('link', get_link_list());
$smarty->assign('index', $index);


$smarty->display('home.dwt');

/**
 * +----------------------------------------------------------
 * 获取下级幻灯列表
 * +----------------------------------------------------------
 */
function get_link_list() {
    $sql = "SELECT * FROM " . $GLOBALS['dou']->table('link') . " ORDER BY sort ASC, id ASC";
    $query = $GLOBALS['dou']->query($sql);
    while ($row = $GLOBALS['dou']->fetch_array($query)) {
        $link_list[] = array (
                "id" => $row['id'],
                "link_name" => $row['link_name'],
                "link_url" => $row['link_url'],
                "sort" => $row['sort'] 
        );
    }
    
    return $link_list;
}


?>