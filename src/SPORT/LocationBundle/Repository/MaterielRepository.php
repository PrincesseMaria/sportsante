<?php

namespace SPORT\LocationBundle\Repository;

/**
 * MaterielRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MaterielRepository extends \Doctrine\ORM\EntityRepository {

    function findMaterielById($id) {
        $qb = $this->createQueryBuilder('Materiel')
                ->innerJoin('Materiel.category', 'cat')
                ->addSelect('cat')
                ->where('cat.id=?1')
                ->setParameters(array(1 => $id));
        // Enfin, on retourne le résultat
        $resul = $qb
                ->getQuery()
                ->getResult();
        return $resul;
    }

    function findArray($array) {

        $qb = $this->createQueryBuilder('Materiel')
                ->where('Materiel.id IN (:array)')
                ->setParameter('array', $array);

        $resul = $qb
                ->getQuery()
                ->getResult();
        return $resul;
    }
    
   

}