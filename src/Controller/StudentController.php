<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="app_student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    /**
     * @Route("/fetch", name="app_student_fetch")
     */
    public function fetch(StudentRepository $repo){

        $results = $repo->findAll();

        return $this->render('student/test.html.twig', ['students'=> $results ]);
    }
    /**
     * @Route("/add", name="app_student_fetch")
     */
    public function add(ManagerRegistry $mr , StudentRepository $studentRepository ){
        $s = new Student();
        $s->setName('chourabi');
        $s->setEmail('chourabiaziz@gmail.com');
        $s->setAge(27);

        $studentRepository->add($s);

        return $this->render('student/test.html.twig', [ ]);
    }




}
