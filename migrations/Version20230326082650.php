<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326082650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achat (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, mobile_money_id INTEGER NOT NULL, user_id INTEGER NOT NULL, date_achat DATETIME NOT NULL, date_livraison DATETIME DEFAULT NULL, prix_total DOUBLE PRECISION NOT NULL, numero_reference VARCHAR(255) NOT NULL, is_approuve BOOLEAN NOT NULL, is_annule BOOLEAN NOT NULL, is_en_cours BOOLEAN NOT NULL, is_paye BOOLEAN NOT NULL, is_livre BOOLEAN NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , email VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, CONSTRAINT FK_26A98456721E9F72 FOREIGN KEY (mobile_money_id) REFERENCES mobile_money (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_26A98456A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_26A98456721E9F72 ON achat (mobile_money_id)');
        $this->addSql('CREATE INDEX IDX_26A98456A76ED395 ON achat (user_id)');
        $this->addSql('CREATE TABLE adresse (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, telephone VARCHAR(14) NOT NULL)');
        $this->addSql('CREATE TABLE annulation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, achat_id INTEGER NOT NULL, date DATETIME NOT NULL, motif VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_26F7D84FE95D117 FOREIGN KEY (achat_id) REFERENCES achat (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_26F7D84FE95D117 ON annulation (achat_id)');
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , photo VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identite_id INTEGER NOT NULL, adresse_id INTEGER NOT NULL, utilisateur_id INTEGER NOT NULL, code_client VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, CONSTRAINT FK_C7440455E5F13C8F FOREIGN KEY (identite_id) REFERENCES identite (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C74404554DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C7440455FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455E5F13C8F ON client (identite_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C74404554DE7DC5C ON client (adresse_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455FB88E14F ON client (utilisateur_id)');
        $this->addSql('CREATE TABLE contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, sujet VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, message CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, adresse_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, idnat VARCHAR(255) NOT NULL, rccm VARCHAR(255) NOT NULL, sigle VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , email_entreprise VARCHAR(255) NOT NULL, telephone_entreprise VARCHAR(255) NOT NULL, website_entreprise VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, image_hero_primaire VARCHAR(255) NOT NULL, image_hero_secondaire VARCHAR(255) NOT NULL, image_gauche VARCHAR(255) DEFAULT NULL, image_menu1 VARCHAR(255) NOT NULL, image_menu2 VARCHAR(255) NOT NULL, image_menu3 VARCHAR(255) NOT NULL, CONSTRAINT FK_D19FA604DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA604DE7DC5C ON entreprise (adresse_id)');
        $this->addSql('CREATE TABLE identite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, postnom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE ligne_achat (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, produit_id INTEGER NOT NULL, achat_id INTEGER NOT NULL, quantite INTEGER NOT NULL, total_ligne DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_25056E66F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_25056E66FE95D117 FOREIGN KEY (achat_id) REFERENCES achat (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_25056E66F347EFB ON ligne_achat (produit_id)');
        $this->addSql('CREATE INDEX IDX_25056E66FE95D117 ON ligne_achat (achat_id)');
        $this->addSql('CREATE TABLE mobile_money (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , numero VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE news_letter (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , ip_adress VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE page_livraison (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE page_policy (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE page_qsn (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE page_term_condition (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE partenaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description CLOB NOT NULL, logo VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE photo (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, produit_id INTEGER DEFAULT NULL, url VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_14B78418F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_14B78418F347EFB ON photo (produit_id)');
        $this->addSql('CREATE TABLE produit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, description CLOB NOT NULL, url_video_youtube VARCHAR(255) DEFAULT NULL, prix_vente DOUBLE PRECISION NOT NULL, qte_stock INTEGER NOT NULL, qte_alerte INTEGER NOT NULL, couleur VARCHAR(255) DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , is_arrivage BOOLEAN NOT NULL, is_best_selling BOOLEAN NOT NULL, photo_principale VARCHAR(255) NOT NULL, is_solde BOOLEAN NOT NULL, photo_principale_noir_blanc VARCHAR(255) NOT NULL, CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
        $this->addSql('CREATE TABLE recherche (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, mot_cle VARCHAR(255) NOT NULL, ip_adresse VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE reset_password_request (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , expires_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_7CE748AA76ED395 ON reset_password_request (user_id)');
        $this->addSql('CREATE TABLE service (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE tc_pays (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE team_member (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, noms VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, dribble VARCHAR(255) DEFAULT NULL, pinterest VARCHAR(255) DEFAULT NULL, behance VARCHAR(255) DEFAULT NULL, photo_couleur VARCHAR(255) NOT NULL, photo_noir_blanc VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identite_id INTEGER DEFAULT NULL, adresse_id INTEGER DEFAULT NULL, code_pays_id INTEGER DEFAULT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , role_principal VARCHAR(255) DEFAULT NULL, code_client VARCHAR(255) NOT NULL, is_client_ordinaire BOOLEAN NOT NULL, CONSTRAINT FK_8D93D649E5F13C8F FOREIGN KEY (identite_id) REFERENCES identite (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D93D6494DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D93D6499E4306D8 FOREIGN KEY (code_pays_id) REFERENCES tc_pays (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E5F13C8F ON "user" (identite_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6494DE7DC5C ON "user" (adresse_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499E4306D8 ON "user" (code_pays_id)');
        $this->addSql('CREATE TABLE video (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, url VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, description CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE achat');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE annulation');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE identite');
        $this->addSql('DROP TABLE ligne_achat');
        $this->addSql('DROP TABLE mobile_money');
        $this->addSql('DROP TABLE news_letter');
        $this->addSql('DROP TABLE page_livraison');
        $this->addSql('DROP TABLE page_policy');
        $this->addSql('DROP TABLE page_qsn');
        $this->addSql('DROP TABLE page_term_condition');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE recherche');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE tc_pays');
        $this->addSql('DROP TABLE team_member');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
