<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-13
 * @version 2014-11-13
 */

namespace NasRecAdmin\Controller;

class Position extends AbstractController
{
    public function indexAction()
    {
        $positions = $this->entity('NasRec:Position')->createQueryBuilder('p')
            ->orderBy('p.name')
            ->addOrderBy('p.endDate', 'DESC')

            ->getQuery()
            ->getResult()
        ;

        return array(
            'positions' => $positions,
        );
    }
} 
