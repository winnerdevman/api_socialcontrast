<!-- <div class="row" style="align-items:flex-end">
    <div class="col-md-3">
        <div class="form-group">
            <label>Datatable List</label>
            <select class="form-control" id="dt_tbname"></select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <button class="btn btn-default" type="button" id="dt_select_tb_btn">Select Datatable</button>
            <button class="btn btn-success hide" type="button" id="dt_update_tb_btn">Update Datatable</button>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group dt_columns_visibility">
            <div class="dt_column_title">Columns Visibility</div>
            <ul class="dt_columns_ul">
            </ul>
        </div>
    </div>
    <div class="col-md-4 text-right">
        <div class="form-group">
            <button class="btn btn-default" type="button" id="dt_table_data_new">Add</button>
            <button class="btn btn-default" type="button" id="dt_table_data_adv_search">Advanced Search</button>
            <button class="btn btn-primary" type="button" id="dt_import_excel">Import</button>
            <button class="btn btn-success" type="button" id="dt_export_excel">Export</button>
        </div>
    </div>
</div> -->
<div class="row mb-1r">
    <div class="col-md-2 text-right">
        <label>Datatable List</label>
    </div>
    <div class="col-md-3">
        <input type="text" id="dt_datatable_list" class="form-control">
    </div>
    <div class="col-md-1">
        <button type="button" class="btn btn-default" id="dt_datatable_load">Load</button>
    </div>
    <div class="col-md-6 text-right">
        <button type="button" class="btn btn-primary" id="dt_datatable_preview">Preview</button>
    </div>
</div>
<div class="row mb-1r">
    <div class="col-md-2 text-right">
        <label>Table/Views List</label>
    </div>
    <div class="col-md-3">
        <input type="text" id="dt_table_view_list" class="form-control">
    </div>
    <div class="col-md-1">
        <button type="button" class="btn btn-default" id="dt_table_view_load">Load</button>
    </div>
</div>
<div class="row mb-1r">
    <div class="col-md-12" id="dt_columns_list">
    </div>
</div>
<div class="row mb-1r">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary form-control" id="add_dt_new_column">+</button>
    </div>
</div>
<div class="row mb-1r">
    <div class="col-md-2 text-right"><label>Datatable Name</label></div>
    <div class="col-md-2">
        <input type="text" class="form-control" id="dt_datatable_name">
    </div>
    <div class="col-md-1">
        <button class="btn btn-primary" id="dt_datatable_save_btn">Save</button>
    </div>
</div>

<!-- <form enctype="multipart/form-data" class="hide">
    <input id="upload" type=file  name="files[]">
</form>

<div class="filter-wrap mt-1r hide" id="filter-wrap"></div>
<div class="row mt-2r">
    <div class="col-md-12" id="dt_table_wrap">
        <table cellpadding="0" cellspacing="0" class="display" id="dt_table_data" width="100%">
            <thead>
                <tr>
                </tr>
            </thead>
            <tbody id='dt_table_data_body'>
            </tbody>
        </table>
    </div>
</div>

<div class="modal column-detail-modal" tabindex="-1" role="dialog" id="dt-edit-modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="dt_table_title_modal">Table</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="form">
                <div class="modal-body" id="dt_edit_modal_body">
                </div>
            </form>
            <div class="modal-footer">
                <input type="hidden" id="data-dt-id" value="-1"/>
                <button type="button" class="btn btn-primary" id="dt_save_record">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->