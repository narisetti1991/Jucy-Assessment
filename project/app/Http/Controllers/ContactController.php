<?php
namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController
{


    public function index($search=null) {

        $contact = new Contact;
        $data = $contact->contact();

         if(isset($_GET['search']) && !empty($_GET['search'])){
             $result = array();
             foreach ($data AS $con){
               if(stripos($con->name, $_GET['search'] ) !== false){
                   $result[] = $con;
               }else if(stripos($con->username,$_GET['search'] ) !== false){
                   $result[] = $con;
               }else if(stripos($con->email,$_GET['search'] ) !== false){
                   $result[] = $con;
               }else if(stripos($con->address->street,$_GET['search'] ) !== false) {
                   $result[] = $con;
               }else if(stripos($con->address->city, $_GET['search'] ) !== false){
                   $result[] = $con;
               }else if(stripos($con->company->name, $_GET['search'] ) !== false){
                   $result[] = $con;
               }else if(stripos($con->company->catchPhrase, $_GET['search'] ) !== false){
                   $result[] = $con;
               }else if(stripos($con->company->bs, $_GET['search'] ) !== false){
                   $result[] = $con;
               }
             }
         }else{
             $result = $data;
         }
        return view('index', ['data' => $result ] );
    }

    public function view() {
        $contact = new Contact;
        $data = $contact->contact();
        $alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $result = array();
        foreach ($alphabet as $val){
            $i = 0;
            $values = array();
            foreach ($data AS $con){
               if(strtolower(substr( $con->name, 0, 1 )) == strtolower($val)){
                    $i ++;
                    $values['name'] = $val;
                    $values['count'] = $i;
                }
            }
            if(isset($values) && !empty($values) && count($values)>0){
                $result[] = $values;
            }
        }
        return view('view', ['data' => $result ] );

    }
public function locations() {
        $contact = new Contact;
        $data = $contact->contact();
        return view('locations', ['data' => $data ] );

    }


}