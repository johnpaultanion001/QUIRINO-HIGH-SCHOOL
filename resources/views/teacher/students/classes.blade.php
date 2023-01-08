@extends('../layouts.admin')
@section('sub-title','ALL CLASSES')

@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('navbar')
    @include('../partials.admin.navbar')
@endsection

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-10">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">ALL CLASSES</p>
                      <h5 class="font-weight-bolder">
                         Select a class
                          </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    @foreach($classes as $class)
        
          <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4 mt-2">
          <a href="/teacher/students/{{$class->classes->id}}/classess">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-8">
                        <div class="numbers">
                          <p class="text-sm mb-0 text-uppercase font-weight-bold">{{$class->classes->section ?? ''}}</p>
                          <h5 class="font-weight-bolder">
                          TOTAL STUDENT: {{$class->classes->students()->count() ?? ''}}
                          
                          </h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
            </div>
        
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
