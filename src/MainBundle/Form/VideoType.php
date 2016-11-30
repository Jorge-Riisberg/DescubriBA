<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class VideoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
                ->add('puntodeinteres','entity', array( 'label'=>'Punto de interes',
                                                        'class'=>'MainBundle:Puntodeinteres',
                                                        'query_builder' => function(EntityRepository $er) { return $er->createQueryBuilder('p')->orderBy('p.nombre', 'ASC'); },
                                                        'placeholder' => '',
                                                        'property'=>'nombre' ))
                ->add('enlace');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\Video'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainbundle_video';
    }


}
