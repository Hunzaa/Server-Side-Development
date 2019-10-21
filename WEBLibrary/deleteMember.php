<?php

  try { 
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'DELETE FROM Members WHERE memId = :mid';
    $result = $pdo->prepare($sql);
    $result->bindValue(':mid', $_POST['memId']); 
    $result->execute();
    echo "<br><h3>Member: " . $_POST['memId'] ." successfully deleted. <br><br> Click<a href='members.php'> here</a> to go back. </h3>";
} 
  
  catch (PDOException $e) {  
    if ($e->getCode() == 23000) {
              echo "<br><h3>Oops! Couldn't delete as that record is linked to other tables.
                    <br><br>Click<a href='members.php'> Here</a> to go back. </h3>";
         } 
  }
?>
