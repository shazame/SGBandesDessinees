insert into VOLUME(TITRE,ANNEE_EDITION)
       VALUES ('test_volume', 1342);
insert into EDITEUR(NOM_EDITEUR)
       VALUES ('soleil');

insert into ALBUM_SANS_COLLECTION(NO_VOLUME, NO_EDITEUR)
       VALUES(seq_volume.CURRVAL,seq_editeur.CURRVAL);



insert into VOLUME(TITRE,ANNEE_EDITION)
       VALUES ('Trollympiades', 2000);

insert into COLLECTION(NOM_COLLECTION,NO_EDITEUR)
       VALUES('Trolls de troy',seq_editeur.CURRVAL);       

insert into ALBUM_AVEC_COLLECTION(NO_VOLUME, NO_COLLECTION, NO_DS_COLLECTION)
       VALUES(seq_volume.CURRVAL,seq_collection.CURRVAL, 10);
