<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): void
    {
    echo view('front/head_view');
    echo view('front/navbar_view');
    echo view('front/darkmode_button_view');
    echo view('front/principal'); 
    echo view('front/footer_view');
    }

    public function quienes_somos(): void
    {
    echo view('front/head_view');

    echo view('front/navbar_view');
    echo view('front/darkmode_button_view');
    echo view('front/quienes_somos');   
    echo view('front/footer_view');
    }    

    public function acerca_de(): void
    {
        echo view('front/head_view');   
        echo view('front/navbar_view');
        echo view('front/darkmode_button_view');
        echo view('front/acerca_de');       
        echo view('front/footer_view');
    }
    public function registro(): void
    {
        echo view('front/head_view');  
        echo view('front/navbar_view');
        echo view('front/darkmode_button_view');
        echo view('front/registro');     
        echo view('front/footer_view');
    }
    public function login(): void
    {
        echo view('front/head_view');     
        echo view('front/navbar_view');
        echo view('front/darkmode_button_view');
        echo view('front/login');
        echo view('front/footer_view');
    }

    public function contacto(): void
    {
        echo view('front/head_view');     
        echo view('front/navbar_view');
        echo view('front/darkmode_button_view');
        echo view('front/contacto');
        echo view('front/footer_view');
    }
}
