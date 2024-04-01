<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gurunath";

// Create a mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch cart contents
$sql = "SELECT *FROM payment";
$result = $conn->query($sql);

// Variable to store the total sum
$totalSum = 0;

if ($result->num_rows > 0) {
    // Table header
    echo "<table border='1'>
          <tr>
              <th>Product Name</th>
              <th>Price</th>
          </tr>";

    // Loop through the result and display each row in the table
    while ($row = $result->fetch_assoc()) {
        // Calculate the subtotal for each product (quantity * price)
        $subtotal = $row["PRICE"];
        $totalSum += $subtotal; // Add the subtotal to the total sum

        echo "<tr>
                <td>" . $row["ITEM"] . "</td>
                <td>" . $row["PRICE"] . "</td>
              </tr>";
    }

    // Display the total sum beneath the table
    echo "<tr>
            <td colspan='3'>Total</td>
            <td>$totalSum</td>
          </tr>";
    echo "</table>";
} else {
    echo "No items in the cart.";
}

// Close the connection
$conn->close();
?>
<!DOCTYPE HTML>
<html>
    <body>
    <form>
    <input type="button" name="fo" onclick="form.html" value="PROCEED..">
    </form>
</body>
</html>
