$(document).ready(function() {

    $(document).on('focus', 'input, select, textarea', function() {
        var id = $(this).attr('id');
       // alert(id+'_error');
        if (id.endsWith('_error')) {
            $('#' + id).html('');
        } else {
            $('#' + id + '_error').html('');
        }
    });

    



    $('#userForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '/api/users',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $('#errors').html('');
                appendUserData(data);
                $('#userForm')[0].reset();
            },
            error: function(response) {
                $('#errors').html('');
                var errors = response.responseJSON.errors;
                $.each(errors, function(key, value) {
                  //  $('#errors').append('<p>' + value + '</p>');
                  //console.log(('#' + key + '_error'))
                  $('#' + key + '_error').html(value);
                });
            }
        });
    });

    function appendUserData(user) {
        $('#userTable tbody').append(
            '<tr>' +
            '<td>' + user.name + '</td>' +
            '<td>' + user.email + '</td>' +
            '<td>' + user.phone + '</td>' +
            '<td>' + user.description + '</td>' +
            '<td>' + user.role.name + '</td>' +
            '<td>' + (user.profile_image ? '<img src="/storage/' + user.profile_image + '" width="50">' : '') + '</td>' +
            '</tr>'
        );
    }


    function loadUserData() {
        $.ajax({
            url: '/api/users',
            type: 'GET',
            success: function(users) {
                $('#userTable tbody').html('');
                users.forEach(user => {
                    appendUserData(user);
                });
            }
        });
    }

    loadUserData();

    

});