<?php

$nama_login = $this->session->userdata('username');;

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../../../favicon.ico">-->

    <title>Aplikasiku</title>

  

      <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/bootstrap/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet" >

    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/dist/jquery-ui.css">

    
    
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Aplikasiku</a>
      
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url(); ?>index.php/Login/session_destroy">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Logout</button>
        </form>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Selamat Datang, <?php echo $nama_login; ?></h1>
        <br>
        <b><i><u><?php echo $this->session->flashdata('validasi'); ?></u></i></b>        
        <br><br>

        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Login/addPenduduk">

         <input type="text" name="no_ktp" id="no_ktp" class="form-control" placeholder="Nomor Penduduk" maxlength="16" onchange="cekTanggal()" onkeypress="return isNumberKey(event)" required> 
         <a id="message_error" style="color: red">Tanggal Lahir KTP Tidak Sesuai</a> 
          
        <br>

        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Penduduk" maxlength="50" onkeydown="cekSymbol()" onchange="cekSymbol()"required>
        <a id="message_error_nama" style="color: red">Nama Tidak Boleh Singkatan/Angka/Simbol/Gelar</a> 
        <br>

        <input type="text" name="tanggal" id="datepicker" class="form-control" placeholder="Tanggal Lahir" onchange="cekTanggal()" required>
        <a id="message_error_2" style="color: red">Tanggal Lahir KTP Tidak Sesuai</a> 
        <br>

        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" onkeydown="cekAlamat()" required>
        <a id="message_error_alamat" style="color: red">Nama Jalan/Komplek Tidak Boleh di Singkat</a> 
        <br>

          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Simpan</button>
        </form>

      </div>

      <table class="table">
      <thead>
        <tr>
          <th>Nomor Penduduk</th>
          <th>Nama Lengkap</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 

        foreach ($get_penduduk as $key) {
          echo 
              "<tr>
                <td>".$key->no_ktp."</td>
                <td>".$key->nama."</td>
                <td>".$key->tanggal_lahir."</td>
                <td>".$key->alamat."</td>
                <td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal' onclick='getModalData(".$key->no_ktp.")' >Edit</button> | 

                <button type='button' class='btn btn-danger' onclick=\"location.href = '" . site_url('Login/getDeleteData' . '/' . $key->no_ktp . '') . "'\">Hapus</button>
                </td>

              </tr>";
        }

        ?>
        
        
      </tbody>
    </table>


    <!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <center><h1>Biodata</h1></center>
      <div class="modal-body">

        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Login/setDataBiodata">

        <input type="text" name="no_ktp_edit" id="no_ktp_edit" class="form-control" placeholder="no_ktp_edit" maxlength="16" onkeydown="cekTanggalEdit()" onkeypress="return isNumberKey(event)" required>
         <a id="message_error_no_ktp_edit" style="color: red">Tanggal Lahir KTP Tidak Sesuai</a> 

        <br>
        <input type="text" name="nama_edit" id="nama_edit" class="form-control" placeholder="nama_edit" maxlength="50" onkeydown="cekSymbolEdit()" onchange="cekSymbolEdit()" required>
        <a id="message_error_nama_edit" style="color: red">Nama Tidak Boleh Singkatan/Angka/Simbol/Gelar</a> 
<br>


        <input type="text" name="tanggal_edit" id="tanggal_edit" class="form-control" placeholder="tanggal_edit" onchange="cekTanggalEdit()" required>
        <a id="message_error_tanggal_edit" style="color: red">Tanggal Lahir KTP Tidak Sesuai</a> 
<br>

        <input type="text" name="alamat_edit" id="alamat_edit" class="form-control" placeholder="alamat_edit" onkeydown="cekAlamatEdit()" required>
        <a id="message_error_alamat_edit" style="color: red">Nama Jalan/Komplek Tidak Boleh di Singkat</a> 
<br>


          <center><button class="btn btn-primary my-2 my-sm-0" type="submit">Simpan</button></center>

        </form>

      </div>
    </div>

  </div>
</div>


    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    
    <script src="<?php echo base_url();?>assets/bootstrap/dist/js/jquery-3.2.1.slim.min.js" ></script>

 <script>
	
	 $(function() {
	    $( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy',
        "yearRange": "1940:2022",
        changeYear: true});

	  } );

   $(function() {
      $( "#tanggal_edit" ).datepicker({dateFormat: 'dd/mm/yy',
        "yearRange": "1940:2022",
        changeYear: true});

    } );

   function isNumberKey(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;

      return true;
   }

   function cekTanggal() {
     
     x = $("#no_ktp").val();
     y = $('#datepicker').val();

     var tanggal_ktp        = x.substring(6, 12);
     var bulan_tahun_ktp    = tanggal_ktp.substring(2, 7);

     // var hari_ktp_wanita = tanggal_ktp.substring(0, 2);
     // var tgl_plus =  parseInt(hari_ktp_wanita) + 40 ;


     // var tanggal_ktp_wanita = tgl_plus + bulan_tahun_ktp;

     var day            = y.slice(0, 2);
     var day_wanita     = y.slice(0, 2);
     var month          = y.slice(3, 5);
     var year           = y.slice(8, 10);

     var day_plus       = parseInt(day_wanita) + 40 ;
     var tanggal_lahir        = day+month+year ;
     var tanggal_lahir_wanita = day_plus+month+year ;
     // alert(day+month+year);

     // console.log(tanggal_ktp_wanita);
     if ((x != '' && y != '') && (tanggal_ktp == tanggal_lahir) || (tanggal_ktp == tanggal_lahir_wanita)) {

        document.getElementById("no_ktp").style.outline = "solid green";

        document.getElementById("datepicker").style.outline = "solid green";

        $("#message_error").hide();
        $("#message_error_2").hide();
        console.log('Benar');
     } else {

        console.log('Salah');

        document.getElementById("no_ktp").style.outline = "solid red";

        document.getElementById("datepicker").style.outline = "solid red";

        $("#message_error").show();
        $("#message_error_2").show();
     }

   }


   function cekTanggalEdit() {
     
     x = $("#no_ktp_edit").val();
     y = $('#tanggal_edit').val();

     var tanggal_ktp   = x.substring(6, 12);
     var day    = y.slice(0, 2);
     var month  = y.slice(3, 5);
     var year   = y.slice(8, 10);

     var tanggal_lahir = day+month+year ;
     // alert(day+month+year);

     if ((x != '' && y != '') && (tanggal_ktp == tanggal_lahir)) {

        document.getElementById("no_ktp_edit").style.outline = "solid green";

        document.getElementById("tanggal_edit").style.outline = "solid green";

        $("#message_error_no_ktp_edit").hide();
        $("#message_error_tanggal_edit").hide();
        console.log('Benar');
     } else {

        console.log('Salah');

        document.getElementById("no_ktp_edit").style.outline = "solid red";

        document.getElementById("tanggal_edit").style.outline = "solid red";

        $("#message_error_no_ktp_edit").show();
        $("#message_error_tanggal_edit").show();
     }

   }

   function cekSymbol() {

      var str = $("#nama").val();
      var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
      var alphaExp = /[0-9]/;

      var n = format.test(str);
      var x = alphaExp.test(str);

      // alert(x)
      if (n == true || x == true) {

        document.getElementById("nama").style.outline = "solid red";

        $("#message_error_nama").show();
      } else {

        document.getElementById("nama").style.outline = "solid green";

        $("#message_error_nama").hide();
      }

      
   }


   function cekSymbolEdit() {

      var str = $("#nama_edit").val();
      var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
      var alphaExp = /[0-9]/;

      var n = format.test(str);
      var x = alphaExp.test(str);

      // alert(x)
      if (n == true || x == true) {

        document.getElementById("nama_edit").style.outline = "solid red";

        $("#message_error_nama_edit").show();
      } else {

        document.getElementById("nama_edit").style.outline = "solid green";

        $("#message_error_nama_edit").hide();
      }

      
   }


   function cekAlamat() {

     var str = $("#alamat").val();
     var a   = str.includes("Jln.");
     var b   = str.includes("Jln");
     var c   = str.includes("Jl");
     var d   = str.includes("Jl.");

     var e   = str.includes("jln.");
     var f   = str.includes("jln");
     var g   = str.includes("jl");
     var h   = str.includes("jl.");

     var i   = str.includes("Kompleks");
     var j   = str.includes("Komp.");
     var k   = str.includes("Komp");

     var l   = str.includes("kompleks");
     var m   = str.includes("komp.");
     var n   = str.includes("komp");

     if ((a || b || c || d || e || f || g || h || i || j || k || l || m || n) == true) {

        document.getElementById("alamat").style.outline = "solid red";

        document.getElementById("alamat").style.outline = "solid red";

    
        $("#message_error_alamat").show();
     } else {

         document.getElementById("alamat").style.outline = "solid green";

        document.getElementById("alamat").style.outline = "solid green";

    
        $("#message_error_alamat").hide();

     }

   }


   function cekAlamatEdit() {

     var str = $("#alamat_edit").val();
     var a   = str.includes("Jln.");
     var b   = str.includes("Jln");
     var c   = str.includes("Jl");
     var d   = str.includes("Jl.");

     var e   = str.includes("jln.");
     var f   = str.includes("jln");
     var g   = str.includes("jl");
     var h   = str.includes("jl.");

     var i   = str.includes("Kompleks");
     var j   = str.includes("Komp.");
     var k   = str.includes("Komp");

     var l   = str.includes("kompleks");
     var m   = str.includes("komp.");
     var n   = str.includes("komp");

     if ((a || b || c || d || e || f || g || h || i || j || k || l || m || n) == true) {

        document.getElementById("alamat_edit").style.outline = "solid red";

        document.getElementById("alamat_edit").style.outline = "solid red";

    
        $("#message_error_alamat_edit").show();
     } else {

         document.getElementById("alamat_edit").style.outline = "solid green";

        document.getElementById("alamat_edit").style.outline = "solid green";

    
        $("#message_error_alamat_edit").hide();

     }

   }


   function getModalData(x) {

     // $("#nama_edit").val(x);

     $.post("<?php echo site_url('Login/getDataBiodata'); ?>", {'no_ktp': x})
      .done(function (data) {
          
          data = JSON.parse(data);                     
              $("#no_ktp_edit").val(data['no_ktp']);
              $("#nama_edit").val(data['nama']);
              $("#tanggal_edit").val(data['tanggal_lahir']);
              $("#alamat_edit").val(data['alamat']);
                                          
          
      });
     // console.log(x);
   }



   function getDeleteData(x) {

     $.post("<?php echo site_url('Login/getDeleteData'); ?>", {'no_ktp': x})
      .done(function (data) {
          
      });
     
   }


   $( document ).ready(function() {
    // console.log( "ready!" );

      $("#message_error").hide();
      $("#message_error_2").hide();
      $("#message_error_nama").hide();
      $("#message_error_alamat").hide();

      $("#message_error_no_ktp_edit").hide();
      $("#message_error_tanggal_edit").hide();
      $("#message_error_nama_edit").hide();
      $("#message_error_alamat_edit").hide();

    });


	</script>
    <!--<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
      <script src="<?php echo base_url();?>assets/datepicker/jquery-1.12.4.js"></script>
	<script src="<?php echo base_url();?>assets/datepicker/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>

   
  </body>
</html>

