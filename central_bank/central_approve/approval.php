<?php
@require "../central_database.php";

$id = $_POST['approve_id'];

if (isset($_POST['reject'])) {
    $sql = "DELETE FROM bank_applications WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: account_approval.php");
        exit();
    } else {
        echo "Error rejecting application: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM bank_applications WHERE id = $id";
    $result = $conn->query($sql);
    $application = $result->fetch_assoc();

    if ($application) {
        $bank_name = $application['bank_name'];
        $owner_name = $application['owner_name'];
        $account_number = mt_rand(1000000000, 1999999999);
        $initial_balance = $_POST['initial_balance'];

        $check_sql = "SELECT * FROM banks WHERE bank_name = '$bank_name'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows > 0) {
            echo "Bank name already exists. Cannot apply.";
        } else {
            $sql = "INSERT INTO banks (bank_name, account_number, balance) VALUES ('$bank_name', $account_number, $initial_balance)";
            
            if ($conn->query($sql) === TRUE) {
                $vault_updated = false;

                $sql = "INSERT INTO bank_1.vault (bank_name, bank_master_account, balance) 
                        SELECT bank_name, account_number, balance FROM bank_system.banks 
                        WHERE bank_name NOT IN (SELECT bank_name FROM bank_1.vault)";

                echo "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <title>Bank Approval</title>
                    <link rel='stylesheet' href='style.css'>
                </head>
                <body>
                    <div class='container'>
                        <h1>Bank approved and initial balance assigned.</h1>
                        <h2>Bank Details:</h2>
                        <h2>Bank Name: $bank_name</h2>
                        <h2>Owner Name: $owner_name</h2>
                        <h2>Account Number: $account_number</h2>
                        <h2>Initial Balance: $initial_balance</h2>
                    </div>
                </body>
                </html>";

                if ($conn->query($sql) === TRUE) {
                    $vault_updated = true;
                } else {
                    echo "Error updating vault: " . $conn->error;
                }

                $sql = "UPDATE bank_applications SET approved = 1 WHERE id = $id";
                
                if ($conn->query($sql) === TRUE) {
                    echo "<p>Application approved successfully.</p>";
                } else {
                    echo "Error updating application status: " . $conn->error;
                }
            } else {
                echo "Error inserting data: " . $conn->error;
            }
        }
    } else {
        echo "Application not found.";
    }
}
$conn->close();
?>
