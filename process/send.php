<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Descripción de send
 *
 * @author merma158 <jurbano@innodite.com en Innodite, C.A.> | javierurbano11@gmail.com
 * @package   block_simplehtml
 */

ini_set('soap.wsdl_cache_enabled', '0');
require('../../../config.php');

class user_send {
    
    private $url = "http://localhost/TestWebServiceYii/index.php?r=wsuser/ws";
    
    public function __construct() {}
    
    public function getUrl(){
        return $this->url;
    }
    
    public function get_data_users(){
        global $DB;
        //'SELECT u.id, u.country, u.username FROM {user} u'
        $users = $DB->get_records_sql('select distinct
                                                u.id, 
                                                u.username, 
                                                u.firstname, 
                                                u.lastname,
                                                u.email,
                                                u.phone1,
                                                u.lang,
                                                u.country,
                                                u.city,
                                                u.address,
                                                u.institution,
                                                u.url,
                                                r.id,
                                                r.name,
                                                r.archetype
                                         from {user} u 
                                                inner join {role_assignments} ra on ra.userid = u.id
                                                inner join {role} r on r.id = ra.roleid');
        return $users;
    }
}

$ob = new user_send();
//print_r(json_encode(array("exito"=>$ob->get_data_users())));
$client = new SoapClient($ob->getUrl(), array("trace" => 1, "exception" => 0));
$result = $client->setIntouser(json_encode($ob->get_data_users()));
print_r($result);