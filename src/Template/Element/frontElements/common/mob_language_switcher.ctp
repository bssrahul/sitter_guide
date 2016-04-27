<!--Start mob country-->               
                                 <?php 
                                    $cont = $this->request->params['controller'];
                                    $act = $this->request->params['action'];
                                  ?>
                                   <div class="mob-country-drop">
                                      <ul>
                                        <li class="dd-country last-drop"><a href="#"  data-toggle="dropdown"> <img src="<?php echo HTTP_ROOT; ?>img/flag-icon.png" alt=""> </a>
                                         <div class="dropdown-menu country-drop">
                                                    <ul class="nav nav-tabs">
                                                      <li class="active"><a data-toggle="tab" href="#home">Country </a></li>
                                                      <li><a data-toggle="tab" href="#menu1">Currency</a></li>
                                                    </ul>                                        
                                                    <div class="tab-content">
                                                      <div id="home" class="tab-pane fade in active">
                                                          <ul class="c-list"> 
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt="">FRENCH</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt="">GERMAN</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt="">HUNGARIAN</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt="">ITALIAN</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt="">ROMANIAN</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt="">SPANISH</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt="">ENGLISH</a></li>  
                                                          </ul>
                                                      </div>
                                                      <div id="menu1" class="tab-pane fade">
                                                        <ul class="c-list"> 
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt="">EUR</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt="">EUR</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt="">HUF</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt="">EURO</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt="">RON</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt="">EUR</a></li>
                                                            <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt="">USD</a></li>  
                                                          </ul>
                                                      </div>                                          
                                                    </div>
                                                    </div>
                                       </li>
                                    </ul>
                                  </div>
                                <!--end -->