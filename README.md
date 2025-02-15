# Language-Translator
This PHP project adds multi-language support to an application, allowing users to switch between different languages easily. It includes language translation files in JSON format and a dynamic language manager that loads translations based on the selected locale.
<br>
-Supports English and French (easily extendable to other languages)

-Loads translation files dynamically from JSON

-Falls back to English if a translation is missing

-Simple and reusable PHP class for handling translations


<br>

****** Usage Example ********

require_once 'src/LanguageManager.php';

$language = 'french'; // Change this to 'english' or 'pirate'

$translator = new LanguageManager($language);

echo $translator->get_translation("HEADER"); // "Bienvenue sur notre application!"

echo $translator->get_translation("SUBMIT_BUTTON"); // "Soumettre"
