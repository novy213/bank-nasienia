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
            'nazwa_skrocona' => $this->string(),
            'miejscowosc' => $this->string(),
            'kod_pocztowy' => $this->string(),
            'poczta' => $this->string(),
            'ulica' => $this->string(),
            'nr_domu' => $this->string(),
            'nr_lokalu' => $this->string(),
            'telefon' => $this->string(),
            'nip' => $this->string(),
            'email' => $this->string(),
        ]);
        $this -> alterColumn('clients','id', $this->integer().' AUTO_INCREMENT');
        $this->createTable('buhaj', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'numer_swiadectwa' => $this->integer(),
            'nazwa_zwiazku_hodowcow1' => $this->text()->defaultValue("Testowy zwiazek hodowcow"),
            'nazwa_ksiegi_hodowlanej2' => $this->text(),
            'nazwa_rasy_samca_dawcy3' => $this->text(),
            'numer_samca_dawcy_w_kh5' => $this->text(),
            'identyfikacyjny_numer_dla_samca_dawcy6' => $this->text()->defaultValue("N/D"),
            'system71' => $this->text()->defaultValue("KOLCZYK"),
            'metoda81' => $this->text()->defaultValue("DNA-SNP"),
            'indywidualny_numer_indentyfikacjyny72' => $this->text(),
            'weterynaryjny_numer_indentyfikacjyny73' => $this->text()->defaultValue("N\D"),
            'wynik82' => $this->text(),
            'imie74' => $this->text(),
            'data_kraj_urodzenia_samca_dawcy9' => $this->text(),
            'imie_nazwisko_itd_hodowcy10' => $this->text(),
            'imie_nazwisko_itd_wlasciciela11' => $this->text(),
            'ojciec121' => $this->text(),
            'dziadek_ze_strony_ojca1211' => $this->text(),
            'babka_ze_strony_ojca1212' => $this->text(),
            'matka122' => $this->text(),
            'dziadek_ze_strony_matki1221' => $this->text(),
            'babka_ze_strony_matki1222' => $this->text(),
            'wyniki_wartosci_uzytkowej131' => $this->text(),
            'aktualne_wyniki_oceny_genetycznej132' => $this->text(),
            'wady_genetyczne133' => $this->text(),
            'indywidualny_numer_identyfikacyjny11' => $this->text(),
            'weterynaryjny12' => $this->text()->defaultValue("N\D"),
            'indywidualny_numer_samca_dawcy13' => $this->text()->defaultValue("N\D"),
            'odniesienie_swiadectwa_zootechnicznego14' => $this->text()->defaultValue("N\D"),
            'kolor_opakowan' => $this->text(),
            'kod_opakowan' => $this->text(),
            'liczba_opakowan' => $this->text(),
            'miejsce_pobrania_nasienia' => $this->text(),
            'data_pobrania_nasienia' => $this->text(),
            'nazwa31' => $this->text()->defaultValue("Testowa nazwa banku"),
            'adres32' => $this->text()->defaultValue("Testowy adres banku"),
            'numer_zatwierdzenia33' => $this->text()->defaultValue("1412301"),
            'miejsce_przezaczenia4' => $this->text(),
            'sporzadzono_w61' => $this->text()->defaultValue("Pruszkow"),
            'w_dniu62' => $this->text(),
            'imie_nazwisko_osoby_podpisujacej63' => $this->text()->defaultValue("Testowa osoba"),
            'inne_istotne_informacje' => $this->text(),
        ]);
        $this -> alterColumn('buhaj','id', $this->integer().' AUTO_INCREMENT');
        $this->createTable('api_app', [
            'app_token' => $this->text(),
            'app_name' => $this->text(),
        ]);
        $this->insert('api_app', ['app_token'=> 'cASFK3PrjJs0fCZPAEiCVnIVaHaWBCg0', 'app_name'=>'test']);
        $this->createTable('historia_transakcji_przyjecia', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'data' => $this->text(),
            'buhaj_id' => $this->text(),
        ]);
        $this -> alterColumn('historia_transakcji_przyjecia','id', $this->integer().' AUTO_INCREMENT');
        $this->createTable('historia_transakcji_wydania', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'klient_id' => $this->integer(),
            'data' => $this->text(),
            'ilosc' => $this->integer(),
        ]);
        $this -> alterColumn('historia_transakcji_wydania','id', $this->integer().' AUTO_INCREMENT');
        $this->createTable('buhaje_wydania', [
            'buhaj_id' => $this->integer(),
            'wydanie_id' => $this->integer(),
        ]);
        $this->createTable('magazyn', [
            'nr_faktury' => $this->integer(),
            'data' => $this->text(),
            'buhaj_id' => $this->text(),
            'ilosc' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('clients');
        $this->dropTable('buhaj');
        $this->dropTable('historia_transakcji_wydania');
        $this->dropTable('historia_transakcji_przyjecia');
        $this->dropTable('api_app');
        $this->dropTable('buhaje_wydania');
    }
}
