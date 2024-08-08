<h1 class="h1">Views</h1>
<h4 class="h3">admin</h4>
Vistas de las acciones que va a poder realizar el director y todas las personas a las que se decida dar aquel permiso.
<p><b>Plantillas:</b> Plantillas para los formularios de anuncios, barra de navegacion y roles.</p>
<p><b>Roles:</b> Vistas para la creación y edición de roles junto a sus permisos.</p>
<p><b>cursos:</b> Vistas para la creación y edición de cursos.</p>
<p><b>Users:</b> Vistas para ver el registro de usuarios y asignacion de roles y cursos.</p>

<h4 class="h3">alumno</h4>
<p><b>Plantillas:</b> Plantillas para los formularios y barra de navegacion.</p>
<p><b>datos:</b> Vistas para la creación y edición de los formularios de inscripcion y su vista principal.</p>
<p><b>Boletin:</b> Vista del boletin.</p>

<h4 class="h3">anuncios</h4>
<p>Vista de la lista completa de anuncios del usuario, vista para crear los anuncios y vista para editarlos.</p>

<h4 class="h3">auth</h4>
Vistas de todos los pasos hechos por usuarios autentificados. Registro, ingreso, etc.
Formulario de logout

<h4 class="h3">components</h4>
plantillas de componentes como, formularios, botones, labels, actions, etc.

<h4 class="h3">layouts</h4>
Plantillas generales para las vistas.
<p><b>app:</b> Contiene el head, donde se posicionarse la barra de navegación y el footer, así como los estilos básicos como el fondo o la fuente de la letra</p>
<p><b>guest:</b> Estilos generales para las vistas de registro e ingreso.</p>
<p><b>nav:</b> Plantilla de la barra de navegación.</p>

<h4 class="h3">Livewire</h4>
Anuncio-index: componente encargado de mostrar la lista de anuncios y del funcionamiento de su barra de busqueda.
user-index: componente encargado de mostrar la lista de alumnos, del funcionamiento de su barra de busqueda y del filtro por roles.

<h4 class="h3">Preceptor</h4>
<p><b>Plantillas:</b> Plantilla para la barra de navegacion.</p>
<p><b>Asistencia:</b> Vistas para tomar asistencia y vista de la lista completa</p>
<p><b>curso:</b> Vista del curso con, alumnos y profesores</p>
<p><b>lista-curso:</b> Vista de la lista de cursos que le fueron asignados al preceptor</p>

<h4 class="h3">profile</h4>
Plantillas de los ajustes del perfil que se muestran en el archivo show.
Actualizacion de la informacion del prefil (nombre, apellido, correo, foto de perfil).
Eliminar cuenta.
Salir de otras sesiones iniciadas.
Autentificacion.
Cambiar contraseña.

<h4 class="h3">dashboard</h4>
Vista del perfil.

<h4 class="h3">welcome</h4>
Página en la que se muestran los anuncios del director y se encuentran el boton de ingreso.

<h1 class="h1">Action</h1>
<h3 class="h3">Fortify</h3>
<p><b>CreateNewUser:</b> valida los datos de entrada para la creación de un nuevo usuario, incluyendo nombre, apellido, correo electrónico, contraseña y rol, asigna el rol al usuario después de su creación, y devuelve el usuario creado.</p>

<h1 class="h1">Controllers</h1>

<h3 class="h3">Admin</h3>
<h4 class="h5">CrearAnuncio</h4>
<p><b>Index:</b> Devuelve la vista que muestra la lista de los anuncios publicados y en borrador del usuario.</p>
<p><b>Create:</b> Devuelve la vista de creación de un anuncio.</p>
<p><b>Store:</b> Crea y guarda el anuncio en la base de datos.</p>
<p><b>Edit:</b> Devuelve la vista de edición de un anuncio.</p>
<p><b>Update:</b> Actualiza y guarda el anuncio en la base de datos.</p>
<p><b>Destroy:</b> Función de eliminación del anuncio.</p>

<h4 class="h5">CrearCurso</h4>
<p><b>Index:</b> Devuelve la vista que muestra la lista de cursos existentes.</p>
<p><b>Create:</b> Devuelve la vista de creación de un curso.</p>
<p><b>Store:</b> Crea y guarda el nuevo curso en la base de datos.</p>
<p><b>Edit:</b> Devuelve la vista de edición de un curso.</p>
<p><b>Update:</b> Actualiza y guarda el curso en la base de datos.</p>
<p><b>Destroy:</b> Función de eliminación de un curso.</p>

<h4 class="h5">CrearRol</h4>
<p><b>Index:</b> Devuelve la vista que muestra la lista de roles existentes.</p>
<p><b>Create:</b> Devuelve la vista de creación de un rol.</p>
<p><b>Store:</b> Crea y guarda el nuevo rol en la base de datos.</p>
<p><b>Edit:</b> Devuelve la vista de edición de un rol.</p>
<p><b>Update:</b> Actualiza y guarda el rol en la base de datos.</p>
<p><b>Destroy:</b> Función de eliminación de un rol.</p>

<h4 class="h5">User</h4>
<p><b>Index:</b> Devuelve la vista que muestra la lista de los usuarios.</p>
<p><b>Edit:</b> Devuelve la vista de edición de un usuario.</p>
<p><b>Update:</b> Actualiza y guarda el usuario en la base de datos.</p>
<p><b>Destroy:</b> Función de eliminación de un usuario.</p>

<h3 class="h3">Alumno</h3>
<h4 class="h5">Form</h4>
<p><b>Index:</b> Devuelve la vista del formulario con la propiedad de editable = false (no se puede modificar)</p>
<p><b>Create:</b> Devuelve la vista del formulario editable, vacio.</p>
<p><b>Store:</b>.</p>
<p><b>Edit:</b> Devuelve la vista del formulario editable de los datos.</p>
<p><b>Update:</b></p>
<p><b>Destroy:</b></p>

<h3 class="h3">Preceptor</h3>
<h4 class="h5">Asistencia</h4>
<p><b>Index:</b> Junta todos los alumnos del curso y todas sus asistencias, con fechas, antes de devolverlas a la vista principal</p>
<p><b>Create:</b> Junta todos los alumnos del curso y devuelve la vista para tomar asistencia.</p>
<p><b>Store:</b> Guarda por alumno su asistencia y la fecha.</p>

<h4 class="h5">Curso</h4>
<p><b>Index:</b> Junta a todos los cursos que le hayan sido asignados al usuario autenticado y devuelve una vista con la lista de cursos.</p>
<p><b>show:</b> Junta todos los alumnos y profesores del curso y devuelve la vista de ese curso</p>

<h3 class="h3">Register</h3>
<p><b>__Construct:</b> El constructor recibe como parámetro un objeto CreateNewUser y establece que solo los usuarios con el permiso admin.register pueden acceder a los métodos create y store</p>
<p><b>Create:</b> Devuelve la vista de registro</p>
<p><b>Store:</b> El método store convierte el nombre de usuario a minúsculas si está habilitada la configuración, crea un nuevo usuario con los datos del formulario y redirige a la lista de usuarios con un mensaje de éxito.</p>

<h3 class="h3">Home</h3>
<p><b>Index:</b> Devuelve la vista principal con todos los anuncios que el director haya publicado. </p>
<p><b>Dashboard:</b> Devuelve la vista del perfil</p>

<h1 class="h1">Request</h1>
<h3 class="h3">Anuncio</h3>
Verifica en el método authorize si el usuario autenticado es el mismo que el que realiza la solicitud, permitiendo o denegando la autorización en consecuencia. En el método rules, define las reglas de validación para el título y el estado, y si el estado es 2, agrega reglas adicionales para el cuerpo y la fecha de publicación, estableciendo esta última como la fecha y hora actuales.

<h1 class="h1">Livewire</h1>
<p><b>Anuncio:</b> Controla en tiempo real la vista de su componente, modificando la lista de anuncios dependiendo de la barra de busqueda.</p>
<p><b>Actualizador de perfil:</b> Extiende la funcionalidad de JetstreamUpdateProfileInformationForm para inicializar el estado del perfil del usuario autenticado y manejar la actualización de la información del perfil, incluida la carga y eliminación de la foto de perfil. El método updateProfileInformation actualiza la información del perfil del usuario, y si hay una nueva foto, la guarda y actualiza la ruta de la foto en el perfil del usuario, mientras que deleteProfilePhoto elimina la foto de perfil del usuario si existe.</p>
<p><b>User:</b> Controla en tiempo real la vista de su componente, modificando la lista de usuarios dependiendo de la barra de busqueda y el filtro de roles.</p>

<h1 class="h1">Model</h1>
<p><b>Anuncio:</b> define relaciones, incluyendo una relación inversa de uno a muchos con User, una relación polimórfica de uno a uno con Image, y una relación de pertenencia con Curso, protegiendo el campo id contra asignación masiva.</p>
<p><b>Asignacion_de_Cursos:</b> protege los campos curso_id, user_id y rol contra asignación masiva, y define relaciones de pertenencia con User y Curso.</p>
<p><b>Asistencia:</b> protege los campos curso_id, alumno_id, date y estado contra asignación masiva, y define relaciones de pertenencia con Curso y User.</p>
<p><b>Boletin:</b>  protege los campos alumno_id y curso_id contra asignación masiva, y define relaciones de pertenencia con Curso y User.</p>
<p><b>curso:</b> define una relación de pertenencia con Especialidad y Division, y una relación de uno a muchos con Asignacion_de_Cursos, Asistencia, Boletin, y Anuncio.</p>
<p><b>division:</b> define una relación de uno a muchos con Curso</p>
<p><b>especialidad:</b> define una relación de uno a muchos con Curso</p>
<p><b>image: </b>protege los campos url, imageable_id y imageable_type contra asignación masiva, y define una relación polimórfica con el método imageable.</p>
<p><b>nota:</b></p>
<p><b>user:</b> define relaciones de uno a muchos con Asistencia, Boletin, Anuncio, y Asignacion_de_Cursos, y utiliza dos scopes: scopeAlumnosPorCurso para filtrar y ordenar alumnos por curso y scopeProfesoresPorCurso para filtrar y ordenar profesores por curso.</p>

<p><b>Scope: </b>método en el modelo que define consultas reutilizables para simplificar y modularizar el código de las consultas en Eloquent.</p>

<h1 class="h1">Observer</h1>
<p><b>Anuncio:</b> define un método deleting que elimina la imagen asociada a un anuncio de almacenamiento cuando el anuncio se está eliminando.</p>
<p><b></b></p>

<h1 class="h1">Policy</h1>
<p><b>Anuncio</b> define un método author que permite a un usuario acceder a un anuncio solo si el ID del usuario coincide con el user_id del anuncio.</p>

<h1 class="h1">Provider</h1>
<p><b>Route</b> define varios grupos de rutas en Laravel, aplicando el middleware web a cada grupo y estableciendo un prefijo para cada conjunto de rutas.</p>

<h1 class="h1">Database</h1>
<h3 class="h3">Factory</h3>
<p><b>Anuncio:</b> define un generador de datos falsos para el modelo Anuncio, creando títulos únicos, textos, estados aleatorios y asignando un user_id de un usuario existente al azar.</p>
<p><b>Image:</b> genera datos falsos para el modelo Image, creando una URL de imagen basada en una ruta de almacenamiento ficticia con dimensiones específicas.</p>
<p><b>user</b> genera datos falsos para el modelo User, incluyendo nombre, apellido, correo electrónico único, contraseña encriptada, y un token de recordatorio aleatorio, dejando los campos de verificación de correo y foto de perfil como nulos.</p>

<h3 class="h3">migrations</h3>
<p><b>users</b> crea una tabla con los campos id, name, lastname, email (único), email_verified_at (opcional), password, remember_token, current_team_id (opcional), profile_photo_path (opcional con longitud de 2048 caracteres), y campos de marca de tiempo (created_at y updated_at).</p>
<p><b>Especialidads</b> crea una tabla con los campos id, name, y campos de marca de tiempo (created_at y updated_at).</p>
<p><b>divisions</b> crea una tabla con los campos id, name, y campos de marca de tiempo (created_at y updated_at).</p>
<p><b>cursos:</b> rea una tabla llamada cursos con los campos id, name, turno (un campo enum para el turno del curso), especialidad_id (opcional), y division_id. También define claves foráneas para especialidad_id y division_id, referenciando las tablas especialidads y divisions, con eliminación en cascada.</p>
<p><b>boletins</b> crea la tabla con los campos id, curso_id, y user_id, y define claves foráneas para curso_id y user_id, referenciando las tablas cursos y users, con eliminación en cascada.</p>
<p><b>notas</b> tabla con los campos id, boletin_id (clave foránea que se vincula a la tabla boletins y se elimina en cascada), materia, bimestre (entero entre 1 y 4), y nota (decimal con un total de 5 dígitos, de los cuales 2 están después del punto decimal), además de los campos de marca de tiempo.</p>
<p><b>asistencia:</b> tabla con los campos id, curso_id (opcional), alumno_id, date (fecha) y estado (un enum con valores 'presente', 'tarde', 'ausente'). Define claves foráneas para curso_id y alumno_id, referenciando las tablas cursos y users, con eliminación en cascada. Además, incluye campos de marca de tiempo (created_at y updated_at).</p>
<p><b>asignacion_de_cursos</b> campos id, curso_id, user_id y rol (un enum con valores 'alumno' y 'otro'). Define claves foráneas para curso_id y user_id.</p>
<p><b>anuncios:</b> campos id, title, body (opcional y de tipo texto largo), status (un enum con valores 1 y 2, con valor predeterminado 1), published_at (opcional), user_id, y curso_id (opcional). Define claves foráneas para user_id y curso_id.</p>
<p><b>images:</b> campos id, url (para almacenar la URL de la imagen), imageable_id (para el identificador del modelo relacionado) y imageable_type (para el tipo del modelo relacionado, en una relación polimórfica).</p>

<h3 class="h3">seeders</h3>
<p><b>database</b> limpia y crea el directorio para las imágenes de anuncios. Luego, llama a los Seeder de roles, divisiones y especialidades. Crea varios usuarios con roles específicos (alumno, admin, preceptor, profesor) y asigna roles aleatorios a 10 usuarios adicionales. Luego, crea 10 anuncios y asocia una imagen a cada anuncio. Finalmente, inserta datos de ejemplo en la tabla cursos.</p>
<p><b>division</b>  inserta varios registros en la tabla divisions, cada uno con un nombre diferente del 1 al 12.</p>
<p><b>especialidad:</b> inserta registros en la tabla especialidads con los diferentes nombres de  las especialidades.</p>
<p><b>role</b> crea roles y permisos utilizando el paquete spatie/laravel-permission. Asigna permisos específicos a los roles correspondientes: admin, preceptor, profesor, y alumno. Los permisos se definen para acciones como ver, crear, editar y eliminar anuncios, roles, y usuarios, así como para gestionar cursos y asistencias.</p>

<h1 class="h1">Route</h1>
<p><b>admin</b> define rutas para manejar anuncios, roles, cursos y usuarios utilizando controladores específicos (controller/admin) para cada recurso. Además, configura las rutas de registro personalizadas para usuarios autenticados, gestionadas por CustomRegisteredUserController.</p>
<p><b>alumno:</b> define un recurso para los perfiles de alumnos gestionados por FormController y establece una ruta adicional para mostrar la vista de boletín para los alumnos.</p>
<p><b>preceptor:</b> configura un recurso para manejar las rutas de cursos con CursoController, utilizando el nombre de ruta prece.curso. Además, establece un recurso para las asistencias dentro de un curso específico, gestionado por AsistenciaController, con el nombre de ruta prece.asistencia</p>
<p><b>web:</b> La ruta raíz (/) se asigna al método index de HomeController con el nombre anuncios.index. La ruta /perfil está protegida por autenticación y lleva al método dashboard de HomeController, con el nombre dashboard.</p>


<h1 class="h1">Database</h1>
<h3 class="h3">Factory</h3>
<p><b></b> </p>
<h1 class="h1">Clonar Repositorio</h1>

<h4 class="h4">Clonar El Repositorio (solo si no lo has hecho antes)</h4>
git clone https://github.com/usuario/nombre-del-repositorio.git

<h4 class="h4">Navegar al Directorio Del Repositorio</h4>

cd nombre-del-repositorio

<h4 class="h4">Realizar cambios en los archivos (esto lo haces en tu editor de texto o IDE)<\h4>


<h1 class="h1">Actualizar Repositorio</h1>
<h4 class="h4">Añadir los Cambios Al Área De Preparación</h4>

git add .

<h4 class="h4">Confirmar los Cambios Con Un Mensaje Descriptivo</h4>
git commit -m "Descripción de los cambios"

<h4 class="h4">Enviar los Cambios Al Repositorio Remoto</h4>
git push origin main


<h1 class="h1">Crear Rama Y Subir Los Proyectos A Esa Rama</h1>

• git checkout -b nombreDeLaRama (crea una nueva rama y te posiciona en ella)


• git branch (para verificar que se creo)


• git add .


• git commit -m "resumen de los archivos o cambios que haces"


• git push origin nombreDeLaRama (sube los archivos a la rama)

<h1 class="h1">Volver Atrás En Los Commits</h1>

git checkout HEAD~1 (o el número de commits que quieras retroceder)

<h1 class="h1">Actualizar Archivo Local</h1>

git pull