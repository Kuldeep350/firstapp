<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

      {{-- dataTables --}}
         <link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

      {{-- SweetAlert2 --}}
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- {{--   <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"> --}}
 -->
       <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
       <link href="{{ asset('assets/bootstrap/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

      
      <script src="{{ asset('assets/bootstrap/js/ie-emulation-modes-warning.js') }}"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
       <link href="{{ asset('assets/bootstrap/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

     
       <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
       <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
      <script src="{{ asset('assets/bootstrap/js/ie-emulation-modes-warning.js') }}"></script>

    <title>Ajax</title>
  </head>
  <body>
     
     <div class="container">
      <h1>CRUD Operation By Ajax And Laravel</h1>
      <div class="row">
        <div class="col-lg-12">
          <a onclick="addForm()" class="btn btn-sm btn-success pull-right" >Add New</a>
        <table id="contact-table" class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">phone</th>
      <th scope="col">Email</th>
      <th scope="col">Religion</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
 </table>
        </div>
      </div>
       @include('form')
     </div>
     
    <!-- Optional JavaScript -->
  <!-- Optional JavaScript -->
    <!-- {{-- <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script> --}} -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
    {{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>
    <script type="text/javascript">
          var table1= $('#contact-table').DataTable({

            processing: true,
            serverSide: true,
           
            ajax: "{{route('all.contact')}}",
            columns:[
                      {data:'id', name:'id'},
                      {data:'name', name:'name'},
                      {data:'phone', name:'phone'},
                      {data:'email', name:'email'},
                      {data:'religion', name:'religion'},
                      {data:'action', name:'action',orderable:false, searchable: false}
            ]

          });

    //Add form function are here

          function addForm(){

            save_method='add';
            $('input[name_method').val('POST');
            $('#Modal-form').modal('show');
            $('#Modal-form form')[0].reset();
            $('.modal-title').text('Add Contact');
            $('#insertbutton').text('Add Contact');

          }
//insert data in useing ajax with laravel
        $(function(){
            $('#Modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('contact') }}";
                    else url = "{{ url('contact') . '/' }}" + id;
                    $.ajax({
                        url : url,
                        type : "POST",
                        data: new FormData($("#Modal-form form")[0]),
                       contentType: false,
                       processData: false,
                        success : function(data) { 
                            $('#Modal-form').modal('hide');
                            table1.ajax.reload();
                            swal({
                              title: "Good job!",
                              text: "You clicked the button!",
                              icon: "success",
                              button: "Great!", 
                            });
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });
 //edit ajax request are here
         function editForm(id) {
         save_method = 'edit';
          $('input[name=_method]').val('PATCH');
          $('#Modal-form form')[0].reset();
          $.ajax({
            url: "{{ url('contact') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
              $('#Modal-form').modal('show');
             $('.modal-title').text('Edit Contact');
              $('#insertbutton').text('Update Contact');
               $('#id').val(data.id);
               $('#name').val(data.name);
               $('#email').val(data.email);
               $('#phone').val(data.phone);
              $('#religion').val(data.religion);
            },
            error : function() {
                alert("Nothing Data");
            }
          });
        }   
    </script>
    </body>
    </html>