<?php

namespace App\Services\MigraineLog;

use App\Models\MigraineLog;
use App\Repositories\MigraineLogRepository;
use App\Services\MigraineLog\MigraineLogInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MigraineLogService implements MigraineLogInterface
{
    /**
     * @var mixed
     */
    private $migraineLogRepository;

    public function __construct()
    {
        $this->migraineLogRepository = app()->make(MigraineLogRepository::class);
    }

    /**
     * create migraine log
     *
     * @param array $data
     *
     * @return Model
     */
    public function create($data)
    {
        $migraineLog             = $this->migraineLogRepository->initialize();
        $migraineLog->user_id    = data_get($data, 'user_id');
        $migraineLog->comment    = data_get($data, 'comment');
        $migraineLog->pain_level = data_get($data, 'painLevel');
        $migraineLog->date       = data_get($data, 'date');
        $migraineLog->type       = data_get($data, 'type');

        $this->migraineLogRepository->store($migraineLog);

        return $migraineLog;
    }

    /**
     * get all migraine logs for current user
     *
     * @return array
     */
    public function getAllForCurrentUser()
    {
        $logs = MigraineLog::with('medicin')->where('user_id', Auth::id())->get()->groupBy([function ($d) {
            return Carbon::parse($d->date)->format('Y');
        }, function ($d) {
            return Carbon::parse($d->date)->format('m');
        }]);

        return $logs;
    }
}
