(function () {
        $('.start-timer-btn').on('click',function() {
            $('.timer').timer();
        });

        $('.resume-timer-btn').on('click',function() {
            $('.timer').timer('resume');
        });

        $('.pause-timer-btn').on('click',function() {
            $('.timer').timer('pause');
        });

        $('.remove-timer-btn').on('click',function() {
            $('.timer').timer('remove');
            $('.timer').timer();
        });

}) ();



/*function initTimer() {
        var currentMinutes = Math.floor(totalSecs / 60);
        var currentSeconds = totalSecs % 60;
        if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
        if(currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
        totalSecs++;
        $("#timer").text(currentMinutes + ":" + currentSeconds);
        setTimeout('initTimer()', 1000);
    }

    totalSecs = 0;

    $(document).ready(function() {
        $("#start").click(function() {
            initTimer();
        });
    });



var start = new Date();
var maxTime = 835000;
var timeoutVal = Math.floor(maxTime/100);
var cFlag;
animateUpdate();

function updateProgress(percentage) {
    $('#pbar_innerdiv').css("width", percentage + "%");
    $('#pbar_innertext').text(percentage + "%");
}

function animateUpdate() {
    var now = new Date();
    var timeDiff = now.getTime() - start.getTime();
    var perc = Math.round((timeDiff/maxTime)*100);
      if (perc <= 100) {
       updateProgress(perc);
       setTimeout(animateUpdate, timeoutVal);
      }
}


var timer = 0,
    perc = 0,
    timeTotal = 2500,
    timeCount = 1,
    cFlag;

function updateProgress(percentage) {
    var x = (percentage/timeTotal)*100,
        y = x.toFixed(3);
    $('#pbar_innerdiv').css("width", x + "%");
    $('#pbar_innertext').text(y + "%");
}

function animateUpdate() {
    if(perc < timeTotal) {
        perc++;
        updateProgress(perc);
        timer = setTimeout(animateUpdate, timeCount);
    }
}

$(document).ready(function() {
    $('#start').click(function() {
        if (cFlag == undefined) {
            clearTimeout(timer);
            perc = 0;
            cFlag = true;
            animateUpdate();
        }
        else if (!cFlag) {
            cFlag = true;
            animateUpdate();
        }
        else {
            clearTimeout(timer);
            cFlag = false;
        }
    });
}); */