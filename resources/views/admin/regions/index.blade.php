@extends('layouts.admin')
@section('title', 'Farmties | Regions')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Regions</h4>
                <a href="{{ route('regions.create') }}" class="btn btn-fill btn-danger">Add New Region</a>
            </div>
            @if($regions->count() > 0)
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th>Region</th>
                    	<th>Abbv</th>
                    	<th>Modify</th>
                    </thead>
                    <tbody>
                    	@foreach($regions as $region)
                        <tr>
                        	<td>{{ $region->region }}</td>
                        	<td>{{ $region->abb }}</td>
                        	<td>
                                <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-fill btn-danger">Modify</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <br><br>
            <p class="category">
            	There are no regions at the moment.
            </p>
            @endif
        </div>
    </div>
</div>
@stop