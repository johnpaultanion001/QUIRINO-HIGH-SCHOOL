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
                  <h6>CLASS {{$classes->section ?? ''}}</h6>
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
  </div>
      @section('footer')
          @include('../partials.admin.footer')
      @endsection
  </div>
@endsection



@section('script')
<script>
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

              console.log(data.success);
          }
      })
  });
</script>
@endsection
