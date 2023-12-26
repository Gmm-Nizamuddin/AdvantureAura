<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('background/b.jpg'); /* Add the background image */
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login {
            width: 400px;
            height: auto;
            background: linear-gradient(to top, rgba(128, 128, 128, 0.8) 50%);
            position: absolute;
            transform: translate(0%, -5%);
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border: 2px solid #555555; /* Darker gray border */
        }

        .login h3 {
            width: 220px;
            font-family: sans-serif;
            text-align: center; /* Center text */
            color: #fff;
            font-size: 22px;
            background-color: #ff7200; /* Background color */
            border-radius: 10px;
            margin: 15px auto; /* Center horizontally with 'auto' margin */
            padding: 10px;
        }

        .login .alert-message {
            text-align: center;
            color: red; /* Adjust the color as needed */
            margin-bottom: 10px; /* Add spacing between the alert and Full Name input */
        }

        .login input[type="text"],
        .login input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 15px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login button[type="submit"] {
            width: 240px;
            height: 35px;
            background: #ff7200;
            border: none; /* Removes individual border properties */
            color: #fff;
            font-size: 15px;
            letter-spacing: 1px;
            margin-top: 30px;
            font-family: sans-serif;
            border-radius: 5px;
            transition-duration: 500ms;
            display: block; /* Centers the button horizontally */
            margin: 15px auto; /* Centers the button horizontally */
            text-align: center; /* Centers the text within the button */
        }

        .login p {
            text-align: center;
            color: #ffff;
        }

        .login a {
            color: #007BFF;
            text-decoration: none;
        }

        .login a:hover {
            text-decoration: underline;
        }

        #user-availability-status {
            color: #007BFF;
        }
    </style>
</head>
<body>
<?php
error_reporting(0);

// Database connection details (replace with your own)
$host = 'localhost';
$dbname = 'tourism';
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$message = ''; // Initialize the message variable

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mnumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check if the passwords match
    if ($password !== $confirmpassword) {
        $message = "Password and Confirm Password do not match. Please try again.";
    } else {
        // Check if the email is from an allowed domain
        if (!preg_match('/@(gmail\.com|outlook\.com|yahoo\.com)$/', $email)) {
            $message = "Email address must be from @gmail.com, @outlook.com, or @yahoo.com domains.";
        } else {
            // Check if email already exists in the database
            $stmt = $dbh->prepare("SELECT EmailId FROM tblusers WHERE EmailId = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $message = "Email already exists. Please choose a different email.";
            } else {
                // Save the password as plain text (not recommended for security)
                // Hash the password before storing it in the database (recommended for security)
                $password = password_hash($password, PASSWORD_BCRYPT);

                $sql = "INSERT INTO tblusers(FullName, MobileNumber, EmailId, Password) VALUES(:fname, :mnumber, :email, :password)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':fname', $fname, PDO::PARAM_STR);
                $query->bindParam(':mnumber', $mnumber, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
                $query->execute();

                if ($query) {
                    $message = "You are successfully registered. Now you can log in.";
                    echo "<script>alert('$message'); window.location.href = 'home.php';</script>"; // Show alert and redirect to login page
                    exit();
                } else {
                    $message = "Something went wrong. Please try again.";
                }
            }
        }
    }
}
?>

<div class="login">
    <div class="login-right">
        <form name="signup" method="post">
            <h3>Create your account</h3>
            <div class="alert-message">
                <!-- Alert message will appear here -->
                <?php echo $message; ?>
            </div>
            <input type="text" value="" placeholder="Full Name" name="fname" autocomplete="off" required="">
            <input type="text" value="" placeholder="Mobile number" maxlength="10" name="mobilenumber" autocomplete="off" required="">
            <input type="text" value="" placeholder="Email id" name="email" id="email" onBlur="checkAvailability()" autocomplete="off" required="">
            <span id="user-availability-status" style="font-size: 12px;"></span>
            <input type="password" value="" placeholder="Password" name="password" required="">
            <input type="password" value="" placeholder="Confirm Password" name="confirmpassword" required="">
            <div class="modal-footer text-right">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Create</button>
                <p>Already have an account? <a href="home.php">Login now</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Include your JavaScript libraries here -->
<script src="jquery.min.js"></script>
<script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php", // Replace with the actual URL for email availability check
            data: 'emailid=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>
</body>
</html>
