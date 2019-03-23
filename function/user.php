<?php
session_start();
include 'DB.php';
$db = new DB();
$tblName = 'mh_emp';
if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){
    if($_REQUEST['action_type'] == 'add'){
        $userData = array(
            'id_emp' => $_POST['cin'],
            'nom_emp' => $_POST['nom'],
            'prenom_emp' => $_POST["prenom"],
			'email_emp' => $_POST['email'],
            'tel_emp' => $_POST["tel"],
            'adresse_emp' => $_POST["adresse"],
			'DN_emp' => $_POST['DN'],
            'dateEm_emp' => $_POST['dateEm'],
            'Fonction_emp' => $_POST['fonction'],
			'Poste_emp' => $_POST['niveau'],
            'mdp' => 'azerty'
            
        );
        $insert = $db->insert($tblName,$userData);
      
        
        header("Location:../admin/employe.php");
		
    }elseif($_REQUEST['action_type'] == 'delete'){
        if(!empty($_GET['id'])){
            $condition = array('id_emp' => $_GET['id']);
            $delete = $db->delete($tblName,$condition);
            $statusMsg = $delete?'User data has been deleted successfully.':'Some problem occurred, please try again.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:../admin/employe.php");
        }
    }
}