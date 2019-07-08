<h4>Especificaciones de la tarea</h4>
<ul>
<li>Dar estilos a las vistas pre creadas utilizando SASS.</li>
<li>Implementar sistema de roles extendiendo Auth de laravel.</li>
<ul>
<li>Crear roles sysadmin, admin y user.</li>
<li>Redireccionar según corresponda. (sysadmin -> systempanel, admin->adminpanel, user->home). Crear vistas segun corresponda.</li>
<li>El sysadmin también tiene los permisos del admin y el admin los del user.</li>
</ul>
<li>Crear CRUD de users limitado a sysadmin y admin.</li>
<li>Crear sistema de comentarios con autor, fecha y hora.</li>
<li>Todos los roles podrán crear y leer los comentarios, pero solo admin podrá editarlos y solo sysadmin podrá eliminarlos.</li>
<li>Realizar las acciones de comentarios asincrónicamente utilizando JQuery con llamadas de Ajax y animando la aparición y desaparición de registros.</li>
    <li>Crear API REST q entregue un JSON con la lista de usuarios con sus roles y sin passwords.</li>
<li>Crear comando de consola q modifique los comentarios a distintos formatos utilizando parámetros para Upper Case, Lowe Case o ETC. (EXTRA)</li>
<li>En la vista de comentarios implementar un filtro por texto, autor. (EXTRA)</li>
</ul>
<p>Para subir el proyecto a GIT se tendrá q crear una rama nueva con el nombre del candidato y subirlo a esta. ¡No utilizar la rama MASTER!</p>

