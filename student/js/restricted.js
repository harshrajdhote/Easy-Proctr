document.addEventListener('contextmenu', (event) => 
{
    M.toast({html:"Right Click Not Allowed"})
    event.preventDefault()

}); //prevent right click

//full screen
var elem = document.getElementById("content");
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }

}


//alert when exit fullscreen
if (document.addEventListener)
{
 document.addEventListener('fullscreenchange', exitHandler, false);
 document.addEventListener('mozfullscreenchange', exitHandler, false);
 document.addEventListener('MSFullscreenChange', exitHandler, false);
 document.addEventListener('webkitfullscreenchange', exitHandler, false);
}

function exitHandler()
{
 if (document.webkitIsFullScreen === false)
 {
  // create alert when exit from fullScreen
  // return alert('WARNING');

  // self distruct window when exit from fullScreen
  window.close(); 
 }
}
