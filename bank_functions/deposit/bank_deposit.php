<?php
@require "../connectserver.php";

$amount = $_POST['amount'];
$accountNumber = $_POST['account_to_deposite'];
$transaction_type = 'bank_deposit';

function deposit($accountNumber, $transaction_type, $amount) {
    global $conn;
    $sql = "SELECT balance FROM customer WHERE account_number = '$accountNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "UPDATE customer SET balance = balance + $amount WHERE account_number = '$accountNumber'";
        if ($conn->query($sql) === TRUE) {
            echo "Balance deposited successfully";
            echo "\n";
            $sql = "SELECT bank_master_account FROM vault where bank_name='capitalcode solutions'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $bank_account = $row['bank_master_account'];
            $sql = "UPDATE vault SET balance = balance - $amount WHERE bank_master_account = '$bank_account'";
            $sql= "UPDATE bank_system.banks SET balance = balance - $amount WHERE bank_master_account = '$bank_account'";
            if ($conn->query($sql) === TRUE) {
                echo "Vault updated successfully";
            } else {
                echo "Error updating vault: " . $conn->error;
            }
            $sql = "INSERT INTO transaction_history (from_account_number,to_account_number, transaction_type, amount) VALUES ( '$bank_account' ,'$accountNumber','$transaction_type', $amount)";

            if ($conn->query($sql) === TRUE) {
                echo "Transaction record inserted successfully";
            } else {
                echo "Error inserting transaction record: " . $conn->error;
            }
        } else {
            echo "Error updating balance: " . $conn->error;
        }
    } else {
        echo "No customer found with account number $accountNumber";
    }
}

deposit($accountNumber, $transaction_type, $amount);

echo"<form action='../bank_stuff.php' method='post'>
<input type='hidden' name='id_number' value='234'>
<input type='hidden' name='password' value='securepassword123'>
<button>Home</button>
</form>";

?>