$(document).ready(function () {

    function close_all_msg() {
        $('.alert-dismissible a.close').click();
    }

    function error_msg(msg = null) {
        let div_msg = $($('#frm-msg-default').html());
        if (msg) {
            div_msg.find('.frm-msg').html(msg);
        }
        $('#todo-table-info').prepend(div_msg);
    }

    function success_msg(msg = null) {
        close_all_msg();
        let div_msg = $($('#frm-msg-success').html());
        if (msg) {
            div_msg.find('.frm-msg').html(msg);
        }
        $('#todo-table-info').prepend(div_msg);
    }

    function api_request(data, type = 'GET', noResponse = true, uri = 'task') {
        return $.ajax({
            type: type,
            url: '/api/' + uri,
            data: data,
            dataType: (noResponse ? 'text' : 'json')
        })
    }

    function default_fail_action(data) {
        if (data.responseJSON.message !== 'Unauthorized') {
            error_msg(data.responseJSON.message);
        } else {
            error_msg('Session expired.');
        }
    }

    let curr_page = 1;
    let load_table = function (json) {
        if (!json.data.length && curr_page > 1) {
            curr_page--;
            return load_info();
        }

        let csrf = $($('#csrf').html());
        let ajax_data = {
            tasks: JSON.stringify(json)
        };
        ajax_data[csrf.attr('name')] = csrf.val();

        $.ajax({
            type: 'POST',
            url: '/todo/table?access_token=' + access_token,
            data: ajax_data,
            dataType: 'html'
        })
            .done(function (data) {
                $('#todo-table').html(data);
            })
            .fail(function (data) {
                console.log(data);
                let msg = $($('#frm-msg-default').html());
                msg.find('.frm-msg').html('Session expired.');
                $('#todo-table-info').prepend(msg);
            });
    };

    let load_info = function (perpage = 10) {
        api_request({
            page: curr_page,
            per_page: perpage,
            access_token: access_token
        }, 'GET', false)
            .done(load_table)
            .fail(default_fail_action);
    };
    load_info();

    window.todo = {
        load_info: load_info,
        del: function (id) {
            let task_name = $('[task=' + id + '] [name=name]').val();
            if (confirm('Are you sure to delete te task: "' + task_name + '"?')) {
                api_request({
                    id: id,
                    access_token: access_token
                }, 'DELETE')
                    .done(function (responseJSON) {
                        success_msg('Task "' + task_name + '" deleted.');
                        load_info();
                    })
                    .fail(default_fail_action);
            }

            return false;
        },
        add: function () {
            let task_name = $('[task=new] [name=name]').val();
            api_request({
                name: task_name,
                status: ($('[task=new] [name=status]')[0].checked ? 'done' : 'todo'),
                access_token: access_token
            }, 'POST')
                .done(function (responseJSON) {
                    success_msg('Task "' + task_name + '" added.');
                    load_info();
                    $('#addTaskModal').modal('hide');
                    $('#frm-addTask').trigger("reset");
                })
                .fail(default_fail_action);
            return false;
        },
        update: function (task_id) {
            let task_name = $('[task=' + task_id + '] [name=name]').val();
            api_request({
                id: task_id,
                name: task_name,
                status: ($('[task=' + task_id + '] [name=status]')[0].checked ? 'done' : 'todo'),
                access_token: access_token
            }, 'PUT')
                .done(function (responseJSON) {
                    success_msg('Task "' + task_name + '" saved.');
                    // load_info();
                })
                .fail(default_fail_action);

            return false;
        }
    };

    $(document).on('change', '#todo-table [task] input', function () {
        let task_id = $(this).parents('[task]').attr('task');
        window.todo.update(task_id);
        return true;
    });

    $(document).on('click', '.pagination a.page-link[rel="prev"]', function () {
        curr_page--;
        load_info();
        return false;
    });

    $(document).on('click', '.pagination a.page-link[rel="next"]', function () {
        curr_page++;
        load_info();
        return false;
    });
});
