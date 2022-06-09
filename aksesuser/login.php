<?php

session_start();
// jika user sudah aktif dan masukan url login lagi, maka akan tetap diarahkan ke halaman index.php
if (isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}



require 'function.php';

if ( isset($_POST['login']) ) {

  $iduser = $_POST["id_user"];
  $password = $_POST["password"];

$conn = mysqli_connect("localhost:3306", "fhuniata_web", "fakultashukumuniat", "fhuniata_fakultashukumuniat");
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$iduser'");

  // cek nama
  if (mysqli_num_rows($result) === 1 ) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"]) ) {

      // Session login 
      $_SESSION["login"] = true;

      header("location: index.php");
      exit;
    }
  }

  $error = true;


}

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../img/uniat.png" rel="icon">
  <title>Login</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
  <div class="container">
    <div class="row text-center ">
      <div class="col-md-12">
        <br /><br />
        <h2> FAKULTAS HUKUM UNIVERSITAS ISLAM ATTAHIRIYAH</h2>
        <?php if( isset($error) ) : ?>
          <p style="color: black; font-style: italic;">Id User atau Password salah</p>
        <?php endif;?>

        <!-- <h5>( Login yourself to get access )</h5> -->
        <br />
      </div>
    </div>
    <div class="row ">

      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5 align="center">LOGIN</h5>  
          </div>
          <div class="panel-body">
            <form action="" method="post">
             <br />
             <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
              <input type="text" name="id_user" id="id_user" class="form-control" maxlength="12" placeholder="Masukkan Id User" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
              <input type="password" name="password" id="password" class="form-control"  placeholder="Masukkan Password" />
            </div>
                                    <!-- <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span>
                                          </div> -->

                                          <!-- <a href="index.html" class="btn btn-primary ">Login Now</a> -->
                                          <button type="submit" name="login" class="btn btn-primary">Login</button>
                                          <button type="clear" class="btn btn-primary">Batal</button>
                                          <hr />
                                          <!-- Not register ? <a href="registeration.html" >click here </a>  -->
                                        </form>
                                      </div>

                                    </div>
                                  </div>


                                </div>
                              </div>


                              <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
                              <!-- JQUERY SCRIPTS -->
                              <script src="assets/js/jquery-1.10.2.js"></script>
                              <!-- BOOTSTRAP SCRIPTS -->
                              <script src="assets/js/bootstrap.min.js"></script>
                              <!-- METISMENU SCRIPTS -->
                              <script src="assets/js/jquery.metisMenu.js"></script>
                              <!-- CUSTOM SCRIPTS -->
                              <script src="assets/js/custom.js"></script>

                            </body>
                            </html>
