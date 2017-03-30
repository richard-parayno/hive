$(document).ready(function() {
    $('.special.popup').hide();
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay,listMonth'
        },
        events: {
            url: 'eventfeed.php',
            type: 'POST',
            error: function() {
                alert('There was an error while fetching events.');
            }
        },
        navLinks: true,
        editable: true,
        eventLimit: true
    });
});

$(".ui.sticky")
  .sticky();
  


$(".ui.launch").click(function() {
    $(".ui.sidebar")
        .sidebar('toggle');
});

$('.existing-clients').css("display", "none");
$('.new-clients').css("display", "none");


$('#slide-existing').click(function() {
  $('.existing-clients').show();
  $('.new-clients').hide();
});
$('#slide-new').click(function() {
  $('.new-clients').show();
  $('.existing-clients').hide();
});


$('select.dropdown')
.dropdown()
;


$('.notifications')
.popup({
  popup: $('.special.popup'),
  on: 'click',
  position: 'bottom right'
})
;

$('#mycalendar').calendar({
  type: 'date',
  monthFirst: false,
  formatter: {
    date: function(date, settings) {
      if(!date) return '';
      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
      return year + '-' + month + '-' + day;
    }
  }
})
;
$('#mycalendar2').calendar({
  type: 'date',
  monthFirst: false,
  formatter: {
    date: function(date, settings) {
      if(!date) return '';
      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
      return year + '-' + month + '-' + day;
    }
  }
})
;

$("#treatment-type").chained("#client-select");
$("#reschedule-this").chained("#client-select, #treatment-type");

$('#client-select').dropdown({
  onChange: function(val) {
    $('.ui.dropdown').removeClass('disabled');
    $('#treatment-type').dropdown('restore defaults');
    $('#reschedule-this').dropdown('restore defaults');
  }
});

$('.chemical-add').css("display", "none");
$('.chemical-remove').css("display", "none");
$('.chemical-replenish').css("display", "none");


$('#slide-add').click(function() {
  $('.chemical-add').show();
  $('.chemical-remove').hide();
  $('.chemical-replenish').hide();
});
$('#slide-remove').click(function() {
  $('.chemical-add').hide();
  $('.chemical-remove').show();
  $('.chemical-replenish').hide();
});
$('#slide-replenish').click(function() {
  $('.chemical-add').hide();
  $('.chemical-remove').hide();
  $('.chemical-replenish').show();
});

function getClient(str) {
  if (str == "") {
    document.getElementById("showHere").innerHTML = "";
    return;
  } else {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    } else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("showHere").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "get-client.php?client="+str, true);
    xmlhttp.send();
  }
}
