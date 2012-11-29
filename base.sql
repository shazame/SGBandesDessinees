-- Parse::SQL::Dia    version 0.23                              
-- Documentation      http://search.cpan.org/dist/Parse-Dia-SQL/
-- Environment        Perl 5.014002, /usr/bin/perl              
-- Architecture       x86_64-linux-gnu-thread-multi             
-- Target Database    oracle                                    
-- Input file         bande_dessinees.dia                       
-- Generated at       Tue Nov 20 13:36:21 2012                  
-- Typemap for oracle not found in input file                   

-- get_constraints_drop 

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
drop table Autueuriser;
drop table Auteur;

-- get_smallpackage_pre_sql 

-- get_schema_create
create table Revue (
   no_volume  identity       not null,
   no_editeur identity               ,
   no_revue   int = not null         ,
   constraint pk_Revue primary key (no_volume)
)   ;
create table Album_sans_collection (
   no_volume  identity not null,
   no_editeur identity         ,
   constraint pk_Album_sans_collection primary key (no_volume)
)   ;
create table Volume (
   no_volume     identity                not null,
   titre         varchar(255) = not null         ,
   annee_edition int = not null                  ,
   constraint pk_Volume primary key (no_volume)
)   ;
create table Collection (
   no_collection  identity                not null,
   nom_collection varchar(255) = not null         ,
   no_editeur     identity                        ,
   constraint pk_Collection primary key (no_collection)
)   ;
create table Album_avec_collection (
   no_volume        identity       not null,
   no_collection    identity               ,
   no_ds_collection int = not null         ,
   constraint pk_Album_avec_collection primary key (no_volume)
)   ;
create table Editeur (
   no_editeur  identity                not null,
   nom_editeur varchar(255) = not null         ,
   constraint pk_Editeur primary key (no_editeur)
)   ;
create table Contenir (
   no_volume   identity not null,
   no_histoire identity not null,
   constraint pk_Contenir primary key (no_volume,no_histoire)
)   ;
create table Histoire (
   no_histoire    identity                not null,
   titre          varchar(255) = not null         ,
   annee_parution int = not null                  ,
   constraint pk_Histoire primary key (no_histoire)
)   ;
create table Appartenance_serie (
   no_histoire identity       not null,
   no_serie    identity       not null,
   no_ds_serie int = not null         ,
   constraint pk_Appartenance_serie primary key (no_histoire,no_serie)
)   ;
create table Serie (
   no_serie    identity                not null,
   titre_serie varchar(255) = not null         ,
   constraint pk_Serie primary key (no_serie)
)   ;
create table Auteuriser (
   no_auteur   identity               not null,
   no_histoire identity               not null,
   role        varchar(10) = not null         ,
   constraint pk_Autueuriser primary key (no_auteur,no_histoire)
)   ;
create table Auteur (
   no_auteur     identity                not null,
   nom_auteur    varchar(255) = not null         ,
   prenom_auteur varchar(255) = not null         ,
   constraint pk_Auteur primary key (no_auteur)
)   ;

-- get_view_create

-- get_permissions_create

-- get_inserts

-- get_smallpackage_post_sql

-- get_associations_create
