
<?php
	session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	
	if($_SESSION["activada"]=="v")
	{
		if($_SESSION["idTipoU"]=="1"){
			header("location:servidor/Administrador.php");

		}else{
			if($_SESSION["idTipoU"]=="2"){
				header("location:servidor/menu.php");

			}else{
				header("location:../index.php");

			}
			
		}
		
		
?>

<?php
	}else{
		header("location:../index.php");
	}
?>