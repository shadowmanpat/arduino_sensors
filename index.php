
<?php
//ini_set("display_errors",1);
include ("includes/header.php");
include ("db/DBHandler.php");




$dbHandler  = new DBHandler();

//echo  $dbHandler -> getAllRequests();
$text = '<table class="table">
  <thead>
    <tr>
     
     <th scope="col">id</th>
 
      <th scope="col">value</th>
      <th scope="col">date</th>
    
    </tr>
  </thead>
  <tbody>
 
';


$res = $dbHandler-> getAllRequests();
//        $res ->
//        $text= "";
while ($row = $res->fetchArray()) {
    $r = "   <tr>
    
          <th scope=\"row\">" . $row['id'] . "</th>
            
              <td>" . $row['value'] . "</td>
              <td>" . $row['created'] . "</td>
            
            </tr>";
    $text = $text . $r;
//            echo "{$row['id']} {$row['title']} {$row['path']} \n";
}
$text = $text . "</tbody></table>";
echo $text;

include ("includes/footer.php");
?>
