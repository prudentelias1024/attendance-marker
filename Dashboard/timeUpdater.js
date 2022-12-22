setInterval(() => {
    let now = moment();
    let date = document.getElementById("date").innerText
    console.log(date)
    date = new Date(date).toISOString()
    date = moment(date)
    
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
    document.getElementById("days").innerText = days;
     document.getElementById("hours").innerText = hours;
     document.getElementById("minutes").innerText = minutes;
     document.getElementById("seconds").innerText = seconds;
        
}, 1000);