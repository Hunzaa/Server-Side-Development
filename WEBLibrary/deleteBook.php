<?php

  try { 
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'DELETE FROM Books WHERE isbn = :bisbn';
    $result = $pdo->prepare($sql);
    $result->bindValue(':bisbn', $_POST['isbn']); 
    $result->execute();
    echo "<br><h3>Book: " . $_POST['isbn'] ." deleted successfully. <br><br> Click<a href='books.html'> Here</a> to go back. </h3>";
} 
  
  catch (PDOException $e) {  
    if ($e->getCode() == 23000) {
              echo "<br><h3>Oops! Couldn't delete as the book is rented.
                    <br><br>Click<a href='books.html'> here</a> to go back. </h3>";
         } 
  }
?>
