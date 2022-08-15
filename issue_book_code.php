<?php
session_start();
if (isset($_POST['issue_booking'])) {
    $_SESSION['isb']=true;

    $_SESSION['package']=$_POST['package'];
    $_SESSION['tg_name']=$_POST['tg_name'];
    $_SESSION['user_id']=$_POST['user_id'];
    $_SESSION['no_user']=$_POST['no_users'];
    $_SESSION['issue_date']=$_POST['issue_date'];
    $_SESSION['token']=md5(rand());



}
if(isset($_SESSION['isb'])){
    

    $package = $_SESSION['package'];
    $tg_name = $_SESSION['tg_name'];
    $user_id = $_SESSION['user_id'];
    $no_user = $_SESSION['no_user'];
    $issue_date = $_SESSION['issue_date'];
    $token = $_SESSION['token'];

    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "tour");

    $query = "select name,mobile  from guest where id = $user_id limit 1";
    $query_run = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($query_run);




?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>User Dashboard</title>
        <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
        <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <style type="text/css">
            #side_bar {
                background-color: whitesmoke;
                padding: 50px;
                width: 300px;
                height: 450px;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="Udashboard.php">Bijoy Travels</a>
                </div>
                <font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
                <font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="Uview_profile.php">View Profile</a>
                            <a class="dropdown-item" href="Uedit_profile.php"> Edit Profile</a>
                            <a class="dropdown-item" href="Uchange_password.php">Change Password</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-center">
                    <li class="nav-item">
                        <a href="Udashboard.php" class="nav-link">Tourist Information</a>
                    </li>
                </ul>
            </div>
        </nav>

        <br><br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post">
                    <?php

                    $n = $_SESSION['no_user'];
                    ?>
                    <div class="form-group">
                        <div class="d-flex">
                            <span>1.</span>
                            <input type="text" name="name1" class="form-control ml-2" value="<?php echo "$row[name]"; ?>" required="">
                            <input type="text" name="phone1" class="form-control ml-2" value="<?php echo "$row[mobile]"; ?>" required="">
                        </div>
                    </div>
                    <?php
                    if ($n > 1) {
                        for ($i = 2; $i <= $n; $i++) {

                    ?>
                            <div class="form-group">

                                <div class="d-flex">
                                    <span><?php echo "$i"; ?>.</span>
                                    <input type="text" name="<?php echo "name$i"; ?>" class="form-control ml-2" placeholder="traveller <?php echo "$i"; ?> name" required="">
                                    <input type="text" name="<?php echo "phone$i"; ?>" class="form-control ml-2" placeholder="traveller <?php echo "$i"; ?> phone number" required="">
                                </div>

                            </div>
                    <?php
                        }
                    }
                    ?>
                    <button class="btn btn-primary" name="issue_booking_final">Issue Booking</button>
                </form>
            </div>
        </div>

        <?php

if (isset($_POST['issue_booking_final'])) {

        $issue_query = "insert into issued_bookings values(null,'$package','$tg_name',$user_id,$no_user,'$issue_date','$token')";
        $issue_query_run = mysqli_query($connection, $issue_query);

        $find_sl_query = "select s_no from issued_bookings where token='$token' limit 1";
        $find_sl_query_run = mysqli_query($connection, $find_sl_query);
        $slrow = mysqli_fetch_array($find_sl_query_run);

        $sl = $slrow['s_no'];

        



            for ($i = 1; $i<=$n; $i++) {
                $nkey='name'.$i;
                $pkey='phone'.$i;
                $tname = $_POST["$nkey"];
                $tphn = $_POST["$pkey"];
                $tourist_query = "insert into tourists values($sl,'$tname','$tphn')";

                $tourist_query_run = mysqli_query($connection, $tourist_query);
            }

            if ($issue_query_run && $find_sl_query_run && $tourist_query_run) {
                unset($_SESSION['isb']);
                unset($_SESSION['package']);
                unset($_SESSION['tg_name']);
                unset($_SESSION['user_id']);
                unset($_SESSION['no_user']);
                unset($_SESSION['issue_date']);
                unset($_SESSION['token']);
                echo "<script> window.location.href='issue_booking.php?bn=$_GET[bn]'; </script>";
            }
        }


        ?>
    </body>

    </html>
<?php
}
?>