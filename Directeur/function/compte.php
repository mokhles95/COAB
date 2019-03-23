
 <?php 
include_once 'connexion.php' ;
session_start();

if (isset($_REQUEST['action']) and $_REQUEST['action']=='updateinfo') {
 $nom = $_POST['nom'] ;
 $prenom = $_POST['prenom'] ;
 $email = $_POST['email'] ;
 $pwd = $_POST['password'] ;
 $adresse = $_POST['adresse'] ;





$requete = "update mh_emp set nom_emp = '$nom' ,prenom_emp = '$prenom' ,email_emp = '$email' , mdp = '$pwd' , adresse_emp = '$adresse' where id_emp ='".$_SESSION['user_session']."'";
$result = $con -> query($requete);
if($result) {
	
	header('location:../param.php') ;
}

	
else {
	echo  mysqli_error($con) ;
}
}
?>