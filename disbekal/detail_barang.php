<?php 
      include 'database.php';
      $sql_pemasukan = mysqli_query($koneksi,"SELECT SUM(jumlah_barang) AS total FROM pemasukan");
      $data_pemasukan = mysqli_fetch_assoc($sql_pemasukan);
      $sql_pengeluaran = mysqli_query($koneksi,"SELECT SUM(jumlah_barang) AS total FROM pengeluaran");
      $data_pengeluaran = mysqli_fetch_assoc($sql_pengeluaran);

?>

<!DOCTYPE html>
<html lang="en">

<script src="../code/highstock.js"></script>
<script src="../code/modules/exporting.js"></script>
<script src="../code/modules/accessibility.js"></script>

<body>
    <div style="margin:15px 0px 30px 290px;">
        <h3>Informasi kesediaan barang di gudang</h3>
        <p>Data keluar masuk barang di gudang</p>
    </div>
    <div style="margin-top:15px;">
        <!-- Grafik data barang di gudang -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="container"></div>
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
                                        categories: ['Pemasukan', 'Pengeluaran']
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
                                        data: [<?php echo $data_pemasukan['total'] ?>, <?php echo $data_pengeluaran['total'] ?>],
                                    }]
                                    }); 
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> 
</body>
</html>