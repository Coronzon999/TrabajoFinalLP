<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario = "Redeath414@hotmail.com"; 
    $asunto = "Nueva Inscripción al Curso";

    $nombre          = $_POST['nombre'] ?? '';
    $segundo_nombre  = $_POST['segundo_nombre'] ?? '';
    $apellido        = $_POST['apellido'] ?? '';
    $fecha_nac       = $_POST['fecha_nacimiento'] ?? '';
    $genero          = $_POST['genero'] ?? '';
    $direccion_1     = $_POST['direccion_1'] ?? '';
    $direccion_2     = $_POST['direccion_2'] ?? '';
    $ciudad          = $_POST['ciudad'] ?? '';
    $estado          = $_POST['estado'] ?? '';
    $codigo_postal   = $_POST['codigo_postal'] ?? '';
    $email_usuario   = $_POST['email'] ?? '';
    $telefono        = $_POST['telefono'] ?? '';
    $cursos_previos  = $_POST['cursos_anteriores'] ?? '';
    $empresa         = $_POST['empresa'] ?? '';
    $curso           = $_POST['cursos'] ?? '';
    $comentarios     = $_POST['comentarios'] ?? '';

    $mensaje  = "Has recibido una nueva inscripción:\n\n";
    $mensaje .= "Nombre Completo: $nombre $segundo_nombre $apellido\n";
    $mensaje .= "Fecha de Nacimiento: $fecha_nac\n";
    $mensaje .= "Género: $genero\n";
    $mensaje .= "Dirección: $direccion_1 $direccion_2, $ciudad, $estado - $codigo_postal\n";
    $mensaje .= "Email: $email_usuario\n";
    $mensaje .= "Teléfono: $telefono\n";
    $mensaje .= "Cursos Anteriores: $cursos_previos\n";
    $mensaje .= "Empresa: $empresa\n";
    $mensaje .= "Curso Seleccionado: $curso\n";
    $mensaje .= "Comentarios: $comentarios\n";

    $headers  = "From: no-reply@tudominio.com" . "\r\n";
    $headers .= "Reply-To: $email_usuario" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo "<h2>¡Inscripción enviada con éxito!</h2>";
    } else {
        echo "<h2>Ocurrió un error al enviar la inscripción. Inténtalo de nuevo.</h2>";
    }
} else {
    header("Location: index.html");
    exit();
}
?>