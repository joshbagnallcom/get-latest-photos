function getPhotos(subdir = "get-latest-photos/") {
  //subdir needs to be relative path to the php from the webpage this script is included on
  var containerID = "get-latest-photos-container"; //container to output to
  document.getElementById(containerID).innerHTML = "loading..."; //starting container information

  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    document.getElementById(containerID).innerHTML = this.responseText; //put the photos (php echo) here
  };
  xmlhttp.open("GET", subdir + "photos.php"); //use this file
  xmlhttp.send();
}

getPhotos();
