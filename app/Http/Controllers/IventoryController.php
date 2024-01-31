<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IventoryController extends Controller
{
    public function in(Request $request)
    {
        # code... Daily additions to the inventory
    }

    public function out(Request $request)
    {
        # code... Daily removals from the inventory
    }

    public function countStart(Request $request)
    {
        # code... Monthly stock take start
    }

    public function countUpdate(Request $request)
    {
        # code... Monthly stock take update
    }

    public function countFinish(Request $request)
    {
        # code... Monthly stock take finsh
    }
}
