<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230327074637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, identite_id, adresse_id, code_pays_id, email, roles, password, created_at, updated_at, role_principal, code_client, is_client_ordinaire FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identite_id INTEGER DEFAULT NULL, adresse_id INTEGER DEFAULT NULL, code_pays_id INTEGER DEFAULT NULL, zone_livraison_preferentielle_id INTEGER DEFAULT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , role_principal VARCHAR(255) DEFAULT NULL, code_client VARCHAR(255) NOT NULL, is_client_ordinaire BOOLEAN NOT NULL, CONSTRAINT FK_8D93D649E5F13C8F FOREIGN KEY (identite_id) REFERENCES identite (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D93D6494DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D93D6499E4306D8 FOREIGN KEY (code_pays_id) REFERENCES tc_pays (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D93D6498A4E0C84 FOREIGN KEY (zone_livraison_preferentielle_id) REFERENCES zone_livraison (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user (id, identite_id, adresse_id, code_pays_id, email, roles, password, created_at, updated_at, role_principal, code_client, is_client_ordinaire) SELECT id, identite_id, adresse_id, code_pays_id, email, roles, password, created_at, updated_at, role_principal, code_client, is_client_ordinaire FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE INDEX IDX_8D93D6499E4306D8 ON user (code_pays_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6494DE7DC5C ON user (adresse_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E5F13C8F ON user (identite_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE INDEX IDX_8D93D6498A4E0C84 ON user (zone_livraison_preferentielle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, identite_id, adresse_id, code_pays_id, email, roles, password, created_at, updated_at, role_principal, code_client, is_client_ordinaire FROM "user"');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identite_id INTEGER DEFAULT NULL, adresse_id INTEGER DEFAULT NULL, code_pays_id INTEGER DEFAULT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , role_principal VARCHAR(255) DEFAULT NULL, code_client VARCHAR(255) NOT NULL, is_client_ordinaire BOOLEAN NOT NULL, CONSTRAINT FK_8D93D649E5F13C8F FOREIGN KEY (identite_id) REFERENCES identite (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D93D6494DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D93D6499E4306D8 FOREIGN KEY (code_pays_id) REFERENCES tc_pays (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO "user" (id, identite_id, adresse_id, code_pays_id, email, roles, password, created_at, updated_at, role_principal, code_client, is_client_ordinaire) SELECT id, identite_id, adresse_id, code_pays_id, email, roles, password, created_at, updated_at, role_principal, code_client, is_client_ordinaire FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E5F13C8F ON "user" (identite_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6494DE7DC5C ON "user" (adresse_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499E4306D8 ON "user" (code_pays_id)');
    }
}
