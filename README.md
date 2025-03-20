# CRUD de Superhéroes

Este proyecto es una aplicación web que permite gestionar una lista de superhéroes mediante un **CRUD** (Crear, Leer, Actualizar, Eliminar). La aplicación permite a los usuarios agregar, ver, editar y eliminar superhéroes, incluyendo sus datos personales, alias, información adicional y foto.

## Características

- **Crear**: Permite agregar un nuevo superhéroe con su nombre real, alias, información adicional y una foto.
- **Leer**: Muestra la lista de superhéroes registrados en el sistema con detalles como nombre real, alias y foto.
- **Actualizar**: Permite editar la información de un superhéroe ya existente.
- **Eliminar**: Permite eliminar a un superhéroe de la base de datos.

## Nuevas Características

### Gestión de Fotos Locales
- Las fotos de los superhéroes ahora se almacenan de forma local en el directorio `storage/heroes_photos/` en lugar de usar URLs externas.

### Eliminación Lógica
- Los superhéroes ya no se eliminan físicamente de la base de datos. En su lugar, se utiliza una eliminación lógica donde el campo `activo` de la base de datos se establece en `false` para indicar que el registro ha sido "eliminado".
- Solo los registros con `activo = true` se muestran en la vista de índice.

### Restauración de Registros Eliminados
- Se ha agregado una nueva vista que permite ver los registros eliminados lógicamente y restaurarlos.


