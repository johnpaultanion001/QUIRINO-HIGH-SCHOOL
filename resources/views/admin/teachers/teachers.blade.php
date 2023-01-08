@extends('../layouts.admin')
@section('sub-title','MANAGE TEACHERS')

@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('navbar')
    @include('../partials.admin.navbar')
@endsection

@section('content')
<div class="container-fluid py-4">
  <div class="row mt-4">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-md-10">
                  <h6>MANAGE TEACHER</h6>
              </div>
              <div class="col-md-2">
                  <button class="btn btn-primary btn-sm" id="create_record">
                    ADD NEW TEACHER
                  </button>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Teacher Name</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($teachers as $teacher)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$teacher->id}}" class="btn btn-primary btn-sm view" >
                              VIEW/EDIT
                            </button>
                            <button id="{{$teacher->id}}" class="btn btn-danger btn-sm remove" >
                              REMOVE
                            </button>
                          </div>
                        </div>
                        
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$teacher->id ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$teacher->name ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$teacher->created_at->format('M j , Y h:i A') ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
      @section('footer')
          @include('../partials.admin.footer')
      @endsection
  </div>
@endsection

@section('rightbar')
<div class="fixed-plugin">
  <div class="card shadow-lg">
    <div class="card-header pb-0 pt-3 ">
      
      <div class="float-end mt-2">
        <button class="btn btn-link text-danger p-0 fixed-plugin-close-button">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <br>
      <div class="float-start">
        <h6 class="text-uppercase">TEACHER INFORMATION</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
        <form method="post" id="myForm" class="contact-form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label text-uppercase" >Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-name"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Contact Number <span class="text-danger">*</span></label>
                    <input type="number" name="contact_number" id="contact_number" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-contact_number"></strong>
                    </span>
                </div>
                <div class="form-group">
                <label class="control-label text-uppercase" >Gender <span class="text-danger">*</span></label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Profession <span class="text-danger">*</span></label>
                    <input type="text" name="profession" id="profession" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-profession"></strong>
                    </span>
                </div>
               
                <input type="hidden" name="id" id="id"  />
                <input type="hidden" name="action" id="action" value="ADD"  />

                <div class="card-footer text-center">
                    <input type="submit" name="action_button" id="action_button" class="text-uppercase btn-wd btn btn-primary" value="Submit" />
                </div>
            </div>
            
        </form>
    </div>
  </div>
</div>
@endsection 

@section('script')

<script>
  $(document).ready(function () {
        $('.table').DataTable({
            'columnDefs': [{ 'orderable': false, 'targets': [0] }],
        });
  });
  
  $(document).on('click', '#create_record', function(){
      $('#name').focus();
      $('#action').val('ADD');
      $('.form-control').removeClass('is-invalid')
      $('#myForm')[0].reset();
      var fixedPlugin = document.querySelector('.fixed-plugin');
      if (!fixedPlugin.classList.contains('show')) {
          fixedPlugin.classList.add('show');
      } else {
          fixedPlugin.classList.remove('show');
      }
  });

  $(document).on('click', '.view', function(){
      var id = $(this).attr('id');
      $('#action').val('EDIT');
      $('#id').val(id);

      $.ajax({
          url :"/admin/teachers/"+id+"/edit",
          dataType:"json",
          beforeSend:function(){
              $("#action_button").attr("disabled", true);
          },
          success:function(data){
              $("#action_button").attr("disabled", false);
              console.log(data.result);
              $.each(data.result, function(key,value){
                  if(key == $('#'+key).attr('id')){
                      $('#'+key).val(value)
                  }
              })
          }
      })

      var fixedPlugin = document.querySelector('.fixed-plugin');

      if (!fixedPlugin.classList.contains('show')) {
          fixedPlugin.classList.add('show');
      } else {
          fixedPlugin.classList.remove('show');
      }
  });

  $('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var url = "/admin/teachers";
    var method = "POST";

    if($('#action').val() == 'EDIT'){
      var id = $('#id').val();
          url = "/admin/teachers/" + id;
          method = "PUT";
    }
    $.ajax({
        url: url,
        method: method,
        data: $(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
        },
        success:function(data){
            $("#action_button").attr("disabled", false);

            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
           if(data.success){
                $.confirm({
                    title: data.success,
                    content: "",
                    type: 'green',
                    buttons: {
                        confirm: {
                            text: '',
                            btnClass: 'btn-green',
                            keys: ['enter', 'shift'],
                            action: function(){
                                location.reload();
                            }
                        },
                    }
                });
            }
           
        }
    });
  });

  $(document).on('click', '.remove', function(){
  var id = $(this).attr('id');
    $.confirm({
        title: 'Confirmation',
        content: 'You really want to remove this record?',
        type: 'red',
        buttons: {
            confirm: {
                text: 'confirm',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function(){
                    return $.ajax({
                        url:"/admin/teachers/"+id,
                        method:'DELETE',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        dataType:"json",
                        beforeSend:function(){
                          $(".remove").attr("disabled", true);
                        },
                        success:function(data){
                          $(".remove").attr("disabled", false);
                          
                            if(data.success){
                              $.confirm({
                                title: 'Confirmation',
                                content: data.success,
                                type: 'green',
                                buttons: {
                                        confirm: {
                                            text: 'confirm',
                                            btnClass: 'btn-blue',
                                            keys: ['enter', 'shift'],
                                            action: function(){
                                                location.reload();
                                            }
                                        },
                                        
                                    }
                                });
                            }
                        }
                    })
                }
            },
            cancel:  {
                text: 'cancel',
                btnClass: 'btn-red',
                keys: ['enter', 'shift'],
            }
        }
    });
  });
</script>


@endsection
