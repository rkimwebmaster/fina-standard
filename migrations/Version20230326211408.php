<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326211408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__team_member AS SELECT id, noms, fonction, description, facebook, twitter, dribble, pinterest, behance FROM team_member');
        $this->addSql('DROP TABLE team_member');
        $this->addSql('CREATE TABLE team_member (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, noms VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, dribble VARCHAR(255) DEFAULT NULL, pinterest VARCHAR(255) DEFAULT NULL, behance VARCHAR(255) DEFAULT NULL, photo_couleur390x390 VARCHAR(255) NOT NULL, photo_noir_blanc390x390 VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO team_member (id, noms, fonction, description, facebook, twitter, dribble, pinterest, behance) SELECT id, noms, fonction, description, facebook, twitter, dribble, pinterest, behance FROM __temp__team_member');
        $this->addSql('DROP TABLE __temp__team_member');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__team_member AS SELECT id, noms, fonction, description, facebook, twitter, dribble, pinterest, behance FROM team_member');
        $this->addSql('DROP TABLE team_member');
        $this->addSql('CREATE TABLE team_member (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, noms VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, dribble VARCHAR(255) DEFAULT NULL, pinterest VARCHAR(255) DEFAULT NULL, behance VARCHAR(255) DEFAULT NULL, photo_couleur VARCHAR(255) NOT NULL, photo_noir_blanc VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO team_member (id, noms, fonction, description, facebook, twitter, dribble, pinterest, behance) SELECT id, noms, fonction, description, facebook, twitter, dribble, pinterest, behance FROM __temp__team_member');
        $this->addSql('DROP TABLE __temp__team_member');
    }
}
