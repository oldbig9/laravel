<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public $test = 'test';
    
    /**
     * Undocumented variable
     *
     * @var string
     */
    public function index()
    {
        $a = ['name'=>'wang','age'=>18];
        $this->test = $a;
        return json_encode($this->test);
    }
}
