function sleep(miliseconds) {
           var currentTime = new Date().getTime();

           while (currentTime + miliseconds >= new Date().getTime()) {
           }
       }

setInterval(function(){$("fa3").toggleClass("red");
$("fb3").toggleClass("circle red");},1000);

setInterval(function(){$("fa2").toggleClass("circle");
$("fb4").toggleClass("circle red");},1000);

setInterval(function(){$("fa2").toggleClass("circle red");
$("fb4").toggleClass("circle");},1000);