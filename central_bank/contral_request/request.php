<?php
@require "../central_database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bank_name = $_POST['bank_name'];
    $owner_name = $_POST['owner_name'];

    // Check if the bank name already exists
    $check_sql = "SELECT * FROM bank_applications WHERE bank_name = '$bank_name'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "Bank name already exists. Cannot apply.";
    } else {
        $sql = "INSERT INTO bank_applications (bank_name, owner_name) VALUES ('$bank_name', '$owner_name')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Application submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

?>