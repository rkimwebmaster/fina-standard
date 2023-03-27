<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326205022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_qsn ADD COLUMN photo1170x500 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__page_qsn AS SELECT id, contenu, created_at, updated_at FROM page_qsn');
        $this->addSql('DROP TABLE page_qsn');
        $this->addSql('CREATE TABLE page_qsn (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO page_qsn (id, contenu, created_at, updated_at) SELECT id, contenu, created_at, updated_at FROM __temp__page_qsn');
        $this->addSql('DROP TABLE __temp__page_qsn');
    }
}
