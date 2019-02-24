<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Installer;
use Illuminate\Support\Facades\Input;

class PageController extends Controller
{
	public function homepage()
	    {
	       return view('pages.index');
	    }

   public function calc()
    {
       return view('pages.calculator');
    }


    public function recommend()
			{
				$location = Input::get ( 'location' );
				$installer = Installer::where ( 'location', 'LIKE', '%' . $location . '%' )->get ();
			if (count ( $installer ) > 0)
				return view('pages.location')->withDetails ( $installer )->withQuery ( $installer );
			else
				return view('pages.location')->withMessage ( 'No Installer in Your Region!' );
			}


    
}
