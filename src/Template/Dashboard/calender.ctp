

<div class="col-md-9 col-lg-10 col-sm-8  lg-width80" id="content">
	  <div class="cal-wrap">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading title-panel"> <span class="title-panel1"><i><img src="<?php echo HTTP_ROOT."img/i-recent.png" ?>" alt="recent"></i>&nbsp; Recent Activities </span><span class="pull-right"><a href="#"><img src="<?php echo HTTP_ROOT."img/plus.png" ?>" ></a></span> </div>             
                  <div class="col-xs-12 recent-activity-table">
                  <table class="table table-hover">
                  <thead>
                    <tr class="table-row-heading">
                      <th>Activity</th>
                      <th>User Name</th>
                      <th>User ID</th>
                      <th>Notes</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody class="table-row-text">
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-green.png" ?>" width="11" height="11" alt="green"></span>  Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-red.png" ?>" width="11" height="11" alt="green"></span> Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-orange.png"?>" width="11" height="11" alt="green"></span>   Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    
                     <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-yellow.png" ?>" width="11" height="11" alt="green"></span>  Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                   
                    
                  </tbody>
                </table>
              </div>
            </div>
            <div class="clearfix">
            <div style="margin:10px 0;"></div></div>
            <div class="panel panel-default clearfix">
              <div class="panel-heading title-panel"> <span class="title-panel1"><i><img src="<?php echo HTTP_ROOT."img/i-recent.png" ?>"  alt="recent"></i>&nbsp; Recent Activities </span><span class="pull-right"><a href="#"><img src="<?php echo HTTP_ROOT."img/plus.png" ?>" ></a></span> </div>
            <div class="col-xs-12 recent-activity-table1">
                <table class="table table-hover">
                  <thead>
                    <tr class="table-row-heading">
                      <th>Activity</th>
                      <th>User Name</th>
                      <th>User ID</th>
                      <th>Notes</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody class="table-row-text">
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-green.png" ?>" width="11" height="11" alt="green"></span> Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-red.png" ?>" width="11" height="11" alt="green"></span>  Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-orange.png"?>" width="11" height="11" alt="green"></span>  Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    
                     <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-yellow.png" ?>" width="11" height="11" alt="green"></span>  Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                  
                  </tbody>
                </table>
              </div> </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading title-panel">
			       <span class="title-panel1"><i><img src="<?php echo HTTP_ROOT."img/i-cal.png" ?>"  alt="calender"></i>&nbsp; Calender </span>
			     <span class="pull-right"><a href="#"><img src="<?php echo HTTP_ROOT."img/plus.png" ?>" ></a></span>
			  </div>
              <!--Calendar Box Start-->
			
			<div id="myCalender"><?php echo $this->element('frontElements/profile/calender');?></div>
			
			  <!--Calendar Box End  -->		  
			 
			  </div>
           
          </div>
        </div>
      </div>
	  </div>
	<?php echo $this->Html->css('Front/dist/jquery.onoff.css');
		echo $this->Html->script(['Front/dist/jquery.onoff.js']);
?>
<script>
  $(document).ready(function (){
	  //$('#box-li').hide();
      $('.selectedCheckbox').click(function(){
            $(this).parent().parent().toggleClass("selected");
			var selected_check = $(this).parent().parent().hasClass('selected');
			$(this).parent().parent().parent().addClass("disable");
			alert(selected_check);
			
        });
     //$('#box-li').hide();
    });
   /*For on-off button*/
    $(function(){
          $('input[type=checkbox]').onoff();
    });
       /*End of-off button*/
  
</script>
<style>
.disable {
	background: #ccc none repeat scroll 0 0 !important;
}
</style>