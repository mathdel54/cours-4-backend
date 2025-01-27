<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Faker;
use App\Entity\Personne;

#[AsCommand(
    name: 'app:immigrate',
    description: 'Ajoute des données de test dans la BDD'
)]
class ImmigrateCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $faker = Faker\Factory::create('fr_FR');

        $nom = $faker->lastName();
        $prenom = $faker->firstName();
        $adresse = $faker->address();

        $person = new Personne();
        $person->setNom($nom);
        $person->setPrenom($prenom);
        $person->setAdresse($adresse);
        
        $this->entityManager->persist($person);
        $this->entityManager->flush();

        $io->success('Les données ont été ajoutées avec succès !');

        return Command::SUCCESS;
    }
}