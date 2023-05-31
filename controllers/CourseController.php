<?php

namespace Formania\Controllers;

require 'BaseController.php';

use Formania\Controllers\BaseController;

class CourseController extends BaseController
{


    /**
     * Cette méthode affiche la liste des Courses
     *
     * @return void
     */
    public function index()
    {
        echo "<div>hello Course</div>";
        // On instancie le modèle "Course"
        $this->loadModel('/Course');

        // On stocke la liste des Courses dans $Courses
        // $Courses = $this->Course->getAll();

        // On envoie les données à la vue index
        // $this->render('index', compact('Courses'));
    }

    
    public function showAll()
    {
        echo "<div> course show all  </div>";
    }
    public function show($slug)
    {
        echo "<div> course show ".$slug."</div>";
    }


    /**
     * Méthode permettant d'afficher un cours à partir de son slug
     *
     * @param string $slug
     * @return void
     */
    public function lire(string $slug)
    {

        // On instancie le modèle "Course"
        // $this->loadModel('Course');

        // On stocke l'Course dans $Course
        // $Course = $this->Course->findBySlug($slug);

        // On envoie les données à la vue lire
        // $this->render('lire', compact('Course'));
    }
}
