create database aliments;
use aliments;
use restaurant;

create table categorie(
    id int  NOT NULL auto_increment, 
   nom varchar(100),
   primary key(id)
);
insert into categorie(nom) values('Déjeuner');
insert into categorie(nom) values('Petit déjeuner');
insert into categorie(nom) values('Dinêr');
	
create table souscategorie(
		id int  NOT NULL auto_increment, 
		idcategorie int,
		nom varchar(50),
		foreign key(idcategorie) references categorie(id),
		primary key(id)
);
insert into souscategorie(idcategorie,nom) values(1,'Salade crudités');
insert into souscategorie(idcategorie,nom) values(1,'Burger ');
insert into souscategorie(idcategorie,nom) values(1,'Boissons ');
insert into souscategorie(idcategorie,nom) values(2,'Poulet frite avec chapelure');
insert into souscategorie(idcategorie,nom) values(2,'Poulet frite ');
insert into souscategorie(idcategorie,nom) values(2,' Poisson et frite ');
insert into souscategorie(idcategorie,nom) values(3,' Riz contonnais ');
insert into souscategorie(idcategorie,nom) values(3,' Poulet spécial gorkha ');
insert into souscategorie(idcategorie,nom) values(3,' Sauce blanche ');
create table article(
    id int  NOT NULL auto_increment, 
	idsouscategorie int,
	image varchar(100),
    prix double,
	daty date,
    description varchar(500),
	foreign key(idsouscategorie) references souscategorie(id),
    primary key(id)
);

create table utilisateur(
	    id int unsigned NOT NULL auto_increment, 
		nom varchar(50),
		prenom varchar(50),
		login varchar(50),
		motdepasse varchar(50),
		typeUtilisateur int,
		contact varchar(50),
		adresse varchar(50),
		primary key(id)
	);
insert into utilisateur(nom,prenom,login,motdepasse,typeUtilisateur,contact,adresse) values('yael','nirinasoa','yael',sha1('yael'),1,'0331234567','ICAndoharanofotsy');
insert into utilisateur(nom,prenom,login,motdepasse,typeUtilisateur,contact,adresse) values('kim','kim','kim',sha1('kim'),0,'0341234567','201-Antanimena');
insert into utilisateur(nom,prenom,login,motdepasse,typeUtilisateur,contact,adresse) values('tae','tae','tae',sha1('tae'),0,'0331234567','34C Andravohangy');

Boulettes à la vapeur fourrées de viande hachée légèrement épicée et servies avec une sauce spéciale.


Insert into article(idsouscategorie,image,prix,daty,description) values(1,'assets/images/salade-crudité.png',200,now(),'Salade crudités toutes les bonnes recettes');
Insert into article(idsouscategorie,image,prix,daty,description) values(2,'assets/images/burger.png',300,now(),'Burger très spécial avec du goût unique');
Insert into article(idsouscategorie,image,prix,daty,description) values(3,'assets/images/boissons.png',100,now(),'Boissons sirop de pomme ');
Insert into article(idsouscategorie,image,prix,daty,description) values(4,'assets/images/poulet-frite-avec-chapelure.png',200,now(),'Poulet frite avec chapelure ');
Insert into article(idsouscategorie,image,prix,daty,description) values(5,'assets/images/poulet-frite.png',200,now(),'Poulet frite avec assaisonnement');
Insert into article(idsouscategorie,image,prix,daty,description) values(6,'assets/images/riz-contonnais.png',250,now(),'Riz contonnais avec pattes');
Insert into article(idsouscategorie,image,prix,daty,description) values(7,'assets/images/poulet-spécial-gorkha.png',260,now(),'Poulet spécial gorkha avec beaucoup de vitamine');
Insert into article(idsouscategorie,image,prix,daty,description) values(8,'assets/images/sauce-blanche.png',260,now(),'Sauce blanche formée en boule');
create view  concatenation as select c.id as idcategorie,sc.id as idscategorie,c.nom as categorie,sc. nom,a.prix,a.description,a.daty,a.image,a.id from article a join souscategorie sc on a.idsouscategorie=sc.id join categorie c on c.id=sc.idcategorie;
