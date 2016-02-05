<?php

namespace Puphpet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VagrantfileLocalController extends Controller
{
    public function indexAction(array $data)
    {
        return $this->render('PuphpetMainBundle:vagrantfile-local:form.html.twig', [
            'data' => $data,
        ]);
    }

    public function multiMachineAction()
    {
        return $this->render('PuphpetMainBundle:vagrantfile-local/sections:multi-machine.html.twig', [
            'multi_machine' => $this->getData()['empty_multi_machine'],
        ]);
    }

    public function syncedFolderAction()
    {
        return $this->render('PuphpetMainBundle:vagrantfile-local/sections:synced-folder.html.twig', [
            'synced_folder' => $this->getData()['empty_synced_folder'],
        ]);
    }

    public function forwardedPortAction()
    {
        return $this->render('PuphpetMainBundle:vagrantfile-local/sections:forwarded-port.html.twig', [
            'forwarded_port' => $this->getData()['empty_forwarded_port'],
        ]);
    }

    public function multiMachineForwardedPortAction(Request $request)
    {
        return $this->render('PuphpetMainBundle:vagrantfile-local/sections:multi-machine-forwarded-port.html.twig', [
            'mmId'           => $request->get('mmId'),
            'forwarded_port' => $this->getData()['empty_forwarded_port'],
        ]);
    }

    /**
     * @return array
     */
    private function getData()
    {
        $manager = $this->get('puphpet.extension.manager');
        return $manager->getExtensionAvailableData('vagrantfile-local');
    }
}
