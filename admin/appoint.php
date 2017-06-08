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
require (ROOT_PATH . ADMIN_PATH . '/include/backup.class.php');

// rec操作项的初始化
$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';

// 初始化
$sqlcharset = str_replace('-', '', DOU_CHARSET);
$dump = new Backup($sqlcharset);
@ set_time_limit(0);

// 赋值给模板
$smarty->assign('rec', $rec);
$smarty->assign('cur', 'appoint');

/**
 * +----------------------------------------------------------
 * 数据备份 
 * +----------------------------------------------------------
 */
if ($rec == 'default') {
    $sql = "SELECT * FROM " . $dou->table('ppoint') . " ORDER BY id desc";
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
        if($row['state']=="0"){
            $list1[]=array(
            'id'=>$row['id'],
            'name'=>$row['name'],
            'content'=>$row['content'],
            'val'=>$row['val']
            );
        }
        if($row['state']=="1"){
            $list2[]=array(
            'id'=>$row['id'],
            'name'=>$row['name'],
            'content'=>$row['content'],
            'val'=>$row['val']
            );
        }
       
    }
    $smarty->assign('list1', $list1);
    $smarty->assign('list2', $list2);  
    
    
    $smarty->display('appoint.htm');
}
if($rec=='done'){
    $id = $_REQUEST['id'];
   
   
    $sql = "UPDATE ". $dou->table('ppoint') ." SET ". " `state` = '1'  WHERE `id` = '$id' ";
        $query = $dou->query($sql);
    
    $dou->dou_msg($_LANG['edit_succes'], 'appoint.php');
}   
if($rec=='del'){
    $id = $_REQUEST['id'];
    $sql="DELETE FROM ". $dou->table('ppoint') ." WHERE `id`='$id'";
    $query = $dou->query($sql);
   
    $dou->dou_msg($_LANG['edit_succes'], 'appoint.php');
}   
?>
