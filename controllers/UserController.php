<?php
class UserController
{
    public function registerController()
    {
        $data = array(
            "fullname" => $_POST['fullname'],
            "username" => $_POST['username'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "security_key" => md5(date("h:i:s"))
        );
        if (empty($_POST['fullname']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
            Session::setAlert("danger", "Please Fill all Fields");
            Redirect::to("register");
        }
        if (!preg_match("/^[a-zA-Z]*$/", $data['fullname'])) {
            Session::setAlert("danger", "Invalid Fullname");
            Redirect::to("register");
        }
        if (!preg_match("/^[a-zA-Z0-9]*$/", $data['username'])) {
            Session::setAlert("danger", "Invalid Username");
            Redirect::to("register");
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            Session::setAlert("danger", "Invalid Email");
            Redirect::to("register");
        }
        if (strlen($data['password']) < 6) {
            Session::setAlert("danger", "Password must be  consists of six 6 character or more");
            Redirect::to("register");
        }
        if (User::checkUserExist($data) === false) {
            if (User::register($data) === "ok") {

                require_once './config/mail.php';
                $mail->addAddress($data['email']);
                $mail->Subject = 'Souf Login Email Verification Code';
                $mail->Body    = '<h1>Thank you for registering</h1><h4>Account Verification Link</h4><br><a href="http://localhost/?page=active&code=' . $data['security_key'] . '">http://localhost/?page=active&code=' . $data['security_key'] . '</a>';
                if ($mail->send()) {

                    Session::setAlert("success", "Account created Successfully Check Your Email for Active Your account");
                    Redirect::to("home");
                }
            } else {
                Session::setAlert("danger", "Something Wrong Please try Again");
                Redirect::to("register");
            }
        } else {
            Session::setAlert("danger", "Username or Email Already Exist");
            Redirect::to("register");
        }
    }
    //
    public function activeAccountController()
    {
        $data = array(
            "code" => $_GET['code'],
            "newSecurity_key" => md5(date("h:i:s"))
        );
        if (User::checkSecurityKeyExist($data) === 1) {
            if (User::activeAccount($data) === "ok") {
                Session::setAlert("success", "Your Account is Activated Now");
                Redirect::to("active");
            } else {
                Session::setAlert("danger", "Something wrong Please try Register Again");
                Redirect::to("register");
            }
        } else {
            Session::setAlert("danger", "Your Security key already used!");
            Redirect::to("active");
        }
    }
    //
    public function loginController()
    {
        $data = array(

            "username" => $_POST['username/email'],
            "email" => $_POST['username/email'],
            
        );
        if (User::checkUserExist($data)) {
            $user = User::checkUserExist($data);
            $pass = $user->password;
            if (password_verify($_POST['password'], $pass)) {
                if ($user->activated === "1") {
                    $_SESSION['logged'] = true;
                    $_SESSION['user'] = $user;
                    Redirect::to("home");
                } else {
                    Session::setAlert("info", "Check Your Email for Active Your account");
                    Redirect::to("login");
                }
            } else {
                Session::setAlert("danger", "Password Invalid");
                Redirect::to("login");
            }
        } else {
            Session::setAlert("danger", "Username or Email not Exist");
            Redirect::to("login");
        }
    }
    //
    
}
