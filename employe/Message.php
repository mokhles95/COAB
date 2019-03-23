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
				

                    <div class="row">

                        <div class="col-md-12">
						<div class="box-tools m-b-15">
                                       
                                    </div>
                           <section class="panel">
                              <header class="panel-heading">
                                 boite de réception
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
									
                                      <th>Nom & Prénom</th>
                                      <th>Sujet</th>
                                      
                                      <th>Date</th>
                                      
                                      <th>Messages</th>
                                      
									     

										 

                                  </tr>
                              </thead>
                              <tbody>
                                 <?php
							  include '../function/DB.php';
            $db = new DB();
            $users = $db->getRows('mh_message',array('where'=>array('id_dist'=>$_SESSION['user_session'])));
            if(!empty($users)){  foreach($users as $user){ ?>
                                      
                                <tr>
                                  <td> <?php echo $user["id_msg"]; ?> </td>
                                  <td> <?php echo $user["type_msg"]; ?> </td>
								  <td> <?php echo $user["libelle_msg"]; ?>  </td>
								  <td> <?php echo $user["id_emp"]; ?> </td> 
								  <td> <?php echo $user["np_dist"]; ?> </td> 
								   <td>
         <a href="detailmessage.php?id= <?php echo $user["id_msg"]; ?> &type=recu" >Détails</a>
                                                 
        <a href="../function/class.msg.php?action_type=delete&id=<?php echo $user['id_msg']; ?>" onclick="return confirm('voulez-vous vraiment supprimer ce message?');"> <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button></a>
												  </td>
							
                             </tr>
							 <?php } }?>                  
                             <tr>
                           
							  </tr>
                          </tbody>
                      </table>
					  <br>
					 
						  <div class=" add-task-row">
                                  <a class="btn btn-success btn-sm pull-left" href="#ajoutmsg" data-toggle="modal">Nouveau Message</a>
                                  
                              </div>	  
                  </div>
                                        </section>
                                     <section class="panel">
                              <header class="panel-heading">
                                  Message envoyé
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
									
                                      <th>Nom & Prénom</th>
                                      <th>Sujet</th>
                                      
                                      <th>Date</th>
                                      
                                      <th>Messages</th>
                                      
									     

										 <th>Opération</th>

                                  </tr>
                              </thead>
                              <tbody>
                               <?php
					
            $db = new DB();
            $users = $db->getRows('mh_message',array('where'=>array('id_emp'=>$_SESSION['user_session'])));
            if(!empty($users)){  foreach($users as $user){ ?>
                                      
                                <tr>
                                  <td> <?php echo $user["id_msg"]; ?> </td>
								  <td> <?php echo $user["np_dist"]; ?> </td> 
                                  <td> <?php echo $user["type_msg"]; ?> </td>
								  
								  <td> <?php echo $user["id_emp"]; ?> </td> 
								  <td> <?php echo $user["libelle_msg"]; ?>  </td>
								  
								   <td>
          <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                 
        <a href="../function/class.msg.php?action_type=delete&id=<?php echo $user['id_msg']; ?>" onclick="return confirm('voulez-vous vraiment supprimer ce message?');"> <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button></a>
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
                                     


                                   
                                      <div class="modal fade" id="ajoutmsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title"> Nouveau Message</h4>
                                                    </div>
                                                    <div class="modal-body">

                                    <form class="form-horizontal tasi-form" method="POST" action="../function/class.msg.php">
                                      
									   <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">à</label>
                                          <div class="col-sm-10">
                                             <SELECT name="id_dist" size="1" class="form-control round-input" >
									   <?php
           
            $db = new DB();
            $users = $db->getRows('mh_emp',array('order_by'=>'id_emp DESC'));
            if(!empty($users)){  foreach($users as $user){ ?>
<OPTION value="<?php echo $user["id_emp"]; ?>"> <?php echo $user["nom_emp"]." ".$user["prenom_emp"]; ?> </option>

  <?php } }?>

</SELECT>
                                              
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Sujet</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" name="sujet">
                                              
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Message</label>
                                          <div class="col-sm-10">
                                              <textarea class="form-control" name="msg"></textarea>
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Fichier</label>
                                          <div class="col-sm-10">
                                              <input type="FILE" class="form-control"></textarea>
											  <input  type="hidden" name="action_type" id="btn_ajout" value="add">
                                      <input  type="hidden" name="id_emp" id="btn_ajout" value="<?php echo $_SESSION["user_session"] ?> ">
                                          </div>
                                      </div>
                                      
										  
                                 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                       <input value="envoyer" class="btn btn-warning" type="submit" id="btn_envoyer"> 
													    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                    
							
		
                          </div>
						 
						  
                      </div>
					  </div>
						  
                    
                
              
                </section>
				
              
            </aside>

        
		
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
       
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        
      

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