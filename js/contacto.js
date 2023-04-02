$(".sendMessageContacto").on('click',function(){
    $(".loadingScreen, .loadingScreen .loader").addClass('active');
    var invalidItems = $("form input[class*='invalid']").length;
    var empty = true;
    $('form input[type="text"]').each(function(){
        if($(this).val()!=""){
           empty =false;
           return false;
         }
      });
    if(empty != true && invalidItems == 0){
        $.ajax({
            type: 'post',
            url: '../correo/contacto.php',
            data: $('.formularioContacto').serialize(),
            success: function(){
                $(".alertContainer .title p").text('¡Mensaje enviado!');
                $(".alertContainer .message p").text('Nos comunicaremos contigo en breve');
                $(".alertContainer, .alertContainer .alert").addClass('active');
                $(".loadingScreen, .loadingScreen .loader").removeClass('active');
                setTimeout(function(){
                    $(".alertContainer, .alertContainer .alert").removeClass('active');
                },5000);
            },
            error: function(){
                console.log("ocurrió error :'c");
            }
        });
    }
    else{
        console.log("nel es harina");
        $(".loadingScreen, .loadingScreen .loader").removeClass('active');
    }
});