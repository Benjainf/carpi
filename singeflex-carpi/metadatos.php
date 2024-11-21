<?php
session_start(); 
error_reporting(E_ALL);
include 'db.php';

 $user=$_POST['usuario']; 

 $pass=$_POST['contraseña']; 
	
$consultaLogin= "SELECT * FROM usuario WHERE Usuario= '$user' AND Contrasenia = '$pass' ";
$Conect= Conexion('base_de_datos');
$Resul= Ejecutar_Consulta($Conect,$consultaLogin);

echo $Filas = mysqli_num_rows ($Resul);
if ($Filas >0) {

		while($row = mysqli_fetch_array($Resul)) {
			$_SESSION["DNI"] =$row["DNI"];
			$_SESSION['user']=$row["Usuario"];
			$_SESSION["per"] =$row["Permiso"];
		}
		
        header('location:index.php');
	    ?>
	    <script>
		alert('Conexión establecida con exito.');
		time.sleep(3);
		</script>
	 <?php
	 }
else {
	header('location:login.php');
}
?>


</div>
</body>