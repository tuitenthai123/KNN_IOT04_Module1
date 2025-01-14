<?php
    $id_traffic = $_GET["id"];
    $conn = mysqli_connect("localhost","root","","smart_traffic");
    if(!$conn){
        echo "error database";
    }else{
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $sql = "delete from traffic_signs where id_traffic_signs=".$id_traffic."";
            $result = $conn->query($sql);
            if($result){
               header("Location: http://localhost/IOT4_module1/quanlybienbao.php");
            }
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <div>
            <span>xác nhận xóa biển báo</span>
        </div>
        <button type="submit">Xác nhận</button>
    </form>
</body>
</html>