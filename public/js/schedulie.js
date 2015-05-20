$(document).ready(function(){
	$('.event').each(function(){
		var endTime = $(this).attr('data-end-time').split(':');
		var startTime = $(this).attr('data-start-time').split(':');
		var time = [endTime[0]-startTime[0], endTime[1]-startTime[1], endTime[2]-startTime[2]];

		var duration = (time[0]*60 + time[1] + time[2]/60) * 100/60;
		
		var startOffset = (startTime[0]*60 + startTime[1]*1 + startTime[2]/60) * 100/60;
		
		startOffset += 93;

		$(this).css('height', (duration) + 'px');
		$(this).css('top', startOffset + 'px');
	});

	$('.new-event-button').click(function(){
		$(this).siblings('.new-event').slideToggle();
	});
});