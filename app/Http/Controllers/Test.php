<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
class Test extends Controller
{
    //
    public function file(Request $request) 
    {
    	// dd($Request);
    	if ($file = $request->file('correos') != null) {
	    	try {
	    		$file = $request->file('correos');
				$formato = \File::extension($file->getClientOriginalName());
				$content = \File::get($file);

				$contentArray = explode("\n", $content);

				$mailList = [];

				foreach($contentArray as $line) {
				    echo $line;
				    if ($line != "") {
					    array_push($mailList, trim($line));
				    }
				}
				dd($mailList);

	    	} catch (Illuminate\Contracts\Filesystem\FileNotFoundException $exception) {
	    		
	    	}
    	} else { // Si el archivo es vacio
    		dd($request);
    	}
    }
}
