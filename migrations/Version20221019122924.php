<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019122924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939876110FBA');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398CAEEFA0A');
        $this->addSql('DROP INDEX IDX_F529939876110FBA ON `order`');
        $this->addSql('DROP INDEX IDX_F5299398CAEEFA0A ON `order`');
        $this->addSql('ALTER TABLE `order` ADD recipient_id INT NOT NULL, ADD sender_id INT NOT NULL, ADD delivery_date DATE NOT NULL, ADD delivery_hour TIME DEFAULT NULL, DROP id_recipient_id, DROP id_sender_id');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398E92F8F78 FOREIGN KEY (recipient_id) REFERENCES recipient (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398F624B39D FOREIGN KEY (sender_id) REFERENCES sender (id)');
        $this->addSql('CREATE INDEX IDX_F5299398E92F8F78 ON `order` (recipient_id)');
        $this->addSql('CREATE INDEX IDX_F5299398F624B39D ON `order` (sender_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398E92F8F78');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398F624B39D');
        $this->addSql('DROP INDEX IDX_F5299398E92F8F78 ON `order`');
        $this->addSql('DROP INDEX IDX_F5299398F624B39D ON `order`');
        $this->addSql('ALTER TABLE `order` ADD id_recipient_id INT NOT NULL, ADD id_sender_id INT NOT NULL, DROP recipient_id, DROP sender_id, DROP delivery_date, DROP delivery_hour');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939876110FBA FOREIGN KEY (id_sender_id) REFERENCES sender (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398CAEEFA0A FOREIGN KEY (id_recipient_id) REFERENCES recipient (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F529939876110FBA ON `order` (id_sender_id)');
        $this->addSql('CREATE INDEX IDX_F5299398CAEEFA0A ON `order` (id_recipient_id)');
    }
}
