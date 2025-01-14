<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="align-items: center; justify-content: center; justify-items: center; ">
    <span style="color: blue; font-weight: 200;">LIST OF TRAFFIC SIGN</span>
    <div >
        <table border="1">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Sign Type</th>
                <th>
                    #
                </th>
            </thead>
            <tbody>
                <?php
                     $conn = mysqli_connect("localhost","root","","smart_traffic");
                     if(!$conn){
                         echo "error database";
                     }else{
                             $sql="SELECT image,name,description,name_type,id_traffic_signs FROM sign_type,traffic_signs WHERE traffic_signs.id_sign_type = sign_type.id_sign_type";
                             $stmt = $conn->query($sql);
                             if($stmt->num_rows>0){
                                while($row = $stmt->fetch_assoc()){
                                    echo "
                                        <tr>
                                            <td><img src='".$row["image"]."' alt=''  style='width: 60px; height: 60px; padding:5px'></td>
                                            <td>".$row["name"]."</td>
                                            <td>".$row["description"]."</td>
                                            <td style='text-align: center;'>".$row["name_type"]."</td>
                                            <td> 
                                                <a href='edit.php?id=".$row["id_traffic_signs"]."'>Edit</a>  
                                                <a href='delete.php?id=".$row["id_traffic_signs"]."'>Delete</a>
                                            </td>
                                        </tr>
                                    ";
                                }
                             }
                     }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>