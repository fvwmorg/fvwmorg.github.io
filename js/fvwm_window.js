function FvwmWindowMaximize() {
	if ( document.querySelector("#fvwm_full_window").classList.contains("fvwm_window_max") ) {
                document.querySelector("#fvwm_full_window").classList.remove("fvwm_window_max");
                document.querySelector("#fvwm_content_div").classList.remove("fvwm_content_max");
                window.localStorage.setItem('FvwmWindowMaximized', false);
	} else {
		document.querySelector("#fvwm_full_window").classList.add("fvwm_window_max");
		document.querySelector("#fvwm_content_div").classList.add("fvwm_content_max");
                window.localStorage.setItem('FvwmWindowMaximized', true);
	}
}

function FvwmWindowShade(state) {
	if (state) {
		document.getElementById('fvwm_menu_row').style.display='none';
		document.getElementById('fvwm_content_row').style.display='none';
		window.localStorage.setItem('FvwmWindowShade', true);
	} else {
                document.getElementById('fvwm_menu_row').style.display='table-row';
                document.getElementById('fvwm_content_row').style.display='table-row';
		window.localStorage.setItem('FvwmWindowShade', false);
	}
}

function FvwmStartFunction() {
	maximized = window.localStorage.getItem('FvwmWindowMaximized');
	shade = window.localStorage.getItem('FvwmWindowShade');
	if ( maximized == 'true' ) {
		FvwmWindowMaximize(true);
	}

	if ( shade == 'true' ) {
		FvwmWindowShade(true);
	}
}
