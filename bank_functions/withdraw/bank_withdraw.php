<?php
@require '../connectserver.php';

$amount = $_POST['amount'];
$fromAccountNumber = $_POST['from_account'];

$transaction_type = 'bank_withdraw';

function withdraw($amount, $fromAccountNumber, $transaction_type) {
    global $conn;
    $sql = "SELECT balance FROM customer WHERE account_number = '$fromAccountNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $balance = $row["balance"];

        if ($balance < $amount) {
            echo "Balance is insufficient";
        } else {
            $sql = "UPDATE customer SET balance = balance - $amount WHERE account_number = '$fromAccountNumber'";
            if ($conn->query($sql) === TRUE) {
                echo "<h2>Balance withdraw successfully</h2>";
                echo "<h2>withdraw amount $amount</h2>";
                $remain =$balance-$amount;
                echo "<h2>your remaining balance is $remain</h2>";
                echo "\n";

                $sql = "INSERT INTO transaction_history (from_account_number, transaction_type, amount) VALUES ('$fromAccountNumber','$transaction_type', $amount)";
                if ($conn->query($sql) === TRUE) {
                    echo "Transaction record inserted successfully";
                } else {
                    echo "Error inserting transaction record: " . $conn->error;
                }

                $sql="update vault set balance = balance + $amount where bank_name='Capitalcode Solutions'";
                $sql= "UPDATE bank_system.banks SET balance = balance + $amount WHERE bank_name='Capitalcode Solutions'";
                if ($conn->query($sql) === TRUE) {
                    echo "Vault updated successfully";
                } else {
                    echo "Error updating vault: " . $conn->error;
                }
            }
        }
    } else {
        echo "No customer found with account number $fromAccountNumber";
    }
    
}

withdraw($amount, $fromAccountNumber, $transaction_type);

echo"<form action='../bank_stuff.php' method='post'>
<input type='hidden' name='id_number' value='234'>
<input type='hidden' name='password' value='securepassword123'>
<button>Home</button>
</form>";

?>