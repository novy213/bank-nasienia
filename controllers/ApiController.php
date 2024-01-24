<?php

namespace app\controllers;

use app\models\Buhaj;
use app\models\Clients;

class ApiController extends \app\components\Controller
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
        $buhaj->nazwa_ksiegi_hodowlanej = $post->nazwa_ksiegi_hodowlanej;
        $buhaj->nazwa_rasy_samca_dawcy = $post->nazwa_rasy_samca_dawcy;
        $buhaj->numer_samca_dawcy_w_kh = $post->numer_samca_dawcy_w_kh;
        $buhaj->indywidualny_numer_indentyfikacjyny = $post->indywidualny_numer_indentyfikacjyny;
        $buhaj->wynik = $post->wynik;
        $buhaj->imie = $post->imie;
        $buhaj->imie_nazwisko_itd_hodowcy = $post->imie_nazwisko_itd_hodowcy;
        $buhaj->imie_nazwisko_itd_wlasciciela = $post->imie_nazwisko_itd_wlasciciela;
        $buhaj->ojciec = $post->ojciec;
        $buhaj->dziadek_ze_strony_ojca = $post->dziadek_ze_strony_ojca;
        $buhaj->babka_ze_strony_ojca = $post->babka_ze_strony_ojca;
        $buhaj->matka = $post->matka;
        $buhaj->dziadek_ze_strony_matki = $post->dziadek_ze_strony_matki;
        $buhaj->babka_ze_strony_matki = $post->babka_ze_strony_matki;
        $buhaj->wyniki_wartosci_uzytkowej = $post->wyniki_wartosci_uzytkowej;
        $buhaj->aktualne_wyniki_oceny_genetycznej = $post->aktualne_wyniki_oceny_genetycznej;
        $buhaj->wady_genetyczne = $post->wady_genetyczne;
        $buhaj->indywidualny_numer_identyfikacyjny = $post->indywidualny_numer_identyfikacyjny;
        $buhaj->odniesienie_swiadectwa_zootechnicznego = $post->odniesienie_swiadectwa_zootechnicznego;
        $buhaj->kolor_opakowan = $post->kolor_opakowan;
        $buhaj->liczba_opakowan = $post->liczba_opakowan;
        $buhaj->miejsce_pobrania_nasienia = $post->miejsce_pobrania_nasienia;
        $buhaj->data_pobrania_nasienia = $post->data_pobrania_nasienia;
        $buhaj->numer_zatwierdzenia = $post->numer_zatwierdzenia;
        $buhaj->miejsce_przezaczenia = $post->miejsce_przezaczenia;
        $buhaj->w_dniu = $post->w_dniu;
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
        $client->adres = $post->adres;
        if($client->validate()){
            $client->save();
            return [
                'error' => false,
                'message' => null,
            ];
        }
    }
}