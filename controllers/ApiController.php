<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Buhaj;
use app\models\Clients;

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
        $buhaj->kolor_opakowan21 = $post->kolor_opakowan21;
        $buhaj->liczba_opakowan22 = $post->liczba_opakowan22;
        $buhaj->miejsce_pobrania_nasienia23 = $post->miejsce_pobrania_nasienia23;
        $buhaj->data_pobrania_nasienia24 = $post->data_pobrania_nasienia24;
        $buhaj->miejsce_przezaczenia4 = $post->miejsce_przezaczenia4;
        $buhaj->w_dniu62 = $post->w_dniu62;
        if($buhaj->validate()){
            $buhaj->save();
            return [
                'error' => false,
                'message' => null,
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
        $client->adres_kraj = $post->adres_kraj;
        $client->adres_woj = $post->adres_woj;
        $client->adres_powiat = $post->adres_powiat;
        $client->adres_gmina = $post->adres_gmina;
        $client->adres_kod_pocz = $post->adres_kod_pocz;
        $client->adres_poczta = $post->adres_poczta;
        $client->adres_ulica = $post->adres_ulica;
        $client->adres_nr_domu = $post->adres_nr_domu;
        $client->adres_nr_lokalu = $post->adres_nr_lokalu;
        $client->telefon = $post->telefon;
        if($client->validate()){
            $client->save();
            return [
                'error' => false,
                'message' => null,
            ];
        }
    }
}