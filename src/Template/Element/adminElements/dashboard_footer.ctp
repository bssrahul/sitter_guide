<!-- footer content -->

<footer class="adminfooter">
	<div class="">
		<p class="pull-right"><?php echo __(SITE_TITLE); ?> <?php echo $this->requestAction('app/get-translate/'.base64_encode('developed by')); ?> <a><?php echo DEVELOPED_BY; ?></a>. |
			<span class="lead"> <i class="fa fa-paw"></i> <?php echo __(SITE_TITLE); ?></span>
		</p>
	</div>
	<div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
<style>
.adminfooter {
    bottom: 0;
    float: left;
    position: fixed;
    width: 100%;
}
.pull-right {
    float: right !important;
    position: relative;
    right: 270px;
}
</style>
<!-- /page content -->
