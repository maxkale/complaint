<?php
if(!empty($_SESSION['loggedInUser'])){
}else{
header('location:login.php');
}

?>