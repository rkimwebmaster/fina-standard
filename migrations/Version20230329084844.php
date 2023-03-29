<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329084844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__achat AS SELECT id, client_id, user_id, zone_livraison_preferentielle_id, date_achat, date_livraison, prix_total, is_approuve, is_annule, is_en_cours, is_paye, is_livre, created_at, updated_at, email, etat FROM achat');
        $this->addSql('DROP TABLE achat');
        $this->addSql('CREATE TABLE achat (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, user_id INTEGER NOT NULL, zone_livraison_preferentielle_id INTEGER NOT NULL, date_achat DATETIME NOT NULL, date_livraison DATETIME DEFAULT NULL, prix_total DOUBLE PRECISION NOT NULL, is_approuve BOOLEAN NOT NULL, is_annule BOOLEAN NOT NULL, is_en_cours BOOLEAN NOT NULL, is_paye BOOLEAN NOT NULL, is_livre BOOLEAN NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , email VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, CONSTRAINT FK_26A98456A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_26A9845619EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_26A984568A4E0C84 FOREIGN KEY (zone_livraison_preferentielle_id) REFERENCES zone_livraison (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO achat (id, client_id, user_id, zone_livraison_preferentielle_id, date_achat, date_livraison, prix_total, is_approuve, is_annule, is_en_cours, is_paye, is_livre, created_at, updated_at, email, etat) SELECT id, client_id, user_id, zone_livraison_preferentielle_id, date_achat, date_livraison, prix_total, is_approuve, is_annule, is_en_cours, is_paye, is_livre, created_at, updated_at, email, etat FROM __temp__achat');
        $this->addSql('DROP TABLE __temp__achat');
        $this->addSql('CREATE INDEX IDX_26A984568A4E0C84 ON achat (zone_livraison_preferentielle_id)');
        $this->addSql('CREATE INDEX IDX_26A98456A76ED395 ON achat (user_id)');
        $this->addSql('CREATE INDEX IDX_26A9845619EB6921 ON achat (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achat ADD COLUMN numero_reference VARCHAR(255) NOT NULL');
    }
}
