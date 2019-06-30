
-- Menú y Submenú

SELECT 

s.id id_submenu,
s.nombre submenu,
m.nombre menu

FROM submenu s 
INNER JOIN menu m ON s.id_menu=m.id


-- PERMISOS DE USUARIO (SUBMENU)

SELECT  

p.id,
p.id_submenu,
p.id_usuario,
p.estado,
s.submenu,
s.menu

FROM permisos p 

INNER JOIN 
(
SELECT 

s.id id_submenu,
s.nombre submenu,
m.nombre menu

FROM submenu s 
INNER JOIN menu m ON s.id_menu=m.id

) s ON p.id_submenu=s.id_submenu

WHERE p.id_usuario=1


-- PERMISOS DE USUARIO MENU


SELECT  


s.menu,
'MENU' tipo

FROM permisos p 

INNER JOIN 
(
SELECT 

s.id id_submenu,
s.nombre submenu,
m.nombre menu

FROM submenu s 
INNER JOIN menu m ON s.id_menu=m.id

) s ON p.id_submenu=s.id_submenu

WHERE p.id_usuario=1 AND p.estado='TRUE'

GROUP BY s.menu


-- UNION DE QUERYS


-- MENU

SELECT  

'' id,
'' id_submenu,
'' id_usuario,
'' estado,
'' submenu,
s.menu,
s.id_menu id_menu,
'MENU' tipo,
'' pagina

FROM permisos p 

INNER JOIN 
(
SELECT 

s.id id_submenu,
s.nombre submenu,
m.nombre menu,
s.id_menu id_menu

FROM submenu s 
INNER JOIN menu m ON s.id_menu=m.id

) s ON p.id_submenu=s.id_submenu

WHERE p.id_usuario=1 AND p.estado='TRUE'

GROUP BY s.menu


UNION 

SELECT  

p.id,
p.id_submenu,
p.id_usuario,
p.estado,
s.submenu,
s.menu,
s.id_menu id_menu,
'SUBMENU' tipo,
s.pagina pagina

FROM permisos p 

INNER JOIN 
(
SELECT 

s.id id_submenu,
s.nombre submenu,
m.nombre menu,
s.id_menu id_menu,
s.pagina

FROM submenu s 
INNER JOIN menu m ON s.id_menu=m.id

) s ON p.id_submenu=s.id_submenu

WHERE p.id_usuario=1