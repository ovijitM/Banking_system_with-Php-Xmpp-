<?php
@require "../central_database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bank_id = $_POST['bank_id'];

    // First, fetch the bank name before deleting the bank record
    $sql = "SELECT bank_name FROM banks WHERE id = $bank_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $bank_name = $row['bank_name'];

    // Now proceed with deletion, ensuring the correct order
    $sql = "DELETE FROM bank_1.vault WHERE bank_name = '$bank_name'";
    $conn->query($sql);

    $sql = "DELETE FROM bank_applications WHERE id = $bank_id";
    $conn->query($sql);

    $sql = "DELETE FROM banks WHERE id = $bank_id";
    $conn->query($sql);

    // Redirect after all deletions
    header("Location: bank_remove.php");
    exit();
}

$conn->close();
