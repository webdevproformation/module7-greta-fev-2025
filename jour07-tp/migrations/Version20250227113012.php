<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250227113012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD COLUMN prix DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, titre, url_img, description, duree, auteur, dt_creation FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, url_img VARCHAR(255) NOT NULL, description CLOB NOT NULL, duree INTEGER UNSIGNED DEFAULT 1 NOT NULL, auteur VARCHAR(255) NOT NULL, dt_creation DATETIME NOT NULL)');
        $this->addSql('INSERT INTO article (id, titre, url_img, description, duree, auteur, dt_creation) SELECT id, titre, url_img, description, duree, auteur, dt_creation FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
    }
}
