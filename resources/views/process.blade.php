@extends('app')

@section('content')
<div class="container">
	<h1>Process</h1>

	<table class="table">
		<thead>
			<tr>
				<td>เวลาเริ่มต้น</td>
				<td>เวลาสิ้นสุด</td>
				<td>เหตุการณ์</td>
				<td>ฝ่าย</td>
				<td>ผู้รับผิดชอบ</td>
				<td>หมายเหตุ</td>
			</tr>
		</thead>
		<tbody>
		@foreach($events as $event)
			<tr>
				<td>{{$event->start_time}}</td>
				<td>{{$event->end_time}}</td>
				<td>{{$event->name}}</td>
				<td>{{$event->timeline}}</td>
				<td>{{$event->undertaker}}</td>
				<td>{{$event->notes}}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@endsection