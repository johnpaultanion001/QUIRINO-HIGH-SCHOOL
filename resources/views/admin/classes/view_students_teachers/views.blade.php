@extends('../layouts.admin')
@section('sub-title','MANAGE CLASS')

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
                  <h6 class="text-uppercase">SECTION: {{$class->section}}</h6>
                  <h6>ALL TEACHER</h6>
              </div>
              <div class="col-md-2">
                  <button class="btn btn-dark btn-sm" id="create_teacher">
                    ADD TEACHER
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
                  </tr>
                </thead>
                <tbody>
                  @foreach($class->teachers()->get() as $data)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$data->id}}" role="TEACHER" class="btn btn-danger btn-sm remove" >
                              REMOVE
                            </button>
                          </div>
                        </div>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$data->id}}" class="btn  {{$data->isAdvisory == true ? 'btn-success':'btn-secondary'}} btn-sm advisory" >
                              ADVISORY
                            </button>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$data->id ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$data->teacher->name ?? ''}}</h6>
                         
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
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-md-10">
                  <h6>ALL STUDENTS</h6>
              </div>
              <div class="col-md-2">
                  <button class="btn btn-dark btn-sm" id="create_student">
                    ADD STUDETS
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
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Student Name</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($class->students()->get() as $data)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$data->id}}" role="STUDENT" class="btn btn-danger btn-sm remove" >
                              REMOVE
                            </button>
                          </div>
                        </div>
                        
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$data->id ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$data->student->name ?? ''}}</h6>
                         
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
        <h6 class="text-uppercase title_select"></h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
        <form method="post" id="myForm" class="contact-form">
            @csrf
            <div class="card-body">
                <div class="form-group select_teacher">
                    <label class="control-label text-uppercase" >Select Teacher <span class="text-danger">*</span></label>
                    <select name="teacher_id" id="teacher_id"class="form-control">
                      @foreach($teachers as $teacher)
                       <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                      @endforeach
                    </select> 
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-teacher_id"></strong>
                    </span>
                </div>

                <div class="form-group select_student">
                    <label class="control-label text-uppercase" >Select Student <span class="text-danger">*</span></label>
                    <select name="student_id" id="student_id"class="form-control">
                      @foreach($students as $student)
                       <option value="{{$student->id}}">{{$student->name}}</option>
                      @endforeach
                    </select> 
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-student_id"></strong>
                    </span>
                </div>
                
               
                <input type="hidden" name="id" id="id"  />
                <input type="hidden" name="action" id="action" value="ADD"  />
                <input type="hidden" name="class_id" id="class_id" value="{{$class->id}}"  />

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
  
  $(document).on('click', '#create_teacher', function(){
      $('#name').focus();
      $('#action').val('TEACHER');
      $('.form-control').removeClass('is-invalid')
      $('#myForm')[0].reset();
      $('.select_student').hide();
      $('.select_teacher').show();
      $('.title_select').text('SELECT TEACHER');

      var fixedPlugin = document.querySelector('.fixed-plugin');
      if (!fixedPlugin.classList.contains('show')) {
          fixedPlugin.classList.add('show');
      } else {
          fixedPlugin.classList.remove('show');
      }
  });

  $(document).on('click', '#create_student', function(){
      $('#name').focus();
      $('#action').val('STUDENT');
      $('.form-control').removeClass('is-invalid')
      $('#myForm')[0].reset();
      $('.select_student').show();
      $('.select_teacher').hide();
      $('.title_select').text('SELECT STUDENT');

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
    var url = "/admin/classes/view/assign";
    var method = "POST";

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
  var role = $(this).attr('role');
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
                        url:"/admin/classes/view/assign/"+id+"/"+role,
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

  $(document).on('click', '.advisory', function(){
  var id = $(this).attr('id');
    $.confirm({
        title: 'Confirmation',
        content: 'Are you sure?',
        type: 'green',
        buttons: {
            confirm: {
                text: 'confirm',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function(){
                    return $.ajax({
                        url:"/admin/classes/advisory/"+id,
                        method:'GET',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        dataType:"json",
                        beforeSend:function(){
                          $(".advisory").attr("disabled", true);
                        },
                        success:function(data){
                          $(".advisory").attr("disabled", false);
                          
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
