<?php

namespace Puphpet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VagrantfileLinodeController extends Controller
{
    public function indexAction(array $data)
    {
        return $this->render('PuphpetMainBundle:vagrantfile-linode:form.html.twig', [
            'data' => $data,
        ]);
    }

    public function multiMachineAction()
    {
        return $this->render('PuphpetMainBundle:vagrantfile-linode/sections:multi-machine.html.twig', [
            'multi_machine' => $this->getData()['empty_multi_machine'],
            'datacenters'   => $this->getData()['datacenters'],
        ]);
    }

    public function syncedFolderAction()
    {
        return $this->render('PuphpetMainBundle:vagrantfile-linode/sections:synced-folder.html.twig', [
            'synced_folder' => $this->getData()['empty_synced_folder'],
        ]);
    }

    /**
     * @return array
     */
    private function getData()
    {
        $manager = $this->get('puphpet.extension.manager');
        return $manager->getExtensionAvailableData('vagrantfile-linode');
    }
}
