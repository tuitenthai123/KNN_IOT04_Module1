<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IOT4_module1</title>
</head>
<body>
    <div>
        <table border="1">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Sign Type</th>
                <th>#</th>
            </thead>
            <tbody>
                <?php
                $conn = mysqli_connect("localhost", "root", "","smart_traffic");
                if (mysqli_connect_errno()) {
                    echo "loi mysql";
                } else {
                    $sql = "SELECT image, name, description, name_type, id_traffic_signs FROM traffic_signs, sign_type WHERE traffic_signs.id_sign_type = sign_type.id_sign_type;";
                    $result  = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td><img style='width: 50px; height: 50px;' src='".$row["image"]."'></td>
                                    <td>".$row["name"]."</td>
                                    <td>".$row["description"]."</td>
                                    <td>".$row["name_type"]."</td>
                                    <td>
                                        <a href='edit.php?id=".$row["id_traffic_signs"]."'>Edit</a> 
                                        <a href='delete.php?id=".$row["id_traffic_signs"]."'>Delete</a>
                                    </td>
                                </tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
