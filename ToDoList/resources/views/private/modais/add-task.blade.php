<!-- Logout Modal-->
<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New task</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table my-0" id="todo-table-add">
                    <thead class="thead-blue">
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="2" class="p-1" task="new">
                            <form class="user" method="post" id="frm-addTask">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" title="It's done?" data-toggle="tooltip"
                                             data-placement="bottom">
                                            <input type="checkbox" name="status">
                                        </div>
                                    </div>
                                    <input type="text" name="name" class="form-control" value="">
                                </div>
                            </form>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" id="btn-addTask" href="#" onclick="return window.todo.add();">Save</a>
            </div>
        </div>
    </div>
</div>
