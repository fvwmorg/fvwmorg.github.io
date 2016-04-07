function FvwmWindowShade(state) {
	if (state) {
		document.getElementById('window-content').style.display='none';
		document.getElementsByTagName('body')[0].style.paddingTop='116px';
		window.localStorage.setItem('FvwmWindowShade', true);
	} else {
		document.getElementById('window-content').style.display='block';
		document.getElementsByTagName('body')[0].style.paddingTop='205px';
		window.localStorage.setItem('FvwmWindowShade', false);
	}
}

function FvwmWindowStick() {
	if ( document.getElementById('fvwm_header').style.position == 'fixed' ) {
		document.getElementById('fvwm_header').style.position='absolute';
		window.localStorage.setItem('FvwmWindowStick', false);
	} else {
		document.getElementById('fvwm_header').style.position='fixed';
                window.localStorage.setItem('FvwmWindowStick', true);
	}
}

function FvwmStartFunction() {
	shade = window.localStorage.getItem('FvwmWindowShade');
	stick = window.localStorage.getItem('FvwmWindowStick');
	if ( stick == 'true' ) {
		document.getElementById('fvwm_header').style.position='fixed';
	}

	if ( shade == 'true' ) {
		FvwmWindowShade(true);
	}
}
