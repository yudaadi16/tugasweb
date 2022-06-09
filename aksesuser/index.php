<?php

// if(!isset($_SESSION)) 
//     { 
//         session_start(); 
//     } 

//     // =========================

// if( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// }

// koneksi cpanel
// $conn = mysqli_connect("localhost:3306", "fhuniata_web", "fakultashukumuniat", "fhuniata_fakultashukumuniat");


// koneks localhost :
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrator.FH-UNIAT</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- MORRIS CHART STYLES-->
  <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">DASHBOARD</a> 
            </div>
            <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;"><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>

                    <li>
                        <a href="index.php?halaman=index"><i class="fa fa-home fa-3x"></i> Home</a>
                    </li>
<!-- =========================================================== -->
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <!-- <a href="index.php?halaman=tampilanggota"><i class="fa fa-user fa-3x"></i> Anggota</a> -->
                                <a href="index.php?halaman=showberita"><i class="fa fa-user fa-3x"></i> Berita</a>
                            </li>

                            <li>
                                <a href="index.php?halaman=showdosen"><i class="fa fa-book fa-3x"></i> Dosen</a>
                            </li>

                            <li>
                                <a href="index.php?halaman=showuser"><i class="fa fa-user fa-3x"></i> User</a>
                            </li>
                            
                            <li>
                                <a href="index.php?halaman=showmahasiswa"><i class="fa fa-user fa-3x"></i>mahasiswa</a>
                            </li>


                        </ul>
                    </li>  

                    <!-- <li>
                        <a href="index.php?halaman=samplepage2"><i class="fa fa-dashboard fa-3x"></i> Report</a>
                    </li>
 -->
                    

                </ul>

            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php 
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="index")
                    {
                        include "homeadmin.php";
                        //echo "This Page BRD..!!!";
                    }
                    
                    elseif ($_GET['halaman']=="brd")
                    {
                        include "brd.php";
                        //echo "This Page BRD..!!!";
                    }
                    
                    elseif ($_GET['halaman']=="adddosen")
                    {
                        include 'adddosen.php';
                        //echo "This Page ADD DOSEN..!!!";
                    }
                    elseif ($_GET['halaman']=="updatedosen") 
                    {
                        include 'updatedosen.php';
                        //echo "This Page UPDATE DOSEN..!!!";
                    }
                    elseif ($_GET['halaman']=="deletedosen") 
                    {
                        include 'deletedosen.php';
                        //echo "This Page DEL DOsEN..!!!";
                    }                    

                    // -------Berita-------------------------


                    elseif ($_GET['halaman']=="showberita") 
                    {
                        include 'showberita.php';
                        //echo "This Page SHW BERITA..!!!";
                    }                 
                    elseif ($_GET['halaman']=="addberita") 
                    {
                        include 'addberita.php';
                        //echo "This Page ADD BERITA..!!!";
                    }
                    elseif ($_GET['halaman']=="updateberita") 
                    {
                        include 'updateberita.php';
                       // echo "This Page UPDATE BERITA..!!!";
                    }
                    elseif ($_GET['halaman']=="deleteberita") {
                       include 'deleteberita.php';
                    }
                    // selesai Berita=======================



                    elseif ($_GET['halaman']=="home") 
                    {
                        include 'home.php';
                        //echo "This Page HOME..!!!";
                    }
                    elseif ($_GET['halaman']=="login") 
                    {
                        include 'login.php';
                        //echo "This Page LOGIN..!!!";
                    }
                    elseif ($_GET['halaman']=="logut") 
                    {
                        include 'logut.php';
                        //echo "This Page LOGOUT..!!!";
                    }


                    // selesai peminjaman=======================

                    // -------pengembalian-------------------------
                    elseif ($_GET['halaman']=="showdosen") 
                    {
                        include 'showdosen.php';
                        //echo "This Page SHW DOSEN..!!!";
                    }
                    // selesai 

                    // -------mahasiswa-----------------------
                    elseif ($_GET['halaman']=="showmahasiswa") 
                    {
                        include 'showmahasiswa.php';
                       // echo "This Page REPORT..!!!";
                    }
                    elseif ($_GET['halaman']=="addmahasiswa") 
                    {
                        include 'addmahasiswa.php';
                       // echo "This Page REPORT..!!!";
                    }

                    elseif ($_GET['halaman']=="updatemahasiswa")
                     {
                    include 'updatemahasiswa.php';
                    }
                    elseif ($_GET['halaman']=="deletemahasiswa") {
                        include 'deletemahasiswa.php';
                        # code...
                    }
                    // selesai report========================


                    // -------user-----------------------
                    elseif ($_GET['halaman']=="showuser") 
                    {
                        include 'showuser.php';
                        //echo "This Page SHW USER..!!!";
                    }
                    elseif ($_GET['halaman']=="adduser") 
                    {
                        include 'adduser.php';
                        //echo "This Page ADD USER..!!!";
                    }
                    elseif ($_GET['halaman']=="updateuser") 
                    {
                        include 'updateuser.php';
                        //echo "This Page UPDATE USER..!!!";
                    }
                    elseif ($_GET['halaman']=="deleteuser") 
                    {
                        include 'deleteuser.php';
                        //echo "This Page DELETE USER..!!!";
                    }
                    // selesai user========================




                }
                else
                {
                    include 'message.php';
                    //echo "This Page ORANG TAMVAN..!!!";
                }
                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    

</body>
</html>
