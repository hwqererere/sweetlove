<?php
define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');
require (dirname(__FILE__) . '/include/site_info.php');
$query = $dou->select($dou->table('article_category'), '*', '`cat_id` = 4');

$article_category = $dou->fetch_array($query);

$smarty->assign('article_category_title', $article_category['cat_name']);
$smarty->assign('article_category_description', $article_category['description']);


$i=0;
$query=$dou->select($dou->table('article'), '`id`,`title`,`image`', '`cat_id` = 17 ORDER BY `id` ASC LIMIT 4');
while($row=mysql_fetch_array($query)){
    $smarty->assign('article_'.$i.'_id', $row['id']);
    $smarty->assign('article_'.$i.'_title', $row['title']);
    $smarty->assign('article_'.$i.'_image', ROOT_URL.$row['image']);
    $i++;
}


$sql = "SELECT * FROM " . $dou->table('fate') . " ORDER BY id ASC";
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
       $fate[]=array(
        'id'=>$row['id'],
        'name'=>$row['name'],
        'money1'=>substr($row['money1'],0,strpos($row['money1'],".")),
        'money2'=>substr($row['money2'],0,strpos($row['money2'],"."))
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


$cont1="";


foreach ($newlist1 as $key ) {	
	if($key["fid"]=="3"){
		$ind2=0;
		foreach ($newlist1 as $key2) {
			if($key["id"]==$key2["fid"]){
				$cont1.='<tr>';
				 
		
				if($ind2==0){
					$cont1.='<td width="10%" rowspan="'.$key["count"].'">'.$key["name"].'</td>';
					$ind2++;
				}
				$cont1.='<td width="75%" style="text-align: left;">'.$key2["name"].'</td>';
				$x=0;
				foreach ($fate as $fateshow) {
					$x++;
					if($fateshow['money2']>1){
						$cont1.='<td>';
						if(in_array($fateshow['id'], $key2['fate'])){

							$cont1.='<img src="theme/default/images/lv'.$x.'.png" style="width:10px;height:10px;"/>';
						}
						$cont1.='</td>';
					}
					/*$cont1.='<td>';
					if(in_array($fateshow['id'], $key2['fate'])){

						$cont1.='<img src="theme/default/images/lv1.png" style="width:10px;height:10px;"/>';
					}
					$cont1.='</td>';*/
				}
				$cont1.='</tr>';
			}
			
		}	
			
	}
}




$smarty->assign('cont1', $cont1);




$smarty->display('yus.dwt');
?>