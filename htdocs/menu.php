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
        <button type="button" class="btn btn-info">To Do</button>
        <button type="button" class="btn btn-warning">Assign Task</button>
        <input type="button" class="btn btn-success" name="create" value="Create Task">

        

        <?php
        $user = $_GET["user"];

        //can delete these 3 lines: only for debugging
        // echo "USER:";
        // echo $user;
        // echo "<br />";
        
        if (isset($_POST["create"])) {
            if (!$user) {
                echo "No user provided.";
            } else {
                header("Location: create_task.php?user=".$user);
                exit;
            }
        }

        if (isset($_POST['btnDelete'])) {
            // btnDelete
        } else {
            //assume btnSubmit
        }

        ?>
    </div>

</body>
</html>