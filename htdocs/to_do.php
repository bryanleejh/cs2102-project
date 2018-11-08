<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>MY TASK : To Do</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }

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
        <h2>To Do</h2>
        <?php
        session_start();
        $userid = $_SESSION['user'];
        // echo "USER ID!!!: ";
        // echo $userid;

        echo '<h5>' . 'Tasks To Do' . '</h5>';
        ob_start();
        include 'login.php';
        ob_end_clean();

        $db     = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=test");

        $result = pg_query($db, "SELECT u.user_name, t.due_date, t.due_time, t.description FROM is_picked_for p, tasks t, users u, bids b WHERE b.bidder_id = $userid and p.bid_id = b.bid_id and p.task_id = t.task_id and t.owner_id = u.user_id");

        $i = 0;
        echo '<table width="175%"><tr>';
        while ($i < pg_num_fields($result))
        {
            $fieldName = str_replace("_"," ",pg_field_name($result, $i));
            $fieldName = str_replace("user","owner",$fieldName);
            echo '<th>' . ucwords($fieldName) . '</th>';
            $i = $i + 1;
        }
        echo '</tr>';

        while ($row = pg_fetch_row($result)) 
        {
            echo '<tr>';
            $count = count($row);
            $y = 0;
            while ($y < $count)
            {
                $c_row = current($row);
                echo '<td>' . $c_row . '</td>';
                next($row);
                $y = $y + 1;
            }
            echo '</tr>';
        }
        pg_free_result($result);
        echo '</table>';

        echo '<h5>' . 'Tasks Pending for Assignment' . '</h5>';

        // random query with same output fields to test if table itself is displayed properly, cus assignment not implemented yet
        $result = pg_query($db, "SELECT u.user_name, t.description, t.due_date, t.due_time, b.amount FROM bids b, tasks t, users u WHERE b.bidder_id = u.user_id and b.task_id = t.task_id and t.owner_id = $userid and t.task_id NOT IN (SELECT p.task_id FROM is_picked_for p)");

        $i = 0;
        echo '<table width="175%"><tr>';
        while ($i < pg_num_fields($result))
        {
            $fieldName = str_replace("_"," ",pg_field_name($result, $i));
            $fieldName = str_replace("user","bidder",$fieldName);
            echo '<th>' . ucwords($fieldName) . '</th>';
            $i = $i + 1;
        }
        echo '</tr>';

        while ($row = pg_fetch_row($result)) 
        {
            echo '<tr>';
            $count = count($row);
            $y = 0;
            while ($y < $count)
            {
                $c_row = current($row);
                echo '<td>' . $c_row . '</td>';
                next($row);
                $y = $y + 1;
            }
            echo '</tr>';
        }
        pg_free_result($result);
        echo '</table>';
        ?>
</body>
</html>