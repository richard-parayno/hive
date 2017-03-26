function getOculars(str) {
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
    xmlhttp.open("GET", "get-oculars.php?type="+str, true);
    xmlhttp.send();
  }
}

$("#oculars").chained("#servicetypes");

$('#generalform')
  .form({
    fields: {
      aetype: {
        identifier: 'aetype',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select an Account Executive.'
          }
        ]
      },
      Date: {
        identifier: 'Date',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must choose a date.'
          }
        ]
      },
      Atype: {
        identifier: 'Atype',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must choose the job type.'
          }
        ]
      },
      newdate: {
        identifier: 'newdate',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter a new date.'
          }
        ]
      }
    }
  })
;

$('#ocularnosupervisor')
  .form({
    fields: {
      daterequested: {
        servicetypes: 'servicetypes',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must choose the service type.'
          }
        ]
      },
      oculars: {
        identifier: 'oculars',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select an ocular request.'
          }
        ]
      }
    }
  })
;


