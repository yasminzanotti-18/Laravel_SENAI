create database bibliotecaLaravel;
use bibliotecaLaravel;

create table Livros(
	Id int auto_increment primary key,
    NomeDoLivro varchar(100),
    Autor varchar(100),
    Descricao varchar(255),
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE Livros 
ADD COLUMN editora_id INT,
ADD CONSTRAINT fk_Livros_Editora
FOREIGN KEY (editora_id) REFERENCES Editora(id);

ALTER TABLE Livros
ADD COLUMN detalhe_id INT,
ADD CONSTRAINT fk_Livros_Detalhe
FOREIGN KEY (detalhe_id) REFERENCES Detalhe(id);

create table Editora(
	Id int auto_increment primary key,
    NomeEditora varchar(100),
    Cnpj int,
    Pais varchar(255),
    Cidade varchar(255),
    created_at timestamp null,
    updated_at timestamp null
);

create table Detalhe(
	id int auto_increment primary key,
    custo varchar(100),
    preco_venda varchar(100),
    imposto varchar(100),
    created_at timestamp null,
    updated_at timestamp null
);

select * from Livros;
select * from Editora;
select * from Detalhe;