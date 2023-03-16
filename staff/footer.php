<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap-datepicker.js"></script>
<script src="datatable/js/jquery.dataTables.min.js"></script> 
<script src="datatable/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	const navbarToggle = document.querySelector('.navbar-toggle');
	navbarToggle.addEventListener('click', () => {
		if (navbarToggle.classList[1] === 'open') {
			navbarToggle.classList.remove('open');
		} else {
			navbarToggle.classList.add('open');
		}
	})
</script>