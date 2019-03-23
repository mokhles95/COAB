
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

            $db = new DB();
            $users = $db->getRows('mh_emp',array('where'=>array('id_emp'=>$_SESSION['user_session'])));
            if(!empty($users)){  foreach($users as $user){ 
                                      
                               
                                   $id_emp=$user["id_emp"];
                                    $nom_emp=$user["nom_emp"]; 
								    $prenom_emp=$user[2]; 
								   $email_emp=$user[3]; 
								   $tel_emp= $user[4];
								    $adresse_emp= $user[5];
								  $dn_emp= $user[6];
								  $date_em_emp= $user[7];
								  $password= $user[10];
			}}?>
<!DOCTYPE html>
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
                                <span><?php echo $_SESSION['user_prenom']
; ?></p> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Compte</li>

                                <li>
                                    
                                    

                                <li class="divider"></li>

                                    <li>
                                        <a href="admin.php">
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
							<li>
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
								<li class="active">
                                    <a href="param.php">
                                        <i class="fa fa-cog"></i> <span>parametres</span>
                                    </a>
                                </li>
								

                            </ul>
                        </section>
                    </aside>

                    <aside class="right-side">

                <section class="content" id="pdf">

                    

                   
                    

                       
 <div class="row">
                      <div class="col-lg-12">
                          <section class="panel">
                              <header class="panel-heading">
                                  Mot de passe
                              </header>
                              <div class="panel-body">
                                  <form role="form" >
                                     
                                      <div class="form-group">
                                          <label for="exampleInputPassword1">Entrez votre mot de passe actuel</label>
                                          <input type="password" class="form-control" id="pass1" placeholder="Mot de passe">
                                      </div>
                                     
                                      <button type="button" id="verifmdp" class="btn btn-info">Vérifier</button>
									  <p id="msg" style="display:none" class="alert alert-warning"> </p>
                                  </form>

                              </div>
                          </section>
                      </div>
                  
                    </div>
                   
                    <div class="row">
					
                        <div class="col-md-8">
                            <section class="panel">
                              <header class="panel-heading">
                                 Mes informations
                              </header>
                              <div class="panel-body">
                                  <form id="update" class="form-horizontal tasi-form" action="function/compte.php" method="POST">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Nom</label>
                                          <div class="col-sm-10">
                                              <input type="text" name="nom" value="<?php echo $nom_emp; ?>" class="form-control dis" required>
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Prénom</label>
                                          <div class="col-sm-10">
                                              <input type="text" name="prenom" value="<?php echo $prenom_emp; ?>" class="form-control dis" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                          <div class="col-sm-10">
                                              <input type="email" name="email"class="dis form-control" value="<?php echo $email_emp; ?>" required>
                                              <span class="help-block">entrez un email valide</span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Mot de passe</label>
                                          <div class="col-sm-10">
                                              <input type="password" id="password" name="password" min-length="8" value="<?php echo $password; ?>" class="form-control dis round-input">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Adresse</label>
                                          <div class="col-sm-10">
                                              <input class="form-control dis" name="adresse" id="focusedInput" value="<?php echo $adresse_emp; ?>" type="text" >
                                          </div>
										   <input  name="action"  value="updateinfo" type="hidden" >
                                      </div>
                                      
                                      
                                      
                                      <input type="submit" class="btn btn-info dis" value="Valider">
                                  </form>
                              </div>
                            </section>
                           
                           

                           
                       
                        </div>
                    </div>
					
	
	

                                


                  
                    
                   
                    
              
                </section>
               
            </aside>

        </div>
		<div class="modal fade" id="exp1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 
			
			

       
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
    
    $( ".dis" ).prop( "disabled", true );
	$("#msg").html ("") ;
	
	
	
	$("#verifmdp").click(function(){
		$("#msg").show() ;
		
					
					

               if($("#pass1").val() == $("#password").val() ){
                    

                    $( ".dis" ).prop( "disabled", false );
					$("#msg").html ("Mot de passe correcte") ;
                }
				
                else{
                    
                   $( ".dis" ).prop( "disabled", true );
                   $("#msg").html ("Mot de passe incorrecte") ;
               } 
			
		
	});
   
   

	
	
 
	  
	 

	
   

	}
	)
	;
</script>
<script type="text/javascript">
   
</script>
</body>
</html>