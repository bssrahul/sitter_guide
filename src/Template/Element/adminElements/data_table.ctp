<?php echo $this->Html->script(['datatables/js/jquery.dataTables.js','datatables/tools/js/dataTables.tableTools.js']); ?>
<script>
	$(document).ready(function () {
		$('input.tableflat').iCheck({
			checkboxClass: 'icheckbox_flat-green',
			radioClass: 'iradio_flat-green'
		});
	});

	var asInitVals = new Array();
	$(document).ready(function () {
		var oTable = $('#example').dataTable({
			"oLanguage": {
				"sSearch": "<?php echo $this->requestAction('app/get-translate/'.base64_encode('Search All Column')); ?>:"
			},
			"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

				var numStart = 0;

				var index = numStart +  iDisplayIndexFull + 1;
				$("td:first", nRow).html(index);
				return nRow;
			},
			"aoColumnDefs": [
				{
					'bSortable': false,
					'aTargets': [0]
				} //disables sorting for column one
			],
			'iDisplayLength': 10,
			"sPaginationType": "full_numbers",
			"dom": 'T<"clear">lfrtip',
			"tableTools": {
				"sSwfPath": "<?php echo HTTP_ROOT.'webroot/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'; ?>"
			}
		});
		$("tfoot input").keyup(function () {
			/* Filter on the column based on the index of this element's parent <th> */
			oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
		});
		$("tfoot input").each(function (i) {
			asInitVals[i] = this.value;
		});
		$("tfoot input").focus(function () {
			if (this.className == "search_init") {
				this.className = "";
				this.value = "";
			}
		});
		$("tfoot input").blur(function (i) {
			if (this.value == "") {
				this.className = "search_init";
				this.value = asInitVals[$("tfoot input").index(this)];
			}
		});
	});
</script>
<style>
.catImg{
	height:75px;
	width:60% !important;
}
.img-circle.profile_img {
	background: #fff none repeat scroll 0 0;
	border: 1px solid rgba(52, 73, 94, 0.44);
	margin-left: 0px !important;
	margin-top: 0px !important;
	position: inherit;
	z-index: 1000;
}
.paging_full_numbers {
	height: 50px !important;
	line-height: 22px;
	width: 400px;
}
.text-centerimage img {
	width: 75px !important;
}
</style>
