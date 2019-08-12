<?php

namespace App\DataFixtures;

use App\Entity\Lecturer;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    const LECTURERS = [
      [
          'firstName' => 'Nikolai',
          'middleName' => 'Tsvetanov',
          'lastName' => 'Georgiev',
          'email' => 'nikolai.georgiev@gmail.com',
          'academicTitle' => 'Assistant',
          'scientificTitle' => 'Engineer',
          'contract' => 'Guest',
          'estHours' => '90',
      ]
    ];

    const USERS = [
        [
            'name' => 'Nikolai Georgiev',
            'username' => 'admin',
            'email' => 'admin@uni-scheduler.com',
            'password' => '123qwe',
        ],
    ];

    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::USERS as $data) {
            $user = new User();
            $user->setUsername($data['username']);
            $user->setEmail($data['email']);
            $user->addRole('ROLE_ADMIN');
            $user->setName($data['name']);
            $password = $this->encoder->encodePassword($user, $data['password']);
            $user->setPassword($password);

            $manager->persist($user);
        }

        foreach (self::LECTURERS as $data) {
            $lecturer = new Lecturer();
            $lecturer->setFirstName($data['firstName']);
            $lecturer->setMiddleName($data['middleName']);
            $lecturer->setLastName($data['lastName']);
            $lecturer->setEmail($data['email']);
            $lecturer->setAcademicTitle($data['academicTitle']);
            $lecturer->setScientificTitle($data['scientificTitle']);
            $lecturer->setContract($data['contract']);
            $lecturer->setEstHours($data['estHours']);

            $manager->persist($lecturer);
        }

        $manager->flush();
    }
}
