<?php

namespace SPORT\LocationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use SPORT\LocationBundle\Form\CategoryType;
use SPORT\LocationBundle\Form\ImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class MaterielType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('materielNom')->add('materielMarque')->add('materielPrixlocation')->add('tvaPrix')->add('quantite')
                ->add('category', EntityType::class, array(
                    'class' => 'SPORTLocationBundle:Category',
                    'choice_label' => function ($category) {

                        return $category->getCategoryNom();
                    },
                    'multiple' => false,
                ))
                ->add('image', ImageType::class)
                ->add('description', CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    //...
                    ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SPORT\LocationBundle\Entity\Materiel'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'sport_locationbundle_materiel';
    }

}
