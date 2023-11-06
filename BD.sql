create table if not exists usuario(
	"id_usuario_pk" serial primary key, 
	"matricula_usuario" int unique, 
	"id_curso_fk" int,
	"nome_usuario" varchar(15), 
	"sobre_nome_usuario" varchar(15), 
	"cpf" bigint unique, 
	"genero" varchar(10), 
	"login" varchar(30), 
	"senha" varchar(50));
	
SELECT * FROM usuario;