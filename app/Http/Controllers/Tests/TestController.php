<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public $test = 'test';
    
    /**
     * Undocumented variable
     *
     * @var string
     */
    public function index(Request $request)
    {
        $a = ['name'=>'wang','age'=>18];
        $this->test = $a;
        // dd($request);
        // return json_encode($this->test);
        // return response()->json($a);
        return view('tests.test',['tests'=>'test']);
    }
}
