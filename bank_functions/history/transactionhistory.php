<?php
@require "../connectserver.php";

$accountNumber = $_POST['account_number'];

function viewTransactionHistory($conn, $accountNumber) {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css'>
        <title>Transaction History</title>
    </head>
    <body>
    <div class='container'>
        <h1>Transaction History</h1>";

    $sql = "SELECT * FROM transaction_history WHERE from_account_number = '$accountNumber' OR to_account_number = '$accountNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>From Account</th>
                    <th>To Account</th>
                    <th>Amount</th>
                    <th>Transaction Type</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            $fromAccountNumber = empty($row["from_account_number"]) ? "from bank" : $row["from_account_number"];
            $toAccountNumber = empty($row["to_account_number"]) ? "to bank" : $row["to_account_number"];
            $amount = $row["amount"];
            $transactionType = $row["transaction_type"];
            $datetime = $row["time"];
            list($date, $time) = explode(' ', $datetime);

            echo "<tr>
                    <td>$fromAccountNumber</td>
                    <td>$toAccountNumber</td>
                    <td>$amount</td>
                    <td>$transactionType</td>
                    <td>$date</td>
                    <td>$time</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No transaction history found for account number $accountNumber</p>";
    }

    echo "
    <form action='../bank_stuff.php' method='post'>
        <input type='hidden' name='id_number' value='234'>
        <input type='hidden' name='password' value='securepassword123'>
        <button>Home</button>
    </form>
    </div>
    </body>
    </html>";
}

viewTransactionHistory($conn, $accountNumber);
?>
