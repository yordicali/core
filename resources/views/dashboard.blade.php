@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-1">Dashboard</h1>
                <p>Welcome to your dashboard!</p>
            </div>
        </div>
    </div>
      @include('components.tabs', [
    'id' => 'tabs1',
    'slot' => new \Illuminate\Support\HtmlString(
      '<li class="nav-item" role="presentation">
         <button class="nav-link active" id="tab-home" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab">Incio</button>
       </li>'
    )
  ])
@endsection