<?php

namespace Puphpet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VagrantfileRackspaceController extends Controller
{
    public function indexAction(array $data)
    {
        return $this->render('PuphpetMainBundle:vagrantfile-rackspace:form.html.twig', [
            'data' => $data,
        ]);
    }

    public function multiMachineAction()
    {
        return $this->render('PuphpetMainBundle:vagrantfile-rackspace/sections:multi-machine.html.twig', [
            'multi_machine' => $this->getData()['empty_multi_machine'],
            'regions'       => $this->getData()['regions'],
        ]);
    }

    public function syncedFolderAction()
    {
        return $this->render('PuphpetMainBundle:vagrantfile-rackspace/sections:synced-folder.html.twig', [
            'synced_folder' => $this->getData()['empty_synced_folder'],
        ]);
    }

    /**
     * @return array
     */
    private function getData()
    {
        $manager = $this->get('puphpet.extension.manager');
        return $manager->getExtensionAvailableData('vagrantfile-rackspace');
    }
}
