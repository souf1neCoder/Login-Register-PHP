<?php
if (isset($_POST['submit'])) {
    $loginController = new UserController();
    $loginController->loginController();
}
?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5 mx-auto col-md-8 col-sm-12">
            <?php include("./views/includes/alert.php") ?>
            <form method="post">
                
                <div class="form-group">
                    <label for="username/email">Username or Email</label>
                    <input class="form-control"  type="text" placeholder="Username or Email" name="username/email" id="username/email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control"  type="password" placeholder="Password" name="password" id="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"  name="submit">Login</button>
                </div>
            </form>
        <a  class="btn btn-link"   href="<?php echo BASE_URL ?>?page=register">register</a>

        </div>
    </div>
</div>