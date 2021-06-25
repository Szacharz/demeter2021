@extends('layouts.admin')


<!-- Bootstrap library -->


@section('content')
<!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <br /> <br />  

          <script type="text/javascript">
        
         $('data').datepicker({
       todayBtn: "linked",
       language: "it",
       autoclose: true,
       todayHighlight: true,
       Format: 'dd/mm/yyyy' 
       });

       function myFunction()
       {
        var x = document.getElementById("tresc").autofocus;
       }
     var FormStuff = {
  
  init: function() {
    // kick it off once, in case the radio is already checked when the page loads
    this.applyConditionalRequired();
    this.bindUIActions();
  },
  
  bindUIActions: function() {
    // when a radio or checkbox changes value, click or otherwise
    $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
  },
  
  applyConditionalRequired: function() {
    // find each input that may be hidden or not
    $(".require-if-active").each(function() {
      var el = $(this);
      // find the pairing radio or checkbox
      if ($(el.data("require-pair")).is(":checked")) {
        // if its checked, the field should be required
        el.prop("required", true);
      } else {
        // otherwise it should not
        el.prop("required", false);
      }
    });
  }

};

FormStuff.init();
</script>

<script type=text/javascript>
  $('#member1').change(function(){
  var member1ID = $(this).val();  
  if(member1ID){
    $.ajax({
      type:"GET",
      url:"{{url('getUsers')}}?departments_id="+member1ID,
      success:function(res){        
      if(res){
        $("#member1").empty();
        $("#member1").append('<option>Wybierz usea</option>');
        $.each(res,function(key,value){
          $("#member1").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#member1").empty();
      }
      }
    });
  }else{
    $("#member1").empty();
    $("#city").empty();
  }   
  });
  
</script>


@if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
    
<style>
  .reveal-if-active {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transform: scale(0.8);
  transition: 0.5s;
  opacity: 1;
  max-height: 100px;
  overflow: visible;
  padding: 10px 20px;
  transform: scale(1);
  }

</style>

<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>


<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
        <div class="card">
            <!-- Form -->
            @if(count($errors)>0)
           <ul>
      @foreach($errors->all() as $error)
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    </ul>
    @endif
            <form class="form-example" action="/groupsubmit" method="POST">
            @csrf
              <div class="card-header">
                <h1><i class="fa fa-plus-circle"></i> Tworzenie grupy</h1>
                <p class="description">Dodaj grupę, wypełniając forumlarz.</p>
                <!-- Input fields -->
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label for="tresc">Opis grupy:</label>
                    <textarea  height="100%" class="form-control" id="group_desc" placeholder="Podaj nazwe lub opis grupy..." name="group_desc" autofocus></textarea>
                </div>
                <div class="form-group">
                        <label for="member1" class="control-label col-sm-3 text-nowrap">Członek 1:</label>
                        <select name="member1" id="member1">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <label for="member2" class="control-label col-sm-3 text-nowrap">Członek 2:</label>
                        <select name="member2" id="member2">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="member3" class="control-label col-sm-3 text-nowrap">Członek 3:</label>
                        <select name="member3" id="member3">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="member4" class="control-label col-sm-3 text-nowrap">Członek 4:</label>
                        <select name="member4" id="member4">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select>
                        </div>
                </div>
             
                <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                        <td><select name="member1" id="member1">
                        <option value="" selected disabled>Wybierz użytkownika</option>
                        @foreach($users as $item)
                       <option value="{{$item->id}}"> {{$item->name}}</option>
                       @endforeach
                        </select></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
                </div>
                <p align="right">
                <button type="submit" class="btn btn-default">Dodaj grupę</button>
                </p>
                <!-- End input fields -->
                </div>
                </form>
                </div>
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

     
    </section>
    <!-- /.content -->
    
    @endsection
