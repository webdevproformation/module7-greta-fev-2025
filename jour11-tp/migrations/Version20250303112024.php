<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250303112024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
            email VARCHAR(255) NOT NULL, 
            prenom VARCHAR(255) NOT NULL, 
            nom VARCHAR(255) NOT NULL
        )');
        $this->addSql('CREATE TABLE commentaire (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
            recette_id INTEGER DEFAULT NULL, 
            email VARCHAR(255) NOT NULL, 
            sujet VARCHAR(255) NOT NULL, 
            message CLOB NOT NULL, 
            dt_creation DATETIME NOT NULL, 
            CONSTRAINT FK_67F068BC89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_67F068BC89312FE9 ON commentaire (recette_id)');
        $this->addSql('CREATE TABLE recette (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
            auteur_id INTEGER DEFAULT NULL, 
            titre VARCHAR(255) NOT NULL, description 
            CLOB DEFAULT NULL, 
            prix INTEGER NOT NULL, 
            dt_creation DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_49BB639060BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_49BB639060BB6FE6 ON recette (auteur_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
