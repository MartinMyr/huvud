<?php

namespace App\Http\Controllers;

use App\Services\Medicin\MedicinService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MedicinController extends Controller
{

    private $medicinService;

    public function __construct()
    {
        $this->medicinService = app()->make(MedicinService::class);
    }

    public function getAll(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|numeric',
        ]);

        return response()->json($this->medicinService->getAll($validated));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|numeric',
            'medicin' => 'required|string',
        ]);

        return response()->json(
            $this->medicinService->store($validated)
        );
    }
}
