<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper" style="width:800px; margin:0 auto;">
        <img class = "image" src="logo.png" alt="Logo" style = " margin-left: auto; margin-right: auto; display: block;">
        <h2 align="center">MY TASKS  </h2>
        <?php
        echo '<a href="to_do.php">To Do</a> -
        <a href="assign_task.php">Assign Task</a> -
        <a  href="create_task.php">Create Task</a>';
        ?>
    </div>
</body>
</html>