<!-- Update Member -->

<!-- 1 members.php -->
<!-- 2 updateformM.php -->
<!-- 3 updatedM.php -->

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
  
  $sql="SELECT count(*) FROM Members WHERE memId =:mid";
  
  $result = $pdo->prepare($sql);
  $result->bindValue(':mid', $_POST['memId']); 
  $result->execute();
  if($result->fetchColumn() > 0) 
  {
      $sql = 'SELECT * FROM Members where memId = :mid';
      $result = $pdo->prepare($sql);
      $result->bindValue(':mid', $_POST['memId']); 
      $result->execute();
  
      $row = $result->fetch() ;
      $memId = $row['memId'];
  	  $name= $row['name'];
  	  $address=$row['address'];     
  }
  
  else {
        print "<br><h3>No rows matched the query. <br><br>Click<a href='members.php'> here</a> to go back. </h3>";
  }
} 
  catch (PDOException $e) { 
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }

?>

  <form action="updatedM.php" method="post">
  <input type="hidden" name="ud_id" value="<?php echo $memId; ?>">
  Name: <input type="text" name="ud_name" value="<?php if (isset($name)) echo $name; ?>"><br /><br>
  Address: <input type="text" name="ud_address" value="<?php if (isset($address))echo $address; ?>"><br /><br>
  <input type="Submit" value="Update">
  </form>
  
</body>
</html>
