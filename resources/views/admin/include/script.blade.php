    {{-- <script type="text/javascript" src="{{ asset('admin/bower_components/jquery/js/jquery.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/bower_components/popper.js/js/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>

	<script src="{{ asset('admin/assets/pages/waves/js/waves.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

	<script src="{{ asset('admin/assets/pages/chart/float/jquery.flot.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/chart/float/jquery.flot.categories.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/chart/float/curvedLines.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/chart/float/jquery.flot.tooltip.min.js') }}"></script>

	<script src="{{ asset('admin/bower_components/chartist/js/chartist.js') }}"></script>

	<script src="{{ asset('admin/assets/pages/widget/amchart/amcharts.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/widget/amchart/serial.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/widget/amchart/light.js') }}"></script>

	<script src="{{ asset('admin/assets/js/pcoded.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/vertical/vertical-layout.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/assets/pages/dashboard/custom-dashboard.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/assets/js/script.min.js') }}"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
    </script>

    @yield('script')
