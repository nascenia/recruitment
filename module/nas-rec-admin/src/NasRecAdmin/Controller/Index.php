<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-12
 * @version 2014-11-12
 */

namespace NasRecAdmin\Controller;

use NasRec\Entity;

class Index extends AbstractController
{
    public function indexAction()
    {
        $apps = $this->entity('NasRec:Application')->createQueryBuilder('a')
            ->where('a.status IN (:statuses)')
            ->setParameter('statuses', array(
                Entity\Application::STATUS_OPEN,
                Entity\Application::STATUS_IN_REVIEW,
                Entity\Application::STATUS_DECISION_PENDING,
            ))

            ->leftJoin('a.user', 'u')
            ->addSelect('u')

            ->leftJoin('a.position', 'p')
            ->addSelect('p')

            ->getQuery()
            ->getResult()
        ;

        return array(
            'applications' => $apps,
        );
    }
} 
