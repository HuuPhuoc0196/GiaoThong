 <!-- footer -->
 <div class="footer">
			<div class="wthree-copyright">
			  <p>Copyright &copy 2018  <a href="#">THÔNG TIN GIAO THÔNG</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="<?php echo base_url_ci;?>public/js/bootstrap.js"></script>
<script src="<?php echo base_url_ci;?>public/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url_ci;?>public/js/scripts.js"></script>
<script src="<?php echo base_url_ci;?>public/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url_ci;?>public/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo base_url_ci;?>public/js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	

<!-- calendar -->
	<script type="text/javascript" src="<?php echo base_url_ci;?>public/js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>