base_url = "/plugins/plugin_product_catalog/interfaces/php/post_comment.php";
upload_url = "/plugins/plugin_builder/include/classes/upload.php";
export_url = "/plugins/plugin_builder/include/classes/export_excel.php";
var table;
var sel_tr;
$(document).ready(function(){
	init_table();
	$("#post_comment_new").on("click", new_record);
	$("#post_comment_body").on("click", ".edit-item", edit_record );
	$("#post_comment_body").on("click", ".delete-item", delete_record );
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
			table: "post_comment",
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
	var tr_post_id1 = $("#post_comment_field_post_id1").val();
	var tr_photo2 = $("#post_comment_field_photo2_upload").attr("data-file");
	var tr_description = $("#post_comment_field_description").trumbowyg('html');
	$.ajax({
		url: base_url,
		data:{
			type: "save",
			id: id,
			post_id1: tr_post_id1,
			photo2: tr_photo2,
			description: tr_description,
		},
		type: "post",
		dataType: "json",
		success: function(data){
			if (data["status"] == "success" ){
				if (id == "-1"){
					var table_id = data["id"];
					table.row.add( ["<div class='post_comment_post_id1'>" + tr_post_id1 + "</div>", "<img width='100' data-file='" + tr_photo2+"' class='post_comment_photo2' src='/plugins/uploads/" + tr_photo2 + "'>", "<div class='post_comment_description'>" + tr_description + "</div>", '<button class="btn btn-xs btn-sm btn-primary mr-6 edit-item" data-id="' + table_id + '"><i class="fa fa-edit"></i></button><button class="btn btn-xs btn-sm btn-secondary delete-item" data-id="'+ table_id + '"><i class="fa fa-trash"></i></button>']).draw( false );
				}else{
					$(sel_tr).find(".post_comment_post_id1").html(tr_post_id1 );
					$(sel_tr).find(".post_comment_photo2").attr("width", "100").attr("data-file", tr_photo2).attr("src", "/plugins/uploads/" + tr_photo2);
					$(sel_tr).find(".post_comment_description").html(tr_description );
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
	$("#post_comment_field_post_id1").val($(sel_tr).find(".post_comment_post_id1").html());
	var img_file = $(sel_tr).find(".post_comment_photo2").attr("data-file");
	if (img_file && img_file != "" ){
		var container = $("#post_comment_field_photo2_upload + .ajax-file-upload-container");
		var status = $("<div>").addClass("ajax-file-upload-statusbar").appendTo(container );
		$("<img>").addClass("ajax-file-upload-file-img").attr("src", "/plugins/uploads/" + img_file ).appendTo(status);
		$("<div>").addClass("ajax-file-upload-red").text("Delete").appendTo(status );
		$("#post_comment_field_photo2_upload").attr("data-type", "file").attr("data-file", img_file);
		$("#post_comment_field_photo2_upload").hide();
		$("#post_comment_field_photo2_btn").hide();
	}
	$("#post_comment_field_description").trumbowyg("html",$(sel_tr).find(".post_comment_description").html());
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
	var parent = $("#post_comment_body");
	for(var i = 0; i < data.length; i++ ){
		var item = data[i];
		var tr = $('<tr>').attr('data-id', item[0]).appendTo(parent );
		td = $("<td>").appendTo(tr);
		$("<div>").addClass("post_comment_post_id1").html(item[1]).appendTo(td);
		td = $("<td>").appendTo(tr);
		$("<img>").attr("width", "100").attr("data-file", item[2]).attr("src", "/plugins/uploads/" + item[2]).addClass("post_comment_photo2").appendTo(td);
		td = $("<td>").appendTo(tr);
		$("<div>").addClass("post_comment_description").html(item[3]).appendTo(td);
		var td = $("<td>").appendTo(tr );
		$("<button>").addClass("btn btn-xs btn-sm btn-primary mr-6 edit-item")
			.attr("data-id", item[0])
			.html("<i class='fa fa-edit'></i>").appendTo(td );
		$("<button>").addClass("btn btn-xs btn-sm btn-secondary delete-item")
			.attr("data-id", item[0])
			.html("<i class='fa fa-trash'></i>").appendTo(td );
	}
	table = $("#post_comment_table").DataTable();
	$('#post_comment_table tbody').on( 'click', 'tr', function () {
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
	var extraObj = $("#post_comment_field_photo2_upload").uploadFile({
		url:upload_url, fileName:"apifile", autoSubmit:false,returnType:"json",onSuccess:function(files,data,xhr,pd){if (data["status"] == "success"){$("#post_comment_field_photo2_upload").attr("data-file", data["file"] );}else{$("#post_comment_field_photo2_upload").attr("data-file", "" );}}});
	$("#post_comment_field_photo2_btn").click(function(){extraObj.startUpload();});
});