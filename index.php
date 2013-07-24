<?php
  include("szablon/top.php");
  include("szablon/menu.php");
  include("konfiguracja.php");
  db_connect();  

  wyswietl();
          
            
            
     
  include("szablon/stopka.php");
  db_close();  






function wyswietl(){   
    $zapytanie = "SELECT `id`,`data`,`tresc` FROM `notatka`";
    $result = mysql_query($zapytanie);
    echo '<table id=tab_notatki>';
    while ($row = mysql_fetch_row($result)) {
        echo '<tr><td>'. $row[1] .'</td><td>'. $row[2].'</td></tr>';
    }
    echo '<table>';
}
     
?>
