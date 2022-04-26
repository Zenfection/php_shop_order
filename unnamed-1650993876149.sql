
CREATE TABLE tb_cart
(
  username   varchar(255) NOT NULL,
  id_product int(11)      NOT NULL,
  amount     int          NOT NULL
);

CREATE TABLE tb_category
(
  id_category char(25)     NOT NULL,
  title       varchar(50)  NOT NULL,
  image       varchar(255) NOT NULL,
  active      tinyint(1)   NOT NULL,
  PRIMARY KEY (id_category)
);

CREATE TABLE tb_customer
(
  username varchar(255) NOT NULL,
  fullname varchar(255) NOT NULL,
  email    varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  phone    varchar(255) NULL    ,
  address  varchar(255) NULL    ,
  PRIMARY KEY (username)
);

CREATE TABLE tb_order
(
  id_order          char(10)     NOT NULL,
  username          varchar(255) NOT NULL,
  name_customer     varchar(255) NOT NULL,
  phone_customer    VARCHAR(11)  NOT NULL,
  address_customer  VARCHAR(255) NOT NULL,
  email_customer    varchar(255) NULL    ,
  city_customer     varchar(50)  NOT NULL,
  province_customer varchar(50)  NOT NULL,
  status            VARCHAR(50)  NOT NULL,
  order_date        DATE         NOT NULL,
  shipped_date      DATE         NULL    ,
  process_date      DATE         NULL    ,
  PRIMARY KEY (id_order)
);

CREATE TABLE tb_order_details
(
  id_order   char(10) NOT NULL,
  id_product int(11)  NOT NULL,
  amount     int      NOT NULL,
  price      float    NOT NULL
);

CREATE TABLE tb_product
(
  id_product  int(11)       NOT NULL,
  name        varchar(50)   NOT NULL,
  description varchar(255)  NOT NULL,
  price       float         NOT NULL,
  ranking     int           NOT NULL,
  image       varchar(255)  NOT NULL,
  discount    DECIMAL(10,2) NULL    ,
  quantity    int           NOT NULL,
  id_category char(25)      NOT NULL,
  PRIMARY KEY (id_product)
);

ALTER TABLE tb_product
  ADD CONSTRAINT FK_tb_category_TO_tb_product
    FOREIGN KEY (id_category)
    REFERENCES tb_category (id_category);

ALTER TABLE tb_order_details
  ADD CONSTRAINT FK_tb_order_TO_tb_order_details
    FOREIGN KEY (id_order)
    REFERENCES tb_order (id_order);

ALTER TABLE tb_order_details
  ADD CONSTRAINT FK_tb_product_TO_tb_order_details
    FOREIGN KEY (id_product)
    REFERENCES tb_product (id_product);

ALTER TABLE tb_order
  ADD CONSTRAINT FK_tb_customer_TO_tb_order
    FOREIGN KEY (username)
    REFERENCES tb_customer (username);

ALTER TABLE tb_cart
  ADD CONSTRAINT FK_tb_customer_TO_tb_cart
    FOREIGN KEY (username)
    REFERENCES tb_customer (username);

ALTER TABLE tb_cart
  ADD CONSTRAINT FK_tb_product_TO_tb_cart
    FOREIGN KEY (id_product)
    REFERENCES tb_product (id_product);
