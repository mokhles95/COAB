
<?php
include_once '../function/dbconfig.php';
if(!$user->is_loggedin()!="" || $_SESSION['user_level']!=3)
{
	if ($_SESSION['user_level']==1){
		$user->redirect('../admin/admin.php');
	}
	else if ($_SESSION['user_level']==2){
		$user->redirect('../employe/Employe.php');
	}
	else
 $user->redirect('../index.php');
}
	
?>
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
                                    <a href="admin.php">
                                        <i class="fa fa-desktop"></i> <span>Accueil</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="employe.php">
                                        <i class="fa fa-user"></i> <span>Employés</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Message.php">
                                        <i class="fa fa-envelope"></i> <span>Messages</span>
                                    </a>
                                </li>

                               

                                <li class="active">
                                    <a href="demande.php">
                                        <i class="fa fa-tasks"></i> <span>Demandes </span>
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

                        <div class="col-md-12">
                           <section class="panel">
                              <header class="panel-heading">
                                  demande de congé
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
									
                                      <th>Employé</th>
                                      
                                      
                                      <th>nombre de jours</th>
                                      
                                      <th>Premier jour de congé</th>
								      <th>Dernier jour de congé</th>
									  <th>décision de l'administrateur</th>
                                      
									     

										 <th></th>

                                  </tr>
                              </thead>
                              <tbody>
							  <?php
							  include '../function/DB.php';
            $db = new DB();
                        $users = $db->getRows('mh_conge',array('where'=>array('rep_rh'=>"valider")));
            if(!empty($users)){  foreach($users as $user){ ?>
                                      
                                <tr>
                                  <td> <?php echo $user["id_c"]; ?> </td>
                                  <td> <?php echo $user["nom_emp"]; ?> </td>
								  <td> <?php echo $user["nbr_j"]; ?>  </td>
								  <td> <?php echo $user["dateD"]; ?> </td>
								  <td> <?php echo $user["dateF"]; ?> </td>
								  <td> <?php echo $user["rep_rh"]; ?> </td>

								
                                 
                               
                                
								  <td>
                               

                                 
								  <td>
                                  <a class="btn btn-success btn-xs pull-left" href="../function/class.demande.admin.php?action_type=edit&id=<?php echo $user['id_c']; ?>&rep=valider"onclick="return confirm('voulez-vous vraiment accepter cette demande?');">Accepter</a>
                                  <a class="btn btn-danger btn-xs pull-left" href="../function/class.demande.admin.php?action_type=edit&id=<?php echo $user['id_c']; ?>&rep=Réfuser"onclick="return confirm('voulez-vous vraiment réfuser cette demande?');">Réfuser</a>

												  </td>
                                             
                              </tr>
							  <?php } }?>
                             
                              
                          </tbody>
                      </table>
					  <br>
					  <div class=" add-task-row">
                                 
                              </div>
							  
                  </div>
                                        </section>
                                      <div class="row">

                       
                                        
                                                    </div>
                                                    
                                                </div>
												   <div class="col-md-12">
                           <section class="panel">
                              <header class="panel-heading">
                                  demandes acceptées
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
									
                                      <th>Employé</th>
                                      
                                      
                                      <th>nombre de jours</th>
                                      
                                      <th>Premier jour de congé</th>
								      <th>Dernier jour de congé</th>
									
                                      
									     

										 <th></th>

                                  </tr>
                              </thead>
                              <tbody>
							  <?php
							  
                        $users = $db->getRows('mh_conge',array('where'=>array('rep_admin'=>"valider")));
            if(!empty($users)){  foreach($users as $user){ ?>
                                      
                                <tr>
                                  <td> <?php echo $user["id_c"]; ?> </td>
                                  <td> <?php echo $user["nom_emp"]; ?> </td>
								  <td> <?php echo $user["nbr_j"]; ?>  </td>
								  <td> <?php echo $user["dateD"]; ?> </td>
								  <td> <?php echo $user["dateF"]; ?> </td>
							

								
                                 
                               
                                
								  <td>
                               

                                 
								  <td>
                                 

												  </td>
                                             
                              </tr>
							  <?php } }?>
                             
                              
                          </tbody>
                      </table>
					  <br>
					  <div class=" add-task-row">
                                 
                              </div>
							  
                  </div>
                                        </section>
                                      <div class="row">

                       
                                        
                                                    </div>
                                                    
                                                </div>
												  <div class="col-md-12">
                           <section class="panel">
                              <header class="panel-heading">
                                  demandes réfusées
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
									
                                      <th>Employé</th>
                                      
                                      
                                      <th>nombre de jours</th>
                                      
                                      <th>Premier jour de congé</th>
								      <th>Dernier jour de congé</th>
									
                                      
									     

										 <th></th>

                                  </tr>
                              </thead>
                              <tbody>
							  <?php
							  
                        $users = $db->getRows('mh_conge',array('where'=>array('rep_admin'=>"réfuser")));
            if(!empty($users)){  foreach($users as $user){ ?>
                                      
                                <tr>
                                  <td> <?php echo $user["id_c"]; ?> </td>
                                  <td> <?php echo $user["nom_emp"]; ?> </td>
								  <td> <?php echo $user["nbr_j"]; ?>  </td>
								  <td> <?php echo $user["dateD"]; ?> </td>
								  <td> <?php echo $user["dateF"]; ?> </td>
							

								
                                 
                               
                                
								  <td>
                               

                                 
								  <td>
                                 

												  </td>
                                             
                              </tr>
							  <?php } }?>
                             
                              
                          </tbody>
                      </table>
					  <br>
					  <div class=" add-task-row">
                                 
                              </div>
							  
                  </div>
                                        </section>
                                      <div class="row">

                       
                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    
                    
							
		
                          </div>
                      </section>
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
		<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" type="text/javascript"></script>
        
      

        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
              
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
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