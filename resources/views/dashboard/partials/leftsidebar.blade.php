<div class="left-side-bar">
			<div class="brand-logo" >
				<a href="{{route ('dashboard.admindashboard')}}">
					<img src="{{asset('images/logos/ftplfulllogo.png')}}" alt="" class="dark-logo" style="width: auto ;height: 50px;"/>
					<img
						src="{{asset('images/logos/ftplfulllogo.png')}}"
						alt=""
						class="light-logo"
					style="width: auto ;height: 50px;"/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-house"></span>
								<span class="mtext">Home</span>
							</a>
							<ul class="submenu">
								<li>
                                   <a href="{{ route('dashboard.home') }}">Home Controller</a>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-textarea-resize"></span
								><span class="mtext">Products</span>
							</a>
							<ul class="submenu">
								
								<li><a href="{{ route('dashboard.products') }}">Add Product</a></li>
								<li><a href="{{ route('dashboard.listproducts')}}">Product List</a></li>
								{{-- <li><a href="{{ route('dashboard.barcodepage') }}">Barcodes</a></li> --}}
								{{-- <li><a href="{{ route('dashboard.billingprinter') }}">Billing Printer</a></li> --}}
								{{-- <li>
                                   <a href="{{ route('dashboard.createbillingrols') }}">Billing Rolls</a>
								</li> --}}
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-table"></span
								><span class="mtext">Creta Category</span>
							</a>
							<ul class="submenu">
								<li><a href="{{ route('dashboard.category')}}">Creta Category</a></li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-command"></span
								><span class="mtext">Sliders Img</span>
							</a>
                            <ul class="submenu">
								<li><a href="{{ route('dashboard.home') }}">View</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-pie-chart"></span
								><span class="mtext">Order </span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('order.show')}}">Order List</a></li>
							</ul>
						</li>
						
						
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-hdd-stack"></span
								><span class="mtext">Notifications</span>
							</a>
							<ul class="submenu">
								<li><a href="">Notificatons List</a></li>
								<li><a href="{{route('dashboard.notifications.create')}}">Create Notifications</a></li>
								{{-- <li class="dropdown">
									<a href="javascript:;" class="dropdown-toggle">
										<span class="micon fa fa-plug"></span
										><span class="mtext">Level 2</span>
									</a>
									<ul class="submenu child">
										<li><a href="javascript:;">Level 2</a></li>
										<li><a href="javascript:;">Level 2</a></li>
									</ul>
								</li>
								<li><a href="javascript:;">Level 1</a></li>
								<li><a href="javascript:;">Level 1</a></li>
								<li><a href="javascript:;">Level 1</a></li> --}}
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</div>