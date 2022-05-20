PRAGMA foreign_keys = ON;
.headers on 
.mode columns 
.nullvalue NULL

--Employee   
DROP TABLE IF EXISTS Employee;
 
CREATE TABLE Employee(
    id_employee INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    phone_num INTEGER NOT NULL UNIQUE,
    e_mail TEXT NOT NULL UNIQUE,
    address TEXT,
    password TEXT NOT NULL,
    role TEXT NOT NULL
);

--Customer   
DROP TABLE IF EXISTS Customer;
 
CREATE TABLE Customer(
    id_customer INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    phone_num INTEGER NOT NULL UNIQUE,
    e_mail TEXT NOT NULL UNIQUE,
    address TEXT NOT NULL,
    city TEXT NOT NULL,
    password TEXT NOT NULL,
    VAT_num INTEGER NOT NULL UNIQUE,
    role TEXT NOT NULL
);

--Suplier
DROP TABLE IF EXISTS Suplier;
 
CREATE TABLE Suplier(
    id_suplier INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    phone_num INTEGER NOT NULL UNIQUE,
    e_mail TEXT NOT NULL UNIQUE,
    address TEXT 
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
    quantity INTEGER NOT NULL CONSTRAINT quantity_must_be_superior_0 CHECK (quantity > 0), 
    PRIMARY KEY (suplier_id, product_id)
);

--Orders
DROP TABLE IF EXISTS Orders;

CREATE TABLE Orders(
    id_order INTEGER PRIMARY KEY,
    date TEXT NOT NULL,
    delv_address TEXT NOT NULL,
    customer_id INTEGER NOT NULL REFERENCES Customer,
    employee_id INTEGER NOT NULL REFERENCES Employee,
    status TEXT NOT NULL
);

--OrdersProduct
DROP TABLE IF EXISTS OrdersProduct;

CREATE TABLE OrdersProduct(
    order_id INTEGER REFERENCES Orders,
    product_id INTEGER REFERENCES Product,
    quantity INTEGER NOT NULL CONSTRAINT quantity_must_be_superior_0 CHECK (quantity > 0), 
    PRIMARY KEY (order_id, product_id)
);

--Category
DROP TABLE IF EXISTS Category;

CREATE TABLE Category(
    id_category INTEGER PRIMARY KEY,
    name TEXT NOT NULL
);

--Brand
DROP TABLE IF EXISTS Brand;

CREATE TABLE Brand(
    id_brand INTEGER PRIMARY KEY,
    name TEXT NOT NULL
);

--Prescription
DROP TABLE IF EXISTS Prescription;

CREATE TABLE Prescription (
    id_prescription INTEGER PRIMARY KEY,
    doct_name TEXT NOT NULL,
    benf_name TEXT NOT NULL,
    product_id INTEGER NOT NULL REFERENCES Product,
    order_id INTEGER NOT NULL REFERENCES Orders
);


--Inserts---------------------------------------------------
-- Employee   
INSERT INTO Employee (id_employee, name, phone_num, e_mail, address, password, role) VALUES (1, 'Mariana Calado', 912345678,'up202003072@fe.up.pt', 'Rua Aurélia de Sousa','4f31a719805c7ad9124289beb4abc44ed47b3c8b','emp');--Password é "123456789"
INSERT INTO Employee (id_employee, name, phone_num, e_mail, address, password, role) VALUES (2, 'Susana Teixeira', 912345679, 'up202103376@fe.up.pt', 'Rua Roberto Matias','f7c3bc1d808e04732adf679965ccc34ca7ae3441','emp');--Password é "123456788"

--Customer   
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (1, 'Roberto Carlos', 912345671,'roberto1@gmail.pt', 'Porto','Rua alma Girvo','4f31a719805c7ad9124289beb4abc44ed47b3c88', 265667674,'cust');--Password é "roberto_bolo1"
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (2, 'Ana Martins', 912345672,'ana_martins@gmail.pt', 'Lisboa', 'Rua da Lagoa','4f31a719805c7ad9124289beb4abc44ed47b3c89', 265667675,'cust');--Password é "martina_123"

--Suplier
INSERT INTO Suplier (id_suplier, name, phone_num, e_mail, address) VALUES (1, 'Alconox', 9149484040,'alconoxinfo@gmail.pt', '30 Glenn Street, Suite 309 White Plains 10603 New York United States of America');
INSERT INTO Suplier (id_suplier, name, phone_num, e_mail, address) VALUES (2, 'Berkshire Corporation', 902427000,'BerkshireCorpinfo@gmail.pt', '21 River Street Great Barrington 01230 Massachusetts United States of America');

-- TESTE What are the names and locations of all costumers? (name, city)
SELECT name, city FROM Customer; --selecionar as colunas (name, city) da tabela 

--Product
--SupProduct
--Orders
--OrdersProduct
--Category
--Brand
--Prescription