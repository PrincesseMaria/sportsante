<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('sr_Latn', array (
  'validators' => 
  array (
    'This value should be false.' => 'Vrednost treba da bude netačna.',
    'This value should be true.' => 'Vrednost treba da bude tačna.',
    'This value should be of type {{ type }}.' => 'Vrednost treba da bude tipa {{ type }}.',
    'This value should be blank.' => 'Vrednost treba da bude prazna.',
    'The value you selected is not a valid choice.' => 'Vrednost treba da bude jedna od ponuđenih.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Izaberite bar {{ limit }} mogućnost.|Izaberite bar {{ limit }} mogućnosti.|Izaberite bar {{ limit }} mogućnosti.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Izaberite najviše {{ limit }} mogućnost.|Izaberite najviše {{ limit }} mogućnosti.|Izaberite najviše {{ limit }} mogućnosti.',
    'One or more of the given values is invalid.' => 'Jedna ili više vrednosti je nevalidna.',
    'This field was not expected.' => 'Ovo polje ne očekuje.',
    'This field is missing.' => 'Ovo polje nedostaje.',
    'This value is not a valid date.' => 'Vrednost nije validan datum.',
    'This value is not a valid datetime.' => 'Vrednost nije validan datum-vreme.',
    'This value is not a valid email address.' => 'Vrednost nije validna adresa elektronske pošte.',
    'The file could not be found.' => 'Datoteka ne može biti pronađena.',
    'The file is not readable.' => 'Datoteka nije čitljiva.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Datoteka je prevelika ({{ size }} {{ suffix }}). Najveća dozvoljena veličina je {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Mime tip datoteke nije validan ({{ type }}). Dozvoljeni mime tipovi su {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Vrednost treba da bude {{ limit }} ili manje.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Vrednost je predugačka. Treba da ima {{ limit }} karakter ili manje.|Vrednost je predugačka. Treba da ima {{ limit }} karaktera ili manje.|Vrednost je predugačka. Treba da ima {{ limit }} karaktera ili manje.',
    'This value should be {{ limit }} or more.' => 'Vrednost treba da bude {{ limit }} ili više.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Vrednost je prekratka. Treba da ima {{ limit }} karakter ili više.|Vrednost je prekratka. Treba da ima {{ limit }} karaktera ili više.|Vrednost je prekratka. Treba da ima {{ limit }} karaktera ili više.',
    'This value should not be blank.' => 'Vrednost ne treba da bude prazna.',
    'This value should not be null.' => 'Vrednost ne treba da bude null.',
    'This value should be null.' => 'Vrednost treba da bude null.',
    'This value is not valid.' => 'Vrednost je nevalidna.',
    'This value is not a valid time.' => 'Vrednost nije validno vreme.',
    'This value is not a valid URL.' => 'Vrednost nije validan URL.',
    'The two values should be equal.' => 'Obe vrednosti treba da budu jednake.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Datoteka je prevelika. Najveća dozvoljena veličina je {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Datoteka je prevelika.',
    'The file could not be uploaded.' => 'Datoteka ne može biti otpremljena.',
    'This value should be a valid number.' => 'Vrednost treba da bude validan broj.',
    'This file is not a valid image.' => 'Ova datoteka nije validna slika.',
    'This is not a valid IP address.' => 'Ovo nije validna IP adresa.',
    'This value is not a valid language.' => 'Vrednost nije validan jezik.',
    'This value is not a valid locale.' => 'Vrednost nije validan lokal.',
    'This value is not a valid country.' => 'Vrednost nije validna zemlja.',
    'This value is already used.' => 'Vrednost je već iskorišćena.',
    'The size of the image could not be detected.' => 'Veličina slike ne može biti određena.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'Širina slike je prevelika ({{ width }}px). Najeća dozvoljena širina je {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'Širina slike je premala ({{ width }}px). Najmanja dozvoljena širina je {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'Visina slike je prevelika ({{ height }}px). Najeća dozvoljena visina je {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'Visina slike je premala ({{ height }}px). Najmanja dozvoljena visina je {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Vrednost treba da bude trenutna korisnička lozinka.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Vrednost treba da ima tačno {{ limit }} karakter.|Vrednost treba da ima tačno {{ limit }} karaktera.|Vrednost treba da ima tačno {{ limit }} karaktera.',
    'The file was only partially uploaded.' => 'Datoteka je samo parcijalno otpremljena.',
    'No file was uploaded.' => 'Datoteka nije otpremljena.',
    'No temporary folder was configured in php.ini.' => 'Privremeni direktorijum nije konfigurisan u php.ini.',
    'Cannot write temporary file to disk.' => 'Nemoguće pisanje privremene datoteke na disk.',
    'A PHP extension caused the upload to fail.' => 'PHP ekstenzija je prouzrokovala neuspeh otpremanja datoteke.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Ova kolekcija treba da sadrži {{ limit }} ili više elemenata.|Ova kolekcija treba da sadrži {{ limit }} ili više elemenata.|Ova kolekcija treba da sadrži {{ limit }} ili više elemenata.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Ova kolekcija treba da sadrži {{ limit }} ili manje elemenata.|Ova kolekcija treba da sadrži {{ limit }} ili manje elemenata.|Ova kolekcija treba da sadrži {{ limit }} ili manje elemenata.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Ova kolekcija treba da sadrži tačno {{ limit }} element.|Ova kolekcija treba da sadrži tačno {{ limit }} elementa.|Ova kolekcija treba da sadrži tačno {{ limit }} elemenata.',
    'Invalid card number.' => 'Nevalidan broj kartice.',
    'Unsupported card type or invalid card number.' => 'Nevalidan broj kartice ili tip kartice nije podržan.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Ovo nije validan međunarodni broj bankovnog računa (IBAN).',
    'This value is not a valid ISBN-10.' => 'Ovo nije validan ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Ovo nije validan ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Ovo nije validan ISBN-10 ili ISBN-13.',
    'This value is not a valid ISSN.' => 'Ovo nije validan ISSN.',
    'This value is not a valid currency.' => 'Ovo nije validna valuta.',
    'This value should be equal to {{ compared_value }}.' => 'Ova vrednost treba da bude {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Ova vrednost treba da bude veća od {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Ova vrednost treba da bude veća ili jednaka {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Ova vrednost treba da bude identična sa {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Ova vrednost treba da bude manja od {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Ova vrednost treba da bude manja ili jednaka {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Ova vrednost ne treba da bude jednaka {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Ova vrednost ne treba da bude identična sa {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Razmera ove slike je prevelika ({{ ratio }}). Maksimalna dozvoljena razmera je {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Razmera ove slike je premala ({{ ratio }}). Minimalna očekivana razmera je {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'Slika je kvadratna ({{ width }}x{{ height }}px). Kvadratne slike nisu dozvoljene.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'Slika je orijentacije pejzaža ({{ width }}x{{ height }}px). Pejzažna orijentacija slika nije dozvoljena.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'Slika je orijantacije portreta ({{ width }}x{{ height }}px). Portretna orijentacija slika nije dozvoljena.',
    'This form should not contain extra fields.' => 'Ovaj formular ne treba da sadrži dodatna polja.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Otpremljena datoteka je bila prevelika. Molim pokušajte otpremanje manje datoteke.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'CSRF vrednost je nevalidna. Pokušajte ponovo.',
    'fos_user.username.already_used' => 'Korisničko ime već postoji.',
    'fos_user.username.blank' => 'Molimo, unesite korisničko ime.',
    'fos_user.username.short' => 'Korisničko ime je prekratko.',
    'fos_user.username.long' => 'Korisničko ime je predugo.',
    'fos_user.email.already_used' => 'Adresa e-pošte već postoji.',
    'fos_user.email.blank' => 'Molimo, unesite adresu e-pošte.',
    'fos_user.email.short' => 'Adresa e-pošte je prekratka.',
    'fos_user.email.long' => 'Adresa e-pošte je preduga.',
    'fos_user.email.invalid' => 'Adresa e-pošte nije validna.',
    'fos_user.password.blank' => 'Molimo, unesite lozinku.',
    'fos_user.password.short' => 'Lozinka je prekratka.',
    'fos_user.new_password.blank' => 'Molimo, unesite novu lozinku.',
    'fos_user.new_password.short' => 'Nova lozinka je prekratka.',
    'fos_user.current_password.invalid' => 'Lozinka nije validna.',
    'fos_user.group.blank' => 'Molimo unesite naziv.',
    'fos_user.group.short' => 'Naziv je prekratak.',
    'fos_user.group.long' => 'Naziv je predug.',
    'fos_group.name.already_used' => 'Ovo ime već postoji.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Izuzetak pri autentifikaciji.',
    'Authentication credentials could not be found.' => 'Autentifikacioni podaci nisu pronađeni.',
    'Authentication request could not be processed due to a system problem.' => 'Zahtev za autentifikaciju ne može biti obrađen zbog sistemskih problema.',
    'Invalid credentials.' => 'Nevalidni podaci za autentifikaciju.',
    'Cookie has already been used by someone else.' => 'Kolačić je već iskorišćen od strane nekog drugog.',
    'Not privileged to request the resource.' => 'Nemate prava pristupa ovom resursu.',
    'Invalid CSRF token.' => 'Nevalidan CSRF token.',
    'Digest nonce has expired.' => 'Vreme kriptografskog ključa je isteklo.',
    'No authentication provider found to support the authentication token.' => 'Autentifikacioni provajder za podršku tokena nije pronađen.',
    'No session available, it either timed out or cookies are not enabled.' => 'Sesija nije dostupna, istekla je ili su kolačići isključeni.',
    'No token could be found.' => 'Token ne može biti pronađen.',
    'Username could not be found.' => 'Korisničko ime ne može biti pronađeno.',
    'Account has expired.' => 'Nalog je istekao.',
    'Credentials have expired.' => 'Podaci za autentifikaciju su istekli.',
    'Account is disabled.' => 'Nalog je onemogućen.',
    'Account is locked.' => 'Nalog je zaključan.',
  ),
  'FOSUserBundle' => 
  array (
    'group.edit.submit' => 'Ažuriraj grupu',
    'group.show.name' => 'Naziv grupe',
    'group.new.submit' => 'Kreiraj grupu',
    'group.flash.updated' => 'Grupa je ažurirana.',
    'group.flash.created' => 'Grupa je kreirana.',
    'group.flash.deleted' => 'Grupa je obrisana.',
    'security.login.username' => 'Korisničko ime',
    'security.login.password' => 'Lozinka',
    'security.login.remember_me' => 'Zapamti me',
    'security.login.submit' => 'Prijavi se',
    'profile.show.username' => 'Korisničko ime',
    'profile.show.email' => 'Adresa e-pošte',
    'profile.edit.submit' => 'Ažuriraj',
    'profile.flash.updated' => 'Profil je ažuriran.',
    'change_password.submit' => 'Izmeni lozinku',
    'change_password.flash.success' => 'Lozinka je izmenjena.',
    'registration.check_email' => 'Poruka je poslata na adresu %email%. Ona sadrži aktivacioni link koji morate kliknuti da bi aktivirali Vaš nalog.',
    'registration.confirmed' => 'Čestitamo %username%, Vaš nalog je sada aktivan.',
    'registration.back' => 'Nazad na prethodnu stranu.',
    'registration.submit' => 'Registruj se',
    'registration.flash.user_created' => 'Korisnički nalog je uspešno kreiran.',
    'registration.email.subject' => 'Dobrodošli %username%!',
    'registration.email.message' => 'Zdravo %username%!

Da bi aktivirali Vaš nalog posetite %confirmationUrl%

Ovaj link možete upotrebiti samo jednom da biste potvrdili Vaš nalog.

S poštovanjem,
tim sajta.
',
    'resetting.check_email' => 'Poruka je poslata na adresu %email%. Ona sadrži link koji morate kliknuti da bi resetovali Vašu lozinku.',
    'resetting.request.username' => 'Korisničko ime ili adresa e-pošte',
    'resetting.request.submit' => 'Resetuj lozinku',
    'resetting.reset.submit' => 'Izmeni lozinku',
    'resetting.flash.success' => 'Lozinka je uspešno resetovana.',
    'resetting.email.subject' => 'Resetovanje lozinke',
    'resetting.email.message' => 'Zdravo %username%!

Da bi resetovali Vašu lozinku posetite %confirmationUrl%

S poštovanjem,
tim sajta.
',
    'layout.logout' => 'Odjavljivanje',
    'layout.login' => 'Prijavljivanje',
    'layout.register' => 'Registracija',
    'layout.logged_in_as' => 'Prijavljen kao %username%',
    'form.group_name' => 'Naziv grupe',
    'form.username' => 'Korisničko ime',
    'form.email' => 'Adresa e-pošte',
    'form.current_password' => 'Trenutna lozinka',
    'form.password' => 'Lozinka',
    'form.password_confirmation' => 'Potvrda lozinke',
    'form.new_password' => 'Nova lozinka',
    'form.new_password_confirmation' => 'Potvrda lozinke',
  ),
));

$catalogueSr = new MessageCatalogue('sr', array (
));
$catalogue->addFallbackCatalogue($catalogueSr);
$catalogueFr = new MessageCatalogue('fr', array (
  'validators' => 
  array (
    'This value should be false.' => 'Cette valeur doit être fausse.',
    'This value should be true.' => 'Cette valeur doit être vraie.',
    'This value should be of type {{ type }}.' => 'Cette valeur doit être de type {{ type }}.',
    'This value should be blank.' => 'Cette valeur doit être vide.',
    'The value you selected is not a valid choice.' => 'Cette valeur doit être l\'un des choix proposés.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Vous devez sélectionner au moins {{ limit }} choix.|Vous devez sélectionner au moins {{ limit }} choix.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Vous devez sélectionner au maximum {{ limit }} choix.|Vous devez sélectionner au maximum {{ limit }} choix.',
    'One or more of the given values is invalid.' => 'Une ou plusieurs des valeurs soumises sont invalides.',
    'This field was not expected.' => 'Ce champ n\'a pas été prévu.',
    'This field is missing.' => 'Ce champ est manquant.',
    'This value is not a valid date.' => 'Cette valeur n\'est pas une date valide.',
    'This value is not a valid datetime.' => 'Cette valeur n\'est pas une date valide.',
    'This value is not a valid email address.' => 'Cette valeur n\'est pas une adresse email valide.',
    'The file could not be found.' => 'Le fichier n\'a pas été trouvé.',
    'The file is not readable.' => 'Le fichier n\'est pas lisible.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Le fichier est trop volumineux ({{ size }} {{ suffix }}). Sa taille ne doit pas dépasser {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Le type du fichier est invalide ({{ type }}). Les types autorisés sont {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Cette valeur doit être inférieure ou égale à {{ limit }}.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Cette chaine est trop longue. Elle doit avoir au maximum {{ limit }} caractère.|Cette chaine est trop longue. Elle doit avoir au maximum {{ limit }} caractères.',
    'This value should be {{ limit }} or more.' => 'Cette valeur doit être supérieure ou égale à {{ limit }}.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Cette chaine est trop courte. Elle doit avoir au minimum {{ limit }} caractère.|Cette chaine est trop courte. Elle doit avoir au minimum {{ limit }} caractères.',
    'This value should not be blank.' => 'Cette valeur ne doit pas être vide.',
    'This value should not be null.' => 'Cette valeur ne doit pas être nulle.',
    'This value should be null.' => 'Cette valeur doit être nulle.',
    'This value is not valid.' => 'Cette valeur n\'est pas valide.',
    'This value is not a valid time.' => 'Cette valeur n\'est pas une heure valide.',
    'This value is not a valid URL.' => 'Cette valeur n\'est pas une URL valide.',
    'The two values should be equal.' => 'Les deux valeurs doivent être identiques.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Le fichier est trop volumineux. Sa taille ne doit pas dépasser {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Le fichier est trop volumineux.',
    'The file could not be uploaded.' => 'Le téléchargement de ce fichier est impossible.',
    'This value should be a valid number.' => 'Cette valeur doit être un nombre.',
    'This file is not a valid image.' => 'Ce fichier n\'est pas une image valide.',
    'This is not a valid IP address.' => 'Cette adresse IP n\'est pas valide.',
    'This value is not a valid language.' => 'Cette langue n\'est pas valide.',
    'This value is not a valid locale.' => 'Ce paramètre régional n\'est pas valide.',
    'This value is not a valid country.' => 'Ce pays n\'est pas valide.',
    'This value is already used.' => 'Cette valeur est déjà utilisée.',
    'The size of the image could not be detected.' => 'La taille de l\'image n\'a pas pu être détectée.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'La largeur de l\'image est trop grande ({{ width }}px). La largeur maximale autorisée est de {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'La largeur de l\'image est trop petite ({{ width }}px). La largeur minimale attendue est de {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'La hauteur de l\'image est trop grande ({{ height }}px). La hauteur maximale autorisée est de {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'La hauteur de l\'image est trop petite ({{ height }}px). La hauteur minimale attendue est de {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Cette valeur doit être le mot de passe actuel de l\'utilisateur.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Cette chaine doit avoir exactement {{ limit }} caractère.|Cette chaine doit avoir exactement {{ limit }} caractères.',
    'The file was only partially uploaded.' => 'Le fichier a été partiellement transféré.',
    'No file was uploaded.' => 'Aucun fichier n\'a été transféré.',
    'No temporary folder was configured in php.ini.' => 'Aucun répertoire temporaire n\'a été configuré dans le php.ini.',
    'Cannot write temporary file to disk.' => 'Impossible d\'écrire le fichier temporaire sur le disque.',
    'A PHP extension caused the upload to fail.' => 'Une extension PHP a empêché le transfert du fichier.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Cette collection doit contenir {{ limit }} élément ou plus.|Cette collection doit contenir {{ limit }} éléments ou plus.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Cette collection doit contenir {{ limit }} élément ou moins.|Cette collection doit contenir {{ limit }} éléments ou moins.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Cette collection doit contenir exactement {{ limit }} élément.|Cette collection doit contenir exactement {{ limit }} éléments.',
    'Invalid card number.' => 'Numéro de carte invalide.',
    'Unsupported card type or invalid card number.' => 'Type de carte non supporté ou numéro invalide.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Le numéro IBAN (International Bank Account Number) saisi n\'est pas valide.',
    'This value is not a valid ISBN-10.' => 'Cette valeur n\'est pas un code ISBN-10 valide.',
    'This value is not a valid ISBN-13.' => 'Cette valeur n\'est pas un code ISBN-13 valide.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Cette valeur n\'est ni un code ISBN-10, ni un code ISBN-13 valide.',
    'This value is not a valid ISSN.' => 'Cette valeur n\'est pas un code ISSN valide.',
    'This value is not a valid currency.' => 'Cette valeur n\'est pas une devise valide.',
    'This value should be equal to {{ compared_value }}.' => 'Cette valeur doit être égale à {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Cette valeur doit être supérieure à {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Cette valeur doit être supérieure ou égale à {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Cette valeur doit être identique à {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Cette valeur doit être inférieure à {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Cette valeur doit être inférieure ou égale à {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Cette valeur ne doit pas être égale à {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Cette valeur ne doit pas être identique à {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Le rapport largeur/hauteur de l\'image est trop grand ({{ ratio }}). Le rapport maximal autorisé est {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Le rapport largeur/hauteur de l\'image est trop petit ({{ ratio }}). Le rapport minimal attendu est {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'L\'image est carrée ({{ width }}x{{ height }}px). Les images carrées ne sont pas autorisées.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'L\'image est au format paysage ({{ width }}x{{ height }}px). Les images au format paysage ne sont pas autorisées.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'L\'image est au format portrait ({{ width }}x{{ height }}px). Les images au format portrait ne sont pas autorisées.',
    'An empty file is not allowed.' => 'Un fichier vide n\'est pas autorisé.',
    'The host could not be resolved.' => 'Le nom de domaine n\'a pas pu être résolu.',
    'This value does not match the expected {{ charset }} charset.' => 'Cette valeur ne correspond pas au jeu de caractères {{ charset }} attendu.',
    'This is not a valid Business Identifier Code (BIC).' => 'Ce n\'est pas un code universel d\'identification des banques (BIC) valide.',
    'This form should not contain extra fields.' => 'Ce formulaire ne doit pas contenir des champs supplémentaires.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Le fichier téléchargé est trop volumineux. Merci d\'essayer d\'envoyer un fichier plus petit.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'Le jeton CSRF est invalide. Veuillez renvoyer le formulaire.',
    'fos_user.username.already_used' => 'Le nom d\'utilisateur est déjà utilisé.',
    'fos_user.username.blank' => 'Entrez un nom d\'utilisateur s\'il vous plait.',
    'fos_user.username.short' => 'Le nom d\'utilisateur est trop court.',
    'fos_user.username.long' => 'Le nom d\'utilisateur est trop long.',
    'fos_user.email.already_used' => 'L\'adresse e-mail est déjà utilisée.',
    'fos_user.email.blank' => 'Entrez une adresse e-mail s\'il vous plait.',
    'fos_user.email.short' => 'L\'adresse e-mail est trop courte.',
    'fos_user.email.long' => 'L\'adresse e-mail est trop longue.',
    'fos_user.email.invalid' => 'L\'adresse e-mail est invalide.',
    'fos_user.password.blank' => 'Entrez un mot de passe s\'il vous plait.',
    'fos_user.password.short' => 'Le mot de passe est trop court.',
    'fos_user.password.mismatch' => 'Les deux mots de passe ne sont pas identiques.',
    'fos_user.new_password.blank' => 'Entrez un nouveau mot de passe s\'il vous plait.',
    'fos_user.new_password.short' => 'Le nouveau mot de passe est trop court.',
    'fos_user.current_password.invalid' => 'Le mot de passe est invalide.',
    'fos_user.group.blank' => 'Entrez un nom s\'il vous plait.',
    'fos_user.group.short' => 'Le nom est trop court.',
    'fos_user.group.long' => 'Le nom est trop long.',
    'fos_group.name.already_used' => 'Le nom est déjà utilisé.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Une exception d\'authentification s\'est produite.',
    'Authentication credentials could not be found.' => 'Les identifiants d\'authentification n\'ont pas pu être trouvés.',
    'Authentication request could not be processed due to a system problem.' => 'La requête d\'authentification n\'a pas pu être executée à cause d\'un problème système.',
    'Invalid credentials.' => 'Identifiants invalides.',
    'Cookie has already been used by someone else.' => 'Le cookie a déjà été utilisé par quelqu\'un d\'autre.',
    'Not privileged to request the resource.' => 'Privilèges insuffisants pour accéder à la ressource.',
    'Invalid CSRF token.' => 'Jeton CSRF invalide.',
    'Digest nonce has expired.' => 'Le digest nonce a expiré.',
    'No authentication provider found to support the authentication token.' => 'Aucun fournisseur d\'authentification n\'a été trouvé pour supporter le jeton d\'authentification.',
    'No session available, it either timed out or cookies are not enabled.' => 'Aucune session disponible, celle-ci a expiré ou les cookies ne sont pas activés.',
    'No token could be found.' => 'Aucun jeton n\'a pu être trouvé.',
    'Username could not be found.' => 'Le nom d\'utilisateur n\'a pas pu être trouvé.',
    'Account has expired.' => 'Le compte a expiré.',
    'Credentials have expired.' => 'Les identifiants ont expiré.',
    'Account is disabled.' => 'Le compte est désactivé.',
    'Account is locked.' => 'Le compte est bloqué.',
  ),
  'FOSUserBundle' => 
  array (
    'group.edit.submit' => 'Mettre à jour le groupe',
    'group.show.name' => 'Nom du groupe',
    'group.new.submit' => 'Créer le groupe',
    'group.flash.updated' => 'Le groupe a été mis à jour.',
    'group.flash.created' => 'Le groupe a été créé.',
    'group.flash.deleted' => 'Le groupe a été supprimé.',
    'security.login.username' => 'Nom d\'utilisateur',
    'security.login.password' => 'Mot de passe',
    'security.login.remember_me' => 'Se souvenir de moi',
    'security.login.submit' => 'Connexion',
    'profile.show.username' => 'Nom d\'utilisateur',
    'profile.show.email' => 'Adresse e-mail',
    'profile.edit.submit' => 'Mettre à jour',
    'profile.flash.updated' => 'Le profil a été mis à jour.',
    'change_password.submit' => 'Modifier le mot de passe',
    'change_password.flash.success' => 'Le mot de passe a été modifié.',
    'registration.check_email' => 'Un e-mail a été envoyé à l\'adresse %email%. Il contient un lien d\'activation sur lequel il vous faudra cliquer afin d\'activer votre compte.',
    'registration.confirmed' => 'Félicitations %username%, votre compte est maintenant activé.',
    'registration.back' => 'Retour à la page d\'origine.',
    'registration.submit' => 'Créer un compte',
    'registration.flash.user_created' => 'L\'utilisateur a été créé avec succès.',
    'registration.email.subject' => 'Bienvenue %username% !',
    'registration.email.message' => 'Bonjour %username% !

Pour valider votre compte utilisateur, merci de vous rendre sur %confirmationUrl%

Ce lien ne peut être utilisé qu\'une seule fois pour valider votre compte.

Cordialement,
L\'équipe
',
    'resetting.check_email' => 'Un e-mail a été envoyé. Il contient un lien sur lequel il vous faudra cliquer pour réinitialiser votre mot de passe.
Remarque : Vous ne pouvez demander un nouveau mot de passe que toutes les %tokenLifetime% heures.

Si vous ne recevez pas un email, vérifiez votre dossier spam ou essayez à nouveau.
',
    'resetting.request.username' => 'Nom d\'utilisateur ou adresse e-mail',
    'resetting.request.submit' => 'Réinitialiser le mot de passe',
    'resetting.reset.submit' => 'Modifier le mot de passe',
    'resetting.flash.success' => 'Le mot de passe a été réinitialisé avec succès.',
    'resetting.email.subject' => 'Réinitialisation de votre mot de passe',
    'resetting.email.message' => 'Bonjour %username% !

Pour réinitialiser votre mot de passe, merci de vous rendre sur %confirmationUrl%

Cordialement,
L\'équipe
',
    'layout.logout' => 'Déconnexion',
    'layout.login' => 'Connexion',
    'layout.register' => 'Inscription',
    'layout.logged_in_as' => 'Connecté en tant que %username%',
    'form.group_name' => 'Nom du groupe',
    'form.username' => 'Nom d\'utilisateur',
    'form.email' => 'Adresse e-mail',
    'form.current_password' => 'Mot de passe actuel',
    'form.password' => 'Mot de passe',
    'form.password_confirmation' => 'Répéter le mot de passe',
    'form.new_password' => 'Nouveau mot de passe',
    'form.new_password_confirmation' => 'Répéter le nouveau mot de passe',
  ),
  'KnpPaginatorBundle' => 
  array (
    'label_previous' => 'Précédent',
    'label_next' => 'Suivant',
  ),
));
$catalogueSr->addFallbackCatalogue($catalogueFr);

return $catalogue;
