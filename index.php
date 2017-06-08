<?php
/**
 * DouPHP
 * --------------------------------------------------------------------------------------------------
 * 版权所有 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.douco.com
 * --------------------------------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在遵守授权协议前提下对程序代码进行修改和使用；不允许对程序代码以任何形式任何目的的再发布。
 * 授权协议：http://www.douco.com/license.html
 * --------------------------------------------------------------------------------------------------
 * Author: DouCo
 * Release Date: 2015-10-16
 */
define('IN_DOUCO', true);

if (isset($_REQUEST['mobile'])) setcookie('client', 'pc'); // 判断时候强制在移动端中显示PC版

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




$sql = "SELECT * FROM " . $dou->table('fate_type') ;
$query = $dou->query($sql);

while ($row = $dou->fetch_array($query)) {
    if($row["fid"]=="1"){
        $sv1[]=array(
        "id"=>$row['id'],
        "name"=>$row['name'],
        "fid"=>$row['fid'],
        "type"=>$row['type'],
        "fate1"=>$row['fate1'],
        "fate2"=>$row['fate2'],
        "fate3"=>$row['fate3']
        );
    }    
    if($row["fid"]=="3"){
        $sv2[]=array(
        "id"=>$row['id'],
        "name"=>$row['name'],
        "fid"=>$row['fid'],
        "type"=>$row['type'],
        "fate1"=>$row['fate1'],
        "fate2"=>$row['fate2'],
        "fate3"=>$row['fate3']
        );
    }                    
    
}

$smarty->assign('sv1', $sv1);
$smarty->assign('sv2', $sv2);

$sql = "SELECT * FROM " . $dou->table('num')." where id=1" ;
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {                       
        $smarty->assign('num1', $row["num1"]);
        $smarty->assign('num2', $row["num2"]);
        $smarty->assign('num3', $row["num3"]);
        $smarty->assign('num4', $row["num4"]);
    }

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


$query=$dou->select($dou->table('article'), '*', '`cat_id` = 8 ORDER BY `id` DESC LIMIT 3');
while($row=mysql_fetch_array($query)){  
    $art[]=array(
        "id"=>$row['id'],
        "title"=>$row['title']
        );
  
    
}

$smarty->assign('art', $art);
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 9 ORDER BY `id` DESC LIMIT 3');
while($row=mysql_fetch_array($query)){  
        $brt[]=array(
        "id"=>$row['id'],
        "title"=>$row['title']
        );
}
$smarty->assign('brt', $brt);
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 10 ORDER BY `id` DESC LIMIT 3');
while($row=mysql_fetch_array($query)){  
          $crt[]=array(
        "id"=>$row['id'],
        "title"=>$row['title']
        );

}
$smarty->assign('crt', $crt);
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 11 ORDER BY `id` DESC LIMIT 3');
while($row=mysql_fetch_array($query)){  
        $drt[]=array(
        "id"=>$row['id'],
        "title"=>$row['title']
        );
}
$smarty->assign('drt', $drt);
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 13 ORDER BY `id` DESC LIMIT 3');
while($row=mysql_fetch_array($query)){  
      $ert[]=array(
        "id"=>$row['id'],
        "title"=>$row['title']
        );

}
$smarty->assign('ert', $ert);
$query=$dou->select($dou->table('article'), '*', '`cat_id` = 14 ORDER BY `id` DESC LIMIT 3');
while($row=mysql_fetch_array($query)){  
      $frt[]=array(
        "id"=>$row['id'],
        "title"=>$row['title']
        );
}
$smarty->assign('frt', $ert);

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
// 赋值给模板-导航栏
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle'));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));

// 赋值给模板-数据
$smarty->assign('show_list', $dou->get_show_list());
$smarty->assign('link', get_link_list());
$smarty->assign('index', $index);


$smarty->display('index.dwt');

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