<?php
include('config.php');
$action = $_REQUEST['action'];
if($action==""){
	$stmt=$dbcon->prepare('SELECT ID, titre FROM film ORDER BY titre');
	$stmt->execute();
}else{
	$stmt=$dbcon->prepare('SELECT ID, titre FROM film WHERE IDgenre=:cid ORDER BY titre');
	$stmt->execute(array(':cid'=>$action));
}
?>
<div class="donnees">
<?php
if($stmt->rowCount() > 0){
while($donnees=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($donnees);
echo'<a href="filmDetail.php?titre='.$donnees["titre"].'"class="list-group-item col-xs-6 col-lg-3 col-md-6">
                            <div class = "datacontainer col-xs-6 col-lg-6 col-md-6"> '.$donnees["titre"].'</div>
                          </a>'
                            ;  	
}
}else{
echo''
                            ;  
}
?>
</div>