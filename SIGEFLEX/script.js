$(document).ready(function() {
    $('#userTable').DataTable({
        "ajax": "get_users.php",
        "columns": [
            { "data": "DNI" },
            { "data": "apellido" },
            { "data": "nombre" },
            { "data": "edad" },
            { "data": "Usuario" },
            { "data": "Descripcion_Permiso" },
            {
                "data": null,
                "defaultContent": '<button class="btn btn-warning btn-sm editBtn">Editar</button> <button class="btn btn-danger btn-sm deleteBtn">Eliminar</button>'
            }
        ]
    });

    $('#userTable').on('click', '.editBtn', function() {
        var data = $('#userTable').DataTable().row($(this).parents('tr')).data();
        $('#editDNI').val(data.DNI);
        $('#editApellido').val(data.apellido);
        $('#editNombre').val(data.nombre);
        $('#editEdad').val(data.edad);
        $('#editUsuario').val(data.Usuario);
        $('#editPermiso').val(data.Permiso);
        $('#editModal').modal('show');
    });

    $('#userTable').on('click', '.deleteBtn', function() {
        var data = $('#userTable').DataTable().row($(this).parents('tr')).data();
        if (confirm('¿Está seguro de que desea eliminar este usuario?')) {
            $.ajax({
                url: 'delete_user.php',
                type: 'POST',
                data: { dni: data.DNI },
                success: function(response) {
                    alert(response);
                    $('#userTable').DataTable().ajax.reload();
                }
            });
        }
    });

    $('#newUserForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: 'create_user.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                $('#userTable').DataTable().ajax.reload();
                $('#newUserForm')[0].reset();
                $('#newUserModal').modal('hide'); 
            }
        });
    });

    $('#editForm').on('submit', function(event) {
        event.preventDefault(); 

        $.ajax({
            url: 'update_user.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                $('#userTable').DataTable().ajax.reload();
                $('#editModal').modal('hide');
            }
        });
    });

    $('#editModal .btn-close').on('click', function() {
        $('#editModal').modal('hide');
    });
    
    $('#openNewUserModal').on('click', function() {
        $('#newUserModal').modal('show');
    });
});

