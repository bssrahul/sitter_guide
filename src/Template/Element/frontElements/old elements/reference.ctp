<div class="modal fade" id="referanceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog oter-sign-up" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="main_area_signup">
                    <div class="signup_wrap">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="facebook mar-top-msg">

                                    <h3><?php echo __('Refer Friends & Get $20'); ?></h3>
                                    <p class="successMessage"></p>
									<br>
                                    <!--Signup with email drop content Start-->
                                    <?php echo $this->Form->create(null, [ 'url' => ['controller' => 'Dashboard', 'action' => 'reference'], 'type' => 'post' ,'id'=>'referForm']); ?>

                                    <div class="form-group">
                                        <?php echo $this->Form->input('Users.email',[ 'label' => false, 'class'=>'form-control', 'placeholder' => __("Email"), 'value'=>'','id'=>'referEmail','required'=>true ]); echo '<em class="signup_error error">'.__(@$loginerror['email'][0]).'</em>'; ?>
                                    </div>
                                    <input type="submit" id="sign-up" class="btn btn-primary msg_box" value="Sign Up">
                                    <?php echo $this->Form->end(); //echo $message; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
