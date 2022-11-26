<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">

    <title>Jumbotron Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
<!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

   <style>
     .bd-placeholder-img{
       font-size : 1.125rem;
       text-anchor: middle;
       -webkit-user-select:none;
       -moz-user-select: none;
       -ms-user-select: none;
       user-select: none;
     }

     @media (min-width : 768px) {
       .bd-placeholder-img-lg {
         font-size:3.5 rem;
       }
     }
</style>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets');?>/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">OPREC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" 
      aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" id="nav-home" href="#">Home <span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="nav-testimoni">Testimoni</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Featured</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Alumni</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">2019</a>
              <a class="dropdown-item" href="#" id="nav-alumni" data="2018">2018</a>
              <a class="dropdown-item" href="#">2017</a>
            </div>
          </li>
          <!-- ada menu dosen -->
          <li class="nav-item">
            <a class="nav-link" href="#" id="nav-dosen">Dosen</a>
          </li>
          <!-- done -->
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main role="main" id="main"> <!-- result nav -->
    </main>

    <footer class="container">
      <p>&copy; Company 2017-2020</p>
    </footer>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </html>
    
<script type="text/javascript">
$(document).ready(function(){
  $("#main").load("<?php echo base_url();?>index.php/Oprec/getHome");
  
  $("#nav-home").click(function()
  {
    $("#main").load("<?php echo base_url();?>index.php/Oprec/getHome");
  });
  $("#nav-testimoni").click(function()
    {
    $("#main").load("<?php echo base_url();?>index.php/Oprec/getTestimoni");
  });
  $("#nav-alumni").click(function()
    {
    $("#main").load("<?php echo base_url();?>index.php/Oprec/getAlumniPage");
  });
  $("#nav-dosen").click(function()
    {
    $("#main").load("<?php echo base_url();?>index.php/Oprec/getDosenPage");
  });
});
</script>