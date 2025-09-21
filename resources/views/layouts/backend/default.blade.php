<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.backend.__includes.head')

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	@include('layouts.backend.__includes.mobile-header')

	<div class="d-flex flex-column flex-root">
		<div class="d-flex flex-row flex-column-fluid page">
			@include('layouts.backend.__includes.sidebar')
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				@include('layouts.backend.__includes.topbar')
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					@include('layouts.backend.__includes.subheader')
					<div class="d-flex flex-column-fluid">
						<div class="container-fluid">
							@yield('content')
						</div>
					</div>
				</div>
				@include('layouts.backend.__includes.footer')
			</div>
		</div>
	</div>

	@include('layouts.backend.__includes.components.canvas-cart')
	@include('layouts.backend.__includes.components.canvas-panel')
	@include('layouts.backend.__includes.components.canvas-chat')
	@include('layouts.backend.__includes.components.scroll-top')
	@include('layouts.backend.__includes.components.sticky-toolbar')
	@include('layouts.backend.__includes.js')

</body>

</html>