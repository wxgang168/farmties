@extends('layouts.admin')
@section('title', 'Farmties | Services')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Services</h4>
                <a href="{{ route('services.create') }}" class="btn btn-fill btn-primary">Add New Service</a>
            </div>
            @if($services->count() > 0)
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th>S/N</th>
                    	<th>Name</th>
                    	<th>Slug</th>
                    	<th>Modify</th>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                    	@foreach($services as $service)
                        <tr>
                        	<td>{{ $count++ }}</td>
                        	<td>{{ $service->name }}</td>
                            <td>{{ $service->slug }}</td>
                        	<td> 
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-fill btn-danger">Modify</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <br><br>
            <p class="category">
            	There are no services at the moment.
            </p>
            @endif
        </div>
    </div>
</div>
@stop