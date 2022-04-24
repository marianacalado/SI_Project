PRAGMA foreign_keys = ON;
.headers on --aparece de forma bonita
.mode columns --aparece de forma bonita
.nullvalue NULL

--Employee   
DROP TABLE IF EXISTS Employee;
 
CREATE TABLE Employee(
    id_employee INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    phone_num INTEGER NOT NULL UNIQUE,
    e_mail TEXT NOT NULL UNIQUE,
    adress TEXT,
    password TEXT NOT NULL
);

--Customer   
DROP TABLE IF EXISTS Customer;
 
CREATE TABLE Customer(
    id_customer INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    phone_num INTEGER NOT NULL UNIQUE,
    e_mail TEXT NOT NULL UNIQUE,
    adress TEXT NOT NULL,
    city TEXT NOT NULL,
    password TEXT NOT NULL,
    VAT_num INTEGER NOT NULL UNIQUE
);

--Suplier
DROP TABLE IF EXISTS Suplier;
 
CREATE TABLE Suplier(
    id_suplier INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    phone_num INTEGER NOT NULL UNIQUE,
    e_mail TEXT NOT NULL UNIQUE,
    adress TEXT 
);

--Product
DROP TABLE IF EXISTS Product;
 
CREATE TABLE Product(
    id_product INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    unit_price REAL NOT NULL CONSTRAINT product_price_must_be_superior_0 CHECK (unit_price > 0),
    description TEXT NOT NULL,
    category_id TEXT NOT NULL REFERENCES Category,
    brand_id TEXT NOT NULL REFERENCES Brand
);

--SupProduct
DROP TABLE IF EXISTS SupProduct;
 
CREATE TABLE SupProduct(
    suplier_id INTEGER REFERENCES Suplier,
    product_id INTEGER REFERENCES Product,
    quantity INTEGER NOT NULL, --CHECK??
    PRIMARY KEY (suplier_id, product_id)
);

DROP TABLE IF EXISTS Orders;

CREATE TABLE Orders(
    id_order INTEGER PRIMARY KEY,
    date TEXT NOT NULL,
    delv_address TEXT NOT NULL,
    customer_id INTEGER NOT NULL REFERENCES Customer,
    employee_id INTEGER NOT NULL REFERENCES Employee
);

DROP TABLE IF EXISTS OrdersProduct;

CREATE TABLE OrdersProduct(
    order_id INTEGER REFERENCES Orders,
    product_id INTEGER REFERENCES Product,
    quantity INTEGER NOT NULL, --CHECK??
    PRIMARY KEY (order_id, product_id)
);

DROP TABLE IF EXISTS Category;

CREATE TABLE Category(
    id_category INTEGER PRIMARY KEY,
    name TEXT NOT NULL
);

DROP TABLE IF EXISTS Brand;

CREATE TABLE Brand(
    id_brand INTEGER PRIMARY KEY,
    name TEXT NOT NULL
);

DROP TABLE IF EXISTS Prescription;

CREATE TABLE Prescription (
    id_prescription INTEGER PRIMARY KEY,
    doct_name TEXT NOT NULL,
    benf_name TEXT NOT NULL,
    product_id INTEGER NOT NULL REFERENCES Product --VAI SER MUDADO
);

DROP TABLE IF EXISTS OrderPrescription;

CREATE TABLE OrderPrescription (
    order_id INTEGER REFERENCES Orders,
    prescription_id INTEGER REFERENCES Prescription,
    quantity INTEGER NOT NULL -- CHECK
);
