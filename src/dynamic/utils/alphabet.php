<?php  
    abstract class ABS_DICTIONARY {
        public $SETTINGS;
        public $HELLO;

        public $THEME_SELECT;
        public $DARK;
        public $CLASSIC;
        public $SET_THEME;

        public $LANGUAGE_SELECT;
        public $SET_LANGUAGE;
    }

    class RUS_DICTIONARY extends ABS_DICTIONARY {
        public $SETTINGS = "Настройки";
        public $HELLO = "Привет";

        public $THEME_SELECT = "Выберите тему";
        public $DARK = "Темная";
        public $CLASSIC = "Классическая";
        public $SET_THEME = "Установить тему";

        public $LANGUAGE_SELECT = "Выберите язык";
        public $SET_LANGUAGE = "Установить язык";
    }

    class ENG_DICTIONARY extends ABS_DICTIONARY {
        public $SETTINGS = "Settings";
        public $HELLO = "Hello";

        public $THEME_SELECT = "Select theme";
        public $DARK = "Dark";
        public $CLASSIC = "Classic";
        public $SET_THEME = "Set theme";

        public $LANGUAGE_SELECT = "Select language";
        public $SET_LANGUAGE = "Set language";
    }
?>