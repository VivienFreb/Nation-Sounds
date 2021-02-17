<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210205095116 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, concert_id INT DEFAULT NULL, nom_de_scene VARCHAR(255) NOT NULL, style_musique VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_9C07354F83C97B2E (concert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste_festival (artiste_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_48B9CB9021D25844 (artiste_id), INDEX IDX_48B9CB908AEBAF57 (festival_id), PRIMARY KEY(artiste_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concert (id INT AUTO_INCREMENT NOT NULL, scene_id INT DEFAULT NULL, festival_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, emplacement VARCHAR(255) DEFAULT NULL, INDEX IDX_D57C02D2166053B4 (scene_id), INDEX IDX_D57C02D28AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, emplacement VARCHAR(255) NOT NULL, places INT NOT NULL, INDEX IDX_5387574A8AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, question VARCHAR(255) NOT NULL, reponse VARCHAR(255) NOT NULL, INDEX IDX_E8FF75CC8AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE festival (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, reseaux_sociaux LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, date_emission DATE NOT NULL, INDEX IDX_297918838AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaires (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, site VARCHAR(255) NOT NULL, reseaux_sociaux LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_D230102E8AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poi (id INT AUTO_INCREMENT NOT NULL, festival_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, coordonnees LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', lien VARCHAR(255) DEFAULT NULL, INDEX IDX_7DBB1FD68AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scene (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, nb_places INT NOT NULL, emplacement VARCHAR(255) DEFAULT NULL, INDEX IDX_D979EFDA8AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, role VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354F83C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id)');
        $this->addSql('ALTER TABLE artiste_festival ADD CONSTRAINT FK_48B9CB9021D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_festival ADD CONSTRAINT FK_48B9CB908AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id)');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D28AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE faq ADD CONSTRAINT FK_E8FF75CC8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_297918838AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE partenaires ADD CONSTRAINT FK_D230102E8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE poi ADD CONSTRAINT FK_7DBB1FD68AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE scene ADD CONSTRAINT FK_D979EFDA8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_festival DROP FOREIGN KEY FK_48B9CB9021D25844');
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354F83C97B2E');
        $this->addSql('ALTER TABLE artiste_festival DROP FOREIGN KEY FK_48B9CB908AEBAF57');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D28AEBAF57');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A8AEBAF57');
        $this->addSql('ALTER TABLE faq DROP FOREIGN KEY FK_E8FF75CC8AEBAF57');
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_297918838AEBAF57');
        $this->addSql('ALTER TABLE partenaires DROP FOREIGN KEY FK_D230102E8AEBAF57');
        $this->addSql('ALTER TABLE poi DROP FOREIGN KEY FK_7DBB1FD68AEBAF57');
        $this->addSql('ALTER TABLE scene DROP FOREIGN KEY FK_D979EFDA8AEBAF57');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2166053B4');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE artiste_festival');
        $this->addSql('DROP TABLE concert');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE festival');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE partenaires');
        $this->addSql('DROP TABLE poi');
        $this->addSql('DROP TABLE scene');
        $this->addSql('DROP TABLE utilisateur');
    }
}
