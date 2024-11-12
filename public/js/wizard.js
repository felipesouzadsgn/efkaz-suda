$( document ).ready(function() {
    
    console.log( "ready!" );




    $('#stepForm').on('submit', function(e) {
        
        e.preventDefault(); // Evita o envio tradicional do formulário

        // alert('');
        var formData = $(this).serialize();
        var urlPost = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: urlPost,
            data: formData,
            success: function(response) {

                console.log(response);

                window.location.href = response.nextUrl; // Redireciona para a próxima etapa
            },
            error: function(xhr) {
                console.log('Erro: ' + xhr.responseText);
            }
        });

    });


    // botão voltar
    $('#btn-voltar').on('click', function(e) {
        e.preventDefault();
        window.history.back();
    }); 


});


