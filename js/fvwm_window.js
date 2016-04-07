function FvwmWindowShade(state) {
	if (state) {
		document.getElementById('window-content').style.display='none';
		document.getElementsByTagName('body')[0].style.paddingTop='120px';
	} else {
		document.getElementById('window-content').style.display='block';
		document.getElementsByTagName('body')[0].style.paddingTop='205px';
	}
}

function FvwmWindowStick() {
	if ( document.getElementById('fvwm_header').style.position == 'fixed' ) {
		document.getElementById('fvwm_header').style.position='absolute';
	} else {
		document.getElementById('fvwm_header').style.position='fixed';
	}
}
