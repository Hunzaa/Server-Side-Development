<!-- Delete Member -->

<!-- 1 members.php -->
<!-- 2 deleteM.php -->
<!-- 3 deleteMember.php -->

<?php

  if (isset($_POST['submitdetails'])) { 
  try { 
  $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = 'SELECT count(*) FROM Members where memId = :mid';
  $result = $pdo->prepare($sql);
  $result->bindValue(':mid', $_POST['mid']); 
  $result->execute();
  if($result->fetchColumn() > 0) 
  {
      $sql = 'SELECT * FROM Members where memId = :mid';
      $result = $pdo->prepare($sql);
      $result->bindValue(':mid', $_POST['mid']); 
      $result->execute();

      while ($row = $result->fetch()) { 
      
      echo("<table border = '1'>");
 
      echo("<tr><th>Mem Id</th>");
      echo("<th>Name</th>");
      echo("<th>Address</th>");
      echo("<th>DOB</th>");
      echo("<th>Phone</th></tr>");     
      
      echo("<tr><td>");
      echo $row['memId'] . '<br>';
      
      echo("</td><td>");
      echo $row['name'] . '<br>';
      
      echo("</td><td>");
      echo $row['address'] . '<br>';
      
      echo("</td><td>");
      echo $row['dob'] . '<br>';
      
      echo("</td><td>");
      echo $row['phone'] . '<br>';
      echo("</td></tr><br><br>");
      
      
      echo '<h3>Are you sure you want to delete this member?<br></h3>' . 
           '<form action="deleteMember.php" method="post"> <br> 
           <input type="hidden" name="memId" value="'.$row['memId'].'"> 
           <input type="submit" value="Yes Delete" name="delete"><br>
           </form>';
      }
    }
    
    else {
          print "<br><h3>No rows matched the query.</h3>";
          
}} 
    catch (PDOException $e) { 
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
    }
    }
    ?>

