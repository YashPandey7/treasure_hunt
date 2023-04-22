<?php
    include "./partials/dbconnect.php";

    session_start();
    if(isset($_SESSION['answer2']))
    {
        if(!isset($_SESSION['answer3']))
        {
            echo "Your First answer was \"".$_SESSION['answer1']."\". <br>";
            echo "Your Prev. answer was \"".$_SESSION['answer2']."\". <br><br>";
        }
        else{
            echo "Your First answer was \"".$_SESSION['answer1']."\". <br>";
            echo "Your Prev. answer was \"".$_SESSION['answer2']."\". <br>";
            echo "Your current answer is \"".$_SESSION['answer3']."\". <br>";
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // $username = $_SESSION['username'];
        $ans1 = $_SESSION['answer1'];
        $ans2 = $_SESSION['answer2'];
        $ans3 = $_REQUEST['ans3'];
        $_SESSION['answer3'] = $_REQUEST['ans3'];

        $sql = "INSERT INTO `ans` (`user`, `a1`, `a2`, `a3`) VALUES ('yash', '$ans1', '$ans2', '$ans3');";
        $result = mysqli_query($conn, $sql);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "q3.php" method="post">
        <div>Question 3: I'll keep you dry on a rainy day, In the wind I might just blow away. </div><br>
        <input type="text" placeholder="enter your answer" name="ans3">
        <button type="submit">next question </button>

        <br>
        <a href="./logout.php">Log Out</a>
    </form>
</body>
</html>