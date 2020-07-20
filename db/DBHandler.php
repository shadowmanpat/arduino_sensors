<?php


class DBHandler
{
    private $db;
    private $requests_table;
    function __construct()
    {
//        parent::__construct();
        $this->db = new SQLite3('db/sensors');
        $this -> requests_table = "temperature_table";

    }

    function getAllRequests()
    {

        $res = $this->db->query('SELECT * FROM temperature_table ORDER BY id DESC');
        return $res;

    }
    function addTemp($temp){

        $temp = SQLite3::escapeString($temp);

        $stm = $this -> db->prepare('INSERT INTO "'.$this -> requests_table.'" ("value") VALUES (?)');
        $stm->bindParam(1, $temp);

        $stm->execute();
        $last_row_id = $this -> db->lastInsertRowID();
        return $last_row_id;

    }
//
//    function addRequest($title,$path,$headers,$method,$request,$code,$response){
//
//        $title = SQLite3::escapeString($title);
//        $path = SQLite3::escapeString($path);
//        $headers = SQLite3::escapeString($headers);
//        $method = SQLite3::escapeString($method);
//        $request = SQLite3::escapeString($request);
//        $code = SQLite3::escapeString($code);
//        $response = SQLite3::escapeString($response);
//
//        $stm = $this -> db->prepare('INSERT INTO "'.$this -> requests_table.'" ("title","path","headers","method","request","code","response") VALUES (?,?,?,?,?,?,?)');
//       $stm->bindParam(1, $title);
//        $stm->bindParam(2, $path);
//        $stm->bindParam(3, $headers);
//        $stm->bindParam(4, $method);
//        $stm->bindParam(5, $request);
//       $stm->bindParam(6, $code);
//        $stm->bindParam(7, $response);
//
//
//        $stm->execute();
//        $last_row_id = $this -> db->lastInsertRowID();
//        return $last_row_id;
//
//    }
// function updateRequest($id,$title,$path,$headers,$method,$request,$code,$response){
//
//        $id = SQLite3::escapeString($id);
//        $title = SQLite3::escapeString($title);
//        $path = SQLite3::escapeString($path);
//        $headers = SQLite3::escapeString($headers);
//        $method = SQLite3::escapeString($method);
//        $request = SQLite3::escapeString($request);
//        $code = SQLite3::escapeString($code);
//        $response = SQLite3::escapeString($response);
//        //UPDATE "requests_table" SET "id"='2', "title"='asdfga', "path"='fskajfklsaf', "headers"='fsdakjfkdas', "method"='fsadkljfkads', "request"='fasdfjklsa', "code"='345', "response"='dfklasjdgfsd' WHERE "rowid" = 2
//        $stm = $this -> db->prepare('UPDATE "'.$this -> requests_table.'" SET "title"=?, "path"=?, "headers"=?, "method"=?, "request"=?, "code"=?, "response"=? WHERE "id" = ?');
////        $stm = $this -> db->prepare('INSERT INTO "'.$this -> requests_table.'" ("title","path","headers","method","request","code","response") VALUES (?,?,?,?,?,?,?)');
////     $stm->bindParam(1, $title);
//     $stm->bindParam(1, $title);
//     $stm->bindParam(2, $path);
//     $stm->bindParam(3, $headers);
//     $stm->bindParam(4, $method);
//     $stm->bindParam(5, $request);
//     $stm->bindParam(6, $code);
//     $stm->bindParam(7, $response);
//     $stm->bindParam(8, $id);
//
//
//        $stm->execute();
//     return $this->db -> changes();
//
//    }
//
//    function  getRequest($id){
//        $id = SQLite3::escapeString($id);
//
//        $stm = $this -> db ->prepare('SELECT * FROM '.$this -> requests_table.' WHERE id = :id');
//        $stm->bindValue(':id', $id, SQLITE3_INTEGER);
//
//        $res = $stm->execute();
//        while ($row = $res->fetchArray()) {
//          return $row;
//        }
//        return false;
//
//    }
//    function  deleteRequest($id){
//        $id = SQLite3::escapeString($id);
////        DELETE FROM "requests_table" WHERE ("rowid" = 1)
//        $stm = $this -> db ->prepare('DELETE FROM  '.$this -> requests_table.' WHERE id = :id');
//        $stm->bindValue(':id', $id, SQLITE3_INTEGER);
//
//       $stm->execute();
//        $res = $this->db->changes();
//        return $res;
//
//
//    }
//    function  getRequestByPath($path){
//
//        $path = SQLite3::escapeString($path);
//
//        $stm = $this -> db ->prepare('SELECT * FROM '.$this -> requests_table.' WHERE path = :path');
//        $stm->bindValue(':path', $path);
//
//        $res = $stm->execute();
//        while ($row = $res->fetchArray()) {
//
//            return $row;
//        }
//
//        return false;
//    }
}