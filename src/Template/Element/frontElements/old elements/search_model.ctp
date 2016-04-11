<div class="modal fade search_modal" id="myModal" role="dialog">
  <div class="modal-dialog"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title search-title-1">Search</h4>
      </div>
      <div class="modal-body">
        <div class="serach_btn-sm_mobile">
          <div class="row">
            <div class="col-lg-12">
              <input type="text" placeholder="Where do you want to go?">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <input type="text" placeholder="Drop Off?">
            </div>
            <div class="col-lg-6">
              <input type="text" placeholder="Pick Up">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <select>
                <option value="volvo">Pet Size</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="room_icon">
                <ul>
                  <li> <img src="<?php echo HTTP_ROOT; ?>img/room_icon.png" alt="" class="img-responsive">
                    <p>Entire home/apt </p>
                  </li>
                  <li> <img src="<?php echo HTTP_ROOT; ?>img/private_room_icon.png" alt="" class="img-responsive">
                    <p>Entire home/apt </p>
                  </li>
                  <li> <img src="<?php echo HTTP_ROOT; ?>img/shared_room.png" alt="" class="img-responsive">
                    <p>Entire home/apt </p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <button class="btn-search-1 btn-primary btn-large btn-block" type="submit"> <i class="fa fa-search"></i> Find a place </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>