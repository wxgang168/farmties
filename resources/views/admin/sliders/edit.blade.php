@extends('layouts.admin')
@section('title', 'Farmties | Create Slider')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="header">
	            <h4 class="title">Edit Slider</h4>
	        </div>
	        <div class="content">
	        	<div class="row">
	        		<div class="col-md-12">
	        			<img src="{{ asset('images/sliders/'.$slider->path) }}" alt="" class="img-responsive">
	        		</div>
	        	</div><br><br>
	        	<form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
	        		@csrf
	        		@method('PATCH')

	        		<div class="row">
	        			<div class="col-md-6">
	        				<div class="form-group">
			        			<label for="title">Slider Title</label>
			        			<input type="text" name="title" class="form-control" value="{{ $slider->title }}">
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
	        					<label for="description">Description</label>
	        					<textarea name="description" class="form-control" row="10" placeholder="Enter a short description of service">{{ $slider->description }}</textarea>
	        				</div>
	        			</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-12">
	        				<button type="submit" class="btn btn-fill btn-primary">
	        					Modify Slider
	        				</button>
	        			</div>
	        		</div>
	        	</form>
	        </div>
		</div>
	</div>
</div>
@stop