<?php

define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');
require (dirname(__FILE__) . '/include/site_info.php');
$query = $dou->select($dou->table('article_category'), '*', '`cat_id` = 3');

$article_category = $dou->fetch_array($query);

$smarty->assign('article_category_title', $article_category['cat_name']);
$smarty->assign('article_category_description', $article_category['description']);


$i=0;
$query=$dou->select($dou->table('article'), '`id`,`title`,`image`,`content`', '`cat_id` = 15 ORDER BY `id` ASC LIMIT 5');
while($row=mysql_fetch_array($query)){
	$smarty->assign('article_'.$i.'_id', $row['id']);
	$smarty->assign('article_'.$i.'_title', $row['title']);
	$smarty->assign('article_'.$i.'_image', $row['image']);
	$smarty->assign('article_'.$i.'_content', $row['content']);
   	$i++;
}


$i=0;
$query=$dou->select($dou->table('article'), '`id`,`title`,`image`,`content`', '`cat_id` = 16 ORDER BY `id` ASC LIMIT 4');
while($row=mysql_fetch_array($query)){
	$smarty->assign('article2_'.$i.'_id', $row['id']);
	$smarty->assign('article2_'.$i.'_title', $row['title']);
	$smarty->assign('article2_'.$i.'_image', $row['image']);
	$smarty->assign('article2_'.$i.'_content', $row['content']);
   	$i++;
}

$sql = "SELECT * FROM " . $dou->table('fate') . " ORDER BY id ASC";
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
       $fate[]=array(
        'id'=>$row['id'],
        'name'=>$row['name'],
        'money1'=>substr($row['money1'],0,strpos($row['money1'],".")),
        'money2'=>substr($row['money1'],0,strpos($row['money2'],"."))
        );
    }
$smarty->assign('fate', $fate);
$fatecount=count($fate);
$smarty->assign('fatecount', $fatecount);
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

foreach ($list as $key ) {		
	$count=0;	
	foreach ($list as $key2 ) {
		if($key["id"]==$key2["fid"]){
			$count++;
		}
	}
	
	$newlist1[]=array(
    "id"=>$key['id'],
    "name"=>$key['name'],
    "fid"=>$key['fid'],
    "type"=>$key['type'],
    "fate"=>$key['fate'],       
    "count"=>$count
    );
}

$list1count=0;
$list2count=0;
foreach ($newlist1 as $key ) {
	if($key['fid']==1){
		foreach ($newlist1 as $key2) {
			if($key2["fid"]==$key['id']){
				$list1count++;
			}		
		}
	}
	
	if($key['fid']==2){
		foreach ($newlist1 as $key2) {
			if($key2["fid"]==$key['id']){
				$list2count++;
			}		
		}
	}
}
$cont1="";
$ind=0;

foreach ($newlist1 as $key ) {	
	if($key["fid"]=="1"){
		$ind2=0;
		foreach ($newlist1 as $key2) {
			if($key["id"]==$key2["fid"]){
				$cont1.='<tr>';
				if($ind==0){
					$cont1.='<td width="5%" class="bgFF8AB9 " rowspan="'.$list1count.'" ><span class="colorffffff fontsize30">产妇护理</span></td>';
				}
				$ind++;				
				if($ind2==0){
					$cont1.='<td width="10%" rowspan="'.$key["count"].'">'.$key["name"].'</td>';
					$ind2++;
				}
				$cont1.='<td width="75%" style="text-align: left;text-indent:1em">'.$key2["name"].'</td>';


				$x=0;
				foreach ($fate as $fateshow) {
					$x++;
					if($fateshow['money1']>1){
						$cont1.='<td>';
						if(in_array($fateshow['id'], $key2['fate'])){

							$cont1.='<img src="theme/default/images/lv'.$x.'.png" />';
						}
						$cont1.='</td>';
					}
				}
				$cont1.='</tr>';

			}
			
		}	
			
	}
}


$cont2="";
$ind=0;

foreach ($newlist1 as $key ) {	
	if($key["fid"]=="2"){
		$indd=0;
		foreach ($newlist1 as $key2) {
			if($key["id"]==$key2["fid"]){
				$cont2.='<tr>';
				if($ind==0){
					$cont2.='<td  class="bg84BF2C " rowspan="'.$list2count.'" ><span class="colorffffff fontsize30">日常护理</span></td>';
				}
				$ind++;

				if($indd==0){
					$cont2.='<td  rowspan="'.$key["count"].'">'.$key["name"].'</td>';$indd++;
				}
				$cont2.='<td  style="text-align: left;">'.$key2["name"].'</td>';
				$x=0;
				foreach ($fate as $fateshow) {
					$x++;
					$cont2.='<td>';
					if(in_array($fateshow['id'], $key2['fate'])){

						$cont2.='<img src="theme/default/images/lv'.$x.'.png" />';
					}
					$cont2.='</td>';
				}
				
				$cont2.='</tr>';
				
				
			}
			
		}	
			
	}
}


$smarty->assign('cont1', $cont1);
$smarty->assign('cont2', $cont2);
$sel="-1";

$id=$_REQUEST['id']? $_REQUEST['id']:"";
if($id==4){
	$sel=0;
}else if($id==32){
	$sel=1;
}else if($id==41){
	$sel=2;
}else if($id==38){
	$sel=3;
}else if($id==48){
	$sel=4;
}else{$sel=-1;}
$smarty->assign('sel', $sel);
$smarty->display('yue.dwt');
?>