@extends('layouts.dashboard')
@section('header')
<div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
	<h3 class="content-header-title mb-0 d-inline-block">Transaction {{ $order->transID }}</h3>
	<div class="row breadcrumbs-top d-inline-block">
		<div class="breadcrumb-wrapper col-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active">{{ $order->transID }}</li>
			</ol>
		</div>
	</div>
</div>
<div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
<div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white" href="{{ route('user.dashboard') }}">Trade Commodities</a></div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12 col-md-12">
        <!-- User Profile -->
        <section class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <form class="form-horizontal form-user-profile row mt-2" action="{{ route('orders.update', $order->transID) }}" method="POST" enctype="multipart/form-data">
                                	@method('PATCH')
                                	@csrf

                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="bank" required autofocus="" name="bank">
                                            <label for="bank">Bank Name</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="depositor"required="" autofocus="" name="depositor">
                                            <label for="depositor">Depositor</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="teller_no"required="" autofocus="" name="teller_no">
                                            <label for="teller_no">Teller No.</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="date" class="form-control" id="dop" name="dop" required="" autofocus="">
                                            <label for="dop">Date Of Payment</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-label-group">
                                            <input type="file" class="form-control" id="path" name="path">
                                            <label for="path">Payment Receipt</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn-gradient-primary my-1">Verify Payment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@stop