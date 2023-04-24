<?php
//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'projetp');
?>
<html>
	<head>
		<title>Invoice generator</title>
	</head>
	<body>
		select invoice:
		<form method='get' action='invoice_form.php'>
			<select name='id_facture'>
				<?php
					
					$query = mysqli_query($con,"select * from facture");
					while($invoice = mysqli_fetch_array($query)){
						echo "<option value='".$invoice['id_facture']."'>".$invoice['id_facture']."</option>";
					}
				?>
			</select>
			<input type='submit' value='Generate'>
		</form>
	</body>
</html