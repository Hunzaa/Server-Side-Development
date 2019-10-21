<!-- Update Book -->

<!-- 1 books.html -->
<!-- 2 updateformB.php -->
<!-- 3 updatedB.php -->

<?php

  try { 
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'update Books set title = :btitle,author = :bauthor WHERE isbn = :bisbn';
    $result = $pdo->prepare($sql);
    $result->bindValue(':bisbn', $_POST['ud_isbn']); 
    $result->bindValue(':btitle', $_POST['ud_title']); 
    $result->bindValue(':bauthor', $_POST['ud_author']); 
    $result->execute();
         
    //For most databases, PDOStatement::rowCount() does not return the number of rows affected by a SELECT statement.
         
    $count = $result->rowCount();
    if ($count > 0){
    echo "<br><h3>Book: " . $_POST['ud_isbn'] ." successfully updated. <br><br>Click<a href='books.html'> here</a> to go back. </h3>";}
    
    else{
    echo "<br><h3>Nothing updated.</h3>";}
  }
   
  catch (PDOException $e) { 
    $output = 'Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }
  
?>