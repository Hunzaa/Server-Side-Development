<!-- Search Category -->

<!-- 1 categories.html -->
<!-- 2 selectCategory.php -->

<?php

try { 
$pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(category) FROM Books where category = :bcategory';
$result = $pdo->prepare($sql);
$result->bindValue(':bcategory', $_POST['bcategory']);          
$result->execute();                                                  
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM Books where category = :bcategory';
    $result = $pdo->prepare($sql);
    $result->bindValue(':bcategory', $_POST['bcategory']); 
    $result->execute();

while ($row = $result->fetch()) { 

      echo("<table border = '1'>");
 
      echo("<tr><th>ISBN</th>");
      echo("<th>Title</th>");
      echo("<th>Author</th>");
      echo("<th>Category</th>");     
      
      echo("<tr><td>");
      echo $row['isbn'] . '<br>';
      
      echo("</td><td>");
      echo $row['title'] . '<br>';
      
      echo("</td><td>");
      echo $row['author'] . '<br>';
      
      echo("</td><td>");
      echo $row['category'] . '<br>';

      echo("</td></tr><br>");
      
   }
}
else {
      print "<br><h3>No rows matched the query. <br><br>Click<a href='categories.html'> here</a> to go back. </h3>";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}


?>