<!-- save_appointment.php --><?php
$conn = new mysqli("localhost", "root", "", "prisha_clinic");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';
$message = $_POST['message'] ?? '';

$stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, date, time, message) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $date, $time, $message);
$stmt->execute();
$stmt->close();
$conn->close();
echo "Appointment saved successfully!";