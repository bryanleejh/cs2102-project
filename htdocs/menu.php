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
        <form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <button type="button" class="btn btn-info">To Do</button>
            <button type="button" class="btn btn-warning">Assign Task</button>
            <input type="submit" class="btn btn-primary" name="submit" value="Create Task"/>
        </form>
        

        <?php
        session_start();
        $userid = $_SESSION['user'];
        // echo "USER ID!!!: ";
        // echo $userid;

        // $user = $_GET["user"];

        
        if (isset($_POST["submit"])) {     
            header("Location: create_task.php");
            exit;
        }

        ?>
    </div>

</body>
</html>