<?php

class LanguageManager {
    private $locale_data = [];
    private $default_locale_data = [];

    public function __construct($locale) {
        $this->load_locale('english'); // Load fallback English translations first
        $this->load_locale($locale); // Then load the selected language
    }

    private function load_locale($locale) {
        $file_path = __DIR__ . "/languages/$locale.json";
        if (file_exists($file_path)) {
            $json_content = file_get_contents($file_path);
            $parsed_data = json_decode($json_content, true);
            if ($locale === 'english') {
                $this->default_locale_data = $parsed_data;
            } else {
                $this->locale_data = $parsed_data;
            }
        }
    }

    public function translate($key) {
        return $this->locale_data[$key] ?? $this->default_locale_data[$key] ?? "[Missing Translation: $key]";
    }
}

// Example Usage
$locale = 'english'; // Change this to 'french' or 'english' as needed
$language_manager = new LanguageManager($locale);

echo $language_manager->translate("HEADER")."<br>";        // "Ahoy!"
echo $language_manager->translate("SUBMIT_BUTTON")."<br>"; // Falls back to "Submit" since it's missing in pirate.json
echo $language_manager->translate("FORM_INTRO")."<br>";    // "Fill in ye form, or get the black spot!"
