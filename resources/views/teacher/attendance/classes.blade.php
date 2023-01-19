@extends('../layouts.admin')
@section('sub-title','OVERALL ATTENDANCE')

@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('navbar')
    @include('../partials.admin.navbar')
@endsection

@section('content')
<div class="container-fluid py-4">
  <div class="row">
      <div class="col-xl-12">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-12 row">
                  <div class="numbers row">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Manage attendance</p>
                      <h5 class="font-weight-bolder">
                         Select a class
                          </h5>
                    @foreach($classes as $class)
                      <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4 mt-2">
                            <div class="card bg-primary">
                              <div class="card-body p-3">
                                <div class="row">
                                  <div class="col-8">
                                    <div class="numbers">
                                      <div class="row ">
                                        <div class="col-md-6 d-flex justify-content-center mt-2">
                                          <i class="fa fa-book me-sm-1 text-white" style="font-size: 50px;"></i>
                                        </div>
                                        <div class="col-md-6 text-white mx-auto">
                                         
                                          <p class="text-sm mb-0 text-uppercase">Class Section: <br> {{$class->classes->section ?? ''}}</p>
                                          <p class="text-sm mb-0 text-uppercase">Total Student: {{$class->classes->students()->count() ?? ''}}</p>
                                          @if($class->isAdvisory == true)
                                            <h6 class="text-white m-2"> - Advisory</h6>
                                            @else
                                            <br>
                                            
                                            @endif
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer d-flex justify-content-center">
                                <a href="/teacher/classes_attendance/{{$class->classes->id}}/attendance" class="btn-dark btn-sm">View Attendance</a>
                              </div>
                            </div>
                      </div>
                    @endforeach
                  </div>
                </div>
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
 
</script>


@endsection
