<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326205717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_livraison ADD COLUMN photo1170x500 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE page_policy ADD COLUMN photo1170x500 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE page_term_condition ADD COLUMN photo1170x500 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__page_livraison AS SELECT id, contenu, created_at, updated_at FROM page_livraison');
        $this->addSql('DROP TABLE page_livraison');
        $this->addSql('CREATE TABLE page_livraison (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO page_livraison (id, contenu, created_at, updated_at) SELECT id, contenu, created_at, updated_at FROM __temp__page_livraison');
        $this->addSql('DROP TABLE __temp__page_livraison');
        $this->addSql('CREATE TEMPORARY TABLE __temp__page_policy AS SELECT id, contenu, created_at, updated_at FROM page_policy');
        $this->addSql('DROP TABLE page_policy');
        $this->addSql('CREATE TABLE page_policy (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO page_policy (id, contenu, created_at, updated_at) SELECT id, contenu, created_at, updated_at FROM __temp__page_policy');
        $this->addSql('DROP TABLE __temp__page_policy');
        $this->addSql('CREATE TEMPORARY TABLE __temp__page_term_condition AS SELECT id, contenu, created_at, updated_at FROM page_term_condition');
        $this->addSql('DROP TABLE page_term_condition');
        $this->addSql('CREATE TABLE page_term_condition (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO page_term_condition (id, contenu, created_at, updated_at) SELECT id, contenu, created_at, updated_at FROM __temp__page_term_condition');
        $this->addSql('DROP TABLE __temp__page_term_condition');
    }
}
