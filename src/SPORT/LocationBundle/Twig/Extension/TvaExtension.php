<?php
namespace SPORT\LocationBundle\Twig\Extension;

class TvaExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('tva', array($this,'calculTva')));
    }
    
    function calculTva($prixHT,$tva)
    {
        return $prixHT *(1+$tva);
    }
    
    public function getName()
    {
        return 'tva_extension';
    }
}