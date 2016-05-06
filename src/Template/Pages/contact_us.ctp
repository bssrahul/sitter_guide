<!--content area Start-->
<main id="contact">
	<section class="our-location">
		<div class="container">
			<h3>Our Locations</h3>
				<div class="row">
    				<div class="col-sm-2"></div>
						<div class="col-sm-10">
							<div class="row">
								<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
							</div>
     					</div>
				</div>
    	</div>
    </section>
    
    
   <section class="maps">
        <div class="row gmap_canvas_sydney">
            <div class="col-sm-3 padding-left0px padding-right3px">
                <div class="map ">
                    <div class=" embed-responsive embed-responsive-4by3" id="Sydney">
                        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
							<div style='overflow:hidden;height:400px;width:400px;'>
								<div id='gmap_canvas_sydney' style='height:400px;width:400px;'></div>
								<style>
									#gmap_canvas img {
										max-width: none!important;
										background: none!important
									}
								</style>
							</div>
							<script type='text/javascript'>
								 function init_map() {
									 var myOptions = {
										 zoom: 14,
										 center: new google.maps.LatLng(-33.86540229491878, 151.2059816894105),
										 mapTypeId: google.maps.MapTypeId.ROADMAP
									 };
									 map = new google.maps.Map(document.getElementById('gmap_canvas_sydney'), myOptions);
									 marker = new google.maps.Marker({
										 map: map,
										 position: new google.maps.LatLng(-33.86540229491878, 151.2059816894105)
									 });
									 infowindow = new google.maps.InfoWindow({
										 content: '<strong>Sitter Guide</strong><br>sydney<br>'
									 });
									 google.maps.event.addListener(marker, 'click', function() {
										 infowindow.open(map, marker);
									 });
									 infowindow.open(map, marker);
								 }
									google.maps.event.addDomListener(window, 'load', init_map);
							</script>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-3 padding-right3px padding-left3px">
                <div class="map gmap_canvas_auckland">
                    <div class="embed-responsive embed-responsive-4by3" id="Auckland">
                        <div style='overflow:hidden;height:400px;width:400px;'>
                            <div id='gmap_canvas_auckland' style='height:400px;width:400px;'></div>
							<style>
									#gmap_canvas img { max - width: none!important; background: none!important }
							</style>
                        </div>
                        <script type='text/javascript'>
                            function init_map() {
                            var myOptions = {
                            zoom: 14,
                            center: new google.maps.LatLng(-36.84845970000001, 174.76333150000008),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            map = new google.maps.Map(document.getElementById('gmap_canvas_auckland'), myOptions);
                            marker = new google.maps.Marker({
                            map: map,
                            position: new google.maps.LatLng(-36.84845970000001, 174.76333150000008)
                            });
                            infowindow = new google.maps.InfoWindow({
                                    content: '<strong>Sitter Guide</strong><br>Auckland<br> <br>'
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                            infowindow.open(map, marker);
                            });
                            infowindow.open(map, marker);
                            }
                            google.maps.event.addDomListener(window, 'load', init_map);
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 padding-right3px padding-left3px">
                <div class="map gmap_canvas_newyork">
                    <div class="embed-responsive embed-responsive-4by3" id="London">
                         <div style='overflow:hidden;height:400px;width:400px;'>
                             <div id='gmap_canvas_newyork' style='height:400px;width:400px;'></div>
                             <style>
                                    #gmap_canvas img { max - width: none!important; background: none!important }
                             </style>
                         </div>
                            <script type='text/javascript'>
                                 function init_map() {
                                 var myOptions = {
                                    zoom: 14,
                                    center: new google.maps.LatLng(51.5073509,-0.12775829999998223),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                 };
                                 map = new google.maps.Map(document.getElementById('gmap_canvas_newyork'), myOptions);
                                 marker = new google.maps.Marker({
                                    map: map,
                                    position: new google.maps.LatLng(51.5073509,-0.12775829999998223)
                                 });
                                 infowindow = new google.maps.InfoWindow({
                                    content: '<strong>Sitter Guide</strong><br>London<br> <br>'
                                 });
                                 google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.open(map, marker);
                                 });
                                 infowindow.open(map, marker);
                                }
                                google.maps.event.addDomListener(window, 'load', init_map);
                            </script>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 padding-right3px padding-left3px">
                <div class="map gmap_canvas_london">
                    <div class="embed-responsive embed-responsive-4by3" id="NewYork" >
                         <div style='overflow:hidden;height:400px;width:400px;'>
                                <div id='gmap_canvas_london' style='height:400px;width:400px;'></div>
                                <style>
                                    #gmap_canvas img { max - width: none!important; background: none!important }
                                </style>
                         </div>
                             <script type='text/javascript'>
                                 function init_map() {
                                 var myOptions = {
                                    zoom: 14,
                                    center: new google.maps.LatLng(40.7127837,-74.00594130000002),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                 };
                                 map = new google.maps.Map(document.getElementById('gmap_canvas_london'), myOptions);
                                 marker = new google.maps.Marker({
                                    map: map,
                                    position: new google.maps.LatLng(40.7127837,-74.00594130000002)
                                 });
                                 infowindow = new google.maps.InfoWindow({
                                    content: '<strong>Sitter Guide</strong><br>New York<br> <br>'
                                 });
                                 google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.open(map, marker);
                                 });
                                 infowindow.open(map, marker);
                                }
                                google.maps.event.addDomListener(window, 'load', init_map);
                                </script>
                    </div>
                </div>
            </div>
		</div>
	</section>
    
    
     <!-- Get in Touch starts-->
    
    <section class="getintouch">
			<div class="container">
				<form method="POST" id="contactform" autocomplete="off">
					<div class="row">
    					<div class="col-sm-12">
							<ul class="list-inline">
								<li class="pull-left"> <h3><?php echo $this->requestAction('users/get-translate/'.base64_encode('Get in Touch')); ?> </h3></li>
									<li class="pull-right"> 
										<div class="location-select">
											<select class="form-control" name="location" onchange="activemap(this.value);" id="location">
												<option value=""><?php echo $this->requestAction('users/get-translate/'.base64_encode('Select Location')); ?> </option>
												<?php foreach($Categoriesdata as $categories){ ?>
													<option value="<?php echo $categories->title ; ?>"><?php echo $categories->title ; ?></option>
												<?php } ?>
											</select> 
										</div>
									</li>
							</ul>
						</div>
					</div>
					<div class="row">
    					<div class="col-sm-12">
					   		<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
					 					<input type="text" name="name" class="form-control" placeholder="<?php echo $this->requestAction('users/get-translate/'.base64_encode('Your Name')); ?>" >
									</div>
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="<?php echo $this->requestAction('users/get-translate/'.base64_encode('Your Email Address')); ?>" >
									</div>
									<div class="form-group">
										<input  type="text" name="phone_no" class="form-control" placeholder="<?php echo $this->requestAction('users/get-translate/'.base64_encode('phone no.')); ?>" >
									</div>
								</div> 
								<div class="col-sm-6">
									<div class="form-group">
					 				   <textarea class="form-control" name="message" rows="5" placeholder="<?php echo $this->requestAction('users/get-translate/'.base64_encode('Message')); ?>"></textarea>
									</div>
									<div class="form-group pull-right">
										<button type="submit" class="btn btn-default send-message" id="send"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Send Message')); ?></button>
									</div>
								</div>
							</div>
					    </div>
					</div>
				</form>
			</div>
    </section>
</main>    
    <!-- Get in Touch ends-->
	<script>
		function activemap(val){
			var location = document.getElementById('location').value;
			 $('#Sydney').removeClass('mapactive');
			 $('#Auckland').removeClass('mapactive');
			 $('#London').removeClass('mapactive');
			 $('#NewYork').removeClass('mapactive');
			$('#'+location).addClass('mapactive');
		}
	</script>

