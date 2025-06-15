<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): void
    {
    $data['titulo']='Página principal';
    echo view('front/head_view',$data);
    echo view('front/navbar_view');
    echo view('front/darkmode_button_view');
    echo view('front/principal'); 
    echo view('front/footer_view');
    }

    public function quienes_somos(): void
    {
    $data['titulo']='Quiénes somos';
    echo view('front/head_view',$data);

    echo view('front/navbar_view');
    echo view('front/darkmode_button_view');
    echo view('front/quienes_somos');   
    echo view('front/footer_view');
    }    

    public function acerca_de(): void
    {
        $data['titulo']='Acerca de';
        echo view('front/head_view',$data);   
        echo view('front/navbar_view');
        echo view('front/darkmode_button_view');
        echo view('front/acerca_de');       
        echo view('front/footer_view');
    }
    public function registro(): void
    {
        $data['titulo']='Registro';
        echo view('front/head_view',$data);  
        echo view('front/navbar_view');
        echo view('front/darkmode_button_view');
        echo view('back/usuario/registro');     
        echo view('front/footer_view');
    }
    public function login(): void
    {
        $data['titulo']='Login';
        echo view('front/head_view',$data);     
        echo view('front/navbar_view');
        echo view('front/darkmode_button_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
    }

    public function contacto(): void
    {
        $data['titulo']='Contacto';
        echo view('front/head_view',$data);     
        echo view('front/navbar_view');
        echo view('front/darkmode_button_view');
        echo view('front/contacto'); //Ver si también contacto va en el back
        echo view('front/footer_view');
    }
}
