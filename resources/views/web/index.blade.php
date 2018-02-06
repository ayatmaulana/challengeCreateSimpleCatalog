@extends('web.parent.index')

@section('content')

<div class="container">
        <div class="card-deck mb-3 text-center">

        @foreach( $data['products'] as $key => $value )
          <div class="card mb-4 box-shadow">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">{{ $value->name }}</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled mt-3 mb-4">
                <li>
                    <img src="{{ $value->thumbnail }}" />
                </li>
              </ul>
              <h1 class="card-title pricing-card-title">$ {{ $value->price_in_dollar }}<small class="text-muted">/ Rp {{ number_format($value->price, 0, ",", ".") }}</small></h1>
              
              @if( !@$data['is_detail_page'] )
              <a href="{{ route('show', $value->id) }}" class="btn btn-lg btn-block btn-raised btn-success">Detail</a>
              @endif
            </div>
          </div>
        @endforeach
          
          
        </div>
  
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
          <div class="row">
            <div class="col-12 col-md">
              <img class="mb-2" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
              <small class="d-block mb-3 text-muted">Ayat Maulana - {{ date('Y') }}</small>
            </div>
            
          </div>
        </footer>
      </div>

@endsection