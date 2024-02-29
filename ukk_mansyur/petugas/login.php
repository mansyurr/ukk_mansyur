<?php
include "../koneksi/koneksi.php";
error_reporting(0);
session_start();
if(isset($_SESSION['NamaUser'])) {
    echo "<script>alert('maaf, anda sudah login. silahkan logout terlebih dahulu'); window.location.replace('index.php');</script>";
}
if(isset($_POST['sumbit'])) {
   $NamaUser = $_POST['NamaUser'];
   $Password = md5($_POST['Password']);

   $sql = "SELECT * FROM user WHERE NamaUser='$NamaUser' AND Password='$Password'";
   $result = mysqli_query($koneksi, $sql);

   if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['NamaUser'] = $row['NamaUser'];
    $_SESSION['Level'] = $row['Level'];

    header("location: index.php");
    echo "<script>alert('berhasil masuk')</script>";
    

 } else {
    echo "<script>alert('username atau password anda salah,silahkan coba lagi')</script>";
 }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel ="stylesheet" href=../bootstrap/css/bootstrap.min.css>
    </head>
    <body>
       <div class="container mt-5">
          <div class="row justify-content-center">
              <div class="col-md-4">
                 <div class="card">
                    <div class="card-header">
                       <form action="" class="form-signin" method="post">
                        <h3 class="">Login</h3>
                          <div class="card-body">
                            <from action="" method="post">
                                <div class="mb-3 mt-3">
                                    <table for="" class="form-label">Nama</table>
                                    <input type="text" name="NamaUser" class="form-control" require autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="Password" name="Password" class="form-control" require>
                                </div>
                                    <center><button name="sumbit" class="btn btn-primary">Login</button></center>
                                </div>
                            </from>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>

    <script src="../Bootstrap//bootstrap.min.js"></script>
    <Script src="../Bootstrap//jquery.min.js "></script>
 </body>
</html>