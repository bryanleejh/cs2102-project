<!DOCTYPE html>
<head>
  <title>UPDATE PostgreSQL data with PHP</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <h2>Supply data and enter to create</h2>
  <ul>
    <form name="create" action="index.php" method="POST" >
      <li>Book ID:</li>
    	<li><input type='text' name='bookid_created'/></li>
    	<li>Book Name:</li>
    	<li><input type='text' name='book_name_created'/></li>
    	<li>Price (USD):</li>
      <li><input type='text' name='price_created'/></li>
    	<li>Date of publication:</li>
    	<li><input type='text' name='dop_created'/></li>
    	<li><input type='submit' name='create_new' /></li>
    </form>
  </ul>
  <h2>Supply bookid and enter to search</h2>
  <ul>
    <form name="display" action="index.php" method="POST" >
      <li>Book ID:</li>
      <li><input type="text" name="bookid" /></li>
      <li><input type="submit" name="submit" /></li>
    </form>
  </ul>
  <?php
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=test");
    $result = pg_query($db, "SELECT * FROM books where book_id = '$_POST[bookid]'");		// Query template
    $row    = pg_fetch_assoc($result);		// To store the result row
    if (isset($_POST['submit'])) {
        echo "<ul><form name='update' action='index.php' method='POST' >
    	<li>Book ID:</li>
    	<li><input type='text' name='bookid_updated' value='$row[book_id]' /></li>
    	<li>Book Name:</li>
    	<li><input type='text' name='book_name_updated' value='$row[name]' /></li>
    	<li>Price (USD):</li>
      <li><input type='text' name='price_updated' value='$row[price]' /></li>
    	<li>Date of publication:</li>
    	<li><input type='text' name='dop_updated' value='$row[date_of_publication]' /></li>
    	<li><input type='submit' name='new' /></li>
    	</form>
    	</ul>";
    }
    if (isset($_POST['create_new'])) {
        $result = pg_query($db, "INSERT INTO books VALUES ('$_POST[bookid_created]',
    '$_POST[book_name_created]', '$_POST[price_created]',
    '$_POST[dop_created]')");
    }
    if (isset($_POST['new'])) {	// Submit the update SQL command
        $result = pg_query($db, "UPDATE books SET book_id = '$_POST[bookid_updated]',
    name = '$_POST[book_name_updated]',price = '$_POST[price_updated]',
    date_of_publication = '$_POST[dop_updated]'");
        if (!$result) {
            echo "Update failed!!";
        } else {
            echo "Update successful!";
        }
    }
    ?>
</body>
</html>