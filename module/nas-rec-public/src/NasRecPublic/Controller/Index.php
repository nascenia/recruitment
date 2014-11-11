<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRecPublic\Controller;

class Index extends AbstractController
{
    public function indexAction()
    {
        if ($user = $this->identity()) {
            $openApps = $this->entity('NasRec:Application')->createQueryBuilder('a')
                ->leftJoin('a.user', 'u')
                ->andWhere('u = :user')
                ->setParameter('user', $user)

                ->leftJoin('a.position', 'p')
                ->andWhere('p.endDate >= :endDate')
                ->setParameter('endDate', new \DateTime('-1 month'))
            ;

            return array(
                'openApps' => $openApps,
            );
        }
    }
} 
