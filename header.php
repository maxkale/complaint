<!DOCTYPE html>
<?php 
include 'connection.php';
include 'auth.php';

?>
<html lang="en">
    <head>
        <title>Online Art Gallary</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<script src='js/app.js'></script>
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height:100vh;}

            /* Set gray background color and 100% height */
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
            }
            html,body{
                height: 100%;
            }
            .sidear{
                height: 100%;
            }


            /* On small screens, set height to 'auto' for the grid */
            @media screen and (max-width: 767px) {
                .row.content {height: auto;} 
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav hidden-xs">
                    <h3><?php echo $_SESSION['loggedInUser']['first_name'].' '.$_SESSION['loggedInUser']['last_name'];?></h3>
                    <ul class="nav nav-pills nav-stacked sidear">
                        <li class="active"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="active"><a href="javascript:void(0)">Cart</a></li>
                      <!--  <li><a href="javascript()">Complaint List</a></li>
                        <li><a href="#section3">Action</a></li>-->
                        <li><a href="javascript:void(0)" onclick='logout()'>Logout</a></li>
                    </ul><br>
                </div>
                <br>
				<?php
				include 'connection.php';
				?>
			