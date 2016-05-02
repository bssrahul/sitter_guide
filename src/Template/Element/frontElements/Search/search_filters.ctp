<div class="top-sr-area">
    <div class="cust-container">
      <div class="sr-area-outer">
        <div class="row st-head-txt">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <p>When you are Away</p>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <p>while you are at Home</p>
          </div>
        </div>
        <div class="sr-area"> 
          <!--top filter tab-->
          <div class="top-filter-tab">
            <ul>
              <li><a  class="boarding chooseService"> <span></span> Boarding<br>
                <b>in the sitter home</b> </a></li>
              <li><a  class="h-sitting chooseService"><span></span> House Sitting<br>
                <b>in your home</b></a></li>
              <li><a   class="d-visit chooseService"><span></span> Drop-in Visit<br>
                <b>in your home</b></a></li>
              <li><a   class="dn-care chooseService"><span></span> Day / Night Care<br>
                <b>in the sitter’s home</b></a></li>
              <li ><a  class="m-place chooseService"><span></span> Market Place<br>
                <b>exercise, groom, train+</b></a></li>
            </ul>
          </div>
          <!--top filter tab--> 
          <!--Tab Content area -->
          <div class="tab-content">
            <div class="tab-pane fade in active" id="boarding" >
              <div class="search-bot-area">
                <div class="row">
                  <div class="from-to-area">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 FirstThreeServices">
                      <div class="date-picker">
                        <label>From</label>
                        <div class="date-box">
                          <input type="text"  class="d-input" id="boardingFrom">
                          <div class="dimg"> <a href="javascript:void(0);" id="cIconFrom"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/></a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 FirstThreeServices">
                      <div class="date-picker">
                        <label>To</label>
                        <div class="date-box">
                          <input type="text"  class="d-input" id="boardingTo">
                          <div class="dimg"> <a href="javascript:void(0);" id="cIconTo"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/></a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 FirstThreeServices"> 
                      <div class="dog-list onLoadHide dropInOption">
                        <label>How many dogs do you have?</label>
                        <ul>
                          <li>
                            <input type="text" value="1 Dog" placeholder="1 Dog" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="2 Dogs" placeholder="2 Dogs" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="3+ Dogs" placeholder="3+ Dogs" class="dog-in" >
                          </li>
                        </ul>
                      </div>   
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 LastTwoServices onLoadHide">
                      <div class="day-list">
                        <label>For which days? </label>
                        <ul>
                          <li>
                            <input type="text" value="S" placeholder="S" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="M" placeholder="M" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="T" placeholder="T" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="W" placeholder="W" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="T" placeholder="T" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="F" placeholder="F" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="S" placeholder="S" class="dog-in" >
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 LastTwoServices onLoadHide">
                      <div class="what-time">
                        <label>What time?</label>
                        <ul>
                          <li class="day">Day
                            <input type="checkbox" >
                          </li>
                          <li class="night">Night
                            <input type="checkbox"  >
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <div class="price-range">
                        <label class="prcRangLbl">Rate per Day / Night</label>
                        
                        <div id="slider-range">
                            <input type="text" id="startRange" readonly style="border:0; color:#327E04; font-weight:bold;">
                            <input type="text" id="endRange" readonly style="border:0; color:#327E04; font-weight:bold;">
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!--collapse content-->
                <div class="col-cont">
                  <div id="search-col-1" class="panel-collapse collapse">
                    <div class="row">
                      <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
                        <div class="your-guest">
                          <p class="head-txt">Your Guest</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Hunter</li>
                          </ul>
                        </div>
                        <div class="your-guest">
                          <p class="head-txt">Sitter Info</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Doesn’t own a pet</li>
                            <li>
                              <input type="checkbox" >
                              Has no children</li>
                            <li>
                              <input type="checkbox" >
                              Farm</li>
                            <li>
                              <input type="checkbox" >
                              Flat</li>
                            <li>
                              <input type="checkbox" >
                              House</li>
                          </ul>
                        </div>
                        <div class="your-guest exp">
                          <p class="head-txt">Experience</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              2+ years sitting</li>
                            <li>
                              <input type="checkbox" >
                              First-aid certified</li>
                            <li>
                              <div class="form-group">
                                <select class="form-control" id="">
                                  <option>Language</option>
                                  <option>Language1</option>
                                  <option>Language2</option>
                                  <option>Language3</option>
                                </select>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                        <div class="market-place">
                          <label>Other Market Place Services Offered</label>
                          <ul>
                            <li class="training"><a href="#" title="Training">Training</a></li>
                            <li class="recreation"><a href="#" title="Recreation">Recreation</a></li>
                            <li class="grooming"><a href="#" title="Grooming">Grooming</a></li>
                            <li class="driver"><a href="#" title="Driver">Driver</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!--info popup-->
                    <div class="sitter-info"> <a  data-toggle="modal" class="more-link" data-target="#myModal" href="#" title="Sitter more Info">Sitter More Info</a> 
                      <!--Model Popup-->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog"> 
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">X</button>
                              <h4 class="modal-title"><span>Sitter Info</span></h4>
                            </div>
                            <div class="modal-body">
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Pet in the Home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo10"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo10" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a dog</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own caged pet</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a cat</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Children in the home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo11"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo11" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      No children 0-5 yrs old</li>
                                    <li>
                                      <input type="checkbox">
                                      No children 6-12 yrs old</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo12"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo12" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Has house  (excludes apartments)</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Balcony</li>
                                    <li>
                                      <input type="checkbox">
                                      Non- smoker home</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Backyard</li>
                                    <li>
                                      <input type="checkbox">
                                      Has fenced yard</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo13"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo13" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Can administer CPR</li>
                                    <li>
                                      <input type="checkbox">
                                      Pet Training Experience</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer injections</li>
                                    <li>
                                      <input type="checkbox">
                                      Experienced with behavioural problems</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer oral medication</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" >Cancel</button>
                              <button type="button" class="btn btn-success" >Search</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/Model Popup--> 
                    </div>
                    <!--/info popup--> 
                  </div>
                  <!--collapse button area-->
                  <div class="col-btn-area"> <a data-toggle="collapse" href="#search-col-1" class="col-btn"><i class="fa fa-angle-double-up" aria-hidden="true"></i><b>More Filter</b> <i class="fa fa-angle-double-up" aria-hidden="true"></i></a> </div>
                  <!--/collapse button area--> 
                </div>
                <!--/collapse content--> 
                
              </div>
            </div>
            <?php /*<div class="tab-pane fade" id="hsitting" >
              <div class="search-bot-area">
                <div class="row">
                  <div class="from-to-area">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="date-picker">
                        <label>From</label>
                        <div class="date-box">
                          <input type="text" value="25/02/2016" class="d-input">
                          <div class="dimg"> <a href="#"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/></a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="date-picker">
                        <label>To</label>
                        <div class="date-box">
                          <input type="text" value="25/02/2016" class="d-input">
                          <div class="dimg"> <a href="#"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/></a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"> </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                      <div class="price-range">
                        <label>Rate per Day / Night</label>
                        <img src="<?php echo HTTP_ROOT; ?>img/price-range.png" alt=""/> </div>
                    </div>
                  </div>
                </div>
                <!--collapse content-->
                <div class="col-cont">
                  <div id="search-col-2" class="panel-collapse collapse">
                    <div class="row">
                      <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
                        <div class="your-guest">
                          <p class="head-txt">Your Guest</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Hunter</li>
                          </ul>
                        </div>
                        <div class="your-guest">
                          <p class="head-txt">Sitter Info</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Doesn’t own a pet</li>
                            <li>
                              <input type="checkbox" >
                              Has no children</li>
                            <li>
                              <input type="checkbox" >
                              Farm</li>
                            <li>
                              <input type="checkbox" >
                              Flat</li>
                            <li>
                              <input type="checkbox" >
                              House</li>
                          </ul>
                        </div>
                        <div class="your-guest exp">
                          <p class="head-txt">Experience</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              2+ years sitting</li>
                            <li>
                              <input type="checkbox" >
                              First-aid certified</li>
                            <li>
                              <div class="form-group">
                                <select class="form-control" id="">
                                  <option>Language</option>
                                  <option>Language1</option>
                                  <option>Language2</option>
                                  <option>Language3</option>
                                </select>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                        <div class="market-place">
                          <label>Other Market Place Services Offered</label>
                          <ul>
                            <li class="training"><a href="#" title="Training">Training</a></li>
                            <li class="recreation"><a href="#" title="Recreation">Recreation</a></li>
                            <li class="grooming"><a href="#" title="Grooming">Grooming</a></li>
                            <li class="driver"><a href="#" title="Driver">Driver</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    
                    <!--info popup-->
                    <div class="sitter-info"> <a  data-toggle="modal" class="more-link" data-target="#myModal2" href="#" title="Sitter more Info">Sitter More Info</a> 
                      <!--Model Popup-->
                      <div class="modal fade" id="myModal2" role="dialog">
                        <div class="modal-dialog"> 
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">X</button>
                              <h4 class="modal-title"><span>Sitter Info</span></h4>
                            </div>
                            <div class="modal-body">
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Pet in the Home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo14"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo14" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a dog</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own caged pet</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a cat</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Children in the home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo15"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo15" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      No children 0-5 yrs old</li>
                                    <li>
                                      <input type="checkbox">
                                      No children 6-12 yrs old</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo16"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo16" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Has house  (excludes apartments)</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Balcony</li>
                                    <li>
                                      <input type="checkbox">
                                      Non- smoker home</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Backyard</li>
                                    <li>
                                      <input type="checkbox">
                                      Has fenced yard</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo17"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo17" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Can administer CPR</li>
                                    <li>
                                      <input type="checkbox">
                                      Pet Training Experience</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer injections</li>
                                    <li>
                                      <input type="checkbox">
                                      Experienced with behavioural problems</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer oral medication</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" >Cancel</button>
                              <button type="button" class="btn btn-success" >Search</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/Model Popup--> 
                    </div>
                    <!--/info popup--> 
                  </div>
                  <!--collapse button area-->
                  <div class="col-btn-area"> <a data-toggle="collapse" href="#search-col-2" class="col-btn"><i class="fa fa-angle-double-up" aria-hidden="true"></i><b>More Filter</b> <i class="fa fa-angle-double-up" aria-hidden="true"></i></a> </div>
                  <!--/collapse button area--> 
                </div>
                <!--/collapse content--> 
                
              </div>
            </div>
            <div class="tab-pane fade" id="dvisit" >
              <div class="search-bot-area">
                <div class="row">
                  <div class="from-to-area">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="date-picker">
                        <label>From</label>
                        <div class="date-box">
                          <input type="text" value="25/02/2016" class="d-input">
                          <div class="dimg"> <a href="#"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/></a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="date-picker">
                        <label>To</label>
                        <div class="date-box">
                          <input type="text" value="25/02/2016" class="d-input">
                          <div class="dimg"> <a href="#"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/></a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <div class="dog-list">
                        <label>How many dogs do you have?</label>
                        <ul>
                          <li>
                            <input type="text" value="1 Dog" placeholder="1 Dog" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="2 Dogs" placeholder="2 Dogs" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="3+ Dogs" placeholder="3+ Dogs" class="dog-in" >
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <div class="price-range">
                        <label>Rate per Day / Night</label>
                        <img src="<?php echo HTTP_ROOT; ?>img/price-range.png" alt=""/> </div>
                    </div>
                  </div>
                </div>
                <!--collapse content-->
                <div class="col-cont">
                  <div id="search-col-3" class="panel-collapse collapse">
                    <div class="row">
                      <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
                        <div class="your-guest">
                          <p class="head-txt">Your Guest</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Hunter</li>
                          </ul>
                        </div>
                        <div class="your-guest">
                          <p class="head-txt">Sitter Info</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Doesn’t own a pet</li>
                            <li>
                              <input type="checkbox" >
                              Has no children</li>
                            <li>
                              <input type="checkbox" >
                              Farm</li>
                            <li>
                              <input type="checkbox" >
                              Flat</li>
                            <li>
                              <input type="checkbox" >
                              House</li>
                          </ul>
                        </div>
                        <div class="your-guest exp">
                          <p class="head-txt">Experience</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              2+ years sitting</li>
                            <li>
                              <input type="checkbox" >
                              First-aid certified</li>
                            <li>
                              <div class="form-group">
                                <select class="form-control" id="">
                                  <option>Language</option>
                                  <option>Language1</option>
                                  <option>Language2</option>
                                  <option>Language3</option>
                                </select>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                        <div class="market-place">
                          <label>Other Market Place Services Offered</label>
                          <ul>
                            <li class="training"><a href="#" title="Training">Training</a></li>
                            <li class="recreation"><a href="#" title="Recreation">Recreation</a></li>
                            <li class="grooming"><a href="#" title="Grooming">Grooming</a></li>
                            <li class="driver"><a href="#" title="Driver">Driver</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!--info popup-->
                    <div class="sitter-info"> <a  data-toggle="modal" class="more-link" data-target="#myModal3" href="#" title="Sitter more Info">Sitter More Info</a> 
                      <!--Model Popup-->
                      <div class="modal fade" id="myModal3" role="dialog">
                        <div class="modal-dialog"> 
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">X</button>
                              <h4 class="modal-title"><span>Sitter Info</span></h4>
                            </div>
                            <div class="modal-body">
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Pet in the Home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo18"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo18" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a dog</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own caged pet</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a cat</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Children in the home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo19"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo19" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      No children 0-5 yrs old</li>
                                    <li>
                                      <input type="checkbox">
                                      No children 6-12 yrs old</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo20"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo20" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Has house  (excludes apartments)</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Balcony</li>
                                    <li>
                                      <input type="checkbox">
                                      Non- smoker home</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Backyard</li>
                                    <li>
                                      <input type="checkbox">
                                      Has fenced yard</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo21"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo21" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Can administer CPR</li>
                                    <li>
                                      <input type="checkbox">
                                      Pet Training Experience</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer injections</li>
                                    <li>
                                      <input type="checkbox">
                                      Experienced with behavioural problems</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer oral medication</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" >Cancel</button>
                              <button type="button" class="btn btn-success" >Search</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/Model Popup--> 
                    </div>
                    <!--/info popup--> 
                  </div>
                  <!--collapse button area-->
                  <div class="col-btn-area"> <a data-toggle="collapse" href="#search-col-3" class="col-btn"><i class="fa fa-angle-double-up" aria-hidden="true"></i><b>More Filter</b> <i class="fa fa-angle-double-up" aria-hidden="true"></i></a> </div>
                  <!--/collapse button area--> 
                </div>
                <!--/collapse content--> 
                
              </div>
            </div>
            <div class="tab-pane fade" id="dncare" >
              <div class="search-bot-area">
                <div class="row">
                  <div class="from-to-area">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="day-list">
                        <label>For which days? </label>
                        <ul>
                          <li>
                            <input type="text" value="S" placeholder="S" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="M" placeholder="M" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="T" placeholder="T" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="W" placeholder="W" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="T" placeholder="T" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="F" placeholder="F" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="S" placeholder="S" class="dog-in" >
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="what-time">
                        <label>What time?</label>
                        <ul>
                          <li class="day">Day
                            <input type="checkbox" >
                          </li>
                          <li class="night">Night
                            <input type="checkbox"  >
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                      <div class="price-range">
                        <label>Rate per Day / Night</label>
                        <img src="<?php echo HTTP_ROOT; ?>img/price-range.png" alt=""/> </div>
                    </div>
                  </div>
                </div>
                <!--collapse content-->
                <div class="col-cont">
                  <div id="search-col-4" class="panel-collapse collapse">
                    <div class="row">
                      <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
                        <div class="your-guest">
                          <p class="head-txt">Your Guest</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Hunter</li>
                          </ul>
                        </div>
                        <div class="your-guest">
                          <p class="head-txt">Sitter Info</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Doesn’t own a pet</li>
                            <li>
                              <input type="checkbox" >
                              Has no children</li>
                            <li>
                              <input type="checkbox" >
                              Farm</li>
                            <li>
                              <input type="checkbox" >
                              Flat</li>
                            <li>
                              <input type="checkbox" >
                              House</li>
                          </ul>
                        </div>
                        <div class="your-guest exp">
                          <p class="head-txt">Experience</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              2+ years sitting</li>
                            <li>
                              <input type="checkbox" >
                              First-aid certified</li>
                            <li>
                              <div class="form-group">
                                <select class="form-control" id="">
                                  <option>Language</option>
                                  <option>Language1</option>
                                  <option>Language2</option>
                                  <option>Language3</option>
                                </select>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                        <div class="market-place">
                          <label>Other Market Place Services Offered</label>
                          <ul>
                            <li class="training"><a href="#" title="Training">Training</a></li>
                            <li class="recreation"><a href="#" title="Recreation">Recreation</a></li>
                            <li class="grooming"><a href="#" title="Grooming">Grooming</a></li>
                            <li class="driver"><a href="#" title="Driver">Driver</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    
                    <!--info popup-->
                    <div class="sitter-info"> <a  data-toggle="modal" class="more-link" data-target="#myModal4" href="#" title="Sitter more Info">Sitter More Info</a> 
                      <!--Model Popup-->
                      <div class="modal fade" id="myModal4" role="dialog">
                        <div class="modal-dialog"> 
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">X</button>
                              <h4 class="modal-title"><span>Sitter Info</span></h4>
                            </div>
                            <div class="modal-body">
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Pet in the Home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo22"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo22" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a dog</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own caged pet</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a cat</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Children in the home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo23"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo23" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      No children 0-5 yrs old</li>
                                    <li>
                                      <input type="checkbox">
                                      No children 6-12 yrs old</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo24"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo24" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Has house  (excludes apartments)</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Balcony</li>
                                    <li>
                                      <input type="checkbox">
                                      Non- smoker home</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Backyard</li>
                                    <li>
                                      <input type="checkbox">
                                      Has fenced yard</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo25"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo25" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Can administer CPR</li>
                                    <li>
                                      <input type="checkbox">
                                      Pet Training Experience</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer injections</li>
                                    <li>
                                      <input type="checkbox">
                                      Experienced with behavioural problems</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer oral medication</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" >Cancel</button>
                              <button type="button" class="btn btn-success" >Search</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/Model Popup--> 
                    </div>
                    <!--/info popup--> 
                    
                  </div>
                  <!--collapse button area-->
                  <div class="col-btn-area"> <a data-toggle="collapse" href="#search-col-4" class="col-btn"><i class="fa fa-angle-double-up" aria-hidden="true"></i><b>More Filter</b> <i class="fa fa-angle-double-up" aria-hidden="true"></i></a> </div>
                  <!--/collapse button area--> 
                </div>
                <!--/collapse content--> 
                
              </div>
            </div>
            <div class="tab-pane fade" id="mplace" >
              <div class="search-bot-area">
                <div class="row">
                  <div class="from-to-area">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="day-list">
                        <label>For which days? </label>
                        <ul>
                          <li>
                            <input type="text" value="S" placeholder="S" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="M" placeholder="M" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="T" placeholder="T" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="W" placeholder="W" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="T" placeholder="T" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="F" placeholder="F" class="dog-in" >
                          </li>
                          <li>
                            <input type="text" value="S" placeholder="S" class="dog-in" >
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> &nbsp; </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                      <div class="price-range">
                        <label>Rate per Day / Night</label>
                        <img src="<?php echo HTTP_ROOT; ?>img/price-range.png" alt=""/> </div>
                    </div>
                  </div>
                </div>
                <!--collapse content-->
                <div class="col-cont">
                  <div id="search-col-5" class="panel-collapse collapse">
                    <div class="row">
                      <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
                        <div class="your-guest">
                          <p class="head-txt">Your Guest</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Hunter</li>
                          </ul>
                        </div>
                        <div class="your-guest">
                          <p class="head-txt">Sitter Info</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              Doesn’t own a pet</li>
                            <li>
                              <input type="checkbox" >
                              Has no children</li>
                            <li>
                              <input type="checkbox" >
                              Farm</li>
                            <li>
                              <input type="checkbox" >
                              Flat</li>
                            <li>
                              <input type="checkbox" >
                              House</li>
                          </ul>
                        </div>
                        <div class="your-guest exp">
                          <p class="head-txt">Experience</p>
                          <ul>
                            <li>
                              <input type="checkbox" >
                              2+ years sitting</li>
                            <li>
                              <input type="checkbox" >
                              First-aid certified</li>
                            <li>
                              <div class="form-group">
                                <select class="form-control" id="">
                                  <option>Language</option>
                                  <option>Language1</option>
                                  <option>Language2</option>
                                  <option>Language3</option>
                                </select>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                        <div class="market-place">
                          <label>Other Market Place Services Offered</label>
                          <ul>
                            <li class="training"><a href="#" title="Training">Training</a></li>
                            <li class="recreation"><a href="#" title="Recreation">Recreation</a></li>
                            <li class="grooming"><a href="#" title="Grooming">Grooming</a></li>
                            <li class="driver"><a href="#" title="Driver">Driver</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!--info popup-->
                    <div class="sitter-info"> <a  data-toggle="modal" class="more-link" data-target="#myModal5" href="#" title="Sitter more Info">Sitter More Info</a> 
                      <!--Model Popup-->
                      <div class="modal fade" id="myModal5" role="dialog">
                        <div class="modal-dialog"> 
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">X</button>
                              <h4 class="modal-title"><span>Sitter Info</span></h4>
                            </div>
                            <div class="modal-body">
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Pet in the Home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo26"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo26" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a dog</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own caged pet</li>
                                    <li>
                                      <input type="checkbox">
                                      Doesn’t own a cat</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Children in the home</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo27"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo27" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      No children 0-5 yrs old</li>
                                    <li>
                                      <input type="checkbox">
                                      No children 6-12 yrs old</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo28"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo28" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Has house  (excludes apartments)</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Balcony</li>
                                    <li>
                                      <input type="checkbox">
                                      Non- smoker home</li>
                                    <li>
                                      <input type="checkbox">
                                      Outdoor Play Areas - Backyard</li>
                                    <li>
                                      <input type="checkbox">
                                      Has fenced yard</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Housing conditions</li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo29"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo29" class="in more-drop">
                                  <ul>
                                    <li>
                                      <input type="checkbox">
                                      Can administer CPR</li>
                                    <li>
                                      <input type="checkbox">
                                      Pet Training Experience</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer injections</li>
                                    <li>
                                      <input type="checkbox">
                                      Experienced with behavioural problems</li>
                                    <li>
                                      <input type="checkbox">
                                      Certified to administer oral medication</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" >Cancel</button>
                              <button type="button" class="btn btn-success" >Search</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/Model Popup--> 
                    </div>
                    <!--/info popup--> 
                  </div>
                  <!--collapse button area-->
                  <div class="col-btn-area"> <a data-toggle="collapse" href="#search-col-5" class="col-btn"><i class="fa fa-angle-double-up" aria-hidden="true"></i><b>More Filter</b> <i class="fa fa-angle-double-up" aria-hidden="true"></i></a> </div>
                  <!--/collapse button area--> 
                </div>
                <!--/collapse content--> 
                
              </div>
            </div>*/ ?>
          </div>
          <!--Tab Content area--> 
          
        </div>
      </div>
    </div>
  </div>