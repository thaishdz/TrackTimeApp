<!DOCTYPE html>
<html lang="en">
<head>
	<script src="{{asset('js/jquery.1.11.2.min.js')}}"></script>
	<script src="{{asset('js/timer.jquery.min.js')}}"></script>
</head>
<body>
	<div class='row'>
		
		<div class='col-md-3'>
			<input type='text' name='timer' class='form-control timer-demo' placeholder='0 sec' readonly/>
		</div>

		<div class='col-md-9'>
			<button class='btn btn-default start-timer-btn'>START</button>
			<button class='btn btn-success resume-timer-btn hidden'>Resume</button>
			<button class='btn btn-info pause-timer-btn hidden'>Pause</button>
			<button class='btn btn-danger remove-timer-btn hidden'>STOP</button>
		</div>
	</div>
</body>
</html>




<script>
	(function(){
		var hasTimer = false;
			// Init timer start
		$('.start-timer-btn').on('click', function() {
			hasTimer = true;
			$('.timer-demo').timer({
				editable: true
			});
			$(this).addClass('hidden');
			$('.pause-timer-btn, .remove-timer-btn').removeClass('hidden');


		});

			// Init timer resume
		$('.resume-timer-btn').on('click', function() {
			$('.timer-demo').timer('resume');
			$(this).addClass('hidden');
			$('.pause-timer-btn, .remove-timer-btn').removeClass('hidden');
		});


			// Init timer pause
		$('.pause-timer-btn').on('click', function() {
			$('.timer-demo').timer('pause');
			$(this).addClass('hidden');
			$('.resume-timer-btn').removeClass('hidden');
		});

			// Remove timer
		$('.remove-timer-btn').on('click', function() {
			hasTimer = false;
			$('.timer-demo').timer('remove');
			$(this).addClass('hidden');
			$('.start-timer-btn').removeClass('hidden');
			$('.pause-timer-btn, .resume-timer-btn').addClass('hidden');
		});

			// Additional focus event for this demo
		$('.timer-demo').on('focus', function() {
			if(hasTimer) {
				$('.pause-timer-btn').addClass('hidden');
				$('.resume-timer-btn').removeClass('hidden');
			}
		});

			// Additional blur event for this demo
		$('.timer-demo').on('blur', function() {
			if(hasTimer) {
				$('.pause-timer-btn').removeClass('hidden');
				$('.resume-timer-btn').addClass('hidden');
			}
		});
	})();
</script>