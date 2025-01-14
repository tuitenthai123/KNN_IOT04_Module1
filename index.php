<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <p>Login</p>
        <form method="post">
            <div>
                <span>Email</span>
                <input type="email" name="email">
            </div>
            <div>
                <span>Password</span>
                <input type="password" name="pass">
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
<?php
    $conn = mysqli_connect("localhost","root","","smart_traffic");
    if(!$conn){
        echo "error database";
    }else{
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $sql="select * from users where email = ? and password = MD5(?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss",$email,$pass);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows >0 ){
                header("Location: http://localhost/IOT4_module1/quanlybienbao.php");
            }else{
                echo "error login";
            }
        }
    }
?>
</html>