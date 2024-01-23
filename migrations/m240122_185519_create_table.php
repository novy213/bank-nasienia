<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%}}`.
 */
class m240122_185519_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('clients', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'imie' => $this->string(),
            'nazwisko' => $this->string(),
            'adres' => $this->string(),
        ]);
        $this -> alterColumn('clients','id', $this->integer().' AUTO_INCREMENT');
        $this->createTable('buhaj', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'numer_swiadectwa' => $this->text(),
            'nazwa_zwiazku_hodowcow' => $this->text()->defaultValue("Testowy zwiazek hodowcow"),
            'nazwa_ksiegi_hodowlanej' => $this->text(),
            'nazwa_rasy_samca_dawcy' => $this->text(),
            'numer_samca_dawcy_w_kh' => $this->text(),
            'identyfikacyjny_numer_dla_samca_dawcy' => $this->text()->defaultValue("N/D"),
            'system' => $this->text()->defaultValue("KOLCZYK"),
            'metoda' => $this->text()->defaultValue("DNA-SNP"),
            'indywidualny_numer_indentyfikacjyny' => $this->text(),
            'weterynaryjny_numer_indentyfikacjyny' => $this->text()->defaultValue("N\D"),
            'wynik' => $this->text(),
            'imie' => $this->text(),
            'imie_nazwisko_itd_hodowcy' => $this->text(),
            'imie_nazwisko_itd_wlasciciela' => $this->text(),
            'ojciec' => $this->text(),
            'dziadek_ze_strony_ojca' => $this->text(),
            'babka_ze_strony_ojca' => $this->text(),
            'matka' => $this->text(),
            'dziadek_ze_strony_matki' => $this->text(),
            'babka_ze_strony_matki' => $this->text(),
            'wyniki_wartosci_uzytkowej' => $this->text(),
            'aktualne_wyniki_oceny_genetycznej' => $this->text(),
            'wady_genetyczne' => $this->text(),
            'indywidualny_numer_identyfikacyjny' => $this->text(),
            'weterynaryjny' => $this->text()->defaultValue("N\D"),
            'indywidualny_numer_samca_dawcy' => $this->text()->defaultValue("N\D"),
            'indywidualny_numer_samca_dawcy_z_gatunkow' => $this->text()->defaultValue("N\D"),
            'odniesienie_swiadectwa_zootechnicznego' => $this->text(),
            'kolor_opakowan' => $this->text(),
            'liczba_opakowan' => $this->text(),
            'miejsce_pobrania_nasienia' => $this->text(),
            'data_pobrania_nasienia' => $this->text(),
            'nazwa' => $this->text()->defaultValue("Testowa nazwa banku"),
            'adres' => $this->text()->defaultValue("Testowy adres banku"),
            'numer_zatwierdzenia' => $this->text()->defaultValue("1412301"),
            'miejsce_przezaczenia' => $this->text(),
            'sporzadzono_w' => $this->text()->defaultValue("Pruszkow"),
            'w_dniu' => $this->text(),
            'imie_nazwisko_osoby_podpisujacej' => $this->text()->defaultValue("Testowa osoba"),
        ]);
        $this -> alterColumn('buhaj','id', $this->integer().' AUTO_INCREMENT');
        $this->createTable('api_app', [
            'app_token' => $this->text(),
            'app_name' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('clients');
        $this->dropTable('buhaj');
        $this->dropTable('api_app');
    }
}
