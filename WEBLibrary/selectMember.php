<!-- Search Member -->

<!-- 1 members.php -->
<!-- 2 selectMember.php -->

<?php

try { 
$pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(name) FROM Members where name = :mname';
$result = $pdo->prepare($sql);
$result->bindValue(':mname', $_POST['mname']);          
$result->execute();                                                  
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM Members where name = :mname';
    $result = $pdo->prepare($sql);
    $result->bindValue(':mname', $_POST['mname']); 
    $result->execute();

while ($row = $result->fetch()) {
       
      echo("<table border = '1'>");
 
      echo("<tr><th>Member ID</th>");
      echo("<th>Name</th>");
      echo("<th>Address</th>");
      echo("<th>DOB</th>");
      echo("<th>Phone</th></tr>");     
      
      echo("<tr><td>");
      echo $row['memId'] . '<br>';
      
      echo("</td><td>");
      echo $row['name'] . '<br>';
      
      echo("</td><td>");
      echo $row['address'] . '<br>';
      
      echo("</td><td>");
      echo $row['dob'] . '<br>';
      
      echo("</td><td>");
      echo $row['phone'] . '<br>';
  
      echo("</td></tr>");

   }
}
else {
      print "<br><h3>No rows matched the query. <br><br>Click<a href='members.php'> here</a> to go back. </h3>";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}


?>