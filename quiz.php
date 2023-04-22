<?php

include "./partials/dbconnect.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background-color: #eee;
        }

        label.radio {
            cursor: pointer;
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.radio span {
            padding: 4px 0px;
            border: 1px solid red;
            display: inline-block;
            color: red;
            width: 100px;
            text-align: center;
            border-radius: 3px;
            margin-top: 7px;
            text-transform: uppercase;
        }

        label.radio input:checked+span {
            border-color: red;
            background-color: red;
            color: #fff;
        }

        .ans {
            margin-left: 36px !important;
        }

        .btn:focus {
            outline: 0 !important;
            box-shadow: none !important;
        }

        .btn:active {
            outline: 0 !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body>

<form action="welcome.php" method="post">
        
        <div class="container-fluid">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10 col-lg-10">
                    <div class="border">
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row justify-content-between align-items-center mcq">
                                <h4>MCQ Quiz</h4>
                            </div>
                        </div>

                        <!--  -->
                        
                        <div class="question bg-white p-3 border-bottom">
                            
                            <!-- question -->


                            <?php
                                $sql = "SELECT question FROM `questions`";
                                $result = mysqli_query($conn,$sql);

                                $index=1;
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                    $opt = "SELECT `option` FROM `quiz_options` where qid = ".$index." AND is_enabled = '1'";
                                    $options = mysqli_query($conn, $opt);
                                    ?>
                                        <!-- Question -->
                                        <div class="d-flex flex-row align-items-center question-title">
                                            <h3 class="text-danger">Q.</h3>
                                            <h5 class="mt-1 ml-2"><?php echo $row["question"];?></h5>
                                        </div>
                                   
                                        <!-- Options -->
                                        <?php
                                            while($row_opt = mysqli_fetch_assoc($options))
                                            {
                                                ?>

                                                    <div class="ans ml-2">
                                                        <label class="radio"> <input type="radio" name="options_<?php echo $index; ?>" value="<?php echo $row_opt["option"]; ?>">
                                                            <span><?php echo $row_opt["option"]; ?></span>
                                                        </label>
                                                    </div>

                                                <?php
                                            }
                                        ?>

                                    <?php
                                    $index ++;
                                }
                            ?>
                              
                        </div>


                        <!--  -->
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                            <button class="btn btn-primary border-success align-items-center btn-success"
                                type="submit">Submit<i class="fa fa-angle-right ml-2"></i>
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </form>

</body>

</html>