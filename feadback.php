<?php
session_start();
include("connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Centered Container */
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            font-size: 28px;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        textarea, input[type="text"], input[type="submit"], input[type="reset"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"], input[type="reset"] {
            background: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            display: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Submit Your Feedback</h1>

    <form method="POST" action="feadback.php" onsubmit="return validateForm()" name="feedbackForm" id="feedbackForm">
        
        <label for="post_id">Post ID:</label>
        <input type="text" name="post_id" id="post_id" placeholder="Enter Post ID">
        <span class="error" id="post_id_error">Post ID is required</span>

        <label for="comment">Your Comment:</label>
        <textarea name="cont" id="comment" rows="5" placeholder="Write your feedback here..."></textarea>
        <span class="error" id="comment_error">Comment is required</span>

        <label for="date">Date:</label>
        <input type="text" name="sdate" id="date" value="<?php echo date('Y-m-d'); ?>" readonly>

        <input type="submit" value="Submit" name="register">
        <input type="reset" value="Reset">
    </form>
</div>

<script>
    function validateForm() {
        let postId = document.getElementById("post_id").value.trim();
        let comment = document.getElementById("comment").value.trim();
        let postIdError = document.getElementById("post_id_error");
        let commentError = document.getElementById("comment_error");

        let valid = true;

        if (postId === "") {
            postIdError.style.display = "block";
            valid = false;
        } else {
            postIdError.style.display = "none";
        }

        if (comment === "") {
            commentError.style.display = "block";
            valid = false;
        } else {
            commentError.style.display = "none";
        }

        return valid;
    }
</script>

<?php
if (isset($_POST["register"])) {    
    $post_id = mysqli_real_escape_string($con, $_POST["post_id"]);
    $cont = mysqli_real_escape_string($con, $_POST["cont"]);

    if ($con) {
        // Adjusted SQL query to match your specified columns
        $sql = "INSERT INTO Comment (comment_id, content, post_id, date_posted) VALUES (NULL, '$cont', '$post_id', NOW())";
        $inserted = mysqli_query($con, $sql);

        if ($inserted) {
            echo "<script>alert('Feedback sent successfully!'); window.location.href='feadback.php';</script>";
        } else {
            echo "<script>alert('Unable to send feedback. Try again later.');</script>";
        }
    } else {
        echo "<script>alert('Database connection failed.');</script>";
    }
}
?>

</body>
</html>
