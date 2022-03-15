<?php
	include_once("../../../../config/config.php");
	include_once("./posts_sql.php");include_once '../../../../config/database.php';$db = new Database();$db->getConnection(API_DB_NAME );
	extract($_POST);
	switch($type ){
		case "init_table":
			init_table();
			break;
		case "delete":
			delete_tr($id);
			break;
		case "save":
			save_tr($id ,$title,$title,$content,$description);
			break;
	}
function init_table(){
	$query = $GLOBALS["query"];
	$db = $GLOBALS["db"];
	$result = $db->load_data("posts");
	$data = [];
	if($result){
		while ($row = $result->fetch(PDO::FETCH_BOTH)){
			$item = [];
			array_push($item, $row["id"]);
			array_push($item, $row["title"]);
			array_push($item, $row["title"]);
			array_push($item, $row["content"]);
			array_push($item, $row["description"]);
			array_push($data, $item );
		}
	}
	echo json_encode(["status"=>"success", "data"=> $data ]);
}
function delete_tr($id ){
	$query = "delete from posts where id={$id}";
	$db = $GLOBALS["db"];
	$db->run_query($query );
	echo json_encode(["status"=> "success"]);
}
function save_tr($id, $title,$title,$content,$description){
	$db = $GLOBALS["db"];
	if ($id == "-1"){
		$query = "insert into posts set title='{$title}',title='{$title}',content='{$content}',description='{$description}'";
	}else{
		$query = "update posts set title='{$title}',title='{$title}',content='{$content}',description='{$description}' where id={$id}";
	}
	$id = $db->update_query($query );
	echo json_encode(["status"=> "success", "id"=> $id ]);
}
?>