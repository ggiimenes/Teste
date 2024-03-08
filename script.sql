create database bd_livros default character set utf8 collate utf8_general_ci;
use bd_livros;

-- drop database bd_livros;

create table usuarios(
usuario varchar(10) not null primary key,
nome varchar(30) not null,
senha varchar(60) not null
) engine=InnoDB default charset=utf8;

create table generos(
cod int(11) not null primary key auto_increment,
genero varchar(20) not null
) engine=InnoDB default charset=utf8;

create table editoras(
cod int(11) not null primary key auto_increment,
editora varchar(100) not null,
pais varchar(20) not null
) engine=InnoDB default charset=utf8;

create table autores(
cod int(11) not null primary key auto_increment,
nome varchar(100) not null,
foto varchar(100) not null
) engine=InnoDB default charset=utf8;

create table livros(
cod int(11) not null primary key auto_increment,
nome varchar(100) not null,
cod_genero int (11) not null,
cod_editora int(11) not null,
cod_autor int(11) not null,
resumo text not null,
capa varchar(100) default null,

CONSTRAINT cod_genero FOREIGN KEY (cod_genero) REFERENCES generos (cod),
CONSTRAINT cod_editora FOREIGN KEY (cod_editora) REFERENCES editoras (cod),
CONSTRAINT cod_autor FOREIGN KEY (cod_autor) REFERENCES autores (cod)
) engine=InnoDB default charset=utf8;

insert into usuarios(usuario, nome, senha) values
('admin', 'Admin', '$2y$10$czRuSmzdzcZ9aINEHwBaoeK53hqGapcht/tGIf39u/80MWR.VZS3q');