<?php
namespace App\Models;
/**
 * Created by PhpStorm.
 * User: naris
 * Date: 24/05/2018
 * Time: 11:03 AM
 */

class Contact
{

    public function contact()
    {
        return json_decode(file_get_contents("http://jsonplaceholder.typicode.com/users"));

    }

}