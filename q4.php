<?php
    session_start();
    if(isset($_SESSION['answer3']))
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
            $_SESSION['answer4'] = 0;
            if($_SERVER["REQUEST_METHOD"]=="POST")
        {
        include "./partials/dbconnect.php";
    
        $correct_word = "Keys";
        $input_word = $_REQUEST['ans4'];
    
        if (strtolower($correct_word) == strtolower($input_word)) {
            // session_start();
            // $_SESSION['answer1'] = 1;
            $_SESSION['countdown_start_time'] = time(); // set the start time to the current time
            $_SESSION['countdown_duration'] = 60*2; // set the duration of the countdown timer in seconds
            $_SESSION['answer4'] = 1;
            header("location: ./q5.php");
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
    
        $correct_word = "Keys";
        $input_word = $_REQUEST['ans4'];
    
        if (strtolower($correct_word) == strtolower($input_word)) {
            // session_start();
            // $_SESSION['answer2'] = 1;
            $_SESSION['countdown_start_time'] = time();
            $_SESSION['countdown_duration'] = 60*2;
            $_SESSION['answer4'] = 1;
            header("location: ./q5.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>

    <style>
        .bg {
            background-image: url('./images/6.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            bottom: 0;
            filter: contrast(.7) brightness(.7);
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
        }

        header {
            background-color: black;
            opacity: 0.8;
            padding: 20px 20px 10px 20px;
            border-radius: 8px;
            min-width:70%;
        }

        .content {
            align-items: center;
            bottom: 0;
            color: white;
            display: flex;
            flex-wrap: wrap;
            font-family: sans-serif;
            justify-content: center;
            left: 0;
            /* padding: 20vw; */
            position: fixed;
            right: 0;
            text-align: center;
            top: 0;
        }

        @media screen and (max-width: 1024px) {
            .content{
                margin:20px;
            }
        }
    </style>
</head>
<body>

    <div class="bg"></div>
    <div class="content">
        <header>
                <div id="countdown"></div><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>"  method="post">
                <h4>
                    <b>Question 4:</b>
                    In a bowl or on a hook, Keep me somewhere you will look.<br> On a shelf or in your pocket Have me near before you lock it.
                </h4><br>
                <div class="form-row" >
                    <div class="form-group col-md-9" style="text-align: center; margin-top:8px;">
                        <input type="text" placeholder="Enter your answer..." name="ans4" class="form-control">
                    </div>
                    <div class="form-group col-md-3" style="text-align: center; margin-top:8px; ">
                        <button type="submit" class="btn btn-primary">Submit </button>
                        <button type="button" class="btn btn-primary" onclick="clicks()">Hint </button>
                    </div>
                </div>
            </form><br>
            <p id="hint"></p>
        </header>
    </div>
</body>

<script type="text/javascript">
    function clicks(){
        document.getElementById('hint').innerHTML="Answer : ' Keys '.";
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
            document.getElementById('countdown').innerHTML = '<b>Remaining Time :</b> ' + minutes + ' minutes ' + seconds + ' seconds';
        } else {
            document.getElementById('countdown').innerHTML = 'Time is up!';
        }
    }, 1000);
</script>

</html>