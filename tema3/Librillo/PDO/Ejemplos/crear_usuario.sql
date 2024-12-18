CREATE USER 'nuevo_usuario'@'localhost' IDENTIFIED BY 'tu_contraseña';

GRANT ALL PRIVILEGES ON *.* TO 'nuevo_usuario'@'localhost';


FLUSH PRIVILEGES;





CREATE USER 'nuevo_usuario'@'localhost' IDENTIFIED BY 'tu_contraseña';
GRANT ALL PRIVILEGES ON *.* TO 'nuevo_usuario'@'localhost';
FLUSH PRIVILEGES;
