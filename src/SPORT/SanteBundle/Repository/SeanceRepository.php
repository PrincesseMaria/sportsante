<?php

namespace SPORT\SanteBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\Expr\Comparison;

/**
 * SeanceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SeanceRepository extends \Doctrine\ORM\EntityRepository {

    function findSeanceAllBydate() {
        
        echo '<p> <br/>';
        
        echo '<p> <br/>';
        echo '<p> <br/>';
        $datetime = date('Y-m-d');
        
        

       
        $qb = $this->createQueryBuilder('Seance');

                $qb->innerJoin('Seance.salle', 'sa')
                ->addSelect('sa')
                ->leftJoin('Seance.creneaux', 'cre')
                ->addSelect('cre')
                ->where('Seance.dateSeance>=?1')
                ->orderBy('Seance.dateSeance', 'ASC')
                ->setParameters(array(1 => $datetime));
        // Enfin, on retourne le résultat
        $resul=$qb
                        ->getQuery()
                        ->getResult();
        
      
        return $resul;
    }

     

}

?>