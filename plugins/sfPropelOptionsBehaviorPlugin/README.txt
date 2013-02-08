Plugin Options Behavior

Ce plugin permet d'ajouter le a des objets des options
Ces dernieres sont stockées dans une table (plugin_options_behavior)
sous la forme d'une clé (index) et d'une valeur (value)

pour manipuler ces options les methodes suivantes sont disponibles
	Fonctions				Detail
addOption				Ajoute une option
getOption				Retourne une option suivant sa clé
hasOption				Vrai si l'objet possede cette option
removeAllOptions			Supprime toute les options
removeOption				Supprime l'option correspondant a la clé
replaceOption				Remplace l'option par ca nouvelle valeur
setOptions				Ajoute une liste d'options
getOptions				Retourne toutes les options
setOptionsEdit				Fonction de recuperation des parametres
postSave				Methode pour la sauvegarde des options
postDelete				Methode pour la suppression des options

TODO
 - Liste d'option obligatoire
 - Flag pour evité qu'on execute une nouvelle requete au load si l'objet n'a pas d'options //fait