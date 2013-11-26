create database furniture_store;
use furniture_store; 

create table tbl_category
(
    id int auto_increment primary key not null,
    name varchar(100) not null,
    description varchar(1000)
);
create table tbl_sub_category
(
    id int auto_increment primary key not null,
    cateid int not null,
    name varchar(100) not null,
    description varchar(1000),
    CONSTRAINT FOREIGN KEY(cateid) references tbl_category(id)
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
    password varchar(50) not null
);
create table tbl_feedback
(
    id int auto_increment primary key not null,
    title varchar(30) not null,
    name varchar(50) not null,
    email varchar(50) not null,
    description varchar(1000) not null
);
INSERT INTO tbl_administrator(name, email, password) VALUES('Administrator', 'admin@gmail.com', 'admin');


INSERT INTO tbl_category(name) VALUES('Nội thất gia đình');
INSERT INTO tbl_category(name) VALUES('Nội thất văn phòng');
INSERT INTO tbl_category(name) VALUES('Đồ gỗ ngoài trời');

INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Bàn ăn');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Ghế');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Giường');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Tủ áo');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Salon');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Kệ tivi');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Tủ ngăn phòng');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Tủ rượu');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Tủ đầu giường');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Tủ đa năng');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Kệ giày');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Bàn trang điểm');
INSERT INTO tbl_sub_category(cateid, name) VALUES(1, 'Bàn học');

INSERT INTO tbl_sub_category(cateid, name) VALUES(2, 'Bàn làm việc');
INSERT INTO tbl_sub_category(cateid, name) VALUES(2, 'Bàn lãnh đạo');
INSERT INTO tbl_sub_category(cateid, name) VALUES(2, 'Bàn họp');
INSERT INTO tbl_sub_category(cateid, name) VALUES(2, 'Tủ hồ sơ');
INSERT INTO tbl_sub_category(cateid, name) VALUES(2, 'Bục kệ');

INSERT INTO tbl_sub_category(cateid, name) VALUES(3, 'Đồ gỗ ngoài trời');