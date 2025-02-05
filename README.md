# Liga Solidaria

## Descripción
Liga Solidaria es una plataforma desarrollada con Laravel y PHP que permite la gestión de ligas deportivas de manera eficiente. Incluye funcionalidades como la administración de equipos, jugadores, partidos y estadísticas en tiempo real.

## Tecnologías Utilizadas
- **Backend:** PHP 8.2, Laravel
- **Servidor Web:** Apache
- **Base de Datos:** MySQL/MariaDB
- **Contenedores:** Docker, Docker Compose
- **Autenticación y Seguridad:** SSL, FTP (para gestión de archivos)

## Instalación
### Requisitos Previos
- Docker y Docker Compose instalados.
- Git instalado.
- Cuenta en GitHub con acceso al repositorio.

### Pasos de Instalación
1. **Clonar el Repositorio**
   git clone https://github.com/ElJST/ligaSolidaria.git
   cd ligaSolidaria
   ```

2. **Construir y Levantar los Contenedores**
   docker-compose up -d --build
   ```
3. **Acceder a la Aplicación**
   - **Web:** `https://ligasolidaria.com`
   - **Base de Datos:** `localhost:3306` (Usuario y contraseña en `.env`)
   - **FTP:** `ftp://localhost` (Credenciales en `docker-compose.yml`)

## Uso
- Administrar ligas y equipos desde el panel de administración.
- Registrar y visualizar estadísticas de los partidos.
- Subir y gestionar archivos mediante FTP.
