# Guía Básica de Symfony

## Introducción a Symfony

Symfony es un framework de desarrollo web en PHP que facilita la creación de aplicaciones robustas y escalables. Esta guía te ayudará a comenzar con Symfony, cubriendo desde la instalación hasta el uso de repositorios y ORM.

## Instalación de Symfony

Para instalar Symfony, necesitas tener Composer instalado. Luego, puedes crear un nuevo proyecto con el siguiente comando:

```bash
composer create-project symfony/skeleton my_project_name
```

## Estructura de Directorios

Symfony sigue una estructura de directorios clara y organizada. Algunos de los directorios más importantes son:

- **bin/**: Contiene ejecutables del proyecto.
- **config/**: Archivos de configuración.
- **src/**: Código fuente de la aplicación.
- **templates/**: Plantillas Twig.
- **var/**: Archivos generados dinámicamente, como caché y logs.

## Comandos Básicos

Algunos comandos útiles para trabajar con Symfony son:

- `php bin/console make:controller NombreController`: Crea un nuevo controlador.
- `php bin/console make:entity NombreEntidad`: Crea una nueva entidad.
- `php bin/console doctrine:schema:update --force`: Actualiza la base de datos según las entidades.
- `php bin/console doctrine:migrations:generate`: Genera una migración
- `php bin/console doctrine:migrations:migrate <numerodemigracion>`: Ejecuta la migración 

## Repositorios y ORM

Symfony utiliza Doctrine como ORM para interactuar con la base de datos. Puedes definir entidades y usar repositorios para gestionar consultas.

Por ejemplo, para definir una entidad Usuario:

```php
// src/Entity/Usuario.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
{
    // Definición de propiedades y métodos
}
```