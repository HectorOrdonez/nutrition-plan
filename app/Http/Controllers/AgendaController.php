<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AgendaController extends Controller
{
    public function show()
    {
        return view('agenda.show');
    }
}
