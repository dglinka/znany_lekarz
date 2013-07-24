<?php
  include("szablon/top.php");
  include("szablon/menu.php");
  include("konfiguracja.php");
  
  db_connect();  

  if(isset($_POST['dodaj'])) {					      
      $tresc = clear($_POST['tresc']);
      $data = date("d-m-Y");
      if (!(empty($tresc))){   
          $zapytanie = "INSERT INTO `notatka` ( `tresc`,`data`) VALUES ('{$tresc}','{$data}')";           
          $result = mysql_query($zapytanie);
          if(!($result)) 
              echo '<p>Wystąpił błąd:<br>'.mysql_error().'</p>';     
          else
              echo '<p>Notatka została dodana!<br>';
      }else
          echo'<p>Notatka nie może być pusta!</p>';   
  }
  formularz();

     
  include("szablon/stopka.php");
  db_close();       



function formularz(){
  	echo '
    	<form id= "form" enctype="multipart/form-data" method="post" action="dodaj.php" > 
              <ul>                 
        		       <li><b><br>Nowa notatka:<br><br></b></li>
        	         <li><textarea name="tresc" cols="80" rows="5"></textarea></li>
              </ul>  
              <p>             
                <input type="submit" name=dodaj value="Dodaj">                  
              </p> 
      </form> 
  	';
}       

?>