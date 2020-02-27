<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomEvent')
                //->add('dateCreation',DateTimeType::class,array('label' => 'pays','attr' => array('class' => 'datepicker')))
                ->add('file')
                ->add('adresse');
//                ->add('capital');
                //->add('chefId');
                //->add('image');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_event';
    }


}
