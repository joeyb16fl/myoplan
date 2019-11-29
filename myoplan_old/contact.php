<?php include 'components/header.php'; ?>
   <section class="drawer">
    <section id="contact" class="secondary-page">
      <div class="general">
           <!--Google Maps-->
            <div id="map_container">
			    <div id="map_canvas">
         <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:500px;width:px;'><div id='gmap_canvas' style='height:500px;width:px;'></div><div><small><a href="http://www.googlemapsgenerator.com/en/">Quickly generate and embed a Google Map on your site!                 Click here                  Visit our website</a></small></div><div><small><a href="https://www.biludlejning.world/">de bedste biludlejningsfirmaer</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(27.613834,-81.55327410000001),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(27.613834,-81.55327410000001)});infowindow = new google.maps.InfoWindow({content:'<strong>Office</strong><br>W exeter rd, Florida, united states<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>   
          </div>
		    </div>
          <div class="container">
           <div class="content-link col-md-12">
                  <div id="contact_form" class="top-score-title col-md-9 align-center">
                    <h3>Contact <span>form</span><span class="point-little">.</span></h3>
                                <form method="post">
                                    
                                    <div class="name">
                                        <label for="name">* Name:</label><div class="clear"></div>
                                        <input id="name" name="name" type="text" placeholder="e.g. Mr. John Doe" required=""/>
                                    </div>
                                    <div class="email">
                                        <label for="email">* Email:</label><div class="clear"></div>
                                        <input id="email" name="email" type="text" placeholder="example@domain.com" required=""/>
                                    </div>
                                    <div class="message">
                                        <label for="message"> Message:</label>
                                        <textarea name="messagetext" class="txt-area" id="message" cols="30" rows="4"></textarea>
                                    </div>
                                    
                                    <div id="loader">
                                        <input type="submit" value="Submit"/>
                                    </div>
                                    <p class="success">Your message has been sent successfully.</p>
                                    <p class="error">E-mail must be valid and message must be longer than 20 characters.</p>
                                  </form>
                              </div>
                     <div id="info-company" class="top-score-title col-md-3 align-center">
                        <h3>Info</h3>
                        <div class="col-md-12">
                          <p><i class="fa fa-phone"></i>(844) 2000-MYO (200-0696)</p>
                          <p><i class="fa fa-envelope-o"></i>support@myoplan.com</p>
                          
                        </div>            
                    </div>
                </div>
                </div>
                </div>
                </section>
               
            <?php include 'components/footer.php'; ?>
