<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Http\Requests\DataRequest;

class DataController extends Controller
{
    public function store(DataRequest $request) 
    {
    	Data::create(request([
    		'firstname', 
    		'surname', 
    		'email', 
    		'telephone', 
    		'gender',
    		'dob', 
    		'comments'
    	]));

    	return redirect('/')->with('message', 'Data stored successfully');
    }
}
