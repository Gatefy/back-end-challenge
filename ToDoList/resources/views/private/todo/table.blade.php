<table class="table" id="todo-table">
    <thead class="thead-blue">
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td> {{$task['id']}} </td>
            <td> {{$task['title']}} </td>
            <td> {{$task['comment']}} </td>
        </tr>
    @endforeach
    </tbody>
    <caption class="text-right"> {{$tasks->links()}} </caption>
</table>
