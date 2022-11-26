<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">
<!-- view dosen -->
<!-- Cindy Steffani- -->
    <!-- Example row of columns -->
    <div class="row">
      <h1>Daftar Dosen</h1>
    </div>
    <hr>
    <div class="row">
      <p>
        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#FormModal" id="btn-tambah-dosen">Tambah Dosen</button>
      </p>
    </div>
    <div class="container" id="konten">
      <table class="table table-striped display" id="table-dosen" style="width:100%">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NIDN</th>
            <th scope="col">Nama</th>
            <th scope="col">Gender</th>
            <th scope="col">Program_Studi</th>
            <th scope="col">Alamat</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form-dosen" name="form-dosen">
              <div class="form-group">
                <label for="nidn">NIDN</label>
                <input type="hidden" class="form-control" id="nidn_dummy" name="nidn_dummy">
                <input type="text" class="form-control" id="nidn" name="nidn" placeholder="NIDN" required>
              </div>
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" step=1 class="form-control" id="gender" name="gender" placeholder="Gender" required>
              </div>
              <div class="form-group">
                <label for="program_studi">Program Studi</label>
                <input type="text" class="form-control" id="program_studi" name="program_studi" placeholder="Program Studi">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
             
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" form="form-dosen" class="btn btn-primary" id="btn-simpan">Simpan</button>
          </div>
        </div>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

  <script type="text/javascript">
    $(document).ready(function(){
        var t =$("#table-dosen").DataTable({
                  "columnDefs": [
                    { width: "25%", targets: [2] },
                    { width: "20%", targets: [4] },
                    { width: "15%", targets: [6] },
                    { className: 'text-center', targets: [1,3,6] }
                  ]
                });
        renderTabelDosen();

        function renderTabelDosen(){
          t.clear();
          $.ajax({
            url: "<?php echo base_url();?>index.php/Oprec/getListDosen",
          }).done(function( res ) {
              //alert( "Data Saved: " + res );
              //console.log(res);
              var listDosen = JSON.parse(res);
             
              for(i=0;i<listDosen.length;i++){
                var btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus'  nidn='"+listDosen[i]['nidn']+"' nama='"+listDosen[i]['nama']+"'>Hapus</button>";
                var btn_edit ="<button type='button' class='btn btn-primary btn-sm btn-edit' nidn='"+listDosen[i]['nidn']+"' data-toggle='modal' data-target='#FormModal'>Edit</button>";

                 t.row.add( [
                    i+1,
                    listDosen[i]['nidn'],
                    listDosen[i]['nama'],
                    listDosen[i]['gender'],
                    listDosen[i]['program_studi'],
                    listDosen[i]['alamat'],
                    listDosen[i]['email'],
                    btn_hapus+btn_edit
                ] ).draw( false );
              }
            });
        }

        $("#form-dosen").submit(function(event){
          event.preventDefault();
         
          var dataDosen = $( this ).serialize();
          //console.log(data);
           $.ajax({
              method: "POST",
              url: "<?php echo base_url();?>index.php/Oprec/simpanDatadosen",
              data: dataDosen, 
            }).done(function( res ) {
              //res {true,false}
              console.log(res);

              var result = JSON.parse(res);

              if(result['status']==1||result['status']=="1"){
                $("#FormModal").modal("hide");
                alert("Data berhasil disimpan");
                var dosen= result['dosen'];

                renderTabelDosen();

              }
              else if(result['status']==-1||result['status']=="-1"){
                alert("Data GAGAL disimpan");
              }
              else if(result['status']==0||result['status']=="0"){ //res==0
                alert("data NIDN sudah ada");
              }
              else{
                alert("data gagal disimpan dengan error: "+res); 
              }
            });
        });

        $("#table-dosen tbody").on('click','.btn-hapus', function(){
            var nidn = $(this).attr('nidn');
            var nama = $(this).attr('nama');
            
            var removingRow = $(this).closest('tr');
            if(confirm("Apakah data dosen "+nidn+" "+nama+" ini akan dihapus?")){
              $.ajax({
                method: "POST",
                url: "<?php echo base_url();?>index.php/Oprec/hapusDosen",
                data: {nidn: nidn}
              }).done(function( res ) {
      
                if(res==1||res=="1"){
                  alert("Data berhasil dihapus");
                  t.row(removingRow).remove().draw();
                }
                else if(res==0||res=="0"){ //res==0
                  alert("data GAGAL dihapus");
                }
                else{
                  alert("data gagal dihapus dengan error: "+res); 
                }
              });
            }
        });

        $("#table-dosen tbody").on('click','.btn-edit', function(){
            var nidn = $(this).attr('nidn');
            
            $.ajax({
                method: "POST",
                url: "<?php echo base_url();?>index.php/Oprec/getDosenByNIDN/"+nidn,
                data: {}
              }).done(function( res ) {
                var dosen = JSON.parse(res);
                $("#nidn").val(dosen['nidn']);
                $("#nidn_dummy").val(dosen['nidn']);
                $("#nama").val(dosen['nama']);
                $("#gender").val(dosen['gender']);
                $("#program_studi").val(dosen['program_studi']);
                $("#alamat").val(dosen['alamat']);
                $("#email").val(dosen['email']);
                $("#nidn").attr('disabled',true);
              });          
            
        });

        $("#btn-tambah-dosen").click(function(){
              $("#nidn").val('');
              $("#nidn_dummy").val('');
              $("#nama").val('');
              $("#gender").val('');
              $("#program_studi").val('');
              $("#alamat").val('');
              $("#email").val('');
        });


    });
  </script>