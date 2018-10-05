@extends('layouts.dashboard')
@section('header')
<div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
<h3 class="content-header-title mb-0 d-inline-block">Transactions</h3>
<div class="row breadcrumbs-top d-inline-block">
  <div class="breadcrumb-wrapper col-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Transactions</li>
    </ol>
  </div>
</div>
</div>
<div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
    <div class="btn-group float-md-right">
        <a class="btn-gradient-secondary btn-sm white" href="{{ route('user.dashboard') }}">
            Trade Commodities
        </a>
    </div>
</div>
@stop
@section('content')
@if($orders->count() > 0)
<div id="transactions">
    <div class="transactions-table-th d-none d-md-block">
        <div class="col-12">
            <div class="row px-1">
                <div class="col-md-2 col-12 py-1"><p class="mb-0">Date</p></div>
                <div class="col-md-2 col-12 py-1"><p class="mb-0">Type</p></div>
                <div class="col-md-2 col-12 py-1"><p class="mb-0">Amount</p></div>
                <div class="col-md-1 col-12 py-1"><p class="mb-0">Paid</p></div>
                <div class="col-md-2 col-12 py-1"><p class="mb-0">OrderID</p></div>
                <div class="col-md-3 col-12 py-1"><p class="mb-0">Details</p></div>
            </div>
        </div>
    </div>
    <div class="transactions-table-tbody">

		@foreach($orders as $order)
        <section class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-2 col-12 py-1">
                                <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date: </span>{{ $order->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="col-md-2 col-12 py-1">
                                <span class="d-inline-block d-md-none text-bold-700">Type: </span> <span class="d-inline-block d-md-none text-bold-700">Type: </span>  <a href="#" class="mb-0 btn-sm btn btn-outline-warning round">{{ ucfirst($order->type) }}</a>
                            </div>
                            <div class="col-md-2 col-12 py-1">
                                <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span>  {{ nairafy($order->total) }} </p>
                            </div>
                            <div class="col-md-1 col-12 py-1">
                                <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span>  {{ $order->paid === 1 ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="col-md-2 col-12 py-1">
                                <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">OrderID: </span> {{ $order->transID }} </p>
                            </div>
                            <div class="col-md-3 col-12 py-1">
                                <p class="mb-0">
                                    <span class="d-inline-block d-md-none text-bold-700">
                                        Details: 
                                    </span> 
                                    @if($order->type !== "sale") 
                                    {{ $order->processing === 0 ? 'Verify Payment' : 'Processing' }} 
                                    @if($order->processing === 0)
                                        <a href="{{ route('orders.edit', $order->transID) }}">
                                            <i class="la la-send warning float-right"></i>
                                        </a>
                                    @endif
                                    @else
                                        Processing
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach

        {{ $orders->links() }}

		{{--  
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center pagination-separate pagination-flat">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">« Prev</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">Next »</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        --}}

    </div>
</div>
@else
<div id="alternative">
	<p class="lead">No transactions have been done at this time.</p>
</div>
@endif
@stop