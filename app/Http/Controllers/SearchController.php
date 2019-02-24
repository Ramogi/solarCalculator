<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
class SearchController extends Controller
{
public function search()
{
	$q = Input::get ( 'q' );
$user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
if (count ( $user ) > 0)
return view('pages.search')->withDetails ( $user )->withQuery ( $q );
else
return view('pages.search')->withMessage ( 'No Details found. Try to search again !' );


}
}