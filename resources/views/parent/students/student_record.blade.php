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
      <div class="col-md-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                <div class="col-md-10">
                    <h6>STUDENT INFORMATION</h6>
                </div>
                </div>
            </div>
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
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-md-10">
                  <h6>STUDENT GRADE</h6>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="align-items-center mb-0 table" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Subject</th>
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
                            <h6 class="mb-0 text-sm">{{$act->subject->subject_title ?? ''}}</h6>
                         
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
  <div class="row mt-4">
      <div class="col-md-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                <div class="col-md-10">
                    <h6>STUDENT CLASS INFORMATION</h6>
                </div>
                </div>
            </div>
            <div class="card-body">
                @forelse($student->classes()->get() as $class)
                  <div class="card bg-primary">
                    <div class="card-body text-white">
                        <p>CLASS SECTION: {{$class->class->section ?? ''}}</p>
                        <p>
                          CLASS TEACHER: 
                            @foreach($class->class->teachers()->get() as $teacher)
                            {{$teacher->teacher->name}}
                            @endforeach
                        </p>
                    </div>
                  </div>
                @empty
                      <p>NO RESULTS </p>
                @endforelse
            </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-md-10">
                  <h6>STUDENT ATTENDANCE</h6>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="table-responsive p-0">
              <table class="align-items-center mb-0 table" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Class</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Teacher</th>
                    <th class="text-uppercase text-xxs text-dark font-weight-bolder opacity-7">Date Attendance</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($student->attendances()->get() as $attendance)
                  <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->class->section ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->teacher->name ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->performance ?? ''}}</h6>
                         
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$attendance->created_at->format('M j , Y h:i A') ?? ''}}</h6>
                         
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

@endsection 

@section('script')

<script>
   $(document).ready(function () {
        $('.table').DataTable({
            'columnDefs': [{ 'orderable': false, 'targets': [0] }],
        });
  });

</script>


@endsection
