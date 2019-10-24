<!-- JS -->
<script src="public/js/jquery.min.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/mdb.min.js"></script>
<script src="public/js/all.min.js"></script>
<script src="public/js/jquery.validate.min.js"></script>
<script src="public/js/cw.js"></script>
<!-- JS -->
<script src="resources/<?php echo $view; ?>/funciones.<?php echo $view; ?>.js"></script>
<script src="resources/<?php echo $view; ?>/<?php echo $view; ?>.js"></script>
<script>
	$(function() {
		$('[data-toggle="popover"]').popover();
	});
	$(function() {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
</body>

</html>