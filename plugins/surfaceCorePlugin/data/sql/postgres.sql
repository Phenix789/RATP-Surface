-- Nécessite l'installation du langage plperlu :
-- $ createlang plperlu <nom_base>; 

CREATE OR REPLACE FUNCTION unaccent_string(text) RETURNS text AS $$
	my ($input_string) = @_;

	$input_string =~ s/[àáâãäå]/a/;
	$input_string =~ s/[ÀÁÂÃÄÅ]/A/;
	$input_string =~ s/[èéêë]/e/;
	$input_string =~ s/[ÈÉÊË]/E/;
	$input_string =~ s/[ìíîï]/i/;
	$input_string =~ s/[ÌÍÎÏ]/I/;
	$input_string =~ s/[òóôõö]/o/;
	$input_string =~ s/[ÒÓÔÕÖ]/O/;
	$input_string =~ s/[ùúûü]/u/;
	$input_string =~ s/[ÙÚÛÜ]/U/;
	$input_string =~ s/[Ý]/Y/;
	$input_string =~ s/[ç]/c/;
	$input_string =~ s/[Ç]/C/;
	$input_string =~ s/[æ]/ae/;
	$input_string =~ s/[Æ]/AE/;
	$input_string =~ s/[œ]/oe/;
	$input_string =~ s/[Œ]/OE/;
	$input_string =~ s/[ñ]/n/;
	
	return $input_string;
$$ LANGUAGE plperlu;