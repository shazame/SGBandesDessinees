-- Parse::SQL::Dia    version 0.23                              
-- Documentation      http://search.cpan.org/dist/Parse-Dia-SQL/
-- Environment        Perl 5.014002, /usr/bin/perl              
-- Architecture       x86_64-linux-gnu-thread-multi             
-- Target Database    oracle                                    
-- Input file         bande_dessinees.dia                       
-- Generated at       Thu Dec  6 08:39:33 2012                  
-- Typemap for oracle not found in input file                   

-- get_constraints_drop 
alter table Album_sans_collection drop constraint albm_sns_clctn_fk_No_volume ;
alter table Revue drop constraint revue_fk_No_volume ;
alter table Album_avec_collection drop constraint albm_vc_clctn_fk_No_volume ;
alter table Contenir drop constraint contenir_fk_No_volume ;
alter table Contenir drop constraint contenir_fk_No_histoire ;
alter table Album_avec_collection drop constraint albm_vc_clctn_fk_No_collection ;
alter table Album_sans_collection drop constraint albm_sns_clctn_fk_No_editeur ;
alter table Collection drop constraint collection_fk_No_editeur ;
alter table Appartenance_serie drop constraint appartenance_serie_fk_No_serie ;
alter table Appartenance_serie drop constraint aprtnc_sr_fk_No_histoire ;
alter table Autorer drop constraint autorer_fk_No_auteur ;
alter table Autorer drop constraint autorer_fk_No_histoire ;
alter table Edition_des_revues drop constraint edtn_ds_rvs_fk_No_editeur ;
alter table Revue drop constraint revue_fk_No_revue ;

-- get_permissions_drop 

-- get_view_drop

-- get_schema_drop
drop table Revue;
drop table Album_sans_collection;
drop table Volume;
drop table Collection;
drop table Album_avec_collection;
drop table Editeur;
drop table Contenir;
drop table Histoire;
drop table Appartenance_serie;
drop table Serie;
drop table Autorer;
drop table Auteur;
drop table Edition_des_revues;

-- get_smallpackage_pre_sql 

-- get_schema_create
create table Revue (
   no_volume int not null,
   no_revue  int not null,
   constraint pk_Revue primary key (no_volume)
)   ;
create table Album_sans_collection (
   no_volume  int not null,
   no_editeur int not null,
   constraint pk_Album_sans_collection primary key (no_volume)
)   ;
create table Volume (
   no_volume     int           not null,
   titre         varchar(255)  not null,
   annee_edition int           not null,
   constraint pk_Volume primary key (no_volume)
)   ;
create table Collection (
   no_collection  int           not null,
   nom_collection varchar(255)  not null,
   no_editeur     int                   ,
   constraint pk_Collection primary key (no_collection)
)   ;
create table Album_avec_collection (
   no_volume        int not null,
   no_collection    int not null,
   no_ds_collection int not null,
   constraint pk_Album_avec_collection primary key (no_volume)
)   ;
create table Editeur (
   no_editeur  int          not null,
   nom_editeur varchar(255) not null,
   constraint pk_Editeur primary key (no_editeur)
)   ;
create table Contenir (
   no_volume   int not null,
   no_histoire int not null,
   constraint pk_Contenir primary key (no_volume,no_histoire)
)   ;
create table Histoire (
   no_histoire    int          not null,
   titre          varchar(255) not null,
   annee_parution int          not null,
   constraint pk_Histoire primary key (no_histoire)
)   ;
create table Appartenance_serie (
   no_histoire int not null,
   no_serie    int not null,
   no_ds_serie int not null,
   constraint pk_Appartenance_serie primary key (no_histoire,no_serie)
)   ;
create table Serie (
   no_serie    int          not null,
   titre_serie varchar(255) not null,
   constraint pk_Serie primary key (no_serie)
)   ;
create table Autorer (
   no_auteur   int         not null,
   no_histoire int         not null,
   role        varchar(10) not null,
   constraint pk_Autorer primary key (no_auteur,no_histoire)
)   ;
create table Auteur (
   no_auteur     int          not null,
   nom_auteur    varchar(255) not null,
   prenom_auteur varchar(255) not null,
   constraint pk_Auteur primary key (no_auteur)
)   ;
create table Edition_des_revues (
   no_revue   int not null,
   no_editeur int not null,
   constraint pk_Edition_des_revues primary key (no_revue)
)   ;

-- get_view_create

-- get_permissions_create

-- get_inserts

-- get_smallpackage_post_sql

-- get_associations_create
alter table Album_sans_collection add constraint albm_sns_clctn_fk_No_volume 
    foreign key (no_volume)
    references Volume (no_volume) ;
alter table Revue add constraint revue_fk_No_volume 
    foreign key (no_volume)
    references Volume (no_volume) ;
alter table Album_avec_collection add constraint albm_vc_clctn_fk_No_volume 
    foreign key (no_volume)
    references Volume (no_volume) ;
alter table Contenir add constraint contenir_fk_No_volume 
    foreign key (no_volume)
    references Volume (no_volume) ;
alter table Contenir add constraint contenir_fk_No_histoire 
    foreign key (no_histoire)
    references Histoire (no_histoire) ;
alter table Album_avec_collection add constraint albm_vc_clctn_fk_No_collection 
    foreign key (no_collection)
    references Collection (no_collection) ;
alter table Album_sans_collection add constraint albm_sns_clctn_fk_No_editeur 
    foreign key (no_editeur)
    references Editeur (no_editeur) ;
alter table Collection add constraint collection_fk_No_editeur 
    foreign key (no_editeur)
    references Editeur (no_editeur) ;
alter table Appartenance_serie add constraint appartenance_serie_fk_No_serie 
    foreign key (no_serie)
    references Serie (no_serie) ;
alter table Appartenance_serie add constraint aprtnc_sr_fk_No_histoire 
    foreign key (no_histoire)
    references Histoire (no_histoire) ;
alter table Autorer add constraint autorer_fk_No_auteur 
    foreign key (no_auteur)
    references Auteur (no_auteur) ;
alter table Autorer add constraint autorer_fk_No_histoire 
    foreign key (no_histoire)
    references Histoire (no_histoire) ;
alter table Edition_des_revues add constraint edtn_ds_rvs_fk_No_editeur 
    foreign key (no_editeur)
    references Editeur (no_editeur) ;
alter table Revue add constraint revue_fk_No_revue 
    foreign key (no_revue)
    references Edition_des_revues (no_revue) ;
