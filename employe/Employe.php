<!DOCTYPE html>
<?php
include_once '../function/dbconfig.php';
if(!$user->is_loggedin()!="" || $_SESSION['user_level']!=2)
{
	if ($_SESSION['user_level']==1){
		$user->redirect('../admin/admin.php');
	}
	else if ($_SESSION['user_level']==3){
		$user->redirect('../directeur/directeur.php');
	}
	else
 $user->redirect('../index.php');
}
include '../function/DB.php';
	$id = $_SESSION['user_session'];
            $db = new DB();
            $users = $db->getRows('mh_emp',array('where'=>array('id_emp'=>$id)));
            if(!empty($users)){  foreach($users as $user){ 
                                      
                               
                                   $id_emp=$user["id_emp"];
                                    $nom_emp=$user["nom_emp"]; 
								    $prenom_emp=$user[2]; 
								   $email_emp=$user[3]; 
								   $tel_emp= $user[4];
								  $dn_emp= $user[6];
								  $date_em_emp= $user[7];
								
							   } 
							   }
							   
				
		    $count=0;
            $users = $db->getRows('mh_message',array('where'=>array('id_emp'=>$_SESSION['user_session'])));
            if(!empty($users)){  foreach($users as $user){ 	
			$count++;
			}}
			 $count1=0;
            $users = $db->getRows('mh_conge',array('where'=>array('rep_admin'=>"En attente",'id_emp'=>$_SESSION['user_session'])));
            if(!empty($users)){  foreach($users as $user){ 
			$nom=$user['nom_emp'];
			$typec=$user['type_c'];
			$count1++;
			}}
						 $count2=0;$nbrj=0;
            $users = $db->getRows('mh_conge',array('where'=>array('rep_admin'=>"Valider",'id_emp'=>$_SESSION['user_session'])));
            if(!empty($users)){  foreach($users as $user){ 
			$nbrj=+$user['nbr_j'];
			}}$count2=30-$nbrj;
			
			$_SESSION['nbrj']=$count2;
			?>
	

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
                                <span><?php echo $_SESSION['user_prenom']; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Compte</li>

                                                                 
                                   
                                </li>
                                 
                               
                                        
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
                                        <li>
                                            <a href="../function/logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Déconnexion</a>
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
                                    <p>Bonsoir, <?php echo $_SESSION['user_prenom']
; ?></p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
                                </div>
                            </div>
                            <form action="#" method="get" class="sidebar-form">
                              
                            </form>
                            
                          <ul class="sidebar-menu">
                                <li class="active">
                                    <a href="Employe.php">
                                        <i class="fa fa-user"></i> <span>Mon profil</span>
                                    </a>
                                </li>
                                <li>
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
                                    <a href="mesabs.php">
                                        <i class="fa fa-calendar"></i> <span>Mes absences</span>
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
<div class="row" style="margin-bottom:5px;">


                        <div class="col-md-4">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                                <div class="sm-st-info">
                                     <span><?php echo $count1; ?></span>
                                    Total Demandes
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                                <div class="sm-st-info">
                                     <span><?php echo $count; ?></span>
                                    Total Messages
                                </div>
                            </div>
                        </div>
						 <div class="col-md-4">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-calendar"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $count2; ?></span>
                                   Nombre de jours restants
                                </div>
                            </div>
                        </div>
                       
				
				      </section>
                                    
									 <section class="content" id="pdf">

                    

                    <!-- Main row -->
                    

                       

    <div class="row">
        <div class="col-sm-10">
             <h1 class=""><?php echo $nom_emp." ".$prenom_emp ;?></h1>
         
          <button type="button" id="create_pdf" class="btn btn-success aaa">Version PDF</button><a href="param.php"><button type="button" class="btn btn-info aaa">Modifier</button> </a>
<br>
 
        </div>
      

        </div>
    
  <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profil</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Nom</strong></span> <?php echo $nom_emp ;?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Prenom</strong></span> <?php echo $prenom_emp ;?></li>
                    
              <li class="list-group-item text-right"><span class="pull-left"><strong class="">Tel </strong></span> <?php echo $tel_emp ;?></li>
			  <li class="list-group-item text-right"><span class="pull-left"><strong class="">Date de naissance</strong></span> <?php echo $dn_emp ;?></li>
            </ul>
			
           <div class="panel panel-default">
             <div class="panel-heading"> Date d'embauche

                </div>
                <div class="panel-body"><i style="color:green" class="fa fa-check-square"></i><?php echo $date_em_emp ;?>

                </div>
            </div>
            
          
           
           
        </div>
        <!--/col-3-->
        <div class="col-sm-9" style="" contenteditable="false">
           
       
           <div class="panel panel-default">
                <div class="panel-heading">Historique</div>
                <div class="panel-body">
								    <?php
					
            $db = new DB();
            $users = $db->getRows('mh_conge',array('where'=>array('id_emp'=>$id)));
            if(!empty($users)){  foreach($users as $row3){ 
			
			
			?>
    

   <div class="media thumbnail">
                   
                    <div class="media-body">
                        <h4 class="media-heading"> <?php echo $row3[6]; ?> 
                            <small>Début : <?php echo $row3[3]; ?>  , Fin : <?php echo $row3[4]; ?>  </small>
                        </h4>
                       <?php echo $row3[7]; ?> 
                    </div>
                </div>
    
    
    
    <?php
}

}
	
?>
	
				  

                </div>
</div></div>


            <div id="push"></div>
        </div>
       
        
        
       
        <!-- Quantcast Tag -->
        
        <noscript>
        &amp;amp;amp;amp;amp;amp;amp;lt;div style="display:none;"&amp;amp;amp;amp;amp;amp;amp;gt;
        &amp;amp;amp;amp;amp;amp;amp;lt;img src="//pixel.quantserve.com/pixel/p-0cXb7ATGU9nz5.gif" border="0" height="1" width="1" alt="Quantcast"/&amp;amp;amp;amp;amp;amp;amp;gt;
        &amp;amp;amp;amp;amp;amp;amp;lt;/div&amp;amp;amp;amp;amp;amp;amp;gt;
        </noscript>
        <!-- End Quantcast tag -->
        <div id="completeLoginModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                 <h3>Do you want to proceed?</h3>
            </div>
            <div class="modal-body">
                <p>This page must be refreshed to complete your login.</p>
                <p>You will lose any unsaved work once the page is refreshed.</p>
                <br><br>
                <p>Click "No" to cancel the login process.</p>
                <p>Click "Yes" to continue...</p>
            </div>
            <div class="modal-footer">
              <a href="#" id="btnYes" class="btn danger">Yes, complete login</a>
              <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
            </div>
        </div>
        <div id="forgotPasswordModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                 <h3>Password Lookup</h3>
            </div>
            <div class="modal-body">
                  <form class="form form-horizontal" id="formForgotPassword">    
                  <div class="control-group">
                      <label class="control-label" for="inputEmail">Email</label>
                      <div class="controls">
                          <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
                          <input name="email" id="inputEmail" placeholder="you@youremail.com" required="" type="email">
                          <span class="help-block"><small>Enter the email address you used to sign-up.</small></span>
                      </div>
                  </div>
                  </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a> 	
            	<a href="#" data-dismiss="modal" id="btnForgotPassword" class="btn btn-success">Reset Password</a>
            </div>
            
        </div>
        
        <div id="contactModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h3>Contact Us</h3>
                <p>suggestions, questions or feedback</p>
            </div>
            <div class="modal-body">
                  <form class="form form-horizontal" id="formContact">
                      <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
                      <div class="control-group">
                          <label class="control-label" for="inputSender">Name</label>
                          <div class="controls">
                              <input name="sender" id="inputSender" class="input-large" placeholder="Your name" type="text">
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label" for="inputMessage">Message</label>
                          <div class="controls">
                              <textarea name="notes" rows="5" id="inputMessage" class="input-large" placeholder="Type your message here"></textarea>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label" for="inputEmail">Email</label>
                          <div class="controls">
                              <input name="email" id="inputEmail" class="input-large" placeholder="you@youremail.com (for reply)" required="" type="text">
                          </div>
                      </div>
                  </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>     
                <a href="#" data-dismiss="modal" aria-hidden="true" id="btnContact" role="button" class="btn btn-success">Send</a>
            </div>
        </div>
        
        
        
	
	

                                


                  
                    
                   
                    
              
                </section>
               
            </aside>

        </div>
			
			

       
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

                    

                    <!-- Main row -->
                   
        
      

       
        <script>

			$(document).ready(function(){
    
   

	}
	)
	;
</script>
<script type="text/javascript">
   
</script>
</body>
</html>