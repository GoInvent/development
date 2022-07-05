<?php
require 'database.php';
$ProductID = null;
if ( !empty($_GET['ProductID'])) {
$ProductID = $_REQUEST['ProductID'];
}

$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM info where ProductID = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($ProductID));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
	
	$msg = null;
	if (null==$data['ProductName']) {
		$msg = "The ID of your Card / KeyChain is not registered !!!";
		$data['ProductID']=$ProductID;
		$data['ProductName']="--------";
		$data['Brand']="--------";
		$data['Price']="--------";
		$data['Quantity']="--------";
	} else {
		$msg = null;
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link   href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<style>
			td.lf {
				padding-left: 15px;
				padding-top: 12px;
				padding-bottom: 12px;
			}
		</style>
	</head>
	<body>
		<div>
			<table  width="452" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
				<tr>
					<td  height="40" align="center"  bgcolor="#10a0c5"><font  color="#FFFFFF">
					<b>Product Data</b></font></td>
				</tr>
				<tr>
					<td bgcolor="#f9f9f9">
						<table width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
							<tr>
								<td width="113" align="left" class="lf">ID Barang</td>
								<td style="font-weight:bold">:</td>
								<td align="left"><?php echo $data['ProductID'];?></td>
							</tr>
							<tr bgcolor="#f2f2f2">
								<td align="left" class="lf">Nama Barang</td>
								<td style="font-weight:bold">:</td>
								<td align="left"><?php echo $data['ProductName'];?></td>
							</tr>
							<tr>
								<td align="left" class="lf">Brand</td>
								<td style="font-weight:bold">:</td>
								<td align="left"><?php echo $data['Brand'];?></td>
							</tr>
							<tr bgcolor="#f2f2f2">
								<td align="left" class="lf">Harga</td>
								<td style="font-weight:bold">:</td>
								<td align="left"><?php echo $data['Price'];?></td>
							</tr>
							<tr>
								<td align="left" class="lf">Stok</td>
								<td style="font-weight:bold">:</td>
								<td align="left"><?php echo $data['Quantity'];?></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<p style="color:red;"><?php echo $msg;?></p>
	</body>
</html>