@extends('app')

@section('navbar')
	{!! Form::open(['url' => 'timeline/new', 'class' => 'navbar-right navbar-form']) !!}
		{!! Form::text('name', null, ['placeholder' => 'Timeline Name', 'class' => 'form-control']) !!}
		{!! Form::submit('Add Timeline', ['class' => 'btn btn-success']) !!}
	{!! Form::close() !!}
@stop

@section('content')
	<div class="board">
		<div class="timelabel">
			0:00<br>
			1:00<br>
			2:00<br>
			3:00<br>
			4:00<br>
			5:00<br>
			6:00<br>
			7:00<br>
			8:00<br>
			9:00<br>
			10:00<br>
			11:00<br>
			12:00<br>
			13:00<br>
			14:00<br>
			15:00<br>
			16:00<br>
			17:00<br>
			18:00<br>
			19:00<br>
			20:00<br>
			21:00<br>
			22:00<br>
			23:00<br>
			24:00
		</div>
		@foreach($timelines as $timeline)
			<div class="timeline">
				<a href="#" class="btn btn-primary new-event-button" style="float:right; margin-top:20px">Add Event</a>
				<h2>{{$timeline->name}}</h2>
				<hr>
				<div class="new-event">
					{!! Form::open(['url' => 'event/new']) !!}
						{!! Form::hidden('timeline_id', $timeline->id) !!}
						<div class="form-group">
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('start_time', 'Starting Time:') !!}
							{!! Form::input('time','start_time', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('end_time', 'Ending Time:') !!}
							{!! Form::input('time','end_time', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('undertaker', 'Undertaker:') !!}
							{!! Form::text('undertaker', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('notes', 'Notes:') !!}
							{!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '3']) !!}
						</div>
						{!! Form::submit('Add New Event to '.$timeline->name, ['class' => 'btn btn-primary form-control']) !!}
					{!! Form::close() !!}
					{!! Form::open(['url' => 'timeline/delete/'.$timeline->id]) !!}
						{!! Form::submit('Delete '.$timeline->name, ['class' => 'btn btn-danger form-control']) !!}
					{!! Form::close() !!}
					<hr>
				</div>
				
				<ul>
				@foreach($timeline->events->sortBy('start_time') as $event)
					<li class="event" data-start-time="{{$event->start_time}}" data-end-time="{{$event->end_time}}" data-duration="{{$event->duration}}">
						{{$event->name}}
						<br>
						{{$event->start_time}} - {{$event->end_time}}
						<a href="event/delete/{{$event->id}}">X</a>
					</li>	
				@endforeach	
				</ul>
			</div>
		@endforeach
	</div>

@endsection

@section('script')
	{!! Html::script('js/schedulie.js') !!}
@stop