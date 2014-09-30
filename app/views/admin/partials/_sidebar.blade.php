<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

	<!-- User info -->
	<div class="login-info">
		<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 

			<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
				<img src="{{ URL::asset('images/admin.png') }}" alt="me" class="online" /> 
				<span>
					Admin 
				</span>
				<i class="fa fa-angle-down"></i>
			</a> 

		</span>
	</div>
	<nav>
		<ul>
			<li {{ Request::is('adminjobcategories') ? 'class="active"' : '' }}>
				<a href="{{ URL::to('adminjobcategories') }}"><i class="fa fa-list"></i> <span class="menu-item-parent">Job Category</span></a>
			</li>
			<li {{ Request::is('admininbox') ? 'class="active"' : '' }}>
				<a href="{{ URL::to('admininbox') }}"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Inbox</span>
				</li>

				<li {{ Request::is('adminemployers') ? 'class="active"' : '' }}>
					<a href="{{ URL::to('adminemployers') }}"><i class="fa fa-suitcase"></i></i> <span class="menu-item-parent">Employers</span></a>
				</li>

				<li {{ Request::is('adminemployercontracts') ? 'class="active"' : '' }}>
					<a href="{{ URL::to('adminemployercontracts') }}"><i class="fa fa-suitcase"></i></i> <span class="menu-item-parent">Employer Contracts</span></a>
				</li>

				<li {{ Request::is('adminjobs') ? 'class="active"' : '' }}>
					<a href="{{ URL::to('adminjobs') }}"><i class="fa fa-briefcase"></i></i> <span class="menu-item-parent">Jobs</span></a>
				</li>
				
				<li {{ Request::is('adminviewapplicants') ? 'class="active"' : '' }}>
					<a href="{{ URL::to('adminviewapplicants') }}" title="Applicants"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Applicants</span></a>
				</li>

				<li {{ Request::is('adminviewstaff') ? 'class="active"' : '' }}>
					<a href="{{ URL::to('adminviewstaff') }}" title="Staff"><i class="fa fa-users"></i> <span class="menu-item-parent">Staff</span></a>
				</li>

				<li {{ Request::is('adminscheduledinterviews') ? 'class="active"' : '' }}>
					<a href="{{ URL::to('adminscheduledinterviews') }}" title="Schedule of Interviews"><i class="fa fa-users"></i> <span class="menu-item-parent">Schedule of Interviews</span></a>
				</li>

				<li {{ Request::is('adminviewreports') ? 'class="active"' : '' }}>
					<a href="{{ URL::to('adminviewreports') }}" title="Reports">
						<i class="fa fa-book"></i> <span class="menu-item-parent">Reports</span>
					</a>
				</li>
			</ul>
		</nav>
		
		<span class="minifyme" data-action="minifyMenu"> 
			<i class="fa fa-arrow-circle-left hit"></i> 
		</span>
	</aside>
				<!-- END NAVIGATION -->
		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
	-->
	<div id="shortcut">
		<ul>
			<li>
				<a href="adminlogout" class="jarvismetro-tile big-cubes bg-color-grayDark"> <span class="iconbox"> <i class="fa fa-power-off fa-4x"></i> <span>Sign Out </span> </span> </a>
			</li>
		</ul>
	</div>
		<!-- END SHORTCUT AREA -->