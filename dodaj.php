<?php
  include("szablon/top.php");
  include("szablon/menu.php");
  include("konfiguracja.php");
  
  db_connect();  

  if(isset($_POST['dodaj'])) {					      
      $tresc = clear($_POST['tresc']);
      $data = date("d M Y, H:i:s");
      if (!(empty($tresc))){   
        $zapytanie = "INSERT INTO `notatka` ( `tresc`,`data`) VALUES ('{$tresc}', '{$data}')";           
        $result = mysql_query($zapytanie);
        if(!($result)) 
            echo '<p>Wyst¹pi³ b³¹d:<br>'.mysql_error().'</p>';     
        else
            echo '<p>Notatka zosta³a dodana!<br>';
      }   
  }
  formularz();

          
            
            
  
     
  include("szablon/stopka.php");
  db_close();       




function formularz(){
  	echo '
    	<form id= "form" enctype="multipart/form-data" method="post" action="dodaj.php" > 
              <ul>                 
        		       <li><b><br>Tresc:<br><br></b></li>
        	         <li><textarea name="tresc" cols="80" rows="5"></textarea></li>
              </ul>  
              <p>             
                <input type="submit" name=dodaj value="Dodaj">                  
              </p> 
      </form> 
  	';
}

?>