<?php

namespace App\Auth\Infraestructure\Doctrine\Repository;

use App\Auth\Domain\Entity\User;
use App\Auth\Domain\RepositoryInterface\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        $class = $entityManager->getClassMetadata(User::class);
        parent::__construct($entityManager, $class);
    }

    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
