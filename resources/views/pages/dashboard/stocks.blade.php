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
<div class="row">
@foreach($stocks as $stock)
@if($stock->order->paid === 1)
<!-- Bitcoin -->
	<div class="col-md-6">
	    <div class="card">
	        <div class="card-header">
	            <h6 class="card-title text-center">{{ $stock->commodity->name }}</h6>            
	        </div>
	        <div class="card-content collapse show">
	            <div class="card-body">

	                <div class="text-center row clearfix mb-2">
	                  <div class="col-12">
	                    <div class="bg-circ-img" style="border-radius: 50%; overflow: hidden; height: 80%; width: 50%; margin: auto;">
	                    	<img src="{{ asset('images/commodities/'.$stock->commodity->path) }}" alt="" class="img-fluid">
	                    </div>
	                  </div>
	                </div>
	                <h3 class="text-center">Current Price: {{ nairafy($stock->commodity->prices->last()->price) }} / MT</h3>
	            </div>
	            <div class="table-responsive">
	                  <table class="table table-de mb-0">                    
	                    <tbody>
	                      <tr>
	                        <td>Purchase Price</td>
	                        <td>{{ nairafy($stock->total) }}</td>
	                      </tr>
	                      <tr>
	                        <td>Available Stock</td>
	                        <td>{{ $stock->qty }}</td>                        
	                      </tr>
	                      <tr>
	                        <td colspan="2" style="text-align: center;">
	                            <button type="button" class="btn-gradient-secondary view_sale" id="{{ $stock->id }}">
	                            	Sell Commodity
	                        	</button>
	                        </td>                        
	                      </tr>                      
	                    </tbody>
	                  </table>
	            </div>
	        </div>
	    </div>
	</div>
<!--/ Bitcoin -->
@endif
@endforeach
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