<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018135733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, id_product_id INT NOT NULL, id_recipient_id INT NOT NULL, id_sender_id INT NOT NULL, product_price VARCHAR(10) NOT NULL, date DATETIME NOT NULL, total VARCHAR(100) NOT NULL, INDEX IDX_F5299398E00EE68D (id_product_id), INDEX IDX_F5299398CAEEFA0A (id_recipient_id), INDEX IDX_F529939876110FBA (id_sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398CAEEFA0A FOREIGN KEY (id_recipient_id) REFERENCES recipient (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939876110FBA FOREIGN KEY (id_sender_id) REFERENCES sender (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `order`');
    }
}
