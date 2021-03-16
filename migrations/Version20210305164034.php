<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305164034 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poi ADD longitude NUMERIC(10, 8) DEFAULT NULL, ADD latitude NUMERIC(10, 8) DEFAULT NULL, DROP coordonnees');
        $this->addSql('ALTER TABLE utilisateur ADD password LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poi ADD coordonnees LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', DROP longitude, DROP latitude');
        $this->addSql('ALTER TABLE utilisateur DROP password');
    }
}
