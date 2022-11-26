<!-- <html>

<head>
    <title>Hi</title>
</head>

<body>
    <br>
    <center>
        Nama : Cindy Steffani <br>
        NIM : 09021181823010
    </center>

</body>

</html>
 -->
<!-- <!DOCTYPE html>
<html>

<head>
    <title>Hello world..</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <h1>Hello world..</h1>
    <button id="btn-action">Success</button>
    <button id="btn-action2">Success AJAX</button>

    <br>Ini hasilnya <div id="result"></div>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn-action").click(function() {
            //alert("klik berhasil");
            $("#result").load("<?php echo base_url(); ?>index.php/hello/getResult")
        });

        $("#btn-action2").click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/hello/getResult"
            }).done(function(result) {
                $("#result").text(result);
            });
        });
    });
</script>

</html> -->


<!DOCTYPE html>
<html>
<head>
	<title>Hello world</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<h1>Hello world</h1>	
	<!-- <button id="btn-action">Success</button>
	<button id="btn-action2">Success AJAX</button>
	<br> Ini hasil nya : <div id="result"></div> -->

	<select id="dropdown1">
        <option name="jenis alert" value="">Jenis Alert</option>
		<option name="a" value="A">A</option>	
		<option name="b" value="B">B</option>	
		<option name="c" value="C">C</option>	
	</select>

	<div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false">
            Alert
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" value="primary">Primary</a>
            <a class="dropdown-item" href="#" value="danger">Danger</a>
            <a class="dropdown-item" href="#" value="success">Success</a>
        </div>
    </div>
    <div class="alert alert-primary" role="alert" id="alert-label">
        A simple primary alert—check it out!
    </div>

   <!-- Button trigger modal -->
<button id="btn-popup-alert" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Jenis Alert yang Dipilih</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Alert yang dipilih adalah : <label id="label-modal-content"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>

<script type="text/javascript">
    $( document ).ready(function() {
        $("#btn-popup-alert").click(function() {
            var jenis_alert=$("#dropdown1").val();
            if(jenis_alert==""){
                $("#label-modal-content").text("jenis_alert belum dipilih");
            }
            else {
                $("#label-modal-content").text(jenis_alert);
            }
        });

        $("#btn-action").click(function() {
            // $("#result").html("boo")
            $("#result").load("<?php echo base_url(); ?>index.php/button/getResult")
        });


        $("#btn-action2").click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/button/getResult"
            }).done(function(res) {
                $("#result").html(res)
            })
        })

        $("#dropdown1").on('change',function(){
            var value = $(this).val();
            $("#alert-label").text(value);
        });

        $(".dropdown-item").click(function() {
            let value = $(this).attr("value");
            if (value == "primary") {
                $("#alert-label").text("A simple primary alert—check it out!");
                $("#alert-label").removeAttr("class");
                $("#alert-label").addClass("alert alert-primary")
            } else if (value == "success") {
                $("#alert-label").text("A simple success alert—check it out!");
                $("#alert-label").removeAttr("class");
                $("#alert-label").addClass("alert alert-success")
            } else if (value == "danger") {
                $("#alert-label").text("A simple danger alert—check it out!");
                $("#alert-label").removeAttr("class");
                $("#alert-label").addClass("alert alert-danger")
            }

        })
    })
</script>
</html>