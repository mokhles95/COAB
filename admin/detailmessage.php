<!DOCTYPE html>
<?php
include_once '../function/dbconfig.php';
if(!$user->is_loggedin()!="" || $_SESSION['user_level']!=1)
{
	if ($_SESSION['user_level']==2){
		$user->redirect('../admin/admin.php');
	}
	else if ($_SESSION['user_level']==3){
		$user->redirect('../directeur/directeur.php');
	}
	else
 $user->redirect('../index.php');
}
 include '../function/DB.php';

            $db = new DB();
			$id=$_GET['id'];
            $users = $db->getRows('mh_message',array('where'=>array('id_msg'=>$id)));
            if(!empty($users)){  foreach($users as $user){ 
                                      
                               
                                   $nom=$user["np_dist"];
                                    $message=$user["libelle_msg"]; 
								    $type=$user["type_msg"]; 
									$date=$user["date"];
								  
			}}?>
	

<html>
<head>
    <meta charset="UTF-8">
    <title>COAB | Administrateur</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By Mokhles">
    <meta name="keywords" content="COAB solution">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  
    
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" />

          <style type="text/css">

          </style>
      </head>
      <body class="skin-black">
        
        <header class="header">
            <a href="index.html" class="logo" style="background-color: white">
                <img src="logo.png" style="width:100%;height:100%">
            </a>
           
            <nav class="navbar navbar-static-top" role="navigation">
                
               
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                     
                        
                        </li>
                  
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['user_prenom']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                               

                               
                                <li class="divider"></li>

                                    <li>
                                        <a href="employe.php">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            Profil
                                        </a>
                                         <a href="param.php">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Paramètres
                                        </a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="#"><i class="fa fa-ban fa-fw pull-right"></i> Déconnexion</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <aside class="left-side sidebar-offcanvas">

                        <section class="sidebar">
                            <div class="user-panel">
                                <div class="pull-left image">
                                    <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                                </div>
                                <div class="pull-left info">
                                    <p>Bonsoir, <?php echo $_SESSION['user_prenom']; ?></p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
                                </div>
                            </div>
                            <form action="#" method="get" class="sidebar-form">
                               
                            </form>
                            
                             <ul class="sidebar-menu">
                                <li>
                                    <a href="Employe.php">
                                        <i class="fa fa-user"></i> <span>Mon profil</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="Message.php">
                                        <i class="fa fa-envelope"></i> <span>Messages</span>
                                    </a>
                                </li>

                              <li>
                                    <a href="mesconge.php">
                                        <i class="fa fa-calendar"></i> <span>Mes congés</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="Demande.php">
                                        <i class="fa fa-tasks"></i> <span>Demande de congé </span>
                                    </a>
                                </li>
								<li>
                                    <a href="param.php">
                                        <i class="fa fa-cog"></i> <span>parametres</span>
                                    </a>
                                </li>

                            </ul>
                        </section>
                    </aside>
					

                    <aside class="right-side">

                <section class="content">

                    

                   
                    <div class="row">
<div class="col-md-12 ">

              
<section class="panel">
                              <header class="panel-heading">
                                 Message
								  
								  
                            </header>
                            <div class="panel-body table-responsive">
							
             
				
                <h3  class="alert alert-info">Sujet : <?php echo $type; ?></h3>

             
              

                <hr>

           
               
				 <div col="col-md-6">
				 <h5>émetteur :<b> <?php echo $nom; ?></b></h3>
				</div>
				<div col="col-md-6">
				 <h5>Date d'envoi<b><?php echo $date; ?></b></h3>
				</div>

               

             
				<div class="row">
				<div class="col-md-10 " >
                <h4> Message : </h4>
                <h4><?php echo $message; ?></h4>
</div>
</div>
<br><br><?php if($_REQUEST['type'] =="recu") { ?>
                <div class="row" >
				<div class="col-md-10 col-md-offset-1">
				<h4> Répondre à ce message </h4>
				<textarea id="repmessage" class="form-control" ></textarea>
				</div>
				</div><br><br>
				<?php } ?>

           
				<div class=" add-task-row">
				<?php if($_REQUEST['type'] =="recu") { ?>
                                  <a class="btn btn-success btn-sm pull-right" href="#ajoutmsg" data-toggle="modal">Répondre</a>
				<?php } ?>
                                  <a class="btn btn-danger btn-sm pull-right" href="function/message.php?id=<?php echo $id; ?>&action=<?php echo $_GET['type']; ?>" onclick="return confirm('Voulez vous vraiment supprimer ce message ?'); ">Supprimer</a>
                              </div>
			   </div>

               
				
				  
                                        </section>
                                    </div>
                  </div>
				  
                                        </section>
                                   
                  </div>

            </aside>
				
                    

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
       <script src="js/jquery.min.js" type="text/javascript"></script>

        
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
		<script src="js/app.js" type="text/javascript"></script>
		<script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script>
	<script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script>
       
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="js/plugins/chart.js" type="text/javascript"></script>

       
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
       
        <script src="js/Director/app.js" type="text/javascript"></script>

        <script src="js/Director/dashboard.js" type="text/javascript"></script>
        
      

       
        <script>

			$(document).ready(function(){
    
   
$(document).ready(function(){
    
    
		
$("#ajoutc").click(function(){
	if ($("#desc").val() == "" ) {
		$("#message").html("le commentaire ne doit être vide");
		$("#message").show();
	}else {
$.post(
            'function/commentaire.php', 
            {
            	iduser : $("#iduser").val() ,
                idevent : $("#idevent").val() ,
				desc : $("#desc").val() ,
                 				
                action : "addcommentaire"
				 
            	
            },

            function(data1){
				
				
				
				if (data1 == 1) {
			    
			    $("#message").html("votre commentaire est ajouté avec succès");
            	$("#message").show();
				 setTimeout(function(){ location.reload(); }, 3000);
				
				}
            	
                
            	
            },

            'text' 
         );
}
});

});
	
	}
	)
	;
</script>
<script type="text/javascript">
   
</script>
</body>
</html>