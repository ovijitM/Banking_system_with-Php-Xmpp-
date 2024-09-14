<?php

@require "../../bank_functions/connectserver.php";

$amount = $_POST['amount'];
$fromAccountNumber = $_POST['account_number'];
$toAccountNumber = $_POST['to_account'];
$transaction_type = 'send money';


$sql = "SELECT balance FROM customer WHERE account_number = '$fromAccountNumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $balance = $row["balance"];

    $sql = "SELECT balance FROM customer WHERE account_number = '$toAccountNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if ($balance < $amount) {
            echo "<h2>balance is insufficient. try again after deposit sufficiend balance </h2>";
        } else {
            $sql = "UPDATE customer SET balance = balance - $amount WHERE account_number = '$fromAccountNumber'";
            if ($conn->query($sql) === TRUE) {
                $sql = "UPDATE customer SET balance = balance + $amount WHERE account_number = '$toAccountNumber'";
                if ($conn->query($sql) === TRUE) {
                    echo "<h2>Balance transferred successfully</h2>";
                    echo"<h2>Transfer amount: $amount </h2>";
                    echo "<h2> Transfared account No: $toAccountNumber </h2>";
                    echo "\n";
                    $sql = "INSERT INTO transaction_history (from_account_number, to_account_number, transaction_type, amount) VALUES ('$fromAccountNumber', '$toAccountNumber', '$transaction_type', $amount)";
                    if ($conn->query($sql) === TRUE) {
                        echo "<h2>Transaction record inserted successfully</h2>";
                    } else {
                        echo "Error inserting transaction record: " . $conn->error;
                    }
                } else {
                    echo "Error updating balance: " . $conn->error;
                }
            } else {
                echo "Error updating balance: " . $conn->error;
            }
        }
    } else {
        echo "<h2>No customer found with account number $toAccountNumber</h2>";
    }
} else {
    echo "<h2>No customer found with account number $toAccountNumber</h2>";
}

$sql = "SELECT * FROM account WHERE account_number = '$fromAccountNumber'";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $password = $row["password"];

echo"<form action='../user_account.php' method='post'>
    <input type='hidden' name='account_number' value='$fromAccountNumber'>
    <input type='hidden' name='password' value='$password'>
    <button>Home</button>
    </form>";
}

?>