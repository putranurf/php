
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
    <link href="<?php echo base_url();?>assets/bootstrap/docs/4.0/examples/signin/signin.css" rel="stylesheet" >
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/default.css" type="text/css" />-->

  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" action="<?php echo base_url(); ?>index.php/Login/login">

        <center><h2 class="form-signin-heading">Aplikasiku</h2></center>
        
        <input type="text" name="uname" id="inputUname" class="form-control" placeholder="Username" required autofocus>
        
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>

        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
        <br>
        <center><a href="<?php echo base_url(); ?>index.php/Login/daftarView">Daftar Akun ? </a></center>
      </form>

    </div> <!-- /container -->
  </body>
</html>
