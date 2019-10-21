<!-- Update Book -->

<!-- 1 books.html -->
<!-- 2 updateformB.php -->
<!-- 3 updatedB.php -->

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
  
  $sql="SELECT count(*) FROM Books WHERE isbn= :bisbn";
  
  $result = $pdo->prepare($sql);
  $result->bindValue(':bisbn', $_POST['isbn']); 
  $result->execute();
  if($result->fetchColumn() > 0) 
  {
      $sql = 'SELECT * FROM Books where isbn = :bisbn';
      $result = $pdo->prepare($sql);
      $result->bindValue(':bisbn', $_POST['isbn']); 
      $result->execute();
  
      $row = $result->fetch() ;
      $isbn = $row['isbn'];
  	  $title= $row['title'];
  	  $author= $row['author'];
  }
  
  else{
    print "No rows matched the query. <br><br> Click<a href='books.html'> here</a> to go back";
  }
} 
  catch (PDOException $e) { 
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }

?>

  <form action="updatedB.php" method="post">
  <input type="hidden" name="ud_isbn" value="<?php echo $isbn; ?>">
  Title: <input type="text" name="ud_title" value="<?php if (isset($title)) echo $title; ?>"><br /><br>
  Author: <input type="text" name="ud_author" value="<?php if (isset($author))echo $author; ?>"><br /><br>  
  <input type="Submit" value="Update">
  </form>
  
</body>
</html>
