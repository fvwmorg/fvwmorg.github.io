(() => {
	document.querySelectorAll('.fvwmwindow').forEach((w) => {
		const t = document.getElementById('fvwmwindow-title-' + w.dataset.fvwmid);
		w.addEventListener('mouseover', () => {
			t?.classList.add('fwin-focus');
		});
		w.addEventListener('mouseout', () => {
			t?.classList.remove('fwin-focus');
		});
	});
	document.querySelectorAll('.fvwmwindow-button1').forEach((b) => {
		const w = document.getElementById('fvwmwindow-' + b.dataset.fvwmid);
		b.addEventListener('click', () => {
			w?.classList.toggle('fvwmwindow-max');
		});
	});
	document.querySelectorAll('.fvwmwindow-button2').forEach((b) => {
		const w = document.getElementById('fvwmwindow-main-' + b.dataset.fvwmid);
		b.addEventListener('click', () => {
			w?.classList.remove('fvwmwindow-min');
		});
	});
	document.querySelectorAll('.fvwmwindow-button4').forEach((b) => {
		const w = document.getElementById('fvwmwindow-main-' + b.dataset.fvwmid);
		b.addEventListener('click', () => {
			w?.classList.add('fvwmwindow-min');
		});
	});
	document.querySelectorAll('.fvwmwindow-title').forEach((t) => {
		const w = document.getElementById('fvwmwindow-main-' + t.dataset.fvwmid);
		t.addEventListener('dblclick', () => {
			w?.classList.toggle('fvwmwindow-min');
		});
	});
})();
