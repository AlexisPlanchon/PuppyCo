<?php
require APPPATH . '/libraries/REST_Controller.php';
 
class Example_api extends REST_Controller {
 
    function user_get()
    {
        // respond with information about a user
    }
 
    function user_put()
    {
        // create a new user and respond with a status/errors
    }
 
    function user_post()
    {
        // update an existing user and respond with a status/errors
    }
 
    function user_delete()
    {
        // delete a user and respond with a status/errors
    }
}