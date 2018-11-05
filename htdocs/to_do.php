<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>MY TASK : To Do</title>
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
    </style>
</head>
<body>
    <div class="menu">
        <?php include 'menu.php';?>
    </div>
    <div class="wrapper">
        <h2>To Do</h2>
        <?php
        echo '<h5>' . 'Tasks To Do' . '</h5>';
        ob_start();
        include 'login.php';
        ob_end_clean();

        $db     = pg_connect("host=localhost port=5432 dbname=project user=barkhyehyeon password=1824");
        /*// random query with same output fields to test if table itself is displayed properly, cus assignment not implemented yet
        $result = pg_query($db, "SELECT u.user_name, t.due_date, t.due_time, t.description FROM tasks t, users u WHERE t.task_id < 10 and t.owner_id = u.user_id");*/

        $result = pg_query($db, "SELECT u.user_name, t.due_date, t.due_time, t.description FROM is_picked_for p, tasks t, users u WHERE '$row[user_id]' = p.bidder_id and p.task_id = t.task_id and t.owner_id = u.user_id");

        $i = 0;
        echo '<table><tr>';
        while ($i < pg_num_fields($result))
        {
            $fieldName = str_replace("_"," ",pg_field_name($result, $i));
            $fieldName = str_replace("user","owner",$fieldName);
            echo '<td>' . $fieldName . '</td>';
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

        /*// random query with same output fields to test if table itself is displayed properly, cus assignment not implemented yet
        $result = pg_query($db, "SELECT u.user_name, t.due_date, t.due_time, t.description, b.amount FROM bids b, tasks t, users u WHERE b.bidder_id = 4 and b.task_id = t.task_id and t.owner_id = u.user_id");*/

        $result = pg_query($db, "SELECT u.user_name, t.due_date, t.due_time, t.description, b.amount FROM bids b, tasks t, users u WHERE '$row[user_id]' = b.bidder_id and b.task_id = t.task_id and t.owner_id = u.user_id and t.task_id NOT IN (SELECT p.task_id FROM is_picked_for p)");
        $i = 0;
        echo '<table><tr>';
        while ($i < pg_num_fields($result))
        {
            $fieldName = str_replace("_"," ",pg_field_name($result, $i));
            $fieldName = str_replace("user","owner",$fieldName);
            echo '<td>' . $fieldName . '</td>';
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