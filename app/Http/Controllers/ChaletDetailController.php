<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chalet;
use App\Holidaypark;
use Carbon\Carbon;
use validate;
use DB;

class ChaletDetailController extends Controller
{
    public function show(Request $request, $id)
    {
        $chalet = Chalet::find($id);

        return view('chalets.detail', ['chalet' => $chalet]);
    }
}
