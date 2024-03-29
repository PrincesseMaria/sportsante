<?php

namespace SPORT\LocationBundle\Repository;
use SPORT\LocationBundle\Entity\Materiel;
/**
 * CommandeMaterielRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommandeMaterielRepository extends \Doctrine\ORM\EntityRepository
{
    
     function findCommandeMaterielById($id) {
        $qb = $this->createQueryBuilder('Materiel')
                ->innerJoin('Materiel.commande', 'mat')
                ->addSelect('mat')               
                ->where('mat.id=?1')
                ->setParameters(array(1 => $id));
        // Enfin, on retourne le résultat
        $resul = $qb
                ->getQuery()
                ->getResult();
        return $resul;
    }  

}
