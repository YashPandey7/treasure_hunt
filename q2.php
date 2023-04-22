<?php
    session_start();
    if(isset($_SESSION['answer1']))
    {
        echo "Your Prev. answer was \"".$_SESSION['answer1']."\" <br><br>";
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $ans2 = $_REQUEST['ans2'];
        $_SESSION['answer2'] = $_REQUEST['ans2'];
        header("location: ./q3.php");
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
    <form action = "q2.php" method="post">
        <div>Question 2: I have a neck but no head, yet can still wear a cap. </div><br>
        <input type="text" placeholder="enter your answer" name="ans2">
        <button type="submit">next question </button>
    </form>
</body>
</html>