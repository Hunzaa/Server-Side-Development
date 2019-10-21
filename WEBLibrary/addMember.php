<!-- Add Member -->

<!-- 1 members.php -->
<!-- 2 addMember.php -->

<?php

include 'members.php';

if (isset($_POST['submitdetails'])) {                   
try { 
    $mname = $_POST['mname'];
    $maddress = $_POST['maddress'];
    $mdob = $_POST['mdob'];
    $mphone = $_POST['mphone'];
    if ($mname == ''  or $maddress == '' or $mdob == '' or $mphone == '')
    {
        print("<br><h3>You did not complete the insert form correctly </h3><br> ");
    }
    
    else{
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO Members (name,address,dob,phone) VALUES(:mname, :maddress,:mdob,:mphone)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':mname', $mname);
    $stmt->bindValue(':maddress', $maddress);
    $stmt->bindValue(':mdob', $mdob);
    $stmt->bindValue(':mphone', $mphone);
    
    $stmt->execute();
    //header('location: addMember.php'); 
    
    echo("<br><h3>A new Member has been added. </h3><br> ");
    }
} 
catch (PDOException $e) { 
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    } 
} 




?>

