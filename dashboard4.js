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


