-- serie Tintin
insert into serie values (1, 'Tintin');
-- ================================
-- 1|Tintin au pays des Soviets|Petit "Vingtième"|Bruxelles|septembre 1930|Scénario : Hergé - Dessin : Hergé
insert into volume values (1, 'Tintin au pays des Soviets', 0);
insert into editeur values(1, 'Petit "Vingtième"')
insert into album_sans_collection values (1, 1);
insert into histoire values (1, 'Tintin au pays des Soviets', 0);
insert into contenir values (1, 1);
insert into appartenance_serie values (1, 1, 1);
insert into auteur values (1, Hergé, );
insert into auteuriser values (1, 1, 'Scénario');
insert into auteuriser values (1, 1, 'Dessin');
-- ================================
-- 2|Tintin au Congo|Petit "Vingtième"|Bruxelles|juillet 1931|
insert into volume values (2, 'Tintin au Congo', 1);
insert into album_sans_collection values (2, 1);
insert into histoire values (2, 'Tintin au Congo', 1);
insert into contenir values (2, 2);
insert into appartenance_serie values (2, 1, 2);
-- ================================
-- 3|Tintin en Amérique|Petit "Vingtième"|Bruxelles|novembre 1932|
insert into volume values (3, 'Tintin en Amérique', 2);
insert into album_sans_collection values (3, 1);
insert into histoire values (3, 'Tintin en Amérique', 2);
insert into contenir values (3, 3);
insert into appartenance_serie values (3, 1, 3);
-- ================================
-- 4|Les Cigares du Pharaon|Casterman|Tournai|octobre 1934|Scénario : Hergé - Dessin : Hergé
insert into volume values (4, 'Les Cigares du Pharaon', 4);
insert into editeur values(2, 'Casterman')
insert into album_sans_collection values (4, 2);
insert into histoire values (4, 'Les Cigares du Pharaon', 4);
insert into contenir values (4, 4);
insert into appartenance_serie values (4, 1, 4);
insert into auteuriser values (1, 4, 'Scénario');
insert into auteuriser values (1, 4, 'Dessin');
-- ================================
-- 5|Le Lotus bleu|Casterman|Tournai|septembre 1936|Scénario : Hergé - Dessin : Hergé
insert into volume values (5, 'Le Lotus bleu', 6);
insert into album_sans_collection values (5, 2);
insert into histoire values (5, 'Le Lotus bleu', 6);
insert into contenir values (5, 5);
insert into appartenance_serie values (5, 1, 5);
insert into auteuriser values (1, 5, 'Scénario');
insert into auteuriser values (1, 5, 'Dessin');
-- ================================
-- 6|L'Oreille cassée|Casterman|Tournai|novembre 1937|Scénario : Hergé - Dessin : Hergé
insert into volume values (6, 'L'Oreille cassée', 7);
insert into album_sans_collection values (6, 2);
insert into histoire values (6, 'L'Oreille cassée', 7);
insert into contenir values (6, 6);
insert into appartenance_serie values (6, 1, 6);
insert into auteuriser values (1, 6, 'Scénario');
insert into auteuriser values (1, 6, 'Dessin');
-- ================================
-- 7|L'Île Noire|Casterman|Tournai|novembre 1938|Scénario : Hergé - Dessin : Hergé
insert into volume values (7, 'L'Île Noire', 8);
insert into album_sans_collection values (7, 2);
insert into histoire values (7, 'L'Île Noire', 8);
insert into contenir values (7, 7);
insert into appartenance_serie values (7, 1, 7);
insert into auteuriser values (1, 7, 'Scénario');
insert into auteuriser values (1, 7, 'Dessin');
-- ================================
-- 8|Le Sceptre d'Ottokar|Casterman|Tournai|1939|Scénario : Hergé - Dessin : Hergé
insert into volume values (8, 'Le Sceptre d'Ottokar', 9);
insert into album_sans_collection values (8, 2);
insert into histoire values (8, 'Le Sceptre d'Ottokar', 9);
insert into contenir values (8, 8);
insert into appartenance_serie values (8, 1, 8);
insert into auteuriser values (1, 8, 'Scénario');
insert into auteuriser values (1, 8, 'Dessin');
-- ================================
-- 9|Le Crabe aux pinces d'or|Casterman|Tournai|novembre 1941|Scénario : Hergé - Dessin : Hergé
insert into volume values (9, 'Le Crabe aux pinces d'or', 1);
insert into album_sans_collection values (9, 2);
insert into histoire values (9, 'Le Crabe aux pinces d'or', 1);
insert into contenir values (9, 9);
insert into appartenance_serie values (9, 1, 9);
insert into auteuriser values (1, 9, 'Scénario');
insert into auteuriser values (1, 9, 'Dessin');
-- ================================
-- 10|L'Étoile mystérieuse|Casterman|Tournai|décembre 1942|Scénario : Hergé - Dessin : Hergé
insert into volume values (10, 'L'Étoile mystérieuse', 2);
insert into album_sans_collection values (10, 2);
insert into histoire values (10, 'L'Étoile mystérieuse', 2);
insert into contenir values (10, 10);
insert into appartenance_serie values (10, 1, 10);
insert into auteuriser values (1, 10, 'Scénario');
insert into auteuriser values (1, 10, 'Dessin');
-- ================================
-- 11|Le Secret de La Licorne|Casterman|Tournai|octobre 1943|Scénario : Hergé - Dessin : Hergé
insert into volume values (11, 'Le Secret de La Licorne', 3);
insert into album_sans_collection values (11, 2);
insert into histoire values (11, 'Le Secret de La Licorne', 3);
insert into contenir values (11, 11);
insert into appartenance_serie values (11, 1, 11);
insert into auteuriser values (1, 11, 'Scénario');
insert into auteuriser values (1, 11, 'Dessin');
-- ================================
-- 12|Le Trésor de Rackham le Rouge|Casterman|Tournai|novembre 1944|Scénario : Hergé - Dessin : Hergé
insert into volume values (12, 'Le Trésor de Rackham le Rouge', 4);
insert into album_sans_collection values (12, 2);
insert into histoire values (12, 'Le Trésor de Rackham le Rouge', 4);
insert into contenir values (12, 12);
insert into appartenance_serie values (12, 1, 12);
insert into auteuriser values (1, 12, 'Scénario');
insert into auteuriser values (1, 12, 'Dessin');
-- ================================
-- 13|Les Sept Boules de cristal|Casterman|Tournai|septembre 1948|Scénario : Hergé - Dessin : Hergé
insert into volume values (13, 'Les Sept Boules de cristal', 8);
insert into album_sans_collection values (13, 2);
insert into histoire values (13, 'Les Sept Boules de cristal', 8);
insert into contenir values (13, 13);
insert into appartenance_serie values (13, 1, 13);
insert into auteuriser values (1, 13, 'Scénario');
insert into auteuriser values (1, 13, 'Dessin');
-- ================================
-- 14|Le Temple du Soleil|Casterman|Tournai|septembre 1949|Scénario : Hergé - Dessin : Hergé
insert into volume values (14, 'Le Temple du Soleil', 9);
insert into album_sans_collection values (14, 2);
insert into histoire values (14, 'Le Temple du Soleil', 9);
insert into contenir values (14, 14);
insert into appartenance_serie values (14, 1, 14);
insert into auteuriser values (1, 14, 'Scénario');
insert into auteuriser values (1, 14, 'Dessin');
-- ================================
-- 15|Tintin au pays de l'or noir|Casterman|Tournai|décembre 1950|Scénario : Hergé - Dessin : Hergé
insert into volume values (15, 'Tintin au pays de l'or noir', 0);
insert into album_sans_collection values (15, 2);
insert into histoire values (15, 'Tintin au pays de l'or noir', 0);
insert into contenir values (15, 15);
insert into appartenance_serie values (15, 1, 15);
insert into auteuriser values (1, 15, 'Scénario');
insert into auteuriser values (1, 15, 'Dessin');
-- ================================
-- 16|Objectif Lune|Casterman|Tournai|septembre 1953|Scénario : Hergé - Dessin : Hergé
insert into volume values (16, 'Objectif Lune', 3);
insert into album_sans_collection values (16, 2);
insert into histoire values (16, 'Objectif Lune', 3);
insert into contenir values (16, 16);
insert into appartenance_serie values (16, 1, 16);
insert into auteuriser values (1, 16, 'Scénario');
insert into auteuriser values (1, 16, 'Dessin');
-- ================================
-- 17|On a marché sur la Lune|Casterman|Tournai|août 1954|Scénario : Hergé - Dessin : Hergé
insert into volume values (17, 'On a marché sur la Lune', 4);
insert into album_sans_collection values (17, 2);
insert into histoire values (17, 'On a marché sur la Lune', 4);
insert into contenir values (17, 17);
insert into appartenance_serie values (17, 1, 17);
insert into auteuriser values (1, 17, 'Scénario');
insert into auteuriser values (1, 17, 'Dessin');
-- ================================
-- 18|L'Affaire Tournesol|Casterman|Tournai|octobre 1956|Scénario : Hergé - Dessin : Hergé
insert into volume values (18, 'L'Affaire Tournesol', 6);
insert into album_sans_collection values (18, 2);
insert into histoire values (18, 'L'Affaire Tournesol', 6);
insert into contenir values (18, 18);
insert into appartenance_serie values (18, 1, 18);
insert into auteuriser values (1, 18, 'Scénario');
insert into auteuriser values (1, 18, 'Dessin');
-- ================================
-- 19|Coke en stock|Casterman|Tournai|juillet 1958|Scénario : Hergé - Dessin : Hergé
insert into volume values (19, 'Coke en stock', 8);
insert into album_sans_collection values (19, 2);
insert into histoire values (19, 'Coke en stock', 8);
insert into contenir values (19, 19);
insert into appartenance_serie values (19, 1, 19);
insert into auteuriser values (1, 19, 'Scénario');
insert into auteuriser values (1, 19, 'Dessin');
-- ================================
-- 20|Tintin au Tibet|Casterman|Tournai|janvier 1960|Scénario : Hergé - Dessin : Hergé
insert into volume values (20, 'Tintin au Tibet', 0);
insert into album_sans_collection values (20, 2);
insert into histoire values (20, 'Tintin au Tibet', 0);
insert into contenir values (20, 20);
insert into appartenance_serie values (20, 1, 20);
insert into auteuriser values (1, 20, 'Scénario');
insert into auteuriser values (1, 20, 'Dessin');
-- ================================
-- 21|Les Bijoux de la Castafiore|Casterman|Tournai|janvier 1963|Scénario : Hergé - Dessin : Hergé
insert into volume values (21, 'Les Bijoux de la Castafiore', 3);
insert into album_sans_collection values (21, 2);
insert into histoire values (21, 'Les Bijoux de la Castafiore', 3);
insert into contenir values (21, 21);
insert into appartenance_serie values (21, 1, 21);
insert into auteuriser values (1, 21, 'Scénario');
insert into auteuriser values (1, 21, 'Dessin');
-- ================================
-- 22|Vol 714 pour Sydney|Casterman|Tournai|janvier 1968|Scénario : Hergé - Dessin : Hergé
insert into volume values (22, 'Vol 714 pour Sydney', 8);
insert into album_sans_collection values (22, 2);
insert into histoire values (22, 'Vol 714 pour Sydney', 8);
insert into contenir values (22, 22);
insert into appartenance_serie values (22, 1, 22);
insert into auteuriser values (1, 22, 'Scénario');
insert into auteuriser values (1, 22, 'Dessin');
-- ================================
-- 23|Tintin et les Picaros|Casterman|Tournai|janvier 1976|Scénario : Hergé - Dessin : Hergé
insert into volume values (23, 'Tintin et les Picaros', 6);
insert into album_sans_collection values (23, 2);
insert into histoire values (23, 'Tintin et les Picaros', 6);
insert into contenir values (23, 23);
insert into appartenance_serie values (23, 1, 23);
insert into auteuriser values (1, 23, 'Scénario');
insert into auteuriser values (1, 23, 'Dessin');
-- ================================
-- serie Asterix
insert into serie values (2, 'Asterix');
-- ================================
-- 1|Astérix le Gaulois|Dargaud|Paris|juillet 1961|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (24, 'Astérix le Gaulois', 1);
insert into editeur values(3, 'Dargaud')
insert into album_sans_collection values (24, 3);
insert into histoire values (24, 'Astérix le Gaulois', 1);
insert into contenir values (24, 24);
insert into appartenance_serie values (24, 2, 1);
insert into auteur values (2, René, Goscinny);
insert into auteuriser values (2, 24, 'Scénario');
insert into auteur values (3, Albert, Uderzo);
insert into auteuriser values (3, 24, 'Dessin');
-- ================================
-- 2|La Serpe d'or|Dargaud|Paris|juillet 1962|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (25, 'La Serpe d'or', 2);
insert into album_sans_collection values (25, 3);
insert into histoire values (25, 'La Serpe d'or', 2);
insert into contenir values (25, 25);
insert into appartenance_serie values (25, 2, 2);
insert into auteuriser values (2, 25, 'Scénario');
insert into auteuriser values (3, 25, 'Dessin');
-- ================================
-- 3|Astérix et les Goths|Dargaud|Paris|juillet 1963|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (26, 'Astérix et les Goths', 3);
insert into album_sans_collection values (26, 3);
insert into histoire values (26, 'Astérix et les Goths', 3);
insert into contenir values (26, 26);
insert into appartenance_serie values (26, 2, 3);
insert into auteuriser values (2, 26, 'Scénario');
insert into auteuriser values (3, 26, 'Dessin');
-- ================================
-- 4|Astérix gladiateur|Dargaud|Paris|juillet 1964|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (27, 'Astérix gladiateur', 4);
insert into album_sans_collection values (27, 3);
insert into histoire values (27, 'Astérix gladiateur', 4);
insert into contenir values (27, 27);
insert into appartenance_serie values (27, 2, 4);
insert into auteuriser values (2, 27, 'Scénario');
insert into auteuriser values (3, 27, 'Dessin');
-- ================================
-- 5|Le Tour de Gaule d'Astérix|Dargaud|Paris|janvier 1965|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (28, 'Le Tour de Gaule d'Astérix', 5);
insert into album_sans_collection values (28, 3);
insert into histoire values (28, 'Le Tour de Gaule d'Astérix', 5);
insert into contenir values (28, 28);
insert into appartenance_serie values (28, 2, 5);
insert into auteuriser values (2, 28, 'Scénario');
insert into auteuriser values (3, 28, 'Dessin');
-- ================================
-- 6|Astérix et Cléopâtre|Dargaud|Paris|juillet 1965|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (29, 'Astérix et Cléopâtre', 5);
insert into album_sans_collection values (29, 3);
insert into histoire values (29, 'Astérix et Cléopâtre', 5);
insert into contenir values (29, 29);
insert into appartenance_serie values (29, 2, 6);
insert into auteuriser values (2, 29, 'Scénario');
insert into auteuriser values (3, 29, 'Dessin');
-- ================================
-- 7|Le Combat des chefs|Dargaud|Paris|janvier 1966|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (30, 'Le Combat des chefs', 6);
insert into album_sans_collection values (30, 3);
insert into histoire values (30, 'Le Combat des chefs', 6);
insert into contenir values (30, 30);
insert into appartenance_serie values (30, 2, 7);
insert into auteuriser values (2, 30, 'Scénario');
insert into auteuriser values (3, 30, 'Dessin');
-- ================================
-- 8|Astérix chez les Bretons|Dargaud|Paris|juillet 1966|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (31, 'Astérix chez les Bretons', 6);
insert into album_sans_collection values (31, 3);
insert into histoire values (31, 'Astérix chez les Bretons', 6);
insert into contenir values (31, 31);
insert into appartenance_serie values (31, 2, 8);
insert into auteuriser values (2, 31, 'Scénario');
insert into auteuriser values (3, 31, 'Dessin');
-- ================================
-- 9|Astérix et les Normands|Dargaud|Paris|octobre 1966|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (32, 'Astérix et les Normands', 6);
insert into album_sans_collection values (32, 3);
insert into histoire values (32, 'Astérix et les Normands', 6);
insert into contenir values (32, 32);
insert into appartenance_serie values (32, 2, 9);
insert into auteuriser values (2, 32, 'Scénario');
insert into auteuriser values (3, 32, 'Dessin');
-- ================================
-- 10|Astérix légionnaire|Dargaud|Paris|juillet 1967|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (33, 'Astérix légionnaire', 7);
insert into album_sans_collection values (33, 3);
insert into histoire values (33, 'Astérix légionnaire', 7);
insert into contenir values (33, 33);
insert into appartenance_serie values (33, 2, 10);
insert into auteuriser values (2, 33, 'Scénario');
insert into auteuriser values (3, 33, 'Dessin');
-- ================================
-- 11|Le Bouclier arverne|Dargaud|Paris|janvier 1968|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (34, 'Le Bouclier arverne', 8);
insert into album_sans_collection values (34, 3);
insert into histoire values (34, 'Le Bouclier arverne', 8);
insert into contenir values (34, 34);
insert into appartenance_serie values (34, 2, 11);
insert into auteuriser values (2, 34, 'Scénario');
insert into auteuriser values (3, 34, 'Dessin');
-- ================================
-- 12|Astérix aux Jeux olympiques|Dargaud|Paris|juillet 1968|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (35, 'Astérix aux Jeux olympiques', 8);
insert into album_sans_collection values (35, 3);
insert into histoire values (35, 'Astérix aux Jeux olympiques', 8);
insert into contenir values (35, 35);
insert into appartenance_serie values (35, 2, 12);
insert into auteuriser values (2, 35, 'Scénario');
insert into auteuriser values (3, 35, 'Dessin');
-- ================================
-- 13|Astérix et le chaudron|Dargaud|Paris|janvier 1969|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (36, 'Astérix et le chaudron', 9);
insert into album_sans_collection values (36, 3);
insert into histoire values (36, 'Astérix et le chaudron', 9);
insert into contenir values (36, 36);
insert into appartenance_serie values (36, 2, 13);
insert into auteuriser values (2, 36, 'Scénario');
insert into auteuriser values (3, 36, 'Dessin');
-- ================================
-- 14|Astérix en Hispanie|Dargaud|Paris|octobre 1969|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (37, 'Astérix en Hispanie', 9);
insert into album_sans_collection values (37, 3);
insert into histoire values (37, 'Astérix en Hispanie', 9);
insert into contenir values (37, 37);
insert into appartenance_serie values (37, 2, 14);
insert into auteuriser values (2, 37, 'Scénario');
insert into auteuriser values (3, 37, 'Dessin');
-- ================================
-- 15|La Zizanie|Dargaud|Paris|avril 1970|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (38, 'La Zizanie', 0);
insert into album_sans_collection values (38, 3);
insert into histoire values (38, 'La Zizanie', 0);
insert into contenir values (38, 38);
insert into appartenance_serie values (38, 2, 15);
insert into auteuriser values (2, 38, 'Scénario');
insert into auteuriser values (3, 38, 'Dessin');
-- ================================
-- 16|Astérix chez les Helvètes|Dargaud|Paris|octobre 1970|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (39, 'Astérix chez les Helvètes', 0);
insert into album_sans_collection values (39, 3);
insert into histoire values (39, 'Astérix chez les Helvètes', 0);
insert into contenir values (39, 39);
insert into appartenance_serie values (39, 2, 16);
insert into auteuriser values (2, 39, 'Scénario');
insert into auteuriser values (3, 39, 'Dessin');
-- ================================
-- 17|Le Domaine des dieux|Dargaud|Paris|octobre 1971|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (40, 'Le Domaine des dieux', 1);
insert into album_sans_collection values (40, 3);
insert into histoire values (40, 'Le Domaine des dieux', 1);
insert into contenir values (40, 40);
insert into appartenance_serie values (40, 2, 17);
insert into auteuriser values (2, 40, 'Scénario');
insert into auteuriser values (3, 40, 'Dessin');
-- ================================
-- 18|Les Lauriers de César|Dargaud|Paris|janvier 1972|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (41, 'Les Lauriers de César', 2);
insert into album_sans_collection values (41, 3);
insert into histoire values (41, 'Les Lauriers de César', 2);
insert into contenir values (41, 41);
insert into appartenance_serie values (41, 2, 18);
insert into auteuriser values (2, 41, 'Scénario');
insert into auteuriser values (3, 41, 'Dessin');
-- ================================
-- 19|Le Devin|Dargaud|Paris|octobre 1972|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (42, 'Le Devin', 2);
insert into album_sans_collection values (42, 3);
insert into histoire values (42, 'Le Devin', 2);
insert into contenir values (42, 42);
insert into appartenance_serie values (42, 2, 19);
insert into auteuriser values (2, 42, 'Scénario');
insert into auteuriser values (3, 42, 'Dessin');
-- ================================
-- 20|Astérix en Corse|Dargaud|Paris|avril 1973|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (43, 'Astérix en Corse', 3);
insert into album_sans_collection values (43, 3);
insert into histoire values (43, 'Astérix en Corse', 3);
insert into contenir values (43, 43);
insert into appartenance_serie values (43, 2, 20);
insert into auteuriser values (2, 43, 'Scénario');
insert into auteuriser values (3, 43, 'Dessin');
-- ================================
-- 21|Le Cadeau de César|Dargaud|Paris|juillet 1974|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (44, 'Le Cadeau de César', 4);
insert into album_sans_collection values (44, 3);
insert into histoire values (44, 'Le Cadeau de César', 4);
insert into contenir values (44, 44);
insert into appartenance_serie values (44, 2, 21);
insert into auteuriser values (2, 44, 'Scénario');
insert into auteuriser values (3, 44, 'Dessin');
-- ================================
-- 22|La Grande Traversée|Dargaud|Paris|avril 1975|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (45, 'La Grande Traversée', 5);
insert into album_sans_collection values (45, 3);
insert into histoire values (45, 'La Grande Traversée', 5);
insert into contenir values (45, 45);
insert into appartenance_serie values (45, 2, 22);
insert into auteuriser values (2, 45, 'Scénario');
insert into auteuriser values (3, 45, 'Dessin');
-- ================================
-- 23|Obélix et Compagnie|Dargaud|Paris|avril 1976|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (46, 'Obélix et Compagnie', 6);
insert into album_sans_collection values (46, 3);
insert into histoire values (46, 'Obélix et Compagnie', 6);
insert into contenir values (46, 46);
insert into appartenance_serie values (46, 2, 23);
insert into auteuriser values (2, 46, 'Scénario');
insert into auteuriser values (3, 46, 'Dessin');
-- ================================
-- 24|Astérix chez les Belges|Dargaud|Paris|janvier 1979|Scénario : René Goscinny - Dessin : Albert Uderzo
insert into volume values (47, 'Astérix chez les Belges', 9);
insert into album_sans_collection values (47, 3);
insert into histoire values (47, 'Astérix chez les Belges', 9);
insert into contenir values (47, 47);
insert into appartenance_serie values (47, 2, 24);
insert into auteuriser values (2, 47, 'Scénario');
insert into auteuriser values (3, 47, 'Dessin');
-- ================================
-- 25|Le Grand Fossé|Albert René|Paris|avril 1980|Auteur complet : Albert Uderzo
insert into volume values (48, 'Le Grand Fossé', 0);
insert into editeur values(4, 'Albert René')
insert into album_sans_collection values (48, 4);
insert into histoire values (48, 'Le Grand Fossé', 0);
insert into contenir values (48, 48);
insert into appartenance_serie values (48, 2, 25);
insert into auteuriser values (3, 48, 'Auteur complet');
-- ================================
-- 26|L'Odyssée d'Astérix|Albert René|Paris|octobre 1981|Auteur complet : Albert Uderzo
insert into volume values (49, 'L'Odyssée d'Astérix', 1);
insert into album_sans_collection values (49, 4);
insert into histoire values (49, 'L'Odyssée d'Astérix', 1);
insert into contenir values (49, 49);
insert into appartenance_serie values (49, 2, 26);
insert into auteuriser values (3, 49, 'Auteur complet');
-- ================================
-- 27|Le Fils d'Astérix|Albert René|Paris|octobre 1983|Auteur complet : Albert Uderzo
insert into volume values (50, 'Le Fils d'Astérix', 3);
insert into album_sans_collection values (50, 4);
insert into histoire values (50, 'Le Fils d'Astérix', 3);
insert into contenir values (50, 50);
insert into appartenance_serie values (50, 2, 27);
insert into auteuriser values (3, 50, 'Auteur complet');
-- ================================
-- 28|Astérix chez Rahàzade|Albert René|Paris|octobre 1987|Auteur complet : Albert Uderzo
insert into volume values (51, 'Astérix chez Rahàzade', 7);
insert into album_sans_collection values (51, 4);
insert into histoire values (51, 'Astérix chez Rahàzade', 7);
insert into contenir values (51, 51);
insert into appartenance_serie values (51, 2, 28);
insert into auteuriser values (3, 51, 'Auteur complet');
-- ================================
-- 29|La Rose et le Glaive|Albert René|Paris|octobre 1991|Auteur complet : Albert Uderzo - Couleurs : Studio Legrain
insert into volume values (52, 'La Rose et le Glaive', 1);
insert into album_sans_collection values (52, 4);
insert into histoire values (52, 'La Rose et le Glaive', 1);
insert into contenir values (52, 52);
insert into appartenance_serie values (52, 2, 29);
insert into auteuriser values (3, 52, 'Auteur complet');
insert into auteur values (4, Studio, Legrain);
insert into auteuriser values (4, 52, 'Couleurs');
-- ================================
-- 30|La Galère d'Obélix|Albert René|Paris|juillet 1996|Auteur complet : Albert Uderzo - Couleurs : Thierry Mébarki
insert into volume values (53, 'La Galère d'Obélix', 6);
insert into album_sans_collection values (53, 4);
insert into histoire values (53, 'La Galère d'Obélix', 6);
insert into contenir values (53, 53);
insert into appartenance_serie values (53, 2, 30);
insert into auteuriser values (3, 53, 'Auteur complet');
insert into auteur values (5, Thierry, Mébarki);
insert into auteuriser values (5, 53, 'Couleurs');
-- ================================
-- 31|Astérix et Latraviata|Albert René|Paris|mars 2001|Auteur complet : Albert Uderzo - Couleurs : Thierry Mébarki
insert into volume values (54, 'Astérix et Latraviata', 1);
insert into album_sans_collection values (54, 4);
insert into histoire values (54, 'Astérix et Latraviata', 1);
insert into contenir values (54, 54);
insert into appartenance_serie values (54, 2, 31);
insert into auteuriser values (3, 54, 'Auteur complet');
insert into auteuriser values (5, 54, 'Couleurs');
-- ================================
-- 32|Astérix et la Rentrée gauloise1|Albert René|Paris|janvier 1993|Scénario : Albert Uderzo et René Goscinny - Dessin : Albert Uderzo
insert into volume values (55, 'Astérix et la Rentrée gauloise1', 3);
insert into album_sans_collection values (55, 4);
insert into histoire values (55, 'Astérix et la Rentrée gauloise1', 3);
insert into contenir values (55, 55);
insert into appartenance_serie values (55, 2, 32);
insert into auteur values (6, Albert, Uderzo);
insert into auteuriser values (6, 55, 'Scénario');
insert into auteuriser values (3, 55, 'Dessin');
-- ================================
-- 33|Le ciel lui tombe sur la tête|Albert René|Paris|octobre 2005|Auteur complet : Albert Uderzo - Couleurs : Thierry Mébarki
insert into volume values (56, 'Le ciel lui tombe sur la tête', 5);
insert into album_sans_collection values (56, 4);
insert into histoire values (56, 'Le ciel lui tombe sur la tête', 5);
insert into contenir values (56, 56);
insert into appartenance_serie values (56, 2, 33);
insert into auteuriser values (3, 56, 'Auteur complet');
insert into auteuriser values (5, 56, 'Couleurs');
-- ================================
-- 34|L'Anniversaire d'Astérix et Obélix - Le Livre d'or|Albert René|Paris|octobre 2009|Scénario : Albert Uderzo - Dessin : Albert Uderzo - Couleurs : Thierry Mébarki
insert into volume values (57, 'L'Anniversaire d'Astérix et Obélix - Le Livre d'or', 9);
insert into album_sans_collection values (57, 4);
insert into histoire values (57, 'L'Anniversaire d'Astérix et Obélix', 9);
insert into contenir values (57, 57);
insert into appartenance_serie values (57, 2, 34);
insert into auteuriser values (3, 57, 'Scénario');
insert into auteuriser values (3, 57, 'Dessin');
insert into auteuriser values (5, 57, 'Couleurs');
insert into histoire values (58, 'Le Livre d'or', 9);
insert into contenir values (57, 58);
insert into appartenance_serie values (58, 2, 34);
insert into auteuriser values (3, 58, 'Scénario');
insert into auteuriser values (3, 58, 'Dessin');
insert into auteuriser values (5, 58, 'Couleurs');
-- ================================
-- serie Pipolin
insert into serie values (3, 'Pipolin');
-- ================================
-- 1|La Pêche miraculeuse de Pipolin|Vaillant||10 1957|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (58, 'La Pêche miraculeuse de Pipolin', 7);
insert into editeur values(5, 'Vaillant')
insert into album_sans_collection values (58, 5);
insert into histoire values (59, 'La Pêche miraculeuse de Pipolin', 7);
insert into contenir values (58, 59);
insert into appartenance_serie values (59, 3, 1);
insert into auteur values (7, Gilda, Teixeira);
insert into auteuriser values (7, 59, 'Scénario');
insert into auteur values (8, Eduardo, Coelho);
insert into auteuriser values (8, 59, 'Dessin');
-- ================================
-- 2|Pipolin et le sanglier solitaire|Vaillant||11 1957|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (59, 'Pipolin et le sanglier solitaire', 7);
insert into album_sans_collection values (59, 5);
insert into histoire values (60, 'Pipolin et le sanglier solitaire', 7);
insert into contenir values (59, 60);
insert into appartenance_serie values (60, 3, 2);
insert into auteuriser values (7, 60, 'Scénario');
insert into auteuriser values (8, 60, 'Dessin');
-- ================================
-- 3|Les aventures de Pipolin et du nain qui avait trop bu|Vaillant||12 1957|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (60, 'Les aventures de Pipolin et du nain qui avait trop bu', 7);
insert into album_sans_collection values (60, 5);
insert into histoire values (61, 'Les aventures de Pipolin et du nain qui avait trop bu', 7);
insert into contenir values (60, 61);
insert into appartenance_serie values (61, 3, 3);
insert into auteuriser values (7, 61, 'Scénario');
insert into auteuriser values (8, 61, 'Dessin');
-- ================================
-- 4|Les aventures de Pipolin et du petit chien Floc|Vaillant||01 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (61, 'Les aventures de Pipolin et du petit chien Floc', 8);
insert into album_sans_collection values (61, 5);
insert into histoire values (62, 'Les aventures de Pipolin et du petit chien Floc', 8);
insert into contenir values (61, 62);
insert into appartenance_serie values (62, 3, 4);
insert into auteuriser values (7, 62, 'Scénario');
insert into auteuriser values (8, 62, 'Dessin');
-- ================================
-- 5|sans titre|Vaillant||02 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (62, 'sans titre', 8);
insert into album_sans_collection values (62, 5);
insert into histoire values (63, 'sans titre', 8);
insert into contenir values (62, 63);
insert into appartenance_serie values (63, 3, 5);
insert into auteuriser values (7, 63, 'Scénario');
insert into auteuriser values (8, 63, 'Dessin');
-- ================================
-- 6|La Voiture de Pipolin|Vaillant||03 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (63, 'La Voiture de Pipolin', 8);
insert into album_sans_collection values (63, 5);
insert into histoire values (64, 'La Voiture de Pipolin', 8);
insert into contenir values (63, 64);
insert into appartenance_serie values (64, 3, 6);
insert into auteuriser values (7, 64, 'Scénario');
insert into auteuriser values (8, 64, 'Dessin');
-- ================================
-- 7|Pipolin et le poisson d'avril|Vaillant||04 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (64, 'Pipolin et le poisson d'avril', 8);
insert into album_sans_collection values (64, 5);
insert into histoire values (65, 'Pipolin et le poisson d'avril', 8);
insert into contenir values (64, 65);
insert into appartenance_serie values (65, 3, 7);
insert into auteuriser values (7, 65, 'Scénario');
insert into auteuriser values (8, 65, 'Dessin');
-- ================================
-- 8|Pipolin et le trésor|Vaillant||05 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (65, 'Pipolin et le trésor', 8);
insert into album_sans_collection values (65, 5);
insert into histoire values (66, 'Pipolin et le trésor', 8);
insert into contenir values (65, 66);
insert into appartenance_serie values (66, 3, 8);
insert into auteuriser values (7, 66, 'Scénario');
insert into auteuriser values (8, 66, 'Dessin');
-- ================================
-- 9|Pipolin et le fantôme !|Vaillant||06 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (66, 'Pipolin et le fantôme !', 8);
insert into album_sans_collection values (66, 5);
insert into histoire values (67, 'Pipolin et le fantôme !', 8);
insert into contenir values (66, 67);
insert into appartenance_serie values (67, 3, 9);
insert into auteuriser values (7, 67, 'Scénario');
insert into auteuriser values (8, 67, 'Dessin');
-- ================================
-- 10|Pipolin passe l'examen|Vaillant||07 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (67, 'Pipolin passe l'examen', 8);
insert into album_sans_collection values (67, 5);
insert into histoire values (68, 'Pipolin passe l'examen', 8);
insert into contenir values (67, 68);
insert into appartenance_serie values (68, 3, 10);
insert into auteuriser values (7, 68, 'Scénario');
insert into auteuriser values (8, 68, 'Dessin');
-- ================================
-- 11|Pipolin et la pêche miraculeuse|Vaillant||08 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (68, 'Pipolin et la pêche miraculeuse', 8);
insert into album_sans_collection values (68, 5);
insert into histoire values (69, 'Pipolin et la pêche miraculeuse', 8);
insert into contenir values (68, 69);
insert into appartenance_serie values (69, 3, 11);
insert into auteuriser values (7, 69, 'Scénario');
insert into auteuriser values (8, 69, 'Dessin');
-- ================================
-- 12|Pipolin visite le musée|Vaillant||09 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (69, 'Pipolin visite le musée', 8);
insert into album_sans_collection values (69, 5);
insert into histoire values (70, 'Pipolin visite le musée', 8);
insert into contenir values (69, 70);
insert into appartenance_serie values (70, 3, 12);
insert into auteuriser values (7, 70, 'Scénario');
insert into auteuriser values (8, 70, 'Dessin');
-- ================================
-- 13|L'Anniversaire de Pipolin|Vaillant||10 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (70, 'L'Anniversaire de Pipolin', 8);
insert into album_sans_collection values (70, 5);
insert into histoire values (71, 'L'Anniversaire de Pipolin', 8);
insert into contenir values (70, 71);
insert into appartenance_serie values (71, 3, 13);
insert into auteuriser values (7, 71, 'Scénario');
insert into auteuriser values (8, 71, 'Dessin');
-- ================================
-- 14|Pipolin et le magicien de la forêt|Vaillant||11 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (71, 'Pipolin et le magicien de la forêt', 8);
insert into album_sans_collection values (71, 5);
insert into histoire values (72, 'Pipolin et le magicien de la forêt', 8);
insert into contenir values (71, 72);
insert into appartenance_serie values (72, 3, 14);
insert into auteuriser values (7, 72, 'Scénario');
insert into auteuriser values (8, 72, 'Dessin');
-- ================================
-- 15|Le Noël de Pipolin|Vaillant||12 1958|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (72, 'Le Noël de Pipolin', 8);
insert into album_sans_collection values (72, 5);
insert into histoire values (73, 'Le Noël de Pipolin', 8);
insert into contenir values (72, 73);
insert into appartenance_serie values (73, 3, 15);
insert into auteuriser values (7, 73, 'Scénario');
insert into auteuriser values (8, 73, 'Dessin');
-- ================================
-- 16|L'Héritage de Pipolin|Vaillant||01 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (73, 'L'Héritage de Pipolin', 9);
insert into album_sans_collection values (73, 5);
insert into histoire values (74, 'L'Héritage de Pipolin', 9);
insert into contenir values (73, 74);
insert into appartenance_serie values (74, 3, 16);
insert into auteuriser values (7, 74, 'Scénario');
insert into auteuriser values (8, 74, 'Dessin');
-- ================================
-- 17|Pipolin et la joyeuse mascarade|Vaillant||02 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (74, 'Pipolin et la joyeuse mascarade', 9);
insert into album_sans_collection values (74, 5);
insert into histoire values (75, 'Pipolin et la joyeuse mascarade', 9);
insert into contenir values (74, 75);
insert into appartenance_serie values (75, 3, 17);
insert into auteuriser values (7, 75, 'Scénario');
insert into auteuriser values (8, 75, 'Dessin');
-- ================================
-- 18|Les Aventures de Pipolin au zoo|Vaillant||03 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (75, 'Les Aventures de Pipolin au zoo', 9);
insert into album_sans_collection values (75, 5);
insert into histoire values (76, 'Les Aventures de Pipolin au zoo', 9);
insert into contenir values (75, 76);
insert into appartenance_serie values (76, 3, 18);
insert into auteuriser values (7, 76, 'Scénario');
insert into auteuriser values (8, 76, 'Dessin');
-- ================================
-- 19|La Fête dans la forêt|Vaillant||04 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (76, 'La Fête dans la forêt', 9);
insert into album_sans_collection values (76, 5);
insert into histoire values (77, 'La Fête dans la forêt', 9);
insert into contenir values (76, 77);
insert into appartenance_serie values (77, 3, 19);
insert into auteuriser values (7, 77, 'Scénario');
insert into auteuriser values (8, 77, 'Dessin');
-- ================================
-- 20|Le Cirque est arrivé !|Vaillant||05 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (77, 'Le Cirque est arrivé !', 9);
insert into album_sans_collection values (77, 5);
insert into histoire values (78, 'Le Cirque est arrivé !', 9);
insert into contenir values (77, 78);
insert into appartenance_serie values (78, 3, 20);
insert into auteuriser values (7, 78, 'Scénario');
insert into auteuriser values (8, 78, 'Dessin');
-- ================================
-- 21|L'Île aux perroquets|Vaillant||06 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (78, 'L'Île aux perroquets', 9);
insert into album_sans_collection values (78, 5);
insert into histoire values (79, 'L'Île aux perroquets', 9);
insert into contenir values (78, 79);
insert into appartenance_serie values (79, 3, 21);
insert into auteuriser values (7, 79, 'Scénario');
insert into auteuriser values (8, 79, 'Dessin');
-- ================================
-- 22|Pipolin devient chasseur|Vaillant||07 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (79, 'Pipolin devient chasseur', 9);
insert into album_sans_collection values (79, 5);
insert into histoire values (80, 'Pipolin devient chasseur', 9);
insert into contenir values (79, 80);
insert into appartenance_serie values (80, 3, 22);
insert into auteuriser values (7, 80, 'Scénario');
insert into auteuriser values (8, 80, 'Dessin');
-- ================================
-- 23|Pipolin découvre l'Italie|Vaillant||08 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (80, 'Pipolin découvre l'Italie', 9);
insert into album_sans_collection values (80, 5);
insert into histoire values (81, 'Pipolin découvre l'Italie', 9);
insert into contenir values (80, 81);
insert into appartenance_serie values (81, 3, 23);
insert into auteuriser values (7, 81, 'Scénario');
insert into auteuriser values (8, 81, 'Dessin');
-- ================================
-- 24|Un Retour mouvementé|Vaillant||09 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (81, 'Un Retour mouvementé', 9);
insert into album_sans_collection values (81, 5);
insert into histoire values (82, 'Un Retour mouvementé', 9);
insert into contenir values (81, 82);
insert into appartenance_serie values (82, 3, 24);
insert into auteuriser values (7, 82, 'Scénario');
insert into auteuriser values (8, 82, 'Dessin');
-- ================================
-- 25|Le Rhume attaque Pipolin|Vaillant||10 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (82, 'Le Rhume attaque Pipolin', 9);
insert into album_sans_collection values (82, 5);
insert into histoire values (83, 'Le Rhume attaque Pipolin', 9);
insert into contenir values (82, 83);
insert into appartenance_serie values (83, 3, 25);
insert into auteuriser values (7, 83, 'Scénario');
insert into auteuriser values (8, 83, 'Dessin');
-- ================================
-- 26|Le Match de football|Vaillant||11 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (83, 'Le Match de football', 9);
insert into album_sans_collection values (83, 5);
insert into histoire values (84, 'Le Match de football', 9);
insert into contenir values (83, 84);
insert into appartenance_serie values (84, 3, 26);
insert into auteuriser values (7, 84, 'Scénario');
insert into auteuriser values (8, 84, 'Dessin');
-- ================================
-- 27|Voici Noël|Vaillant||12 1959|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (84, 'Voici Noël', 9);
insert into album_sans_collection values (84, 5);
insert into histoire values (85, 'Voici Noël', 9);
insert into contenir values (84, 85);
insert into appartenance_serie values (85, 3, 27);
insert into auteuriser values (7, 85, 'Scénario');
insert into auteuriser values (8, 85, 'Dessin');
-- ================================
-- 28|Les Inventions de Pipolin|Vaillant||01 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (85, 'Les Inventions de Pipolin', 0);
insert into album_sans_collection values (85, 5);
insert into histoire values (86, 'Les Inventions de Pipolin', 0);
insert into contenir values (85, 86);
insert into appartenance_serie values (86, 3, 28);
insert into auteuriser values (7, 86, 'Scénario');
insert into auteuriser values (8, 86, 'Dessin');
-- ================================
-- 29|Pipolin et la rage de dents|Vaillant||02 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (86, 'Pipolin et la rage de dents', 0);
insert into album_sans_collection values (86, 5);
insert into histoire values (87, 'Pipolin et la rage de dents', 0);
insert into contenir values (86, 87);
insert into appartenance_serie values (87, 3, 29);
insert into auteuriser values (7, 87, 'Scénario');
insert into auteuriser values (8, 87, 'Dessin');
-- ================================
-- 30|Pipolin et les crêpes ensorcelées...|Vaillant||03 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (87, 'Pipolin et les crêpes ensorcelées...', 0);
insert into album_sans_collection values (87, 5);
insert into histoire values (88, 'Pipolin et les crêpes ensorcelées...', 0);
insert into contenir values (87, 88);
insert into appartenance_serie values (88, 3, 30);
insert into auteuriser values (7, 88, 'Scénario');
insert into auteuriser values (8, 88, 'Dessin');
-- ================================
-- 31|Pipolin et la gymnastique|Vaillant||04 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (88, 'Pipolin et la gymnastique', 0);
insert into album_sans_collection values (88, 5);
insert into histoire values (89, 'Pipolin et la gymnastique', 0);
insert into contenir values (88, 89);
insert into appartenance_serie values (89, 3, 31);
insert into auteuriser values (7, 89, 'Scénario');
insert into auteuriser values (8, 89, 'Dessin');
-- ================================
-- 32|Pipolin chez les cow-boys|Vaillant||05 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (89, 'Pipolin chez les cow-boys', 0);
insert into album_sans_collection values (89, 5);
insert into histoire values (90, 'Pipolin chez les cow-boys', 0);
insert into contenir values (89, 90);
insert into appartenance_serie values (90, 3, 32);
insert into auteuriser values (7, 90, 'Scénario');
insert into auteuriser values (8, 90, 'Dessin');
-- ================================
-- 33|Une Journée bien remplie|Vaillant||06 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (90, 'Une Journée bien remplie', 0);
insert into album_sans_collection values (90, 5);
insert into histoire values (91, 'Une Journée bien remplie', 0);
insert into contenir values (90, 91);
insert into appartenance_serie values (91, 3, 33);
insert into auteuriser values (7, 91, 'Scénario');
insert into auteuriser values (8, 91, 'Dessin');
-- ================================
-- 34|Pipolin contre Kid le musclé|Vaillant||07 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (91, 'Pipolin contre Kid le musclé', 0);
insert into album_sans_collection values (91, 5);
insert into histoire values (92, 'Pipolin contre Kid le musclé', 0);
insert into contenir values (91, 92);
insert into appartenance_serie values (92, 3, 34);
insert into auteuriser values (7, 92, 'Scénario');
insert into auteuriser values (8, 92, 'Dessin');
-- ================================
-- 35|Pipolin et les animaux fantastiques|Vaillant||08 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (92, 'Pipolin et les animaux fantastiques', 0);
insert into album_sans_collection values (92, 5);
insert into histoire values (93, 'Pipolin et les animaux fantastiques', 0);
insert into contenir values (92, 93);
insert into appartenance_serie values (93, 3, 35);
insert into auteuriser values (7, 93, 'Scénario');
insert into auteuriser values (8, 93, 'Dessin');
-- ================================
-- 36|Pipolin dans la jungle|Vaillant||09 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (93, 'Pipolin dans la jungle', 0);
insert into album_sans_collection values (93, 5);
insert into histoire values (94, 'Pipolin dans la jungle', 0);
insert into contenir values (93, 94);
insert into appartenance_serie values (94, 3, 36);
insert into auteuriser values (7, 94, 'Scénario');
insert into auteuriser values (8, 94, 'Dessin');
-- ================================
-- 37|Pipolin et le pot au lait|Vaillant||10 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (94, 'Pipolin et le pot au lait', 0);
insert into album_sans_collection values (94, 5);
insert into histoire values (95, 'Pipolin et le pot au lait', 0);
insert into contenir values (94, 95);
insert into appartenance_serie values (95, 3, 37);
insert into auteuriser values (7, 95, 'Scénario');
insert into auteuriser values (8, 95, 'Dessin');
-- ================================
-- 38|Le Grand-père Pipolin XIV|Vaillant||11 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (95, 'Le Grand-père Pipolin XIV', 0);
insert into album_sans_collection values (95, 5);
insert into histoire values (96, 'Le Grand-père Pipolin XIV', 0);
insert into contenir values (95, 96);
insert into appartenance_serie values (96, 3, 38);
insert into auteuriser values (7, 96, 'Scénario');
insert into auteuriser values (8, 96, 'Dessin');
-- ================================
-- 39|L'Arbre de Noël de Pipolin|Vaillant||12 1960|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (96, 'L'Arbre de Noël de Pipolin', 0);
insert into album_sans_collection values (96, 5);
insert into histoire values (97, 'L'Arbre de Noël de Pipolin', 0);
insert into contenir values (96, 97);
insert into appartenance_serie values (97, 3, 39);
insert into auteuriser values (7, 97, 'Scénario');
insert into auteuriser values (8, 97, 'Dessin');
-- ================================
-- 40|L'Hiver attaque Pipolin|Vaillant||01 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (97, 'L'Hiver attaque Pipolin', 1);
insert into album_sans_collection values (97, 5);
insert into histoire values (98, 'L'Hiver attaque Pipolin', 1);
insert into contenir values (97, 98);
insert into appartenance_serie values (98, 3, 40);
insert into auteuriser values (7, 98, 'Scénario');
insert into auteuriser values (8, 98, 'Dessin');
-- ================================
-- 41|Les Mésaventures de Pipolin|Vaillant||02 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (98, 'Les Mésaventures de Pipolin', 1);
insert into album_sans_collection values (98, 5);
insert into histoire values (99, 'Les Mésaventures de Pipolin', 1);
insert into contenir values (98, 99);
insert into appartenance_serie values (99, 3, 41);
insert into auteuriser values (7, 99, 'Scénario');
insert into auteuriser values (8, 99, 'Dessin');
-- ================================
-- 42|Une Barbe récalcitrante|Vaillant||03 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (99, 'Une Barbe récalcitrante', 1);
insert into album_sans_collection values (99, 5);
insert into histoire values (100, 'Une Barbe récalcitrante', 1);
insert into contenir values (99, 100);
insert into appartenance_serie values (100, 3, 42);
insert into auteuriser values (7, 100, 'Scénario');
insert into auteuriser values (8, 100, 'Dessin');
-- ================================
-- 43|Pipolin et le poisson d'avril|Vaillant||04 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (100, 'Pipolin et le poisson d'avril', 1);
insert into album_sans_collection values (100, 5);
insert into histoire values (101, 'Pipolin et le poisson d'avril', 1);
insert into contenir values (100, 101);
insert into appartenance_serie values (101, 3, 43);
insert into auteuriser values (7, 101, 'Scénario');
insert into auteuriser values (8, 101, 'Dessin');
-- ================================
-- 44|Bonne fête|Vaillant||05 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (101, 'Bonne fête', 1);
insert into album_sans_collection values (101, 5);
insert into histoire values (102, 'Bonne fête', 1);
insert into contenir values (101, 102);
insert into appartenance_serie values (102, 3, 44);
insert into auteuriser values (7, 102, 'Scénario');
insert into auteuriser values (8, 102, 'Dessin');
-- ================================
-- 45|Pipolin et la partie de pêche|Vaillant||06 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (102, 'Pipolin et la partie de pêche', 1);
insert into album_sans_collection values (102, 5);
insert into histoire values (103, 'Pipolin et la partie de pêche', 1);
insert into contenir values (102, 103);
insert into appartenance_serie values (103, 3, 45);
insert into auteuriser values (7, 103, 'Scénario');
insert into auteuriser values (8, 103, 'Dessin');
-- ================================
-- 46|Pipolin fête le 14 juillet|Vaillant||07 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (103, 'Pipolin fête le 14 juillet', 1);
insert into album_sans_collection values (103, 5);
insert into histoire values (104, 'Pipolin fête le 14 juillet', 1);
insert into contenir values (103, 104);
insert into appartenance_serie values (104, 3, 46);
insert into auteuriser values (7, 104, 'Scénario');
insert into auteuriser values (8, 104, 'Dessin');
-- ================================
-- 47|Le temps des moissons|Vaillant||08 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (104, 'Le temps des moissons', 1);
insert into album_sans_collection values (104, 5);
insert into histoire values (105, 'Le temps des moissons', 1);
insert into contenir values (104, 105);
insert into appartenance_serie values (105, 3, 47);
insert into auteuriser values (7, 105, 'Scénario');
insert into auteuriser values (8, 105, 'Dessin');
-- ================================
-- 48|Gai, gai, cueillons le raisin !|Vaillant||09 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (105, 'Gai, gai, cueillons le raisin !', 1);
insert into album_sans_collection values (105, 5);
insert into histoire values (106, 'Gai, gai, cueillons le raisin !', 1);
insert into contenir values (105, 106);
insert into appartenance_serie values (106, 3, 48);
insert into auteuriser values (7, 106, 'Scénario');
insert into auteuriser values (8, 106, 'Dessin');
-- ================================
-- 49|Pipolin retourne à l'école|Vaillant||10 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (106, 'Pipolin retourne à l'école', 1);
insert into album_sans_collection values (106, 5);
insert into histoire values (107, 'Pipolin retourne à l'école', 1);
insert into contenir values (106, 107);
insert into appartenance_serie values (107, 3, 49);
insert into auteuriser values (7, 107, 'Scénario');
insert into auteuriser values (8, 107, 'Dessin');
-- ================================
-- 50|Pipolin et l'arche de Noé|Vaillant||11 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (107, 'Pipolin et l'arche de Noé', 1);
insert into album_sans_collection values (107, 5);
insert into histoire values (108, 'Pipolin et l'arche de Noé', 1);
insert into contenir values (107, 108);
insert into appartenance_serie values (108, 3, 50);
insert into auteuriser values (7, 108, 'Scénario');
insert into auteuriser values (8, 108, 'Dessin');
-- ================================
-- 51|Pipolin Père Noël|Vaillant||12 1961|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (108, 'Pipolin Père Noël', 1);
insert into album_sans_collection values (108, 5);
insert into histoire values (109, 'Pipolin Père Noël', 1);
insert into contenir values (108, 109);
insert into appartenance_serie values (109, 3, 51);
insert into auteuriser values (7, 109, 'Scénario');
insert into auteuriser values (8, 109, 'Dessin');
-- ================================
-- 52|Pipolin prépare le championnat|Vaillant||01 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (109, 'Pipolin prépare le championnat', 2);
insert into album_sans_collection values (109, 5);
insert into histoire values (110, 'Pipolin prépare le championnat', 2);
insert into contenir values (109, 110);
insert into appartenance_serie values (110, 3, 52);
insert into auteuriser values (7, 110, 'Scénario');
insert into auteuriser values (8, 110, 'Dessin');
-- ================================
-- 53|Des Ennuis pour Pipolin|Vaillant||02 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (110, 'Des Ennuis pour Pipolin', 2);
insert into album_sans_collection values (110, 5);
insert into histoire values (111, 'Des Ennuis pour Pipolin', 2);
insert into contenir values (110, 111);
insert into appartenance_serie values (111, 3, 53);
insert into auteuriser values (7, 111, 'Scénario');
insert into auteuriser values (8, 111, 'Dessin');
-- ================================
-- 54|Qui a fait le printemps ?|Vaillant||03 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (111, 'Qui a fait le printemps ?', 2);
insert into album_sans_collection values (111, 5);
insert into histoire values (112, 'Qui a fait le printemps ?', 2);
insert into contenir values (111, 112);
insert into appartenance_serie values (112, 3, 54);
insert into auteuriser values (7, 112, 'Scénario');
insert into auteuriser values (8, 112, 'Dessin');
-- ================================
-- 55|Comme dans un conte...|Vaillant||04 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (112, 'Comme dans un conte...', 2);
insert into album_sans_collection values (112, 5);
insert into histoire values (113, 'Comme dans un conte...', 2);
insert into contenir values (112, 113);
insert into appartenance_serie values (113, 3, 55);
insert into auteuriser values (7, 113, 'Scénario');
insert into auteuriser values (8, 113, 'Dessin');
-- ================================
-- 56|Champion malgré lui|Vaillant||05 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (113, 'Champion malgré lui', 2);
insert into album_sans_collection values (113, 5);
insert into histoire values (114, 'Champion malgré lui', 2);
insert into contenir values (113, 114);
insert into appartenance_serie values (114, 3, 56);
insert into auteuriser values (7, 114, 'Scénario');
insert into auteuriser values (8, 114, 'Dessin');
-- ================================
-- 57|A qui la faute ?|Vaillant||06 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (114, 'A qui la faute ?', 2);
insert into album_sans_collection values (114, 5);
insert into histoire values (115, 'A qui la faute ?', 2);
insert into contenir values (114, 115);
insert into appartenance_serie values (115, 3, 57);
insert into auteuriser values (7, 115, 'Scénario');
insert into auteuriser values (8, 115, 'Dessin');
-- ================================
-- 58|Son et lumière|Vaillant||07 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (115, 'Son et lumière', 2);
insert into album_sans_collection values (115, 5);
insert into histoire values (116, 'Son et lumière', 2);
insert into contenir values (115, 116);
insert into appartenance_serie values (116, 3, 58);
insert into auteuriser values (7, 116, 'Scénario');
insert into auteuriser values (8, 116, 'Dessin');
-- ================================
-- 59|Pipolin gardien du phare|Vaillant||08 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (116, 'Pipolin gardien du phare', 2);
insert into album_sans_collection values (116, 5);
insert into histoire values (117, 'Pipolin gardien du phare', 2);
insert into contenir values (116, 117);
insert into appartenance_serie values (117, 3, 59);
insert into auteuriser values (7, 117, 'Scénario');
insert into auteuriser values (8, 117, 'Dessin');
-- ================================
-- 60|Le Grand Départ|Vaillant||09 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (117, 'Le Grand Départ', 2);
insert into album_sans_collection values (117, 5);
insert into histoire values (118, 'Le Grand Départ', 2);
insert into contenir values (117, 118);
insert into appartenance_serie values (118, 3, 60);
insert into auteuriser values (7, 118, 'Scénario');
insert into auteuriser values (8, 118, 'Dessin');
-- ================================
-- 61|Pipolin et le modèle réduit|Vaillant||10 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (118, 'Pipolin et le modèle réduit', 2);
insert into album_sans_collection values (118, 5);
insert into histoire values (119, 'Pipolin et le modèle réduit', 2);
insert into contenir values (118, 119);
insert into appartenance_serie values (119, 3, 61);
insert into auteuriser values (7, 119, 'Scénario');
insert into auteuriser values (8, 119, 'Dessin');
-- ================================
-- 62|Pipolin et la composition|Vaillant||11 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (119, 'Pipolin et la composition', 2);
insert into album_sans_collection values (119, 5);
insert into histoire values (120, 'Pipolin et la composition', 2);
insert into contenir values (119, 120);
insert into appartenance_serie values (120, 3, 62);
insert into auteuriser values (7, 120, 'Scénario');
insert into auteuriser values (8, 120, 'Dessin');
-- ================================
-- 63|Père Noël et compagnie|Vaillant||12 1962|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (120, 'Père Noël et compagnie', 2);
insert into album_sans_collection values (120, 5);
insert into histoire values (121, 'Père Noël et compagnie', 2);
insert into contenir values (120, 121);
insert into appartenance_serie values (121, 3, 63);
insert into auteuriser values (7, 121, 'Scénario');
insert into auteuriser values (8, 121, 'Dessin');
-- ================================
-- 64|Sports d'hiver|Vaillant||01 1963|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (121, 'Sports d'hiver', 3);
insert into album_sans_collection values (121, 5);
insert into histoire values (122, 'Sports d'hiver', 3);
insert into contenir values (121, 122);
insert into appartenance_serie values (122, 3, 64);
insert into auteuriser values (7, 122, 'Scénario');
insert into auteuriser values (8, 122, 'Dessin');
-- ================================
-- 65|Pipolin et la faim sans fin|Vaillant||02 1963|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (122, 'Pipolin et la faim sans fin', 3);
insert into album_sans_collection values (122, 5);
insert into histoire values (123, 'Pipolin et la faim sans fin', 3);
insert into contenir values (122, 123);
insert into appartenance_serie values (123, 3, 65);
insert into auteuriser values (7, 123, 'Scénario');
insert into auteuriser values (8, 123, 'Dessin');
-- ================================
-- 66|Pipolin fait du nettoyage|Vaillant||03 1963|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (123, 'Pipolin fait du nettoyage', 3);
insert into album_sans_collection values (123, 5);
insert into histoire values (124, 'Pipolin fait du nettoyage', 3);
insert into contenir values (123, 124);
insert into appartenance_serie values (124, 3, 66);
insert into auteuriser values (7, 124, 'Scénario');
insert into auteuriser values (8, 124, 'Dessin');
-- ================================
-- 67|sans titre|Vaillant||04 1963|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (124, 'sans titre', 3);
insert into album_sans_collection values (124, 5);
insert into histoire values (125, 'sans titre', 3);
insert into contenir values (124, 125);
insert into appartenance_serie values (125, 3, 67);
insert into auteuriser values (7, 125, 'Scénario');
insert into auteuriser values (8, 125, 'Dessin');
-- ================================
-- 68|sans titre|Vaillant||05 1963|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (125, 'sans titre', 3);
insert into album_sans_collection values (125, 5);
insert into histoire values (126, 'sans titre', 3);
insert into contenir values (125, 126);
insert into appartenance_serie values (126, 3, 68);
insert into auteuriser values (7, 126, 'Scénario');
insert into auteuriser values (8, 126, 'Dessin');
-- ================================
-- 69|sans titre|Vaillant||06 1963|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (126, 'sans titre', 3);
insert into album_sans_collection values (126, 5);
insert into histoire values (127, 'sans titre', 3);
insert into contenir values (126, 127);
insert into appartenance_serie values (127, 3, 69);
insert into auteuriser values (7, 127, 'Scénario');
insert into auteuriser values (8, 127, 'Dessin');
-- ================================
-- 70|sans titre|Vaillant||07 1963|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (127, 'sans titre', 3);
insert into album_sans_collection values (127, 5);
insert into histoire values (128, 'sans titre', 3);
insert into contenir values (127, 128);
insert into appartenance_serie values (128, 3, 70);
insert into auteuriser values (7, 128, 'Scénario');
insert into auteuriser values (8, 128, 'Dessin');
-- ================================
-- 71|sans titre|Vaillant||08 1963|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (128, 'sans titre', 3);
insert into album_sans_collection values (128, 5);
insert into histoire values (129, 'sans titre', 3);
insert into contenir values (128, 129);
insert into appartenance_serie values (129, 3, 71);
insert into auteuriser values (7, 129, 'Scénario');
insert into auteuriser values (8, 129, 'Dessin');
-- ================================
-- 72|Pipolin cordon bleu|Vaillant||09 1963|Scénario : Gilda Teixeira Coelho - Dessin : Eduardo Coelho
insert into volume values (129, 'Pipolin cordon bleu', 3);
insert into album_sans_collection values (129, 5);
insert into histoire values (130, 'Pipolin cordon bleu', 3);
insert into contenir values (129, 130);
insert into appartenance_serie values (130, 3, 72);
insert into auteuriser values (7, 130, 'Scénario');
insert into auteuriser values (8, 130, 'Dessin');
-- ================================
