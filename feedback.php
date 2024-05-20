<?php
include("dbconnection.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html"); // Redirect to login page if user is not logged in
    exit;
}

// Retrieve the username from the session
$feedback_username = $_SESSION['name'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $feedback_rating = $_POST['rating'];
    $feedback_details = $_POST['comment'];

    // Prepare the SQL statement
    $stmt = mysqli_prepare($connect, "INSERT INTO feedback (feedback_username, feedback_rating, feedback_details) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sis", $feedback_username, $feedback_rating, $feedback_details);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Feedback submitted successfully
        echo '<script>alert("Thank you for your feedback!"); window.location = "index.php";</script>';
    } else {
        // Error occurred
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feedback.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Feedback Form</title>
    <link rel="icon" type="png" href="image/dreams2.png">
</head>
<body>
    <div class="content">
        <div class="feedback-form">
            <h2>Feedback Form</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="rating">Rating:</label>
                <select name="rating" id="rating">
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
                <br>
                <label for="comment">Comment:</label><br>
                <textarea name="comment" id="comment" rows="4" cols="50"></textarea>
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    
    <footer>
        <?php @include 'footer.php'; ?>
    </footer>
</body>
</html>