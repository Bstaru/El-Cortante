
/* PRIMEROS VALORES */
CALL i_usuario ('0000','Admin','ap','am','correo@admin.com',0000000000,'1990-01-01', 'admin', null);
CALL i_usuario ('0000','Reportero','ap','am','correo@reportero.com',0000000000,'1990-01-01', 'reportero', null);
CALL i_usuario ('0000','Usuario','ap','am','correo@usuario.com',0000000000,'1990-01-01', 'usuario', null);

CALL i_seccion('local');
CALL i_seccion('nacional');
CALL i_seccion('espectaculos');
CALL i_seccion('internacional');
CALL i_seccion('deportes');
CALL i_seccion('clima');

CALL i_noticia('TITULO','Una descripcion','Lo que dira la noticia',12,1);
CALL i_media('C:\Users\black\Desktop\gits\El-Cortante\img\chansoo2.jpg',3);

/* pruebas

CALL u_usuario (3,'0000','Usuario','ap','am','correo@usuario.com',0000000000,'1990-01-01', 'usuario');
call s_media(4)

*/

