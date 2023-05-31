<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(){

        $works = Work::with('type', 'technologies')->paginate(3);

        return response()->json([

            'success' => true,
            'results' => $works

        ]);
    }

    public function show($slug){

        $work = Work::where('slug', $slug)->with('type', 'technologies')->first();

        if($work){

            return response()->json([
    
                'success' => true,
                'result' => $work
            ]);
        }else{
            return response()->json([
    
                'success' => false,
                'error' => 'La card non esiste'
            ]);
        };
    }
}
