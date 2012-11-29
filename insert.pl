use 5.010;
use strict;
use warnings;

my $nre = qr/[\s\w,\-'éèêëàâäîïùüûç]+/;

my $no_serie = 0;
my $no_auteur = 0;
my $no_editeur = 0;
my $no_volume = 0;
my $no_histoire = 0;

my %auteurs;
my %editeurs;
my %collections;

while (<>) {
	print;
	chomp;

	if (/^serie ($nre)$/) {
		print "insert into series ($no_serie, '$1')\n";
		++$no_serie;
	}

	#no_serie titre| editeur| ville| mois annee Scenario : nom - Dessin : nom
	elsif (/^(\d+) ($nre)\| ($nre)\| \w+\| \w+ (\d+) (.*)/) {

		print "insert into volume values ($1, '$2', $4);\n";

		unless (exists $editeurs{$3}) {
			$editeurs{$3} = $no_editeur;
			print "insert into editeur values($no_editeur, '$3')\n";
			$no_editeur++;
		}

		print "insert into album_sans_collection values ("
			. "$no_volume, "
			. "$editeurs{$3}"
			. ");\n";

		# les histoires
		for (split(/ - /, $2)) {
			print "insert into histoire values ($no_histoire, '$_', $4);\n";
			++$no_histoire;

			# les auteurs
			for (split(/ - /, $5)) {
				my ($role, $nom) = split(/ : /, $_);

				unless (exists $auteurs{$nom}) {
					my ($n, $pn) = split(/\s/, $nom);
					$auteurs{$nom}->{nom   } = $n;
					$auteurs{$nom}->{prenom} = $pn;
					$auteurs{$nom}->{no    } = $no_auteur++;
					print "insert into auteur values ("
						. "$auteurs{$nom}->{no}, "
						. "$auteurs{$nom}->{nom}, "
						. "$auteurs{$nom}->{prenom});\n";
				}

				my $no = $auteurs{$nom}->{no};
				print "insert into auteuriser values ($no, $no_histoire, $role);\n";
			}
		}
	}

	print "================================\n";
} 

