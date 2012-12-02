use 5.014;
use strict;
use warnings;



{	my %editeurs;
	my $no_editeur;

	sub chk_editeur ($) {
		my $nom = shift;

		unless (exists $editeurs{$nom}) {
			$no_editeur++;
			$editeurs{$nom} = $no_editeur;
			print "insert into editeur values($no_editeur, '$nom')\n";
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

			print "insert into auteur values ("
				. "$auteurs{$nom_complet}->{no}, "
				. "$auteurs{$nom_complet}->{nom}, "
				. "$auteurs{$nom_complet}->{prenom});\n";
		}

		return $auteurs{$nom_complet};
	}
}


{	my %collections;
	my $no_collection;

	sub chk_collection ($$) {
		my ($nom, $editeur) = @_;

		unless (exists $collections{$nom}) {
			$no_collection++;

			$collections{$nom}->{no} = $no_collection;
			$collections{$nom}->{no_volume} = 1;
			$collections{$nom}->{no_editeur} = chk_editeur($editeur);

			print "insert into collectio values ("
				. "$collections{$nom}->{no}, "
				. "'$nom', "
				. "$collections{$nom}->{no_editeur});\n";
		}

		return $collections{$nom};
	}
}



my $no_serie      = 0;
my $no_volume     = 0;
my $no_histoire   = 0;
my $collection    = undef;

my $nre = qr/[\s\w,\-'"!\?\.éèêëàâäîïùüûöôçÉÈÊËÀÂÄÎÏÙÜÛÖÔÇ]*/;

while (<>) {
	print;
	chomp;

	if (/^serie ($nre)/) {
		$no_serie++;
		print "insert into series ($no_serie, '$1')\n";
	}

	if (/^collection ($nre) ($nre)/) {
		$collection = chk_collection($2, $3);
	}

	#no_serie|titre|editeur|ville|mois annee|Scenario : nom - Dessin : nom ...
	elsif (/^(\d+)\|($nre)\|($nre)\|$nre\|$nre(\d+)\|(.*)/) {

		print "insert into volume values ($1, '$2', $4);\n";

		my $no_editeur = chk_editeur($3);

		if (defined $collection) {
			if ($collection->{no_editeur} == $no_editeur) {
				$collection->{no_volume}++;
				print "insert into album_avec_collection values ("
					. "$no_volume, "
					. "$collection->{no},"
					. "$collection->{no_volume}"
					. ");\n";
			} else {
				$collection = undef;
			}
		} else {
			print "insert into album_sans_collection values ("
				. "$no_volume, "
				. "$no_editeur"
				. ");\n";
			}

		# les histoires
		for (split(/ - /, $2)) {
			print "insert into histoire values ($no_histoire, '$_', $4);\n";
			++$no_histoire;

			# les auteurs
			for (split(/ - /, $5)) {
				my ($role, $nom) = split(/ : /, $_);
				my $no_auteur = chk_auteur($nom)->{no};
				print "insert into auteuriser values ($no_auteur, $no_histoire, $role);\n";
			}
		}
	}

	print "================================\n";
} 

