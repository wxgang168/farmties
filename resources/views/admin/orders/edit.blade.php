@extends('layouts.admin')
@section('title', 'Farmties | Orders')
@section('content')
<div class="row">
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">

      @method('PATCH')
      @csrf

      <div class="editsection">
        <div class="edit-body">
          <h3>Proof of Payment for Order {{ $order->transID }} by Client {{ $order->owner->name }}</h3><hr>
          <div class="row">
          	@foreach($order->commodities as $commodity)
          		<div class="col-md-6">
          			{{-- $commodity['pivot']['qty'] --}}
                <div class="commodity-img" style="height: 200px; max-height: 200px; overflow: hidden;">
                  <img src="{{ asset('images/commodities/'.$commodity['path']) }}" alt="" class="img-responsive">
                </div>

                <article>
                  <header>
                    <h4>{{ $commodity['comID'] . " | " .$commodity['name'] . " | " . $commodity['pivot']['qty'] . " | " . nairafy($commodity['pivot']['total']) }}</h4>
                  </header>
                </article>
          		</div>
          	@endforeach
          </div>
        </div><br><br>

        <div class="payment-details">
          <div class="row">
            <div class="col-md-12">
              <h4>Payment Details</h4><hr>

              <div class="row">
                <div class="col-md-7">
                  <p><strong>Bank Name:</strong> {{ $order->verification->bank }}</p>
                  <p><strong>Depositor:</strong> {{ $order->verification->depositor }}</p>
                  <p><strong>Teller No:</strong> {{ $order->verification->teller_no }}</p>
                  <p><strong>Amount Paid:</strong> {{ nairafy($order->total) }}</p>
                  <p><strong>Date of Payment:</strong> {{ $order->verification->dop->format('d M, Y') }}</p>
                  <p><strong>Commodity Owner:</strong> {{ $order->verification->owner->name }}</p>
                </div>
                <div class="col-md-5">
                  <img src="{{ asset('images/payments/'.$order->verification->path) }}" alt="" class="img-responsive">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="editfooter">
          <a href="{{ route('admin.orders.index') }}" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-primary">Verify Payment</button>
        </div>
        
      </div>

    </form>
</div>
@stop