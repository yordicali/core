# core
Core base, para desarrollo ágil.

1. al instalar modifique el .env con su base de datos mysql
2. ejecute php artisan migration
3. ejecute npm install
4. ejecute npm run dev
5. levante el servidor con php artisan serve

AL INSTALAR TENDRA ACCESO CON ESTE USUARIO

correo: admin900@tvo.com.co
clave: 12345678

--- CREACION DE MODULOS INDEPENDIENTES --
php artisan module:make Blog
Crea un nuevo módulo llamado Blog con toda la estructura básica (Config, Http, Models, etc.).

<SI LE DA ERROR DE PROVIDERS EJECUTE ESTE COMANDO DESPUES DE CREAR EL MODULO>
composer dump-autoload

🛠 Generadores dentro de un módulo

Una vez creado el módulo, puedes generar recursos internos directamente en él:

Comando	Descripción
php artisan module:make-controller PostController Blog	Crea un controlador en el módulo Blog.
php artisan module:make-model Post Blog	Crea un modelo en el módulo Blog.
php artisan module:make-migration create_posts_table Blog	Crea una migración para el módulo Blog

🗄 Migraciones, seeders y factories
Comando	Descripción
php artisan module:migrate Blog	Ejecuta solo las migraciones del módulo Blog.
php artisan module:migrate	Ejecuta las migraciones de todos los módulos habilitados.
php artisan module:migrate-refresh Blog	Rollback + migrate solo para el módulo Blog.

Publicación de assets y configuración
Comando	Descripción
php artisan module:publish Blog	Publica config, vistas y assets del módulo en la carpeta principal del proyecto.
php artisan module:publish-config Blog	Publica solo la configuración (Config/config.php).
php artisan module:publish-migration Blog	Publica las migraciones en database/migrations.

📌 Otros útiles
Comando	Descripción
php artisan module:route-provider Blog	Crea un proveedor de rutas para el módulo.
php artisan module:make-job SendEmailJob Blog	Crea un Job.
php artisan module:make-event PostCreated Blog	Crea un Event.
php artisan module:make-listener SendNotification Blog	Crea un Listener.
php artisan module:make-command MyCommand Blog	Crea un comando de Artisan dentro del módulo.