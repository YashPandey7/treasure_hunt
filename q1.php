<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include "./partials/dbconnect.php";
    // $ans1 = $_REQUEST['ans1'];
    // $sql = "INSERT INTO `ans` (`user`, `a1`, `a2`, `a3`) VALUES ( 'yash', '$ans1', '', '');";
    // $result = mysqli_query($conn,$sql);

    $correct_word = "clock";
    $input_word = $_REQUEST['ans1'];

    if (strtolower($correct_word) == strtolower($input_word)) {
        echo "Correct word!";
    }
    else{
        echo"wrong answer!";
    }
    
    if($_REQUEST['ans1'] == "CLOCK")
    {
        session_start();
        $_SESSION['answer1'] = $_REQUEST['ans1'];
        // header("location: ./q2.php");
    }
    else
    {
        echo "Wrong Answer <br>";
    }
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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>"  method="post">
        <div>Question 1: I have hands but cannot clap??</div> <br>
        <input type="text" placeholder="enter your answer" name="ans1">   
        <button type="button" onclick="clicks()">hint </button>
        <button type="submit">next question </button>
    </form>
    <p id="hint"></p>
</body>

<script type="text/javascript">
    function clicks(){
        document.getElementById('hint').innerHTML="Clock";
    }
</script>
</html>