
<?php
class paging_dosen{

	function cariPosisi($batas){

		if(empty($_GET['home'])){
			$posisi=0;
			$_GET['home']=1;
		}
		else{
			$posisi = ($_GET['home']-1) * $batas;
		}
			return $posisi;
		}

		
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}

		
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "<li class='page-item'></li>";

		
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= " 
			<li class='page-item'><a class='page-link' href=index.php?home>First</a></li>
			<li class='page-item'><a class='page-link' href=index.php?home=$prev> Prev</a></li>  ";
		}
		else{ 
			$link_halaman .= "  <li class='page-item disabled'><a class='page-link' href='#' tabindex='-1' aria-label='Previous'>  Previous </a></li>  ";
		}

	
		$angka = ($halaman_aktif > 3 ? "<li class='page-item'> <span aria-hidden='true'>...</span> " : " </li>"); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<li class='page-item'><a class='page-link' href=index.php?home=$i>$i</a></li>  ";
		  }
		
		  $angka .= " <li class='page-item active'>  <a class='page-link' href='#'>$halaman_aktif</a> </li>  ";
			  
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<li class='page-item'><a class='page-link' href=index.php?home=$i>$i</a></li>  ";
		    }
			$angka .= ($halaman_aktif+2<$jmlhalaman ? " <li class='page-item'>  <span aria-hidden='true'>...</span> <a  class='page-link' href=index.php?home=$jmlhalaman>  $jmlhalaman</a>  " : " </li>");
			$link_halaman .= "<li class='page-item'>$angka</li>";

			 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= "
				<li class='page-item'><a class='page-link' href=index.php?home=$next>Next</a></li>
				<li class='page-item'><a class='page-link' href=index.php?home=$jmlhalaman>Last </a><li>";
			}
			else{
				$prev = $halaman_aktif-1;
				$link_halaman .= "
				<li class='page-item'><a class='page-link' href='index.php?home=$next'> Next</a></li> ";
			}
				return $link_halaman;
		}
}
?>
