@extends('layouts.admin')
@section('title', 'Farmties | Create Service')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="header">
	            <h4 class="title">Create New Service</h4>
	        </div>
	        <div class="content">
	        	<form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
	        		@csrf

	        		<div class="row">
	        			<div class="col-md-6">
	        				<div class="form-group">
			        			<label for="name">Service Name</label>
			        			<input type="text" name="name" class="form-control" placeholder="Enter Service Name">
			        		</div>
	        			</div>
	        			<div class="col-md-6">
	        				<div class="form-group">
			        			<label for="path">Upload Image</label>
			        			<input type="file" class="form-control" name="path">
			        		</div>
	        			</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="form-group">
	        					<label for="description">Short Excerpt</label>
	        					<textarea name="description" class="form-control" row="10" placeholder="Enter a short description of service"></textarea>
	        				</div>
	        			</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="form-group">
	        					<label for="body">Service Description</label>
	        					<textarea name="body" class="form-control editor" placeholder="Enter full description of service"></textarea>
	        				</div>
	        			</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-12">
	        				<button type="submit" class="btn btn-fill btn-primary">
	        					Create Service
	        				</button>
	        			</div>
	        		</div>
	        	</form>
	        </div>
		</div>
	</div>
</div>
@stop