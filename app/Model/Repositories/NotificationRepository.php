<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * NotificationRepository
 *
 * This class was generated by the PhpStorm "Php Annotations" Plugin. Add your own custom
 * repository methods below.
 */
class NotificationRepository extends EntityRepository
{
    /**
     *
     * @param User $user
     * @return array
     */
    public function findFor($user)
    {
        $queryString = 'SELECT notification ' .
            'FROM Solvre\Model\Entities\Notification notification ' .
            'LEFT JOIN notification.user user ' .
            'WHERE user.id = :user ' .
            'AND notification.isRead = false ' .
            ''
        ;
//
        /** @var Query $query */
        $query = $this->_em->createQuery($queryString);
        $query->setParameter('user', 0);
        return $query->setMaxResults('5')->getResult();
    }
}
