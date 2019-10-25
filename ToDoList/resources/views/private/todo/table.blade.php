<thead class="thead-blue">
<tr>
    {{-- <th scope="col">#</th>--}}
    <th scope="col">Status</th>
    <th scope="col">Description</th>
    <th scope="col" width="20px"></th>
</tr>
</thead>
<tbody>
@forelse ($tasks as $task)
    <tr>
        <td colspan="2" class="p-1" task="{{$task['id']}}">
            {{-- <td> {{$task['id']}} </td>--}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" name="status"
                            {{($task['status'] === 'done') ? 'checked="checked"' : ''}}>
                    </div>
                </div>
                <input type="text" name="name" class="form-control" value="{{$task['name']}}">
            </div>
            {{-- {{$task['status']}}--}}
        </td>
        <td task="{{$task['id']}}">
            <a href="#" onclick="return window.todo.del({{$task['id']}});">
                <i class="fas fa-trash-alt"></i>
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="p-1 text-center">
            No tasks have been added yet.
            <hr class="m-0">
        </td>
    </tr>
@endforelse
</tbody>
<caption class="text-right"> {{$tasks->links()}} </caption>
