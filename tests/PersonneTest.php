<?php

namespace App\Tests;

use App\Entity\Personne;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;


class PersonneTest extends TestCase
{
    private Personne $person;

    protected function setUp(): void
    {
        $this->person = new Personne();
        $this->person->setNom('Doe');
        $this->person->setPrenom('John');
        $this->person->setAdresse('42 rue de la Paix');
    }

    public function test_getters(): void
    {
        assertEquals('Doe', $this->person->getNom());
        assertEquals('John', $this->person->getPrenom());
        assertEquals('42 rue de la Paix', $this->person->getAdresse());
    }

    public function test_setters(): void
    {
        $this->person->setNom('Smith');
        $this->person->setPrenom('Jane');
        $this->person->setAdresse('123 Main St');

        assertEquals('Smith', $this->person->getNom());
        assertEquals('Jane', $this->person->getPrenom());
        assertEquals('123 Main St', $this->person->getAdresse());
    }
}
