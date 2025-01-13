<?php
$conn = mysqli_connect("localhost", "root", "", "smart_traffic");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM traffic_signs WHERE id_traffic_signs = $id";
    
    if ($conn->query($delete_sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
