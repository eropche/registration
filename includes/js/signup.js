$('#signup').submit(function(e){
    e.preventDefault();

    var data = new FormData(this);

    $.ajax({
        type:'POST',
        url: 'handler.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response){
            swal({
                title: "Отлично!",
                text: "Вы успешно зарегистрированы! Теперь вы можете войти в свой личный кабинет",
                icon: "success",
            }).then(() => {
                location.replace('/login.php');
            });
        },
        error: function(response, status, error){
           var errors = response.responseJSON;
           $('.form-control-feedback').text('');
           if (errors.errors) {
               errors.errors.forEach(function(data, index) {
                   var field = Object.getOwnPropertyNames (data);
                   var value = data[field];
                   var div = $("#"+field[0]).closest('div');
                   div.children('.form-control-feedback').text(value);
               });
           }
        }
    });
});