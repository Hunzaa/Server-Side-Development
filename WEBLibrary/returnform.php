<!-- Return Book -->

<!-- 1 rentals.html -->
<!-- 2 returnform.php -->
<!-- 3 confirmReturn.php -->

<!DOCTYPE html>
<html lang='en'>
  <head>
      <title>Internet and WWW How to Program - Welcome</title>
      <link rel="stylesheet" type="text/css" href="styles.css" />
  </head>
  
<?php
  try { 
  $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql="SELECT count(*) FROM Rentals WHERE rentalId = :rrentalId";
  
  $result = $pdo->prepare($sql);                              
  $result->bindValue(':rrentalId', $_POST['rentalId']); 
  $result->execute();
  if($result->fetchColumn() > 0) 
  {
      $sql = 'SELECT * FROM Rentals WHERE rentalId = :rrentalId';
      $result = $pdo->prepare($sql);
      $result->bindValue(':rrentalId', $_POST['rentalId']); 
      $result->execute();
  
      $row = $result->fetch() ;
      $rentalId = $row['rentalId'];
      $memId = $row['memId'];
      $dueDate = $row['dueDate'];
      $returnDate = $row['returnDate'];
      
      //using timezone and setting the date as today for 'returnDate'
      $timezone = "Europe/Dublin";
      date_default_timezone_set($timezone);
      $today = date("Y-m-d");
  	    
  }
  
  else {
        print "<h3>No rows matched the query. Click<a href='rentals.html'> here</a> to go back.</h3>";
  }
} 
  catch (PDOException $e) { 
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }

?>

  <form action="confirmReturn.php" method="post">
  <input type="hidden" name="ud_rentalId" value="<?php echo $rentalId; ?>"><br>
  <input type="hidden" name="ud_memId" value="<?php echo $memId; ?>"><br>
  Due Date: <input type="date" name="ud_dueDate" value="<?php if (isset($dueDate)) echo $dueDate; ?>"><br /><br>
  Return Date: <input type="date" name="ud_date" value="<?php echo $today; ?>"><br /><br>
  <input type="Submit" value="Confirm Return">
  </form>
  
</body>
</html>
