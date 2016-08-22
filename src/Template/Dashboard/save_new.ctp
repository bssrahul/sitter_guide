<div class="row"> 
  <div class="form-group col-lg-4 col-md-6"> 
    <label for="">Guest Name 
    </label> 
    <input type="text" id="guest-name" class="form-control" name="guest_name[]"> 
  </div>
  <div class="form-group col-lg-4 col-md-6"> 
    <label for="">Type 
    </label> 
    <select id="guest-type" class="form-control" name="guest_type[]">
      <option value="">---
      </option>
      <option value="dog">Dog
      </option>
      <option value="cat">Cat
      </option>
      <option value="horse">Horse
      </option>
      <option value="rabbit">Rabbit
      </option>
      <option value="guinee_pig">Guinne Pig
      </option>
      <option value="ferret">Ferret
      </option>
      <option value="bird">Bird
      </option>
      <option value="reptile">Reptile
      </option>
      <option value="farm_animal">Farm Animal
      </option>
    </select> 
  </div>
  <div class="form-group col-lg-4 col-md-6"> 
    <label for="">Breed 
    </label> 
    <select id="guest-breed" class="form-control" name="guest_breed[]">
      <option value="">---
      </option>
      <option value="afgan">Afghan Hound
      </option>
      <option value="affen">Affenpinscher
      </option>
      <option value="african">Africans
      </option>
      <option value="aidi">Aidi
      </option>
    </select> 
  </div>
</div>
<div class="row"> 
  <div class="form-group col-lg-4 col-md-6"> 
    <div class="row"> 
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
        <label for="">Weight 
        </label> 
        <input type="number" id="guest-weight" class="form-control" name="guest_weight[]"> 
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
        <div class="row"> 
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
            <label for="">Age 
            </label> 
            <input type="number" id="guest-years" class="form-control" name="guest_years[]"> 
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
            <label for="">&nbsp; 
            </label> 
            <input type="number" id="guest-months" class="form-control" name="guest_months[]"> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group col-lg-4 col-md-6"> 
    <div class="row"> 
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
        <label for="">Gender 
        </label> 
        <div class="row"> 
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
            <div class="input-group"> 
              <span class="input-group-addon"> 
                <input type="radio" aria-label="..." name="guest_gender[]" value="male"> 
              </span> 
              <input type="text" disabled="" aria-label="..." value="Male" class="form-control"> 
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
            <div class="input-group"> 
              <span class="input-group-addon"> 
                <input type="radio" aria-label="..." name="guest_gender[]" value="female"> 
              </span> 
              <input type="text" disabled="" aria-label="..." value="Female" class="form-control"> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row"> 
  <div class="form-group col-lg-4 col-md-12"> 
    <label for="">Short Description 
    </label> 
    <textarea rows="5" id="guest-description" class="form-control height-area" name="guest_description[]">
    </textarea> 
  </div>
  <div class="form-group col-lg-4 col-md-6"> 
    <label for="">Photo Library 
    </label> 
    <div id="images_preview" class="row"> 
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
        <img alt="img" class="img-responsive center-block text-center" src="http://localhost/sitter_guide/img/uploads/v6b3490M9BpsfeS.png"> 
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
        <img alt="img" class="img-responsive center-block text-center" src="http://localhost/sitter_guide/img/uploads/QSmtcaJhh8HyndR.png"> 
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
        <img alt="img" class="img-responsive center-block text-center" src="http://localhost/sitter_guide/img/uploads/nCWdo0zAJjivvCF.jpeg"> 
      </div>
    </div>
  </div>
  <div class="form-group col-lg-4 col-md-12"> 
    <p class="upload-txt">It is a long established fact that a reader will be by the page when looking at its layout. 
    </p>
    <button id="browseImg" class="btn btn-prof-upload"> 
      <i class="fa fa-upload "> 
      </i> &nbsp;&nbsp; Upload Image 
    </button> 
    <div id="show-all-errors" class="row"> 
    </div>
  </div>
</div>
<h3>Extended Profile 
</h3> 
<div class="extend"> 
  <div class="row"> 
    <div class="form-group col-lg-4 col-md-12"> 
      <label for="" class="pp-w">Microchipped 
      </label> 
      <div class=" m-rights"> 
        <label for="microchipped-unknow">
          <input type="radio" id="microchipped-unknow" value="unknow" name="microchipped[]">Unknown
        </label>
        <label for="microchipped-yes">
          <input type="radio" id="microchipped-yes" value="yes" name="microchipped[]">Yes
        </label>
        <label for="microchipped-no">
          <input type="radio" checked="checked" id="microchipped-no" value="no" name="microchipped[]">No
        </label> 
      </div>
    </div>
    <div class="form-group col-lg-4 col-md-12"> 
      <label for="" class="pp-w">Spayed / Neuted 
      </label> 
      <div class=" m-rights"> 
        <label for="spayed-or-neuted-unknow">
          <input type="radio" id="spayed-or-neuted-unknow" value="unknow" name="spayed_or_neuted[]">Unknown
        </label>
        <label for="spayed-or-neuted-yes">
          <input type="radio" id="spayed-or-neuted-yes" value="yes" name="spayed_or_neuted[]">Yes
        </label>
        <label for="spayed-or-neuted-no">
          <input type="radio" checked="checked" id="spayed-or-neuted-no" value="no" name="spayed_or_neuted[]">No
        </label> 
      </div>
    </div>
    <div class="form-group col-lg-4 col-md-12"> 
      <label for="" class="pp-w">Flea Treated 
      </label> 
      <div class=" m-rights"> 
        <label for="flea-treated-yes">
          <input type="radio" id="flea-treated-yes" value="yes" name="flea_treated[]">Yes
        </label>
        <label for="flea-treated-no">
          <input type="radio" checked="checked" id="flea-treated-no" value="no" name="flea_treated[]">No
        </label> 
      </div>
    </div>
  </div>
  <div class="row"> 
    <div class="form-group col-lg-4 col-md-12"> 
      <label for="" class="pp-w">Vaccinated 
      </label> 
      <div class=" m-rights"> 
        <label for="vaccinated-yes">
          <input type="radio" id="vaccinated-yes" value="yes" name="vaccinated[]">Yes
        </label>
        <label for="vaccinated-no">
          <input type="radio" checked="checked" id="vaccinated-no" value="no" name="vaccinated[]">No
        </label> 
      </div>
    </div>
    <div class="form-group col-lg-4 col-md-12"> 
      <label for="" class="pp-w">House Trained 
      </label> 
      <div class=" m-rights"> 
        <label for="house-trained-yes">
          <input type="radio" id="house-trained-yes" value="yes" name="house_trained[]">Yes
        </label>
        <label for="house-trained-no">
          <input type="radio" checked="checked" id="house-trained-no" value="no" name="house_trained[]">No
        </label>
        <label for="house-trained-addition_detail_needed">
          <input type="radio" id="house-trained-addition_detail_needed" value="addition_detail_needed" name="house_trained[]">Additional detail if needed
        </label> 
      </div>
    </div>
    <div class="form-group col-lg-4 col-md-12"> 
      <label for="" class="pp-w">Mediacation 
      </label> 
      <div class=" m-rights"> 
        <label for="mediacation-yes">
          <input type="radio" id="mediacation-yes" value="yes" name="mediacation[]">Yes
        </label>
        <label for="mediacation-no">
          <input type="radio" checked="checked" id="mediacation-no" value="no" name="mediacation[]">No
        </label> 
      </div>
    </div>
  </div>
  <div class="row"> 
    <div class="form-group col-lg-4 col-md-12"> 
      <label for="" class="pp-w">Veterinary Name and Contact Info 
      </label> 
      <input type="text" id="vaccinated-name" class="form-control input-rt" name="vaccinated_name[]"> 
    </div>
    <div class="form-group col-lg-4 col-md-12"> 
      <label for="" class="pp-w">Friendly with 
      </label> 
      <div class=" m-rights"> 
        <label for="mediacation-dog">
          <input type="radio" id="mediacation-dog" value="dog" name="mediacation[]">Dog
        </label>
        <label for="mediacation-cat">
          <input type="radio" id="mediacation-cat" value="cat" name="mediacation[]">Cat
        </label>
        <label for="mediacation--10yrs">
          <input type="radio" id="mediacation--10yrs" value="-10yrs" name="mediacation[]">Kids -10yrs
        </label>
        <label for="mediacation-+10yrs">
          <input type="radio" id="mediacation-+10yrs" value="+10yrs" name="mediacation[]">Kids +10yrs
        </label> 
      </div>
    </div>
    <div class="form-group col-lg-4 col-md-12"> 
      <label for="" class="pp-w">Add care instructions for "guests name" 
      </label> 
      <input type="text" id="care-instructions" class="form-control input-rt" name="care_instructions[]">
    </div>
  </div>
</div>
