<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Daftar User</h4>
                  <?php
                  if($_SESSION['Level'] == "Administrator") {
                  ?>
                  <a href ="?page=tambahuser" class="btn btn-primary btn-sm">Tambah User</a>
                  <?php
                  }
                  ?>
              <p class="card-descripton">
              </p>

              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacin="0">
                    <thead>
                    <tr>
                               <th>no</th>
                               <th>NamaUser</th>
                               <th>Password</th>
                               <th>Level</th>
                               <?php
                               if($Level=='Administrator') {
                               ?>
                               <th>opsi</th>
                               <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM user");
                            while ($data= $sql->fetch_assoc()) {
                        
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['NamaUser']?></td>
                            <td><?php echo $data['Password']?></td>
                            <td><?php echo $data['Level']?></td>
                            <?php
                            if ($_SESSION['Level'] == "Administrator") { ?>
                            <td><a type='button' href='?page=edituser&id=<?= $data['UserID'];?>' class='btn btn-sm btn-warning'>Edit</a>/<a type='button' href='?page=hapususer&UserID=<?= $data['UserID'];?>' class='btn btn-sm btn-danger'>Delete</a></td>   
                            <?php } ?>
                        </tr>
                    <?php } ?>