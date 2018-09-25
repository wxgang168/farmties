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

<!-- ICO Token balance & sale progress -->
<div class="row">
  <div class="col-md-8 col-12">
      <h6 class="my-2">ICO Token balance</h6>
      <div class="card pull-up">
          <div class="card-content">
              <div class="card-body">
                  <div class="col-12">
                      <div class="row">
                          <div class="col-md-8 col-12">
                              <p><strong>Your balance:</strong></p>
                              <h1>3,458.88 CIC</h1>
                              <p class="mb-0">Welcome bonus <strong>+30%</strong> expires in 21 days.</p>
                          </div>
                          <div class="col-md-4 col-12 text-center text-md-right">
                              <button type="button" class="btn-gradient-secondary mt-2">Withdraw <i class="la la-angle-right"></i></button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-4 col-12">
      <h6 class="my-2">Token sale progress</h6>
      <div class="card">
          <div class="card-content collapse show">
              <div class="card-body">
                  <div class="font-small-3 clearfix">
                      <span class="float-left">$0</span>
                      <span class="float-right">$5M</span>
                  </div>
                  <div class="progress progress-sm my-1 box-shadow-2">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="font-small-3 clearfix">
                      <span class="float-left">Distributed <br> <strong>6,235,125 CIC</strong></span>
                      <span class="float-right text-right">Contributed  <br> <strong>5478 ETH | 80 BTC</strong></span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ ICO Token balance & sale progress -->
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
                              <th class="border-top-0">Amount</th>
                              <th class="border-top-0">Currency</th>
                              <th class="border-top-0">Currency</th>
                              <th class="border-top-0">Tokens (CIC)</th>
                              <th class="border-top-0">Details</th>
                              <th class="border-top-0"></th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                              <td class="text-truncate"><a href="#">2018-01-03</a></td>
                              <td class="text-truncate">
                                  <a href="#" class="mb-0 btn-sm btn btn-outline-success round">Deposit</a>
                              </td>
                              <td class="text-truncate p-1">5.34111</td>
                              <td>
                                  <i class="cc ETH-alt"></i> ETH
                              </td>
                              <td>-</td>
                              <td class="text-truncate">Deposit to your Balance</td>
                              <td><i class="la la-thumbs-up warning float-right"></i></td>
                          </tr>
                          <tr>
                              <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                              <td class="text-truncate"><a href="#">2018-01-03</a></td>
                              <td class="text-truncate">
                                  <a href="#" class="mb-0 btn-sm btn btn-outline-success round">Deposit</a>
                              </td>
                              <td class="text-truncate p-1">5.34111</td>
                              <td>
                                  <i class="cc ETH-alt"></i> ETH
                              </td>
                              <td>3,258</td>
                              <td class="text-truncate">Tokens Purchase</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td class="text-truncate"><i class="la la-dot-circle-o warning font-medium-1 mr-1"></i> in Process</td>
                              <td class="text-truncate"><a href="#">2018-01-21</a></td>
                              <td class="text-truncate">
                                  <a href="#" class="mb-0 btn-sm btn btn-outline-warning round">Referral</a>
                              </td>
                              <td class="text-truncate p-1">-</td>
                              <td>-</td>
                              <td>200.88</td>
                              <td class="text-truncate">Referral Promo Bonus</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i> Pending</td>
                              <td class="text-truncate"><a href="#">2018-01-25</a></td>
                              <td class="text-truncate">
                                  <a href="#" class="mb-0 btn-sm btn btn-outline-danger round">Withdrawal</a>
                              </td>
                              <td class="text-truncate p-1">-</td>
                              <td>-</td>
                              <td>-3,458.88</td>
                              <td class="text-truncate">Tokens withdrawn</td>
                              <td><i class="la la-dollar warning float-right"></i></td>
                          </tr>
                          <tr>
                              <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                              <td class="text-truncate"><a href="#">2018-01-28</a></td>
                              <td class="text-truncate">
                                  <a href="#" class="mb-0 btn-sm btn btn-outline-danger round">Deposit</a>
                              </td>
                              <td class="text-truncate p-1">0.8791</td>
                              <td><i class="cc BTC-alt"></i> BTC</td>
                              <td>--</td>
                              <td class="text-truncate">Deposit to your Balance</td>
                              <td><i class="la la-thumbs-up warning float-right"></i></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ Recent Transactions -->
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