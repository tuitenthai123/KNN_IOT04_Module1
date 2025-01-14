<?php
$id_traffic = $_GET["id"];
$conn = mysqli_connect("localhost", "root", "", "smart_traffic");
if (!$conn) {
    echo "error database";
} else {
    $sql = "select * from traffic_signs where id_traffic_signs=" . $id_traffic . "";
    $stmt = $conn->query($sql);
    $result = $stmt->fetch_assoc();
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $type = $_POST["type"];
        $sqlupdate = "update `traffic_signs` set name='".$name."', description='".$description."', id_sign_type=".$type." where id_traffic_signs =".$id_traffic."";
        $stmtupdate = $conn->query($sqlupdate);
        if($stmtupdate){
            header("Location: http://localhost/IOT4_module1/quanlybienbao.php");
        }else{
            echo"update that bai";
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
            <span>name:</span>
            <input type="text" name="name" value="<?php echo $result["name"] ?>">
        </div>
        <div>
            <span>Description:</span>
            <textarea name="description"><?php echo $result["description"] ?></textarea>
        </div>
        <div>
            <span>Sign Type:</span>
            <select name="type">
                <?php
                if (!$conn) {
                    echo "error database";
                } else {
                    $sql_sign_type = "select * from sign_type";
                    $stmt_sign_type = $conn->query("$sql_sign_type");
                    while ($result_sign_type = $stmt_sign_type->fetch_assoc()) {
                        $selected = $result_sign_type["id_sign_type"] === $result["id_sign_type"] ? "selected" : "";
                        echo "
                            <option value='".$result_sign_type["id_sign_type"]."' ".$selected.">".$result_sign_type["name_type"]."</option>
                            ";
                    }
                }
                ?>
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
</body>

</html>