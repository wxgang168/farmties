@extends('layouts.admin')
@section('title', 'Farmties | Orders')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Recent Orders on the Platform</h4>
            </div>
            @if($orders->count() > 0)
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th>Transaction ID</th>
                    	<th>Client</th>
                    	<th>Type</th>
                        <th>Amount</th>
                        <th>Paid</th>
                    	<th>Verify Payment</th>
                    </thead>
                    <tbody>
                    	@foreach($orders as $order)
                        <tr>
                        	<td>{{ $order->transID }}</td>
                        	<td>{{ $order->owner->name }}</td>
                            <td>{{ $order->type }}</td>
                            <td>{{ nairafy($order->total) }}</td>
                            <td>{{ $order->paid === 0 ? 'Not Paid' : 'Paid' }}</td>
                        	<td> 
                                @if($order->paid !== 1)
                                <a href="{{ route('admin.orders.edit', $order->transID) }}" class="btn btn-fill btn-danger">Modify</a>
                                @else
                                Payment Verified
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <br><br>
            <p class="category">
            	There are no orders at the moment.
            </p>
            @endif
        </div>
    </div>
</div>
@stop