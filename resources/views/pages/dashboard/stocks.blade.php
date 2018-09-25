@extends('layouts.dashboard')
@section('title', 'Farmties | My Stock')
@section('header')

<div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
	<h3 class="content-header-title mb-0 d-inline-block">My Stocks</h3>
	<div class="row breadcrumbs-top d-inline-block">
		<div class="breadcrumb-wrapper col-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active">My Stocks</li>
			</ol>
		</div>
	</div>
</div>

<div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
	<div class="btn-group float-md-right">
		<a class="btn-gradient-secondary btn-sm white" href="{{ route('user.dashboard') }}">Trade Commodities</a>
	</div>
</div>
@stop

@section('extra-plus')
	<div class="content-detached content-left">
@stop

@section('content')
{{--  
<section class="card pull-up">
    <div class="card-content">
        <div class="card-body">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-3 col-xl-2 col-12 d-none d-md-block">
                        <div class="crypto-circle rounded-circle">
                            <i class="icon-layers"></i>
                        </div>
                    </div>
                    <div class="col-md-5 col-xl-6 col-12">
                        <p><strong>Your balance:</strong></p>
                        <h1>3,458.88 CIC</h1>
                        <p class="mb-0">Welcome bonus <strong>+30%</strong> expires in 21 days.</p>
                    </div>
                    <div class="col-md-4 col-xl-4 col-12 d-none d-md-block text-right">
                        <button type="button" class="btn-gradient-secondary mt-2">Withdraw <i class="la la-angle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<h3 class="mt-4">Buy tokens</h3>
<p>To buy tokens, transfer ETH or BTC to your personal deposit address:</p>
--}}

@foreach($stocks as $stock)
@if($stock->order->paid === 1)
<!-- Bitcoin -->
<section class="card pull-up">
    <div class="card-content">
        <div class="card-body">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-3 col-xl-2 col-12 d-none d-md-block">
                        <div class="crypto-circle rounded-circle">
                            <img src="{{ asset('images/commodities/'.$stock->commodity->path) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-5 col-xl-7 col-12">
                        <p><strong>{{ $stock->commodity->name }}</strong></p>
                        <h5>Current Price: {{ nairafy($stock->commodity->prices->last()->price) }}</h5>
                        <button type="button" class="btn btn-warning round mr-1 mb-0 view_sale" id="{{ $stock->id }}">
                            Sell
                        </button>
                    </div>
                    <div class="col-md-4 col-xl-3 col-12 d-none d-md-block">
                        <i class="icon-layers"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Bitcoin -->
@endif
@endforeach
@stop
@section('extras')
	</div>
	<div class="sidebar-detached sidebar-right" ="">
		<div class="sidebar">
			<div class="sidebar-content">
				<!-- token sale progress -->
				<div class="card">
					<div class="card-header">
						<h6 class="card-title text-center">Token sale progress</h6>            
					</div>
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
						        <span class="float-left">Distributed <br/> <strong>6,235,125 CIC</strong></span>
						        <span class="float-right text-right">Contributed  <br/> <strong>5478 ETH | 80 BTC</strong></span>
						    </div>
						</div>
					</div>
				</div>
				<!--/ token sale progress -->

				<!-- token sale progress -->
				<div class="card">
				<div class="card-header">
				<h6 class="card-title text-center">Calculator</h6>            
				</div>
				<div class="card-content collapse show">
				<div class="card-body">
				    <form class="form form-horizontal">
				        <div class="form-body">    
				            <div class="form-group row">
				                <fieldset class="col-12">
				                  <div class="input-group">
				                    <input type="text" class="form-control" placeholder="ETH" aria-describedby="basic-addon4">
				                    <div class="input-group-append">
				                      <span class="input-group-text" id="basic-addon4"><i class="cc ETH-alt"></i></span>
				                    </div>
				                  </div>
				                </fieldset>
				            </div>
				            <div class="form-group row">
				                <fieldset class="col-12">
				                  <div class="input-group">
				                    <input type="text" class="form-control" placeholder="BTC" aria-describedby="basic-addon4">
				                    <div class="input-group-append">
				                      <span class="input-group-text" id="basic-addon4"><i class="cc BTC-alt"></i></span>
				                    </div>
				                  </div>
				                </fieldset>
				            </div>
				            <div class="form-group row">
				                <fieldset class="col-12">
				                  <div class="input-group">
				                    <input type="text" class="form-control" placeholder="USD" aria-describedby="basic-addon4">
				                    <div class="input-group-append">
				                      <span class="input-group-text" id="basic-addon4"><i class="la la-dollar"></i></span>
				                    </div>
				                  </div>
				                </fieldset>
				            </div>
				            <div class="form-group row">
				                <fieldset class="col-12">
				                  <p class="mb-0">=</p>
				                </fieldset>
				            </div>
				            <div class="form-group row">
				                <fieldset class="col-12">
				                  <div class="input-group">
				                    <input type="text" class="form-control" placeholder="CIC" aria-describedby="basic-addon4">
				                    <div class="input-group-append">
				                      <span class="input-group-text" id="basic-addon4"><i class="icon-layers"></i></span>
				                    </div>
				                  </div>
				                </fieldset>
				            </div>
				        </div>
				    </form>
				</div>
				</div>
				</div>
				<!--/ token sale progress -->
			</div>
	    </div>
	</div>
@stop

@section('modals')
  @include('pages.modals.sale')
@stop

@section('scripts')

    <script>
        var token = '{{ csrf_token() }}';
        var url = '{{ route('calculate.sale') }}';
        var saleUrl = '{{ route('sale.figure') }}';
    </script>

@stop