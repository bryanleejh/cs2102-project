<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>MY TASK : Assign Task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }

          table {
            width: 100%;
            min-width: 500px;
          }
          th, td {
            padding: 20px;
            border: 1px solid #444444;
          }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

</head>
<body>
    <div class="menu">
        <?php include 'menu.php';?>
    </div>
    <div class="wrapper">
        <h2> Assign Task</h2>
        <?php
        session_start();
        $userid = $_SESSION['user'];
        // echo "USER ID!!!: ";
        // echo $userid;

        echo '<h5>' . 'Tasks To Assign' . '</h5>';
        ob_start();
        include 'login.php';
        ob_end_clean();

        $db     = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=test");
        $result = pg_query($db, "SELECT u.user_name, t.description, t.due_date, t.due_time, b.amount FROM bids b, tasks t, users u WHERE b.bidder_id = u.user_id and b.task_id = t.task_id and t.owner_id = $userid and t.task_id NOT IN (SELECT p.task_id FROM is_picked_for p)");

        $i = 0;
        echo '<table><tr>';
        while ($i < pg_num_fields($result))
        {
            $fieldName = str_replace("_"," ",pg_field_name($result, $i));
            $fieldName = str_replace("user","bidder",$fieldName);
            echo '<th>' . ucwords($fieldName) . '</th>';
            $i = $i + 1;
        }
        echo '<th> Assign to this Bidder </th>';
        echo '</tr>';

        while ($row = pg_fetch_row($result)) 
        {
            echo '<tr>';
            // echo '<button type="button">Assign</button>';
            $count = count($row);
            $y = 0;
            while ($y < $count)
            {
                $c_row = current($row);
                echo '<td>' . $c_row . '</td>' ;
                // . '<td><button>Sell</button><td>';
                next($row);
                $y = $y + 1;
            }
            // echo '<td> <button type="button">Assign</button> </td>';
            echo "<td>";
            echo "<form>"; 
            echo "<form action='login.php' method='post'>";
            echo "<input type='submit' name='submit' value='submit'>";
            echo "</form>";
            echo "</td>";
            // echo '<td><button type="submit" formaction="register.php">Assign</button></td>';
            echo '</tr>';
            // echo "<form>";
        // echo "<form action='tag.php' method='post'>";
        // echo "<input type='submit' name='submit'>";
        // echo "</form>";
        }
        
        pg_free_result($result);
        echo '</table>';
        if(isset($_POST['submit'])) {
            echo "hello";}
        ?>
</body>
</html>