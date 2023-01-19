@extends('../layouts.admin')
@section('sub-title','STUDENT RECORDS')

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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">STUDENTS RECORDS</p>
                    @foreach(auth()->user()->parent->students()->get() as $student)
                      <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4 mt-2">
                            <div class="card bg-primary">
                              <div class="card-body p-3">
                                <div class="row">
                                  <div class="col-8">
                                    <div class="numbers">
                                      <div class="row ">
                                        <div class="col-6 ml-5 col-md-6 d-flex justify-content-center">
                                          <i class="fa fa-user me-sm-1 text-white" style="font-size: 50px;"></i>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-sm text-white mb-0 text-uppercase font-weight-bold">
                                              {{$student->student->name ?? ''}}
                                            </p>
                                            <p class="text-sm text-white mb-0 text-uppercase font-weight-bold">
                                              LRN: {{$student->student->lrn ?? ''}}
                                            </p>
                                        </div>
                                      </div>
                                      
                                      
                                     
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer d-flex justify-content-center mt-4">
                                <a href="/parent/students/{{$student->student->id}}" class="btn btn-dark text-uppercase">VIEW RECORD</a>
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
