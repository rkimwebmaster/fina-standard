<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230404113633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD COLUMN is_en_stock BOOLEAN DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__produit AS SELECT id, categorie_id, nom, description, url_video_youtube, prix_vente, qte_stock, qte_alerte, couleur, code, created_at, updated_at, is_arrivage, is_best_selling, photo624x800_premier, photo624x800_deuxieme, is_solde FROM produit');
        $this->addSql('DROP TABLE produit');
        $this->addSql('CREATE TABLE produit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, description CLOB NOT NULL, url_video_youtube VARCHAR(255) DEFAULT NULL, prix_vente DOUBLE PRECISION NOT NULL, qte_stock INTEGER NOT NULL, qte_alerte INTEGER NOT NULL, couleur VARCHAR(255) DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , is_arrivage BOOLEAN NOT NULL, is_best_selling BOOLEAN NOT NULL, photo624x800_premier VARCHAR(255) NOT NULL, photo624x800_deuxieme VARCHAR(255) DEFAULT NULL, is_solde BOOLEAN NOT NULL, CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO produit (id, categorie_id, nom, description, url_video_youtube, prix_vente, qte_stock, qte_alerte, couleur, code, created_at, updated_at, is_arrivage, is_best_selling, photo624x800_premier, photo624x800_deuxieme, is_solde) SELECT id, categorie_id, nom, description, url_video_youtube, prix_vente, qte_stock, qte_alerte, couleur, code, created_at, updated_at, is_arrivage, is_best_selling, photo624x800_premier, photo624x800_deuxieme, is_solde FROM __temp__produit');
        $this->addSql('DROP TABLE __temp__produit');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
    }
}
