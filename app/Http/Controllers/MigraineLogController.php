<?php

namespace App\Http\Controllers;

use App\Services\MigraineLog\MigraineLogService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MigraineLogController extends Controller
{
    /**
     * @var mixed
     */
    private $migraineLogService;

    public function __construct()
    {
        $this->migraineLogService = app()->make(MigraineLogService::class);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'user_id'   => 'required|numeric',
            'painLevel' => 'required|numeric',
            'date'      => 'required|date',
            'type'      => 'required|string',
            'comment'   => 'string|max:200',
        ]);

        return response()->json(
            $this->migraineLogService->create($validated)
        );
    }

    public function getAllForCurrentUser()
    {
        return response()->json(
            $this->migraineLogService->getAllForCurrentUser()
        );
    }
}
