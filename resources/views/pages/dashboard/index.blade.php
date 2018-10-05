@extends('layouts.dashboard')
@section('content')
<!-- ICO Token &  Distribution-->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-content">
        <div class="table-responsive">
          <table class="table table-hover table-xl mb-0">
            <thead>
              <th>Date</th>
              <th>Commodities</th>
              <th colspan="4" style="text-align: center;">Prices (Current Price in Green)</th>
            </thead>
            <tbody>
              @foreach($commodities as $commodity)
                <tr>
                  <td>{{ Carbon\Carbon::today()->format('d M, Y') }}</td>
                  <td>{{ $commodity->name }}</td>
                  @foreach($commodity->prices->sortByDesc('id')->take(4) as $price)
                    @if($commodity->prices->last()->price === $price->price)
                      <td style="color: #27ae60 !important;">{{ nairafy($price->price)}}</td>
                    @else
                      <td>{{ nairafy($price->price)}}</td>
                    @endif
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ ICO Token &  Distribution-->
<div class="row">
  @foreach($commodities as $commodity)
  <div class="col-md-4 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title text-center">{{ $commodity->name }}</h6>            
        </div>
        <div class="card-content collapse show">
            <div class="card-body">

                <div class="text-center row clearfix mb-2">
                  <div class="col-12">
                    <div class="bg-circ-img" style="border-radius: 50%; overflow: hidden; height: 80%; width: 50%; margin: auto;">
                    	<img src="{{ asset('images/commodities/'.$commodity->path) }}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <h3 class="text-center">{{ nairafy($commodity->prices->last()->price) }} / MT</h3>
            </div>
            <div class="table-responsive">
                  <table class="table table-de mb-0">                    
                    <tbody>
                      <tr>
                        <td>Metric Tone Size</td>
                        <td><i class="icon-layers"></i> 1000 KG</td>
                      </tr>
                      <tr>
                        <td>Storage Fee / Month</td>
                        <td><i class="icon-layers"></i> 500 NGN</td>                        
                      </tr>
                      <tr>
                        <td colspan="2" style="text-align: center;">
                            
                            <button type="button" id="{{ $commodity->id }}" class="btn-gradient-secondary view_commodity">Trade Commodity</button>

                        </td>                        
                      </tr>                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
  </div>
  @endforeach
</div>


@if($orders->count() > 0)
<!-- Recent Transactions -->
<div class="row">
  <div id="recent-transactions" class="col-12">
      <h6 class="my-2">Recent Transactions</h6>
      <div class="card">
          <div class="card-content">
              <div class="table-responsive">
                  <table id="recent-orders" class="table table-hover table-xl mb-0">
                      <thead>
                          <tr>
                              <th class="border-top-0">Status</th>
                              <th class="border-top-0">Date</th>
                              <th class="border-top-0">Type</th>
                              <th class="border-top-0">Amount</th>
                              <th class="border-top-0">OrderID</th>
                              <th class="border-top-0"></th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach($orders as $order)
                          <tr>
                              <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                              <td class="text-truncate"><a href="#">{{ $order->verification->created_at->format('d M, Y') }}</a></td>
                              <td class="text-truncate">
                                  <a href="#" class="mb-0 btn-sm btn btn-outline-success round">{{ $order->type }}</a>
                              </td>
                              <td class="text-truncate p-1">{{ nairafy($order->total) }}</td>
                              <td>
                                  {{ $order->transID }}
                              </td>
                              <td><i class="la la-thumbs-up warning float-right"></i></td>
                          </tr>
                          @endforeach

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ Recent Transactions -->
@endif
@stop
@section('modals')
  @include('pages.modals.stock')
@stop

@section('scripts')
<script>

	var url = '{{ route('display.commodity') }}';
	var cart = '{{ route('cart.store') }}';
	var cartUrl = '{{ route('update.values') }}'; // var for CartController to update figures
	var token = '{{ csrf_token() }}';
  var basket = '{{ route('cart.index') }}';


</script>
@stop