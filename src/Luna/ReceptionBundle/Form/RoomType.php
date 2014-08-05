<?php

namespace Luna\ReceptionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class: CompanyType
 *
 * @category Form
 *
 * @package  PlatformServiceBundle
 *
 * @see      AbstractType
 */
class RoomType extends AbstractType
{
    /**
     * buildForm
     *
     * @param FormBuilderInterface $builder The FormBuilderInterface
     * @param array                $options The options
     *
     * @return null
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('roomId')
                ->add('numberOfBeds')
                ->add('floor')
                ->add('isActive')
                ->add('hasTv')
                ->add('hasClimatization')
                ->add('hasFridge')
                ->add('hasSafe')
                ->add('isCleaned')
                ->add('isBookingRoom')
                ->add('save', 'submit');
    }

    /**
     * buildForm
     *
     * @param OptionsResolverInterface $resolver The OptionsResolverInterface
     *
     * @return null
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Luna\ReceptionBundle\Entity\Room',
                'csrf_protection' => false
            )
        );
    }

    /**
     * getName
     *
     * @return string
     */
    public function getName()
    {
        return 'company';
    }

}
