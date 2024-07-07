Este repositorio implementa un sistema para realizar mediciones de las diferentes propiedades de los vinos a través de un sistema informático.

<h1>Infraestructura usada</h1>
<ul>
  <li>Symfony 6.4</li>
  <li>Docker</li>
  <ul>
    <li>PHP 8.2</li>
    <li>NGINX</li>
    <li>MySQL 8</li>
  </ul>
  <li>Arquitectura Hexagonal + Vertical Slicing</li>
  <li>PHPUnit</li>
</ul>

<h1>Instalación</h1>
Para ejecutar el proyecto en local con docker tendrá que lanzar los siguientes comandos:
<ul>
  <li>Usar <code>docker-compose</code></li>
  <ul>
    <li>Añadir el parametro <code>-d</code> para que el proceso corra en segundo plano</li>
    <li>Añadir el parametro <code>--build</code> la <strong>primera vez</strong> para construir las imágenes</li>
    <li>Añadir la clave <code>down</code> para detener los contenedores</li>
  </ul>
</ul>

<code># Build & up. Ejecutar el comando desde la carpeta raíz del proyecto
docker-compose up -d --build
</code>

Para acceder al contenedor habría que usar el siguiente comando (el nombre del contenedor está definido en el fichero <strong>docker-compose.yml</strong>)
<code>docker exec -it $container_name bash</code>
