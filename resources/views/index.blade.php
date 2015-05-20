@extends('app')

@section('content')

	<div class="add">
		{!! Form::open(['url' => 'timeline/new']) !!}
			{!! Form::text('name') !!}
			{!! Form::submit('Add Timeline') !!}
		{!! Form::close() !!}
	</div>

	<div class="board">
	<div class="timelabel">
	</div>
	@foreach($timelines as $timeline)
		<div class="timeline">
			<h2>{{$timeline->name}}</h2>
			<ul>
			@foreach($timeline->events as $event)
				<li>{{$event->name}}</li>	
			@endforeach	
			</ul>
			
			<div>
				{!! Form::open(['url' => 'event/new']) !!}
					{!! Form::hidden('timeline_id', $timeline->id) !!}
					{!! Form::label('name', 'Name:') !!}
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					{!! Form::label('start_time', 'Starting Time:') !!}
						{!! Form::input('time','start_time', null, ['class' => 'form-control']) !!}
					{!! Form::label('end_time', 'Ending Time:') !!}
						{!! Form::input('time','end_time', null, ['class' => 'form-control']) !!}
					{!! Form::label('undertaker', 'Undertaker:') !!}
						{!! Form::text('undertaker', null, ['class' => 'form-control']) !!}
					{!! Form::label('notes', 'Notes:') !!}
						{!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
					{!! Form::submit('Add New Event to '.$timeline->name, ['class' => 'btn btn-primary form-control']) !!}
				{!! Form::close() !!}
				{!! Form::open(['url' => 'timeline/delete/'.$timeline->id]) !!}
					{!! Form::submit('Delete '.$timeline->name, ['class' => 'btn btn-danger form-control']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	@endforeach
	</div>

@endsection