<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250224115023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant ADD COLUMN telephone VARCHAR(10) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__etudiant AS SELECT id, prenom, nom, age, dt_naissance, is_admin FROM etudiant');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('CREATE TABLE etudiant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, age SMALLINT UNSIGNED DEFAULT 10 NOT NULL, dt_naissance DATETIME NOT NULL, is_admin BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO etudiant (id, prenom, nom, age, dt_naissance, is_admin) SELECT id, prenom, nom, age, dt_naissance, is_admin FROM __temp__etudiant');
        $this->addSql('DROP TABLE __temp__etudiant');
    }
}
