<?php

namespace App\Repositories;

use App\Models\MigraineLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MigraineLogRepository
{
    public function store($data)
    {
        $migraineLog = MigraineLog::create([
            'user_id'    => data_get($data, 'user_id'),
            'comment'    => data_get($data, 'comment'),
            'pain_level' => data_get($data, 'painLevel'),
            'date'       => data_get($data, 'date'),
            'type'       => data_get($data, 'type'),
        ]);

        $migraineLog->save();

        return $migraineLog;
    }

    public function getAllForCurrentUser()
    {

        $logs = MigraineLog::where('user_id', Auth::id())->get()->groupBy([function ($d) {
            return Carbon::parse($d->date)->format('Y');
        }, function ($d) {
            return Carbon::parse($d->date)->format('m');
        }]);

        return $logs;
    }
}
