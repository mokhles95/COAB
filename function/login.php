<?php
class USER
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }

 
    public function login($uname,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM mh_emp WHERE email_emp=:uname AND mdp=:upass");
          $stmt->execute(array(':uname'=>$uname, ':upass'=>$upass));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
		  {
                $_SESSION['user_session'] = $userRow['id_emp'];
				$_SESSION['user_level'] = $userRow['Poste_emp'];
				$_SESSION['user_nom'] = $userRow['nom_emp'];
				$_SESSION['user_prenom'] = $userRow['prenom_emp'];
				$_SESSION['nbrj'] = 0 ;

                return true;
				
             }
             else
             {
                return false;
             }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
		header("Location: index.php");
   }
}
?>