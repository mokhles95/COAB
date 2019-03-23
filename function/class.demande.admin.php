<?php
session_start();
include 'DB.php';
$db = new DB();
$tblName = 'mh_conge';

if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){
    if($_REQUEST['action_type'] == 'add'){
		$ts1 = strtotime($_POST['dateD']);
        $ts2 = strtotime($_POST['datef']);

        $diff =( $ts2 - $ts1) / (60 * 60 * 24);
        $userData = array(
          
            'id_emp' => $_SESSION['user_session'],
            'nom_emp' =>$_SESSION['user_nom']." ".$_SESSION['user_prenom'] ,
			'dateD' => $_POST['dateD'],
            'dateF' => $_POST["datef"],
            'nbr_j' => $diff,
			'type_c' => $_POST['typec'],
			'rep_rh' => 'En attente',
			'rep_admin' => 'En attente',
           
        );
        $insert = $db->insert($tblName,$userData);
      
        
        header("Location:../employe/mesconge.php");
    }elseif($_REQUEST['action_type'] == 'edit'){
        if(!empty($_GET['id'])){
            $userData = array(
                'rep_admin' => $_GET['rep'] ,
              
            );
            $condition = array('id_c' => $_GET['id']);
            $update = $db->update($tblName,$userData,$condition);
            $statusMsg = $update?'User data has been updated successfully.':'Some problem occurred, please try again.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:../directeur/demande.php");
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