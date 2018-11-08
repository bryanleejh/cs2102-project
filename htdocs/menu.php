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
        <h2 align="center"> MY TASKS </h2>
        <form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="submit" class="btn btn-primary" name="alltasks" value="All Tasks"/>
            <input type="submit" class="btn btn-info" name="todo" value="To Do"/>
            <input type="submit" class="btn btn-warning" name="assign" value="Assign Task"/>
            <input type="submit" class="btn btn-success" name="create" value="Create Task"/>
            <input type="submit" class="btn btn-danger" name="signout" value="Sign Out"/>
        </form>
        

        <?php
        session_start();
        $userid = $_SESSION['user'];
        // echo "USER ID!!!: ";
        // echo $userid;

        // $user = $_GET["user"];
        if (isset($_POST["alltasks"])) {     
            header("Location: all_tasks.php");
            exit;
        }

        if (isset($_POST["todo"])) {     
            header("Location: to_do.php");
            exit;
        }

        if (isset($_POST["assign"])) {     
            header("Location: assign_task.php");
            exit;
        }
        
        if (isset($_POST["create"])) {     
            header("Location: create_task.php");
            exit;
        }

        if (isset($_POST["signout"])) {     
            header("Location: login.php");
            exit;
        }

        ?>
    </div>

</body>
</html>