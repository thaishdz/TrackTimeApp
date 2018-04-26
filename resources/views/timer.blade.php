<div class='col-md-3'>
	<input type='text' name='timer' class='form-control timer-demo-{{$task->id}}' placeholder='0 sec'/>
</div>
	
<div class='col-md-9'>

	<button class='btn btn-default start-timer-btn-{{$task->id}}' >START</button>
	<button class='btn btn-success resume-timer-btn-{{$task->id}} hidden'>Resume</button>
	<button class='btn btn-info pause-timer-btn-{{$task->id}} hidden'>Pause</button>
	<button class='btn btn-danger remove-timer-btn-{{$task->id}} hidden'>STOP</button>
</div>


<script>
	(function(){
		var hasTimer = false;
		
		// Init timer start
		$('.start-timer-btn-{{$task->id}}').on('click', function() {
			hasTimer = true;
			$('.timer-demo-{{$task->id}}').timer({
				editable: true
			});
			$(this).addClass('hidden');
			$('.pause-timer-btn-{{$task->id}}, .remove-timer-btn-{{$task->id}}').removeClass('hidden');
		});
			
		

			// Init timer resume
		$('.resume-timer-btn-{{$task->id}}').on('click', function() {
			$('.timer-demo').timer('resume');
			$(this).addClass('hidden');
			$('.pause-timer-btn-{{$task->id}}, .remove-timer-btn-{{$task->id}}').removeClass('hidden');
		});


			// Init timer pause
		$('.pause-timer-btn-{{$task->id}}').on('click', function() {
			$('.timer-demo-{{$task->id}}').timer('pause');
			$(this).addClass('hidden');
			$('.resume-timer-btn-{{$task->id}}').removeClass('hidden');
		});

			// Remove timer
		$('.remove-timer-btn-{{$task->id}}').on('click', function() {
			hasTimer = false;
			$('.timer-demo-{{$task->id}}').timer('remove');
			$(this).addClass('hidden');
			$('.start-timer-btn-{{$task->id}}').removeClass('hidden');
			$('.pause-timer-btn-{{$task->id}}, .resume-timer-btn-{{$task->id}}').addClass('hidden');
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
</script>