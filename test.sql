select *
       from VOLUME V
       left outer join
       	    ALBUM_AVEC_COLLECTION AAC
       on V.NO_VOLUME = AAC.NO_VOLUME
       order by V.NO_VOLUME asc;