<?php

namespace SPORT\SanteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use SPORT\SanteBundle\Form\SalleType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SeanceType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('jourSeance')->add('dateSeance', DateType::class, array(
                    // render as a single text box
                    'widget' => 'single_text',))
                ->add('salle', EntityType::class, array(
                    'class' => 'SPORTSanteBundle:Salle',
                    'choice_label' => 'nomSalle',
                    'multiple' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SPORT\SanteBundle\Entity\Seance'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'sport_santebundle_seance';
    }

}
