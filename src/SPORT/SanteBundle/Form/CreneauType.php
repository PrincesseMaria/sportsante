<?php

namespace SPORT\SanteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use SPORT\SanteBundle\Form\CreneauType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class CreneauType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('heuredCreneau', TimeType::class, array(
                    'placeholder' => array(
                        'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
            )))
                ->add('heurefCreneau', TimeType::class, array(
                    'placeholder' => array(
                        'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
            )))
                ->add('nbplaceCreneau')->add('nomActiviteCreneau')
                ->add('seance', EntityType::class, array(
                    'class' => 'SPORTSanteBundle:Seance',
                    'choice_label' => function ($seance) {
                        $result = $seance->getDateSeance()->format('d-m-Y');
                        return $seance->getJourSeance() . "  " . $result;
                    },
                    'multiple' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SPORT\SanteBundle\Entity\Creneau'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'sport_santebundle_creneau';
    }

}
