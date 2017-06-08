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
$smarty->assign('cur', 'fate');

/**
 * +----------------------------------------------------------
 * 数据备份 
 * +----------------------------------------------------------
 */
if ($rec == 'default') {
    $sql = "SELECT * FROM " . $dou->table('fate') . " ORDER BY id ASC";
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
       $fate[]=array(
        'id'=>$row['id'],
        'name'=>$row['name'],
        'money1'=>$row['money1'],
        'money2'=>$row['money2']
        );
    }
    $smarty->assign('fate', $fate);
    $fatecount=count($fate);
    $sql = "SELECT * FROM " . $dou->table('fate_type') ;
    $query = $dou->query($sql);
    


    while ($row = $dou->fetch_array($query)) {    
        $f=$row['fate']?json_decode($row['fate'],true):array();
        $list[]=array(
            "id"=>$row['id'],
            "name"=>$row['name'],
            "fid"=>$row['fid'],
            "type"=>$row['type'],
            "fate"=>$f          
        );
    }
  


    $smarty->assign('list', $list);

    $sql = "SELECT * FROM " . $dou->table('num')." where id=1" ;
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {                       
        $smarty->assign('num1', $row["num1"]);
        $smarty->assign('num2', $row["num2"]);
        $smarty->assign('num3', $row["num3"]);
        $smarty->assign('num4', $row["num4"]);
    }

    
    
    $smarty->display('fate.htm');
}
if($rec=='fateupdate'){
    $id = $_REQUEST['id'];
    $name = $_REQUEST['fate_name']?$_REQUEST['fate_name']:" "; 
    $fate_money1 = $_REQUEST['fate_money1']?$_REQUEST['fate_money1']:0;
    $fate_money2 = $_REQUEST['fate_money2']? $_REQUEST['fate_money2']:0;
   
    $sql = "UPDATE ". $dou->table('fate') ." SET ". " `name` = '$name',`money1` = '$fate_money1',`money2` = '$fate_money2'  WHERE `id` = '$id' ";
        $query = $dou->query($sql);
    
    $dou->dou_msg($_LANG['edit_succes'], 'fate.php');
}   
if($rec=='fateadd'){
    $name = $_REQUEST['fate_name']?$_REQUEST['fate_name']:" "; 
    $fate_money1 = $_REQUEST['fate_money1']?$_REQUEST['fate_money1']:0;
    $fate_money2 = $_REQUEST['fate_money2']? $_REQUEST['fate_money2']:0;
   
    $sql = "INSERT INTO ". $dou->table('fate') ." (`id`,`name`,`money1`,`money2`) VALUES(null,'$name','$fate_money1','$fate_money2')  ";

        $query = $dou->query($sql);
    
    $dou->dou_msg($_LANG['edit_succes'], 'fate.php');
}   
if($rec=='delfate'){
    $id = $_REQUEST['id']?$_REQUEST['id']:0; 
    $sql="DELETE FROM ". $dou->table('fate') ." WHERE `id`='$id' ";
   

        $query = $dou->query($sql);
    
    $dou->dou_msg($_LANG['edit_succes'], 'fate.php');
} 



if($rec=='addtype'){
    $fid = $_REQUEST['fid'];
    $name = $_REQUEST['typename']; 
    $type=1;
    if($fid!="1" && $fid!="2" && $fid!="3"){
        $type=2;
    }
    $sql="INSERT INTO ". $dou->table('fate_type') ." (`id`,`name`, `fid`, `type`, `fate`) VALUES (NULL,'$name',$fid,$type,'')";
    $query = $dou->query($sql);
    $dou->dou_msg($_LANG['edit_succes'], 'fate.php');
}
if($rec=='deltype'){
     $id = $_REQUEST['id'];
     $sql="DELETE FROM ". $dou->table('fate_type') ." WHERE `id`='$id' or `fid`='$id'";
     $query = $dou->query($sql);
     $dou->dou_msg($_LANG['edit_succes'], 'fate.php');
}

if($rec=="update"){
    $name= $_REQUEST['t_name'];
    $id= $_REQUEST['id'];
    $fat= $_REQUEST['fat']?json_encode($_REQUEST['fat']):"";
    $sql = "UPDATE ". $dou->table('fate_type') ." SET ". "`name`='$name', `fate` = '$fat'  WHERE `id` = '$id'";
    $query = $dou->query($sql);
    $dou->dou_msg($_LANG['edit_succes'], 'fate.php');
}

if($rec=="number"){
    $name= $_REQUEST['t_name'];
    $num1= $_REQUEST['num1'];
    $num2= $_REQUEST['num2'];
    $num3= $_REQUEST['num3'];
    $num4= $_REQUEST['num4'];
    $sql = "UPDATE ". $dou->table('num') ." SET ". "`num1`='$num1', `num2` = $num2,`num3` = $num3,`num4` = $num4  WHERE `id` = '1'";
    $query = $dou->query($sql);
    $dou->dou_msg($_LANG['edit_succes'], 'fate.php');
}
?>
