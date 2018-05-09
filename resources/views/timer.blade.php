<style>
 #progressBar {
  width: 90%;
  margin: 10px auto;
  height: 22px;
  background-color: #0A5F44;
}

#progressBar div {
  height: 100%;
  text-align: right;
  padding: 0 10px;
  line-height: 22px;
  width: 0;
  background-color: #CBEA00;
  box-sizing: border-box;
}
</style>
<div class='col-md-3'>
	<input type='text' name='timer' id="timer-{{$task->id}}" class='form-control timer-demo-{{$task->id}}' placeholder='0' readonly/>
</div>
	
<div class='col-md-9'>

	<button class='btn btn-default start-timer-btn-{{$task->id}}'>START</button>
	<button class='btn btn-success resume-timer-btn-{{$task->id}} hidden'>Resume</button>
	<button class='btn btn-info pause-timer-btn-{{$task->id}} hidden'>Pause</button>
	<button class='btn btn-danger remove-timer-btn-{{$task->id}} hidden'>STOP</button>
</div>
<script>
	(function(){
		var hasTimer = false;
		
		// Init timer START
		$('.start-timer-btn-{{$task->id}}').on('click', function() {
			timeTotal({{$task->time_id}},'{{$t->start}}','{{$t->finish}}');
			hasTimer = true;
			$('.timer-demo-{{$task->id}}').timer({
				editable: true
			});
			$(this).addClass('hidden');
			$('.pause-timer-btn-{{$task->id}}, .remove-timer-btn-{{$task->id}}').removeClass('hidden');

		});
			

		// Init timer RESUME
		$('.resume-timer-btn-{{$task->id}}').on('click', function() {
			var data = ($('#timer-{{$task->id}}').val()).split(" ",1).toString();
			progress(data, 600, $('.progressBar-{{$task->id}}'));
			$('.timer-demo-{{$task->id}}').timer('resume');
			$(this).addClass('hidden');
			$('.pause-timer-btn-{{$task->id}}, .remove-timer-btn-{{$task->id}}').removeClass('hidden');

		});


		// Init timer PAUSE
		$('.pause-timer-btn-{{$task->id}}').on('click', function() {
			$('.timer-demo-{{$task->id}}').timer('pause');
			$(this).addClass('hidden');
			$('.resume-timer-btn-{{$task->id}}').removeClass('hidden');


			var pause = new Date();
			var p = formatDate(pause);
			// alert(p);

			var data = ($('#timer-{{$task->id}}').val()).split(" ",1).toString();

			$('.pause-timer-btn-{{$task->id}}').click(function () {

			});
			$.ajaxSetup({
 				headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			}
			})

			$.ajax({
				url : '/time/{{$task->time_id}}',
				type: 'PUT',
				data : {duration : data, timing : p},
				success: function() {
					// alert('valued');
				},
				error: function(response){
					alert('ERROR'+ " " + response.value);
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

			// Additional focus event for this demo
		$('.timer-demo-{{$task->id}}').on('focus', function() {
			if(hasTimer) {
				$('.pause-timer-btn-{{$task->id}}').addClass('hidden');
				$('.resume-timer-btn-{{$task->id}}').removeClass('hidden');
			}
		});

			// Additional blur event for this demo
		$('.timer-demo-{{$task->id}}').on('blur', function() {
			if(hasTimer) {
				$('.pause-timer-btn-{{$task->id}}').removeClass('hidden');
				$('.resume-timer-btn-{{$task->id}}').addClass('hidden');
			}
		});
	})();


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

	function progress(timeleft, timetotal,taskID) {
	    var progressBarWidth = timeleft * taskID.width() / timetotal;
	    $('.progressBar-{{$task->id}}').animate({ width: progressBarWidth }, 500).html(Math.floor(timeleft/60) + ":"+ timeleft%60);
	    if(timeleft > 0) {
	        setTimeout(function() {
	            progress(timeleft - 1, timetotal, $('.progressBar-{{$task->id}}'));
	        }, 1000);
	    }
	};

	function timeTotal(timeID,start,finish){
		alert(timeID)
		// alert(start)
		// alert(finish)
		var start = moment(start,"YYYY-MM-DD HH:mm:ss");
		var finish = moment(finish,"YYYY-MM-DD HH:mm:ss");

		// var totaldays = finish.diff(start,'d');
		var totalHours = finish.diff(start,'h');
		progress(totalHours, totalHours,$('.progressBar-{{$task->id}}'));
		// alert(totaldays + 'days');
		// alert(totalHours + 'hours');

	}

</script>


