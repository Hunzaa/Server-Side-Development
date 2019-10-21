<!-- PayFine -->

<!-- 1 rentals.html -->
<!-- 2 payForm.php -->
<!-- 3 confirmPay.php -->

<?php                                                  
  try { 
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //':rFine = Fine - ud_Fine';
    $sql = 'update Members set Fine = Fine - :rFine WHERE memId = :rmemId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':rmemId', $_POST['ud_memId']);
    $result->bindValue(':rFine', $_POST['ud_Fine']);    
    $result->execute(); 
          
    $count = $result->rowCount(); 
    if ($count > 0)                                         
    { 
        echo "<br><h3>Fine of &euro;" . $_POST['ud_Fine'] . " paid successfully. Click<a href='rentals.html'> here</a> to go back.</h3>";
    }
    else{
        echo "<h3>No changes perfomed.</h3>";}
  }
   
  catch (PDOException $e) {  
  $output = 'Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
  }

?>