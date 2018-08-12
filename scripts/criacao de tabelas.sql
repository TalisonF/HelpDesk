create database crud;
use crud;
create table usuarios ( 
    id_usuario int auto_increment,
    email varchar(50),
    senha varchar(50),
    privilegios varchar(1),
    primary key(id_usuario), 
);
create table chamados ( 
    id_chamado int auto_increment,
    id_usuario int not null , 
    titulo varchar(50), 
    categoria varchar(50), 
    descricao text, 
    status_chamados varchar(20), 
    primary key(id_chamado), 
    foreign key (id_usuario) references usuarios(id_usuario) 
);

insert into usuarios (email,senha,privilegios) values ('adm@helpdesk.com','1234','1');
