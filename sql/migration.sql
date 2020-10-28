CREATE DATABASE hr;

CREATE TABLE hr.tb_users (
    id       INTEGER AUTO_INCREMENT PRIMARY KEY,
    fname    VARCHAR(256), 
    lname    VARCHAR(256),
    city     VARCHAR(256), 
    country  VARCHAR(256),
    username VARCHAR(256),
    password VARCHAR(256),
    email    VARCHAR(256),
    phone    VARCHAR(256)
);
SELECT * FROM hr.tb_users ;

CREATE TABLE hr.tm_roles (
    role_id    INTEGER AUTO_INCREMENT PRIMARY KEY,
    role_title VARCHAR(256) NOT NULL
);
SELECT * FROM hr.tm_roles ;

INSERT INTO hr.tm_roles(role_title) VALUES('EMPLOYEE');
INSERT INTO hr.tm_roles(role_title) VALUES('EMPLOYER');
INSERT INTO hr.tm_roles(role_title) VALUES('HR'	);

CREATE TABLE hr.tb_users__roles (
    user_id INTEGER,
    role_id INTEGER,
    PRIMARY KEY(user_id, role_id)
);

CREATE TABLE hr.tb_ad_post (
    id              INTEGER AUTO_INCREMENT PRIMARY KEY,
    title           VARCHAR(256) NOT NULL,
    content         TEXT NOT NULL,
    preview_content VARCHAR(1024) 
);

CREATE TABLE hr.tm_category (
    id    INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(256) NOT NULL
);

INSERT INTO hr.tm_category(title) VALUES('Aviation');
INSERT INTO hr.tm_category(title) VALUES('Banking,Accounting');
INSERT INTO hr.tm_category(title) VALUES('Electronics');
INSERT INTO hr.tm_category(title) VALUES('Insurance');
INSERT INTO hr.tm_category(title) VALUES('IT');
INSERT INTO hr.tm_category(title) VALUES('Marketing');
INSERT INTO hr.tm_category(title) VALUES('Pharmacy');
INSERT INTO hr.tm_category(title) VALUES('Real Estates');

CREATE TABLE hr.tb_ad_post__category(
    post_id       INTEGER,
    category_id   INTEGER,
    PRIMARY KEY(post_id, category_id)
);

CREATE TABLE hr.tm_company (
    id    INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(256) NOT NULL
);

INSERT INTO hr.tm_company(title) VALUES('SGS');
INSERT INTO hr.tm_company(title) VALUES('Alianz');
INSERT INTO hr.tm_company(title) VALUES('Wizz Air');
INSERT INTO hr.tm_company(title) VALUES('Framar');
INSERT INTO hr.tm_company(title) VALUES('VGI Properties');

CREATE TABLE hr.tb_ad_post__company(
    post_id      INTEGER,
    company_id INTEGER,
    PRIMARY KEY(post_id, company_id)
);

CREATE TABLE hr.tb_auth_tokken(
	tokken VARCHAR(512) NOT NULL PRIMARY KEY
);

