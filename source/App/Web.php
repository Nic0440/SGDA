<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;
use Source\Models\Faq;
use Source\Models\Class_;
use Source\Models\Calendar;
use Source\Models\Timetable;

class Web
{

    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web", "php");
    }

    public function home()
    {
        echo $this->view->render("home", []);
    }

    public function register()
    {
        // $user = new User("Fernando", "fernando@gmail.com", "987654");
        // var_dump($user);

        // echo $this->view->render("register", [
        //     "users" => $user->selectAll()
        // ]);
        echo $this->view->render("register", []);
    }

    public function about()
    {
        echo $this->view->render("about", []);
    }


    public function location()
    {
        $name = "Fábio Santos";
        echo $this->view->render("location", [
            "name" => "Nicolas",
            "email" => "nicolaslemes.ch585@academico.ifsul.edu.br"
        ]);
    }

    public function blog()
    {
        echo "esse é o meu blog bonitinho...";
    }

    public function faq()
    {
        $faqs = new Faq();
        echo $this->view->render("faq", [
            "faqs" => $faqs->selectAll()
        ]);
    }

    public function chart()
    {
        echo "Carrinho de compras";
    }

    public function timetable(array $data): void
    {
        $classes = new Class_();
        $timetables = new Timetable();

        if (!empty($data["turma"])) {
            echo $this->view->render("timetable", [
                "timetable" => $timetables->selectAll(),
                "class" => $timetables->selectByClass($data['turma']),
                "classes" => $classes->selectAll()
            ]);
            return;
        }
        echo $this->view->render("timetable", [
            "timetable" => $timetables->selectAll(),
            "classes" => $classes->selectAll()
        ]);
    }

    public function error(array $data): void
    {
        var_dump($data);
    }
    public function login()
    {
        echo $this->view->render("login", []);
    }
    public function contact()
    {
        echo $this->view->render("contact", []);
    }
    public function calendar()
    {
        $events = new Calendar();
        echo $this->view->render("calendar", [
            "events" => $events->selectAll()
        ]);
    }
    public function protocols()
    {
        echo $this->view->render("protocols", []);
    }
    public function classes()
    {
        $classes = new Class_();
        echo $this->view->render("classes", [
            "classes" => $classes->selectAll()
        ]);
    }
    public function schedules()
    {
    }
}
