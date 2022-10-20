<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901184846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE catalog_product (id INT AUTO_INCREMENT NOT NULL, id_catalog_id INT NOT NULL, id_product_id INT NOT NULL, INDEX IDX_DCF8F98169B6E62B (id_catalog_id), INDEX IDX_DCF8F981E00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE catalog_product ADD CONSTRAINT FK_DCF8F98169B6E62B FOREIGN KEY (id_catalog_id) REFERENCES catalog_event (id)');
        $this->addSql('ALTER TABLE catalog_product ADD CONSTRAINT FK_DCF8F981E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE catalog_product');
    }
}
