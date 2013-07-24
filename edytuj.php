<?php
  include("szablon/top.php");
  include("szablon/menu.php");
  include("konfiguracja.php");
  db_connect(); 
  
    $id = get_id(); 
    if(isset($_POST['zmien'])) {					      
        $tresc = clear($_POST['tresc']);
        $data = date("d-m-Y");
        
        $update = "UPDATE `notatka` SET `tresc` = '{$tresc}',`data` = '{$data}' WHERE `id`='{$id}' LIMIT 1";
        $result= mysql_query($update);
        if(!($result)) 
            echo '<p>Wystąpił błąd:<br>'.mysql_error().'</p>';     
        else
            header("Location: index.php"); 
             
    }
    if(isset($_POST['wyjdz'])) {
        header("Location: index.php"); 
    }
    form_edycji($id);
    
    
  include("szablon/stopka.php");
  db_close();  
  
  
  
  
  
function get_id(){
  	$url = $_SERVER["REQUEST_URI"];
    $b=explode('?', $url);
	  parse_str($b[1], $out);
 	  return $out['id'];
}


function form_edycji($note_id){
    
    $zapytanie = "SELECT `tresc` FROM `notatka` WHERE `id`='{$note_id}' LIMIT 1";
    $result = mysql_query($zapytanie);
    $note = mysql_fetch_row($result);         
		if ( !empty($note[0])){
      	echo '
        	<form id= "form" enctype="multipart/form-data" method="post" action="edytuj.php?id='.$note_id.'" > 
                  <ul>                 
            		       <li><b><br>Tresc:<br><br></b></li>
            	         <li><textarea name="tresc" cols="80" rows="5" >'.$note[0].'</textarea></li>
                  </ul>  
                  <p>             
                    <input type="submit" name=zmien value="Zmień"> <input type="submit" name=wyjdz value="Wyjdź">                  
                  </p> 
          </form> 
           
      	';
    }
} 




?>
