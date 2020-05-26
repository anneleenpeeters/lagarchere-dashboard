<?php

namespace App\Form\DataTransformer;

use App\Entity\Dienst;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;

class StringToArrayTransformer implements DataTransformerInterface {

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function transform($value)
    {
        return implode(', ', $value);
    }

    public function reverseTransform($value)
    {
        $names = array_unique(array_filter(array_map('trim', explode(',', $value))));

        $diensts = $this->entityManager->getRepository(Dienst::class)->findBy([
            'omschrijving' => $names,
        ]);

        $newNames = array_diff($names, $diensts);

        foreach ($newNames as $name){
            $dienst = new Dienst();
            $dienst->setOmschrijving($name);
            $diensts[] = $dienst;
        }

        return $diensts;
    }

}