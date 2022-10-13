<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    
}
 
if (isset($_POST['submit'])) {
    $no_telp = $_POST['no_telp'];
    $nisn = $_POST['nisn'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE nisn='$nisn'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (no_telp, nisn, password)
                    VALUES ('$no_telp', '$nisn', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')
                document.location.href = 'index.php';</script>";
                
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="1.jpg">
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <div class="input-group">
                <input type="number" placeholder="No.Telp" name="no_telp" value="<?php echo $no_telp; ?>" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="NISN" name="nisn" value="<?php echo $nisn; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>