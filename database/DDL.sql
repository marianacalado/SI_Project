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
    role TEXT NOT NULL CONSTRAINT role_check_em CHECK (role = "emp")
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
    role TEXT NOT NULL CONSTRAINT role_check_cus CHECK (role = "cust")
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
    category_id INTEGER NOT NULL REFERENCES Category,
    brand_id INTEGER NOT NULL REFERENCES Brand
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
    status TEXT NOT NULL CONSTRAINT status_check DEFAULT "completed" CHECK (status = "completed" OR status = "on hold" OR status = "processing")
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
INSERT INTO Employee (id_employee, name, phone_num, e_mail, address, password, role) VALUES (1, 'Mariana Calado', 912345678,'up202003072@fe.up.pt', 'R. do Visc. de Setúbal 328, 4200-498 Porto','mariana12%','emp');
INSERT INTO Employee (id_employee, name, phone_num, e_mail, address, password, role) VALUES (2, 'Susana Teixeira', 922345678, 'up202103376@fe.up.pt', 'Av. Visc. de Barreiros EDF Maia Luz , lote 36 , primeiro andar, 4470-151 Maia','susana12%','emp');
INSERT INTO Employee (id_employee, name, phone_num, e_mail, address, password, role) VALUES (3, 'Marco António', 932345678, 'marco_ant@gmail.com', 'Av. da França 20, 4050-275 Porto','mmarco12%','emp');
INSERT INTO Employee (id_employee, name, phone_num, e_mail, address, password, role) VALUES (4, 'Carlos David', 962345678, 'carlos_dav@hotmail.com', 'Rua do Campo Alegre 254, 4150-169 Porto','davis13%','emp');
INSERT INTO Employee (id_employee, name, phone_num, e_mail, address, password, role) VALUES (5, 'Carolina Rita', 913345679, 'rita_carol9@gmail.com', 'R. do Barão de Forrester 862, 4050-273 Porto','carol13%','emp');
INSERT INTO Employee (id_employee, name, phone_num, e_mail, address, password, role) VALUES (6, 'Ana Alves', 912345671, 'ana_alves23@gmail.com', 'Pça da Concórdia 49, 4465-092 São Mamede de Infesta','alves12%','emp');
INSERT INTO Employee (id_employee, name, phone_num, e_mail, address, password, role) VALUES (7, 'Gonçalo Aguiar', 912345672, 'gonçalo_a@gmail.com', 'Tv. da Concórdia 61, 4465-040 São Mamede de Infesta','aguiar13%','emp');--este nao trata de encomendas

--Customer   
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (1, 'Roberto Carlos', 912345673,'roberto1@gmail.pt','R. Direita do Viso 120, 4250-198 Porto', 'Porto','roberto_bolo1', 215667674,'cust'); -- nao vai fazer encomenda 
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (2, 'Ana Martins', 912345674,'ana_martins@gmail.pt','R. Alto do Forte IC 19, piso 1, loja 1.02, 2635-018 Rio de Mouro' , 'Lisboa','martina_123', 225787675,'cust'); -- nao vai fazer order
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (3, 'Maria Duarte', 912345675,'maria_duart5@gmail.pt','R. Eng. Ferreira Dias 181, Porto' ,'Porto','melo%$0', 235667676,'cust');-- vai fazer 2 order 
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (4, 'Duarte Rios', 912345676,'duarte_rios@gmail.pt', 'Calçada Martim de Freitas, 3000-456 Coimbra', 'Coimbra','duarte&5', 245967677,'cust'); -- vai fazer 3 order
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (5, 'Dulce Pontes', 912345677,'dulce_pontes2@gmail.pt', 'R. Manuel Pinto de Azevedo 684, 4100-320 Porto','Porto','dulce_45', 255667678,'cust'); -- vai fazer 1 order
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (6, 'Sílvia Carmo', 922345671,'silvia_carmo4@gmail.pt',' R. Dr. Joaquim de Sousa Bastos 2 loja, 2735-369 Agualva-Cacém' ,'Lisboa', 'silvia101', 265447679,'cust'); -- vai fazer 1 order
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (7, 'Manuel Pinto', 922345672,'pinto_manel%@gmail.pt', ' Tv. Cruzeiro 5, 3045-051 Coimbra' , 'Coimbra', 'pinto123', 265447688,'cust');-- vai fazer 2 order
INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (8, 'José Pedro', 922355672,'jose_gar%@gmail.pt', ' Tv. Garcia 6, 3046-061 Coimbra' , 'Coimbra', 'jose1&3', 265147688,'cust');-- vai fazer 1 order

--Suplier
INSERT INTO Suplier (id_suplier, name, phone_num, e_mail, address) VALUES (1, 'Alconox', 914948404,'alconoxinfo@gmail.pt', '30 Glenn Street, Suite 309 White Plains 10603 New York United States of America'); --este sup nao vai ter produtos 
INSERT INTO Suplier (id_suplier, name, phone_num, e_mail, address) VALUES (2, 'Berkshire Corporation', 902427000,'BerkshireCorpinfo@gmail.pt', '21 River Street Great Barrington 01230 Massachusetts United States of America');--este vai dar 5 produtos
INSERT INTO Suplier (id_suplier, name, phone_num, e_mail, address) VALUES (3, 'Celitron', 225507005,'info@celitron.com', 'Szent László str. 36. H-2600 Vác Pest Hungary');--este vai dar 5 produtos
INSERT INTO Suplier (id_suplier, name, phone_num, e_mail, address) VALUES (4, 'Drugsales', 225427030,'giulia@drugsalesltd.com', 'Russell Builidings, Naxxar Road Lija, IKL9022 Malta');--este vai dar 5 produtos
INSERT INTO Suplier (id_suplier, name, phone_num, e_mail, address) VALUES (5, 'Estima Pharma Solutions', 225267629 ,'info@estimapharma.com', '#2924, USHA THE EDIFICE, 3rd Floor, 14th Cross, Shashtrinagar (off K.R. Road), Banashankari 2nd Stage, Bangalore, 560070 India');--este vai dar 5 produtos
INSERT INTO Suplier (id_suplier, name, phone_num, e_mail, address) VALUES (6, 'GE Healthcare Life Sciences', 225400600,'orderse@ge.com', 'Bjorkgatan 30 SE-75184 Uppsala Sweden');--este vai dar 4 produtos (ultimos, vai haver 1 que nao tem fornacedor)

--Category
INSERT INTO Category (id_category, name) VALUES (1, 'Beauty and Hygiene');
INSERT INTO Category (id_category, name) VALUES (2, 'Personal Care');
INSERT INTO Category (id_category, name) VALUES (3, 'Medicines');
INSERT INTO Category (id_category, name) VALUES (4, 'Food supplements and Nutrition');
INSERT INTO Category (id_category, name) VALUES (5, 'Contraception and intimate products');
INSERT INTO Category (id_category, name) VALUES (6, 'Covid-19');
INSERT INTO Category (id_category, name) VALUES (7, 'Medical Equipment');
INSERT INTO Category (id_category, name) VALUES (8, 'Animal Care');
INSERT INTO Category (id_category, name) VALUES (9, 'Orthopedic Products');--esta categoria não vai ter produtos

--Brand
INSERT INTO Brand (id_brand, name) VALUES (1, 'Giorgio Armani');
INSERT INTO Brand (id_brand, name) VALUES (2, 'Vichy');
INSERT INTO Brand (id_brand, name) VALUES (3, 'La Roche Posay');--2 prod
INSERT INTO Brand (id_brand, name) VALUES (4, 'Sensilis');
INSERT INTO Brand (id_brand, name) VALUES (5, 'Aposán');
INSERT INTO Brand (id_brand, name) VALUES (6, 'Listerine');
INSERT INTO Brand (id_brand, name) VALUES (7, 'Urgo');--tem dois produtos
INSERT INTO Brand (id_brand, name) VALUES (8, 'Venixe');
INSERT INTO Brand (id_brand, name) VALUES (9, 'Sargenor');
INSERT INTO Brand (id_brand, name) VALUES (10, 'Bayer');--tem 2 md
INSERT INTO Brand (id_brand, name) VALUES (11, 'Niquitin');--tem 2 med
INSERT INTO Brand (id_brand, name) VALUES (12, 'Moreno'); --tem 3 prod
INSERT INTO Brand (id_brand, name) VALUES (13, 'Eucerin'); -- 3 prod
INSERT INTO Brand (id_brand, name) VALUES (14, 'Durex'); -- 1 med
INSERT INTO Brand (id_brand, name) VALUES (15, 'Race'); -- 2 caes


--Product
--categoria, beleza e higiene e cuidado pessoal  
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (1, 'Acqua Di Gio', 65.99 ,'100 mL aromatic aquatic masculine perfume, marked by citrus and aquatic notes, which reveal a unique energizing freshness.', 1 , 1 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (2, 'Ideal Body Duche Spa Gel-Óleo', 20.00 ,'200 ml shower gel enriched with active ingredients and Vichy mineralizing water, for instant and long-lasting hydration.', 1 , 2 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (3, 'La Roche-Posay Desmaquilhante de Olhos Fisiológico', 10.00,'Make-up remover 125 ml gentle for sensitive eyes.', 1 , 3 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (4, 'Sensilis Perfect Line Liner de Lábios Rose', 8.89 ,'Pink pencil with a creamy texture that allows you to perfectly draw the contour of the lips. Suitable for all skin types.', 1 , 4 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (5, 'Aposán Recargas Lima Elétrica', 40.00 ,'Refills for Aposan Electric Lima that include 1 filer head, 2 polisher heads and 2 brightener heads.', 2 , 5 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (6, 'Listerine Dentes e Gengivas Elixir', 7.99 ,'Elixir 250 mL ideal for strengthening tooth enamel, protecting and strengthening gums, eliminating bacteria that cause cavities, plaque, gingivitis and halitosis.', 2 , 6 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (7, 'Urgo Dor Plantar', 18.70,'Protective pad that contains a polymeric gel that relieves pain, protects and isolates the plantar area from everyday pressure and friction.', 2 , 7 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (8, 'Venixe Fralda Média Noite', 14.09 ,'Diapers with elastic bands and of medium size, indicated for very severe incontinence. With elastic fit, anatomical shape, absorbent layer, moisture indicator, non-woven covering up to the edges and protective side barriers, 15 units.', 2 , 8 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (9, 'Urgo Verrugas Tratamento Crioterapia', 19.01 ,'Cryotherapy treatment, for use at home, developed for the treatment of common warts located on the hands and feet in adults and children from 4 years old (20 ml).', 2 , 7 );
--medicamento sem receita
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (10, 'Sargenor 5, 5000 mg/10 mL x 20 amp beb', 15.99 ,'Medication indicated in situations of physical, psychological or sexual fatigue.', 3 , 9 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (11, 'Rennie Digestif, 680/80 mg x 24 comp mast', 3.99,'Medication indicated to relieve the symptoms of heartburn and bloating.', 3 , 10 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (12, 'Aspirine C, 400/240 mg x 10 comp eferv', 5.40 ,'Medication indicated in case of fever and pain of mild to moderate intensity.', 3 , 10 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (13, 'Niquitin Clear, 14 mg/24 h x 14 sist transder', 56.01 ,'Medication indicated for those who want to quit smoking.', 3 , 11 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (14, 'Niquitin Mint, 1,5 mg x 60 comp chupar', 32.95,'Medication indicated for those who want to quit smoking.', 3 , 11 );
--medicamento com receita
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (15, 'Evacol, 7,5 mg/mL-30 mL x 1 sol oral gta, 7.5 mg/ml x 1 sol oral gta', 5.95 ,'Medicine indicated in the treatment of constipation (constipation). Evacol is a non-prescription medicine indicated in cases of constipation and in situations requiring facilitated defecation.', 3 , 12 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (16, 'Doce Alívio x 30 comp ', 6.95 ,'Medication indicated in the treatment of constipation of various etiologies or before intestinal examination or surgery.', 3 , 12 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (17, 'Septolete Duo, 3/1 mg x 16 pst', 6.95 ,'Medication indicated in the treatment of constipation of various etiologies or before intestinal examination or surgery.', 3 , 13 );
--suplementos ate saude animal --categoria orto não vai ter produtos!!!
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (18, 'Dulcosoft Pó Solulçao Oral Saquetas 10 G x20', 13.95 ,'Powder for oral solution indicated to soften hard and dry stools to facilitate evacuation.', 4 , 12 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (19, 'Durex Natural Plus Preservativo', 3.95 ,'Condoms, easy to put on that provide comfort to use.', 5 , 12 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (20, 'Máscaras Cirúrgicas IIR Criança Freedom Azul Caixa x50', 3.99 ,'Children IRR surgical masks. Pack of 50 units.', 6 , 13 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (21, 'Ladvance Álcool Gel Desinfetante 5L', 22.50 ,'All skin types. Family use. 70% ethyl alcohol. Skin disinfectant gel that gives the skin a feeling of freshness and well-being.', 6 , 13 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (22, 'Flocath Hydrogel Cateter 851121 CH 12', 3.99 ,'Hydrogel catheter, with delaton tip and two ports, suitable for women.', 7 , 3 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (23, 'Wejoint Comprimidos X30 Cão Grande', 21.30 ,'Complementary food for dogs and cats developed for the aid and nutritional support of the joints. Recommended for young growing animals, animals with high physical activity, and in any type of joint pathology (inflammatory, traumatic, degenerative or where there are situations of joint immobilization).', 8 , 15 );
INSERT INTO Product (id_product, name, unit_price, description, category_id, brand_id) VALUES (24, 'Omniomega Capsules X120', 38.99 ,'Food supplement for dogs and cats with a high content of Omega-3 and vitamin E. Omniomega has benefits in dermal, cardiovascular, renal, neural, orthopedic and oncological pathologies.', 8 , 15 );


--SupProduct (o suplier 1 nao tem produtos e o produto 25 nao tem sup)
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (2, 1 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (2, 2 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (2, 3 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (2, 4 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (2, 5 , 100);

INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (3, 6 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (3, 7 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (3, 8 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (3, 9 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (3, 10, 100);

INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (4, 11 , 100 );
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (4, 12 , 100 );
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (4, 13 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (4, 14 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (4, 15 , 100);

INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (5, 16 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (5, 17 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (5, 18 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (5, 19 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (5, 20 , 100);

INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (6, 21 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (6, 22 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (6, 23 , 100);
INSERT INTO SupProduct (suplier_id, product_id , quantity) VALUES (6, 24 , 100);

--Orders
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (1, '01/01/2022', 'R. Eng. Ferreira Dias 181, Porto',3,1, 'completed');
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (2, '01/02/2022', 'R. Eng. Ferreira Dias 181, Porto',3,1, 'on hold');
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (3, '18/04/2022', 'Calçada Martim de Freitas, 3000-456 Coimbra',4,2, 'processing');
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (4, '18/04/2022', 'Calçada Martim de Freitas, 3000-456 Coimbra',4,2, 'processing');
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (5, '18/04/2022', 'Calçada Martim de Freitas, 3000-456 Coimbra',4,2, 'on hold');
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (6, '05/01/2022', 'R. Manuel Pinto de Azevedo 684, 4100-320 Porto',5,3, 'completed');
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (7, '09/01/2022', 'R. Dr. Joaquim de Sousa Bastos 2 loja, 2735-369 Agualva-Cacém',6,4, 'processing');
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (8, '20/01/2022', ' Tv. Cruzeiro 5, 3045-051 Coimbra',7,5, 'completed');
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (9, '20/01/2022', ' Tv. Cruzeiro 5, 3045-051 Coimbra',7,5, 'on hold');
INSERT INTO Orders (id_order, date, delv_address,  customer_id , employee_id, status) VALUES (10, '03/01/2022', 'Tv. Garcia 6, 3046-061 Coimbra',8,6, 'on hold');


--OrdersProduct DUVIDA CADA ENCOMENDA PODE CONTER VARIOS PRODUTOS MAS SE FIZER SEM A CLASSE QUANTIDADE CADA PRODUTO TEM DE SER ENCOMENDADO OU PONHO SO NOT NULL E ASSIM RESOLVE O PROB OU ENTAO DA PARA FAZER COM AS CHAVES UNICAS? 

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (1, 1, 1);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (1, 2, 1);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (1, 3, 2);

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (2, 4, 5);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (2, 5, 1);

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (3, 6, 1);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (3, 7, 6);

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (4, 8, 2);

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (5, 9, 4);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (5, 10, 9);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (5, 11, 4);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (5, 12, 9);

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (6, 13, 4);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (6, 14, 9);

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (7, 15, 4);

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (8, 16, 9);

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (9, 17, 4);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (9, 18, 9);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (9, 19, 4);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (9, 20, 9);

INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (10, 21, 4);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (10, 22, 9);
INSERT INTO OrdersProduct (order_id, product_id, quantity) VALUES (10, 23, 4);


--Prescription
INSERT INTO Prescription (id_prescription, doct_name, benf_name, product_id, order_id) VALUES (1, 'Tiago rodrigues', 'Manuel Pinto' ,16, 9);
INSERT INTO Prescription (id_prescription, doct_name, benf_name, product_id, order_id) VALUES (2, 'Vitor Olavo', 'José Pinto' ,17, 10);

-- TESTE What are the names and locations of all costumers? (name, city)
--SELECT name, city FROM Customer; --selecionar as colunas (name, city) da tabela 
--SELECT * FROM Category