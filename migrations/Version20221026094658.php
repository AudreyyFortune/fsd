<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221026094658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_5373C9664515941 ON country');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5373C96643C7A63F ON country (isocode)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_5373C96643C7A63F ON country');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5373C9664515941 ON country (sapa)');
    }
}
