<?php
  include("szablon/top.php");
  include("szablon/menu.php");
  include("konfiguracja.php");
  db_connect();  
   $id = get_id();
   $zapytanie = "DELETE FROM `notatka` WHERE `id`='{$id}'";
   $result = mysql_query($zapytanie);
   if(!($result)) 
                echo '<p>Wystąpił błąd:<br>'.mysql_error().'</p>';     
            else
                header("Location: index.php"); 




    
  include("szablon/stopka.php");
  db_close(); 

?>
