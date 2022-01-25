<?php
class User
{
    public static function checkUserExist($data)
    {

        $stmt = DB::connecte()->prepare("select * from user where username = :username or email = :email");
        $username = $data['username'];
        $email = $data['email'];
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);

        $stmt->execute();
        if($stmt->rowCount() > 0){
            return $stmt->fetchObject();
        }
            return false;
        
        
    }
    public static function register($data)
    {
        $stmt = DB::connecte()->prepare("insert into user(fullname,username,email,security_key,activated,password) values(:fullname,:username,:email,:security_key,false,:password)");
        $username = $data['username'];
        $email = $data['email'];
        $fullname = $data['fullname'];
        $security_key = $data['security_key'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":fullname", $fullname);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":security_key", $security_key);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    public static function checkSecurityKeyExist($data)
    {
        $code = $data['code'];
        $stmt = DB::connecte()->prepare("select security_key from user where security_key = :security_key");
        $stmt->bindParam(":security_key", $code);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public static function activeAccount($data)
    {
        $newSecurity_key = $data['newSecurity_key'];
        $code = $data['code'];
        $stmt = DB::connecte()->prepare("update user set security_key = :newSecurity_key , activated = true where security_key = :security_key");
        $stmt->bindParam(":newSecurity_key", $newSecurity_key);
        $stmt->bindParam(":security_key", $code);
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }
  
    
}
