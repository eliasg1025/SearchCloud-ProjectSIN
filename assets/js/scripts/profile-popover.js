$(document).ready(function() {

    $('.user-popover').popover({
        title: "<h6 class='text-center'>Hola <em> " + $("#nombre-usuario").text() + " </em></h6>",
        content: "<a href='profile.php' class='text-center'>Ver Perfil</a> <br> <a href='../logout.php' class='text-center'>Cerrar sesion</a>",
        html: true
    });
});
