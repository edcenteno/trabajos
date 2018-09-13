<?php

namespace App\Http\Controllers;

use Chatkit\Chatkit;
use Exception;

define("__ArhuChat", [
    'storage' => $_SERVER['DOCUMENT_ROOT'].'/storage',
    'files' => [
        'rooms' => '/rooms.json',
        'clients' => '/clients.json',
    ],
    'clients' => [
        'SERVER',
        'root',
        'sarah'
    ],
    'avatar' => 'https://'.$_SERVER['SERVER_NAME'].'/images/default-arhu-chat.jpg',
    'root' => 'SERVER',
    'chatkit' => [
        'instance_locator' => 'v1:us1:218298b8-7d76-4d97-818d-280d342d26bd',
        'key' => 'aa2d4dbe-1720-4989-8b23-badf04da2f0c:xclm1auusXFejUlIyQRsb5/FY/Ylqs9MS6Mrg4Fshqo='
    ],

]);

class ArhuChat {

    private static $user = __ArhuChat['root'];
    private static $storage = null;
    private static $rooms = null;
    private static $clients = __ArhuChat['clients'];

    private static function init(){

        self::$storage = __ArhuChat['storage'];

        try{
            $filename = __ArhuChat['files']['rooms'];
            if(!file_exists(self::$storage.$filename)){
                self::json_emit(self::$storage.$filename, []);
            }
            $list = self::json_file(self::$storage.$filename);
            if($list === false) throw new Exception("Error in the reading file rooms, your are verifying folder premisses");
            else self::$rooms = $list;

            $filename = __ArhuChat['files']['clients'];
            if(!file_exists(self::$storage.$filename)){
                self::json_emit(self::$storage.$filename, self::$clients);
            }
            $list = self::json_file(self::$storage.$filename);
            if($list == false) throw new Exception("Error in the reading file clients, your are verifying folder premisses");
            else self::$clients = $list;
        }catch(Exception $e){
            echo $e->getMessage();
            echo "\n  =================  \n";
            echo $e->getTraceAsString();
        }
    }

    public static function newUser(String $client, String $fullname, $avatar = __ArhuChat['avatar']){

        self::init();

        if(!self::clientExist($client)){

            $chatkit = new Chatkit(__ArhuChat['chatkit']);

            $chatkit->authenticate([ 'user_id' => self::$user ]);
            $chatkit->createUser([
                'id' => $client,
                'name' => $fullname,
                'avatar_url' => $avatar
            ]);

            array_push(self::$clients, $client);

            $filename = __ArhuChat['files']['clients'];
            if(!self::json_emit(self::$storage.$filename, self::$clients)) throw new Exception("Error in the writing file json, your are verifying folder premisses");

        }else throw new Exception("Error, the client exists. Intent with a new ID.");
    }

    public static function save(String $clientID, array $data){

        self::init();
        try{

            $room = self::room($data['creator'], $data['client']);
            $data['updated'] = date("Y-m-d H:i:s");
            if(self::clientExist($clientID)){
                $filename = '/'.$room.'.json';
                if(!self::json_emit(self::$storage.$filename, $data)) throw new Exception("Error in the writing file json, your are verifying folder premisses");
            }else throw new Exception("Error, the client not exist.");
        }catch(Exception $e){
            echo $e->getMessage();
            echo "\n  =================  \n";
            echo $e->getTraceAsString();
        }

    }

    public static function load($user, $client){

        self::init();
        try{
            $room = self::room($user, $client);
            if(self::clientExist($user) && self::clientExist($client)){
                $filename = '/'.$room.'.json';
                if(!file_exists(self::$storage.$filename)){
                    self::json_emit(self::$storage.$filename, [
                        'name' => $room,
                        "room" => null,
                        "creator" => $user,
                        "client" => $client,
                        "chat" => null,
                        "updated" => date("Y-m-d H:i:s"),
                    ]);
                }
                $json = self::json_file(self::$storage.$filename);
                if($json === false) throw new Exception("Error in the reading file json, your are verifying folder premisses.");
                else echo json_encode($json);
            }else throw new Exception("Error, the client or user not exist.");
        }catch(Exception $e){
            echo $e->getMessage();
            echo "\n  =================  \n";
            echo $e->getTraceAsString();
        }

    }

    public static function destroy(){

        self::init();
        $chatkit = self::$chatkit;
    }

    public static function clean(){

        self::init();
        $chatkit = self::$chatkit;
    }

    public static function clientExist(String $clientID){

        self::init();
        $clients = self::$clients;
        if(!array_search($clientID, $clients)) return false;
        return true;
    }

    // Getters and Setters of Storage

    protected static function room($user, $client){
        self::init();
        $room = [
            "room" => "R".time(),
            "users" => [$user, $client]
        ];
        $exist = true;
        if(count(self::$rooms) == 0){
            array_push(self::$rooms, $room);
            $filename = __ArhuChat['files']['rooms'];
            if(!self::json_emit(self::$storage.$filename, self::$rooms)) throw new Exception("Error in the writing file rooms, your are verifying folder premisses");
            $exist = true;
        }else {
            foreach (self::$rooms as $i => $value) {
                $search_user = (array_search($user, $value->users)===false) ? false : true;
                $search_client = (array_search($client, $value->users)===false) ? false : true;
                $x = [$search_user,$search_client];
                if($search_user == true && $search_client == true) {
                    $room = $value->room;
                    $exist = true;
                    break;
                }
                elseif($search_user == false || $search_client == false){
                    $exist = ($exist) ? false : false;
                }
            }
            if(!$exist){
                array_push(self::$rooms, $room);
                $filename = __ArhuChat['files']['rooms'];
                if(!self::json_emit(self::$storage.$filename, self::$rooms)) throw new Exception("Error in the writing file rooms, your are verifying folder premisses");
            }
        }
        $room = (is_array($room)) ? $room["room"] : $room;
        return $room;
    }

    public static function setStorage(String $dir){

        self::init();
        self::$storage = $dir;
    }

    public static function getStorage(String $dir){
        return self::$storage;
    }

    protected static function json_emit($file_name, $str){
        $fp = fopen($file_name, 'w');
        if($fp === false) return false;
        fwrite($fp, json_encode($str));
        return true;
    }

    protected static function json_file($file_name){
        $fp = fopen($file_name, 'r');
        if($fp === false) return false;
        $str = fread($fp, filesize($file_name));
        return json_decode($str);
    }


}
