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
    while ($row = mysql_fetch_row($result)){                            
            $id = $row[0];
            $data = $row[1];
            $tresc = $row[2];
            
      		  echo '
            <div id = notatka>
                <div id=data>
                   '.$data.'
                </div>
                <div id=tresc>
                     <p>'.$tresc.'</p>
                </div>
                
                <div id=usun>
                     <a href="usun.php?id='.$id.'" id=a_usun>Usuń</a>
                </div> 
                 <div id=edytuj>
                     <a href="edytuj.php?id='.$id.'" id=a_edytuj>Edytuj</a>
                </div>   
            </div> 
            ';
    }
    
}
     
    
     
     
?>
