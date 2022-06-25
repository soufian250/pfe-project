<?php


namespace ProjectBundle\EventListener;


use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class GlobalListener implements EventSubscriber
{

    /**
     * Returns an array of events this subscriber wants to listen to.
     * @return array
     */public function getSubscribedEvents()
        {
            return [
                Events::postPersist,
            ];
        }


    public function postPersist(LifecycleEventArgs $args)
    {

        $entity = $args->getObject();
        $em = $args->getEntityManager();

    }


}