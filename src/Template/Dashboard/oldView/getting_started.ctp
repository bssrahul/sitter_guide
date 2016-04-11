<div class="container">
	<div class="row text-center">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#gettingStarted">Getting Started</a></li>
				<li><a data-toggle="tab" href="#baseProfile">Base Profile</a></li>
				<li><a data-toggle="tab" href="#extendedProfile">Extended Profile</a></li>
				<li><a data-toggle="tab" href="#personal">Personal</a></li>
			</ul>
			<div class="tab-content">
			
				<div id="gettingStarted" class="tab-pane fade in active">
					<?php echo 'gettingStarted';//include('inc_overview.ctp'); ?>
				</div><!-- @vik Overview tab  -->	
				
				<div id="baseProfile" class="tab-pane fade">
					<?php echo 'baseProfile';//include('inc_exe_sum.ctp'); ?>
				</div><!-- @vik Executive Summary tab  -->	
				
				<div id="extendedProfile" class="tab-pane fade">
					<?php echo 'extendedProfile';//include('inc_fund_mat.ctp'); ?>
				</div><!-- @vik Funding Materials tab  -->	
				<div id="personal" class="tab-pane fade">
					<?php echo 'Personal';//include('inc_fund_mat.ctp'); ?>
				</div><!-- @vik Funding Materials tab  -->	
				
			</div><!-- @vik tab content --> 	
		</div>
	</div>
</div>