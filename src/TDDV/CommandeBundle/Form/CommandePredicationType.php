<?php

namespace TDDV\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommandePredicationType extends AbstractType
{
   /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('produit', 'entity', array(
                                                'class'=>'TDDVCommandeBundle:Predication', 
                                                'property'=> 'Infos'
                                                ))   
            ->add('quantite');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TDDV\CommandeBundle\Entity\CommandeProduit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tddv_commandebundle_commandeproduittype';
    }
}

?>
