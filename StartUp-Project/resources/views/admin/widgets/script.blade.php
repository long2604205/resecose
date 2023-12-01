<script src="{{asset('admintemplate/vendors/scripts/core.js')}}"></script>
<script src="{{asset('admintemplate/vendors/scripts/script.min.js')}}"></script>
<script src="{{asset('admintemplate/vendors/scripts/process.js')}}"></script>
<script src="{{asset('admintemplate/vendors/scripts/layout-settings.js')}}"></script>
<script src="{{asset('admintemplate/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('admintemplate/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admintemplate/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admintemplate/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admintemplate/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admintemplate/vendors/scripts/dashboard3.js')}}"></script>
<script src="{{asset('admintemplate/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('admintemplate/vendors/scripts/apexcharts-setting.js')}}"></script>
<script src="{{asset('admintemplate/src/plugins/slick/slick.min.js')}}"></script>
<!-- bootstrap-touchspin js -->
<script src="{{asset('admintemplate/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script>
    jQuery(document).ready(function() {
			jQuery('.product-slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				infinite: true,
				speed: 1000,
				fade: true,
				asNavFor: '.product-slider-nav'
			});
			jQuery('.product-slider-nav').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: '.product-slider',
				dots: false,
				infinite: true,
				arrows: false,
				speed: 1000,
				centerMode: true,
				focusOnSelect: true
			});
			$("input[name='demo3_22']").TouchSpin({
				initval: 1
			});
		});
</script>
