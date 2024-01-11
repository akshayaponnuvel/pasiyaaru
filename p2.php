<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the form data
    $name = $_POST['name'];
    $pno = $_POST['pno'];
    $dish = $_POST['starters'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];

    // Validate the form data
    if (empty($name) || empty($pno) || empty($dish) || empty($quantity) || empty($address)) {
        echo "Please fill in all the fields.";
        exit;
    }

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pasiyaru1";
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Sanitize the form data to prevent SQL injection attacks
    $name = mysqli_real_escape_string($con, $name);
    $pno = mysqli_real_escape_string($con, $pno);
    $dish = mysqli_real_escape_string($con, $dish);
    $quantity = mysqli_real_escape_string($con, $quantity);
    $address = mysqli_real_escape_string($con, $address);

    // Insert the order into the database
    $sql = "INSERT INTO table_order (name, pno, dish, quantity, address) VALUES ('$name', '$pno', '$dish', '$quantity', '$address')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Order placed successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Display the form
$dish = array("Naatu Kozhi Soup", "Aatu Kaal Soup", "Mutton Kola Urundai", "Chicken 65", "Lemon Pepper Fish");
?>
