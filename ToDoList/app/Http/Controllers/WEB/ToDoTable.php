<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ToDoTable extends Controller
{
    /**
     * Return the HTLM task list paginated
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @todo load view and put links
     */
    public function get(Request $request)
    {
        $request->validate([
            'tasks' => 'json',
        ]);

        $pageObjDecoded = json_decode($request->get('tasks', '{}'), true);
        $tasks = (new Paginator($pageObjDecoded['data'], $pageObjDecoded['per_page'], $pageObjDecoded['current_page'], [
            'path' => $pageObjDecoded['path'],
        ]))->hasMorePagesWhen($pageObjDecoded['next_page_url'] != null)
            ->appends(['access_token' => Authenticate::$access_token])
            ->appends(['per_page' => $pageObjDecoded['per_page']]);

        return view('private.todo.table', ['tasks' => $tasks]);
    }
}
