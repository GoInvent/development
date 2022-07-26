<?php 
      include 'database.php';
      $sql_pemasukan = mysqli_query($koneksi,"SELECT SUM(jumlah_barang) AS total FROM pemasukan");
      $row = mysqli_fetch_assoc($sql_pemasukan);
      $sql_pengeluaran = mysqli_query($koneksi,"SELECT SUM(jumlah_barang) AS total FROM pengeluaran");
      $data = mysqli_fetch_assoc($sql_pengeluaran);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highstock Example</title>

		<style type="text/css">
#container {
    height: 300px;
    min-width: 360px;
    max-width: 800px;
    margin: 0 auto;
}

		</style>
	</head>
	<body>
        
<script src="../code/highstock.js"></script>
<script src="../code/modules/exporting.js"></script>
<script src="../code/modules/accessibility.js"></script>
<div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="container"></div>
                        </div>
<script type="text/javascript">
// Create the chart
Highcharts.chart('container', {

  chart: {
    type: 'column'
  },

  title: {
    text: 'Total pemasukan dan pengeluaran'
  },

  xAxis: {
    categories: ['Pengeluaran', 'Pemasukan']
  },

  yAxis: {
    allowDecimals: false,
    min: 0,
    title: {
      text: 'Total'
    }
  },

  plotOptions: {
    column: {
      stacking: 'normal'
    }
  },

  series: [{
    name: 'Total',
    data: [<?php echo $row['total'] ?>, <?php echo $data['total'] ?>],
  }]
}); 
		</script>
	</body>
</html>
