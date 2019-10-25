<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ToDoTask extends Model
{
    protected $table = 'todo_task';

    protected static $acceptedStatus = [
        'todo', // default
        'done',
        'deleted',
    ];


    /**
     * @param int $id
     * @return Builder
     */
    public function getByUserId(int $id)
    {
        return $this->where('user_id', '=', $id);
    }

    /**
     * @return array
     */
    public static function getAcceptedStatus()
    {
        return self::$acceptedStatus;
    }

    /**
     * @return string
     */
    public static function getDefaultStatus()
    {
        return self::$acceptedStatus[0];
    }

    /**
     * @param string $status
     * @return bool
     */
    public function validStatus(string $status = null)
    {
        if (!$status) {
            $status = $this->status;
        }
        return in_array($status, self::getAcceptedStatus());
    }

    /**
     * @param string $status
     * @return string
     */
    public function getStatus(string $status = null)
    {
        if (!$status) {
            $status = $this->status;
        }
        if ($this->validStatus($status)) {
            return $status;
        }
        return self::getDefaultStatus();
    }
}
