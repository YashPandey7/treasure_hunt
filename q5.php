<?php
    include "./partials/dbconnect.php";

    session_start();
    if(isset($_SESSION['answer4']))
    {
        echo "Your Prev. answer was \"".$_SESSION['answer4']."\" <br><br>";
    }


    if (isset($_SESSION['countdown_start_time']) && isset($_SESSION['countdown_duration'])) {
        $start_time = $_SESSION['countdown_start_time'];
        $duration = $_SESSION['countdown_duration'];
        $current_time = time();
        $remaining_time = $start_time + $duration - $current_time;
        if ($remaining_time < 0) {
            // countdown timer has already expired, clear the session variables
            // unset($_SESSION['countdown_start_time']);
            // unset($_SESSION['countdown_duration']);
            $_SESSION['answer5'] = 0;
            if($_SERVER["REQUEST_METHOD"]=="POST")
        {
        include "./partials/dbconnect.php";
    
        $correct_word = "Doorbell";
        $input_word = $_REQUEST['ans5'];
    
        if (strtolower($correct_word) == strtolower($input_word)) {
            // session_start();
            // $_SESSION['answer1'] = 1;
            $_SESSION['countdown_start_time'] = time(); // set the start time to the current time
            $_SESSION['countdown_duration'] = 60*2; // set the duration of the countdown timer in seconds
            $_SESSION['answer4'] = 1;

            $username = $_SESSION['username'];
            $ans1 = $_SESSION['answer1'];
            $ans2 = $_SESSION['answer2'];
            $ans3 = $_SESSION['answer3'];
            $ans4 = $_SESSION['answer4'];
            $ans5 = $_SESSION['answer5'];
            $sql = "INSERT INTO `ans` (`user`, `a1`, `a2`, `a3`, `a4`, `a5`) VALUES ('yash', '$ans1', '$ans2', '$ans3', '$ans4', '$ans5')";
            $result = mysqli_query($conn, $sql);
            header("location: ./result.php");
        }
        else if(strtolower($input_word) == '')
        {
            echo "Enter your answer";
        }
        else{
            echo"wrong answer! <br>";
        }
        
        }
        }
    
        else
        {
    
            if($_SERVER["REQUEST_METHOD"]=="POST")
        {
        include "./partials/dbconnect.php";
    
        $correct_word = "Doorbell";
        $input_word = $_REQUEST['ans5'];
    
        if (strtolower($correct_word) == strtolower($input_word)) {
            // session_start();
            // $_SESSION['answer2'] = 1;
            $_SESSION['countdown_start_time'] = time();
            $_SESSION['countdown_duration'] = 60*2;
            $_SESSION['answer5'] = 1;

            $username = $_SESSION['username'];
            $ans1 = $_SESSION['answer1'];
            $ans2 = $_SESSION['answer2'];
            $ans3 = $_SESSION['answer3'];
            $ans4 = $_SESSION['answer4'];
            $ans5 = $_SESSION['answer5'];
            $sql = "INSERT INTO `ans` (`user`, `a1`, `a2`, `a3`, `a4`, `a5`) VALUES ('yash', '$ans1', '$ans2', '$ans3', '$ans4', '$ans5')";
            $result = mysqli_query($conn, $sql);

            header("location: ./result.php");
        }
        else if(strtolower($input_word) == '')
        {
            echo "Enter your answer";
        }
        else{
            echo"wrong answer! <br>";
        }
        
        }
    
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
    <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post">
    <div>
        <b>Question 5:</b>
        When friends come by with news to tell,
        Let them in when you hear this bell. </div><br>
        <input type="text" placeholder="enter your answer" name="ans5">
        <button type="button" onclick="clicks()">hint </button>
        <button type="submit">Submit </button>
    </form>

    <p id="hint"></p><br>

    <!-- Display Timer -->
    <div id="countdown"></div>

</body>

<script type="text/javascript">
    function clicks(){
        document.getElementById('hint').innerHTML="Doorbell";
    }

    // get the start time and duration from PHP session
    var start_time = <?php echo $_SESSION['countdown_start_time']; ?>;
    var duration = <?php echo $_SESSION['countdown_duration']; ?>;

    // calculate the remaining time
    var current_time = Math.floor(Date.now() / 1000);
    var remaining_time = start_time + duration - current_time;

    // update the countdown timer every second
    setInterval(function() {
        remaining_time--;
        if (remaining_time >= 0) {
            var minutes = Math.floor(remaining_time / 60);
            var seconds = remaining_time % 60;
            document.getElementById('countdown').innerHTML = minutes + ' minutes ' + seconds + ' seconds';
        } else {
            document.getElementById('countdown').innerHTML = 'Time is up!';
        }
    }, 1000);
</script>

</html>