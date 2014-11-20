<?php

namespace TDDV\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageCType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateTDDV', 'date', array(
                                                'widget' => 'single_text',
                                                'input' => 'datetime',
                                                'format' => 'dd/MM/yyyy',
                                                'label' => 'Date',
//                                                'attr' => array('class' => 'date-picker'),
                                                ))
            ->add('typeDateTDDV', 'choice', array(
                                                'choices' => array('none' => 'NONE', 'am' => 'AM', 'pm' => 'PM'),
                                                'preferred_choices' => array('none'),
                                                'expanded' => 'false',
                                                'label' =>'Type',
                                                'attr' => array('class' => 'radio-list'),
                                                ))
            ->add('predicateur', 'entity', array(
                                                'class'=>'TDDVCommandeBundle:Predicateur', 
                                                'property'=> 'Infos'
                                                ))
            ->add('titre')
            ->add('type', 'choice', array(
                                                'choices' => array('dvd' => 'DVD', 'mp3' => 'MP3', 'wav' => 'WAV'),
                                                'preferred_choices' => array('dvd'),
                                                'expanded' => 'false',
                                                'attr' => array('class' => 'radio-list'),
                                                ))
            ->add('numeroCd', 'number')

            ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TDDV\CommandeBundle\Entity\Message'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tddv_commandebundle_messagectype';
    }
}
