
      <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Alamat</th>
              <!-- <th>Gambar</th> -->
              <th>Action</th>
            </tr>
          </thead>
          <tbody>


          <?php 
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");
            $no = 0;
            $dosen=$conn->query("SELECT * FROM dosen");
            while($m=mysqli_fetch_array($dosen)){
            $no++;    
          ?>  

          <?php 
            include"functionpage.php";
            error_reporting(E_ALL^(E_NOTICE | E_WARNING));
            $p   = new paging_dosen;
            $batas  = 5;
            $posisi = $p->cariPosisi($batas);
            $dosen=$conn->query("SELECT * FROM dosen 
            ORDER BY id_dosen DESC LIMIT  $posisi,$batas");
            $no=0;
            while($m=mysqli_fetch_array($dosen)){   
            $no++;
          ?>

            <tr>
              <th scope="row"><?php echo $no;?></th>
              <td><?php echo $m['id_dosen']; ?></td>
              <td><?php echo $m['nidn']; ?></td>
              <td><?php echo $m['nama_dosen']; ?></td>
              <td><?php echo $m['gelar']; ?></td>
              <!-- <td><img src="images/<?php echo $m['gambar'];?>" height="50"></td> -->
              <td>
               <a href="index.php?page=edit&id_dosen=<?php echo $m['id_dosen'];?>"><i class="fa fa-pencil"></i></a> | 
               <a href="index.php?page=delete&id_dosen=<?php echo $m['id_dosen'];?>"><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>

            <?php } ?>
            
          </tbody>
        </table>

      <div class="halaman">
        <nav aria-label="...">
          <ul class="pagination">

          <?php } ?>
          <?php 
              $jmldata     = mysqli_num_rows($conn->query("SELECT * FROM dosen"));
              $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
              $linkHalaman = $p->navHalaman($_GET['home'], $jmlhalaman);
              echo " <li  class='page-item'> $linkHalaman </li>"; 
          ?>
          </ul>
        </nav>
      </div>