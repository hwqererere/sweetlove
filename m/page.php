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

require (dirname(__FILE__) . '/include/init.php');
require (dirname(__FILE__) . '/include/site_info.php');
// 验证并获取合法的ID，如果不合法将其设定为-1
$id = $firewall->get_legal_id('article', $_REQUEST['id'], $_REQUEST['unique_id']);
if ($id == -1)
    $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
    
    // 获取单页面信息
$page = get_page_info($id);
$top_id = $page['parent_id'] == 0 ? $id : $page['parent_id'];



$smarty->assign('page', $page);
if ($top_id == $id)
    $smarty->assign("top_cur", 'top_cur');

$smarty->display('page.dwt');

/**
 * +----------------------------------------------------------
 * 获取单页面信息
 * +----------------------------------------------------------
 */
function get_page_info($id = 0) {
    $query = $GLOBALS['dou']->select($GLOBALS['dou']->table('article'), '*', '`id` = \'' . $id . '\'');
    $page = $GLOBALS['dou']->fetch_array($query);
    
    if ($page) {
        $page['url'] = $GLOBALS['dou']->rewrite_url('page', $page['id']);
    }
    
    return $page;
}
?>