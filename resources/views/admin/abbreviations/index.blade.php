@extends('layouts.admin')
@section('title', 'Farmties | Abbreviations')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Abbreviations</h4>
                <a href="{{ route('abbreviations.create') }}" class="btn btn-fill btn-danger">Add New Abbreviation</a>
            </div>
            @if($abbreviations->count() > 0)
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th>Commodity</th>
                        <th>Region</th>
                    	<th>MaxP</th>
                        <th>MinP</th>
                        <th>AveP</th>
                        <th>CHG</th>
                    	<th>Modify</th>
                    </thead>
                    <tbody>
                    	@foreach($abbreviations as $abbreviation)
                        <tr>
                        	<td>{{ $abbreviation->commodity->name }}</td>
                            <td>{{ $abbreviation->region->region }}</td>
                        	<td>{{ $abbreviation->MaxP }}</td>
                            <td>{{ $abbreviation->MinP }}</td>
                            <td>{{ $abbreviation->AveP }}</td>
                            <td>{{ $abbreviation->CHG }}</td>
                        	<td>
                                <a href="{{ route('abbreviations.edit', $abbreviation->id) }}" class="btn btn-fill btn-danger">Modify</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <br><br>
            <p class="category">
            	There are no abbreviations at the moment.
            </p>
            @endif
        </div>
    </div>
</div>
@stop