use 5.010;
use strict;
use warnings;



{	my %editeurs;
	my $no_editeur;

	sub chk_editeur ($) {
		my $nom = shift;

		unless (exists $editeurs{$nom}) {
			$no_editeur++;
			$editeurs{$nom} = $no_editeur;
			print "insert into editeur(nom_editeur) "
				. "values('$nom')\n";
		}

		return $editeurs{$nom};
	}
}


{	my %auteurs;
	my $no_auteur;

	sub chk_auteur ($) {
		my $nom_complet = shift;

		unless (exists $auteurs{$nom_complet}) {
			$no_auteur++;

			my ($n, $pn) = split(/\s/, $nom_complet);
			
			unless (defined $n) {
				warn "Pas de nom pour l'auteur?";
				return undef;
			}

			$auteurs{$nom_complet}->{nom   } = $n;
			$auteurs{$nom_complet}->{prenom} = $pn // "";
			$auteurs{$nom_complet}->{no    } = $no_auteur;

			if ($pn) {
				print "insert into auteur(nom_auteur, prenom_auteur) "
					. "values ("
					. "'$auteurs{$nom_complet}->{nom}', "
					. "'$auteurs{$nom_complet}->{prenom}');\n";
			} else {
				print "insert into auteur(nom_auteur) "
					. "values ('$auteurs{$nom_complet}->{nom}');\n";
			}
		}

		return $auteurs{$nom_complet};
	}
}


#{	my %collections;
#	my $no_collection;
#
#	sub chk_collection ($$) {
#		my ($nom, $editeur) = @_;
#
#		unless (exists $collections{$nom}) {
#			$no_collection++;
#
#			$collections{$nom}->{no} = $no_collection;
#			$collections{$nom}->{no_volume} = 1;
#			$collections{$nom}->{no_editeur} = chk_editeur($editeur);
#
#			print "insert into collection values ("
#				. "$collections{$nom}->{no}, "
#				. "'$nom', "
#				. "$collections{$nom}->{no_editeur});\n";
#		}
#
#		return $collections{$nom};
#	}
#}

{	my %series;
	my $no_serie;

	sub chk_serie ($) {
		my ($nom) = @_;

		unless (exists $series{$nom}) {
			$no_serie++;

			$series{$nom}->{no} = $no_serie;

			print "insert into serie(nom_serie) values ('$nom');\n";
		}

		return $series{$nom};
	}
}


my $no_volume     = 0;
my $no_histoire   = 0;
my $serie         = undef;
my $collection    = undef;

my $nre = qr/[\s\w,\-'"!\?\.éèêëàâäîïùüûöôçÉÈÊËÀÂÄÎÏÙÜÛÖÔÇ]*/;

while (<>) {
	print "-- $_";
	chomp;

	if (/^serie ($nre)$/) {
		$serie = chk_serie($1);
	}

	elsif (/^noserie$/) {
		$serie = undef;
	}

	#no_serie|titre|editeur|ville|mois annee|Scenario : nom - Dessin : nom ...
	elsif (/^(\d+)\|($nre)\|($nre)\|$nre\|$nre(\d+)\|(.*)/) {

		++$no_volume;
		print "insert into volume(titre, anee_edition) "
			. "values ('$2', $4);\n";

		#my $no_editeur = chk_editeur($3);

		#if (defined $collection) {
		#	if ($collection->{no_editeur} == $no_editeur) {
		#		$collection->{no_volume}++;
		#		print "insert into album_avec_collection values ("
		#			. "$no_volume, "
		#			. "$collection->{no},"
		#			. "$collection->{no_volume}"
		#			. ");\n";
		#	} else {
		#		$collection = undef;
		#	}
		#} else {
		#	print "insert into album_sans_collection values ("
		#		. "$no_volume, "
		#		. "$no_editeur"
		#		. ");\n";
		#}

		# les histoires
		for (split(/ - /, $2)) {
			++$no_histoire;
			print "insert into histoire values ($no_histoire, '$_', $4);\n";
			print "insert into contenir values ($no_volume, $no_histoire);\n";

			if (defined $serie) {
				print "insert into appartenance_serie values ("
					. "$no_histoire, $serie->{no}, $1);\n";
			}

			# les auteurs
			for (split(/ - /, $5)) {
				my ($role, $nom) = split(/ : /, $_);
				my $no_auteur = chk_auteur($nom)->{no};
				print "insert into auteuriser values ($no_auteur, $no_histoire, '$role');\n";
			}
		}
	}

	print "-- ================================\n";
} 

