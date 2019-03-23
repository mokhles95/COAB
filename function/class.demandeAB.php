<?php
session_start();
include 'DB.php';
$db = new DB();
$tblName = 'mh_absence';

if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){
    if($_REQUEST['action_type'] == 'add'){
	
        $userData = array(
          
            'id_emp' => $_SESSION['user_session'],
            'nom_emp' =>$_SESSION['user_nom']." ".$_SESSION['user_prenom'] ,
			'dateD_A' => $_POST['dateD'],
			'nbr_h'=>$_POST['duree'],
            'desc_A'=>$_POST['description'],
			'rep_rh' => "En attente",
		
        );
        $insert = $db->insert($tblName,$userData);
      
        
        header("Location:../employe/demande.php");
    }elseif($_REQUEST['action_type'] == 'edit'){
        if(!empty($_GET['id'])){
            $userData = array(
                'rep_rh' => $_GET['rep'] ,
              
            );
            $condition = array('id_ab' => $_GET['id']);
            $update = $db->update($tblName,$userData,$condition);
            $statusMsg = $update?'User data has been updated successfully.':'Some problem occurred, please try again.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:../admin/demande.php");
        }
    }elseif($_REQUEST['action_type'] == 'delete'){
        if(!empty($_GET['id'])){
            $condition = array('id_emp' => $_GET['id']);
            $delete = $db->delete($tblName,$condition);
            $statusMsg = $delete?'User data has been deleted successfully.':'Some problem occurred, please try again.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:../admin/admin.php");
        }
    }
}