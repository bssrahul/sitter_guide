
<div class="blog-wrap">
  <section class="sev-type m75">
    <div class="container">
      <h4><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?> - <?php echo $blogs_info['title']; ?>
      </h4>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
          <div class="left-side-tabs">
            
				<?php 
					//echo $this->element('frontElements/blogs/search_blogs');
					echo $this->element('frontElements/blogs/latest_blogs');
					echo $this->element('frontElements/blogs/popular_blogs');
					echo $this->element('frontElements/blogs/categories_tags');
				?>
		   
          </div>
         
          <div class=" click-area hidden-xs">
            <?php echo $this->element('frontElements/blogs/blog_advertisement');?>
          </div>
          
        </div>
       
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
          
          <div class="right-side-tabs1">
            
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="blog-b-searchdrop">
                  <a href="<?php echo HTTP_ROOT.'blog-listing'; ?>">
                    <i class="fa fa-reply">
                    </i>&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Back to News Centre')); ?>
                  </a>
                </div>
              </div>   
            </div>
           
            <div class="tab-content">
              <div class="tab-pane fade in active">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3 class="bdetail-theading"><?php echo $blogs_info['title']; ?>
                    </h3>
                    <ul class="list-inline blog-user-txt">
                      <li>
                        <i class="fa fa-user">
                        </i>&nbsp;
                        <small> <?php echo $this->requestAction('app/get-translate/'.base64_encode('by')); ?>
                          <a href=""><?php echo SITE_OWNER; ?>
                          </a> 
                        </small>
                      </li>
                      <li>|
                      </li>
                      <li>
                        <i class="fa fa-calendar">
                        </i>&nbsp;
                        <small> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Posted on')); ?> <?php echo __( date("l jS M Y", strtotime($blogs_info['created_date']))); ?>
                        </small>
                      </li>
                      <li>|
                      </li>
                      <li>
                        <small> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Share it on')); ?> : 
                          <a href="javascript:void(0)" 
								onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>')">
                            <i class="fa fa-facebook ">
                            </i>
                          </a>&nbsp; 
                          <a href="javascript:void(0)" 
								onclick="javascript:genericSocialShare('http://twitter.com/share?text=<?php echo urlencode($blogs_info['title']); ?>&url=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>')">
                            <i class="fa fa-twitter ">
                            </i>
                          </a>&nbsp; 
                          <a href="javascript:void(0)" 
								onclick="javascript:genericSocialShare('http://pinterest.com/pin/create/button/?url=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>&media=<?php echo HTTP_ROOT.'img/uploads/'.$blogs_info['image']; ?>')">
                            <i class="fa fa-pinterest ">
                            </i>
                          </a> 
                        </small>
                      </li>
                    </ul>
                    <div class="bdetail-top">
                      <div class="img-thumbnail">
                        <img style="max-height:155px"  src="<?php echo HTTP_ROOT.'img/uploads/'.$blogs_info['image']; ?>" class="img-responsive"/>
                      </div>
                    </div>
                    <div class="blog-text">
                      <?php echo $blogs_info['description']; ?>
                    </div>
                    
                    <div class="row">
                      <div class="col-xs-12 col-sm-12  col-md-5 col-lg-6">
                        <p class="p40"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('By')); ?> <?php echo SITE_OWNER; ?> <?php echo __( date("F j, Y", strtotime($blogs_info['created_date']))); ?>
                        </p>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-7 col-lg-6">
                        <ul class="list-inline blog-share p40">
                          <li>
                             <a href="javascript:void(0)" 
								onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>')">
                            <button class="btn btn-blog-fb">
                              <i class="fa fa-facebook">
                              </i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Share')); ?> 
                            </button>
                            </a>
                          </li>
                          <li>
							 
							 <a href="javascript:void(0)" 
								onclick="javascript:genericSocialShare('http://twitter.com/share?text=<?php echo urlencode($blogs_info['title']); ?>&url=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>')">
                            <button class="btn btn-blog-tw">
                              <i class="fa fa-twitter">
                              </i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Tweet')); ?> 
                            </button>
                            </a>
                          </li>
                          <li>
							   <a href="javascript:void(0)" 
								onclick="javascript:genericSocialShare('http://pinterest.com/pin/create/button/?url=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>&media=<?php echo HTTP_ROOT.'img/uploads/'.$blogs_info['image']; ?>')">
                            <button class="btn btn-blog-pn">
                              <i class="fa fa-pinterest">
                              </i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pin it')); ?> 
                            </button>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class=" click-area visible-xs">
            <?php echo $this->element('frontElements/blogs/blog_advertisement');?>
          </div>
          
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <h5 class="mlike"><?php echo $this->requestAction('app/get-translate/'.base64_encode('You may also like')); ?> 
          </h5>
        </div>
      </div>
      
      <div class="row">
      
        <?php echo $this->element('frontElements/blogs/may_like');?>
      </div>
    </div>
    
  </section>
  <!-- Get in Touch starts-->
</div>
<script type="text/javascript">
function genericSocialShare(url){
    window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
    return true;
}
</script>
