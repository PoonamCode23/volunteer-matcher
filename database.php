<?php
$host = "localhost";
$dbname = "organization_data";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function getPostData($key, $filter = null) {
    if (isset($_POST[$key])) {
        $value = $_POST[$key];
        if ($filter) {
            $value = filter_var($value, $filter);
        }
        return $value;
    }
    return null;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars(getPostData("firstName"), ENT_QUOTES, 'UTF-8');
    $lastName = htmlspecialchars(getPostData("lastName"), ENT_QUOTES, 'UTF-8');
    $age = intval(getPostData("age"));
    $email = getPostData("email", FILTER_VALIDATE_EMAIL);
    $location = htmlspecialchars(getPostData("location"), ENT_QUOTES, 'UTF-8');
    $availableTime = htmlspecialchars(getPostData("availableTime"), ENT_QUOTES, 'UTF-8');
    $necessaryHours = intval(getPostData("hours"));
    if (!$email) {
        echo "Invalid email address.";
        exit;
    }
    $selectedOrganization = isset($_SESSION['selectedOrganization']) ? $_SESSION['selectedOrganization'] : null;
    
    $insertApplicants = "INSERT INTO applicants (first_name, last_name, age, email, location, available_time, necessary_hours,selected_organization) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($insertApplicants);
    $stmt->bind_param("ssisssis", $firstName, $lastName, $age, $email, $location, $availableTime, $necessaryHours, $selectedOrganization);
    $stmt->execute();
    $stmt->close();

}
// for closing the database connection when done
$conn->close();
?>
