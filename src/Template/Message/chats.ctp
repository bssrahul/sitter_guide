<?php 

	echo $this->Html->css(['Front/jquery-ui.css','Front/search-result.css','Front/jquery.mCustomScrollbar.css']); 
	echo $this->Html->script(['Front/jquery.mCustomScrollbar.concat.min.js','Front/messages.js']); 

?>

<div class="col-md-9 col-lg-10 col-sm-8 lg-width80 " id="content">
  <div class="row db-top-bar-header no-padding-left no-padding-right">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> Inbox
      </h3>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> You are here : 
        </li>
        <li>
          <a href="#">Home
          </a>
        </li>
        <li class="active">Inbox
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="message-full-wrapper">
        <div class="top-message-strip">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
              <ul class="list-inline display-block">
                <li>
                  <p class="head-inbox">
                    <span> 
                      <i class="fa fa-inbox">
                      </i>
                    </span> Inbox
                  </p>
                </li>
                <li>
                  <form class="form-inline sort">
                    <div class="form-group">
                      <label for="exampleInputName2">Sort by
                      </label> &nbsp;
                      <select class="form-control">
                        <option>Sort -1
                        </option>
                        <option>Sorting -2
                        </option>
                        <option>Sorting -3
                        </option>
                      </select>
                    </div>
                  </form>
                </li>
              
              </ul>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
				<p class="message-inbox">
                    <span> 
                      <img src="<?php echo HTTP_ROOT; ?>img/message-openletter.png"  alt="letter">
                    </span> Message
                  </p>
              <div class="input-group s-top-width">
				  
                <!--<input type="text" class="form-control " placeholder="Search Mail...">
                <span class="input-group-btn">
                  <button class="btn  btn-sr" type="button">
                    <i class="fa fa-search">
                    </i>
                  </button>
                </span>-->
              </div>
              <!-- /input-group -->
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 message-pad-right-0 message-pad-left-0">
              <div id="content-md" class="cscroll">
					
					<div class="book-now-setion-wrapper allthreads">
						<?php echo $this->element('frontElements/Message/all_threads'); ?>
					</div>
					
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 border-left1px">
              
              <?php echo $this->element('frontElements/Message/static_controls'); ?>
              
              <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 message-pad-left-0">
                  <div class="chat-wrapper">
                    <div class="chat-title1">To : 
                      <span> 
                        <b>Jassica A
                        </b>
                      </span>
                    </div>
                    <div id="content-m" class="chatscroll">
                      <div class="chat-wrapper-inner positi ">
                        <div class="container-fluid list_chat_ul">
							
						 <?php echo $this->element('frontElements/Message/ajax_chat_response'); ?>
                      
                        </div>
                      </div>
                    </div>
                    
                    <?php echo $this->element('frontElements/Message/chat_form'); ?>
                    
                  </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
					
					<?php echo $this->element('frontElements/Message/job_detail'); ?>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /*   if(@$booking_id !=''){ ?>
<script>
	var booking_id = '<?php echo @$booking_id; ?>';
$(function(){
	setInterval(function(){
		var actionURL = ajax_url+"/message/auto-load-chat/";
		if(booking_id !=''){

			$.ajax({
				url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
				data:{booking_id,booking_id},//ALL SUBMITTED DATA FROM THE FORM
					 
				success:function(res)
				{
					$('div.list_chat_ul').html(res);
					$("#content-m").mCustomScrollbar({theme:"minimal"});	
				}
			});
		}
	}, 1000);
	
	setInterval(function(){
		var actionURL = ajax_url+"/message/auto-load-threads/";
		if(booking_id !=''){

			$.ajax({
				url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
				data:{booking_id,booking_id},//ALL SUBMITTED DATA FROM THE FORM
					 
				success:function(res)
				{
					$('div.allthreads').html(res);
					$("#content-m").mCustomScrollbar({theme:"minimal"});	
				}
			});
		}
	}, 2000);
});
</script>	
<?php }  */ ?>

