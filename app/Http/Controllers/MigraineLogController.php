<?php

namespace App\Http\Controllers;

use App\Repositories\MigraineLogRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MigraineLogController extends Controller
{
    /**
     * @param MigraineLogRepository $migraineLogRepository
     */
    public function __construct(MigraineLogRepository $migraineLogRepository)
    {
        $this->migraineLogRepository = $migraineLogRepository;
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
            $this->migraineLogRepository->store($validated)
        );
    }
}
