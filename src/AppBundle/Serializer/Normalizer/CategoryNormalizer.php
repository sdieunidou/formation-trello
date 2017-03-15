<?php

namespace AppBundle\Serializer\Normalizer;

use AppBundle\Entity\Category;

/**
 * CategoryNormalizer.
 */
class CategoryNormalizer extends AbstractNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        /* @var Category $object */
        return [
            'id' => $object->getId(),
            'name' => $object->getName(),
            'createdAt' => $object->getCreatedAt()->format('d-m-Y H:i:s'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Category;
    }
}
