<?php 
   if(isset($_POST['submit'])){
    $registerController = new UserController();
    $registerController->registerController();
   }
?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <?php include("./views/includes/alert.php") ?>
        <form method="post">
    <div class="form-group">
        <label for="fullname">Fullname</label>
        <input class="form-control"  type="text" placeholder="Fullname" name="fullname" id="fullname">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control"  type="text" placeholder="Username" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control"  type="text" placeholder="Email" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control"  type="password" placeholder="Password" name="password" id="password">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"   name="submit">Register</button>
    </div>
</form>
<a class="btn btn-link"   href="<?php echo BASE_URL ?>?page=login">Login</a>
        </div>
    </div>
</div>
