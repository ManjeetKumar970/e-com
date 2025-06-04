<div class="left-side-bar">
			<div class="brand-logo">
				<a href="index.html">
					<img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
					<img
						src="vendors/images/deskapp-logo-white.svg"
						alt=""
						class="light-logo"
					/>
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
								<span class="micon bi bi-house"></span
								><span class="mtext">Home</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-textarea-resize"></span
								><span class="mtext">Products</span>
							</a>
							<ul class="submenu">
								<li>
                                   <a href="{{ route('dashboard.createbillingrols') }}">Billing Rolls</a>
								</li>
								<li><a href="{{ route('dashboard.barcodepage') }}">Barcodes</a></li>
								<li><a href="{{ route('dashboard.billingprinter') }}">Billing Printer</a></li>
								<li><a href="form-pickers.html">Barcode Printer</a></li>
								<li><a href="image-cropper.html">Custome</a></li>
								<li><a href="image-dropzone.html">Scanner</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-table"></span
								><span class="mtext">Creta Category</span>
							</a>
							<ul class="submenu">
								<li><a href="basic-table.html">Sub Creta Category</a></li>
							</ul>
						</li>
						<li>
							<a href="calendar.html" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-calendar4-week"></span
								><span class="mtext">Best Seller Product</span>
							</a>
						</li>

						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-command"></span
								><span class="mtext">Sliders Img</span>
							</a>
                            <ul class="submenu">
								<li><a href="highchart.html">View</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-pie-chart"></span
								><span class="mtext">Footer</span>
							</a>
							<ul class="submenu">
								<li><a href="highchart.html">View</a></li>
							</ul>
						</li>
						
						
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-hdd-stack"></span
								><span class="mtext">Multi Level Menu</span>
							</a>
							<ul class="submenu">
								<li><a href="javascript:;">Level 1</a></li>
								<li><a href="javascript:;">Level 1</a></li>
								<li><a href="javascript:;">Level 1</a></li>
								<li class="dropdown">
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
								<li><a href="javascript:;">Level 1</a></li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</div>