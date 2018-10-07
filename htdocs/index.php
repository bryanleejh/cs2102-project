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
      <li>User ID:</li>
    	<li><input type='text' name='userid_created'/></li>
    	<li>User Name:</li>
    	<li><input type='text' name='user_name_created'/></li>
    	<li>User Email:</li>
      <li><input type='text' name='email_created'/></li>
    	<li><input type='submit' name='create_new' /></li>
    </form>
  </ul>
  <h2>Supply userid and enter to search</h2>
  <ul>
    <form name="display" action="index.php" method="POST" >
      <li>User ID:</li>
      <li><input type="text" name="userid" /></li>
      <li><input type="submit" name="search" /></li>
    </form>
  </ul>
  <?php
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=test");
    $result = pg_query($db, "SELECT * FROM users where user_id = '$_POST[userid]'");		// Query template
    $row    = pg_fetch_assoc($result);		// To store the result row
    if (isset($_POST['search'])) { // search
        echo "<ul><form name='update' action='index.php' method='POST' >
    	<li>User ID:</li>
    	<li><input type='text' name='user_id_updated' value='$row[user_id]' /></li>
    	<li>User Name:</li>
    	<li><input type='text' name='user_name_updated' value='$row[user_name]' /></li>
    	<li>User Email:</li>
      <li><input type='text' name='user_email_updated' value='$row[user_email]' /></li>
    	<li><input type='submit' name='update' /></li>
    	</form>
    	</ul>";
    }
    if (isset($_POST['create_new'])) { // create
        $result = pg_query($db, "INSERT INTO users VALUES ('$_POST[userid_created]',
    '$_POST[user_name_created]', '$_POST[email_created]')");
    }
    if (isset($_POST['update'])) {	// update
        $result = pg_query($db, "UPDATE users SET user_name = '$_POST[user_name_updated]', user_email = '$_POST[user_email_updated]'
    WHERE user_id = $_POST[user_id_updated]");
        var_dump($result);
        var_dump($_POST);
        if (!$result) {
            echo "Update failed!!";
        } else {
            echo "Update successful!";
        }
    }
    ?>
</body>
</html>
