<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Models\ToDoTask;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private function response(int $status, $content = '')
    {
        return response($content, $status)
            ->header('Content-Type', 'application/json');
    }

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
            ->where('status', '<>', 'deleted')
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
        $taskList->status = $taskList->getStatus(
            $request->get('status')
        );
        $taskList->user_id = $user->id;
        $taskList->created_at = Carbon::now();

        if ($taskList->save()) {
            return $this->response(201);
        } else {
            return $this->response(500);
        }
    }

    public function delete(Request $request, ToDoTask $taskList)
    {
        $request->validate([
            'id' => 'required|int',
        ]);
        $user = $request->user();
        $task = $taskList->getByUserId($user->id)->find($request->get('id'));
        if ($task->status != 'deleted') {
            $task->status = 'deleted';
            if ($task->save()) {
                return $this->response(202);
            }
        }
        return $this->response(304);
    }

    public function update(Request $request, ToDoTask $taskList)
    {
        $request->validate([
            'id' => 'required|int',
            'name' => 'string',
            'status' => 'string',
        ]);
        $user = $request->user();
        $task = $taskList->getByUserId($user->id)->find($request->get('id'));
        $task->name = $request->get('name', $task->name);
        $task->status = $taskList->getStatus(
            $request->get('status', $task->status)
        );
        if ($task->save()) {
            return $this->response(202);
        }
        return $this->response(304);
    }
}
