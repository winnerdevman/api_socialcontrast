base_url = "/plugins/plugin_product_catalog/interfaces/php/aabbcc.php";
upload_url = "/plugins/plugin_builder/include/classes/upload.php";
export_url = "/plugins/plugin_builder/include/classes/export_excel.php";
var table;
var sel_tr;
$(document).ready(function(){
	init_table();
	$("#aabbcc_new").on("click", new_record);
	$("#aabbcc_body").on("click", ".edit-item", edit_record );
	$("#aabbcc_body").on("click", ".delete-item", delete_record );
	$("#export_excel").on("click", export_excel );
	$("#save_record").on("click", save_record );
	$("body").on("click", ".ajax-file-upload-red", function(e){
		e.preventDefault();
		$(this).parent().parent().find("+ .btn").show();
		$(this).parent().parent().parent().find("div[data-type=file]").attr("data-file", "").show();
		$(this).parent().remove()
	});
	$("textarea").trumbowyg();
	var objs = $("select[data-type=relation]");
	for(var i = 0; i < objs.length; i++ ){
		var obj = objs[i];
		var obj_id = $(obj ).attr("id");
		var ref_table = $(obj).attr("data-reftable");
		var ref_field = $(obj).attr("data-reffield");
		set_relation_table_data(obj_id, ref_table, ref_field );
	}
});
function export_excel(){
	$.ajax({
		url: export_url,
		data:{
			table: "aabbcc",
		},
		type: "post",
		dataType: "json",
		success: function(data){
			if (data["status"] == "success" ){
				window.open("/plugins/excels/" + data["file"], "_blank");
			}else{
				toastr.error("failed");
			}
		}
	});
}
function save_record(){
	var id = $("#data-id").val();
	var tr_ab = $("#aabbcc_field_ab").val();
	var tr_cd = $("#aabbcc_field_cd").val();
	var tr_ef = $("#aabbcc_field_ef").val();
	var tr_gh = $("#aabbcc_field_gh").val();
	var tr_ij = $("#aabbcc_field_ij").val();
	$.ajax({
		url: base_url,
		data:{
			type: "save",
			id: id,
			ab: tr_ab,
			cd: tr_cd,
			ef: tr_ef,
			gh: tr_gh,
			ij: tr_ij,
		},
		type: "post",
		dataType: "json",
		success: function(data){
			if (data["status"] == "success" ){
				if (id == "-1"){
					var table_id = data["id"];
					table.row.add( ["<div class='aabbcc_ab'>" + tr_ab + "</div>", "<div class='aabbcc_cd'>" + tr_cd + "</div>", "<div class='aabbcc_ef'>" + tr_ef + "</div>", "<div class='aabbcc_gh'>" + tr_gh + "</div>", "<div class='aabbcc_ij'>" + tr_ij + "</div>", '<button class="btn btn-xs btn-sm btn-primary mr-6 edit-item" data-id="' + table_id + '"><i class="fa fa-edit"></i></button><button class="btn btn-xs btn-sm btn-secondary delete-item" data-id="'+ table_id + '"><i class="fa fa-trash"></i></button>']).draw( false );
				}else{
					$(sel_tr).find(".aabbcc_ab").html(tr_ab );
					$(sel_tr).find(".aabbcc_cd").html(tr_cd );
					$(sel_tr).find(".aabbcc_ef").html(tr_ef );
					$(sel_tr).find(".aabbcc_gh").html(tr_gh );
					$(sel_tr).find(".aabbcc_ij").html(tr_ij );
				}
				$("#edit-modal").modal("hide");
			}
		}
	});
}
function new_record(){
	$("#edit-modal input").val("");
	$(".ajax-file-upload-statusbar").remove();
	$("[data-type=file]").show();
	$("[data-type=file]").parent().find("button").show();
	$("#data-id").val("-1");
	$("#edit-modal").modal("show");
}
function delete_record(){
	var id = $(this).attr("data-id");
	sel_tr = $(this).parent().parent();
	if (confirm("Are you going to delete this record?")){
		$.ajax({
			url: base_url,
			data:{
				type: 'delete',
				id: id
			},
			type:"post",
			dataType: "json",
			success: function(data){
				if (data["status"] == "success"){
					table.row('.selected').remove().draw( false );
				}
			}
		})
	}
}
function edit_record(){
	$(".ajax-file-upload-statusbar").remove();
	var id = $(this).attr('data-id');
	sel_tr = $(this).parent().parent();
	$("#data-id").val(id );
	$("#aabbcc_field_ab").val($(sel_tr).find(".aabbcc_ab").html());
	$("#aabbcc_field_cd").val($(sel_tr).find(".aabbcc_cd").html());
	$("#aabbcc_field_ef").val($(sel_tr).find(".aabbcc_ef").html());
	$("#aabbcc_field_gh").val($(sel_tr).find(".aabbcc_gh").html());
	$("#aabbcc_field_ij").val($(sel_tr).find(".aabbcc_ij").html());
	$("#edit-modal").modal("show");
}
function init_table(){
	$.ajax({
		url: base_url,
		data:{
			type: "init_table"
		},
		dataType: "json",
		type: "post",
		success: function(data ){
			if (data["status"] == "success" ){
				load_data(data["data"]);
			}
		}
	});
}
function load_data(data ){
	var parent = $("#aabbcc_body");
	for(var i = 0; i < data.length; i++ ){
		var item = data[i];
		var tr = $('<tr>').attr('data-id', item[0]).appendTo(parent );
		td = $("<td>").appendTo(tr);
		$("<div>").addClass("aabbcc_ab").html(item[1]).appendTo(td);
		td = $("<td>").appendTo(tr);
		$("<div>").addClass("aabbcc_cd").html(item[2]).appendTo(td);
		td = $("<td>").appendTo(tr);
		$("<div>").addClass("aabbcc_ef").html(item[3]).appendTo(td);
		td = $("<td>").appendTo(tr);
		$("<div>").addClass("aabbcc_gh").html(item[4]).appendTo(td);
		td = $("<td>").appendTo(tr);
		$("<div>").addClass("aabbcc_ij").html(item[5]).appendTo(td);
		var td = $("<td>").appendTo(tr );
		$("<button>").addClass("btn btn-xs btn-sm btn-primary mr-6 edit-item")
			.attr("data-id", item[0])
			.html("<i class='fa fa-edit'></i>").appendTo(td );
		$("<button>").addClass("btn btn-xs btn-sm btn-secondary delete-item")
			.attr("data-id", item[0])
			.html("<i class='fa fa-trash'></i>").appendTo(td );
	}
	table = $("#aabbcc_table").DataTable();
	$('#aabbcc_table tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
		table.$('tr.selected').removeClass('selected');
		$(this).addClass('selected');
		}
	});
}
$(document).ready(function(){
});