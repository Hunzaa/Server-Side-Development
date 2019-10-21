<!-- 1 rentals.html -->
<!-- 2 selectRental.php -->
<!-- 3 addFormRental.php -->
<!-- 4 addRental.php -->


  <form action="addRental.php" method="post">
    ISBN: <input name="ud_isbn" value="<?php echo $risbn; ?>"> <br /><br>
    Member Id: <input type="text" name="ud_memId" ><br /><br>
    Issue Date: <input type="date" name="ud_issueDate" ><br /><br>
    Due Date: <input type="date" name="ud_dueDate" ><br /><br>
    <input type="Submit" value="Submit">
  </form>
 </body>
</html>
