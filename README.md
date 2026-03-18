# QuickSlot 🗓️

**QuickSlot** es una solución web integral diseñada para la gestión y automatización de reservas en espacios físicos (salas de estudio, oficinas de coworking o instalaciones deportivas). El proyecto elimina la dependencia de métodos manuales, garantizando la integridad de los datos y ofreciendo una experiencia de usuario ágil y moderna.

---

## 🚀 Características del Proyecto

* **Reserva en Tiempo Real:** Interfaz intuitiva para que los usuarios consulten disponibilidad y confirmen su "slot" al instante.
* **Panel de Administración:** Control total sobre el inventario de salas (CRUD), supervisión de la agenda global y gestión de usuarios.
* **API REST Integrada:** Módulo técnico para la consulta externa de ocupación, ideal para implementar cartelería digital en la recepción del local.
* **Privacidad por Diseño:** La API está configurada para mostrar únicamente estados de ocupación anónimos, protegiendo los datos personales de los clientes.

## 🛠️ Stack Tecnológico

* **Backend:** PHP (Programación Orientada a Objetos).
* **Base de Datos:** MySQL (Modelo Relacional).
* **Frontend:** HTML5, CSS3 (Diseño Responsive) y JavaScript Vanilla (AJAX/Fetch).
* **Comunicación:** JSON para el intercambio de datos con la API.
* **Seguridad:** Uso de sentencias preparadas (PDO) y futura implementación de certificados SSL gratuitos (Let's Encrypt).

## 📂 Estructura del Repositorio

* `/sql`: Scripts de creación y configuración de la base de datos.
* `/api`: Endpoints para la consulta externa de datos.
* `/public`: Archivos de frontend (HTML, CSS, JS).
* `/src`: Lógica de negocio y conexión a base de datos en PHP.

---

## 📝 Notas de Desarrollo
Este proyecto se desarrolla como parte del ciclo superior de **Desarrollo de Aplicaciones Web (DAW)**. El objetivo principal es ofrecer una herramienta ligera, escalable y profesional para pequeñas empresas y asociaciones.

---
Generado por **Gemini** para el proyecto QuickSlot - 2026.