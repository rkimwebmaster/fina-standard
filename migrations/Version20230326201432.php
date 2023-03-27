<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326201432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__entreprise AS SELECT id, idnat, rccm, sigle, logo, description, responsable, image_gauche FROM entreprise');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, idnat VARCHAR(255) NOT NULL, rccm VARCHAR(255) NOT NULL, sigle VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, nom_entreprise VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, phone_number VARCHAR(14) NOT NULL, email VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, whatsapp_number VARCHAR(14) NOT NULL, linked_in VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, newsbg389x454 VARCHAR(255) DEFAULT NULL, menu_banner295x320_premier VARCHAR(255) DEFAULT NULL, menu_banner295x320_deuxieme VARCHAR(255) DEFAULT NULL, menu_banner295x320_troisieme VARCHAR(255) DEFAULT NULL, main_banner1903x650_un VARCHAR(255) DEFAULT NULL, main_banner1903x650_deux VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO entreprise (id, idnat, rccm, sigle, logo, description, responsable, facebook) SELECT id, idnat, rccm, sigle, logo, description, responsable, image_gauche FROM __temp__entreprise');
        $this->addSql('DROP TABLE __temp__entreprise');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__entreprise AS SELECT id, idnat, rccm, sigle, logo, description, responsable FROM entreprise');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, adresse_id INTEGER NOT NULL, idnat VARCHAR(255) NOT NULL, rccm VARCHAR(255) NOT NULL, sigle VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , email_entreprise VARCHAR(255) NOT NULL, telephone_entreprise VARCHAR(255) NOT NULL, website_entreprise VARCHAR(255) NOT NULL, image_hero_primaire VARCHAR(255) NOT NULL, image_hero_secondaire VARCHAR(255) NOT NULL, image_gauche VARCHAR(255) DEFAULT NULL, image_menu1 VARCHAR(255) NOT NULL, image_menu2 VARCHAR(255) NOT NULL, image_menu3 VARCHAR(255) NOT NULL, CONSTRAINT FK_D19FA604DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO entreprise (id, idnat, rccm, sigle, logo, description, responsable) SELECT id, idnat, rccm, sigle, logo, description, responsable FROM __temp__entreprise');
        $this->addSql('DROP TABLE __temp__entreprise');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA604DE7DC5C ON entreprise (adresse_id)');
    }
}
