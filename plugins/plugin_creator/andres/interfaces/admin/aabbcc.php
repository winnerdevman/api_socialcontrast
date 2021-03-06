<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"><script type="text/javascript" charset="utf-8" src="assets/js/aabbcc.js"></script>
<div class='main-body'>
	<h1 class="mt-1r">DataTables Editor <span>aabbcc</span></h1>
	<div class="row mt-1r mb-1r"><div class="col-md-12"><button class="btn btn-success" id="aabbcc_new">New</button><button class="btn btn-success" id="export_excel">Export</button></div></div>
	<div class="row mt-2r">
		<div class="col-md-12">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="aabbcc_table" width="100%">
			<thead><tr>
				<th>Ab</th>
				<th>Cd</th>
				<th>Ef</th>
				<th>Gh</th>
				<th>Ij</th>
				<th>Action</th>
			</tr></thead>
			<tbody id='aabbcc_body'>
			</tbody>
		</table>
		</div>
	</div>
</div>
<div class="modal column-detail-modal" tabindex="-1" role="dialog" id="edit-modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">aabbcc Table</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="form">
			<div class="modal-body">
				<div class="form-group row">
					<label for="field-default-value" class="col-sm-2 col-form-label text-right">Ab</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" data-type="date" id="aabbcc_field_ab">
				</div>
			</div>
				<div class="form-group row">
					<label for="field-default-value" class="col-sm-2 col-form-label text-right">Cd</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" data-type="string" id="aabbcc_field_cd">
				</div>
			</div>
				<div class="form-group row">
					<label for="field-default-value" class="col-sm-2 col-form-label text-right">Ef</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" data-type="string" id="aabbcc_field_ef">
				</div>
			</div>
				<div class="form-group row">
					<label for="field-default-value" class="col-sm-2 col-form-label text-right">Gh</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" data-type="string" id="aabbcc_field_gh">
				</div>
			</div>
				<div class="form-group row">
					<label for="field-default-value" class="col-sm-2 col-form-label text-right">Ij</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" data-type="string" id="aabbcc_field_ij">
				</div>
			</div>
			</div>
		</form>
	<div class="modal-footer">
			<input type="hidden" id="data-id" value="-1"/>
			<button type="button" class="btn btn-primary" id="save_record">Save</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
