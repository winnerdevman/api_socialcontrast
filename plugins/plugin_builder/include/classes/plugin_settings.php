<?php

extract($_POST);
switch($type ){
    case "setting_list":
        setting_list($plugin_name);
        break;
    case "delete_setting_item":
        delete_setting($plugin_name, $setting_name);
        break;
    case "save_settings":
        save_settings($plugin_name, $setting_name, $setting_value);
        break;
    case "update_settings":
        update_settings($plugin_name, $setting_name, $setting_value);
        break;
}

function setting_list($plugin_name){
    $path = $_SERVER["DOCUMENT_ROOT"] . "/plugins/plugin_creator/" . $plugin_name . "/settings/settings.json";
    $result = ["status"=> "success", "data"=> ""];
    if (file_exists($path )){
        $result["data"] = json_decode(file_get_contents($path));
    }else{
        $result["status"] = "error";
    }
    echo json_encode($result);
}

function save_settings($plugin_name, $setting_name, $setting_value){
    $path = $_SERVER["DOCUMENT_ROOT"] . "/plugins/plugin_creator/{$plugin_name}/settings/settings.json";
    $result = ["status"=> "success"];
    if (!file_exists($path )){
        $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, "{}");
        fclose($myfile);
    }
    $data = file_get_contents($path);
    $data = json_decode($data);
    $items = [];
    if (isset($data->items)){
        $items = $data->items;
    }
    
    foreach($items as $key=>$item){
        if ($item->name == $setting_name){
            $result["status"] = "duplicated";
            break;
        }
    }

    if ($result["status"] == "success"){
        array_push($items, ["name"=>$setting_name, "value"=> $setting_value]);
    }
    
    $str = json_encode($items);
    $str = "{\"items\":" . $str . "}";
    $myfile = fopen($path, "w") or die("Unable to open file!");
    fwrite($myfile, $str);
    fclose($myfile);

    echo json_encode($result);
}

function update_settings($plugin_name, $setting_name, $setting_value){
    $path = $_SERVER["DOCUMENT_ROOT"] . "/plugins/plugin_creator/{$plugin_name}/settings/settings.json";
    $result = ["status"=> "success"];

    $data = json_decode(file_get_contents($path));
    $items = [];

    foreach($data->items as $key=>$item){
        if ($item->name != $setting_name){
            array_push($items, $item );
        }else{
            array_push($items, ["name"=> $setting_name, "value"=> $setting_value]);
        }
    }

    $str = json_encode($items);
    $str = "{\"items\":" . $str . "}";

    $myfile = fopen($path, "w") or die("Unable to open file!");
    fwrite($myfile, $str);
    fclose($myfile);

    echo json_encode($result);
}

function delete_setting($plugin_name, $setting_name ){
    $path = $_SERVER["DOCUMENT_ROOT"] . "/plugins/plugin_creator/{$plugin_name}/settings/settings.json";
    $result = ["status"=> "success"];

    $data = json_decode(file_get_contents($path));
    $items = [];

    foreach($data->items as $key=>$item){
        if ($item->name != $setting_name){
            array_push($items, $item );
        }
    }

    $str = json_encode($items);
    $str = "{\"items\":" . $str . "}";

    $myfile = fopen($path, "w") or die("Unable to open file!");
    fwrite($myfile, $str);
    fclose($myfile);

    echo json_encode($result);
}

?>