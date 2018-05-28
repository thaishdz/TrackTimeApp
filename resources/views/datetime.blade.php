<!DOCTYPE HTML>
<html>
  <head>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
  </head>
  <body>

      <label >When does it start?</label>
        <div id="datetimepicker" class="input-append date">
            @if (isset($time_entries->start))
              <input type="text" name="start" value="{{$time_entries->start}}"></input>  
            @else
              <input type="text" name="start"></input>  
            @endif
            <span class="add-on">
              <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
            </span>
        </div>

      <label >When does it finish?</label>

      <div id="datetimepicker1" class="input-append date">
            @if (isset($time_entries->start))
              <input type="text" name="finish" value="{{$time_entries->finish}}"></input>  
            @else
              <input type="text" name="finish"></input> 
            @endif
          <span class="add-on">
            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
          </span>
      </div>


    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>

    <script type="text/javascript">
      var today = new Date();
      $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'en',
        startDate: today
      });

      $('#datetimepicker1').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'en',
        startDate:  today
      });
    </script>
  </body>
<html>
