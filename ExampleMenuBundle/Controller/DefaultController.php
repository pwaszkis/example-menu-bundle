<?php

namespace GajdaW\ExampleMenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gedmo\Sluggable\Mapping\Driver\Annotation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * Finds and displays a Menu entity.
     *
     * @Route("/{slug}", name="_menu_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GajdaWExampleMenuBundle:Menu')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Menu entity.');
        }

        return array('entity' => $entity);
    }
}
