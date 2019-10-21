<?php

  try { 
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT * FROM Books';
    $result = $pdo->query($sql); 
    
    echo "<br /><b>A Quick View</b><br /><br />";
    echo "<table border=1>";
    echo "<tr><th>ISBN</th>
    <th>Title: </th></tr>";
    
    
    while ($row = $result->fetch()) {
        echo '<tr><td>' . $row['isbn'] . '</td><td>'. $row['title'] . '</td></tr>';
    }
    echo '</table>';
  }
   
  catch (PDOException $e) { 
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }
    
  include 'books.html';

?>