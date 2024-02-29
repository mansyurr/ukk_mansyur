<div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <form action="" class="form-signin" method="post"> 
              <h3 class="">DAFTAR AKUN</h3>
                <div class="card-body">
                  <form action="" method="post">
                    
                    <div class="mb-3 mt-3">
                      <table for="" class="form-label">nama</table>
                      <input type="text" name="NamaUser" class="form-control" require autofocus>
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="" class="form-label">password</label>
                      <input type="Password" name="Password" class="form-control" require >
                    </div>
                    <div class="mb-3">
                      <label for="Level" class="form-label">level<span style="color: red;"> *</span></label>
                      <select class="form-control" name="Level" id="Level">
                              <option value="">Pilih Level</option>
                              <option value="Administrator">Admin</option>
                              <option value="Petugas">Petugas</option>
                      </select>
                    </div>
                    
                      <button name="daftar" class="btn btn-primary">Daftar</button>
                      
                    </div> 
                  </form>
                  <?php 
			include '../koneksi/koneksi.php';
				if(isset($_POST['daftar'])){
          $NamaUser = $_POST['NamaUser'];
          $Level = $_POST['Level'];
					$Password = md5($_POST['Password']);

          $result = mysqli_query($koneksi, "INSERT INTO user (NamaUser, Password, Level) VALUES('$NamaUser','$Password','$Level')");
					if($result){
						echo "<script>alert('Berhasil mendaftar akun')</script>";
						echo "<script>location='location:user.php?p=daftar';</script>";
					}
				}
			 ?>
                </div>
            </div>
          </div>
        </div>
      </div>