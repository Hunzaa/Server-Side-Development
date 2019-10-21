<!-- Add Book -->

<!-- 1 books.html -->
<!-- 2 addBook.php -->

<?php

include 'books.html';

if (isset($_POST['submitdetails'])) {                   
try { 
    $bisbn = $_POST['bisbn'];
    $btitle = $_POST['btitle'];
    $bauthor = $_POST['bauthor'];
    $bcategory = $_POST['bcategory'];

    
    if ($bisbn == ''  or $btitle == '' or $bcategory == '')
    {
        echo("<h3>You did not complete the form. </h3><br> ");
    }
    
    else{
    $pdo = new PDO('mysql:host=localhost;dbname=librarySystem; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO Books (isbn,title,author,category) VALUES(:bisbn, :btitle,:bauthor,:bcategory)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':bisbn', $bisbn);
    $stmt->bindValue(':btitle', $btitle);
    $stmt->bindValue(':bauthor', $bauthor);
    $stmt->bindValue(':bcategory', $bcategory);

    
    $stmt->execute();
    header('location: addBook.php'); 
    }
} 
catch (PDOException $e) { 
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    } 
} 




?>