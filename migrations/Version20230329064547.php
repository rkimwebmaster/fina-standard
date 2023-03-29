<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329064547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__client AS SELECT id, identite_id, adresse_id, zone_livraison_preferentielle_id, code_client, created_at, updated_at, password FROM client');
        $this->addSql('DROP TABLE client');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identite_id INTEGER NOT NULL, adresse_id INTEGER NOT NULL, zone_livraison_preferentielle_id INTEGER NOT NULL, code_client VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , password VARCHAR(255) NOT NULL, CONSTRAINT FK_C7440455E5F13C8F FOREIGN KEY (identite_id) REFERENCES identite (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C74404554DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C74404558A4E0C84 FOREIGN KEY (zone_livraison_preferentielle_id) REFERENCES zone_livraison (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO client (id, identite_id, adresse_id, zone_livraison_preferentielle_id, code_client, created_at, updated_at, password) SELECT id, identite_id, adresse_id, zone_livraison_preferentielle_id, code_client, created_at, updated_at, password FROM __temp__client');
        $this->addSql('DROP TABLE __temp__client');
        $this->addSql('CREATE INDEX IDX_C74404558A4E0C84 ON client (zone_livraison_preferentielle_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455E5F13C8F ON client (identite_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C74404554DE7DC5C ON client (adresse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD COLUMN email VARCHAR(255) NOT NULL');
    }
}
