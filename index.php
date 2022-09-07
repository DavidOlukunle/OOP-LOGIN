<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </head>
    <body class="">

        <div class=" bg-primary">

            <div class="d-flex justify-content-between">

                <div> 

                    <h3>OLUKUNLE DAVID</h3> 

                </div>   

                <div class="d-flex pr-8">
                    <?php 

                        if(isset($_SESSION['userId'])){

                            ?>
                            <div class="p-2 bd-highlight"><strong><a href="#"class="text-white"><?php echo $_SESSION['username'];?></a></strong>
                                </div>

                            <div class="p-2 bd-highlight"><strong><a href="includes/logout.inc.php"class="text-white">LOGOUT</a></strong>
                                </div>

                            <?php
                        }
                        else{

                            ?>

                            <div class="p-2 bd-highlight "><strong><a href="#"class="text-white">SIGNUP</a></strong></div>

                            <div class="p-2 bd-highlight"><strong><a href="includes/logout.inc.php"class="text-white">LOGIN</a></strong></div>

                            <?php

                        }
                    ?>
                </div>
            </div>
        </div>
    
        
        <div class="container pt-5 item-center">
            
             <div class="row">

                <div class="col-sm-4">

                    <div class="card bg-dark pb-5">

                        <h2 class="text-center text-white">SIGN IN</h2>

                            <p class="text-white text-center"> Don't have an account yet? <a href="#">SIGN UP</a></p>

                            <form action="includes/login.inc.php" method="post">

                                <div class="form-group">

                                    <input type="text" name="username" class="form-control w-5" placeholder="username">
                                </div>

                                <div class="form-group">

                                    <input type="password" name="password" class="form-control mt-3" placeholder="password">

                                </div>

                                <button type="submit"class="btn btn-primary mt-3 form-control" name="submit">Log In</button>

                            </form>
                    </div>
                </div>

                <div class="col-sm-4 ms-auto">

                    <div class="card bg-dark">

                        <h2 class="text-center text-white">SIGN UP</h2>

                            <form action="includes/signup.inc.php" method="post">

                                <div class="form-group">

                                    <input type="text" name="username" class="form-control w-5" placeholder="username">

                                </div>

                                <div class="form-group">

                                    <input type="password" name="password" class="form-control mt-3" placeholder="password">

                                </div>

                                <div class="form-group">

                                    <input type="password" name="passwordRepeat" class="form-control mt-3" placeholder="passwordRepeat">

                                </div>

                                <div class="form-group">

                                    <input type="text" name="email" class="form-control mt-3" placeholder="email">

                                </div>

                                <button type="submit"class="btn btn-primary mt-3 form-control" name="signup">Sign Up</button>

                            </form> 
                        </div>
                </div>
            </div>
        </div>
                   
    </body>
</html>
        