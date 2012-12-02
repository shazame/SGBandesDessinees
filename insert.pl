use 5.014;
use strict;
use warnings;

my $nre = qr/[\s\w,\-'"!\?\.éèêëàâäîïùüûöôçÉÈÊËÀÂÄÎÏÙÜÛÖÔÇ]*/;

my $no_serie      = 1;
my $no_collection = 1;
my $no_volume     = 1;
my $no_histoire   = 1;

my %auteurs;

my $serie;       # current serie
my $collection;  # current collection

while (<>) {
	print;
	chomp;

	if (/^serie ($nre)/) {
		$serie = $1;
		print "insert into series ($no_serie, '$serie')\n";
		++$no_serie;
	}

	if (/^collection ($nre) ($nre)/) {

		chk_editeur($2);

		$collection = $1;
		print "insert into collection ($no_collection, '$collection')\n";
		++$no_collection;
	}

	#no_serie|titre|editeur|ville|mois annee|Scenario : nom - Dessin : nom ...
	elsif (/^(\d+)\|($nre)\|($nre)\|$nre\|$nre(\d+)\|(.*)/) {

		print "insert into volume values ($1, '$2', $4);\n";

		my $no_editeur = chk_editeur($3);
		print "insert into album_sans_collection values ("
			. "$no_volume, "
			. "$no_editeur"
			. ");\n";

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


{	my %editeurs;
	my $no_editeur = 0;

	sub chk_editeur {
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
	my $no_auteur = 0;

	sub chk_auteur {
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
