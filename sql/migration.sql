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
    id    INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(256) NOT NULL
);
SELECT * FROM hr.tm_roles ;

INSERT INTO hr.tm_roles(title) VALUES('EMPLOYEE');
INSERT INTO hr.tm_roles(title) VALUES('EMPLOYER');
INSERT INTO hr.tm_roles(title) VALUES('HR'	);

CREATE TABLE hr.tb_users__roles (
    user_id INTEGER,
    role_id INTEGER,
    PRIMARY KEY(user_id, role_id)
);
SELECT * FROM hr.tb_users__roles ;

CREATE TABLE hr.tb_ad_post (
    id              INTEGER AUTO_INCREMENT PRIMARY KEY,
    title           VARCHAR(256) NOT NULL,
    content         TEXT NOT NULL,
    preview_content VARCHAR(1024) 
);
INSERT INTO hr.tb_ad_post(title, content, preview_content) VALUES('JS Developer','Join to our family and cross the line with us!
ISGB is looking for a JS/TypeScript Developer to join our collaborative development team. As a JS/TypeScript Ninja Developer, you will be part of a challenging IIoT startup, based on AWS. The goal of the project is to take the manufacturing to 21st century following the industry 4.0 trend.
Your role:
Take part in the architecture, design, development and implementation of Cloud solutions,using Amazon Web Services (AWS)Writes, debugs and delivers code.Prioritizes and diagnoses incidents according to agreed procedure. Investigates causes of incidents and seeks resolution.Works with cross-functional team, using agile practices
','ISGB is looking for a JS/TypeScript Developer ');

INSERT INTO hr.tb_ad_post(title, content, preview_content) VALUES('Senior Associate','Working on Projects involving the Banking Team
Hold regular meetings with internal teams to receive/give an update on projects involving the Banking Team
Establish and maintain business contacts with banking partners based on company needs
Take the lead on supplying the necessary documents and information to banks regarding initial onboarding and regular KYC refreshes
Update and maintain the necessary banking data in the company’s system','Alianz is looking for Senior Associate');

INSERT INTO hr.tb_ad_post(title, content, preview_content) VALUES('Airport Concierge','Responsibilities:
· Meet and greet all crews arriving to the airport
· Helping with day to day accounting issues
· Maintain company’s image - wearing our uniform, representative look
· Prepare the grounds for meetings and making arrangements
· Insure the time management and running office agenda
Please send us your CV!Contact person: Mrs. Andrea Montanari ','Wizz Air is looking for Airport Concierge');

INSERT INTO hr.tb_ad_post(title, content, preview_content) VALUES('Engineer','What our engineers do:
    -Design advanced analog audio and power supply circuits;
    -Draw the schematics on Altium and simulate them on SPICE;
    -Debug them using Oscilloscopes, function generators, etc; 
    The candidate should have:
    -A university degree in Engineering, Electronics or similar and 3+ years of professional experience','DA Electronics is looking for Engineer');
    
INSERT INTO hr.tb_ad_post(title, content, preview_content) VALUES('Business assistant','What do we expect from you:
• Minimum high school degree (Higher education will be considered a plus);
• Very good command in English both written and verbal;
• Fluent command of basic MS Office applications – Word, Excel, etc.;
• Experience with telephone communication to clients is an advantage;
• Excellent communication skills, proven team player;','SGS is looking for Business assistant');    

SELECT * FROM hr.tb_ad_post ;

CREATE TABLE hr.tm_category (
    id    INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(256) NOT NULL
);

INSERT INTO hr.tm_category(title) VALUES('Aviation');
INSERT INTO hr.tm_category(title) VALUES('Banking,Accounting');
INSERT INTO hr.tm_category(title) VALUES('Electronics');
INSERT INTO hr.tm_category(title) VALUES('Insurance');
INSERT INTO hr.tm_category(title) VALUES('IT');

CREATE TABLE hr.tb_ad_post__category(
    post_id       INTEGER,
    category_id   INTEGER,
    PRIMARY KEY(post_id, category_id)
);
INSERT INTO hr.tb_ad_post__category(post_id, category_id) VALUES(1, 5);
INSERT INTO hr.tb_ad_post__category(post_id, category_id) VALUES(2, 2);
INSERT INTO hr.tb_ad_post__category(post_id, category_id) VALUES(3, 1);
INSERT INTO hr.tb_ad_post__category(post_id, category_id) VALUES(4, 3);
INSERT INTO hr.tb_ad_post__category(post_id, category_id) VALUES(5, 4);
SELECT * FROM hr.tb_ad_post__category ;

CREATE TABLE hr.tm_company (
    id      INTEGER AUTO_INCREMENT PRIMARY KEY,
    title   VARCHAR(256) NOT NULL
);

INSERT INTO hr.tm_company(title) VALUES('SGS');
INSERT INTO hr.tm_company(title) VALUES('Alianz');
INSERT INTO hr.tm_company(title) VALUES('Wizz Air');
INSERT INTO hr.tm_company(title) VALUES('DA Electronics');
INSERT INTO hr.tm_company(title) VALUES('ISGB');

CREATE TABLE hr.tb_ad_post__company(
    post_id      INTEGER,
    company_id   INTEGER,
    PRIMARY KEY(post_id, company_id)
);

INSERT INTO hr.tb_ad_post__company(post_id, company_id) VALUES(1, 5);
INSERT INTO hr.tb_ad_post__company(post_id, company_id) VALUES(2, 2);
INSERT INTO hr.tb_ad_post__company(post_id, company_id) VALUES(3, 3);
INSERT INTO hr.tb_ad_post__company(post_id, company_id) VALUES(4, 4);
INSERT INTO hr.tb_ad_post__company(post_id, company_id) VALUES(5, 1);

CREATE TABLE hr.tb_auth_tokken(
	tokken VARCHAR(512) NOT NULL PRIMARY KEY
);

