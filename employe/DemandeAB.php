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
	  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
  
    
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
                                    <p>Bonsoir,<?php echo $_SESSION['user_prenom']; ?></p>

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
                                    <a href="DemandeAB.php">
                                        <i class="fa fa-tasks"></i> <span>Demande d'absence </span>
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

                  <section class="panel">
                              <header class="panel-heading">
                                 Demande d'absence
                              </header>
                              <div class="panel-body">
                                    <form class="form-horizontal tasi-form" method="POST" action="../function/class.demandeAB.php">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Date début*</label>
                                          <div class="col-sm-10">
                                              <input type="date" id="dateD" name="dateD" class="form-control" required>
                                          </div>
                                      </div>
									  
									 
                                       <input type="hidden"  name="action_type" value="add" class="form-control" >
                                     <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Date fin*</label>
                                          <div class="col-sm-10">
                                              <input type="date" id="dateF" name="datef" class="form-control" required>
                                          </div>
                                      </div>
	

                                
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Description</label>
                                          <div class="col-sm-10">
                                              <input   style="width:100%; height:200px;" type="text" name="description" id="descriptionD" class="form-control" required>
                                          </div>
										    
											</div>
													<input  class="btn btn-success pull-right"  type="submit">
                                                    
														
											</form>
									
                              
              				</section>
                                        </section>
                                     

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
       
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        
      

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
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>
<script type="text/javascript">
   
</script>
</body>
</html>