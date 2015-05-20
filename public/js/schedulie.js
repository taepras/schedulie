$(document).ready(function(){
	$('.event').each(function(){
		var endTime = $(this).attr('data-end-time').split(':');
		var startTime = $(this).attr('data-start-time').split(':');
		var time = [endTime[0]-startTime[0], endTime[1]-startTime[1], endTime[2]-startTime[2]];

		var duration = (time[0]*60 + time[1] + time[2]/60) * 100/60;
		
		var startOffset = (startTime[0]*60 + startTime[1]*1 + startTime[2]/60) * 100/60;

		var pEndTime, pStartTime;
		var pEndTimeRaw = $(this).prev('.event').attr('data-end-time');
		if(pEndTimeRaw) 
			pEndTime = pEndTimeRaw.split(':')
		else
			pEndTime = [0,0,0];
		var pStartTimeRaw = $(this).prev('.event').attr('data-start-time');
		if(pStartTimeRaw) 
			pStartTime = pStartTimeRaw.split(':')
		else
			pStartTime = [0,0,0];

		var pTime = [pEndTime[0]-pStartTime[0], pEndTime[1]-pStartTime[1], pEndTime[2]-pStartTime[2]];

		var pDuration = (pTime[0]*60 + pTime[1] + pTime[2]/60) * 100/60;
		
		prevOffset = pDuration ? pDuration : 0;
		
		startOffset -= (prevOffset);

		$(this).css('height', (duration) + 'px');
		$(this).css('top', startOffset + 'px');
	});

	$('.new-event-button').click(function(){
		$(this).siblings('.new-event').slideToggle();
	});
});