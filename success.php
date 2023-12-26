<!DOCTYPE html>
<html>
<head>
    <title>Payment Status</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
echo "<h1>Payment Successful with SSLCOMMERZ</h1>";
?>

<?php
header("refresh:3;url=after_login_home_page.php");
exit;
?>
</body>
</html>
