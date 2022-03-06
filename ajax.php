<?php
include_once 'system/config/appsConfig.php';

spl_autoload_register(function($classname){
include_once 'system/lib/'.$classname.'.php';
});


?>

<?php

$id = $_GET['q'];

$sql = "select * from city where countryid = ".$id;
$db = new DBContext();
foreach ($db->getData($sql) as $value) {
	echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
}


?>