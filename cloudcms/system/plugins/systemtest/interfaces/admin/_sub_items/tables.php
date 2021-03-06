
<div class="row">
    <div class="col-md-2">
        <h4>Table Select</h4>
    </div>
    <div class="col-md-3">
        <select class="form-control" id="datatb_table_list_sel">
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-success" type="button" id="datatb_select_table">Select Table</button>
        <button class="btn btn-default" type="button" id="datatb_new_table">New Table</button>
        <button class="btn btn-primary hide" type="button" id="datatb_check_table">Preview Table</button>
    </div>
    <div class="col-md-5 text-right">
        <button class="btn btn-primary" id="datatb_gen_sql" type="button">View SQL</button> 
        <button class="btn btn-primary" id="datatb_save_btn" type="button">Save SQL</button>
    </div>
</div>
<hr>
<div class="row mt-1r">
    <div class="col-md-12">
        <h4>Database</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-1 hide">Server Type : </div>
    <div class="col-md-1 hide"><label>PHP</div>
    <div class="col-md-1">Database type :</div>
    <div class="col-md-1"><label>My SQL</div>
</div>
<div class="row mt-1r mb-1r align-center">
    <div class="col-md-1">Table Name : </div>
    <div class="col-md-2">
        <input type="text" class="form-control" id="datatb_table-name-input">
    </div>
    <div class="col-md-1">Primary Key : </div>
    <div class="col-md-2">
        <input type="text" class="form-control" id="datatb_primary-key-input" value="id">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12"><h4>Form Table</h4></div>
</div>
<div class="row">
    <div class="col-md-12" id="datatb_table-property">
    </div>
</div>
<div class="row mt-24">
    <div class="col-md-12" id="datatb_table-field-add">
        <button class="form-control btn btn-success" type="button" id="datatb_add-table-prop-item-btn"> + </button>
    </div>
</div>
<hr>
<div class="row hide">
    <div class="col-md-12"><h5>Action</h5></div>
</div>
<div class="row mt-24 hide">
    <div class="col-md-6">
        <button class="btn btn-success hide" type="button" id="datatb_run_btn">Run Now</button>
        <button class="btn btn-primary" type="button" id="datatb_save_btn">Save Table</button>
    </div>
    <div class="col-md-6">
        <label class="mr-1r">View: </label>
        <button class="btn btn-primary" type="button" id="datatb_gen_sql">SQL</button>
        <button class="btn btn-primary hide" type="button" id="datatb_gen_html">HTML</button>
        <button class="btn btn-primary hide" type="button" id="datatb_gen_javascript">Javascript</button>
        <button class="btn btn-primary hide" type="button" id="datatb_gen_php">PHP</button>
        <button class="btn btn-primary hide" type="button" id="datatb_gen_json">JSON</button>
    </div>
</div>


<div class="modal column-detail-modal" tabindex="-1" role="dialog" id="datatb_generated-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generated</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="datatb_generated_content">
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal column-detail-modal" tabindex="-1" role="dialog" id="datatb_column-detail-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Field Configuration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form">
                <div class="modal-body">
                    <div class="row">
                        <h5>Field Name and Type</h5>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="field-title" class="col-sm-4 col-form-label">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="datatb_field-title-md">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="field-column-name" class="col-sm-4 col-form-label">SQL Column Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="datatb_field-column-name-md">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="field-type" class="col-sm-4 col-form-label">Type</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="datatb_field-type-md">
                                        <option data-type="varchar" value="varchar(255)">Text</option>
                                        <option data-type="int" value="int(11)">Integer</option>
                                        <option data-type="double" value="double">Double</option>
                                        <option data-type="varchar" value="varchar(100)">Password</option>
                                        <option data-type="text" value="text">Text Area</option>
                                        <option data-type="varchar" value="varchar(300)">Image</option>
                                        <option data-type="tinyint" value="tinyint">Check</option>
                                        <option data-type="date" value="date">Date</option>
                                        <option data-type="datetime" value="datetime">Datetime</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="field-default-value" class="col-sm-4 col-form-label">Default Value</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="datatb_field-default-value-md">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="table-list" class="col-sm-4 col-form-label">Refereance Table</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="datatb_table-list-md">
                                        <option value="">Select Table</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="field-list" class="col-sm-4 col-form-label">Reference Field</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="datatb_field-list-md">
                                        <option value="">Select Field</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <h5>Validation</h5>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="field-default-value" class="col-sm-4 col-form-label">Required</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="field-required" id="datatb_required_yes" value="1" checked>
                                        <label class="form-check-label" for="required_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="field-required" id="datatb_required_no" value="2" checked>
                                        <label class="form-check-label" for="required_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hide">
                        <h5>Show In</h5>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="field-default-value" class="col-sm-4 col-form-label">Table</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="table-show" id="datatb_table_yes" value="1" checked>
                                        <label class="form-check-label" for="table_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="table-show" id="datatb_table_no" value="2" checked>
                                        <label class="form-check-label" for="table_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="field-default-value" class="col-sm-4 col-form-label">Editor</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="editor-show" id="datatb_editor_yes" value="1" checked>
                                        <label class="form-check-label" for="editor_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="editor-show" id="datatb_editor_no" value="2" checked>
                                        <label class="form-check-label" for="editor_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="datatb_save_config">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="hide" id="datatb_table-prop-item-template">
    <div class="table-prop-item mt-1r" 
            data-column="" data-columntype="" data-default="" data-required="" data-reftable="NONE" data-reffield="NONE">
        <div class="fa fa-arrows-alt"></div>
        <div class="field-props-wrap">
            <div class="field-prpos">
                <div class="field-title">
                    <label class="">Title</label>
                    <input type="text" class="form-control field-title-input">
                </div>
                <div class="field-type ml-1r mr-1r">
                    <label class="">Type</label>
                    <select class="form-control field-type-input">
                        <option data-type="varchar" value="varchar(255)">Text</option>
                        <option data-type="int" value="int(11)">Integer</option>
                        <option data-type="double" value="double">Double</option>
                        <option data-type="varchar" value="varchar(100)">Password</option>
                        <option data-type="text" value="text">Text Area</option>
                        <option data-type="varchar" value="varchar(300)">Image</option>
                        <option data-type="tinyint" value="tinyint">Check</option>
                        <option data-type="date" value="date">Date</option>
                        <option data-type="datetime" value="datetime">Datetime</option>
                    </select>
                </div>
                <div class="field-required ml-1r mr-1r">
                    <label class="full-width">Required</label>
                    <input type="checkbox" class="field-required-input mt-10" checked>
                </div>
                <div class="field-title">
                    <label class="">Default Value</label>
                    <input type="text" class="form-control field-default-value-input">
                </div>
                <div class="field-required ml-1r mr-1r hide">
                    <label class="full-width ">Show Table</label>
                    <input type="checkbox" class="field-show-table-input mt-10" checked>
                </div>
                <div class="field-required ml-1r mr-1r hide">
                    <label class="full-width">Show Editor</label>
                    <input type="checkbox" class="field-show-editor-input mt-10" checked>
                </div>
                <div class="field-action">
                    <button type="button" class="btn btn-danger mt-24 remove-table-prop-item">Remove</button>
                </div>
            </div>
            <div class="field-add-props">
                <a href="javascript:;" class="add-props-edit">
                    Refrence Info - Table: 
                    <span class="reference_table_span font-bold">NONE</span>
                    , Field: 
                    <span class="reference_field_span font-bold">NONE</span>
                </a>
            </div>
        </div>
    </div>
</div>