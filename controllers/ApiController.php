<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Archiwum;
use app\models\Buhaj;
use app\models\BuhajeWydania;
use app\models\Clients;
use app\models\HistoriaTransakcji;
use app\models\HistoriaTransakcjiPrzyjecia;
use app\models\HistoriaTransakcjiWydania;
use app\models\Magazyn;
use app\models\MagazynIlosc;
use Cassandra\Date;

class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionGetbuhaj(){
        $buhajs = Buhaj::find()->orderBy(['imie74' => SORT_ASC])->all();
        return [
            'error' => false,
            'message' => null,
            'buhaj' => $buhajs
        ];
    }
    public function actionAddbuhaj(){
        $post = $this->getJsonInput();
        $buhaj = new Buhaj();
        $buhaj->nazwa_ksiegi_hodowlanej2 = $post->nazwa_ksiegi_hodowlanej2;
        $buhaj->nazwa_rasy_samca_dawcy3 = $post->nazwa_rasy_samca_dawcy3;
        $buhaj->numer_samca_dawcy_w_kh5 = $post->numer_samca_dawcy_w_kh5;
        $buhaj->indywidualny_numer_indentyfikacjyny72 = $post->indywidualny_numer_indentyfikacjyny72;
        $buhaj->wynik82 = $post->wynik82;
        $buhaj->imie74 = $post->imie74;
        $buhaj->data_kraj_urodzenia_samca_dawcy9 = $post->data_kraj_urodzenia_samca_dawcy9;
        $buhaj->imie_nazwisko_itd_hodowcy10 = $post->imie_nazwisko_itd_hodowcy10;
        $buhaj->imie_nazwisko_itd_wlasciciela11 = $post->imie_nazwisko_itd_wlasciciela11;
        $buhaj->ojciec121 = $post->ojciec121;
        $buhaj->dziadek_ze_strony_ojca1211 = $post->dziadek_ze_strony_ojca1211;
        $buhaj->babka_ze_strony_ojca1212 = $post->babka_ze_strony_ojca1212;
        $buhaj->matka122 = $post->matka122;
        $buhaj->dziadek_ze_strony_matki1221 = $post->dziadek_ze_strony_matki1221;
        $buhaj->babka_ze_strony_matki1222 = $post->babka_ze_strony_matki1222;
        $buhaj->wyniki_wartosci_uzytkowej131 = $post->wyniki_wartosci_uzytkowej131;
        $buhaj->aktualne_wyniki_oceny_genetycznej132 = $post->aktualne_wyniki_oceny_genetycznej132;
        $buhaj->wady_genetyczne133 = $post->wady_genetyczne133;
        $buhaj->indywidualny_numer_identyfikacyjny11 = $post->indywidualny_numer_identyfikacyjny11;
        $buhaj->kolor_opakowan = $post->kolor_opakowan;
        $buhaj->kod_opakowan = $post->kod_opakowan;
        $buhaj->liczba_opakowan = $post->liczba_opakowan;
        $buhaj->miejsce_pobrania_nasienia = $post->miejsce_pobrania_nasienia;
        $buhaj->data_pobrania_nasienia = $post->data_pobrania_nasienia;
        $buhaj->miejsce_przezaczenia4 = $post->miejsce_przezaczenia4;
        $buhaj->inne_istotne_informacje = $post->inne_istotne_informacje;
        if($buhaj->validate()){
            $buhaj->save();
            $historia = new HistoriaTransakcjiPrzyjecia();
            $historia->buhaj_id = $buhaj->id;
            $date = new \DateTime();
            $historia->data = $date->format("Y-m-d");
            if($historia->validate()){
                $historia->save();
                return [
                    'error' => false,
                    'message' => null,
                ];
            }
            else {
                return [
                    'error'=>true,
                    'message'=>$historia->getErrorSummary(false)
                ];
            }
        }
        else {
            return [
                'error'=>true,
                'message'=>$buhaj->getErrorSummary(false)
            ];
        }
    }
    public function actionGetclients(){
        $clients = Clients::find()->orderBy(['nazwisko' => SORT_ASC])->all();
        return [
            'error' => false,
            'message' => null,
            'clients' => $clients
        ];
    }
    public function actionAddclient(){
        $post = $this->getJsonInput();
        $client = new Clients();
        $client->imie = $post->imie;
        $client->nazwisko = $post->nazwisko;
        $client->nazwa_skrocona = $post->nazwa_skrocona;
        $client->miejscowosc = $post->miejscowosc;
        $client->kod_pocztowy = $post->kod_pocztowy;
        $client->poczta = $post->poczta;
        $client->ulica = $post->ulica;
        $client->nr_domu = $post->nr_domu;
        $client->nr_lokalu = $post->nr_lokalu;
        $client->email = $post->email;
        $client->telefon = $post->telefon;
        $client->nip = $post->nip;
        if($client->validate()){
            $client->save();
            return [
                'error' => false,
                'message' => null,
            ];
        }
    }
    public function actionAddwydanie(){
        $post = $this->getJsonInput();
        for($i=0;$i<count($post->buhaj);$i++){
            $wydania = new HistoriaTransakcjiWydania();
            $wydania->klient_id = $post->klient_id;
            $data = new \DateTime();
            $wydania->data = $data->format("Y-m-d");
            $wydania->ilosc = $post->buhaj[$i]->ilosc;
            if($wydania->validate()){
                $wydania->save();
                $bh = new BuhajeWydania();
                $bh->buhaj_id = $post->buhaj[$i]->buhaj_id;
                $magazyn = MagazynIlosc::find()->andWhere(['buhaj_id'=>$post->buhaj[$i]->buhaj_id])->one();
                $magazyn->buhaj_id = $post->buhaj[$i]->buhaj_id;
                $magazyn->ilosc = $magazyn->ilosc - $post->buhaj[$i]->ilosc;
                $magazyn->update();
                $bh->wydanie_id = $wydania->id;
                $bh->save();
            }
        }
        return [
            'error' => false,
            'message' => null,
        ];
    }
    public function actionDeletebuhaj($id){
        $buhaj = Buhaj::find()->andWhere(['id'=>$id])->one();
        $buhaj->delete();
        return [
            'error' => false,
            'message' => null,
        ];
    }
    public function actionDeleteclient($id){
        $client = Clients::find()->andWhere(['id'=>$id])->one();
        $client->delete();
        return [
            'error' => false,
            'message' => null,
        ];
    }
    public function actionGetprzyjecia(){
        $historia = HistoriaTransakcjiPrzyjecia::find()->all();
        $ret = array();
        for($i=0;$i<count($historia);$i++){
            $buhaj = Buhaj::find()->andWhere(['id'=>$historia[$i]->id])->one();
            $ret[] = [
                'id' => $historia[$i]->id,
                'data' => $historia[$i]->data,
                'buhaj' => $buhaj,
            ];
        }
        return [
            'error' => false,
            'message'=> null,
            'historia' => $ret
        ];
    }
    public function actionGetwydania(){
        $historia = HistoriaTransakcjiWydania::find()->all();
        $ret = array();
        for($i=0;$i<count($historia);$i++){
            $client = Clients::find()->andWhere(['id'=>$historia[$i]->klient_id])->one();

            $ret[] = [
                'id'=>$historia[$i]->id,
                'klient'=>$client,
                'data'=>$historia[$i]->data,
                'ilosc'=>$historia[$i]->ilosc,
            ];
        }
        return [
            'error' => false,
            'message'=> null,
            'historia' => $ret
        ];
    }
    public function actionEditbuhaj($id){
        $post = $this->getJsonInput();
        $buhaj = Buhaj::find()->andWhere(['id'=>$id])->one();
        $buhaj->nazwa_ksiegi_hodowlanej2 = $post->nazwa_ksiegi_hodowlanej2;
        $buhaj->nazwa_rasy_samca_dawcy3 = $post->nazwa_rasy_samca_dawcy3;
        $buhaj->numer_samca_dawcy_w_kh5 = $post->numer_samca_dawcy_w_kh5;
        $buhaj->indywidualny_numer_indentyfikacjyny72 = $post->indywidualny_numer_indentyfikacjyny72;
        $buhaj->wynik82 = $post->wynik82;
        $buhaj->imie74 = $post->imie74;
        $buhaj->data_kraj_urodzenia_samca_dawcy9 = $post->data_kraj_urodzenia_samca_dawcy9;
        $buhaj->imie_nazwisko_itd_hodowcy10 = $post->imie_nazwisko_itd_hodowcy10;
        $buhaj->imie_nazwisko_itd_wlasciciela11 = $post->imie_nazwisko_itd_wlasciciela11;
        $buhaj->ojciec121 = $post->ojciec121;
        $buhaj->dziadek_ze_strony_ojca1211 = $post->dziadek_ze_strony_ojca1211;
        $buhaj->babka_ze_strony_ojca1212 = $post->babka_ze_strony_ojca1212;
        $buhaj->matka122 = $post->matka122;
        $buhaj->dziadek_ze_strony_matki1221 = $post->dziadek_ze_strony_matki1221;
        $buhaj->babka_ze_strony_matki1222 = $post->babka_ze_strony_matki1222;
        $buhaj->wyniki_wartosci_uzytkowej131 = $post->wyniki_wartosci_uzytkowej131;
        $buhaj->aktualne_wyniki_oceny_genetycznej132 = $post->aktualne_wyniki_oceny_genetycznej132;
        $buhaj->wady_genetyczne133 = $post->wady_genetyczne133;
        $buhaj->indywidualny_numer_identyfikacyjny11 = $post->indywidualny_numer_identyfikacyjny11;
        $buhaj->kolor_opakowan = $post->kolor_opakowan;
        $buhaj->kod_opakowan = $post->kod_opakowan;
        $buhaj->liczba_opakowan = $post->liczba_opakowan;
        $buhaj->miejsce_pobrania_nasienia = $post->miejsce_pobrania_nasienia;
        $buhaj->data_pobrania_nasienia = $post->data_pobrania_nasienia;
        $buhaj->miejsce_przezaczenia4 = $post->miejsce_przezaczenia4;
        $buhaj->inne_istotne_informacje = $post->inne_istotne_informacje;
        $buhaj->update();
        return [
            'error' => false,
            'message'=> null,
        ];
    }
    public function actionEditclient($id){
        $client = Clients::find()->andWhere(['id' => $id])->one();
        $post = $this->getJsonInput();
        $client->imie = $post->imie;
        $client->nazwisko = $post->nazwisko;
        $client->nazwa_skrocona = $post->nazwa_skrocona;
        $client->miejscowosc = $post->miejscowosc;
        $client->kod_pocztowy = $post->kod_pocztowy;
        $client->poczta = $post->poczta;
        $client->ulica = $post->ulica;
        $client->nr_domu = $post->nr_domu;
        $client->nr_lokalu = $post->nr_lokalu;
        $client->email = $post->email;
        $client->telefon = $post->telefon;
        $client->nip = $post->nip;
        $client->update();
        return [
            'error' => false,
            'message'=> null,
        ];
    }
    public function actionAdddostawa(){
        $post = $this->getJsonInput();
        $exsist = MagazynIlosc::find()->andWhere(['buhaj_id' => $post->buhaj_id])->one();
        if(is_null($exsist)){
            $ilosc = new MagazynIlosc();
            $ilosc->buhaj_id = $post->buhaj_id;
            $ilosc->ilosc = $post->ilosc;
            $ilosc->save();
        }
        else{
            $exsist->ilosc = $exsist->ilosc + $post->ilosc;
            $exsist->update();
        }
        $magazyn = new Magazyn();
        $data = new \DateTime();
        $magazyn->data = $data->format("Y-m-d");
        $magazyn->buhaj_id = $post->buhaj_id;
        $magazyn->ilosc = $post->ilosc;
        $magazyn->nr_faktury = $post->nr_faktury;
        $magazyn->data_pobrania = $post->data_pobrania;
        if($magazyn->validate()){
            $magazyn->save();
            return [
                'error' => false,
                'message'=> null,
            ];
        }
    }
    public function actionGetdostawa(){
        $magazyn = Magazyn::find()->all();
        $faktury = array();
        for($i=0;$i<count($magazyn);$i++){
            $buhaj = Buhaj::find()->andWhere(['id'=>$magazyn[$i]->buhaj_id])->one();
            $faktury[] = [
                'id' => $magazyn[$i]->id,
                'nr_faktury' => $magazyn[$i]->nr_faktury,
                'data' => $magazyn[$i]->data,
                'ilosc' => $magazyn[$i]->ilosc,
                'indywidualny_numer_indentyfikacjyny' => $buhaj->indywidualny_numer_identyfikacyjny11,
            ];
        }
        return[
            'error' => false,
            'messgae'=> null,
            'magazyn' => $faktury
        ];
    }
    public function actionGetilosc(){
        $magazyn = MagazynIlosc::find()->all();
        $faktury = array();
        for($i=0;$i<count($magazyn);$i++){
            $buhaj = Buhaj::find()->andWhere(['id'=>$magazyn[$i]->buhaj_id])->one();
            $faktury[] = [
                'ilosc' => $magazyn[$i]->ilosc,
                'indywidualny_numer_indentyfikacjyny' => $buhaj->indywidualny_numer_indentyfikacjyny72,
                'imie74' => $buhaj->imie74,
            ];
        }
        return[
            'error' => false,
            'messgae'=> null,
            'ilosc' => $faktury
        ];
    }
    public function actionZmienilosc(){
        $post = $this->getJsonInput();
        $buhaj = Buhaj::find()->andWhere(['indywidualny_numer_indentyfikacjyny72' => $post->indywidualny_numer_indentyfikacjyny72])->one();
        $magazyn = MagazynIlosc::find()->andWhere(['buhaj_id' => $buhaj->id])->one();
        $magazyn->ilosc = $post->ilosc;
        $magazyn->update();
        return[
            'error' => false,
            'messgae'=> null,
        ];
    }
    public function actionDeleteilosc(){
        $post = $this->getJsonInput();
        $buhaj = Buhaj::find()->andWhere(['indywidualny_numer_indentyfikacjyny72' => $post->indywidualny_numer_indentyfikacjyny72])->one();
        $magazyn = MagazynIlosc::find()->andWhere(['buhaj_id' => $buhaj->id])->one();
        $przyjecia = HistoriaTransakcjiPrzyjecia::find()->andWhere(['id'=>$magazyn->id])->one();
        $przyjecia->delete();
        $magazyn->delete();
        return[
            'error' => false,
            'messgae'=> null,
        ];
    }
    public function actionAddmetryczka(){
        $post = $this->getJsonInput();
        $buhaj = new Archiwum();
        $buhaj->numer_swiadectwa = $post->numer_swiadectwa;
        $buhaj->client_id = $post->client_id;
        $buhaj->nazwa_ksiegi_hodowlanej2 = $post->nazwa_ksiegi_hodowlanej2;
        $buhaj->nazwa_rasy_samca_dawcy3 = $post->nazwa_rasy_samca_dawcy3;
        $buhaj->numer_samca_dawcy_w_kh5 = $post->numer_samca_dawcy_w_kh5;
        $buhaj->indywidualny_numer_indentyfikacjyny72 = $post->indywidualny_numer_indentyfikacjyny72;
        $buhaj->wynik82 = $post->wynik82;
        $buhaj->imie74 = $post->imie74;
        $buhaj->data_kraj_urodzenia_samca_dawcy9 = $post->data_kraj_urodzenia_samca_dawcy9;
        $buhaj->imie_nazwisko_itd_hodowcy10 = $post->imie_nazwisko_itd_hodowcy10;
        $buhaj->imie_nazwisko_itd_wlasciciela11 = $post->imie_nazwisko_itd_wlasciciela11;
        $buhaj->ojciec121 = $post->ojciec121;
        $buhaj->dziadek_ze_strony_ojca1211 = $post->dziadek_ze_strony_ojca1211;
        $buhaj->babka_ze_strony_ojca1212 = $post->babka_ze_strony_ojca1212;
        $buhaj->matka122 = $post->matka122;
        $buhaj->dziadek_ze_strony_matki1221 = $post->dziadek_ze_strony_matki1221;
        $buhaj->babka_ze_strony_matki1222 = $post->babka_ze_strony_matki1222;
        $buhaj->wyniki_wartosci_uzytkowej131 = $post->wyniki_wartosci_uzytkowej131;
        $buhaj->aktualne_wyniki_oceny_genetycznej132 = $post->aktualne_wyniki_oceny_genetycznej132;
        $buhaj->wady_genetyczne133 = $post->wady_genetyczne133;
        $buhaj->indywidualny_numer_identyfikacyjny11 = $post->indywidualny_numer_identyfikacyjny11;
        $buhaj->kolor_opakowan = $post->kolor_opakowan;
        $buhaj->kod_opakowan = $post->kod_opakowan;
        $buhaj->liczba_opakowan = $post->liczba_opakowan;
        $buhaj->miejsce_pobrania_nasienia = $post->miejsce_pobrania_nasienia;
        $buhaj->data_pobrania_nasienia = $post->data_pobrania_nasienia;
        $buhaj->miejsce_przezaczenia4 = $post->miejsce_przezaczenia4;
        $buhaj->inne_istotne_informacje = $post->inne_istotne_informacje;
        if($buhaj->validate()){
            $buhaj->save();
            return[
                'error' => false,
                'messgae'=> null,
            ];
        }
        else {
            $buhaj->getErrorSummary(false);
        }
    }
    public function actionGetarchiwum(){
        $archi = Archiwum::find()->all();
        $res = array();
        for($i=0;$i<count($archi);$i++){
            $client = Clients::find()->andWhere(['id'=>$archi[$i]->client_id])->one();
            $res[] = [
                'id' => $archi[$i]->id,
                'numer_swiadectwa' => $archi[$i]->numer_swiadectwa,
                'nazwa_zwiazku_hodowcow1' => $archi[$i]->nazwa_zwiazku_hodowcow1,
                'client_id' => $archi[$i]->client_id,
                'nazwa_ksiegi_hodowlanej2' => $archi[$i]->nazwa_ksiegi_hodowlanej2,
                'nazwa_rasy_samca_dawcy3' => $archi[$i]->nazwa_rasy_samca_dawcy3,
                'numer_samca_dawcy_w_kh5' => $archi[$i]->numer_samca_dawcy_w_kh5,
                'identyfikacyjny_numer_dla_samca_dawcy6' => $archi[$i]->identyfikacyjny_numer_dla_samca_dawcy6,
                'system71' => $archi[$i]->system71,
                'metoda81' => $archi[$i]->metoda81,
                'indywidualny_numer_indentyfikacjyny72' => $archi[$i]->indywidualny_numer_indentyfikacjyny72,
                'weterynaryjny_numer_indentyfikacjyny73' => $archi[$i]->weterynaryjny_numer_indentyfikacjyny73,
                'wynik82' => $archi[$i]->wynik82,
                'imie74' => $archi[$i]->imie74,
                'data_kraj_urodzenia_samca_dawcy9' => $archi[$i]->data_kraj_urodzenia_samca_dawcy9,
                'imie_nazwisko_itd_hodowcy10' => $archi[$i]->imie_nazwisko_itd_hodowcy10,
                'imie_nazwisko_itd_wlasciciela11' => $archi[$i]->imie_nazwisko_itd_wlasciciela11,
                'ojciec121' => $archi[$i]->ojciec121,
                'dziadek_ze_strony_ojca1211' => $archi[$i]->dziadek_ze_strony_ojca1211,
                'babka_ze_strony_ojca1212' => $archi[$i]->babka_ze_strony_ojca1212,
                'matka122' => $archi[$i]->matka122,
                'dziadek_ze_strony_matki1221' => $archi[$i]->dziadek_ze_strony_matki1221,
                'babka_ze_strony_matki1222' => $archi[$i]->babka_ze_strony_matki1222,
                'wyniki_wartosci_uzytkowej131' => $archi[$i]->wyniki_wartosci_uzytkowej131,
                'aktualne_wyniki_oceny_genetycznej132' => $archi[$i]->aktualne_wyniki_oceny_genetycznej132,
                'wady_genetyczne133' => $archi[$i]->wady_genetyczne133,
                'indywidualny_numer_identyfikacyjny11' => $archi[$i]->indywidualny_numer_identyfikacyjny11,
                'weterynaryjny12' => $archi[$i]->weterynaryjny12,
                'indywidualny_numer_samca_dawcy13' => $archi[$i]->indywidualny_numer_samca_dawcy13,
                'odniesienie_swiadectwa_zootechnicznego14' => $archi[$i]->odniesienie_swiadectwa_zootechnicznego14,
                'kolor_opakowan' => $archi[$i]->kolor_opakowan,
                'kod_opakowan' => $archi[$i]->kod_opakowan,
                'liczba_opakowan' => $archi[$i]->liczba_opakowan,
                'miejsce_pobrania_nasienia' => $archi[$i]->miejsce_pobrania_nasienia,
                'data_pobrania_nasienia' => $archi[$i]->data_pobrania_nasienia,
                'nazwa31' => $archi[$i]->nazwa31,
                'adres32' => $archi[$i]->adres32,
                'numer_zatwierdzenia33' => $archi[$i]->numer_zatwierdzenia33,
                'miejsce_przezaczenia4' => $archi[$i]->miejsce_przezaczenia4,
                'sporzadzono_w61' => $archi[$i]->sporzadzono_w61,
                'w_dniu62' => $archi[$i]->w_dniu62,
                'inne_istotne_informacje' => $archi[$i]->inne_istotne_informacje,
                'imie_nazwisko_osoby_podpisujacej63' => $archi[$i]->imie_nazwisko_osoby_podpisujacej63,
                'imie' => $client->imie,
                'nazwisko' => $client->nazwisko,
                'nazwa_skrocona' => $client->nazwa_skrocona,
                'miejscowosc' => $client->miejscowosc,
                'kod_pocztowy' => $client->kod_pocztowy,
                'poczta' => $client->poczta,
                'ulica' => $client->ulica,
                'nr_domu' => $client->nr_domu,
                'nr_lokalu' => $client->nr_lokalu,
                'nip' => $client->nip,
                'email' => $client->email,
                'telefon' => $client->telefon,
            ];
        }
        return[
            'error' => false,
            'messgae'=> null,
            'archiwum'=>$res
        ];
    }
    public function actionGetmetryczka($id){
        $archi = Archiwum::find()->andWhere(['id'=>$id])->one();
        $client = Clients::find()->andWhere(['id'=>$archi->client_id])->one();
        return[
            'error' => false,
            'messgae'=> null,
            'archiwum'=>$archi,
            'client' => $client
        ];
    }
    public function actionGetmagazyn($id){
        $magazyn = Magazyn::find()->andWhere(['buhaj_id'=>$id])->all();
        return[
            'error' => false,
            'messgae'=> null,
            'magazyn'=>$magazyn,
        ];
    }
    public function actionDeleteprzyjecia($id)
    {
        $buhaj = Buhaj::find()->andWhere(['indywidualny_numer_identyfikacyjny11' => $id])->one();
        $przyjecia = Magazyn::find()->andWhere(['buhaj_id' => $buhaj->id])->one();
        $magazyn = MagazynIlosc::find()->andWhere(['buhaj_id' => $buhaj->id])->one();
        $magazyn->ilosc = $magazyn->ilosc - $przyjecia->ilosc;
        $magazyn->update();
        $przyjecia->delete();
        return[
            'error' => false,
            'messgae'=> null,
        ];
    }
    public function actionDeletemetryczka($id){
        $metryczka = Archiwum::find()->andWhere(['id' => $id])->one();
        $buhaj = Buhaj::find()->andWhere(['indywidualny_numer_identyfikacyjny11' => $metryczka->indywidualny_numer_identyfikacyjny11])->one();
        $magazyn = MagazynIlosc::find()->andWhere(['buhaj_id'=>$buhaj->id])->one();
        $historia = HistoriaTransakcjiWydania::find()->andWhere(['id' => $metryczka->id])->one();
        if(!is_null($magazyn)){
            $magazyn->ilosc = $magazyn->ilosc + $metryczka->liczba_opakowan;
            $magazyn->update();
        }
        $metryczka->delete();
        $historia->delete();
        return[
            'error' => false,
            'messgae'=> null,
        ];
    }
    public function actionEditmetryczka($id){
        $post = $this->getJsonInput();
        $buhaj = Archiwum::find()->andWhere(['id' => $id])->one();
        $buhaj->numer_swiadectwa = $post->numer_swiadectwa;
        $buhaj->client_id = $post->client_id;
        $buhaj->nazwa_ksiegi_hodowlanej2 = $post->nazwa_ksiegi_hodowlanej2;
        $buhaj->nazwa_rasy_samca_dawcy3 = $post->nazwa_rasy_samca_dawcy3;
        $buhaj->numer_samca_dawcy_w_kh5 = $post->numer_samca_dawcy_w_kh5;
        $buhaj->indywidualny_numer_indentyfikacjyny72 = $post->indywidualny_numer_indentyfikacjyny72;
        $buhaj->wynik82 = $post->wynik82;
        $buhaj->imie74 = $post->imie74;
        $buhaj->data_kraj_urodzenia_samca_dawcy9 = $post->data_kraj_urodzenia_samca_dawcy9;
        $buhaj->imie_nazwisko_itd_hodowcy10 = $post->imie_nazwisko_itd_hodowcy10;
        $buhaj->imie_nazwisko_itd_wlasciciela11 = $post->imie_nazwisko_itd_wlasciciela11;
        $buhaj->ojciec121 = $post->ojciec121;
        $buhaj->dziadek_ze_strony_ojca1211 = $post->dziadek_ze_strony_ojca1211;
        $buhaj->babka_ze_strony_ojca1212 = $post->babka_ze_strony_ojca1212;
        $buhaj->matka122 = $post->matka122;
        $buhaj->dziadek_ze_strony_matki1221 = $post->dziadek_ze_strony_matki1221;
        $buhaj->babka_ze_strony_matki1222 = $post->babka_ze_strony_matki1222;
        $buhaj->wyniki_wartosci_uzytkowej131 = $post->wyniki_wartosci_uzytkowej131;
        $buhaj->aktualne_wyniki_oceny_genetycznej132 = $post->aktualne_wyniki_oceny_genetycznej132;
        $buhaj->wady_genetyczne133 = $post->wady_genetyczne133;
        $buhaj->indywidualny_numer_identyfikacyjny11 = $post->indywidualny_numer_identyfikacyjny11;
        $buhaj->kolor_opakowan = $post->kolor_opakowan;
        $buhaj->kod_opakowan = $post->kod_opakowan;
        $buhaj->liczba_opakowan = $post->liczba_opakowan;
        $buhaj->miejsce_pobrania_nasienia = $post->miejsce_pobrania_nasienia;
        $buhaj->data_pobrania_nasienia = $post->data_pobrania_nasienia;
        $buhaj->miejsce_przezaczenia4 = $post->miejsce_przezaczenia4;
        $buhaj->inne_istotne_informacje = $post->inne_istotne_informacje;
        $buhaj->update();
        return[
            'error' => false,
            'messgae'=> null,
        ];
    }
    public function actionDeletewydania($id){
        $wydania = HistoriaTransakcjiWydania::find()->andWhere(['id'=>$id])->one();
        $archiwum = Archiwum::find()->andWhere(['id'=>$id])->one();
        $buhaj = Buhaj::find()->andWhere(['indywidualny_numer_identyfikacyjny11' => $archiwum->indywidualny_numer_identyfikacyjny11])->one();
        $magazyn = MagazynIlosc::find()->andWhere(['buhaj_id'=>$buhaj->id])->one();
        $magazyn->ilosc = $magazyn->ilosc + $wydania->ilosc;
        $wydania->delete();
        $archiwum->delete();
        $magazyn->update();
        return[
            'error' => false,
            'messgae'=> null,
        ];
    }
}