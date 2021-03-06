<?php

namespace AppBundle\Form;

use AppBundle\Entity\Monster;
use AppBundle\Entity\MonsterType as MonsterTypeEntity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonsterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ])
            ->add('isUnique', CheckboxType::class, [
                'required' => false,
                'help' => 'Check this if the monster is a known named individual.'
            ])
            ->add('types', EntityType::class, [
                'choice_label' => 'name',
                'required' => true,
                'class' => MonsterTypeEntity::class,
                'multiple' => true,
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Monster::class
        ]);
    }
}
