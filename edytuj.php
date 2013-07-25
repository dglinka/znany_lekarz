<?php
  include("szablon/top.php");
  include("szablon/menu.php");
  include("konfiguracja.php");
  db_connect(); 
  
    $id = get_id(); 
    if(isset($_POST['zmien'])) {					      
        if( !empty($_POST['tresc']) ){
            $tresc = clear($_POST['tresc']);
            $data = date("d-m-Y");
            
            $update = "UPDATE `notatka` SET `tresc` = '{$tresc}',`data` = '{$data}' WHERE `id`='{$id}' LIMIT 1";
            $result= mysql_query($update);
            if(!($result)) 
                echo '<p>Wystąpił błąd:<br>'.mysql_error().'</p>';     
            else
                header("Location: index.php"); 
         } else 
            echo '<p id=blad> Notatka nie może być pusta!</p>';
             
    }
    if(isset($_POST['wyjdz'])) {
        header("Location: index.php"); 
    }
    form_edycji($id);
    
    
  include("szablon/stopka.php");
  db_close();  
  
  
function form_edycji($note_id){ 
    
    $zapytanie = "SELECT `tresc`, `data` FROM `notatka` WHERE `id`='{$note_id}' LIMIT 1";
    $result = mysql_query($zapytanie);
    $note = mysql_fetch_row($result);         
		if ( !empty($note[0])){
      	echo '
        	<form id= "form" enctype="multipart/form-data" method="post" action="edytuj.php?id='.$note_id.'" > 
                   <p>Data ostatniej edycji: '.$note[1].'</p>
                  <ul>                
            	         <li><textarea name="tresc" cols="100" rows="10" id = pole>'.$note[0].'</textarea></li>                           
                       <li><input type="submit" name=zmien id=przycisk value="Zmień"> <input type="submit" id=przycisk name=wyjdz value="Wyjdź"> </li>                 
                  </ul>  
          </form> 
           
      	';
    }
} 




?>
