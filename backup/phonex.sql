

CREATE TABLE `phoenix_agent` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `agent_id` mediumtext NOT NULL,
  `agent_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `city` mediumtext NOT NULL,
  `others_city` mediumtext NOT NULL,
  `district` mediumtext NOT NULL,
  `state` mediumtext NOT NULL,
  `pincode` mediumtext NOT NULL,
  `identification` mediumtext NOT NULL,
  `agent_details` mediumtext NOT NULL,
  `name_mobile_city` mediumtext NOT NULL,
  `opening_balance` mediumtext NOT NULL,
  `opening_balance_type` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_agent (id, created_date_time, creator, creator_name, bill_company_id, agent_id, agent_name, lower_case_name, mobile_number, address, city, others_city, district, state, pincode, identification, agent_details, name_mobile_city, opening_balance, opening_balance_type, deleted) VALUES ('1','2025-04-14 11:42:33','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55784d5451794d7a4e664d44453d','51584a3162413d3d','59584a3162413d3d','4e444d344e7a4d344e44597a4f413d3d','63326c325957746863326b3d','55326c325957746863326b3d','','566d6c796457526f645735685a324679','5647467461577767546d466b64513d3d','NULL','NULL','51584a3162447869636a357a61585a686132467a61547869636a355461585a686132467a61547869636a355761584a315a476831626d466e5958496f52476c7a6443347050474a79506c526862576c73494535685a485538596e492b49453176596d6c735a5341364944517a4f44637a4f4451324d7a673d','51584a316243416f4e444d344e7a4d344e44597a4f436b674c53425461585a686132467a61513d3d','','','0');

INSERT INTO phoenix_agent (id, created_date_time, creator, creator_name, bill_company_id, agent_id, agent_name, lower_case_name, mobile_number, address, city, others_city, district, state, pincode, identification, agent_details, name_mobile_city, opening_balance, opening_balance_type, deleted) VALUES ('2','2025-04-14 12:55:51','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55784d6a55314e5446664d44493d','566d6c756233526f','646d6c756233526f','4e5463354e4467314e4463344e513d3d','63326c325957746863326b3d','55326c325957746863326b3d','','566d6c796457526f645735685a324679','5647467461577767546d466b64513d3d','NULL','NULL','566d6c756233526f50474a79506e4e70646d467259584e7050474a79506c4e70646d467259584e7050474a79506c5a70636e566b61485675595764686369684561584e304c696b38596e492b5647467461577767546d466b64547869636a3467545739696157786c49446f674e5463354e4467314e4463344e513d3d','566d6c756233526f494367314e7a6b304f4455304e7a67314b53417449464e70646d467259584e70','3000','Debit','1');

INSERT INTO phoenix_agent (id, created_date_time, creator, creator_name, bill_company_id, agent_id, agent_name, lower_case_name, mobile_number, address, city, others_city, district, state, pincode, identification, agent_details, name_mobile_city, opening_balance, opening_balance_type, deleted) VALUES ('3','2025-04-14 12:57:38','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55784d6a55334d7a68664d444d3d','566d6c756233526f','646d6c756233526f','4e5463354e4467314e4463304e513d3d','63326c325957746863326b3d','55326c325957746863326b3d','','566d6c796457526f645735685a324679','5647467461577767546d466b64513d3d','NULL','NULL','566d6c756233526f50474a79506e4e70646d467259584e7050474a79506c4e70646d467259584e7050474a79506c5a70636e566b61485675595764686369684561584e304c696b38596e492b5647467461577767546d466b64547869636a3467545739696157786c49446f674e5463354e4467314e4463304e513d3d','566d6c756233526f494367314e7a6b304f4455304e7a51314b53417449464e70646d467259584e70','100','Debit','1');

INSERT INTO phoenix_agent (id, created_date_time, creator, creator_name, bill_company_id, agent_id, agent_name, lower_case_name, mobile_number, address, city, others_city, district, state, pincode, identification, agent_details, name_mobile_city, opening_balance, opening_balance_type, deleted) VALUES ('4','2025-04-14 13:16:43','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55774d5445324e444e664d44513d','6257466f5a584e6f','6257466f5a584e6f','4f4463304e6a4d324e44597a4f413d3d','63326c325957746863326b3d','646d6c7a61486468626d463061474674','','51584a70655746736458493d','5647467461577767546d466b64513d3d','NULL','NULL','6257466f5a584e6f50474a79506e4e70646d467259584e7050474a79506e5a7063326833595735686447686862547869636a3542636d6c35595778316369684561584e304c696b38596e492b5647467461577767546d466b64547869636a3467545739696157786c49446f674f4463304e6a4d324e44597a4f413d3d','6257466f5a584e6f494367344e7a51324d7a59304e6a4d344b53417449485a7063326833595735686447686862513d3d','','','0');


CREATE TABLE `phoenix_bank` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `bank_id` mediumtext NOT NULL,
  `account_name` mediumtext NOT NULL,
  `account_number` mediumtext NOT NULL,
  `bank_name` mediumtext NOT NULL,
  `ifsc_code` mediumtext NOT NULL,
  `account_type` mediumtext NOT NULL,
  `bank_name_account_number` mediumtext NOT NULL,
  `branch` mediumtext NOT NULL,
  `payment_mode_id` mediumtext NOT NULL,
  `estimate_balance_date` mediumtext NOT NULL,
  `invoice_balance_date` mediumtext NOT NULL,
  `estimate_opening_balance` mediumtext NOT NULL,
  `invoice_opening_balance` mediumtext NOT NULL,
  `opening_balance` mediumtext NOT NULL,
  `opening_balance_type` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_bank (id, created_date_time, creator, creator_name, bill_company_id, bank_id, account_name, account_number, bank_name, ifsc_code, account_type, bank_name_account_number, branch, payment_mode_id, estimate_balance_date, invoice_balance_date, estimate_opening_balance, invoice_opening_balance, opening_balance, opening_balance_type, deleted) VALUES ('1','2025-04-14 11:04:23','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d5441304d6a4e664d44453d','5247563261513d3d','4d7a51314d7a51314d7a5131','55304a4a','NULL','NULL','55304a4a4943677a4e44557a4e44557a4e445570','55315a4c55773d3d','4d5451774e4449774d6a55784d4451354d6a56664d44493d,4d5451774e4449774d6a55784d4451344d6a68664d44453d','','','','','','','0');

INSERT INTO phoenix_bank (id, created_date_time, creator, creator_name, bill_company_id, bank_id, account_name, account_number, bank_name, ifsc_code, account_type, bank_name_account_number, branch, payment_mode_id, estimate_balance_date, invoice_balance_date, estimate_opening_balance, invoice_opening_balance, opening_balance, opening_balance_type, deleted) VALUES ('2','2025-04-14 12:17:47','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d6a45334e4464664d44493d','5a484e6b6332466b','4d7a4d794d6a4d7a','633252685a413d3d','4d7a4d304d6a4d7a4d773d3d','NULL','633252685a43416f4d7a4d794d6a4d7a4b513d3d','5a47467a5a47453d','4d5451774e4449774d6a55784d4455784d6a68664d444d3d','','','','','','','1');


CREATE TABLE `phoenix_brand` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `brand_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_brand (id, created_date_time, creator, creator_name, bill_company_id, brand_id, brand_name, lower_case_name, deleted) VALUES ('1','2025-04-14 11:20:53','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d5449774e544e664d44453d','516e4a68626d516751673d3d','596e4a68626d516759673d3d','0');

INSERT INTO phoenix_brand (id, created_date_time, creator, creator_name, bill_company_id, brand_id, brand_name, lower_case_name, deleted) VALUES ('2','2025-04-14 11:20:53','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d5449774e544e664d44493d','516e4a68626d516751773d3d','596e4a68626d516759773d3d','1');

INSERT INTO phoenix_brand (id, created_date_time, creator, creator_name, bill_company_id, brand_id, brand_name, lower_case_name, deleted) VALUES ('3','2025-04-14 12:17:07','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','516e4a68626d516751513d3d','596e4a68626d516759513d3d','0');


CREATE TABLE `phoenix_charges` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `charges_id` mediumtext NOT NULL,
  `charges_name` mediumtext NOT NULL,
  `action` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_charges (id, created_date_time, creator, creator_name, bill_company_id, charges_id, charges_name, action, lower_case_name, deleted) VALUES ('1','2025-04-14 15:37:33','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55774d7a4d334d7a4e664d44453d','5132397462576c7a63326c7662673d3d','6347783163773d3d','5932397462576c7a63326c7662673d3d','0');

INSERT INTO phoenix_charges (id, created_date_time, creator, creator_name, bill_company_id, charges_id, charges_name, action, lower_case_name, deleted) VALUES ('2','2025-04-14 15:37:33','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55774d7a4d334d7a4e664d44493d','52476c7a59773d3d','62576c7564584d3d','5a476c7a59773d3d','1');

INSERT INTO phoenix_charges (id, created_date_time, creator, creator_name, bill_company_id, charges_id, charges_name, action, lower_case_name, deleted) VALUES ('3','2025-04-14 15:37:33','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55774d7a4d334d7a4e664d444d3d','52586830636d456759326868636d566e63773d3d','6347783163773d3d','5a586830636d456759326868636d566e63773d3d','0');

INSERT INTO phoenix_charges (id, created_date_time, creator, creator_name, bill_company_id, charges_id, charges_name, action, lower_case_name, deleted) VALUES ('4','2025-04-14 15:38:26','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55774d7a4d344d6a5a664d44513d','52476c7a59323931626e513d','62576c7564584d3d','5a476c7a59323931626e513d','0');


CREATE TABLE `phoenix_company` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `company_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `state` mediumtext NOT NULL,
  `district` mediumtext NOT NULL,
  `city` mediumtext NOT NULL,
  `others_city` mediumtext NOT NULL,
  `pincode` mediumtext NOT NULL,
  `gst_number` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `hsn_code` mediumtext NOT NULL,
  `tax_slab` mediumtext NOT NULL,
  `logo` mediumtext NOT NULL,
  `company_details` mediumtext NOT NULL,
  `primary_company` int(100) NOT NULL,
  `device_type` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_company (id, created_date_time, creator, creator_name, company_id, name, lower_case_name, address, state, district, city, others_city, pincode, gst_number, mobile_number, hsn_code, tax_slab, logo, company_details, primary_company, device_type, deleted) VALUES ('1','2025-04-14 10:42:43','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','554768765a57357065434244636d466a6132567963773d3d','634768765a5735706543426a636d466a6132567963773d3d','63326c325957746863326b3d','5647467461577767546d466b64513d3d','566d6c796457526f645735685a324679','55326c325957746863326b3d','Sivakasi','4e6a49324d546735','4d6a4a4251554642515441774d4442424d566f31','4e6a4d344d6a4d7a4d5451774f413d3d','','','logo_14_04_2025_06_36_16.jpeg','554768765a57357065434244636d466a61325679637a7869636a357a61585a686132467a61547869636a355461585a686132467a61534174494459794e6a45344f547869636a355761584a315a476831626d466e595849674b455270633351754b547869636a3555595731706243424f5957523150474a79506b4e76626e5268593351674f6a597a4f44497a4d7a45304d446738596e492b52314e5549456c4f49446f794d6b4642515546424d4441774d454578576a553d','1','','0');


CREATE TABLE `phoenix_currnet_stock` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product_id` mediumtext NOT NULL,
  `case_contains` mediumtext NOT NULL,
  `godown_id` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `current_stock` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `phoenix_delivery_challan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `delivery_challan_id` mediumtext NOT NULL,
  `delivery_challan_number` mediumtext NOT NULL DEFAULT '',
  `delivery_challan_date` mediumtext NOT NULL,
  `quotation_id` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `subunit_contains` mediumtext NOT NULL,
  `unit_type` mediumtext NOT NULL,
  `unit_id` mediumtext NOT NULL,
  `subunit_id` mediumtext NOT NULL,
  `product_quantity` mediumtext NOT NULL,
  `total_quantity` mediumtext NOT NULL,
  `grand_quantity` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_delivery_challan (id, created_date_time, creator, creator_name, bill_company_id, delivery_challan_id, delivery_challan_number, delivery_challan_date, quotation_id, product_id, brand_id, subunit_contains, unit_type, unit_id, subunit_id, product_quantity, total_quantity, grand_quantity, deleted) VALUES ('1','2025-04-17 19:08:39','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5463774e4449774d6a55774e7a41344d7a6c664d44453d','001/25-26','2525-04-17','','4d5459774e4449774d6a55784d4455314d6a42664d444d3d,4d5459774e4449774d6a55784d4455314d6a42664d444d3d','4d5451774e4449774d6a55784d5449774e544e664d44453d,4d5451774e4449774d6a55784d5449774e544e664d44453d','10,10','1,2','NULL','NULL','1,15','10,15','25','0');


CREATE TABLE `phoenix_godown` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `godown_id` mediumtext NOT NULL,
  `godown_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_godown (id, created_date_time, creator, creator_name, bill_company_id, godown_id, godown_name, lower_case_name, deleted) VALUES ('1','2025-04-14 11:32:42','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d544d794e444a664d44453d','5232396b6233647549454d3d','5a32396b6233647549474d3d','1');

INSERT INTO phoenix_godown (id, created_date_time, creator, creator_name, bill_company_id, godown_id, godown_name, lower_case_name, deleted) VALUES ('2','2025-04-14 11:32:42','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d544d794e444a664d44493d','5232396b623364754945493d','5a32396b623364754947493d','0');

INSERT INTO phoenix_godown (id, created_date_time, creator, creator_name, bill_company_id, godown_id, godown_name, lower_case_name, deleted) VALUES ('3','2025-04-14 11:32:42','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d544d794e444e664d444d3d','5232396b6233647551513d3d','5a32396b6233647559513d3d','0');


CREATE TABLE `phoenix_login` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `loginer_name` mediumtext NOT NULL,
  `login_date_time` datetime NOT NULL,
  `logout_date_time` datetime NOT NULL,
  `ip_address` mediumtext NOT NULL,
  `browser` mediumtext NOT NULL,
  `os_detail` mediumtext NOT NULL,
  `type` mediumtext NOT NULL,
  `user_id` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('1','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-15 10:05:03','2025-04-15 10:05:03','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');

INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('2','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-15 14:39:13','2025-04-15 14:39:13','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');

INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('3','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-15 15:08:15','2025-04-15 15:08:15','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');

INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('4','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-15 17:42:57','2025-04-15 17:42:57','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');

INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('5','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-16 09:25:18','2025-04-16 09:25:18','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');

INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('6','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-16 14:37:05','2025-04-16 14:37:05','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');

INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('7','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-17 09:23:39','2025-04-17 09:23:39','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');

INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('8','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-17 14:39:44','2025-04-17 14:39:44','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');

INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('9','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-17 16:19:14','2025-04-17 18:12:31','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');

INSERT INTO phoenix_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('10','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','2025-04-17 18:12:37','2025-04-17 18:12:37','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','Windows NT DESKTOP-IREU32P 10.0 build 22000 (Windows 11) AMD64','Super Admin','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','0');


CREATE TABLE `phoenix_party` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `party_type` mediumtext NOT NULL,
  `party_id` mediumtext NOT NULL,
  `party_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `city` mediumtext NOT NULL,
  `district` mediumtext NOT NULL,
  `state` mediumtext NOT NULL,
  `pincode` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `others_city` mediumtext NOT NULL,
  `party_details` mediumtext NOT NULL,
  `opening_balance` mediumtext NOT NULL,
  `opening_balance_type` mediumtext NOT NULL,
  `name_mobile_city` mediumtext NOT NULL,
  `identification` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `agent_id` mediumtext NOT NULL,
  `agent_name` mediumtext NOT NULL,
  `drafted` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_party (id, created_date_time, creator, creator_name, bill_company_id, party_type, party_id, party_name, lower_case_name, address, city, district, state, pincode, mobile_number, others_city, party_details, opening_balance, opening_balance_type, name_mobile_city, identification, email, agent_id, agent_name, drafted, deleted) VALUES ('1','2025-04-14 11:51:19','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','3','4d5451774e4449774d6a55784d5455784d546c664d44413d','546d6c79595746726457786862673d3d','626d6c79595746726457786862673d3d','63326c325957746863326b3d','55326c325957746863326b3d','566d6c796457526f645735685a324679','5647467461577767546d466b64513d3d','4e6a49324d546735','4f4463304f4463324e6a51334e513d3d','','546d6c795957467264577868626a7869636a357a61585a686132467a61547869636a355461585a686132467a61547869636a355761584a315a476831626d466e5958496f52476c7a6443347050474a79506c526862576c73494535685a485538596e492b49453176596d6c735a534136494467334e4467334e6a59304e7a553d','2000','Credit','546d6c7959574672645778686269416f4f4463304f4463324e6a51334e536b674c53425461585a686132467a61513d3d','NULL','NULL','4d5451774e4449774d6a55784d5451794d7a4e664d44453d','51584a3162413d3d','','0');

INSERT INTO phoenix_party (id, created_date_time, creator, creator_name, bill_company_id, party_type, party_id, party_name, lower_case_name, address, city, district, state, pincode, mobile_number, others_city, party_details, opening_balance, opening_balance_type, name_mobile_city, identification, email, agent_id, agent_name, drafted, deleted) VALUES ('2','2025-04-14 13:03:15','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','3','4d5451774e4449774d6a55774d54417a4d5456664d44493d','51584a716457343d','59584a716457343d','NULL','55326c325957746863326b3d','566d6c796457526f645735685a324679','5647467461577767546d466b64513d3d','NULL','4f5467314f5467304e5463344e413d3d','','51584a7164573438596e492b55326c325957746863326b38596e492b566d6c796457526f645735685a3246794b455270633351754b547869636a3555595731706243424f5957523150474a795069424e62324a70624755674f6941354f4455354f4451314e7a6730','','','51584a71645734674b446b344e546b344e4455334f4451704943306755326c325957746863326b3d','NULL','NULL','NULL','NULL','','0');


CREATE TABLE `phoenix_payment` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `bill_id` mediumtext NOT NULL,
  `bill_number` mediumtext NOT NULL,
  `bill_date` date NOT NULL,
  `bill_type` mediumtext NOT NULL,
  `party_id` mediumtext NOT NULL,
  `party_name` mediumtext NOT NULL,
  `party_type` mediumtext NOT NULL,
  `payment_mode_id` mediumtext NOT NULL,
  `payment_mode_name` mediumtext NOT NULL,
  `bank_id` mediumtext NOT NULL,
  `bank_name` mediumtext NOT NULL,
  `imploded_amount` mediumtext NOT NULL,
  `opening_balance` mediumtext NOT NULL,
  `opening_balance_type` mediumtext NOT NULL,
  `credit` mediumtext NOT NULL,
  `debit` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_payment (id, created_date_time, creator, creator_name, bill_company_id, bill_id, bill_number, bill_date, bill_type, party_id, party_name, party_type, payment_mode_id, payment_mode_name, bank_id, bank_name, imploded_amount, opening_balance, opening_balance_type, credit, debit, deleted) VALUES ('1','2025-04-14 12:57:38','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55784d6a55334d7a68664d444d3d','','0000-00-00','Agent Opening Stock','4d5451774e4449774d6a55784d6a55334d7a68664d444d3d','566d6c756233526f494367314e7a6b304f4455304e7a51314b53417449464e70646d467259584e70','','','','','','','100','Debit','0','100','1');

INSERT INTO phoenix_payment (id, created_date_time, creator, creator_name, bill_company_id, bill_id, bill_number, bill_date, bill_type, party_id, party_name, party_type, payment_mode_id, payment_mode_name, bank_id, bank_name, imploded_amount, opening_balance, opening_balance_type, credit, debit, deleted) VALUES ('2','2025-04-14 13:03:15','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55774d54417a4d5456664d44493d','','0000-00-00','Party Opening Stock','4d5451774e4449774d6a55774d54417a4d5456664d44493d','51584a71645734674b446b344e546b344e4455334f4451704943306755326c325957746863326b3d','3','','','','','','','','0','0','0');

INSERT INTO phoenix_payment (id, created_date_time, creator, creator_name, bill_company_id, bill_id, bill_number, bill_date, bill_type, party_id, party_name, party_type, payment_mode_id, payment_mode_name, bank_id, bank_name, imploded_amount, opening_balance, opening_balance_type, credit, debit, deleted) VALUES ('3','2025-04-14 13:16:43','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5451774e4449774d6a55774d5445324e444e664d44513d','','0000-00-00','Agent Opening Stock','4d5451774e4449774d6a55774d5445324e444e664d44513d','6257466f5a584e6f494367344e7a51324d7a59304e6a4d344b53417449485a7063326833595735686447686862513d3d','','','','','','','0','NULL','0','0','0');


CREATE TABLE `phoenix_payment_mode` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `payment_mode_id` mediumtext NOT NULL,
  `payment_mode_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_payment_mode (id, created_date_time, creator, creator_name, bill_company_id, payment_mode_id, payment_mode_name, lower_case_name, deleted) VALUES ('1','2025-04-14 10:48:27','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d4451344d6a68664d44453d','516d467561773d3d','596d467561773d3d','0');

INSERT INTO phoenix_payment_mode (id, created_date_time, creator, creator_name, bill_company_id, payment_mode_id, payment_mode_name, lower_case_name, deleted) VALUES ('2','2025-04-14 10:49:25','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d4451354d6a56664d44493d','5a47467a5a413d3d','5a47467a5a413d3d','1');

INSERT INTO phoenix_payment_mode (id, created_date_time, creator, creator_name, bill_company_id, payment_mode_id, payment_mode_name, lower_case_name, deleted) VALUES ('3','2025-04-14 10:51:28','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d4455784d6a68664d444d3d','5132467a61413d3d','5932467a61413d3d','0');

INSERT INTO phoenix_payment_mode (id, created_date_time, creator, creator_name, bill_company_id, payment_mode_id, payment_mode_name, lower_case_name, deleted) VALUES ('4','2025-04-14 10:51:35','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d4455784d7a56664d44513d','5233426865513d3d','5a33426865513d3d','0');


CREATE TABLE `phoenix_product` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `product_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `unit_id` mediumtext NOT NULL,
  `unit_name` mediumtext NOT NULL,
  `subunit_need` mediumtext NOT NULL,
  `subunit_id` mediumtext NOT NULL,
  `subunit_name` mediumtext NOT NULL,
  `subunit_contains` mediumtext NOT NULL,
  `sales_rate` mediumtext NOT NULL,
  `per` mediumtext NOT NULL,
  `per_type` mediumtext NOT NULL,
  `opening_stock` mediumtext NOT NULL,
  `unit_type` mediumtext NOT NULL,
  `unit_type_name` mediumtext NOT NULL,
  `stock_date` mediumtext NOT NULL,
  `godown_id` mediumtext NOT NULL,
  `godown_name` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `brand_name` mediumtext NOT NULL,
  `negative_stock` mediumtext NOT NULL,
  `rate_per_case` mediumtext DEFAULT NULL,
  `rate_per_piece` mediumtext DEFAULT NULL,
  `selected_per_unit` mediumtext DEFAULT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_product (id, created_date_time, creator, creator_name, bill_company_id, product_id, product_name, lower_case_name, unit_id, unit_name, subunit_need, subunit_id, subunit_name, subunit_contains, sales_rate, per, per_type, opening_stock, unit_type, unit_type_name, stock_date, godown_id, godown_name, brand_id, brand_name, negative_stock, rate_per_case, rate_per_piece, selected_per_unit, deleted) VALUES ('1','2025-04-15 16:26:06','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5455774e4449774d6a55774e4449324d445a664d44453d','593246725a513d3d','593246725a513d3d','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','596d39306447786c','0','NULL','NULL','10','15','1','1','15','1','Unit','2025-04-15','4d5451774e4449774d6a55784d544d794e444a664d44493d','5232396b623364754945493d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','516e4a68626d516751513d3d','0','NULL','NULL','','0');

INSERT INTO phoenix_product (id, created_date_time, creator, creator_name, bill_company_id, product_id, product_name, lower_case_name, unit_id, unit_name, subunit_need, subunit_id, subunit_name, subunit_contains, sales_rate, per, per_type, opening_stock, unit_type, unit_type_name, stock_date, godown_id, godown_name, brand_id, brand_name, negative_stock, rate_per_case, rate_per_piece, selected_per_unit, deleted) VALUES ('2','2025-04-15 18:45:12','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5455774e4449774d6a55774e6a51314d544a664d44493d','62576c7361773d3d','62576c7361773d3d','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','596d39306447786c','1','4d5451774e4449774d6a55784d5445794e5446664d44453d','55474e7a','15,15','150','2','2','15,15','1,1','Unit,Unit','2025-04-02,2025-04-15','4d5451774e4449774d6a55784d544d794e444a664d44493d,4d5451774e4449774d6a55784d544d794e444e664d444d3d','5232396b623364754945493d,5232396b6233647551513d3d','4d5451774e4449774d6a55784d5449774e544e664d44453d,4d5451774e4449774d6a55784d6a45334d4464664d444d3d','516e4a68626d516751673d3d,516e4a68626d516751513d3d','0','75','NaN','1','0');

INSERT INTO phoenix_product (id, created_date_time, creator, creator_name, bill_company_id, product_id, product_name, lower_case_name, unit_id, unit_name, subunit_need, subunit_id, subunit_name, subunit_contains, sales_rate, per, per_type, opening_stock, unit_type, unit_type_name, stock_date, godown_id, godown_name, brand_id, brand_name, negative_stock, rate_per_case, rate_per_piece, selected_per_unit, deleted) VALUES ('3','2025-04-16 10:55:19','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5459774e4449774d6a55784d4455314d6a42664d444d3d','593246725a584d3d','593246725a584d3d','4d5455774e4449774d6a55774d7a51314d6a68664d44593d','6347396a61325630','1','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934','NULL','150','1','2','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','0','NaN','150','','0');

INSERT INTO phoenix_product (id, created_date_time, creator, creator_name, bill_company_id, product_id, product_name, lower_case_name, unit_id, unit_name, subunit_need, subunit_id, subunit_name, subunit_contains, sales_rate, per, per_type, opening_stock, unit_type, unit_type_name, stock_date, godown_id, godown_name, brand_id, brand_name, negative_stock, rate_per_case, rate_per_piece, selected_per_unit, deleted) VALUES ('4','2025-04-16 11:19:41','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5459774e4449774d6a55784d5445354e4446664d44513d','596e567a64585a68626d4674','596e567a64585a68626d4674','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934','1','4d5451774e4449774d6a55784d5445794e5446664d44453d','55474e7a','10,10','200','5','2','200,150','1,1','Unit,Unit','2025-04-07,2025-04-16','4d5451774e4449774d6a55784d544d794e444a664d44493d,4d5451774e4449774d6a55784d544d794e444e664d444d3d','5232396b623364754945493d,5232396b6233647551513d3d','4d5451774e4449774d6a55784d5449774e544e664d44453d,4d5451774e4449774d6a55784d6a45334d4464664d444d3d','516e4a68626d516751673d3d,516e4a68626d516751513d3d','0','NaN','40','','0');


CREATE TABLE `phoenix_quotation` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `quotation_id` mediumtext NOT NULL,
  `quotation_number` mediumtext NOT NULL,
  `quotation_date` mediumtext NOT NULL,
  `party_id` mediumtext NOT NULL,
  `party_name_mobile_city` mediumtext NOT NULL,
  `party_details` mediumtext NOT NULL,
  `agent_id` mediumtext NOT NULL,
  `agent_name_mobile_city` mediumtext NOT NULL,
  `agent_details` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `product_name` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `brand_name` mediumtext NOT NULL,
  `subunit_contains` mediumtext NOT NULL,
  `unit_id` mediumtext NOT NULL,
  `unit_name` mediumtext NOT NULL,
  `subunit_id` mediumtext NOT NULL,
  `subunit_name` mediumtext NOT NULL,
  `product_quantity` mediumtext NOT NULL,
  `unit_type` mediumtext NOT NULL,
  `product_rate` mediumtext NOT NULL,
  `per` mediumtext NOT NULL,
  `per_type` mediumtext NOT NULL,
  `product_amount` mediumtext NOT NULL,
  `rate_per_unit` mediumtext NOT NULL,
  `sub_total` mediumtext NOT NULL,
  `charges_id` mediumtext NOT NULL,
  `charges_type` mediumtext NOT NULL,
  `charges_value` mediumtext NOT NULL,
  `charges_total` mediumtext NOT NULL,
  `total_amount` mediumtext NOT NULL,
  `round_off` mediumtext NOT NULL,
  `grand_total` mediumtext NOT NULL,
  `total_unit_qty` mediumtext NOT NULL,
  `total_subunit_qty` mediumtext NOT NULL,
  `total_quantity` mediumtext NOT NULL,
  `total_qty` mediumtext NOT NULL,
  `grand_qty` mediumtext NOT NULL,
  `drafted` int(100) NOT NULL DEFAULT 0,
  `cancelled` int(100) NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_quotation (id, created_date_time, creator, creator_name, bill_company_id, quotation_id, quotation_number, quotation_date, party_id, party_name_mobile_city, party_details, agent_id, agent_name_mobile_city, agent_details, product_id, product_name, brand_id, brand_name, subunit_contains, unit_id, unit_name, subunit_id, subunit_name, product_quantity, unit_type, product_rate, per, per_type, product_amount, rate_per_unit, sub_total, charges_id, charges_type, charges_value, charges_total, total_amount, round_off, grand_total, total_unit_qty, total_subunit_qty, total_quantity, total_qty, grand_qty, drafted, cancelled, deleted) VALUES ('1','2025-04-17 12:21:34','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5463774e4449774d6a55784d6a49784d7a52664d44453d','001/25-26','2025-04-09','4d5451774e4449774d6a55784d5455784d546c664d44413d','546d6c7959574672645778686269416f4f4463304f4463324e6a51334e536b674c53425461585a686132467a61513d3d','546d6c795957467264577868626a7869636a357a61585a686132467a61547869636a355461585a686132467a61547869636a355761584a315a476831626d466e5958496f52476c7a6443347050474a79506c526862576c73494535685a485538596e492b49453176596d6c735a534136494467334e4467334e6a59304e7a553d','','','','4d5459774e4449774d6a55784d5445354e4446664d44513d','596e567a64585a68626d4674','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','516e4a68626d516751513d3d','10','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934','4d5451774e4449774d6a55784d5445794e5446664d44453d','55474e7a','15','1','200','5','2','6000.00','NULL','6000','4d5451774e4449774d6a55774d7a4d334d7a4e664d444d3d','plus','15%','900.00','6900.00','0','6900.00','15','NULL','15 Case','','','0','0','1');

INSERT INTO phoenix_quotation (id, created_date_time, creator, creator_name, bill_company_id, quotation_id, quotation_number, quotation_date, party_id, party_name_mobile_city, party_details, agent_id, agent_name_mobile_city, agent_details, product_id, product_name, brand_id, brand_name, subunit_contains, unit_id, unit_name, subunit_id, subunit_name, product_quantity, unit_type, product_rate, per, per_type, product_amount, rate_per_unit, sub_total, charges_id, charges_type, charges_value, charges_total, total_amount, round_off, grand_total, total_unit_qty, total_subunit_qty, total_quantity, total_qty, grand_qty, drafted, cancelled, deleted) VALUES ('2','2025-04-17 12:41:16','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5463774e4449774d6a55784d6a51784d545a664d44493d','002/25-26','2025-04-16','4d5451774e4449774d6a55784d5455784d546c664d44413d','546d6c7959574672645778686269416f4f4463304f4463324e6a51334e536b674c53425461585a686132467a61513d3d','546d6c795957467264577868626a7869636a357a61585a686132467a61547869636a355461585a686132467a61547869636a355761584a315a476831626d466e5958496f52476c7a6443347050474a79506c526862576c73494535685a485538596e492b49453176596d6c735a534136494467334e4467334e6a59304e7a553d','','','','4d5455774e4449774d6a55774e6a51314d544a664d44493d','62576c7361773d3d','4d5451774e4449774d6a55784d5449774e544e664d44453d','516e4a68626d516751673d3d','10','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','596d39306447786c','4d5451774e4449774d6a55784d5445794e5446664d44453d','55474e7a','15','1','250','2','2','18750.00','NULL','18750','4d5451774e4449774d6a55774d7a4d334d7a4e664d444d3d','plus','15%','2812.50','21562.50','0.50','21563','15','NULL','15 Case','','','0','0','1');

INSERT INTO phoenix_quotation (id, created_date_time, creator, creator_name, bill_company_id, quotation_id, quotation_number, quotation_date, party_id, party_name_mobile_city, party_details, agent_id, agent_name_mobile_city, agent_details, product_id, product_name, brand_id, brand_name, subunit_contains, unit_id, unit_name, subunit_id, subunit_name, product_quantity, unit_type, product_rate, per, per_type, product_amount, rate_per_unit, sub_total, charges_id, charges_type, charges_value, charges_total, total_amount, round_off, grand_total, total_unit_qty, total_subunit_qty, total_quantity, total_qty, grand_qty, drafted, cancelled, deleted) VALUES ('3','2025-04-17 15:23:24','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5463774e4449774d6a55774d7a497a4d6a52664d444d3d','003/25-26','2025-04-16','4d5451774e4449774d6a55784d5455784d546c664d44413d','546d6c7959574672645778686269416f4f4463304f4463324e6a51334e536b674c53425461585a686132467a61513d3d','546d6c795957467264577868626a7869636a357a61585a686132467a61547869636a355461585a686132467a61547869636a355761584a315a476831626d466e5958496f52476c7a6443347050474a79506c526862576c73494535685a485538596e492b49453176596d6c735a534136494467334e4467334e6a59304e7a553d','4d5451774e4449774d6a55774d5445324e444e664d44513d','6257466f5a584e6f494367344e7a51324d7a59304e6a4d344b53417449485a7063326833595735686447686862513d3d','6257466f5a584e6f50474a79506e4e70646d467259584e7050474a79506e5a7063326833595735686447686862547869636a3542636d6c35595778316369684561584e304c696b38596e492b5647467461577767546d466b64547869636a3467545739696157786c49446f674f4463304e6a4d324e44597a4f413d3d','4d5459774e4449774d6a55784d4455314d6a42664d444d3d,4d5459774e4449774d6a55784d4455314d6a42664d444d3d','593246725a584d3d,593246725a584d3d','4d5451774e4449774d6a55784d5449774e544e664d44453d,4d5451774e4449774d6a55784d5449774e544e664d44453d','516e4a68626d516751673d3d,516e4a68626d516751673d3d','10,10','4d5455774e4449774d6a55774d7a51314d6a68664d44593d,4d5455774e4449774d6a55774d7a51314d6a68664d44593d','6347396a61325630,6347396a61325630','4d5451774e4449774d6a55784d6a45334d6a52664d44513d,4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934,516d3934','15,15','2,1','150,150','1,1','2,2','2250.00,22500.00','NULL','24750','4d5451774e4449774d6a55774d7a4d334d7a4e664d444d3d','plus','15%','3712.50','28462.50','0.50','28463','30','NULL','30 Case','15,150','165','0','0','0');


CREATE TABLE `phoenix_quotation_product` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `quotation_number` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `product_name` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `brand_name` mediumtext NOT NULL,
  `subunit_contains` mediumtext NOT NULL,
  `unit_id` mediumtext NOT NULL,
  `unit_name` mediumtext NOT NULL,
  `subunit_id` mediumtext NOT NULL,
  `subunit_name` mediumtext NOT NULL,
  `product_quantity` mediumtext NOT NULL,
  `unit_type` mediumtext NOT NULL,
  `product_rate` mediumtext NOT NULL,
  `per` mediumtext NOT NULL,
  `per_type` mediumtext NOT NULL,
  `product_amount` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_quotation_product (id, created_date_time, creator, creator_name, bill_company_id, quotation_number, product_id, product_name, brand_id, brand_name, subunit_contains, unit_id, unit_name, subunit_id, subunit_name, product_quantity, unit_type, product_rate, per, per_type, product_amount, deleted) VALUES ('1','2025-04-17 12:21:34','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','001/25-26','4d5459774e4449774d6a55784d4455314d6a42664d444d3d','593246725a584d3d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','516e4a68626d516751513d3d','10','4d5455774e4449774d6a55774d7a51314d6a68664d44593d','6347396a61325630','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934','5','1','150','1','2','7500.00','1');

INSERT INTO phoenix_quotation_product (id, created_date_time, creator, creator_name, bill_company_id, quotation_number, product_id, product_name, brand_id, brand_name, subunit_contains, unit_id, unit_name, subunit_id, subunit_name, product_quantity, unit_type, product_rate, per, per_type, product_amount, deleted) VALUES ('2','2025-04-17 14:51:21','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','001/25-26','4d5459774e4449774d6a55784d5445354e4446664d44513d','596e567a64585a68626d4674','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','516e4a68626d516751513d3d','10','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934','4d5451774e4449774d6a55784d5445794e5446664d44453d','55474e7a','15','1','200','5','2','6000.00','1');

INSERT INTO phoenix_quotation_product (id, created_date_time, creator, creator_name, bill_company_id, quotation_number, product_id, product_name, brand_id, brand_name, subunit_contains, unit_id, unit_name, subunit_id, subunit_name, product_quantity, unit_type, product_rate, per, per_type, product_amount, deleted) VALUES ('3','2025-04-17 13:33:31','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','002/25-26','4d5455774e4449774d6a55774e6a51314d544a664d44493d','62576c7361773d3d','4d5451774e4449774d6a55784d5449774e544e664d44453d','516e4a68626d516751673d3d','10','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','596d39306447786c','4d5451774e4449774d6a55784d5445794e5446664d44453d','55474e7a','15','1','250','2','2','18750.00','1');

INSERT INTO phoenix_quotation_product (id, created_date_time, creator, creator_name, bill_company_id, quotation_number, product_id, product_name, brand_id, brand_name, subunit_contains, unit_id, unit_name, subunit_id, subunit_name, product_quantity, unit_type, product_rate, per, per_type, product_amount, deleted) VALUES ('4','2025-04-17 13:32:02','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','002/25-26','4d5459774e4449774d6a55784d4455314d6a42664d444d3d','593246725a584d3d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','516e4a68626d516751513d3d','10','4d5455774e4449774d6a55774d7a51314d6a68664d44593d','6347396a61325630','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934','15','1','250','1','2','37500.00','1');

INSERT INTO phoenix_quotation_product (id, created_date_time, creator, creator_name, bill_company_id, quotation_number, product_id, product_name, brand_id, brand_name, subunit_contains, unit_id, unit_name, subunit_id, subunit_name, product_quantity, unit_type, product_rate, per, per_type, product_amount, deleted) VALUES ('5','2025-04-17 16:55:59','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','003/25-26','4d5459774e4449774d6a55784d4455314d6a42664d444d3d','593246725a584d3d','4d5451774e4449774d6a55784d5449774e544e664d44453d','516e4a68626d516751673d3d','10','4d5455774e4449774d6a55774d7a51314d6a68664d44593d','6347396a61325630','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934','15','2','150','1','2','2250.00','0');

INSERT INTO phoenix_quotation_product (id, created_date_time, creator, creator_name, bill_company_id, quotation_number, product_id, product_name, brand_id, brand_name, subunit_contains, unit_id, unit_name, subunit_id, subunit_name, product_quantity, unit_type, product_rate, per, per_type, product_amount, deleted) VALUES ('6','2025-04-17 16:55:59','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','003/25-26','4d5459774e4449774d6a55784d4455314d6a42664d444d3d','593246725a584d3d','4d5451774e4449774d6a55784d5449774e544e664d44453d','516e4a68626d516751673d3d','10','4d5455774e4449774d6a55774d7a51314d6a68664d44593d','6347396a61325630','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934','15','1','150','1','2','22500.00','0');


CREATE TABLE `phoenix_receipt` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `receipt_id` mediumtext NOT NULL,
  `receipt_number` mediumtext NOT NULL,
  `receipt_date` date NOT NULL,
  `party_id` mediumtext NOT NULL,
  `party_name` mediumtext NOT NULL,
  `amount` mediumtext NOT NULL,
  `narration` mediumtext NOT NULL,
  `payment_mode_id` mediumtext NOT NULL,
  `payment_mode_name` mediumtext NOT NULL,
  `bank_id` mediumtext NOT NULL,
  `bank_name` mediumtext NOT NULL,
  `total_amount` mediumtext NOT NULL,
  `party_type` mediumtext NOT NULL,
  `deleted` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `phoenix_role` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `role_id` mediumtext NOT NULL,
  `role_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `access_pages` mediumtext NOT NULL,
  `access_page_actions` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_role (id, created_date_time, creator, creator_name, role_id, role_name, lower_case_name, access_pages, access_page_actions, deleted) VALUES ('1','2025-04-14 10:58:21','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4455344d6a46664d44453d','553352685a6d593d','633352685a6d593d','5157646c626e513d,5547467964486b3d,5657357064413d3d,556d567762334a3063773d3d','566d6c6c64773d3d$$$5157526b$$$5257527064413d3d$$$524756735a58526c,566d6c6c64773d3d$$$5157526b$$$5257527064413d3d$$$524756735a58526c,566d6c6c64773d3d,566d6c6c64773d3d','0');


CREATE TABLE `phoenix_stock` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` mediumtext NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_unique_id` mediumtext NOT NULL,
  `stock_date` mediumtext NOT NULL,
  `stock_type` mediumtext NOT NULL,
  `party_id` mediumtext NOT NULL DEFAULT '',
  `godown_id` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `unit_id` mediumtext NOT NULL,
  `case_contains` mediumtext NOT NULL,
  `inward_unit` mediumtext NOT NULL,
  `inward_subunit` mediumtext NOT NULL,
  `outward_unit` mediumtext NOT NULL,
  `outward_subunit` mediumtext NOT NULL,
  `remarks` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_stock (id, created_date_time, creator, creator_name, bill_unique_id, stock_date, stock_type, party_id, godown_id, brand_id, product_id, unit_id, case_contains, inward_unit, inward_subunit, outward_unit, outward_subunit, remarks, deleted) VALUES ('1','2025-04-15 16:26:06','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5455774e4449774d6a55774e4449324d445a664d44453d','2025-04-15 16:26:06','5433426c626d6c755a7942546447396a61773d3d','','4d5451774e4449774d6a55784d544d794e444a664d44493d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','4d5455774e4449774d6a55774e4449324d445a664d44453d','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','NULL','15','NULL','0','NULL','5433426c626d6c755a7942546447396a61773d3d','0');

INSERT INTO phoenix_stock (id, created_date_time, creator, creator_name, bill_unique_id, stock_date, stock_type, party_id, godown_id, brand_id, product_id, unit_id, case_contains, inward_unit, inward_subunit, outward_unit, outward_subunit, remarks, deleted) VALUES ('2','2025-04-15 18:45:12','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5455774e4449774d6a55774e6a51314d544a664d44493d','2025-04-02 09:26:05','5433426c626d6c755a7942546447396a61773d3d','','4d5451774e4449774d6a55784d544d794e444a664d44493d','4d5451774e4449774d6a55784d5449774e544e664d44453d','4d5455774e4449774d6a55774e6a51314d544a664d44493d','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','15','15','225.00','0','0','5433426c626d6c755a7942546447396a61773d3d','0');

INSERT INTO phoenix_stock (id, created_date_time, creator, creator_name, bill_unique_id, stock_date, stock_type, party_id, godown_id, brand_id, product_id, unit_id, case_contains, inward_unit, inward_subunit, outward_unit, outward_subunit, remarks, deleted) VALUES ('3','2025-04-15 18:45:12','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5455774e4449774d6a55774e6a51314d544a664d44493d','2025-04-15 09:26:05','5433426c626d6c755a7942546447396a61773d3d','','4d5451774e4449774d6a55784d544d794e444e664d444d3d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','4d5455774e4449774d6a55774e6a51314d544a664d44493d','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','15','15','225.00','0','0','5433426c626d6c755a7942546447396a61773d3d','0');

INSERT INTO phoenix_stock (id, created_date_time, creator, creator_name, bill_unique_id, stock_date, stock_type, party_id, godown_id, brand_id, product_id, unit_id, case_contains, inward_unit, inward_subunit, outward_unit, outward_subunit, remarks, deleted) VALUES ('4','2025-04-16 11:19:41','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5459774e4449774d6a55784d5445354e4446664d44513d','2025-04-07 11:19:41','5433426c626d6c755a7942546447396a61773d3d','','4d5451774e4449774d6a55784d544d794e444a664d44493d','4d5451774e4449774d6a55784d5449774e544e664d44453d','4d5459774e4449774d6a55784d5445354e4446664d44513d','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','10','200','2000.00','0','0','5433426c626d6c755a7942546447396a61773d3d','0');

INSERT INTO phoenix_stock (id, created_date_time, creator, creator_name, bill_unique_id, stock_date, stock_type, party_id, godown_id, brand_id, product_id, unit_id, case_contains, inward_unit, inward_subunit, outward_unit, outward_subunit, remarks, deleted) VALUES ('5','2025-04-16 11:19:41','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5459774e4449774d6a55784d5445354e4446664d44513d','2025-04-16 11:19:41','5433426c626d6c755a7942546447396a61773d3d','','4d5451774e4449774d6a55784d544d794e444e664d444d3d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','4d5459774e4449774d6a55784d5445354e4446664d44513d','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','10','150','1500.00','0','0','5433426c626d6c755a7942546447396a61773d3d','0');


CREATE TABLE `phoenix_stock_by_godown` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` mediumtext NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `godown_id` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `unit_id` mediumtext NOT NULL,
  `subunit_id` mediumtext NOT NULL,
  `case_contains` mediumtext NOT NULL,
  `current_stock_unit` mediumtext NOT NULL,
  `current_stock_subunit` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_stock_by_godown (id, created_date_time, creator, creator_name, godown_id, brand_id, product_id, unit_id, subunit_id, case_contains, current_stock_unit, current_stock_subunit, deleted) VALUES ('1','2025-04-15 16:26:06','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5451774e4449774d6a55784d544d794e444a664d44493d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','4d5455774e4449774d6a55774e4449324d445a664d44453d','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','NULL','NULL','15.00','NULL','0');

INSERT INTO phoenix_stock_by_godown (id, created_date_time, creator, creator_name, godown_id, brand_id, product_id, unit_id, subunit_id, case_contains, current_stock_unit, current_stock_subunit, deleted) VALUES ('2','2025-04-15 18:45:12','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5451774e4449774d6a55784d544d794e444a664d44493d','4d5451774e4449774d6a55784d5449774e544e664d44453d','4d5455774e4449774d6a55774e6a51314d544a664d44493d','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','4d5451774e4449774d6a55784d5445794e5446664d44453d','15','15.00','225.00','0');

INSERT INTO phoenix_stock_by_godown (id, created_date_time, creator, creator_name, godown_id, brand_id, product_id, unit_id, subunit_id, case_contains, current_stock_unit, current_stock_subunit, deleted) VALUES ('3','2025-04-15 18:45:12','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5451774e4449774d6a55784d544d794e444e664d444d3d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','4d5455774e4449774d6a55774e6a51314d544a664d44493d','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','4d5451774e4449774d6a55784d5445794e5446664d44453d','15','15.00','225.00','0');

INSERT INTO phoenix_stock_by_godown (id, created_date_time, creator, creator_name, godown_id, brand_id, product_id, unit_id, subunit_id, case_contains, current_stock_unit, current_stock_subunit, deleted) VALUES ('4','2025-04-16 11:19:41','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5451774e4449774d6a55784d544d794e444a664d44493d','4d5451774e4449774d6a55784d5449774e544e664d44453d','4d5459774e4449774d6a55784d5445354e4446664d44513d','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','4d5451774e4449774d6a55784d5445794e5446664d44453d','10','200.00','2000.00','0');

INSERT INTO phoenix_stock_by_godown (id, created_date_time, creator, creator_name, godown_id, brand_id, product_id, unit_id, subunit_id, case_contains, current_stock_unit, current_stock_subunit, deleted) VALUES ('5','2025-04-16 11:19:41','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','4d5451774e4449774d6a55784d544d794e444e664d444d3d','4d5451774e4449774d6a55784d6a45334d4464664d444d3d','4d5459774e4449774d6a55784d5445354e4446664d44513d','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','4d5451774e4449774d6a55784d5445794e5446664d44453d','10','150.00','1500.00','0');


CREATE TABLE `phoenix_unit` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `unit_id` mediumtext NOT NULL,
  `unit_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_unit (id, created_date_time, creator, creator_name, bill_company_id, unit_id, unit_name, lower_case_name, deleted) VALUES ('1','2025-04-14 11:12:51','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d5445794e5446664d44453d','55474e7a','63474e7a','0');

INSERT INTO phoenix_unit (id, created_date_time, creator, creator_name, bill_company_id, unit_id, unit_name, lower_case_name, deleted) VALUES ('2','2025-04-14 11:13:13','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d54457a4d544e664d44493d','516d3934','596d3934','1');

INSERT INTO phoenix_unit (id, created_date_time, creator, creator_name, bill_company_id, unit_id, unit_name, lower_case_name, deleted) VALUES ('3','2025-04-14 12:17:24','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d6a45334d6a52664d444d3d','5132467a5a513d3d','5932467a5a513d3d','0');

INSERT INTO phoenix_unit (id, created_date_time, creator, creator_name, bill_company_id, unit_id, unit_name, lower_case_name, deleted) VALUES ('4','2025-04-14 12:17:24','4d5449774d7a49774d6a55784d4451344d6a42664d44413d','','4d5449774d7a49774d6a55784d4455324d5442664d44413d','4d5451774e4449774d6a55784d6a45334d6a52664d44513d','516d3934','596d3934','0');

INSERT INTO phoenix_unit (id, created_date_time, creator, creator_name, bill_company_id, unit_id, unit_name, lower_case_name, deleted) VALUES ('5','2025-04-15 15:45:28','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5455774e4449774d6a55774d7a51314d6a68664d44553d','596d39306447786c','596d39306447786c','0');

INSERT INTO phoenix_unit (id, created_date_time, creator, creator_name, bill_company_id, unit_id, unit_name, lower_case_name, deleted) VALUES ('6','2025-04-15 15:45:28','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d4451794e444e664d44453d','4d5455774e4449774d6a55774d7a51314d6a68664d44593d','6347396a61325630','6347396a61325630','0');


CREATE TABLE `phoenix_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `user_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `name_mobile` mediumtext NOT NULL,
  `role_id` mediumtext NOT NULL,
  `login_id` mediumtext NOT NULL,
  `lower_case_login_id` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `admin` int(100) NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO phoenix_user (id, created_date_time, creator, creator_name, user_id, name, mobile_number, name_mobile, role_id, login_id, lower_case_login_id, password, admin, deleted) VALUES ('1','2025-04-14 10:31:33','','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4e6a4d344d6a4d7a4d5451774f413d3d','55334a706332396d64486468636d5636494367324d7a67794d7a4d784e4441344b513d3d','NULL','55334a706332396d64486468636d5636','63334a706332396d64486468636d5636','51575274615734784d6a4e41','1','0');

INSERT INTO phoenix_user (id, created_date_time, creator, creator_name, user_id, name, mobile_number, name_mobile, role_id, login_id, lower_case_login_id, password, admin, deleted) VALUES ('2','2025-04-14 11:11:37','4d5451774e4449774d6a55784d444d784d7a4e664d44453d','55334a706332396d64486468636d5636','4d5451774e4449774d6a55784d5445784d7a64664d44493d','553352685a6d593d','4f4463344d7a59304e444d334d773d3d','553352685a6d59674b4467334f444d324e44517a4e7a4d70','4d5451774e4449774d6a55784d4455344d6a46664d44453d','553352685a6d593d','633352685a6d593d','553352685a6d59784d6a4e41','0','0');
