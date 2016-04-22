
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
    <div class="row">
    <div class="col-sm-3 padding-left0px  padding-right3px">
    
    <div class="map">
    
    <div class="embed-responsive embed-responsive-4by3">

 <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:400px;width:400px;'><div id='gmap_canvas' style='height:400px;width:400px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/instantproxies">instantproxies</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(-33.86540229491878,151.2059816894105),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-33.86540229491878,151.2059816894105)});infowindow = new google.maps.InfoWindow({content:'<strong>Sitter Guide</strong><br>sydney<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
	</div>

    </div>

    
    </div>
    
    <div class="col-sm-3    padding-right3px padding-left3px">
    <div class="map">

    
    <div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12407.048908171513!2d174.76589883592328!3d-36.85083896268545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d0d47fb5a9ce6fb%3A0x500ef6143a29917!2sAuckland%2C+New+Zealand!5e0!3m2!1sen!2sin!4v1459156778025"></iframe>
	</div>

    </div>

    </div>
    
    <div class="col-sm-3  padding-right3px padding-left3px">
    
<div class="map">
    
   
    
 
    
    <div class="embed-responsive embed-responsive-4by3 mapactive">
  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11477.996179897233!2d-0.13720882938893675!3d51.5011740644121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sin!4v1459156979582"></iframe>
</div>

    
    </div>

    
    </div>
    
    <div class="col-sm-3 padding-right0px   padding-left3px">
    
<div class="map">
    
    
    
    
    
    <div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d64612.64528101913!2d-74.05240238698596!3d40.68940084812692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1459157239580"></iframe>
</div>
</div>
    
    

    
    </div>
    </div>
   
    
    </section>
    
    
     <!-- Get in Touch starts-->
    
    
    
    <section class="getintouch">
    
    <div class="container">
    <div class="row">
    
    <div class="col-sm-12">
    <ul class="list-inline">
    <li class="pull-left"> <h3>Get in Touch   </h3></li>
     <li class="pull-right"> <div class="location-select"><select class="form-control">
                             <option>Select Location</option>
                             <option>Location 1</option>
                             <option>Location 2</option>
                             <option>Location 3</option>
                             <option>Location 4</option>
                          </select> </div></li>
    </ul>
    </div></div>
    
    <div class="row">
    
    <div class="col-sm-12">
    <form method="POST" id="contactform">
    <div class="row">
       <div class="col-sm-6">
    
  <div class="form-group">
 
    <input type="text" name="name" class="form-control" placeholder="Your Name" >
  </div>
  <div class="form-group">

    <input type="email" name="email" class="form-control" placeholder="Your Email Address" >
  </div>
  <div class="form-group">

    <input  type="text" name="phone_no" class="form-control" placeholder="phone no." >
  </div></div> <div class="col-sm-6">
    
  <div class="form-group">
 
   <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
  </div>
   <div class="form-group pull-right">
   <button type="submit" class="btn btn-default send-message" id="send">Send Message</button></div></div>
  </div>
  
</form>
    
    
    </div>
    </div>
    
   
    
    </div>
    
    
    
    </section>
    
    
    
    <!-- Get in Touch ends-->