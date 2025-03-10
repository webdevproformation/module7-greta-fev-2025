<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306134438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette ADD COLUMN image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__recette AS SELECT id, auteur_id, titre, description, prix, dt_creation FROM recette');
        $this->addSql('DROP TABLE recette');
        $this->addSql('CREATE TABLE recette (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, auteur_id INTEGER DEFAULT NULL, titre VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, prix INTEGER NOT NULL, dt_creation DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_49BB639060BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO recette (id, auteur_id, titre, description, prix, dt_creation) SELECT id, auteur_id, titre, description, prix, dt_creation FROM __temp__recette');
        $this->addSql('DROP TABLE __temp__recette');
        $this->addSql('CREATE INDEX IDX_49BB639060BB6FE6 ON recette (auteur_id)');
    }
}
