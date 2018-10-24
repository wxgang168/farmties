@extends('layouts.admin')
@section('title', 'Farmties | Registered Users')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Registered Users</h4>
            </div>
            @if($users->count() > 0)
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th>S/N</th>
                    	<th>Name</th>
                    	<th>Email</th>
                    	<th>Verified</th>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                    	@foreach($users as $user)
                        <tr>
                        	<td>{{ $count++ }}</td>
                        	<td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->verified === 1 ? 'Yes' : 'No' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <br><br>
            <p class="category">
            	There are no users registered at the moment.
            </p>
            @endif
        </div>
    </div>
</div>
@stop