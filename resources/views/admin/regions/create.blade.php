@extends('layouts.admin')
@section('title', 'Farmties | Create Regions')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="header">
	            <h4 class="title">Create New Region</h4>
	        </div>
	        <div class="content">
	        	<form action="{{ route('regions.store') }}" method="POST">
	        		@csrf

	        		<div class="row">
	        			<div class="col-md-6">
	        				<div class="form-group">
			        			<label for="region">Region Name</label>
			        			<input type="text" name="region" class="form-control" placeholder="Enter Region Name">
			        		</div>
	        			</div>
	        			<div class="col-md-6">
	        				<div class="form-group">
			        			<label for="abb">Short Name</label>
			        			<input type="text" class="form-control" name="abb" placeholder="Enter Short Name">
			        		</div>
	        			</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-12">
	        				<button type="submit" class="btn btn-fill btn-primary">
	        					Create Region
	        				</button>
	        			</div>
	        		</div>
	        	</form>
	        </div>
		</div>
	</div>
</div>
@stop