function getMonth(str) {
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
    xmlhttp.open("GET", "get-month.php?month="+str, true);
    xmlhttp.send();
  }
}

$('#newclientsform')
  .form({
    fields: {
      newname: {
        identifier: 'newname',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter the client\'s name.'
          }
        ]
      },
      newaddress: {
        identifier: 'newaddress',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter the client\'s address.'
          }
        ]
      },
      newnumber: {
        identifier: 'newnumber',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter the client\'s contact number.'
          },
          {
            type   : 'decimal',
            prompt : 'You must enter a number.'
          },
          {
            type   : 'exactLength[11]',
            prompt : 'You must follow the following format: 09151234567'
          }
        ]
      },
      newservicerequested: {
        identifier: 'newservicerequested',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must select the service requested.'
          }
        ]
      },
      newdate: {
        identifier: 'newdate',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must choose a date.'
          }
        ]
      },
      newareatype: {
        identifier: 'newareatype',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must select the area type.'
          }
        ]
      }
    }
  })
;

$('#oldclientsform')
  .form({
    fields: {
      old: {
        identifier: 'old',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select a client.'
          }
        ]
      },
      oldaddress: {
        identifier: 'oldaddress',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter an address.'
          }
        ]
      },
      oldservicerequested: {
        identifier: 'oldservicerequested',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must select the service requested.'
          }
        ]
      },
      olddate: {
        identifier: 'olddate',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must choose a date.'
          }
        ]
      },
      oldareatype: {
        identifier: 'oldareatype',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must select the area type.'
          }
        ]
      }
    }
  })
;
