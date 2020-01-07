<?php

session_start();

if(isset($_SESSION['counter'])) {
    $_SESSION['counter'] += 1;
} else {
    $_SESSION['counter'] = 1;
}


$msg = "You have visited this page".$_SESSION['counter']."in this session";


?>

<title>Setting ip a php session</title>

<?php 
echo "$msg";
?>