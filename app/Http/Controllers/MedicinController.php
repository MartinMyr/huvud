<?php

namespace App\Http\Controllers;

use App\Models\Medicin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MedicinController extends Controller
{

    public function getAll(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|numeric',
        ]);

        return response()->json(
            Medicin::all()
                ->where('user_id', data_get($validated, 'user_id'))
        );
    }

    public function create(Request $request)
    {

    }
}
