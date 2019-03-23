
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
                                <span>Mokhles <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Compte</li>

                                <li>
                                    
                                    
                                    
                                    
                                </li>

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
                                    <p>Bonsoir, Mokhles</p>

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
                                <li class="active">
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

                    <div class="row">

                        <div class="col-md-12">
                           <section class="panel">
                              <header class="panel-heading">
                                  Listes des emplyes
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
									
                                      <th>Nom</th>
                                      <th>Prenom</th>
                                       <th>Email</th>
                                      <th>Date d'embauche</th>
                                      
                                      
                                    
									     

										 <th>Opération</th>

                                  </tr>
                              </thead>
                              <tbody>
							  <?php
            include '../function/DB.php';
            $db = new DB();
            $users = $db->getRows('mh_emp',array('order_by'=>'id_emp DESC'));
            if(!empty($users)){  foreach($users as $user){ ?>
                                      
                                <tr>
                                  <td> <?php echo $user["id_emp"]; ?> </td>
                                  <td> <?php echo $user["nom_emp"]; ?> </td>
								  <td> <?php echo $user["prenom_emp"]; ?>  </td>
								   <td> <?php echo $user["email_emp"]; ?> </td>
								  <td> <?php echo $user["DateEm_emp"]; ?> </td>
								  
							
                                 
                               
                                
								  <td>
                                                
<a href="profilemp.php?&id=<?php echo $user['id_emp']; ?>">	<button class="btn btn-default btn-xs"><i class="fa fa-check"></i>Détails</button>		</a>									                                    
                              
                               
           
								  </td>
                                             
                              </tr>
                                                            <?php } }?>

                              
                          </tbody>
                      </table>
					  <br>
					  <div class=" add-task-row">
                                  <a class="btn btn-success btn-sm pull-left" href="#ajoutemp" data-toggle="modal">Ajouter Employés</a>
                                
                              </div>
							  
                  </div>
                                        </section>
                                     

                                    </div>
                                        <div class="modal fade" id="modifemp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title"> Modifier Employé</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                       <form class="form-horizontal tasi-form" method="get">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">CIN*</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" value="07212360" id="CINE" disabled="">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Nom*</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="nomE">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Prenom*</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control round-input" id="prenomE">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Date de naissance</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" id="dateE" type="date" value="jj/mm/aaaa">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" id="EmailE" type="email" >
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Adresse</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="AdresseE" >
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Tel</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" placeholder="" id="TelE">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 col-sm-2 control-label">Date d'ambauche</label>
                                         <div class="col-sm-10">
                                              <input type="date" class="form-control" placeholder="" id="Date_d'embauche_E">
                                          </div>
                                          </div>
                      
                                  </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                        <button class="btn btn-warning" type="button" id="btn_modif"> Confirmer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										
										
										
										
										
                             <div class="modal fade" id="ajoutemp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title"> Nouveau employé</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                    <form class="form-horizontal tasi-form" method="POST" action="../function/user.php">
                                      <div class="form-group">
                                          
                                          <label class="col-sm-2 col-sm-2 control-label">CIN*</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" id="CINE" name="cin" type="text" required >
                                          </div>
                                      
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Nom*</label>
                                          <div class="col-sm-10">
                                              <input type="text"  name="nom" class="form-control" required>
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Prenom*</label>
                                          <div class="col-sm-10">
                                              <input type="text"  name="prenom" class="form-control round-input" required>
                                          </div>
										  </div>
										  <div class="form-group">
										   <label class="col-sm-2 col-sm-2 control-label">fonction*</label>
                                          <div class="col-sm-10">
                                                <SELECT  size="1" name="fonction" class="form-control round-input" required >
									   <?php
          
            $db = new DB();
            $users = $db->getRows('mh_fonction',array('order_by'=>'id_fonction DESC'));
            if(!empty($users)){  foreach($users as $user){ ?>
<OPTION value="<?php echo $user["nom_fonc"]; ?>"> <?php echo $user["nom_fonc"]; ?> </option>

  <?php } }?>

</SELECT>
											  </div>
											  </div>
											  <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">niveau</label>
										   <div class="col-sm-10">
									  <SELECT class="form-control" name="niveau" size="1" required>
<OPTION>1
<OPTION>2
<OPTION>3

</SELECT>
</div>
</div>
                                         
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Date de naissance</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" name="DN" id="dateE" type="date" value="jj/mm/aaaa" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                          <div class="col-sm-10">
                                              <input type="email"  name="email"class="form-control" id="EmailE" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Adresse</label>
                                          <div class="col-sm-10">
                                              <input type="text" name="adresse" class="form-control" id="AdresseE" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Tel</label>
                                          <div class="col-sm-10">
                                              <input type="text" name="tel" class="form-control" placeholder="" id="TelE" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 col-sm-2 control-label">Date d'ambauche</label>
                                         <div class="col-sm-10">
                                              <input type="date" name="dateEm"class="form-control" placeholder="" id="Date_d'embauche_E">
											  <input  type="hidden" name="action_type" id="btn_ajout" value="add">
                                          </div>
										   <div class="modal-footer">
                                                         <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                        <input class="btn btn-warning" type="submit" id="btn_ajout" value="confirmer">
                                                    </div>
										   
										  
                                  </form>
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