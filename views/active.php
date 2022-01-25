<?php
if(isset($_GET['code'])){
   $account = new UserController();
   $account->activeAccountController();
}
?>





<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5 mx-auto col-md-8 col-sm-12">
            <?php include("./views/includes/alert.php") ?>
            <a class="btn btn-primary"  href="<?php echo BASE_URL ?>?page=login">Go to Login</a>
        </div>
    </div>
</div>