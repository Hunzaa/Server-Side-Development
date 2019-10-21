<!-- Return Book -->

<!-- 1 rentals.html -->
<!-- 2 returnform.php -->
<!-- 3 confirmReturn.php -->

<?php                                                  
  try { 
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'update Rentals set dueDate = :rdueDate, returnDate = :rreturnDate, memId = :rmemId  WHERE rentalId = :rrentalId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':rrentalId', $_POST['ud_rentalId']);
    $result->bindValue(':rmemId', $_POST['ud_memId']);
    $result->bindValue(':rdueDate', $_POST['ud_dueDate']);  
    $result->bindValue(':rreturnDate', $_POST['ud_date']);  
    $result->execute(); 
          
    $count = $result->rowCount(); 
    if ($count > 0)                                         
    {
        if(':returnDate' > ':dueDate')
        {           
          $sql2 = 'UPDATE Members SET Fine = Fine+5 WHERE memId = :rmemId';
          $result2 = $pdo->prepare($sql2);
          $result2->bindValue(':rmemId', $_POST['ud_memId']);
          $result2->execute();
          $count2 = $result2->rowCount();
          
          echo "<h3>Fine of &euro;5 added for late return.</h3>";
        }  
        echo "<h3>Book: " . $_POST['ud_rentalId'] ." returned successfully. Click<a href='rentals.html'> here</a> to go back.</h3>";
    }
    else{
        echo "<h3>No changes perfomed.</h3>";}
  }
   
  catch (PDOException $e) {  
  $output = 'Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }

?>