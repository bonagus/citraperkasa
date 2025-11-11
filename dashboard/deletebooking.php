<?php
    header( "refresh:2;url=booking" );
    include_once ("../z_db.php");
    // Inialize session
    session_start();
    // Check, if username session is NOT set then this page will jump to login page

    $todelete= mysqli_real_escape_string($con,$_GET["id"]);

    $result=mysqli_query($con,"UPDATE booking SET status='cancelled' WHERE id='$todelete'");
    
    if ($result){
        print "<center> Booking deleted<br/>Redirecting in 2 seconds...</center>";
    }
    else{
        print "<center>Action could not be performed, check back again<br/>Redirecting in 2 seconds...</center>";
    }
?>