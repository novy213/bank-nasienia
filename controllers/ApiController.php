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
        $buhajs = Buhaj::find()->all();
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
        $clients = Clients::find()->all();
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
                'indywidualny_numer_indentyfikacjyny' => $buhaj->indywidualny_numer_indentyfikacjyny72,
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
        return[
            'error' => false,
            'messgae'=> null,
            'archiwum'=>$archi
        ];
    }
    public function actionGetmetryczka($id){
        $archi = Archiwum::find()->andWhere(['id'=>$id])->one();
        return[
            'error' => false,
            'messgae'=> null,
            'archiwum'=>$archi
        ];
    }
}