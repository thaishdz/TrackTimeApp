<style>
.progressBar {
  width: 100%;
  background-color: #85878c;
}

.bar {
  width: 0%;
  height: 30px;
  background-color: #4CAF50;
  text-align: center;
  line-height: 30px;
  color: white;
}

</style>
<div class='col-md-3'>
	<input type='text' name='timer' id="timer-{{$task->id}}" class='form-control timer-demo-{{$task->id}}' placeholder='0' readonly/>
</div>
	
<div class='col-md-9'>

	<button class='btn btn-default start-timer-btn-{{$task->id}}' name="start-{{$task->id}}">START</button>
	<button class='btn btn-success resume-timer-btn-{{$task->id}} hidden'>Resume</button>
	<button class='btn btn-info pause-timer-btn-{{$task->id}} hidden' id="pause-{{$task->id}}" >Pause</button>
	<button class='btn btn-danger remove-timer-btn-{{$task->id}} hidden'>STOP</button>
</div>
<script>
	var intervals = [];
	var lengthprbar;
	var incrementer;


	function formatDate(date) {
  		var hours = date.getHours();
  		var minutes = date.getMinutes();
  		var sc = date.getSeconds();
  		hours = hours % 12;
  		hours = hours ? hours : 12; // the hour '0' should be '12'
  		minutes = minutes < 10 ? '0'+minutes : minutes;
  		var strTime = hours + ':' + minutes + ':' + sc;
  		return date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate() + " " + strTime;
	}

	function getDateTimeToday(finishDate){
		var now = moment();
		var isafter = moment(now).isAfter(finishDate);
		if (!isafter) {
			return now;
		}
		return null;
	}


	function getTimeTotal(start,finish){
		console.log('function getTimeTotal ' + start)

		if (start != null) {
			var start = moment(start,"YYYY-MM-DD HH:mm:ss");
			var finish = moment(finish,"YYYY-MM-DD HH:mm:ss");

			var totalMinutes = finish.diff(start,'m');
			alert('function getTimeTotal ' + totalMinutes + ' minutes');
			return totalMinutes;
		}
		return 0;
	}
	
 	
	function progress(minutesleft,$element,taskid,pause1,resume) {

		console.log('los minutes que me llegan son ' + minutesleft)

		incrementer = Number((100/minutesleft).toFixed(2));

		if (resume == 'undefined' || !resume) {
			lengthprbar = 0;

		}

		if (pause1 || minutesleft == 0) {
			stop();
		}else{
			intervals[taskid] = setInterval(function () {
					console.log('The current intervalID is ' + intervals[taskid])
				    	minutesleft--;
						console.log('Quedan ' + minutesleft + ' minutos')
						console.log('incrementer tiene ' + incrementer)
				    	if (minutesleft >= 0) {
							lengthprbar += incrementer;
					    	console.log(lengthprbar + ' es la lengthbar')

					    	$element.find('div').width(lengthprbar + '%');

					    	$element.find('div').html(lengthprbar * 1  + '%');				    	
				    	}
				    	if (minutesleft == 0) {
				    		stop();
					    }
			}, 60000);
		}


		function stop() {
			console.log('taskid paused is ' + intervals[taskid])
			clearInterval(intervals[taskid]);
			$('.timer-demo-' + taskid).timer('pause');
		}

	}




	(function(){
		var hasTimer = false;
		
		// Init timer START
		$('.start-timer-btn-{{$task->id}}').on('click', function() {

			var timeTotal = getTimeTotal(getDateTimeToday('{{$t->finish}}'),'{{$t->finish}}');
			if (timeTotal == 0) {
				$('.timer-demo-' + {{$task->id}}).timer('pause');
			}else{
				progress(timeTotal,$('#' + {{$task->id}}),{{$task->id}});
				hasTimer = true;
				$('.timer-demo-{{$task->id}}').timer({
					editable: true
				});
				$(this).addClass('hidden');
				$('.pause-timer-btn-{{$task->id}}, .remove-timer-btn-{{$task->id}}').removeClass('hidden');
			}


		});

		// Init timer RESUME
		$('.resume-timer-btn-{{$task->id}}').on('click', function() {

			$('.timer-demo-{{$task->id}}').timer('resume');
			$(this).addClass('hidden');
			$('.pause-timer-btn-{{$task->id}}, .remove-timer-btn-{{$task->id}}').removeClass('hidden');

			var data = ($('#timer-{{$task->id}}').val()).split(" ",1).toString();

			console.log('FUNCTION RESUME')

			var resume = $('#' + {{$task->id}}).text();
			resume = resume.substring(0,resume.indexOf('%'));

			if (getDateTimeToday() >= '{{$t->finish}}') {
				alert('DATE EXPIRED')
				$('.timer-demo-{{$task->id}}').timer('pause');
			}else{
				var minutesleft = getTimeTotal(getDateTimeToday(),'{{$t->finish}}');
			}

			console.log('minutes que quedan ' + minutesleft)

			progress(minutesleft,$('#' + {{$task->id}}),{{$task->id}},false,resume);


		});

		// Init timer PAUSE
		$('.pause-timer-btn-{{$task->id}}').on('click', function() {
			$('.timer-demo-{{$task->id}}').timer('pause');
			$(this).addClass('hidden');
			$('.resume-timer-btn-{{$task->id}}').removeClass('hidden');

			console.log('FUNCTION PAUSE')

			var today = new Date();
			today = formatDate(today);

			if (getDateTimeToday() >= '{{$t->finish}}') {
				alert('DATE EXPIRED')
				$('.timer-demo-{{$task->id}}').timer('pause');
			}else{
				var minutesleft = getTimeTotal(getDateTimeToday(),'{{$t->finish}}');
			}

			progress(minutesleft,$('#' + {{$task->id}}),{{$task->id}},true);

			var data = ($('#timer-{{$task->id}}').val()).split(" ",1).toString();

			$.ajaxSetup({
 				headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			}
			})

			$.ajax({
				url : '/time/{{$task->time_id}}',
				type: 'PUT',
				data : {duration : data, timing : today},
				success: function() {
					// console.log('valued');
				},
				error: function(response){
					console.log('ERROR'+ " " + response.value);
				}
			});
		});

		// Remove timer
		$('.remove-timer-btn-{{$task->id}}').on('click', function() {
			hasTimer = false;
			$('.timer-demo-{{$task->id}}').timer('remove');
			$(this).addClass('hidden');
			$('.start-timer-btn-{{$task->id}}').removeClass('hidden');
			$('.pause-timer-btn-{{$task->id}}, .resume-timer-btn-{{$task->id}}').addClass('hidden');

			// Finish Time

			var finish = new Date();
			var end = formatDate(finish);

			var data = ($('#timer-{{$task->id}}').val()).split(" ",1).toString();
			
				$.ajaxSetup({
 				headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			}
			})	

			$.ajax({
				url : '/time/{{$task->time_id}}',
				type: 'PUT',
				data : {timing : end, duration : data},
				success: function() {
					alert('valued');
				},
				error: function(response){
					alert('ERROR'+ " " + response.value);
				}
			});
		});

			// Additional focus event 
		$('.timer-demo-{{$task->id}}').on('focus', function() {
			if(hasTimer) {
				$('.pause-timer-btn-{{$task->id}}').addClass('hidden');
				$('.resume-timer-btn-{{$task->id}}').removeClass('hidden');
			}
		});

			// Additional blur event 
		$('.timer-demo-{{$task->id}}').on('blur', function() {
			if(hasTimer) {
				$('.pause-timer-btn-{{$task->id}}').removeClass('hidden');
				$('.resume-timer-btn-{{$task->id}}').addClass('hidden');
			}
		});

})();


</script>


