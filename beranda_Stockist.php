<html>
<title>Extended Polybius Square</title>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">

<script src="js/FileSaver.js"></script>

    <script>
	
        function saveStaticDataToFile() {
		var save = document.getElementById("exportContent").innerHTML;
            var blob = new Blob([save],
                { type: "text/plain;charset=utf-8" });
            saveAs(blob, "hasil-encript.txt");
        }
		
    </script>

</head>
<body>
<?php 
	session_start();
// include 'chiper.php';
// include 'polybios.php';
include 'koneksi.php';

 
?>
<script type="text/javascript">




function Export2Doc(element, filename = ''){
    var preHtml = "";
    var postHtml = "";
    var html = preHtml+document.getElementById(element).innerHTML+postHtml;
 
    var blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });
     
    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
     
    // Specify file name
    filename = filename?filename+'.doc':'document.doc';
     
    // Create download link element
    var downloadLink = document.createElement("a");
 
    document.body.appendChild(downloadLink);
     
    if(navigator.msSaveOrOpenBlob ){
        navigator.msSaveOrOpenBlob(blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = url;
         
        // Setting the file name
        downloadLink.download = filename;
         
        //triggering the function
        downloadLink.click();
    }
     
    document.body.removeChild(downloadLink);
}

	

</script>

<script>		
var openFile = function(event) {
  var input = event.target;
  var reader = new FileReader();
  reader.onload = function() {
    var zip = new JSZip(reader.result);
    var doc = new window.docxtemplater().loadZip(zip);
    var text = doc.getFullText();
    var node = document.getElementById('plaintext');
    node.innerText = text;
  };
  reader.readAsBinaryString(input.files[0]);
};

		
</script>

<div class="banner">
    <div class="bg-color">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="max-width: 900px; float: none; margin: 0 auto; margin-top: 40px; margin-bottom: 0px; color: white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Page Enkripsi</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-7" 
                                style= "padding: 50px 15px; color: white;">
                                </div>
                                <div class="col-md-5" style= "padding: 10px; color: white;">
                                    <!-- start Form Enkripsi -->
                                    <form action="" method="post" style="padding: 0px; margin: 0 auto;">
									<div class="form-group">
											<label class="col-sm-12 control-label">Silahkan Memilih File .Doc</label>        		
												<div class="col-sm-12">
													<input type="file" onchange='openFile(event)'  class="form-control" required="required">
												</div>
										</div>
										
                                    <input class="form-control smooth text-center" placeholder="Masukan Kunci" name="kunci" type="text" style="width: 100%; height:50px; margin-bottom:15px;"/>
                                    <textarea class="form-control  text-center" rows="5" name="pesan" id="plaintext" placeholder=""></textarea>
                                    <input type="submit" name="klik" value="Encrypt"   class="smooth cari btn btn-info btn-circle btn-lg" style="background-color: #4b4b4b; border-color: #383838; margin-top:15px;">
									
								  <script src="js/docxtemplater.js"></script> 
									<script src="js/jszip.js"></script>   
									   
									
								   </form>
                                    <!-- End Form Enkripsi -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 15px;margin-bottom: 50px;">
                        <div class="col-md-12">
                            <h5>Detail Proses</h5>
                            
                                <?php 
                                if (isset($_POST['klik'])) {
                                    $kunci=$_POST['kunci'];
                                    $pesan=$_POST['pesan'];
                                    //Input
                                    $plainText = $pesan;
                                    //$chiperkeyText = enkripsi($plainText, $kunci); ?>
                                    <p style="padding:0px; margin:0 auto;"> Kunci : <?php echo $kunci; ?></p>
									<p>Plaintext :</p>
									 <div class="col-12" >
									<textarea  class="form-control text-center" rows="6"  placeholder="hasil" ><?php echo $plainText; ?></textarea>
                                   
									</div>
									</br>
                                    
                                <?php } else {?>
                                    <p style="padding:0px; margin:0 auto;">
                                        Menunggu Proses Masukan..</p>
                                <?php };?>
                        </div>
						 <br>     
						  <h5>Hasil Enkripsi:</h5> 
						  
                       
						<div  class="col-md-12"  style="padding-top: 0px;">
						 <p hidden>	
						 <div id="exportContent" hidden="until-found">
						
						  <?php 
									
								
                            if (isset($_POST['klik'])) { //input data padding-top: 15px; 
                                $kunci=$_POST['kunci'];
									
							if($kunci=='POLY2013'){
							
								//mulai	enkrips
								$str = $pesan;
								$arr1 = str_split($str);
								$no=1;
								foreach($arr1 as $char){
								
								//simpan karakter belum selesai
								$tampil = mysql_query("SELECT * FROM tabel_proses where huruf = '$char' ");
								if ($r=mysql_fetch_array($tampil)){
								$huruf = ($r['huruf']);
								$kiri_atas = ($r['kiri_atas']);
								$atas_kiri = ($r['atas_kiri']);
								
								
									
								if($no% 2 == 0){
								echo $atas_kiri;// baris ke kolom
								
								mysql_query("INSERT INTO inputan_user(teks, hsl_enkripsi) VALUES('$huruf', '$atas_kiri' )");
								
									
								}else{
								echo $kiri_atas; //kolom ke baris
								
								mysql_query("INSERT INTO inputan_user(teks, hsl_enkripsi) VALUES('$huruf', '$kiri_atas' )");
							
								}
									}
								
									
									$no++;
							
								}// akhir	
								
								
							}else if ($kunci=='poly2013'){
								
								//mulai	enkrips
								$str = $pesan;
								$arr1 = str_split($str);
								$no=1;
								foreach($arr1 as $char){
								
								$tampil = mysql_query("SELECT * FROM tabel_proses where huruf = '$char' ");
								if ($r=mysql_fetch_array($tampil)){
								$huruf = ($r['huruf']);
								$kiri_atas = ($r['kiri_atas']);
								$atas_kiri = ($r['atas_kiri']);
								
										
								if($no% 2 == 0){
								echo $atas_kiri;// baris ke kolom
								
									mysql_query("INSERT INTO inputan_user(teks, hsl_enkripsi) VALUES('$huruf', '$atas_kiri' )");
									
								}else{
								
								echo $kiri_atas; //kolom ke baris
								mysql_query("INSERT INTO inputan_user(teks, hsl_enkripsi) VALUES('$huruf', '$kiri_atas' )");
								}
								}
									
									$no++;
								}// akhir	
								
							}else{
								echo "kunci salah..enkrip tidak tampil";
							}
									?>
									
                                		
                                <?php } else {?>
                                  
										
                              	<?php };?>
						
						</div>
						</p>	
					  </div>
					  	<textarea  class="form-control text-center" rows="6" id="hasilnya"></textarea>
                      
						<button class="btn btn-danger" onclick="Export2Doc('exportContent', 'HasilWord');">Download Hasil Enkripsi</button> &nbsp;&nbsp;
						
					
						
													
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="page-footer font-small stylish-color-dark pt-4 mt-4"  style="background-color:#f5f5f5">
          <!--Footer Links-->
          <div class="container text-center text-md-left">
              <!-- Footer links -->
              <div class="row text-center text-md-left mt-3 pb-3">
                  <!--First column-->
                  <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mt-3">
                      <h6 class="text-uppercase mb-2 font-weight-bold">Profil Sistem</h6>
                      <p>Sybil System Merupakan Sistem Enkripsi Yang Menggunakan Chiper Extended Polybius Square Sebagai Metode Enkripsinya.</p>
                  </div>
                  <!--/.First column-->
                  <hr class="w-100 clearfix d-md-none">
                  <!--Fourth column-->
                  <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mt-3">
                      <h6 class="text-uppercase mb-2 font-weight-bold">Logout</h6>
    					<li><a href="logout.php" style="color: #FA4343;" onclick = "return confirm('Anda yakin ingin Log Out?');">Log Out</a></li>
                  </div>
              </div>
</body>
</html>
<script>
 var hasilangka = document.getElementById("hasilnya");
  var exportnya = document.getElementById("exportContent").innerHTML;
 
        // menampilkan output ke elemen hasil
        hasilangka.value = exportnya;

</script>