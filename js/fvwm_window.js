function FvwmWindowMaximize() {
	if ( document.getElementById("window").classList.contains("window-max") ) {
                document.getElementById("window").classList.remove("window-max");
                document.getElementById("window-main").classList.remove("window-main-max");
                window.localStorage.setItem('FvwmWindowMaximized', false);
	} else {
                document.getElementById("window").classList.add("window-max");
                document.getElementById("window-main").classList.add("window-main-max");
                window.localStorage.setItem('FvwmWindowMaximized', true);
	}
}

function FvwmWindowShade(state, windowid) {
	if (state) {
		if (windowid == "main") {
		document.getElementById('window-main').style.display='none';
		window.localStorage.setItem('FvwmWindowShade', true);
		} else if (windowid == "inner") {
                document.getElementById('window-inner-main').style.display='none';
		document.getElementById('window-inner-title-bar').innerHTML = 
		document.getElementById('window-inner-title').innerHTML;
                window.localStorage.setItem('FvwmWindowShadeInner', true);
		}
	} else {
		if (windowid == "main") {
		document.getElementById('window-main').style.display='block';
		window.localStorage.setItem('FvwmWindowShade', false);
		} else if (windowid == "inner") {
		document.getElementById('window-inner-main').style.display='block';
		document.getElementById('window-inner-title-bar').innerHTML = '';
		window.localStorage.setItem('FvwmWindowShadeInner', false);
		}
	}
}

function FvwmStartFunction() {
	maximized = window.localStorage.getItem('FvwmWindowMaximized');
	shade = window.localStorage.getItem('FvwmWindowShade');
	shadeinner = window.localStorage.getItem('FvwmWindowShadeInner')
	if ( maximized == 'true' ) {
		FvwmWindowMaximize();
	}

	if ( shade == 'true' ) {
		FvwmWindowShade(true, "main");
	}

	if ( shadeinner == 'true' ) {
		FvwmWindowShade(true, "inner");
	}
}

function FvwmToggleMenu () {
	if ( document.getElementById("window-menu").classList.contains("window-menu-display") ) {
                document.getElementById("window-menu").classList.remove("window-menu-display");
	} else {
                document.getElementById("window-menu").classList.add("window-menu-display");
	}
}
