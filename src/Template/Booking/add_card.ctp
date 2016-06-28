<?php echo $this->Html->script(['Front/booking.js','Front/creditly.js']);?>

<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" id="ajax_response">
  <?php echo $this->element('frontElements/Booking/add_card_form'); ?> 
</div>
<style>
.creditly-wrapper input.has-error {
  outline: none;
  border-color: #ff7076;
  border-top-color: #ff5c61;
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.2),0 1px 0 rgba(255,255,255,0),0 0 4px 0 rgba(255,0,0,0.5);
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.2),0 1px 0 rgba(255,255,255,0),0 0 4px 0 rgba(255,0,0,0.5);
  -ms-box-shadow: inset 0 1px 2px rgba(0,0,0,0.2),0 1px 0 rgba(255,255,255,0),0 0 4px 0 rgba(255,0,0,0.5);
  -o-box-shadow: inset 0 1px 2px rgba(0,0,0,0.2),0 1px 0 rgba(255,255,255,0),0 0 4px 0 rgba(255,0,0,0.5);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.2),0 1px 0 rgba(255,255,255,0),0 0 4px 0 rgba(255,0,0,0.5);
}
.card_error {
  color: #c82334;
  float: left;
  text-align: center;
  width: 100%;
}
.signup_error {
    color: #c82334;
    font-size: 12px;
}
</style>
