<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326203434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__categorie AS SELECT id, designation, description, created_at, updated_at, photo1170x500 FROM categorie');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , photo1170x500 VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO categorie (id, designation, description, created_at, updated_at, photo1170x500) SELECT id, designation, description, created_at, updated_at, photo1170x500 FROM __temp__categorie');
        $this->addSql('DROP TABLE __temp__categorie');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD COLUMN photo VARCHAR(255) NOT NULL');
    }
}
