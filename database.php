 <?php
echo "Hi";
$hostname = "localhost";
$username = "naibasti";
$password = "forPr@ct1ce";
$database = "mydb";
echo "Hi";

$conn = new mysqli($hostname, $username, $password, $database);

// Check connection

if ($conn->connect_error) 
{
    echo "Hi";
    echo $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
}

echo "connected";

$name = $_GET["name"];
$subject = $_GET["subject"];
$author = $_GET["author"];
$price = $_GET["price"];

echo "Connected successfully";

$stmt = $conn->prepare("INSERT INTO books (name, subject, author, price) VALUES (?, ?, ?, ?)");

$stmt->bind_param("sssd", $name, $subject, $author, $price);

// $stmt = $conn->prepare("DELETE FROM books WHERE name = 'Vijay'");

$stmt->execute()

?>