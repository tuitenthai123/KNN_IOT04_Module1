<?php
$conn = mysqli_connect("localhost", "root", "", "smart_traffic");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM traffic_signs WHERE id_traffic_signs = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image']; // Chỉ thay đổi nếu muốn cho phép người dùng upload ảnh mới
        $sign_type = $_POST['sign_type'];

        $update_sql = "UPDATE traffic_signs SET name = '$name', description = '$description', image = '$image', id_sign_type = '$sign_type' WHERE id_traffic_signs = $id";
        if ($conn->query($update_sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: index.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "No sign found!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Traffic Sign</title>
</head>
<body>
    <h2>Edit Traffic Sign</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

        <label for="description">Description:</label>
        <textarea name="description"><?php echo $row['description']; ?></textarea><br><br>

        <label for="image">Image URL:</label>
        <input type="text" name="image" value="<?php echo $row['image']; ?>"><br><br>

        <label for="sign_type">Sign Type:</label>
        <select name="sign_type">
            <!-- Populate the sign types -->
            <?php
            $sign_types_sql = "SELECT * FROM sign_type";
            $sign_types_result = $conn->query($sign_types_sql);
            while ($type = $sign_types_result->fetch_assoc()) {
                $selected = ($type['id_sign_type'] == $row['id_sign_type']) ? "selected" : "";
                echo "<option value='".$type['id_sign_type']."' $selected>".$type['name_type']."</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
