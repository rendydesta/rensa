<?php 
 
session_start();
 
if (!isset($_SESSION['nisn'])) {
    header("Location: index.php");
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="1.jpg">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Berhasil Login</title>
</head>
<body>
    <div class="container-logout">
        <form action="" method="POST" class="login-email">
            <center><?php echo "<h2>Selamat Datang, " . $_SESSION['nisn'] ."!". "</h2>"; ?></center>
             
            <div class="input-group">
            <a style="text-decoration: none;" href="../dashboard/index.php" class="btn">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>