<?php

namespace App\Controller;

use App\Entity\Vessel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class VesselApiController
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(
        ValidatorInterface $validator,    // Symfony Validator to validate user's input
        NormalizerInterface $normalizer,  // Can convert an object to an array (for the JsonResponse object)
        SerializerInterface $serializer   // We use them to deserialize from JSON to an object
    ) {
        $this->validator = $validator;
        $this->normalizer = $normalizer;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/api/vessels", methods={"POST"})
     */
    public function post(Request $request)
    {
        $vessel = $this->serializer->deserialize($request->getContent(), Vessel::class, 'json');

        $errors = $this->validator->validate($vessel);

        if (count($errors) > 0) {
            return JsonResponse::create(
                $this->normalizer->normalize($errors),
                Response::HTTP_BAD_REQUEST // 400 Status code
            );
        }

        return JsonResponse::create(
            $this->normalizer->normalize($vessel),
            Response::HTTP_CREATED // 201 Status code
        );
    }
}
