<body>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h1 align="center" id="blink">Please Scan Tag to Display ID or Product Data</h1>
								<p id="getUID" hidden></p>
								<br>
								<div id="show_user_data">
										<table class="table">
										<h1 align="center">Lihat Data Barang</h1>
											<tr>
												<td>
													<table class="table">
														<tr>
															<td width="113" align="left" class="lf">ID Barang</td>
															<td style="font-weight:bold">:</td>
															<td align="left">--------</td>
														</tr>
														<tr bgcolor="#f2f2f2">
															<td align="left" class="lf">Nama Barang</td>
															<td style="font-weight:bold">:</td>
															<td align="left">--------</td>
														</tr>
														<tr>
															<td align="left" class="lf">Jenis Barang</td>
															<td style="font-weight:bold">:</td>
															<td align="left">--------</td>
														</tr>
														<tr bgcolor="#f2f2f2">
															<td align="left" class="lf">Harga</td>
															<td style="font-weight:bold">:</td>
															<td align="left">--------</td>
														</tr>
														<tr>
															<td align="left" class="lf">Stok</td>
															<td style="font-weight:bold">:</td>
															<td align="left">--------</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
								</div>
								<script>
									var myVar = setInterval(myTimer, 1000);
									var myVar1 = setInterval(myTimer1, 1000);
									var oldID="";
									clearInterval(myVar1);

									function myTimer() {
										var getID=document.getElementById("getUID").innerHTML;
										oldID=getID;
										if(getID!="") {
											myVar1 = setInterval(myTimer1, 500);
											showUser(getID);
											clearInterval(myVar);
										}
									}
									
									function myTimer1() {
										var getID=document.getElementById("getUID").innerHTML;
										if(oldID!=getID) {
											myVar = setInterval(myTimer, 500);
											clearInterval(myVar1);
										}
									}
									
									function showUser(str) {
										if (str == "") {
											document.getElementById("show_user_data").innerHTML = "";
											return;
										} else {
											if (window.XMLHttpRequest) {
												// code for IE7+, Firefox, Chrome, Opera, Safari
												xmlhttp = new XMLHttpRequest();
											} else {
												// code for IE6, IE5
												xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
											}
											xmlhttp.onreadystatechange = function() {
												if (this.readyState == 4 && this.status == 200) {
													document.getElementById("show_user_data").innerHTML = this.responseText;
												}
											};
											xmlhttp.open("GET","lihat_databarang.php?id="+str,true);
											xmlhttp.send();
										}
									}
									
									var blink = document.getElementById('blink');
									setInterval(function() {
										blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
									}, 750); 
								</script>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
</body>

</html>