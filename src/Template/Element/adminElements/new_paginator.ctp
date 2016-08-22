<?php
	
	$checkAction = $this->request->action;
	$perPage = isset($this->request->params->paging[$modelName]['limit'])?$this->request->params->paging[$modelName]['limit']:'';
 	$page = isset($this->request->params->paging[$modelName]['page'])?'/page:'.$this->request->params->paging[$modelName]['page']:'';
	$limit = isset($this->request->params->paging[$modelName]['limit'])?'/limit:'.$this->request->params->paging[$modelName]['limit']:'';
	$sort = isset($this->request->params['named']['sort'])?'/sort:'.$this->request->params['named']['sort']:'';
	$dirArr = array('asc'=>'desc','desc'=>'asc');
	$dir = isset($this->request->params['named']['direction'])?'/direction:'.$dirArr[$this->request->params['named']['direction']]:'';
 	//$this->paginator->options['url'] = array('?' => $_GET);

	if(!isset($this->request->params['pass'][0]))
	{
		$url_params=array();
					
			foreach($this->request->params['url'] as $key=>$value)
			{
				if($key!='url' && !is_array($key))
				{
					$url_params[$key]=$value;
				}
			}
			
			//$this->Paginator->options(array('url' => array_merge($this->passedArgs,array("?"=>$url_params))));
			$this->Paginator->options([
				'url' => [array_merge($this->passedArgs,["?"=>$url_params])]
			]);
	}
	//$this->Paginator->options(array('url' => array_merge($this->passedArgs,array('?' => ltrim(strstr($_SERVER['QUERY_STRING'], '&'), '&')))));
?> 

<script>
$(document).ready(function(){
	$('.myWebsiteChange').change(function(){
		var action = $('#myLimitForm').attr('action');
		//var newUrl = action+'/limit:'+$(this).val();
		
		
		loc = document.location.toString();
		loc = loc.split('?');
		if(typeof(loc[1])  === "undefined")
			var newUrl = action+'/limit:'+$(this).val();
		else
			var newUrl = action+'/limit:'+$(this).val()+'?'+loc[1];
		document.location.href = newUrl;
		
	});
});		
</script>
<div class="col-xs-8">
	<div class="dataTables_info" id="example1_info">
	
	<?= $this->Paginator->counter([
		'format' => 'Page {{page}} of {{pages}}, showing {{current}} records out of
				 {{count}} total'
	]) ?>
	
	<?php //echo $this->Paginator->counter('Showing {:start} to {:end} of {:count} entries'); ?>
	</div><?php $action = explode('_', $this->request->action);  $newAction = ''; for($i = 1; $i < count($action); $i++) { if ($i == 1){$newAction = $action[$i];} else {$newAction .= '_'.$action[$i];} } ?>

<form style="z-index:1;position:relative;bottom:20px;float:right; width:40%; text-align:left;" action="<?php echo HTTP_ROOT ?>admin/<?php echo $this->name.'/'.$newAction; ?><?php echo(@$this->request->params['pass'][0]?'/'.$this->request->params['pass'][0]:'') ?><?php echo(@$this->request->params['pass'][1]?'/'.$this->request->params['pass'][1]:'') ?><?php echo $sort.$dir; ?>" id="myLimitForm">
	<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Records per page')); ?></label>
	<select class="pagesize myWebsiteChange" style="float:none !important;">
		<?php if(@$this->request->params['named']['limit']){ ?>
			<option value="10" <?php echo(@$this->request->params['named']['limit'] && $this->request->params['named']['limit']=='10'?'selected="selected"':'') ?>><?php echo $this->requestAction('app/get-translate/'.base64_encode('10 results')); ?></option>
		<?php }else{ ?>
			<option value="10"  selected="selected"><?php echo $this->requestAction('app/get-translate/'.base64_encode('10 results')); ?></option>
		<?php } ?>	
		<option value="20" <?php echo(@$this->request->params['named']['limit'] && $this->request->params['named']['limit']=='20'?'selected="selected"':'') ?>><?php echo $this->requestAction('app/get-translate/'.base64_encode('20 results')); ?></option>
		<option value="30" <?php echo(@$this->request->params['named']['limit'] && $this->request->params['named']['limit']=='30'?'selected="selected"':'') ?>><?php echo $this->requestAction('app/get-translate/'.base64_encode('30 results')); ?></option>
		<option value="40" <?php echo(@$this->request->params['named']['limit'] && $this->request->params['named']['limit']=='40'?'selected="selected"':'') ?>><?php echo $this->requestAction('app/get-translate/'.base64_encode('40 results')); ?></option>
		<option value="1000" <?php echo(@$this->request->params['named']['limit'] && $this->request->params['named']['limit']=='1000'?'selected="selected"':'') ?>><?php echo $this->requestAction('app/get-translate/'.base64_encode('All')); ?></option>
	</select>		
</form>	
</div>

<div class="col-xs-4" style="z-index:2">
<div class="dataTables_paginate paging_bootstrap">
	<ul class="pagination">
		<?php
		echo $this->Paginator->prev('← Previous', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
		echo $this->Paginator->next('Next →', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		?>
	</ul>
</div>

</div>			
				
