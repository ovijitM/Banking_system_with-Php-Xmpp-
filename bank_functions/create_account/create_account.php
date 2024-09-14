<?php
@require "../connectserver.php";
$current_count=0;
$result = $conn->query("SELECT COUNT(*) AS count FROM account");
    if ($result) {
        $row = $result->fetch_assoc();
        $current_count = $row['count'];
    }
$accountNumber = 1002560000 + $current_count;
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$balance = $_POST['balance'];
$nid= $_POST['nid'];
$birth = $_POST['birth'];


global $conn;



$sql = "INSERT INTO account (account_number, password, name, email) VALUES ('$accountNumber', '$password','$name', '$email')";
if ($conn->query($sql) === TRUE) {
    $current_count=$current_count+1;
    echo"<h1>welcome to our bank</h1>";
    echo "<h1> $name, your account has been created successfully </h1>";
    echo"<h1> your account number is: $accountNumber </h1>";
} else {
    echo "something error";
}



$sql = "INSERT INTO customer(account_number, name, email, balance, nid , date_of_birth) VALUES ('$accountNumber','$name','$email','$balance', '$nid','$birth')";
if ($conn->query($sql) === TRUE) {
echo "<h1> your info is recorded in our server now</h1>";
} else {
    echo "not recorded";
}