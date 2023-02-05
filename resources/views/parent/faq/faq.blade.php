@extends('../layouts.admin')
@section('sub-title','FAQ')

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
              <h3  class="title text-white text-uppercase text-center">Frequently Asked Questions</h3>
          </div>
  <div class="card p-2"   style="border: #111 solid 1px;">
    <div class="card-body justify-content-end">
  
      <div class="card mb-3 chat1" style="max-width: 30rem; border: #111 solid 1px; cursor: pointer;">
        <div class="card-body text-secondary">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card mb-3 chat2" style="max-width: 30rem; border: #111 solid 1px; cursor: pointer;">
        <div class="card-body text-secondary">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card mb-3 chat3" style="max-width: 30rem; border: #111 solid 1px; cursor: pointer;">
        <div class="card-body text-secondary">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
    <div class="input-group mb-3"  style=" border: #111 solid 1px;">
        <input type="text" class="form-control" placeholder="Choose an option" aria-label="Username" readonly>
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">SEND</span>
        </div>
      </div>
  </div>
</div>
   <!-- <div class="container">
         
          <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-dark h6" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Collapsible Group Item #1
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-dark collapsed h6" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Collapsible Group Item #2
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-dark collapsed h6" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Collapsible Group Item #3
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-dark collapsed h6" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                      Collapsible Group Item #4
                    </button>
                  </h2>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-dark collapsed h6" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseThree">
                      Collapsible Group Item #5
                    </button>
                  </h2>
                </div>
                <div id="collapse5" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
          </div>
  </div> -->
      @section('footer')
          @include('../partials.admin.footer')
      @endsection
  </div>
@endsection

@section('rightbar')

@endsection 

@section('script')
<script>
    $(document).on('click', '.chat1', function () {
        var html = `
          <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <div class="card mb-3  mr-auto" style="max-width: 30rem; border: blue solid 1px; cursor: pointer;">
                  <div class="card-body text-secondary">
                    <p class="card-text">Answer 1</p>
                  </div>
                </div>
            </div>
          </div>
      `;
      
        $(this)
            .parent()
            .append(html);
    
    });
    $(document).on('click', '.chat2', function () {
        var html = `
          <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <div class="card mb-3  mr-auto" style="max-width: 30rem; border: blue solid 1px; cursor: pointer;">
                  <div class="card-body text-secondary">
                    <p class="card-text">Answer 2</p>
                  </div>
                </div>
            </div>
          </div>
      `;
      
        $(this)
            .parent()
            .append(html);
    
    });
    $(document).on('click', '.chat3', function () {
        var html = `
          <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <div class="card mb-3  mr-auto" style="max-width: 30rem; border: blue solid 1px; cursor: pointer;">
                  <div class="card-body text-secondary">
                    <p class="card-text">Answer 3</p>
                  </div>
                </div>
            </div>
          </div>
      `;
      
        $(this)
            .parent()
            .append(html);
    
    });

</script>


@endsection
