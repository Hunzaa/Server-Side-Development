<!-- 1 rentals.html -->
<!-- 2 selectRental.php -->
<!-- 3 addFormRental.php -->
<!-- 4 addRental.php -->


<?php

//include 'header.html';

  if (isset($_POST['submitdetails'])) {                   
    try { 
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT count(memId) FROM Members where memId = :rmemId';   
    $result = $pdo->prepare($sql);
    $result->bindValue(':rmemId', $_POST['memId']);         
    $result->execute();                                                  
    
    
    while ($row = $result->fetch()) 
    {
        $isbn = $row['risbn'];
        $memId = $row['rmemId'];
        $issueDate = $row['rissueDate'];
        $dueDate = $row['rdueDate'];
        $returnDate = $row['rreturnDate'];
        
        $sql = 'INSERT INTO Rentals (memId,isbn,issueDate,dueDate,returnDate) 
        VALUES(:rmemId, :risbn, :rissueDate, :rdueDate, :rreturnDate)';
  
        $rdueDate = SELECT DATE_ADD("$rissueDate", INTERVAL 5 DAY);
        
        $result = $pdo->prepare($sql);
        $result->bindValue(':risbn', $_POST['ud_isbn']); 
        $result->bindValue(':rmemId', $_POST['ud_memId']); 
        $result->bindValue(':rissueDate', $_POST['ud_issueDate']); 
        $result->bindValue(':rdueDate', $_POST['ud_dueDate']); 
        $result->bindValue(':rreturnDate', $_POST['ud_returnDate']); 
        $result->execute();
                  
        $count = $result->rowCount();
        if ($count > 0){
            echo "You just rented Book: " . $_POST['ud_isbn'] ."  click<a href='rentals.html'> here</a> to go back ";}
        else{
            echo "Nothing updated";}
               //get mem id and set the variable 
          }//while end
    //if end
         
  else
  {  
          $pdo = new PDO('mysql:host=localhost;dbname=videos; charset=utf8', 'root', ''); 
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
      
      $sql = "INSERT INTO Rentals (memId,isbn,issueDate,dueDate,returnDate) VALUES(:rmemId, :risbn, :rissueDate, :rdueDate)";
        //have the isbn and return date
        //prepare and bind and execute        
      echo ("Rental added successfully."); 
  }//else end          
 }//try end 


  catch (PDOException $e) { 
      $title = 'An error has occurred';
      $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
 }//catch end 
  
}//if end 

?>



<?php
/*
  try { 
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'INSERT INTO Rentals (memId,isbn,issueDate,dueDate,returnDate) 
            VALUES(:rmemId, :risbn, :rissueDate, :rdueDate, :rreturnDate)';
    
    $rdueDate = SELECT DATE_ADD("$rissueDate", INTERVAL 5 DAY);
    
    $result = $pdo->prepare($sql);
    $result->bindValue(':risbn', $_POST['ud_isbn']); 
    $result->bindValue(':rmemId', $_POST['ud_memId']); 
    $result->bindValue(':rissueDate', $_POST['ud_issueDate']); 
    $result->bindValue(':rdueDate', $_POST['ud_dueDate']); 
    $result->bindValue(':rreturnDate', $_POST['ud_returnDate']); 
    $result->execute();
         
    //For most databases, PDOStatement::rowCount() does not return the number of rows affected by a SELECT statement.       
    $count = $result->rowCount();
    if ($count > 0){
        echo "You just updated Member no: " . $_POST['ud_isbn'] ."  click<a href='members.php'> here</a> to go back ";}
    else{
        echo "Nothing updated";}
  }
   
  catch (PDOException $e) {  
  $output = 'Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }
       */
?>