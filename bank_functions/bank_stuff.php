<?php

@require "connectserver.php";

$accountNumber = $_POST['id_number'];
$password = $_POST['password'];

$sql = "SELECT * FROM staff WHERE user_id = '$accountNumber' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    echo"<!DOCTYPE html>
    <head>
        <title>My Bank</title>
        <link rel='stylesheet' href='styles_bank_stuff.css'>
    </head>
    <body>
        <h1>Hi, Welcome to the Bank</h1>
        <h2>Choose Your Functions</h2>
        <div class='button-container'>
            <form action='./create_account/create.php'>
                <button type='submit'>Create Account</button>
            </form>
            <form action='./view_info/view_info.php'>
                <button type='submit'>View Info</button>
            </form>
            <form action='./fund_transfer/transfer.php'>
                <button type='submit'>Transfer Funds</button>
            </form>
            <form action='./deposit/deposit.php'>
                <button type='submit'>Deposit</button>
            </form>
            <form action='./withdraw/withdraw.php'>
                <button type='submit'>Withdraw</button>
            </form>
            <form action='./history/transactions.php'>
                <button type='submit'>View Transactions</button>
            </form>
            <form action='../bank.php' method='post'>
                <button type='submit'>Logout</button>
            </form>
        </div>
    </body>
    </html>";
}else{
    echo "<h1>invalid userid and password</h1>";
}
?>
