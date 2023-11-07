create table if not exists usuario(
	"id_usuario_pk" serial primary key NOT NULL, 
	"matricula_usuario" int unique NOT NULL,
	"nome_usuario" varchar(70),
	"cpf" varchar(20) unique NOT NULL,
	"sexo" varchar(10),
	"telefone" varchar(20) unique NOT NULL,
	"endereco" varchar(255),
	"uf" varchar(10),
	"cidade" varchar(100),
	"data_nascimento" date NOT NULL,
	"email" varchar(255) unique NOT NULL,
	"senha" varchar(70) NOT NULL
    );