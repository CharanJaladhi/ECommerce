create database EcommerceWebsite;
use EcommerceWebsite;

create table USERS(
userName varchar(255) primary key,
eMail varchar(255) not null,
userPassword varchar(255) not null,
reEnterUserPassword varchar(255) not null,
otp INT
);

create table kids_t_shirts(
productId varchar(15) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table sarees(
productId varchar(15) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table sports_wear(
productId varchar(15) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table night_wear(
productId varchar(15) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table men_t_shirts(
productId varchar(15) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table kids_ethnic_wear(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table kids_clothing_sets(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  grooming(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  foot_wear(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  eye_wear(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  ethnic_wear_women(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  ethnic_wear_women(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  ethnic_wear_men(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  casuals_men(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  active_wear_men(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  gadgets(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  handbags(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table  beautify(
productId varchar(25) primary key,
productName varchar(255),
productDescription varchar(255),
productPrice int,
productImage varchar(255),
productButtonColor varchar(10)
);

create table cart(
userName varchar(50),
productId varchar(25),
productCount int,
productPrice int,
productName varchar(255),
productImage varchar(255)
);

create table orders(
userName varchar(50),
orderedUserName varchar(100),
orderedMail varchar(255),
orderedAddress varchar(255),
orderedState varchar(255),
orderedCity varchar(255),
orderedPincode int,
orderedProductPrice int,
orderedProductCount int,
orderedProductName varchar(255),
orderedProductImage varchar(255),
orderedProductId varchar(25),
orderedTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE category (
categoryId VARCHAR(25) PRIMARY KEY,
categoryName VARCHAR(255),
categoryProducts JSON,
categoryImage VARCHAR(255),
categoryFileLink VARCHAR(100)
);

CREATE TABLE searches (
    searchId INT AUTO_INCREMENT PRIMARY KEY,
    userName varchar(255) NOT NULL,
    searchQuery VARCHAR(255) NOT NULL,
    categoryId varchar(255),
    categoryName VARCHAR(255),
    categoryImage varchar(255),
    categoryFileLink VARCHAR(100),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Add any additional columns or constraints as needed
    FOREIGN KEY (userName) REFERENCES USERS(userName) -- Assuming a users table with a userName column
);

INSERT into kids_t_shirts values
('wear_1','Pantaloons Junior','Boys Mid-Rise Light Fade Casual Jeans',703,'images/kids_t_shirts/wear1.png','#3b3e6e'),
('wear_2','BonOrganik','Girls Green Printed Sibling Collection Cotton Pure Cotton T-shirt',319,'images/kids_t_shirts/wear2.png','#3b3e6e'),
('wear_3','Hellcat','Boys Pack Of 5 Typography Printed Cotton T-shirt',799,'images/kids_t_shirts/wear3.png','#0b0b0b'),
('wear_4','Manzon','Girls Pack of 3 Slim Fit Applique Jeans',854,'images/kids_t_shirts/wear4.png','#ff9f43'),
('wear_5','H&M','Girls Wide Trousers',1499,'images/kids_t_shirts/wear5.png','#2183a2'),
('wear_6','Pantaloons Junior','Boys Avengers Regular Fit Mid-Rise Light Fade Stretchable Jeans',799,'images/kids_t_shirts/wear6.png','#3b3e6e'),
('wear_7','HERE&NOW','Boys Blue Slim Fit Heavy Fade Stretchable Jeans',809,'images/kids_t_shirts/wear7.png','#0b0b0b'),
('wear_8','Max','Boys Typography Printed Pure Cotton T-Shirt',168,'images/kids_t_shirts/wear8.png','#ff9f43'),
('wear_9','HRX by Hrithik Roshan','HRX By Hrithik Roshan U-17 Girls Bright White Graphic Bio-Wash Lifestyle Pure Cotton T-shirt',799,'images/kids_t_shirts/wear9.png','#2183a2'),
('wear_10','Sassafaras Kids','Girls Carrot Relaxed Fit Highly Distressed Ripped Cotton Jeans',835,'images/kids_t_shirts/wear10.png','#0b0b0b'),
('wear_11','HRX by Hrithik Roshan','HRX By Hrithik Roshan Lifestyle U-17 Boys White Bio-Wash Brand Carrier Tshirts',599,'images/kids_t_shirts/wear11.png','#ff9f43'),
('wear_12','Hallcat','Boys Pack Of 5 Typography Printed Cotton T-shirt',779,'images/kids_t_shirts/wear12.png','#2183a2');

INSERT into sarees values
('saree_wear_1','Mitera','Pink & White Ombre Pure Chiffon Saree',849,'images/sarees/wear1.png','#3b3e6e'),
('saree_wear_2','Kalini','Ethnic Motif Woven Design Zari Kanjeevaram Saree',725,'images/sarees/wear2.png','#3b3e6e'),
('saree_wear_3','Satrani','Ethnic Motifs Woven Design Zari Banarasi Saree',1537,'images/sarees/wear3.png','#0b0b0b'),
('saree_wear_4','Anouk','Red & Gold-Toned Woven Design Zari Pure Georgette Kanjeevaram Saree',1935,'images/sarees/wear4.png','#ff9f43'),
('saree_wear_5','Kalini','Ethnic Motifs Printed Saree',659,'images/sarees/wear5.png','#2183a2'),
('saree_wear_6','Kalini','Embellished Sequinned Saree',799,'images/sarees/wear6.png','#3b3e6e'),
('saree_wear_7','Kalini','Geometric Printed Pure Chiffon Dabu Saree',671,'images/sarees/wear7.png','#0b0b0b'),
('saree_wear_8','House of Pataudi','Green & Gold-Toned Ethnic Motifs Zari Linen Blend Saree',1999,'images/sarees/wear8.png','#ff9f43'),
('saree_wear_9','Bollyclues','Embellished Sequinned Pure Georgette Saree',1499,'images/sarees/wear9.png','#2183a2'),
('saree_wear_10','Saree mall','Saree Mall Floral Saree',791,'images/sarees/wear10.png','#0b0b0b'),
('saree_wear_11','Rangita','Gotta Patti Ruffled Saree',849,'images/sarees/wear11.png','#ff9f43'),
('saree_wear_12','Kalini','Woven Design Zari Silk Blend Banarasi Saree',791,'images/sarees/wear12.png','#2183a2');

INSERT into sports_wear values
('sports_wear_1','Alcis','Men Solid Anti Static Track Suit',3239,'images/sportswear/wear1.png','#3b3e6e'),
('sports_wear_2','ADIDAS','Men Solid LIN TR TT Tracksuits',3919,'images/sportswear/wear2.png','#3b3e6e'),
('sports_wear_3','HRX by Hrithik Roshan','HRX By Hrithik Roshan Grey Training Men Jet Black Rapid-Dry Solid Jackets',5299,'images/sportswear/wear3.png','#0b0b0b'),
('sports_wear_4','KOBO','Women Slim Fit High-Rise Seamless Rapid-Dry Sports Shorts',999,'images/sportswear/wear4.png','#ff9f43'),
('sports_wear_5','Wildcraft','Unisex DUFF_2 Solid Gym Duffel Bag',539,'images/sportswear/wear5.png','#2183a2'),
('sports_wear_6','ADIDAS','Men Black & White UniteFit Q3 BLUV Brand Logo Print Hooded Sweatshirt',2149,'images/sportswear/wear6.png','#3b3e6e'),
('sports_wear_7','HRX by Hrithik Roshan','Women Jet Black Rapid-Dry Running T-shirt',499,'images/sportswear/wear7.png','#0b0b0b'),
('sports_wear_8','HRX by Hrithik Roshan','Men Geometric Print Tracksuit',1484,'images/sportswear/wear8.png','#ff9f43'),
('sports_wear_9','Puma','Iconic T7 Outdoor Bomber Track Jacket',3199,'images/sportswear/wear9.png','#2183a2'),
('sports_wear_10','HRX by Hrithik Roshan','Men Running Sports Shorts',584,'images/sportswear/wear10.png','#0b0b0b'),
('sports_wear_11','Puma','Essential+TAPE Windbreaker rainCELL Outdoor Sporty Jacket',4399,'images/sportswear/wear11.png','#ff9f43'),
('sports_wear_12','Gear','Unisex Black & Grey Colourblocked Cross-Training Duffel Bag',584,'images/sportswear/wear12.png','#2183a2');

INSERT into night_wear values
('night_wear_1','Marks & Spencer','Men Conversational Printed Pure Cotton Shirt With Shorts',2999,'images/nightwear/wear1.png','#3b3e6e'),
('night_wear_2','Tokyo Talkies','Women Peach & White Printed Sleep Shirt',256,'images/nightwear/wear2.png','#3b3e6e'),
('night_wear_3','MINI KLUB','Infant Boys Pack of 3 Printed Pure Cotton Open-Front Innerwear Jhabla',599,'images/nightwear/wear3.png','#0b0b0b'),
('night_wear_4','Anthrilo','Girls Conversational Printed Pure Cotton Night Suit',779,'images/nightwear/wear4.png','#ff9f43'),
('night_wear_5','Claura','Women Navy Blue & Beige Floral Printed Pure Cotton Night suit',798,'images/nightwear/wear5.png','#2183a2'),
('night_wear_6','Jack & Jones','Men Green Printed Pure Cotton Innerwear Gym Vests',399,'images/nightwear/wear6.png','#3b3e6e'),
('night_wear_7','Superminis','Infant Kids Pack Of 3 Striped Pure Cotton Thermal Set',959,'images/nightwear/wear7.png','#0b0b0b'),
('night_wear_8','You Got Plan B','Boys Pack Of 3 Printed Trunks',621,'images/nightwear/wear8.png','#ff9f43'),
('night_wear_9','Boston Club','Women Navy Blue & White Tie and Dye Cotton Night suit',696,'images/nightwear/wear9.png','#2183a2'),
('night_wear_10','Nap Chief','Unisex Kids White & Red Captain America Printed Night suit',587,'images/nightwear/wear10.png','#0b0b0b'),
('night_wear_11','Levis','Men Smartskin Technology Woven Cotton Boxer Shorts with Tag Free Comfort',449,'images/nightwear/wear11.png','#ff9f43'),
('night_wear_12','SINI MINI','Girls Floral Printed Pure Cotton Night Suit',702,'images/nightwear/wear12.png','#2183a2');

INSERT into men_t_shirts values
('men_wear_1','Orange Collar T-Shirt','U.S. Polo Assn. is more than just a brand- it’s an experience.',999,'images/menwear/menwear1.png','#3b3e6e'),
('men_wear_2','LOCOMOTIVE','Men Tapered Fit Jeans',1999,'images/menwear/menwear2.png','#3b3e6e'),
('men_wear_3','HIGHLANDER','Men Tapered Fit Jeans',799,'images/menwear/menwear3.png','#0b0b0b'),
('men_wear_4','Black Stipped T-Shirt','U.S. Polo Assn. is more than just a brand- it’s an experience.',599,'images/menwear/menwear4.png','#ff9f43'),
('men_wear_5','Powerlook','Men Baggy Fit Jeans',1599,'images/menwear/menwear5.png','#2183a2'),
('men_wear_6','Orange Collar T-Shirt','U.S. Polo Assn. is more than just a brand- it’s an experience.',1199,'images/menwear/menwear6.png','#3b3e6e'),
('men_wear_7','Green Plain T-Shirt','U.S. Polo Assn. is more than just a brand- it’s an experience.',1499,'images/menwear/menwear7.png','#0b0b0b'),
('men_wear_8','Levis','Men 512 Slim Tapered Fit Jeans',969,'images/menwear/menwear8.png','#ff9f43'),
('men_wear_9','White T-Shirt','U.S. Polo Assn. is more than just a brand- it’s an experience.',499,'images/menwear/menwear9.png','#2183a2'),
('men_wear_10','Ragzo','Men Mid Rise Slim Fit Clean Look Stretchable Cargo Jeans',1799,'images/menwear/menwear10.png','#0b0b0b'),
('men_wear_11','Red Stipped T-Shirt','U.S. Polo Assn. is more than just a brand- it’s an experience',899,'images/menwear/menwear11.png','#ff9f43'),
('men_wear_12','Urbano Fashion','Men Slim Fit Jeans',699,'images/menwear/menwear12.png','#2183a2');

INSERT into kids_ethnic_wear values
('kids_ethnic_wear_1','VASTRAMAY','Boys Blue Bandhani Printed Kurta with Dhoti Pants',1376,'images/kids_ethnicwear/wear1.png','#3b3e6e'),
('kids_ethnic_wear_2','pspeaches','Girls Yellow Embroidered Kurti with Sharara & With Dupatta',999,'images/kids_ethnicwear/wear2.png','#3b3e6e'),
('kids_ethnic_wear_3','Sangria','Girls Ethnic Motifs Printed Kurti with Dhoti Pants',1049,'images/kids_ethnicwear/wear3.png','#0b0b0b'),
('kids_ethnic_wear_4','Cutiekins','Boys Band Collar Asymmetric Kurta With Pyjamas',1299,'images/kids_ethnicwear/wear4.png','#ff9f43'),
('kids_ethnic_wear_5','Cutiekins','Girls Striped Kaftan Kurta with Palazzos',749,'images/kids_ethnicwear/wear5.png','#2183a2'),
('kids_ethnic_wear_6','THANGAMAGAN','Boys Sea Green & Cream-Coloured Shirt - Lungi - Angavastram & Accessories',1019,'images/kids_ethnicwear/wear6.png','#3b3e6e'),
('kids_ethnic_wear_7','VASTRAMAY','Kids-Boys Maroon Ethnic Motifs Mirror Work Georgette Kurta And Pyjama Set',1809,'images/kids_ethnicwear/wear7.png','#0b0b0b'),
('kids_ethnic_wear_8','Cherry & Jerry','Girls Pleated Sequinned Dupion Silk Kurta with Trousers & With Dupatta',1599,'images/kids_ethnicwear/wear8.png','#ff9f43'),
('kids_ethnic_wear_9','VASTRAMAY SISHU','Boys Mandarin Collar Kurta with Pyjamas & Nehru Jacket',1637,'images/kids_ethnicwear/wear9.png','#2183a2'),
('kids_ethnic_wear_10','Cutiekins','Girls Shoulder Straps Floral Printed Gotta Patti Kurta with Sharara & Dupatta',1299,'images/kids_ethnicwear/wear10.png','#0b0b0b'),
('kids_ethnic_wear_11','Stuffie Land','Boys Yellow Leheriya Printed Pure Cotton Kurta with Dhoti Pants',599,'images/kids_ethnicwear/wear11.png','#ff9f43'),
('kids_ethnic_wear_12','Cutiekins','Girls Printed Round Neck Kaftan Kurta with Palazzos',774,'images/kids_ethnicwear/wear12.png','#2183a2');

INSERT into kids_clothing_sets values
('kids_sets_1','ariel','Infant Boys Printed Pure Cotton T-Shirt With Shorts',349,'images/kids_sets/wear1.png','#3b3e6e'),
('kids_sets_2','AURELIA','Girls Green & Yellow Printed Kurta with Skirt',3599,'images/kids_sets/wear2.png','#3b3e6e'),
('kids_sets_3','Googo Gaaga','Boys Black & Orange Printed Pure Cotton Clothing Set',812,'images/kids_sets/wear3.png','#0b0b0b'),
('kids_sets_4','Nauti Nati','Girls White & Blue Printed Co-Ords Set',629,'images/kids_sets/wear4.png','#ff9f43'),
('kids_sets_5','LilPicks','Girls Beige & Green Floral Printed Frilled Top with Trousers',1199,'images/kids_sets/wear5.png','#2183a2'),
('kids_sets_6','FASHION DREAM','Girls Round Neck Puff Sleeves Top with Skirt Clothing Set',1109,'images/kids_sets/wear6.png','#3b3e6e'),
('kids_sets_7','ariel','Infants Cotton Fleece T-Shirt with Pyjamas',399,'images/kids_sets/wear7.png','#0b0b0b'),
('kids_sets_8','Googo Gaaga','Boys Printed Pure Cotton T-shirt with Trousers',770,'images/kids_sets/wear8.png','#ff9f43'),
('kids_sets_9','Googo Gaaga ','Boys Printed Pure Cotton T-shirt with Trousers',812,'images/kids_sets/wear9.png','#2183a2'),
('kids_sets_10','H&M','Boys 2-Piece Printed Sweatshirt Set',2299,'images/kids_sets/wear10.png','#0b0b0b'),
('kids_sets_11','Nauti Nati','Infants Girls Top with Shorts',599,'images/kids_sets/wear11.png','#ff9f43'),
('kids_sets_12','Nauti Nati','Boys Turquoise Blue & Orange Printed Pure Cotton Shirt with Shorts',643,'images/kids_sets/wear12.png','#2183a2');

INSERT into grooming values
('grooming_wear_1','Park Avenue','Men 7 in 1 Essential Grooming Kit with Travel Pouch',345,'images/grooming/wear1.png','#3b3e6e'),
('grooming_wear_2','Philips','MG3710/65 All-In-One Cordless Trimmer 3000 Series Multi Groomer Set - Black',1576,'images/grooming/wear2.png','#3b3e6e'),
('grooming_wear_3','Philips','UV Protect Argan Oil Floating Plates ThermoShield Tech Hair Straightener BHS732/10',5997,'images/grooming/wear3.png','#0b0b0b'),
('grooming_wear_4','Philips','HP8100/60 SalonDry ThermoProtect 1000W Compact Hair Dryer - Blue',799,'images/grooming/wear4.png','#ff9f43'),
('grooming_wear_5','Philips','BHH885/10 ThermoProtect Technology Ionic Care Hair Straightening Brush - Navy Blue',3696,'images/grooming/wear5.png','#2183a2'),
('grooming_wear_6','Fogg','Scent Men Impressio Eau De Parfum 50 ml',239,'images/grooming/wear6.png','#3b3e6e'),
('grooming_wear_7','Philips','Men NT3650/16 Nose - Ear - Eyebrow Trimmer - Black & Grey',854,'images/grooming/wear7.png','#0b0b0b'),
('grooming_wear_8','Park Avenue','Men Livewire Long Lasting Eau De Parfum - 100 ml',600,'images/grooming/wear8.png','#ff9f43'),
('grooming_wear_9','Fogg ','Men Woody Fragrance Body Spray 120 ml',165,'images/grooming/wear9.png','#2183a2'),
('grooming_wear_10','BEARDO','Men Turmeric Face Wash 100 g',250,'images/grooming/wear10.png','#0b0b0b'),
('grooming_wear_11','Philips','Men MG3760/33 All-in-One Cordless Trimmer for Face, Head & Body - Grey',2587,'images/grooming/wear11.png','#ff9f43'),
('grooming_wear_12','Man Matters','Anti Dandruff Shampoo for Non-Itchy Scalp 100 ml',284,'images/grooming/wear12.png','#2183a2');

INSERT into foot_wear values
('foot_wear_1','U.S. Polo Assn.','Men White & Grey Colourblocked Sneakers',1649,'images/footwear/wear1.png','#3b3e6e'),
('foot_wear_2','Puma','Women Pink Sneakers',2024,'images/footwear/wear2.png','#3b3e6e'),
('foot_wear_3','Red Tape','Kids Textured Sliders',448,'images/footwear/wear3.png','#0b0b0b'),
('foot_wear_4','TWIN TOES','Open Toe Block Heels With Bows',629,'images/footwear/wear4.png','#ff9f43'),
('foot_wear_5','Bella Toes','Women Cream-Coloured Open Toe Flats',639,'images/footwear/wear5.png','#2183a2'),
('foot_wear_6','HRX by Hrithik Roshan','Pack of 3 Striped Above-Ankle Length Socks',146,'images/footwear/wear6.png','#3b3e6e'),
('foot_wear_7','Crocs','Kids Grey & Navy Blue Crocband Croslite Clogs',1747,'images/footwear/wear7.png','#0b0b0b'),
('foot_wear_8','Crocs','Unisex Clogs Sandals',2697,'images/footwear/wear8.png','#ff9f43'),
('foot_wear_9','Campus ','Kids Black Walking Sports Shoes',759,'images/footwear/wear9.png','#2183a2'),
('foot_wear_10','Puma','Kids Sneakers',3149,'images/footwear/wear10.png','#0b0b0b'),
('foot_wear_11','Skechers','Boys White Selectors - Dorvo Sneakers',2799,'images/footwear/wear11.png','#ff9f43'),
('foot_wear_12','U.S. Polo Assn.','Men Navy Blue & White Brand Logo Printed Zane 4.0 Sliders with Textures',1039,'images/footwear/wear12.png','#2183a2');

INSERT into eye_wear values
('eye_wear_1','Voyage','Unisex Black Lens & Black Aviator Sunglasses with UV Protected Lens',700,'images/eyewear/wear1.png','#2183a2'),
('eye_wear_2','Intellilens','Unisex Green Lens & Black Square Sunglasses with Polarised and UV Protected Lens',419,'images/eyewear/wear2.png','#3b3e6e'),
('eye_wear_3','CRIBA','Unisex Black Solid UV Protected Oversized Sunglasses CR_BADSHAH.260',319,'images/eyewear/wear3.png','#0b0b0b'),
('eye_wear_4','ALIGATORR','Unisex Grey Lens & Black Rectangle Sunglasses with UV Protected Lens',339,'images/eyewear/wear4.png','#ff9f43'),
('eye_wear_5','CRIBA','Unisex Clear Lens & White Rectangle Sunglasses with UV Protected Lens CR_TR_SQR_BC',379,'images/eyewear/wear5.png','#2183a2'),
('eye_wear_6','GARTH','Unisex Black Lens & Black Cateye Sunglasses with UV Protected Lens',299,'images/eyewear/wear6.png','#3b3e6e'),
('eye_wear_7','Intellilens','Unisex Black Lens & Aviator UV Protected HD Sunglasses 1000000060773',419,'images/eyewear/wear7.png','#0b0b0b'),
('eye_wear_8','Gold Berg','Unisex Brown Lens & Wayfarer Sunglasses with UV Protected Lens GB-1301_M.BRN',627,'images/eyewear/wear8.png','#ff9f43');

INSERT into ethnic_wear_women values
('ethnic_women_wear_1','Indo Era','Lavender & Red Floral Embroidered Pure Cotton Kurta With Trousers & Dupatta',2099,'images/ethnicwear_kurtas/wear1.png','#3b3e6e'),
('ethnic_women_wear_2','KALINI','Women Mustard Yellow Floral Printed Anarkali Fusion Kurta',879,'images/ethnicwear_kurtas/wear2.png','#3b3e6e'),
('ethnic_women_wear_3','KALINI','Floral Printed Gotta Patti Pure Cotton Kurta with Trousers & With Dupatta',1299,'images/ethnicwear_kurtas/wear3.png','#0b0b0b'),
('ethnic_women_wear_4','ZARI','Ethnic Motifs Printed Beads and Stones Kurta & Trousers With Dupatta',2594,'images/ethnicwear_kurtas/wear4.png','#ff9f43'),
('ethnic_women_wear_5','Indo Era','Women Floral Embroidered Thread Work Liva Kurta With Trousers',1259,'images/ethnicwear_kurtas/wear5.png','#2183a2'),
('ethnic_women_wear_6','Shae by SASSAFRAS','Women Blue & Off-White Printed Anarkali Kurta',679,'images/ethnicwear_kurtas/wear6.png','#3b3e6e'),
('ethnic_women_wear_7','Libas','Women Peach & Pink Floral Print Straight Kurta',454,'images/ethnicwear_kurtas/wear7.png','#0b0b0b'),
('ethnic_women_wear_8','KALINI','Women Green Embroidered Thread Work Kurta with Trousers & Dupatta',887,'images/ethnicwear_kurtas/wear8.png','#ff9f43'),
('ethnic_women_wear_9','Meena Bazaar ','Floral Printed Kurta & Leggings With Dupatta',10995,'images/ethnicwear_kurtas/wear9.png','#2183a2'),
('ethnic_women_wear_10','Khushal K','Floral Printed Empire Thread & Mirror Work Kurta with Palazzos & Dupatta',1814,'images/ethnicwear_kurtas/wear10.png','#0b0b0b'),
('ethnic_women_wear_11','Indo Era','Women Purple Yoke Design Kurta with Palazzos & With Dupatta',999,'images/ethnicwear_kurtas/wear11.png','#ff9f43'),
('ethnic_women_wear_12','Khushal K','Ethnic Motifs Embroidered Sequined Kurta with Palazzos & Dupatta',1634,'images/ethnicwear_kurtas/wear12.png','#2183a2');

INSERT into ethnic_wear_men values
('ethnic_men_wear_1','KISAH','Men Printed Kurta With Dhoti Pants',2495,'images/ethnicwear_men/wear1.png','#3b3e6e'),
('ethnic_men_wear_2','Jompers','Men Floral Embroidered Chikankari Pure Cotton Kurta with Churidar',1574,'images/ethnicwear_men/wear2.png','#3b3e6e'),
('ethnic_men_wear_3','SOJANYA','Men Maroon & Gold Floral Straight Kurta Churidar & Sequined Nehru Jacket',1971,'images/ethnicwear_men/wear3.png','#0b0b0b'),
('ethnic_men_wear_4','Ode by House of Pataudi','Men Woven Design Nehru Jackets',1533,'images/ethnicwear_men/wear4.png','#ff9f43'),
('ethnic_men_wear_5','HOUSE OF DEYANN','Embellished Mandarin Collar Nehru Jackets',2845,'images/ethnicwear_men/wear5.png','#2183a2'),
('ethnic_men_wear_6','DEYANN','Men Off White Printed Dhoti Pants',656,'images/ethnicwear_men/wear6.png','#3b3e6e'),
('ethnic_men_wear_7','KISAH','Printed Nehru Jackets With Pocket Square',2678,'images/ethnicwear_men/wear7.png','#0b0b0b'),
('ethnic_men_wear_8','DEYANN','Men Blue & Cream-Coloured Sherwani With Dhoti Pants',3969,'images/ethnicwear_men/wear8.png','#ff9f43'),
('ethnic_men_wear_9','Sanwara','Embroidered Art Silk Dhotis',1299,'images/ethnicwear_men/wear9.png','#2183a2'),
('ethnic_men_wear_10','VASTRAMAY','Men Silk Blend Sherwani With Dhoti Pants',3279,'images/ethnicwear_men/wear10.png','#0b0b0b'),
('ethnic_men_wear_11','KISAH','Woven-Design Cotton Sherwani Set',6579,'images/ethnicwear_men/wear11.png','#ff9f43'),
('ethnic_men_wear_12','Ramraj','Mens Cream-Coloured Pure Cotton Double Layer Dhoti Gold Zari Border',660,'images/ethnicwear_men/wear12.png','#2183a2');

INSERT into casuals_men values
('casuals_men_wear_1','Roadster','Men Black & Grey Checked Pure Cotton Casual Shirt',519,'images/casuals_men/wear1.png','#3b3e6e'),
('casuals_men_wear_2','Reslag','Men Mid-Rise Cotton Cargo Trousers',1289,'images/casuals_men/wear2.png','#3b3e6e'),
('casuals_men_wear_3','H&M','Men Grey Cargo Joggers',2799,'images/casuals_men/wear3.png','#0b0b0b'),
('casuals_men_wear_4','KETCH','Men Blue Slim Fit Checked Casual Shirt',399,'images/casuals_men/wear4.png','#ff9f43'),
('casuals_men_wear_5','Levis','Men Mid-Rise Tapered Fit Chinos Trousers',1754,'images/casuals_men/wear5.png','#2183a2'),
('casuals_men_wear_6','HIGHLANDER','Men White Slim Fit Casual Shirt',573,'images/casuals_men/wear6.png','#3b3e6e'),
('casuals_men_wear_7','Van Heusen Sport','Men Slim Fit Trousers',2799,'images/casuals_men/wear7.png','#0b0b0b'),
('casuals_men_wear_8','Dennis Lingo','Men Pink Slim Fit Casual Shirt',569,'images/casuals_men/wear8.png','#ff9f43'),
('casuals_men_wear_9','Roadster','Men Navy Blue Magenta Pink Regular Fit Checked Casual Shirt',664,'images/casuals_men/wear9.png','#2183a2'),
('casuals_men_wear_10','Roadster','Time Travler Men Beige Slim Fit Sustainable Chinos',599,'images/casuals_men/wear10.png','#0b0b0b'),
('casuals_men_wear_11','Louis Philippe Sport','Slim Fit Pure Cotton Casual Shirt',1999,'images/casuals_men/wear11.png','#ff9f43'),
('casuals_men_wear_12','HIGHLANDER','Men Grey Slim Fit Easy Wash Joggers Trousers',681,'images/casuals_men/wear12.png','#2183a2');

INSERT into active_wear_men values
('active_men_wear_1','HIGHLANDER','Men Teal Blue Solid Casual Track Pant',527,'images/activewear_men/wear1.png','#3b3e6e'),
('active_men_wear_2','Fort Collins','Single Breasted Formal Blazer',1599,'images/activewear_men/wear2.png','#3b3e6e'),
('active_men_wear_3','INVICTUS','Men Grey Melange Solid Single-Breasted Slim Fit Smart Casual Blazer',2659,'images/activewear_men/wear3.png','#0b0b0b'),
('active_men_wear_4','Harvard','Men Grey Melange Solid Tapered Style Track Pants',559,'images/activewear_men/wear4.png','#ff9f43'),
('active_men_wear_5','Fame Forever by Lifestyle','Men Mid-Rise Cotton Track Pants',1494,'images/activewear_men/wear5.png','#2183a2'),
('active_men_wear_6','House of Pataudi','Men Ethnic Motifs Printed Sequined Bandhgala Jashn Blazer',9999,'images/activewear_men/wear6.png','#3b3e6e'),
('active_men_wear_7','Nike','Men Sportswear Solid Regular Fit Track Pants',2577,'images/activewear_men/wear7.png','#0b0b0b'),
('active_men_wear_8','House of Pataudi','Ethnic Motifs Printed Bandhgala Jashn Blazer With Sequined Detail',5499,'images/activewear_men/wear8.png','#ff9f43'),
('active_men_wear_9','HRX by Hrithik Roshan','Men Lifestyle Track Pants',974,'images/activewear_men/wear9.png','#2183a2'),
('active_men_wear_10','RARE RABBIT','Men Slim-Fit Single-Breasted Blazer',8999,'images/activewear_men/wear10.png','#0b0b0b'),
('active_men_wear_11','Mr Bowerbird','Men Beige Solid Single-Breasted Tailored Fit Premium Knit Casual Blazer',3999,'images/activewear_men/wear11.png','#ff9f43'),
('active_men_wear_12','Flying Machine','Men Black Solid Joggers with Side Taping Detail',1099,'images/activewear_men/wear12.png','#2183a2');

INSERT into gadgets values
('gadget_1','JBL','Black Solid Portable Bluetooth Speaker',24999,'images/gadgets/wear1.png','#3b3e6e'),
('gadget_2','boAt','Storm Call Smart Watch',2999,'images/gadgets/wear2.png','#3b3e6e'),
('gadget_3','boAt','Rockerz 450 M Marvel Edition Wireless Headphone - Kings Purple',3990,'images/gadgets/wear3.png','#0b0b0b'),
('gadget_4','NOISE','Buds VS102 Truly Wireless Earbuds with 50hrs playtime and 11mm driver',899,'images/gadgets/wear4.png','#ff9f43'),
('gadget_5','Portronics','Blue 20W Portable Bluetooth Speaker',1999,'images/gadgets/wear5.png','#2183a2'),
('gadget_6','Samsung','Galaxy Watch 6 Classic LTE (47mm, Compatible with Android only)',43999,'images/gadgets/wear6.png','#3b3e6e'),
('gadget_7','OnePlus','Bullets Wireless Z2 in Ear Earphones with 45dB Hybrid ANC and Quick Switch',1999,'images/gadgets/wear7.png','#0b0b0b'),
('gadget_8','boAt','Stone 650 10W Raging Red Stereo Wireless Speaker with IPX5 & Up to 7H Playtime',1999,'images/gadgets/wear8.png','#ff9f43'),
('gadget_9','Samsung','Black Solid Smart Watches',13999,'images/gadgets/wear9.png','#2183a2'),
('gadget_10','Roadster','Black & Blue Worthy Thor Printed Wireless Melody Bluetooth Speaker',4199,'images/gadgets/wear10.png','#0b0b0b'),
('gadget_11','OnePlus','Nord Buds 2r True Wireless in Ear Earbuds with Mic',1799,'images/gadgets/wear11.png','#ff9f43'),
('gadget_12','NOISE','Fit Crew Smartwatch',1549,'images/gadgets/wear12.png','#2183a2');

INSERT into handbags values
('handbag_1','Mast & Harbour','Beige & White Colourblocked Satchel',923,'images/handbags/wear1.png','#3b3e6e'),
('handbag_2','Diva Dale','Structured Sling Bag',799,'images/handbags/wear2.png','#3b3e6e'),
('handbag_3','KLEIO','Vegan Quilted Sling Cross Body Bag',1139,'images/handbags/wear3.png','#0b0b0b'),
('handbag_4','Exotic','White Striped PU Structured Sling Bag',591,'images/handbags/wear4.png','#ff9f43'),
('handbag_5','Lino Perros','Off-White Quilted Handheld Bag',899,'images/handbags/wear5.png','#2183a2'),
('handbag_6','Tommy Hilfiger','Navy Blue Animal Textured Structured Sling Bag',2099,'images/handbags/wear6.png','#3b3e6e'),
('handbag_7','DressBerry','Pink Satchel',824,'images/handbags/wear7.png','#0b0b0b'),
('handbag_8','Lino Perros','White Croc Textured Baguette Bag',999,'images/handbags/wear8.png','#ff9f43'),
('handbag_9','Exotic','Black Colourblocked PU Structured Sling Bag',531,'images/handbags/wear9.png','#2183a2'),
('handbag_10','Lino Perros','Women White Solid Sling Bag',599,'images/handbags/wear10.png','#0b0b0b'),
('handbag_11','DressBerry','Teal Blue Textured Bucket Bag',649,'images/handbags/wear11.png','#ff9f43'),
('handbag_12','LEGAL BRIBE','Green Solid Handheld Bag',1190,'images/handbags/wear12.png','#2183a2');

INSERT into beautify values
('makeup_1','Milagro beauty','On-The-Go 4 IN 1 Makeup Pen',875,'images/makeup/wear1.png','#3b3e6e'),
('makeup_2','Bobbi Brown','Lightweight & Ultra Moisturizing Extra Lip Tint 2.3 g - Bare Punch',2080,'images/makeup/wear2.png','#3b3e6e'),
('makeup_3','Lakme','9 to 5 Complexion Care SPF 30 CC Cream - Beige, 30 g',216,'images/makeup/wear3.png','#0b0b0b'),
('makeup_4','DOT & KEY','Vitamin C + E Sunscreen SPF 50 PA+++ For Glowing Skin, 100% No White Cast - 50g',311,'images/makeup/wear4.png','#ff9f43'),
('makeup_5','DAVIDOFF','Women Cool Water Eau de Toilette 100 ml',4600,'images/makeup/wear5.png','#2183a2'),
('makeup_6','Lakme','Absolute Spotlight Eye Shadow Palette - Stilettos',447,'images/makeup/wear6.png','#3b3e6e'),
('makeup_7','Lakme','9 To 5 Primer + Matte SPF20 Perfect Cover Foundation - Warm Natural W180 25 ml',247,'images/makeup/wear7.png','#0b0b0b'),
('makeup_8','Carlton London','Women Euphoria Gift Set of Blush+Lush+Muse+Desire Eau De Parfum - 30ml each',747,'images/makeup/wear8.png','#ff9f43'),
('makeup_9','LOreal','Paris Infallible Matte Resistance Liquid Lipstick 5ml - Wine Not 500',999,'images/makeup/wear9.png','#2183a2'),
('makeup_10','Bella Vita Organic','Women Senorita Long-Lasting Eau de Parfum - 100ml',476,'images/makeup/wear10.png','#0b0b0b'),
('makeup_11','Maybelline','New York Smudge Proof Colossal Kajal with Aloe Vera- Deep Black',139,'images/makeup/wear11.png','#ff9f43'),
('makeup_12','Lakme','9 to 5 Flawless Matte Complexion Compact - Almond',247,'images/makeup/wear12.png','#2183a2');

INSERT INTO category VALUES
('c_1', 'Ethnic Wear', '["Sherwani","Dhoti","Nehru Jacket","Ethnic Wear","Traditional Wear"]', 'images/ethnicware1.jpg','ethnic_wear_men.php'),
('c_2', 'Active Wear', '["Joggers","Track Pants","Blazer"]', 'images/activeware1.jpg','active_wear_men.php'),
('c_3', 'Casual Wear', '["Casual","Slim fit","Trousers","Sweatshirt","Top","Jeans","T-Shirt","kids"]', 'images/t-shirt1.jpg','casuals_men.php'),
('c_4', 'Western Wear', '["Kurta","Palazzos","Dupatta","Ethnic","Pyjama"]', 'images/westernwear1.jpg','ethnic_wear_women.php'),
('c_5', 'Sports Wear', '["Sport","Track Suit","Jacket","Duffel Bag","Rapid Dry"]', 'images/sportswear1.jpg','sports_wear.php'),
('c_6', 'Night Wear', '["Night","Short","Boxer","Innerwear","Sleep"]', 'images/innerwear1.jpg','night_wear.php'),
('c_7', 'Clothing Sets', '["Set","pack"]', 'images/kidswear1.jpg','kids_clothing_sets.php'),
('c_8', 'Foot Wear', '["Sneaker","Slider","Heel","Flats","Sandal","Shoe","Crocs","Socks"]', 'images/footwear1.jpg','foot_wear.php'),
('c_9', 'Grooming', '["Grooming","Face Wash","Trimmer","Shampoo","Trimmer","Straightener","Hair Dryer","Brush","Perfume","Spray"]', 'images/groomingimage.jpg','grooming.php'),
('c_10', 'Eye Wear', '["Sunglasses","Lens"]', 'images/eyewear1.jpg','eye_wear.php'),
('c_11', 'Gadgets', '["Bluetooth Speaker","Earbuds","Smart Watch","Headphone","Watch","Earphones"]', 'images/headphones.jpg','gadgets.php'),
('c_12', 'Sarees', '["Saree"]', 'images/sarees/wear2.png','sarees.php'),
('c_13', 'Handbags', '["Sling Bag","Hand Bag"]', 'images/handbags/wear1.png','handbags.php'),
('c_14', 'Beauty Products', '["Make Up","Kajol","Parfum","Foundation","Lipstick"]', 'images/makeup.jpg','beautify.php');


select *from USERS;
select *from kids_t_shirts;
select *from sarees;
select *from beautify;
select *from sports_wear;
select *from night_wear;
select *from kids_ethnic_wear;
select *from kids_clothing_sets;
select *from grooming;
select *from foot_wear;
select *from eye_wear;
select *from ethnic_wear_women;
select *from ethnic_wear_men;
select *from casuals_men;
select * from active_wear_men;
select *from gadgets;
select *from handbags;
select *from cart;
select *from orders;
select *from kids_t_shirts
inner join cart on cart.productId=kids_t_shirts.productId where cart.userName='Charan14';
SELECT 'sarees' AS source_table, sarees.*
FROM sarees
WHERE productDescription LIKE '%saree%'
UNION ALL
SELECT 'foot_wear' AS source_table, foot_wear.*
FROM foot_wear
WHERE productDescription LIKE '%apple%'
UNION ALL
SELECT 'eye_wear' AS source_table, eye_wear.*
FROM eye_wear
WHERE productDescription LIKE '%apple%'
UNION ALL
SELECT 'gadgets' AS source_table, gadgets.*
FROM gadgets
WHERE productDescription LIKE '%watch%';
select *from searches;





drop table searches;
drop table USERS;
drop table kids_ethnic_wear;
drop table kids_t_shirts;
drop table eye_wear;
drop table gadgets;
drop table cart;
drop table orders;
drop table category;
