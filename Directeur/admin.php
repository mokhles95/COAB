<?php
include_once '../function/dbconfig.php';
if(!$user->is_loggedin()!="" || $_SESSION['user_level']!=3)
{
	if ($_SESSION['user_level']==2){
		$user->redirect('../employe/Employe.php');
	}
	else if ($_SESSION['user_level']==1){
		$user->redirect('../directeur/directeur.php');
	}
	else
 $user->redirect('../index.php');
}
include '../function/DB.php';

            $db = new DB();
		    $count=0;
            $users = $db->getRows('mh_message',array('order_by'=>'date DESC'));
            if(!empty($users)){  foreach($users as $user){ 	
			$count++;
			}}
			 $count1=0;
            $users = $db->getRows('mh_conge',array('where'=>array('rep_rh'=>"valider")));
            if(!empty($users)){  foreach($users as $user){ 
			$nom=$user['nom_emp'];
			$typec=$user['type_c'];
			$count1++;
			}}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>COAB | Administrateur</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="">
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
                                <span> <?php echo $_SESSION['user_prenom']; ?><i class="caret"></i></span>
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
							 <li class="active">
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

                               

                                <li>
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
				<div class="row" style="margin-bottom:5px;">


                        <div class="col-md-6">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $count1; ?></span>
                                    Total Demandes
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $count; ?></span>
                                    Total Messages
                                </div>
                            </div>
                        </div>
                       

                    <div class="row">

                        <div class="col-md-8">
                           <section class="panel">
                              <header class="panel-heading">
                                  Nouveautées
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Nom</th>
                                   
                                      
                                      <th>Nombre de jours</th>
									  <th>Etat</th>

                                      
                                      
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                   <?php
          
            $users = $db->getRows('mh_conge',array('limit'=>'3'));
            if(!empty($users)){  foreach($users as $user){ ?>
                                      
                                <tr>
                                  <td> <?php echo $user["id_emp"]; ?> </td>
                                  <td> <?php echo $user["nom_emp"]; ?> </td>
								 
								   <td> <?php echo $user["nbr_j"]; ?> </td>
								  <td> <?php echo $user["rep_rh"]; ?> </td>
								  
							
                                 
                               
                                
								      
                              </tr>
                                                            <?php } }?>
                                 
                                 
                              </tr>
                             
                          </tbody>
                      </table>
					   <br>
					  <div class=" add-task-row">
					   
                                  <a class="btn btn-default btn-sm pull-right" href="demande.php">Afficher tous</a>
                              </div>
                  </div>
				  
                                        </section>
                                     

                                    </div>
                                    <div class="col-lg-4">

                                      
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Notifications
                                            </header>
                                                <div class="panel-body" id="noti-box">
												<?php
 $users = $db->getRows('mh_conge',array('where'=>array('rep_rh'=>"Valider")));
            if(!empty($users)){  foreach($users as $user){ 
			$nom=$user['nom_emp'];
			$typec=$user['type_c'];
			?>
	 <div class="alert alert-block alert-warning">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>
                                                        </strong> Monsieur <?php echo $nom; ?> a demandé un congé <?php echo $typec; ?>
                                                    </div>
           <?php                                         
			}}
			?>
                                                   
                                                   


                                                </div>
                                        </section>



                      </div>


                  </div>
                    
                   
                    <div class="row">
                        
                        <div class="col-md-12">
                          <section class="panel tasks-widget">
                              <header class="panel-heading">
                                  Notes
                            </header>
                            <div class="panel-body">

                              <div class="task-content">

                                  <ul class="task-list">
								   <?php
           
            $users = $db->getRows('mh_note',array('order_by'=>'id_note DESC'));
            if(!empty($users)){ $count = 0; foreach($users as $user){ $count++;?>
                                      <li>
                                          <div class="task-checkbox">
                                             
                                              <input type="checkbox" class="flat-grey list-child"/>
                                              
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp"><?php echo $user['desc_note']; ?></span>
                                              <span class="label label-success"><?php echo $user['date_faire']; ?></span>
                                              <div class="pull-right hidden-phone">
                                                 
                                                  <a href="../function/note.php?action_type=delete&id=<?php echo $user['id_note']; ?>" onclick="return confirm('Are you sure?');"> <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button></a>
                                              </div>
                                          </div>
                                      </li>
                                     <?php } }else{ ?>
                                      <li>
                                          
                                          <div class="task-title">
                                              <span class="task-title-sp">pas de notes</span>
                                             
                                             
                                          </div>
                                      </li>
											  
                                              
                                              
            <?php } ?>
                                     
                                     
                                  </ul>
                              </div>

                              <div class=" add-task-row">
                                  <a class="btn btn-success btn-sm pull-left" href="#Ajout_note" data-toggle="modal">Ajouter Note</a>
								  <div class="modal fade" id="Ajout_note" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title"> Ajouter note</h4>
                                                    </div>
                                                    <div class="modal-body">

                                    <form class="form-horizontal tasi-form" method="POST" action="../function/action.php">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">note</label>
                                          <div class="col-sm-10">
                                              <input type="text" name="note" class="form-control" id="note" >
											</div>  
                                          </div>
										   <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Date</label>
                                          <div class="col-sm-10">
                                              <input type="date" name="date_faire" class="form-control" id="note" >
											</div>  
                                          </div>
										  <input type="hidden" name="action_type" value="add"/>
										  <input  class="btn btn-warning" type="submit" id="btn_modif" value="valider">
                                      
									</form>
                                      
                      
                                 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                        
                                                    </div>
													 
                                                </div>
                                            </div>
                                        </div>
                                  <a class="btn btn-default btn-sm pull-right" href="#">voir tous les notes</a>
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
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
   
</script>
</body>
</html>