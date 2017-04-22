<?php 

require_once '../inc/db.php';
require_once '../inc/common.php';
require_once '../inc/session.php';
// $sql = 	"insert into blog(id,title,body) values('{$_POST['id']}','{$_POST['title']}', '{$_POST['body']}' ) ;" ;	
// if (!mysql_query($sql)) {
// 	echo mysql_error();	
// 	echo '<br>' .  $sql;
// }else{
// 	redirect_to("./");
// };

$sql = "insert into blog(id,title,body) values(:id,:title,:body);" ;	
$query = $db->prepare($sql);
$query->bindParam(':id',$_POST['id'],PDO::PARAM_STR);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);

if (!$query->execute()) {	
	redirect_to("new.php");
	set_notice("添加失败");
}else{
	redirect_to("./");
};

?>