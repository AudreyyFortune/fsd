<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722123334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country_translation (id INT AUTO_INCREMENT NOT NULL, id_country_id INT NOT NULL, locale VARCHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, name_file VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, meta_description LONGTEXT DEFAULT NULL, intro_title LONGTEXT DEFAULT NULL, intro_text LONGTEXT DEFAULT NULL, order_title LONGTEXT DEFAULT NULL, order_text LONGTEXT DEFAULT NULL, delivery_title LONGTEXT DEFAULT NULL, delivery_text LONGTEXT DEFAULT NULL, delivery_zone_text LONGTEXT DEFAULT NULL, delivery_tarif_text LONGTEXT DEFAULT NULL, delivery_mode_text LONGTEXT DEFAULT NULL, opportunity_title LONGTEXT DEFAULT NULL, opportunity_text LONGTEXT DEFAULT NULL, INDEX IDX_A1FE6FA45CA5BEA7 (id_country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE country_translation ADD CONSTRAINT FK_A1FE6FA45CA5BEA7 FOREIGN KEY (id_country_id) REFERENCES country (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE country_translation');
    }
}
