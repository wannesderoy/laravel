<?php

class formController extends BaseController {

	public function formSubmit() {
        return View::make('account.photo_album');
    }
 
    /**
     * handle data posted by ajax request
     */
    public function create() {
        //check if its our form
        if ( Session::token() !== Input::get('_token') ) {
            return Response::json(array(
                'msg' => 'Unauthorized attempt to create setting'
            ) );
        }
 
        $setting_name = Input::get('setting_name');
        $setting_value = Input::get('setting_value');
 
        //.....
        //validate data
        //and then store it in DB
        //.....
 
        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
 
        return Response::json($response);
    }
 
//end of class
}

?>