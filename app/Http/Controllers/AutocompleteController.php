<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
 
class AutocompleteController extends Controller
{
    public function index()
    {
        return view('autocomplete');
    }
  
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    }
}