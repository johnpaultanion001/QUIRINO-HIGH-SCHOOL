@extends('../layouts.admin')
@section('sub-title','MANAGE TEACHERS ACCOUNT')

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
                  <h6 class="text-uppercase">CLASS {{$classes->section ?? ''}}</h6>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Parent Name / Email</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Student Name</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Last Attendance</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($classes->students()->get() as $student)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                                @php
                                  $already_attended = $student->student->attendances()->where('student_id',$student->student->id)->latest()->first();
                                  $already_attended = $already_attended->created_at ?? Carbon\Carbon::now()->subDays(30);
                                  $date_today = Carbon\Carbon::now();
                                @endphp
                                @if($already_attended->format('Y-m-d')  == $date_today->format('Y-m-d'))
                                  <button class="btn btn-secondary btn-sm" >
                                    ALREADY ATTENDED
                                  </button>
                                @else
                                  <button student_id="{{$student->student->id}}" teacher_id="{{auth()->user()->teacher->id}}" class_id="{{$student->class_id}}" class="btn btn-success btn-sm attend" >
                                    PRESENT
                                  </button>
                                @endif
                          
                            
                            <button id="{{$student->student->id}}" class="btn btn-danger btn-sm notif" >
                              NOTIF PARENT
                            </button>
                          </div>
                        </div>
                        
                      </td>
                      
                              <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                              @foreach($student->student->parents()->get() as $parent1)
                                {{$parent1->parent->name ?? ''}} / {{$parent1->parent->user->email ?? ''}} <br>
                              @endforeach
                            </h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$student->student->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                              @foreach($student->student->attendances()->get() as $attendance)
                                {{$attendance->created_at}}
                              @endforeach
                            </h6>
                         
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
                  <h6 class="text-uppercase">ATTENDANCE FOR TODAY</h6>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Student Name</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Date & Time</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($attendances_fortoday as $attendance)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                               
                                  <button id="{{$attendance->id}}" class="btn btn-danger btn-sm remove" >
                                    REMOVE
                                  </button>
                          </div>
                        </div>
                        
                      </td>
                      
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->student->name}}</h6>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->created_at}}</h6>
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
        <h6 class="text-uppercase">NOTIFICATION INFORMATION</h6>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="overflow-auto">
        <form method="post" id="myForm" class="contact-form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label text-uppercase" >Parent Email: <span class="text-danger">*</span></label>
                    <input type="email" name="parent_email" id="parent_email" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-parent_email"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Message: <span class="text-danger">*</span></label>
                    <textarea name="message" id="message" class="form-control"></textarea>
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-message"></strong>
                    </span>
                </div>
               

                <div class="card-footer text-center">
                    <input type="hidden" name="student_id" id="student_id" readonly class="form-control" />

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

   $(document).on('click', '.attend', function(){
    var teacher_id = $(this).attr('teacher_id');
    var student_id = $(this).attr('student_id');
    var class_id = $(this).attr('class_id');

    console.log(teacher_id + student_id + class_id)

    $.ajax({
          url :"/teacher/classes/"+teacher_id+"/"+student_id+"/"+class_id+"/attendance",
          dataType:"json",
          beforeSend:function(){
              $(".attend").attr("disabled", true);
          },
          success:function(data){
              $(".attend").attr("disabled", false);
              if(data.success){
                location.reload();
              }
              console.log(data.success);
          }
      })
  });

  $(document).on('click', '.notif', function(){
      $('.form-control').removeClass('is-invalid')
      $('#myForm')[0].reset();
      $('#student_id').val($(this).attr('id'));
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
    var url = "/teacher/notification";
    var method = "GET";

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
                        url:"/teacher/attendance/"+id,
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
