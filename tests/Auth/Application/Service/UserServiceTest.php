<?php

namespace App\Tests\Auth\Application\Service;

use App\Auth\Application\Service\UserService;
use App\Auth\Domain\Entity\User;
use App\Auth\Domain\RepositoryInterface\UserRepositoryInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserServiceTest extends WebTestCase
{
    private $userService;
    private $userRepository;

    protected function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->userPasswordRepository = $this->createMock(UserPasswordHasherInterface::class);
        $this->userService = new UserService($this->userRepository, $this->userPasswordRepository);
    }

    public function testUserCanBeRegistered(): void
    {
        $email = 'test@example.com';
        $password = 'password';

        $this->userRepository->expects($this->once())
            ->method('save')
            ->with($this->isInstanceOf(User::class));

        $this->userService->register($email, $password);
    }
}