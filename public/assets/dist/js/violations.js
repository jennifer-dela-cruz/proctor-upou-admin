
/** Shortcut violation **/
window.onkeydown = function(key)
{
	if(key.ctrlKey == true){
		showError('ShortCut'); 
		//key.preventDefault()
	}
};


/** Right click violation **/
window.oncontextmenu = function () {
  showError('RightClick'); 
}

/** Close Violation **/
window.onbeforeunload = function(event) {
    // do stuff here
    return "Sure you want to leave?";
};

/** Navigate Away Violation **/
ifvisible.on('statusChanged', function(e){
	console.log(e.status);
	if(e.status == "hidden"){
		showError('NavigateAway');
	}
});

window.onfocus = function() {
  showError('NavigateAway');
}

			

function showError(type){
	var violationMessage = "";
	switch(type){
		case 'RightClick':
			violationMessage = "User has attempted to Right Click";
			break;
		case 'ShortCut':
			violationMessage = "User has attempted to use Shortcut Keys";
			break;
		case 'NavigateAway':
			violationMessage = "User has navigated away";
			break;
		default:
			break;
	}
	toastr.error(
			violationMessage,
			"VIOLATION",
		{
			positionClass: "toastr toast-bottom-left",
			containerId: "toast-bottom-left",
		});
}

/* Disable Right Mouse Click */
document.addEventListener('contextmenu', event => event.preventDefault());

var elem = document.documentElement;
var maximize = document.getElementById("maximizeButton");
var maximizeIcon = document.getElementById("maximizeButtonIcon");

/* View in fullscreen */
function fullscreen(){
	if (document.fullscreenElement === null) {
		openFullscreen();
		maximize.setAttribute('data-bs-original-title', 'Minimize');
	} else {
		closeFullscreen();
		maximize.setAttribute('data-bs-original-title', 'Full Screen');
	}
	if(maximizeIcon.className=="ti ti-arrows-maximize fs-8"){
		maximizeIcon.className = "ti ti-arrows-minimize fs-8";
	}else{
		maximizeIcon.className = "ti ti-arrows-maximize fs-8";
	}

}

function openFullscreen() {

  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
  
  
}
function closeFullscreen() {
 
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) { /* Safari */
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE11 */
    document.msExitFullscreen();
  }
}
