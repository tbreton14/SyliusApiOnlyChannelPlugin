<?php
namespace Tbreton14\SyliusApiOnlyChannelPlugin\src\Form\Extension;

use Sylius\Bundle\ChannelBundle\Form\Type\ChannelType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ChannelTypeExtension extends AbstractTypeExtension {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder->add('apiOnly', CheckboxType::class, [
            'required' => false,
            'label' => 'API Only Channel',
        ]);
    }

    public static function getExtendedTypes(): iterable {
        return [ChannelType::class];
    }
}
