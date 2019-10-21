<!-- Update Member -->

<!-- 1 members.php -->
<!-- 2 updateformM.php -->
<!-- 3 updatedM.php -->

<?php
  try { 
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'update Members set name = :mname,address = :maddress WHERE memId = :mid';
    $result = $pdo->prepare($sql);
    $result->bindValue(':mid', $_POST['ud_id']); 
    $result->bindValue(':mname', $_POST['ud_name']); 
    $result->bindValue(':maddress', $_POST['ud_address']); 
    $result->execute();
         
    //For most databases, PDOStatement::rowCount() does not return the number of rows affected by a SELECT statement.       
    $count = $result->rowCount();
    if ($count > 0){
        echo "<br><h3>Member: " . $_POST['ud_id'] ." successfully updated. <br><br>Click<a href='members.php'> here</a> to go back. ";}
    else{
        echo "Nothing updated";}
  }
   
  catch (PDOException $e) {  
  $output = 'Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }

?>