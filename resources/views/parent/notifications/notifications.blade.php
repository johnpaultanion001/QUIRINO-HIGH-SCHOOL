@extends('../layouts.admin')
@section('sub-title','Notification')

@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('navbar')
    @include('../partials.admin.navbar')
@endsection

@section('content')
<div class="container-fluid py-4">
<div class="container">
        <div class="title">
            <h3  class="title text-white text-uppercase text-center">All Notifications</h3>
        </div>
        <div class="accordion" id="accordionExample">
          @foreach($notifications as $notif)
            <div class="card">
              <div class="card-header" id="heading{{$notif->id}}">
                <h2 class="mb-0">
                <i class="fa fa-bell me-sm-1 text-dark" style="font-size: 50px;"></i>
                  <button class="btn btn-link text-dark h6" type="button" data-toggle="collapse" data-target="#collapse{{$notif->id}}" aria-expanded="true" aria-controls="collapse{{$notif->id}}">
                    {{$notif->student->name ?? ''}} - {{$notif->created_at->format('M j , Y h:i A') ?? ''}}
                  </button>
                </h2>
              </div>

              <div id="collapse{{$notif->id}}" class="collapse {{$loop->first ? 'show':''}}" aria-labelledby="heading{{$notif->id}}" data-parent="#accordionExample">
                <div class="card-body">
                 {{$notif->message ?? ''}}
                </div>
              </div>
            </div>
            @endforeach
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


</script>


@endsection
