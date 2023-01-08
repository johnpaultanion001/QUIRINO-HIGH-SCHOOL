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
    @foreach($classes as $class)
    <a href="/teacher/classes_attendance/{{$class->classes->id}}/attendance">
      <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 mt-2">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">{{$class->classes->section ?? ''}}</p>
                      <h5 class="font-weight-bolder">
                      TOTAL STUDENT: {{$class->classes->students()->count() ?? ''}}
                      <br>
                      TOTAL ATTENDANCE: {{$class->classes->attendances()->count() ?? ''}}
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-success shadow-danger text-center rounded-circle">
                      <i class="fa-solid fa-users text-sm opacity-10"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </a>
     
      @endforeach
      
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
