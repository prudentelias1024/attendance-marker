setInterval(() => {
    let now = moment();
    let date = document.getElementById("date").innerText
    let enddate = document.getElementById("enddate").innerText
    let endtime = document.getElementById("endtime").innerText
    let enddatetime = document.getElementById("enddatetime").innerText
     date = new Date(date).toISOString()
    date = moment(date)
     enddate = new Date(enddate).toISOString()
    enddate = moment(enddate)
     endtime = new Date(endtime).toISOString()
    endtime = moment(endtime)
    
    let days = date.diff(now, 'days');
    let hours = date.diff(now, 'hours') % 24;
    let minutes = date.diff(now, 'minutes') % 60;
    let seconds = date.diff(now, 'seconds') % 60;
    if (days < 10) {
       days = `0${days}`
    }
    if (hours < 10) {
       hours = `0${hours}`
    }
    if (minutes < 10) {
       minutes = `0${minutes}`
    }
    if (seconds < 10) {
       seconds = `0${seconds}`
    }
    if (now.isAfter(date) && now.isBefore(endtime)) {
      document.getElementById("countdown_title").innerText = "Training Ongoing.....";
      document.getElementById("countdown").style.display = "none";
    }
    
    
    if (now.isAfter(date) && now.isAfter(endtime)) {
     
      document.getElementById("countdown__end__title").innerText = "Training Has Ended";
   }
   if (now.isAfter(enddatetime)) {
      document.getElementById("countdown").style.display = "none";
      document.getElementById("countdown_title").innerText = "No Ongoing Training";
      document.getElementById("countdown_title").classList.add("-mt-28")
    }

    
    document.getElementById("days").innerText = days;
     document.getElementById("hours").innerText = hours;
     document.getElementById("minutes").innerText = minutes;
     document.getElementById("seconds").innerText = seconds;
        
}, 1000);
