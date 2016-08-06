<?php

//storing sessions in a db instead of plain text file

function open() {

    return true;
}

function write($key, $data) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $access = time();
    $agent = $_SERVER['HTTP_USER_AGENT'];
    #print $key."#".$data." #".$access." #".$ip."# ".$agent;
    $rows = getData("SELECT sess_id FROM sessdata WHERE sess_id=:id", array("id" => $key));
    if (count($rows) == 1) {
        $sql = "UPDATE sessdata set sess_data=:datav,access=:access,";
        $sql.="ipaddress=:ip,useragent=:agent where sess_id=:id";
        runquery($sql, array("id" => $rows[0]['sess_id'], "datav" => $data, 'access' => $access, 'ip' => $ip, 'agent' => $agent));
    } else {
        $sql = "insert into sessdata(sess_id,access,ipaddress,useragent,sess_data) values(:id,:access,:ip,:agent,:datv)";
        runquery($sql, array("id" => $key, "access" => $access, "ip" => $ip, "agent" => $agent, "datv" => $data));
    }
}

function read($key) {
    $rows = getData("SELECT sess_data from sessdata WHERE sess_id=:id", array("id" => $key));
    if (count($rows) == 1)
        return $rows[0]['sess_data'];
    else
        return '';
}

function gc($max) {
//delete oldsessions;
    return(runquery("DELETE FROM sessdata WHERE access<:old", array("old" => time() - $max)));
}

function destroy($key) {
//delete session by id
    $id = session_id();
    return(runquery("DELETE FROM sessdata WHERE sess_id=:id OR sess_id=:s", array("id" => $key, "s" => $id)));
}

function close() {
    return true;
}

session_set_save_handler('open', 'close', 'read', 'write', 'destroy', 'gc');
