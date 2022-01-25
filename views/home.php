<?php 
include("./views/includes/alert.php") ;

if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    if(isset($_SESSION['user'])){
        $name = $_SESSION['user']->username;
    }
}else{
    $name = "Guest";
}
?>
<div class="container mt-5">

    <h2>Welcome <span class="user"><?php echo $name; ?></span></h2>
</div>