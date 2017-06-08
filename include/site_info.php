<?php
if (!defined('IN_DOUCO')) {
    die('Hacking attempt');
}

$smarty->assign('page_title', $dou->page_title());
$smarty->assign('keywords', $_CFG['site_keywords']);
$smarty->assign('description', $_CFG['site_description']);
//默认信息
$smarty->assign('site_name', $_CFG['site_name']);
$smarty->assign('site_title', $_CFG['site_title']);
$smarty->assign('site_address', $_CFG['site_address']);
$smarty->assign('icp', $_CFG['icp']);
$smarty->assign('tel', $_CFG['tel']);
$smarty->assign('fax', $_CFG['fax']);
$smarty->assign('qq', $_CFG['qq']);
$smarty->assign('email', $_CFG['email']);
$smarty->assign('year',date('Y'));

?>