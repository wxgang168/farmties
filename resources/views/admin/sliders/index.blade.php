@extends('layouts.admin')
@section('title', 'Farmties | Services')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Sliders</h4>
                <a href="{{ route('sliders.create') }}" class="btn btn-fill btn-primary">Add New Slider</a>
            </div>
            @if($sliders->count() > 0)
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th>S/N</th>
                    	<th>Title</th>
                    	<th>Modify</th>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                    	@foreach($sliders as $slider)
                        <tr>
                        	<td>{{ $count++ }}</td>
                        	<td>{{ $slider->title }}</td>
                        	<td> 
                                <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-fill btn-danger">Modify</a>
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