<?php
session_start();
include 'DB.php';
$db = new DB();
$tblName = 'mh_message';
if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){
    if($_REQUEST['action_type'] == 'add'){
        $userData = array(
            'id_dist' => $_POST['id_dist'],
            'libelle_msg' => $_POST['msg'],
            'type_msg' => $_POST['sujet'],
			 'id_emp' => $_POST['id_emp'],
			 'np_dist' => "mokhles haj"



            
        );
        $insert = $db->insert($tblName,$userData);
      
      if ($_SESSION['user_level']==1)
		  
	   
        header("Location:../admin/message.php");
		else if ($_SESSION['user_level']==2)
			 header("Location:../employe/message.php");
		 else
			  header("Location:../directeur/message.php");
    }elseif($_REQUEST['action_type'] == 'edit'){
        if(!empty($_POST['id'])){
            $userData = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            );
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName,$userData,$condition);
            $statusMsg = $update?'User data has been updated successfully.':'Some problem occurred, please try again.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:index.php");
        }
    }elseif($_REQUEST['action_type'] == 'delete'){
        if(!empty($_GET['id'])){
            $condition = array('id_msg' => $_GET['id']);
            $delete = $db->delete($tblName,$condition);
            $statusMsg = $delete?'User data has been deleted successfully.':'Some problem occurred, please try again.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:../admin/Message.php");
        }
    }
}