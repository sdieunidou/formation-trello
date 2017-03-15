<?php

namespace AppBundle\Serializer\Normalizer;

use AppBundle\Entity\Task;

/**
 * TaskNormalizer.
 */
class TaskNormalizer extends AbstractNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        /* @var Task $object */
        return [
            'id' => $object->getId(),
            'name' => $object->getName(),
            'description' => $object->getDescription(),
            'status' => $object->getStatus(),
            'category' => $this->normalizeObject($object->getCategory(), $format, $context),
            'createdAt' => $object->getCreatedAt()->format('d-m-Y H:i:s'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Task;
    }
}
