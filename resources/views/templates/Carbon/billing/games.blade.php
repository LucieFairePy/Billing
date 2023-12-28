  @include('templates.Carbon.inc.header')
  @include('templates.Carbon.inc.navbar', ['active_nav' => 'billing'])
  <div class="grey-bg container-fluid">
    @extends('templates/wrapper', [
    'css' => ['body' => 'bg-neutral-800'],
    ])
  @section('container')

  
  <div class="pt-5">
        <div class="row justify-content-center">

          @if ($games->isEmpty()) 
          <div class="alert alert-danger" role="alert"> <span class="badge badge-danger">{!! Bill::lang()->get('error') !!}</span>
            There are no games available @if(Auth::user()->root_admin)<a href="{{ route('admin.billing.games') }}" class="btn btn-primary btn-sm ml-2">Create Game</a>@endif
          </div>
          @endif

        @foreach($games as $key => $game)
          <div class="col-md-4 mb-5">
              <div class="card-body games-card" style="border-radius: 10px">
                <h1 class="card-title"><strong>{{ $game->label }}</strong></h1>
                <img style="width: 100px;" src="{{ $game->icon }}" alt="Card image cap">
                <a href="{{ route('billing.plans', ['game' => $game->link]) }}" class="btn btn-primary mt-4">{!! Bill::lang()->get('view_plan') !!}</a>
              </div>
          </div>

        @endforeach

        </div>
      </div>
  
  @endsection
  </div>
  @include('templates.Carbon.inc.style')
  @include('templates.Carbon.inc.script')