<?php
    session_start();
  
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true)
    {
        header("location: ./index.php");
        exit;
    }

    $a1 = $_SESSION['answer1'];
    $a2 = $_SESSION['answer2'];
    $a3 = $_SESSION['answer3'];
    $a4 = $_SESSION['answer4'];
    $a5 = $_SESSION['answer5']; 
    $res = $a1 + $a2 + $a3 + $a4 + $a5;
    $_SESSION['result'] = $res;
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
        body {
            padding: 0;
            margin: 0;
        }

        .position-relative {
            width: 100%;
            height: 100vh;
            padding-bottom: 56.25%;
        }

        .position-relative img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .content{
                width: 50%;
                height: 100%; 
                background-color: rgba(0, 0, 0, 0.797);
                 color:white;
                 text-align:center;
            }
        .content h3{
            padding-top:20%;
        }

        @media screen and (max-width: 700px) {
            /* .position-relative img{
                display:none;
            } */
            .content{
                width: 100%;
            }
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <span class="navbar-brand"><?php echo $_SESSION['username'];?></span>
  <ul class="navbar-nav">
    <li class="nav-item" >
      <a class="nav-link" href="logout.php">Log Out</a>
    </li>
  </ul>
</nav>

    <div class="position-relative">
        <img src="./images/7.jpg" alt="your-image" class="img-fluid">
        <div class="position-absolute top-0 start-50 translate-middle-x content"
            style=" ">
            <h3>RESULT</h3><br>
            <p class="text-center" >SCORE : <?php echo $_SESSION['result'];?>/5</p>
            <p class="text-center" >PERCENTAGE : <?php $per= ($_SESSION['result']*100)/5; echo $per."%" ;?></p>
        </div>
    </div>


</body>

</html>