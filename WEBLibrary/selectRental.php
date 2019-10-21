<!-- 1 rentals.html -->
<!-- 2 selectRental.php -->
<!-- 3 addFormRental.php -->
<!-- 4 addRental.php -->

<?php

try { 
  $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = 'SELECT count(*) FROM Rentals where risbn = :isbn';   
  $result = $pdo->prepare($sql);
  $result->bindValue(':isbn', $_POST['risbn']);        
  $result->execute(); 
                                                   
  if($result->fetchColumn() > 0) 
  {
      $sql = 'SELECT * FROM Rentals WHERE rissueDate NOT BETWEEN issueDate AND dueDate';
      $result = $pdo->prepare($sql);
      $result->bindValue(':isbn', $_POST['risbn']);  
      $result->execute(); 
  
      while ($row = $result->fetch()) 
      {      
          echo("<h3>The book is AVAILABLE </h3>"); 
          include 'addFormRental.php'; 
      }//while end     
  }//if end
  
  else
  {   
      echo("The book is  not available.");  
  }//else end  
}
 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

?>

