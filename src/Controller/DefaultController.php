<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Cliente;
use Symfony\Component\VarDumper\VarDumper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/symfony_intermediario", name="default")
     * @template("default/index.html.twig")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $qts_animais = $em->getRepository(Cliente::class)->qtsAnimaisPorCliente();

        $qte_racas = $em->getRepository(Animal::class)->qtsPorRaca();

        //VarDumper::dump($qte_racas);

        return [
            'qts_animais' => $qts_animais,
            'qtde_por_raca' => $qte_racas
        ];
    }
}
