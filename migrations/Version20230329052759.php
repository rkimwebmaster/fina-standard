<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329052759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__zone_livraison AS SELECT id, zone, estimation_un, estimation_deux, prix, description FROM zone_livraison');
        $this->addSql('DROP TABLE zone_livraison');
        $this->addSql('CREATE TABLE zone_livraison (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, zone VARCHAR(255) NOT NULL, estimation_un INTEGER NOT NULL, estimation_deux INTEGER NOT NULL, prix DOUBLE PRECISION NOT NULL, description CLOB NOT NULL)');
        $this->addSql('INSERT INTO zone_livraison (id, zone, estimation_un, estimation_deux, prix, description) SELECT id, zone, estimation_un, estimation_deux, prix, description FROM __temp__zone_livraison');
        $this->addSql('DROP TABLE __temp__zone_livraison');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_289ACC6AA0EBC007 ON zone_livraison (zone)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__zone_livraison AS SELECT id, zone, estimation_un, estimation_deux, prix, description FROM zone_livraison');
        $this->addSql('DROP TABLE zone_livraison');
        $this->addSql('CREATE TABLE zone_livraison (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, zone VARCHAR(255) NOT NULL, estimation_un INTEGER NOT NULL, estimation_deux INTEGER NOT NULL, prix DOUBLE PRECISION NOT NULL, description CLOB NOT NULL)');
        $this->addSql('INSERT INTO zone_livraison (id, zone, estimation_un, estimation_deux, prix, description) SELECT id, zone, estimation_un, estimation_deux, prix, description FROM __temp__zone_livraison');
        $this->addSql('DROP TABLE __temp__zone_livraison');
    }
}
