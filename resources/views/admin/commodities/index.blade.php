@extends('layouts.admin')
@section('title', 'Farmties | Commodities')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Commodites currently on Platform</h4>

                <!-- Large modal -->
				<button type="button" class="btn btn-fill btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">+ Add Commodity</button>
            </div>
            @if($commodities->count() > 0)
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th>ID</th>
                    	<th>Name</th>
                    	<th>Price/MT</th>
                    	<th>Modify</th>
                    </thead>
                    <tbody>
                    	@foreach($commodities as $commodity)
                        <tr>
                        	<td>{{ $commodity->comID }}</td>
                        	<td>{{ $commodity->name }}</td>
                        	<td>{{ nairafy($commodity->prices->last()->price) }}/MT</td>
                        	<td> 
                                <a href="{{ route('commodities.edit', $commodity->id) }}" class="btn btn-fill btn-danger">Modify</a>  
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <br><br>
            <p class="category">
            	There are no commodities currently stored on this website.
            </p>
            @endif
        </div>
    </div>
</div>
@stop

@section('modals')
	@include('admin.commodities.create')
@stop