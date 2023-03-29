<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;


class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('codeClient', null, [
            //     'disabled'=>true,
            //     'help'=>"Bien retenir ce code, il vous servira dans le future.",
            // ])
            // ->add('updatedAt')
            ->add('zoneLivraisonPreferentielle', null, [
                "label"=> "Zone preferrentielle de livraison",
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => "Accepter nos condtions d'inscription.",
                'mapped' => false,
                'constraints' => [
                        new IsTrue([
                            'message' => 'Vous devez accepter les accords.',
                        ]),
                    ],
                ])
            ->add('identite', IdentiteType::class)
            ->add('adresse', AdresseType::class)
            // ->add('password', RepeatedType::class, [
            //     'type' => PasswordType::class,
            //     'invalid_message' => 'Les deux champs doivent corrrespondrent.',
            //     'options' => ['attr' => ['class' => 'password-field']],
            //     'required' => true,
            //     'first_options'  => ['label' => 'Mot de passe'],
            //     'second_options' => ['label' => 'Repeter le mot de passe '],
            // ])
            // ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
