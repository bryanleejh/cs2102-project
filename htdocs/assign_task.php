<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>MY TASK : Assign Task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="menu">
        <?php include 'menu.php';?>
    </div>
    <div class="wrapper">
        <h2>Assign Task</h2>
        // place holder
        <!-- <p>Please fill in necessary information.</p>
        <form name="create_task" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($due_date_err)) ? 'has-error' : ''; ?>">
                <label>Due Date (e.g.: yyyy-mm-dd)</label>
                <input type="text" name="due_date" class="form-control" value="<?php echo $duedate; ?>">
                <span class="help-block"><?php echo $due_date_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($due_time_err)) ? 'has-error' : ''; ?>">
                <label>Due Time (e.g.: hh:mm:ss)</label>
                <input type="text" name="due_time" class="form-control">
                <span class="help-block"><?php echo $due_time_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                <label>Description</label>
                <input type="text" name="description" class="form-control">
                <span class="help-block"><?php echo $description_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="create">
            </div>
        </form> -->
    </div>
    <?php
    // place holder
    /*ob_start();
    include 'login.php';
    ob_end_clean();

    $db     = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=test");
    $result = pg_query($db, "INSERT INTO tasks (owner_id,due_date,due_time,description) VALUES ('$row[user_id]', '$_POST[due_date]',
    '$_POST[due_time]', '$_POST[description]')");

    if (isset($_POST['create'])) {
        if (!$result) {
                echo "Failed to create the task!";
            } else {
                echo "Successfully created the task!";
            }
    }*/
    ?>
</body>
</html>