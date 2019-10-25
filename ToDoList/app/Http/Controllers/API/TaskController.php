<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Models\ToDoTask;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class TaskController extends Controller
{
    /**
     * @param Request $request
     * @param ToDoTask $taskList
     * @return mixed
     */
    public function get(Request $request, ToDoTask $taskList)
    {
        $request->validate([
            'per_page' => 'int',
            'page' => 'int',
        ]);

        $user = $request->user();
        $per_page = (int)$request->get('per_page', 15);
        return $taskList
            ->getByUserId($user->id)
            ->simplePaginate($per_page)
            ->appends(['access_token' => Authenticate::$access_token])
            ->appends(['per_page' => $per_page]);
    }

    /**
     * @param Request $request
     * @param ToDoTask $taskList
     * @return ToDoTask
     */
    public function save(Request $request, ToDoTask $taskList)
    {
        $request->validate([
            'name' => 'string',
            'status' => 'string',
        ]);

        $user = $request->user();
        $taskList->name = $request->get('name', '');
        $taskList->status = $taskList->getStatus($request->get('status', 'todo'));
        $taskList->user_id = $user->id;
        $taskList->created_at = Carbon::now();

        $taskList->save();

        return $taskList;
    }
}
