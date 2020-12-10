<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
				@if(auth()->user()->role == 'admin')
					<li><a href="/karyawan" class=""><i class="lnr lnr-user"></i> <span>Karyawan</span></a></li>
				@endif
				<li><a href="/data" class=""><i class="lnr lnr-chart-bars"></i> <span>Data</span></a></li>
			</ul>
		</nav>
	</div>
</div>