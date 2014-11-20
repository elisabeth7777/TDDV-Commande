<?php
namespace TDDV\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PredicationCheckboxType
 *
 * @author Elisabeth
 */
class PredicationCheckboxType extends AbstractType{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $queryBuilder = 
        $builder
            ->add('predications', 'entity', array(
            'class' => 'TDDVCommandeBundle:Predication',
            'required' => false,
            'expanded' => true,
            'multiple' => true,
            'property'=> 'Infos'
                ))
                
            ;

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TDDV\CommandeBundle\Entity\Predication'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tddv_commandebundle_predication_checkboxtype';
    }
}

?>
