<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Equipment;
use App\Entity\Health;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class EquipmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',
                TextType::class,
                [
                    'label' => 'Nom du matos',
                    'required' => true,
                    'attr' =>
                        [
                            'autofocus' => 'true',
                            'class' => 'form-control',
                            'placeholder' => 'ex: Shure SM57',
                        ],
                ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Catégorie du matos',
                'required' => true,
                'attr' =>
                    [
                        'class' => 'form-control',
                    ],
            ])
            ->add('health', EntityType::class, [
                'class' => Health::class,
                'choice_label' => 'name',
                'label' => 'État du matos',
                'required' => true,
                'attr' =>
                    [
                        'class' => 'form-control',
                    ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Image du matos',
                'mapped' => false,
                'required' => false,
                'attr' =>
                    [
                        'class' => 'form-control',
                    ],
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Veuillez choisir une image JPG, PNG ou WebP',
                    ])
                ],
            ])
            ->add('description',
                TextareaType::class,
                [
                    'label' => 'Description du matos',
                    'required' => false,
                    'attr' =>
                        [
                            'class' => 'form-control',
                            'placeholder' => 'ex: à quoi ça sert, accessoires inclus, …',
                            'rows' => 6,
                        ],
                ])
            ->add('price',
                NumberType::class,
                [
                    'label' => 'Prix de référence',
                    'required' => false,
                    'invalid_message' => 'Veuillez saisir un nombre',
                    'attr' =>
                        [
                            'class' => 'form-control',
                            'min' => '0.00',
                            'step' => '0.01'
                        ],
                ])
            ->add('sellerUrl',
                TextType::class,
                [
                    'label' => 'URL revendeur',
                    'required' => false,
                    'attr' =>
                        [
                            'class' => 'form-control',
                            'placeholder' => 'ex: https://www.thomann.de/fr/shure_sm57_lc.htm',
                        ],
                ])
            ->add('purchasedAt', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'label' => "Date d'acquisition du matos",
                'required' => false,
                'attr' =>
                    [
                        'class' => 'form-control',
                    ],
            ])
            ->add('bill', FileType::class, [
                'label' => 'Facture du matos',
                'mapped' => false,
                'required' => false,
                'attr' =>
                    [
                        'class' => 'form-control',
                    ],
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'Veuillez choisir un fichier PDF, ou une image JPG, PNG ou WebP',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipment::class,
        ]);
    }
}
