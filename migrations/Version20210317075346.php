<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210317075346 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, titre_en VARCHAR(255) DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, contenu_en VARCHAR(255) DEFAULT NULL, date_publication DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste ADD style_musique_en VARCHAR(255) DEFAULT NULL, ADD description_en VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE events ADD description_en VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE faq ADD question_en VARCHAR(255) DEFAULT NULL, ADD reponse_en VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaires ADD description_en VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE poi ADD description_en VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE blog');
        $this->addSql('ALTER TABLE artiste DROP style_musique_en, DROP description_en');
        $this->addSql('ALTER TABLE events DROP description_en');
        $this->addSql('ALTER TABLE faq DROP question_en, DROP reponse_en');
        $this->addSql('ALTER TABLE partenaires DROP description_en');
        $this->addSql('ALTER TABLE poi DROP description_en');
    }
}
