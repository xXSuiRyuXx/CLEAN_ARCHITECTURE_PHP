CREATE DATABASE suppliers_bd;

USE suppliers_bd;

CREATE Table Suppliers(
    code VARCHAR(20) PRIMARY KEY NOT NULL,
    password VARCHAR(40) DEFAULT 'Abc**',
    email VARCHAR(90) UNIQUE NOT NULL,
    name VARCHAR(50) NOT NULL,
    contact VARCHAR(70) NOT NULL,
    phone VARCHAR(70) NOT NULL,
    direction VARCHAR(70) NOT NULL,
    city VARCHAR(70) NOT NULL,
    country VARCHAR(70) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE = INNODB;

DESCRIBE Suppliers;
