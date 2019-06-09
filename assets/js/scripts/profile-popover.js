$(document).ready(function () {
    $('.user-popover').popover({
        title: "<h6 class='text-center'>Hola <em>Pedrito</em></h6>",
        content: "<a href='profile.html' class='text-center'>Ver Perfil</a> <br> <a href='../logout.php' class='text-center'>Cerrar sesion</a>",
        html: true
    });
});
