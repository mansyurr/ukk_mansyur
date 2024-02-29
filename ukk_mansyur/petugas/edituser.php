<?php 
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE UserID = $id";
$result = $koneksi->query($sql);

$data = $result->fetch_assoc();

    
    if(isset($_POST['submit'])) {
        $NamaUser = $_POST['NamaUSer'];
        $Level = $_POST['Level'];
        $Password = md5($_POST['Password']);

        $result = mysqli_query($koneksi, "UPDATE user SET NamaUser = '$NamaUser', Password = '$Password', Level = '$Level' WHERE UserID = '$id'");

        echo "<script>alert('Berhasil mengedit data user');window.location.href='?page=user';</script>";
    }


?>

<div class="row">
        <div class="col-md-4">
            <div class="card well">
                <div class="card-header">
                    <h3 class="">Edit User</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        
                        <div class="mb-3 mt-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" value="<?php echo $data['NamaUser']; ?>" id="nama" placeholder="Enter Name" name="NamaUser">
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="pwd" value="" placeholder="Enter Password" name="Password">
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level<span style="color: red;"> *</span></label>
                            <select class="form-control" name="Level" id="level">
                                <?php if ($data['Level'] == "Admin") { ?>
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                <?php } else { ?>
                                    <option value="Petugas">Petugas</option>
                                    <option value="Admin">Admin</option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
     </div>
</div>