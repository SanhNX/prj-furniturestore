create database furniture_store;
use furniture_store;

create table tbl_category
(
    id int auto_increment primary key not null,
    name varchar(100) not null,
    description varchar(1000)
);
create table tbl_product
(
    id int auto_increment primary key not null,
    name varchar(100) not null,
    price int not null,
    promotion_price int,
    image varchar(1000) not null,
    thumnail_list varchar(1000),
    size varchar(100),
    material varchar(100),
    color varchar(100),
    description varchar(1000)
);
create table tbl_administrator
(
    id int auto_increment primary key not null,
    name varchar(30) not null,
    email varchar(50) not null,
    password varchar(50) not null,
    avatar varchar(100),
    gender int,
    status int
);
create table tbl_feedback
(
    id int auto_increment primary key not null,
    title varchar(30) not null,
    name varchar(50) not null,
    email varchar(50) not null,
    description varchar(1000) not null
);