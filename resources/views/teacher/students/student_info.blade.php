@extends('../layouts.admin')
@section('sub-title','MANAGE STUDENTS')

@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('navbar')
    @include('../partials.admin.navbar')
@endsection

@section('content')
<div class="container-fluid py-4">
  <div class="row mt-4">
      <div class="col-4">
        <div class="card">
            <div class="card-body">
            <div class="table-responsive p-0">
              <table class="align-items-center mb-0" style="width: 100%;">
                <tbody>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">LRN</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->lrn ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Student Name</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->name ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Grade & Section</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->grade_section ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                    </tr>
                   
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Address</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->address ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                    </tr>
                  
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Mobile Number</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->mobile_number ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Mother Name</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->mother_name ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Cellphone Number</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->mother_number ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Father Name</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->father_name ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Cellphone Number</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->father_number ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>
      <div class="col-8">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-md-10">
                  <h6>All Student Information</h6>
              </div>
              <div class="col-md-2">
                  <button class="btn btn-dark btn-sm" id="create_record">
                    ADD RECORD
                  </button>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="align-items-center mb-0 table" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Activity</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Quiz</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Performance</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Exam</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Total Grade</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($student->activities()->get() as $act)
                  <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button id="{{$act->id}}" class="btn btn-primary btn-sm view" >
                              VIEW/EDIT
                            </button>
                            <button id="{{$act->id}}" class="btn btn-danger btn-sm remove" >
                              REMOVE
                            </button>
                          </div>
                        </div>
                        
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$act->quiz ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$act->performance ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$act->exam ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$act->total_grade ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$act->total_grade ?? ''}}</h6>
                         
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
                    <label class="control-label text-uppercase" >Activity <span class="text-danger">*</span></label>
                    <input type="text" name="activity" id="activity" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-activity"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Quiz <span class="text-danger">*</span></label>
                    <input type="text" name="quiz" id="quiz" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-quiz"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Performance <span class="text-danger">*</span></label>
                    <input type="text" name="performance" id="performance" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-performance"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Exam <span class="text-danger">*</span></label>
                    <input type="text" name="exam" id="exam" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-exam"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Total Grade <span class="text-danger">*</span></label>
                    <input type="text" name="total_grade" id="total_grade" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-total_grade"></strong>
                    </span>
                </div>

                <input type="hidden" name="id" id="id"  />
                <input type="hidden" name="action" id="action" value="ADD"  />
                <input type="hidden" name="student_id" id="student_id" value="{{$student->id ?? ''}}"  />

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
          url :"/teacher/activity/"+id+"/edit",
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
    var url = "/teacher/activity";
    var method = "POST";

    if($('#action').val() == 'EDIT'){
      var id = $('#id').val();
          url = "/teacher/activity/" + id;
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
                        url:"/teacher/activity/"+id,
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
