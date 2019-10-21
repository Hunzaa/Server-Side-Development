<!-- PayFine -->

<!-- 1 rentals.html -->
<!-- 2 payform.php -->
<!-- 3 confirmPay.php -->

<!DOCTYPE html>
<html lang='en'>
  <head>
      <title>Pay Form</title>
      <link rel="stylesheet" type="text/css" href="styles.css" />
  </head>
  
<?php
  try { 
  $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql="SELECT count(*) FROM Members WHERE memId = :rmemId";
  
  $result = $pdo->prepare($sql);                              
  $result->bindValue(':rmemId', $_POST['memId']); 
  $result->execute();
  if($result->fetchColumn() > 0) 
  {
      $sql = 'SELECT * FROM Members WHERE memId = :rmemId';
      $result = $pdo->prepare($sql);
      $result->bindValue(':rmemId', $_POST['memId']); 
      $result->execute();
  
      $row = $result->fetch() ;
      $memId = $row['memId'];
      $Fine = $row['Fine'];  	    
  }
  
  else {
        print "<h3>No rows matched the query. Click<a href='rentals.html'> here</a> to go back.</h3>";
  }
} 
  catch (PDOException $e) { 
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }

?>

  <form action="confirmPay.php" method="post"><br>
  <input type="hidden" name="ud_memId" value="<?php echo $memId; ?>"><br>
  Amount you want to pay: <input type="text" name="ud_Fine" value="<?php if (isset($Fine)) echo $Fine; ?>"><br /><br>

  <input type="Submit" value="Confirm Pay">
  </form>
  
</body>
</html>


